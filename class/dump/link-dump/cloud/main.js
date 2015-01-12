// Use Parse.Cloud.define to define as many cloud functions as you want.
// For example:
Parse.Cloud.beforeSave(Parse.User, function(request, response) {
  var validUsers = [
    'dnbrwstr@gmail.com',
    'laurel@linkedbyair.net',
    'laurel@beautiful-company.com',
    'wilnerbs@gmail.com',
    'lcsmith@gmail.com',
    'rebeccaabbe@gmail.com',
    'dan@linkedbyair.net',
    'tamara@linkedbyair.net',
    'dylan@linkedbyair.net',
    'maurann@linkedbyair.net',
    'dearjieun@gmail.com',
    'jcpanek@gmail.com',
    'hello@erikcarter.net',
    'ctaylor03@risd.edu'
  ];
 
  var user = request.object;
  var email = user.get('username');
 
  if (validUsers.indexOf(email) !== -1) {
    response.success();
  } else {
    response.error("It seems like your email isn't on the list. Good luck out there...");
  }
});