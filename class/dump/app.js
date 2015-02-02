(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({"./src/scripts/init.js":[function(require,module,exports){
var React = require('react'),
  config = require('config'),
  App = require('components/app');

Parse.initialize(config.parseApplicationId, config.parseJavascriptKey);

React.renderComponent(React.createElement(App, null), document.getElementById('app-root'));

},{"components/app":"/www/link-dump/src/scripts/components/app.js","config":"/www/link-dump/src/scripts/config.js","react":"react"}],"/www/link-dump/src/scripts/components/add_link_form.js":[function(require,module,exports){
var React = require('react'),
  LinkService = require('services/link_service'),
  UserService = require('services/user_service');

var AddLinkForm = React.createClass({displayName: "AddLinkForm",

  getInitialState: function () {
    return {
      value: '', 
      valid: true
    };
  },
 
  render: function () {
    var classes = React.addons.classSet({
      'add-link-form': true,
      'is-active': this.props.active,
      'is-valid': this.state.valid,
      'is-invalid': !this.state.valid
    });

    return (
      React.createElement("div", {className: classes}, 
        React.createElement("input", {
          type: "text", 
          placeholder: "url", 
          value: this.state.value, 
          onChange: this.onChange, 
          onKeyUp: this.onKeyUp}), 

        React.createElement("a", {className: "add-link-form-add-button", onClick: this.onSubmit}, 
          "Add"
        )
      )
    );
  },

  onChange: function (e) {
    var isValid = !!this.getFormattedLink() || this.state.value.length < 3;

    this.setState({
      value: e.target.value,
      valid: isValid
    });
  },

  onKeyUp: function (e) {
    if (e.keyCode === 13) {
      this.onSubmit();
    }
  },

  onSubmit: function () {
    var link = this.getFormattedLink();
    var user = UserService.getUser();

    if (!link) return;

    LinkService.createLink({
      text: link,
      username: user.get('name'),
      avatar: user.get('avatar')
    });
  
    this.setState({
      value: ''
    });
  },

  getFormattedLink: function () {
    var val = this.state.value;
    val = val.replace(/^\s+/, '').replace('\s+$', '');

    if (val.match(/\s/g)) {
      return false;
    }

    var protocol = val.split('://').shift();
    if (protocol !== val && protocol !== 'http' && protocol !== 'https') {
      return false;
    }

    var host = val.split('://').pop().split('/').shift();
    var hostParts = host.split('.');
    if (hostParts.length < 2) {
      return false;
    }

    if (protocol === val) {
      val = 'http://' + val;
    }

    return val;
  }

});

module.exports = AddLinkForm;

},{"react":"react","services/link_service":"/www/link-dump/src/scripts/services/link_service.js","services/user_service":"/www/link-dump/src/scripts/services/user_service.js"}],"/www/link-dump/src/scripts/components/app.js":[function(require,module,exports){
var React = require('react'), 
  AddLinkForm = require('components/add_link_form'),
  AuthForm = require('components/auth_form'),
  LinkList = require('components/link_list'),
  UserService = require('services/user_service');

var AppView = React.createClass({displayName: "AppView",

  getInitialState: function () {
    return {
      user: UserService.getUser(),
      showAuthModal: false
    };
  },

  componentDidMount: function () {
    UserService.on('change', this.updateUser);
  },

  updateUser: function () {
    this.setState({
      user: UserService.getUser()
    });
  },

  render: function () {
    var user = this.state.user;

    return (
      React.createElement("div", {className: "application"}, 
        React.createElement("div", {className: "app-header"}, 
          React.createElement("div", {className: "auth-links"}, 
             this.state.user ?
              React.createElement("div", null, 
                 "Welcome, " + user.get('name') + ' ', 
                React.createElement("a", {className: "logout-link", onClick: this.onLogout}, "Logout")
              )
            :
              React.createElement("a", {className: "login-link", onClick: this.onToggleAuthForm}, "Login / Register")
            
          ), 

           this.state.user && 
            React.createElement(AddLinkForm, null)
        ), 

        React.createElement(LinkList, null), 

         !this.state.user && this.state.showAuthModal &&
          React.createElement(AuthForm, {onClose: this.onToggleAuthForm})
      )
    );
  },

  onToggleAuthForm: function () {
    this.setState({
      showAuthModal: !this.state.showAuthModal
    });
  },

  onLogout: function () {
    UserService.logout();
  }

});

module.exports = AppView;

},{"components/add_link_form":"/www/link-dump/src/scripts/components/add_link_form.js","components/auth_form":"/www/link-dump/src/scripts/components/auth_form.js","components/link_list":"/www/link-dump/src/scripts/components/link_list.js","react":"react","services/user_service":"/www/link-dump/src/scripts/services/user_service.js"}],"/www/link-dump/src/scripts/components/auth_form.js":[function(require,module,exports){
var React = require('react'),
  IconEditor = require('components/icon_editor'),
  UserService = require('services/user_service');

var AuthForm = React.createClass({displayName: "AuthForm",
  mixins: [React.addons.LinkedStateMixin],

  getInitialState: function () {
    return {
      form: 'login',
      name: '',
      email: '',
      password: '',
      avatar: null,
      loading: false,
      loginError: null,
      registrationError: null
    };
  },

  componentDidMount: function () {
    var _this = this;

    UserService.on('login:error', function (err) {
      _this.setState({
        loading: false,
        loginError: err || 'Unable to log in'
      });
    });

    UserService.on('registration:error', function (err) {
      _this.setState({
        loading: false,
        registrationError: err || 'Unable to register'
      });
    });
  },

  render: function () {
    var classes = React.addons.classSet({
      'overlay': true,
      'is-active': this.props.active,
      'is-loading': this.state.loading
    });

    return (
      React.createElement("div", {onClick: this.onClose, className: classes}, 
        React.createElement("div", {className: "overlay-inner"}, 
          React.createElement("div", {className: "auth-form ld-form", onClick: this.onClickForm}, 
            React.createElement("div", {className: "ld-form-label"}, 
              React.createElement("a", {onClick: this.onShowLogin, className: this.getLinkClass('login')}, "Login"), " / ", 
              React.createElement("a", {onClick: this.onShowSignup, className: this.getLinkClass('signup')}, "Register")
            ), 

             this.renderForm(), 

            React.createElement("div", {className: "ld-form-close", onClick: this.onClose}, '\u00D7' )
          )
        )
      )
    );
  },

  getLinkClass: function (linkName) {
    var className = linkName + '-link ';
    className += 'auth-form-link ';
    className += (linkName === this.state.form ? 'is-active' : '');
    return className;
  },

  renderForm : function () {
    return (
      React.createElement("div", {className: "register-form"}, 
         this.state.form === 'login' ? 
          React.createElement("div", {className: "login-form"}, 
            React.createElement("div", {className: "ld-form-controls"}, 
              React.createElement("div", {className: "ld-form-field-set"}, 
                React.createElement("input", {type: "text", valueLink: this.linkState('email'), placeholder: "Email"}), 
                React.createElement("input", {type: "password", valueLink: this.linkState('password'), placeholder: "Password"})
              ), 

               this.state.loginError &&
                React.createElement("div", {className: "ld-form-error"}, this.state.loginError), 

              React.createElement("div", {className: "ld-form-submit-container"}, 
                React.createElement("input", {type: "submit", onClick: this.onSubmitLogin, value: this.state.loading ? 'Loading...' : 'Login'})
              )
            )
          )
        :
          React.createElement("div", {className: "ld-form-controls"}, 
            React.createElement("div", {className: "ld-form-field-set"}, 
              React.createElement("div", {className: "ld-form-avatar-editor"}, 
                "Draw an avatar", 
                React.createElement("div", {className: "ld-form-avatar-editor-inner"}, 
                  React.createElement(IconEditor, {onChange: this.onUpdateAvatar})
                )
              ), 
              React.createElement("input", {type: "text", valueLink: this.linkState('name'), placeholder: "Name"}), 
              React.createElement("input", {type: "text", valueLink: this.linkState('email'), placeholder: "Email"}), 
              React.createElement("input", {type: "password", valueLink: this.linkState('password'), placeholder: "Password"})
            ), 

             this.state.registrationError &&
              React.createElement("div", {className: "ld-form-error"}, this.state.registrationError), 

            React.createElement("div", {className: "ld-form-submit-container"}, 
              React.createElement("input", {type: "submit", onClick: this.onSubmitRegistration, value: this.state.loading ? 'Loading...' : 'Sign Up'})
            )
          )
        
      )
    );
  },

  onClose: function () {
    this.props.onClose();
  },

  onClickForm: function (e) {
    e.stopPropagation();
  },

  onReset: function () {
    this.setState(this.getInitialState());
  },

  onShowLogin: function () {
    this.showForm('login');
  },

  onShowSignup: function () {
    this.showForm('signup');
  },

  showForm: function (formName) {
    this.setState({form: formName});
  },

  onSubmitLogin: function (e) {
    e.preventDefault();

    this.setState({
      loading: true
    });

    UserService.login(this.state.email, this.state.password);
  },

  onUpdateAvatar: function (data) {
    this.setState({
      avatar: data
    });
  },

  onSubmitRegistration: function (e) {
    e.preventDefault();

    this.setState({
      loading: true
    });
    
    UserService.createUser(this.state.email, this.state.password, {
      name: this.state.name,
      email: this.state.email,
      avatar: this.state.avatar
    });
  }

});

module.exports = AuthForm;

},{"components/icon_editor":"/www/link-dump/src/scripts/components/icon_editor.js","react":"react","services/user_service":"/www/link-dump/src/scripts/services/user_service.js"}],"/www/link-dump/src/scripts/components/avatar.js":[function(require,module,exports){
var React = require('react');

var Avatar = React.createClass({displayName: "Avatar",

  getDefaultProps: function () {
    return {
      size: 32,
      model: [0,0,0,0]
    };
  },

  render: function() {
    return (
      React.createElement("img", {className: "avatar", src: this.getImageData()})
    );
  },

  getImageData: function () {
    var size = this.props.size;

    var canvas = document.createElement('canvas');
    canvas.width = size;
    canvas.height = size;
    
    var ctx = canvas.getContext('2d');
    var imgData = ctx.createImageData(size, size);

    var originalSize = Math.floor(Math.sqrt(this.props.model.length));
    var ratio = originalSize / this.props.size;

    for (var i = 0; i < (imgData.data.length / 4); ++i) {
      var x = i % size;
      var y = Math.floor(i / size);

      var originalX = Math.floor(x * ratio);
      var originalY = Math.floor(y * ratio);

      var pixel = this.props.model[originalSize * originalY + originalX];
      var pixelVal = pixel ? 0 : 255;

      imgData.data[i * 4 + 0] = pixelVal;
      imgData.data[i * 4 + 1] = pixelVal;
      imgData.data[i * 4 + 2] = pixelVal;
      imgData.data[i * 4 + 3] = pixelVal ? 0 : 255;
    }

    ctx.putImageData(imgData, 0, 0);

    var dataURL = canvas.toDataURL('image/png');
    return dataURL;
  }

});

module.exports = Avatar;

},{"react":"react"}],"/www/link-dump/src/scripts/components/icon_editor.js":[function(require,module,exports){
var React = require('react');

var IconEditor = React.createClass({displayName: "IconEditor",

  getDefaultProps: function () {
    return {
      width: 16,
      height: 16
    };
  },

  getInitialState: function () {
    var pixels = [];

    for (var i = 0; i < this.props.width * this.props.height; ++i) {
      pixels.push(0);
    }

    return {
      pixels: pixels
    };
  },

  componentDidMount: function () {
    window.addEventListener('mouseup', this.onStopPaint);

    if (this.props.onChange) {
      this.props.onChange(this.state.pixels);
    }
  },

  componentWillUnmount: function () {
    window.removeEventListener('mouseup', this.onStopPaint);
  },

  render: function() {
    var _this = this;

    var pixelStyle = {
      width: 100 / this.props.width + '%',
      height: 100 / this.props.height + '%'
    };

    return (
      React.createElement("div", {className: "icon-editor"}, 
        React.createElement("div", {className: "icon-editor-pixel-editor"}, 
        React.createElement("div", {className: "icon-editor-pixels"}, 
           this.state.pixels.map(function (pixel, i) {
            return (
              React.createElement("div", {className: _this.getClassesForPixel(pixel), 
                style: pixelStyle, 
                onMouseDown: _this.onStartPaint.bind(_this, i), 
                onMouseOver: _this.onMouseOverPixel.bind(_this, i)}
              )
            );
          }) 
        )
        ), 
        React.createElement("div", {className: "icon-editor-controls"}, 
          React.createElement("a", {onClick: this.onReset}, "Reset")
        )
      )
    );
  },

  getClassesForPixel: function (pixel) {
    return "icon-editor-pixel" + (pixel ? ' is-filled' : '');
  },

  onMouseOverPixel: function (index) {
    if (this.state.painting) {
      var pixels = this.state.pixels;

      if (this.state.mode === 'add') {
        this.state.pixels[index] = 1;
      } else if (this.state.mode === 'subtract') {
        this.state.pixels[index] = 0;
      }

      this.setState({
        pixels: pixels
      });

      if (this.props.onChange) {
        this.props.onChange(this.state.pixels);
      }
    }
  },

  onStartPaint: function (index) {
    var pixels = this.state.pixels;
    var pixel = pixels[index];
    var mode = pixel ? 'subtract' : 'add';
    
    pixels[index] = !pixel;

    this.setState({
      pixels: pixels,
      painting: true,
      mode: mode
    });
  },

  onStopPaint: function () {
    this.setState({
      painting: false
    });
  },

  onReset: function () {
    this.setState(this.getInitialState());
  }

});

module.exports = IconEditor;

},{"react":"react"}],"/www/link-dump/src/scripts/components/link_list.js":[function(require,module,exports){
var moment = require('moment'), 
  React = require('react'),
  LinkService = require('services/link_service'),
  LinkStub = require('components/link_stub');

var LinkList = React.createClass({displayName: "LinkList",

  getInitialState: function () {
    return {
      links: LinkService.getLinks()
    };
  },

  componentDidMount: function () {
    LinkService.loadLinks();
    LinkService.on('change', this.updateLinks);
  },

  updateLinks: function () {
    this.setState({
      links: LinkService.getLinks()
    });
  },

  render: function () {
    return (
      React.createElement("div", {className: "link-list"}, 
         this.getGroupedLinks().map(function (group) {
          return (
            React.createElement("div", {className: "link-group"}, 
              React.createElement("div", {className: "link-group-date"}, group.date), 
               group.links.map(function (link) {
                return (React.createElement(LinkStub, {model: link}));
              }) 
            )
          );
        }) 
      )
    );
  },

  getGroupedLinks: function () {
    var dates = this.state.links.reduce(function (memo, item) {
      var date = moment(item.createdAt).format('MMM Do');

      if (!memo[date]) {
        memo[date] = [];
      }

      memo[date].push(item);

      return memo;
    }, {});

    var groups = [];
    for (var key in dates) {
      groups.push({
        date: key,
        links: dates[key]
      });
    }

    return groups.sort(function (a, b) {
      var dateA = new Date(a.links[0].createdAt);
      var dateB = new Date(b.links[0].createdAt);

      if (dateA > dateB) {
        return -1;
      } else if (dateA < dateB) {
        return 1;
      } else {
        return 0;
      }
    });
  }

});

module.exports = LinkList;

},{"components/link_stub":"/www/link-dump/src/scripts/components/link_stub.js","moment":"moment","react":"react","services/link_service":"/www/link-dump/src/scripts/services/link_service.js"}],"/www/link-dump/src/scripts/components/link_stub.js":[function(require,module,exports){
var React = require('react'),
  Avatar = require('components/avatar');

var LinkStub = React.createClass({displayName: "LinkStub",

  render: function () {
    var link = this.props.model.toJSON();

    return (
      React.createElement("div", {className: "link-stub"}, 
        React.createElement("div", {className: "link-stub-avatar"}, 
          React.createElement(Avatar, {model: link.avatar})
        ), 

        React.createElement("a", {href: link.text, target: "_blank"}, link.text), 
        React.createElement("div", {className: "link-stub-username"}, link.username)
      )
    );
  }

});

module.exports = LinkStub;

},{"components/avatar":"/www/link-dump/src/scripts/components/avatar.js","react":"react"}],"/www/link-dump/src/scripts/config.js":[function(require,module,exports){
var config = {
  parseApplicationId: 'RE5Oe7q1qtDeadnnWcVw7qMUaKXmRNw1yD8YveeD',
  parseJavascriptKey: 'HMAilWv2Y6B8i3pYBYQnoNhWrxINyPwwN7b96mI6'
};

if (config.parseJavascriptKey === '' || config.parseApplicationId === '') {
  throw new Error('Please specify your parse javascript key and application id in config.js');
}

module.exports = config;

},{}],"/www/link-dump/src/scripts/lib/make_service.js":[function(require,module,exports){
var EventEmitter = require('wolfy87-eventemitter');

module.exports = function (serviceProps) {
  var service = Object.create(EventEmitter.prototype);

  for (var key in serviceProps) {
    var val = serviceProps[key];

    if (typeof val === 'function') { 
      val = val.bind(service);
    }

    service[key] = val;
  }

  service.triggerChange = function () {
    this.trigger('change');
  }.bind(service);

  return service;
};

},{"wolfy87-eventemitter":"wolfy87-eventemitter"}],"/www/link-dump/src/scripts/models/link.js":[function(require,module,exports){
var Link = Parse.Object.extend('Link');

module.exports = Link;

},{}],"/www/link-dump/src/scripts/services/link_service.js":[function(require,module,exports){
var makeService = require('lib/make_service'),
  Link = require('models/link');

var  links = [];

var LinkService = makeService({

  loadLinks: function () {
    new Parse.Query(Link)
      .descending('createdAt')
      .find()
      .then(function (results) {
        links = results;
      })
      .then(this.triggerChange, this.triggerLoadError);
  },

  getLinks: function () {
    return links;
  },

  createLink: function (attrs) {
    var acl = new Parse.ACL();
    acl.setPublicReadAccess(true);
    acl.setPublicWriteAccess(false);

    attrs.ACL = acl;

    new Link(attrs).save()
      .then(this.loadLinks, this.triggerCreateError);
  },

  triggerRegistrationError: function (e) {
    this.trigger('load:error', [e.message]);
  },

  triggerCreateError: function (e) {
    this.trigger('create:error', [e.message]);
  }

});

module.exports = LinkService;

},{"lib/make_service":"/www/link-dump/src/scripts/lib/make_service.js","models/link":"/www/link-dump/src/scripts/models/link.js"}],"/www/link-dump/src/scripts/services/user_service.js":[function(require,module,exports){
var makeService = require('lib/make_service');

var UserService = makeService({
  
  getUser: function () {
    return Parse.User.current();
  },

  login: function (username, password) {
    return Parse.User.logIn(username, password)
      .then(this.triggerChange, this.triggerLoginError);
  },

  logout: function () {
    Parse.User.logOut()
    this.triggerChange();
  },

  createUser: function (username, password, attrs) {
    return Parse.User.signUp(username, password, attrs)
      .then(this.login.bind(this, username, password), this.triggerRegistrationError);
  },

  triggerLoginError: function (e) {
    this.trigger('login:error', [e.message]);
  },

  triggerRegistrationError: function (e) {
    this.trigger('registration:error', [e.message]);
  }

});

module.exports = UserService;

},{"lib/make_service":"/www/link-dump/src/scripts/lib/make_service.js"}]},{},["./src/scripts/init.js"]);
