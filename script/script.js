$(document).ready(function() {
  // var mottos = [
  //   "Every lie creates a parallel world",
  //   "experiment: play",
  //   "one love",
  //   "this too shall pass",
  //   "Don't code like THOT",
  //   "Don't Worry, Be Hopi",
  //   "Forever Whatever",
  //   "Look up more",
  //   "Well, I would not say that I was in the great class, but I had a great time while I was trying to be great",
  //   "Design is for lovers",
  //   "New and improving",
  //   "Creativity is just connecting things",
  //   "Get linked",
  //   "new little words",
  //   "Everything is raw material",
  //   "Give me internet or give me internet"
  // ];

  // var punctuations = [
  //   "."
  // ];

  // var randomizer = function(array) {
  //   return array[Math.floor(Math.random()*array.length)];
  // };

  // $('.motto').html(randomizer(mottos) + (randomizer(punctuations)));

  // $("#style01").click(function(){
  //     if($(this).find("link").length <= 0) {
  //         $(this).append('<link rel="stylesheet" href="style/theme-gutenblood.css">');
  //         $('body').append('<audio><source src="sounds/perfect-thunder.mp3" type="audio/mp3"></audio>');
  //     }
  //     else
  //         $(this).find("link").remove();
  // });

  //If Cookie isn't blank (i.e. do we have a cookie set at all?)
  if($.cookie('theme')!='') {
    $('body').addClass($.cookie('theme'));  //set the body to the cookie theme
  }

  $('.window a').each(function(index) {
    $(this).click(function(e) {
      e.preventDefault();
        
      switch(index) {
          // no theme yet
          case 0:
              $('body').removeClass($.cookie('theme'));
              $('body').addClass('theme01');
              $.cookie('theme', 'theme01',{ expires: 7, path: '/' });
          break;
          
          // no theme yet
          case 1:
              $('body').removeClass($.cookie('theme'));
              $('body').addClass('theme02');
              $.cookie('theme', 'theme02',{ expires: 7, path: '/' });
          break;
          
          // no theme yet
          case 2:
              $('body').removeClass($.cookie('theme'));
              $('body').addClass('theme03');
              $.cookie('theme', 'theme03',{ expires: 7, path: '/' });
          break;

          // GUTENBLOOD THEME
          case 3:
              $('body').removeClass($.cookie('theme'));
              $('body').addClass('gutenblood');
              $.cookie('theme', 'gutenblood',{ expires: 7, path: '/' });
          break;

          // no theme yet
          case 4:
              $('body').removeClass($.cookie('theme'));
              $('body').addClass('theme05');
              $.cookie('theme', 'theme05',{ expires: 7, path: '/' });
          break;

          // no theme yet
          case 5:
              $('body').removeClass($.cookie('theme'));
              $('body').addClass('theme06');
              $.cookie('theme', 'theme06',{ expires: 7, path: '/' });
          break;

          // no theme yet
          case 6:
              $('body').removeClass($.cookie('theme'));
              $('body').addClass('theme07');
              $.cookie('theme', 'theme07',{ expires: 7, path: '/' });
          break;

          // no theme yet
          case 7:
              $('body').removeClass($.cookie('theme'));
              $('body').addClass('theme08');
              $.cookie('theme', 'theme08',{ expires: 7, path: '/' });
          break;
              
      }
    });
  });



});