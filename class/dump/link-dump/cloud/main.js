// Use Parse.Cloud.define to define as many cloud functions as you want.
// For example:
Parse.Cloud.beforeSave(Parse.User, function(request, response) {
  var validUsers = [
    'dnbrwstr@gmail.com',
    'laurel@linkedbyair.net',
    'shoshana.bieler@yale.edu',
    'chase.booker@yale.edu',
    'carr.chadwick@yale.edu',
    'laura.coombs@yale.edu',
    'walden.davis@yale.edu',
    'bobby.dresser@gmail.com',
    'lian.fumerton-liu@yale.edu',
    'marta.galazcancio@yale.edu',
    'cindy.hwang@yale.edu',
    'theodore.mathias@yale.edu',
    'eric.nylund@yale.edu',
    'caroline.potter@yale.edu',
    'kai.takahashi@yale.edu',
    'megan.valentine@yale.edu',
    'mariah.xu@yale.edu'
  ];
 
  var user = request.object;
  var email = user.get('username');
 
  if (validUsers.indexOf(email) !== -1) {
    response.success();
  } else {
    response.error("It seems like your email isn't on the list. Good luck out there...");
  }
});