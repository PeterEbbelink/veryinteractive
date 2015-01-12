// Use Parse.Cloud.define to define as many cloud functions as you want.
// For example:
Parse.Cloud.beforeSave(Parse.User, function(request, response) {
  var validUsers = [
    'dnbrwstr@gmail.com',
    'laurel@linkedbyair.net',
    'laurel@beautiful-company.com'
  ];
 
  var user = request.object;
  var email = user.get('username');
 
  if (validUsers.indexOf(email) !== -1) {
    response.success();
  } else {
    response.error("Please use your yale.edu email to sign up.");
  }
});