$(document).ready(function() {

  $('span.current').hover(function(){
    console.log('hi');
    $('span.info').toggle();
  });

  //If Cookie isn't blank (i.e. do we have a cookie set at all?)

  console.log($.cookie('theme'));

  if($.cookie('theme') == undefined) {
    console.log("The theme is undefined");
    $('body').removeClass($.cookie('theme'));
    $('body').addClass('august2015');
    // $.cookie('theme', 'december',{ expires: 7, path: '/' });
  }

  // Special Gran Turismo Stuff

  // var colored_words = $('.text-itself p, .text-itself h2, .text-itself blockquote');

  // if($.cookie('theme') == 'gran-turismo' && $('.text-itself').length){
  //   $(colored_words).lettering('words');
  //   console.log('okay');
  // }

  // if($.cookie('theme')!='') {
  //   $('body').addClass($.cookie('theme'));  //set the body to the cookie theme
  // }

  // Special November Stuff
  
  // function blueblock( str ){
  //       return "<img src='../../../images/block-blue.svg' class='block'>";
  // };

  // function redblock( str ){
  //       return " <img src='../../../images/block-red.svg' class='block'> ";
  // };

  // function greenblock( str ){
  //       return " <img src='../../../images/block-green.svg' class='block'> ";
  // };


  // function yellowblock( str ){
  //       return " <img src='../../../images/block-yellow.svg' class='block'> ";
  // };

  // $("body.november .document.text *").replaceText( /this|that|those/gi, blueblock );
  // $("body.november .document.text *").replaceText( /( |^)design[^A-Za-z0-9]|( |^)designer[^A-Za-z0-9]/gi, greenblock );
  // $("body.november .document.text *").replaceText( /( |^)art[^A-Za-z0-9]|( |^)artist[^A-Za-z0-9]/gi, redblock );
  // $("body.november .document.text *").replaceText( /( |^)new[^A-Za-z0-9]/gi, yellowblock );


  // Special December Stuff

  // The star of every good animation
  var requestAnimationFrame = window.requestAnimationFrame || 
                              window.mozRequestAnimationFrame || 
                              window.webkitRequestAnimationFrame ||
                              window.msRequestAnimationFrame;

  var transforms = ["transform", 
                    "msTransform", 
                    "webkitTransform", 
                    "mozTransform", 
                    "oTransform"];
                     
  var transformProperty = getSupportedPropertyName(transforms);

  // Array to store our Snowflake objects
  var snowflakes = [];

  // Global variables to store our browser's window size
  var browserWidth;
  var browserHeight;

  // Specify the number of snowflakes you want visible
  var numberOfSnowflakes = 50;

  // Flag to reset the position of the snowflakes
  var resetPosition = false;

  //
  // It all starts here...
  //
  function setup() {
    window.addEventListener("DOMContentLoaded", generateSnowflakes, false);
    window.addEventListener("resize", setResetFlag, false);
  }
  setup();

  //
  // Vendor prefix management
  //
  function getSupportedPropertyName(properties) {
      for (var i = 0; i < properties.length; i++) {
          if (typeof document.body.style[properties[i]] != "undefined") {
              return properties[i];
          }
      }
      return null;
  }

  //
  // Constructor for our Snowflake object
  //
  function Snowflake(element, radius, speed, xPos, yPos) {

    // set initial snowflake properties
      this.element = element;
      this.radius = radius;
      this.speed = speed;
      this.xPos = xPos;
      this.yPos = yPos;
    
    // declare variables used for snowflake's motion
      this.counter = 0;
      this.sign = Math.random() < 0.5 ? 1 : -1;
    
    // setting an initial opacity and size for our snowflake
      this.element.style.opacity = .1 + Math.random();
      this.element.style.fontSize = 12 + Math.random() * 50 + "px";
  }

  //
  // The function responsible for actually moving our snowflake
  //
  Snowflake.prototype.update = function () {

    // using some trigonometry to determine our x and y position
      this.counter += this.speed / 5000;
      this.xPos += this.sign * this.speed * Math.cos(this.counter) / 40;
      this.yPos += Math.sin(this.counter) / 40 + this.speed / 30;

    // setting our snowflake's position
      setTranslate3DTransform(this.element, Math.round(this.xPos), Math.round(this.yPos));
      
      // if snowflake goes below the browser window, move it back to the top
      if (this.yPos > browserHeight) {
        this.yPos = -50;
      }
  }

  //
  // A performant way to set your snowflake's position
  //
  function setTranslate3DTransform(element, xPosition, yPosition) {
    var val = "translate3d(" + xPosition + "px, " + yPosition + "px" + ", 0)";
      element.style[transformProperty] = val;
  }

  //
  // The function responsible for creating the snowflake
  //
  function generateSnowflakes() {
    
    // get our snowflake element from the DOM and store it
      var originalSnowflake = document.querySelector(".snowflake");
      
      // access our snowflake element's parent container
      var snowflakeContainer = originalSnowflake.parentNode;
      
      // get our browser's size
    browserWidth = document.documentElement.clientWidth;
      browserHeight = document.documentElement.clientHeight;
            
      // create each individual snowflake
      for (var i = 0; i < numberOfSnowflakes; i++) {
      
        // clone our original snowflake and add it to snowflakeContainer
          var snowflakeCopy = originalSnowflake.cloneNode(true);
          snowflakeContainer.appendChild(snowflakeCopy);

      // set our snowflake's initial position and related properties
          var initialXPos = getPosition(50, browserWidth);
          var initialYPos = getPosition(50, browserHeight);
          var speed = 5+Math.random()*40;
          var radius = 4+Math.random()*10;
          
          // create our Snowflake object
          var snowflakeObject = new Snowflake(snowflakeCopy, 
                            radius, 
                            speed, 
                            initialXPos, 
                            initialYPos);
          snowflakes.push(snowflakeObject);
      }
      
      // remove the original snowflake because we no longer need it visible
    snowflakeContainer.removeChild(originalSnowflake);
    
    // call the moveSnowflakes function every 30 milliseconds
      moveSnowflakes();
  }

  //
  // Responsible for moving each snowflake by calling its update function
  //
  function moveSnowflakes() {
      for (var i = 0; i < snowflakes.length; i++) {
          var snowflake = snowflakes[i];
          snowflake.update();
      }
      
    // Reset the position of all the snowflakes to a new value
      if (resetPosition) {
        browserWidth = document.documentElement.clientWidth;
        browserHeight = document.documentElement.clientHeight; 
        
      for (var i = 0; i < snowflakes.length; i++) {
            var snowflake = snowflakes[i];
            
            snowflake.xPos = getPosition(50, browserWidth);
            snowflake.yPos = getPosition(50, browserHeight);
        }
        
        resetPosition = false;
      }
      
      requestAnimationFrame(moveSnowflakes);
  }

  //
  // This function returns a number between (maximum - offset) and (maximum + offset)
  //
  function getPosition(offset, size) {
    return Math.round(-1*offset + Math.random() * (size+2*offset));
  }

  // Camera shutter effect

  // var audioElement = document.createElement('audio');
  // audioElement.setAttribute('src', '/sounds/camera_shutter.mp3');
  // audioElement.setAttribute('autoplay', 'autoplay');

  // $.get();

  // function cameraSound() {
  //   if (audioElement.paused) {
  //     console.log("it's paused");
  //     audioElement.play();
  //   }
  //   else {
  //     audioElement.play();
  //     console.log("you played it");
  //   }
  // }

  // audioElement.addEventListener("load", function() {
  //   cameraSound();
  // }, true);

  // $('html, body, a').click(function() {
  //   cameraSound();
  // });

  //
  // Trigger a reset of all the snowflakes' positions
  //
  function setResetFlag(e) {
    resetPosition = true;
  }
  $('.dots a').each(function(index) {
    $(this).click(function(e) {
      e.preventDefault();
        
      switch(index) {       
          // DEFAULT THEME
          case 0:
              $('body').removeClass($.cookie('theme'));
              $('body').addClass('theme02');
              $.cookie('theme', 'theme02',{ expires: 7, path: '/' });
          break;

          // GUTENBLOOD THEME
          case 1:
              $('body').removeClass($.cookie('theme'));
              $('body').addClass('gutenblood');
              $.cookie('theme', 'gutenblood',{ expires: 7, path: '/' });
          break;

          // GRAN TURISMO
          case 2:
              $('body').removeClass($.cookie('theme'));
              $('body').addClass('gran-turismo');
              $.cookie('theme', 'gran-turismo',{ expires: 7, path: '/' });
              $(colored_words).lettering('words');
          break;
                        
      }
    });
  });


});