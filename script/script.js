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

  console.log($.cookie('theme'));

  if($.cookie('theme') == undefined) {
    console.log("It's undefined");
    $('body').removeClass($.cookie('theme'));
    $('body').addClass('november');
    $.cookie('theme', 'november',{ expires: 7, path: '/' });
  }

  // var colored_words = $('.text-itself p, .text-itself h2, .text-itself blockquote');

  // if($.cookie('theme') == 'gran-turismo' && $('.text-itself').length){
  //   $(colored_words).lettering('words');
  // }

  if($.cookie('theme')!='') {
    $('body').addClass($.cookie('theme'));  //set the body to the cookie theme
  }

  // Special November Stuff

  // $('body.november .document.text p').each(function(){
  //   var myStr = $(this).html();
  //   myStr = myStr.split("");
  //   // alert(myStr);
  //   // $(this).html(myContents);
  // });
  
  function blueblock( str ){
        return "<img src='../../../images/block-blue.svg' class='block'>";
  };

  function redblock( str ){
        return " <img src='../../../images/block-red.svg' class='block'> ";
  };

  function greenblock( str ){
        return " <img src='../../../images/block-green.svg' class='block'> ";
  };


  function yellowblock( str ){
        return " <img src='../../../images/block-yellow.svg' class='block'> ";
  };

  $("body.november *").replaceText( /this|that|those/gi, blueblock );
  $("body.november *").replaceText( /( |^)design[^A-Za-z0-9]|( |^)designer[^A-Za-z0-9]/gi, greenblock );
  $("body.november *").replaceText( /( |^)art[^A-Za-z0-9]|( |^)artist[^A-Za-z0-9]/gi, redblock );
  $("body.november *").replaceText( /( |^)new[^A-Za-z0-9]/gi, yellowblock );

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