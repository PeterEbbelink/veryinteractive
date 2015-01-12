// Use Parse.Cloud.define to define as many cloud functions as you want.
// For example:
Parse.Cloud.beforeSave(Parse.User, function(request, response) {
  var validUsers = [
    'dnbrwstr@gmail.com',
    'laurel@linkedbyair.net',
    'laurel@beautiful-company.com',
    'wilnerbs@gmail.com',
    'lcsmith@gmail.com',
    'jeff@rey.sc',
    'rebeccaabbe@gmail.com'
  ];
 
  var user = request.object;
  var email = user.get('username');
 
  if (validUsers.indexOf(email) !== -1) {
    response.success();
  } else {
    response.error("If you are registered for this class, use your yale.edu email to sign up. Otherwise if you are not in the class but would like to contribute, email laurel@linkedbyair.net to put you on the special guest list.");
  }
});