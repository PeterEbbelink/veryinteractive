$( document ).ready(function() {
  var mottos = [
    "Every lie creates a parallel world",
    "experiment: play",
    "one love",
    "this too shall pass",
    "Don't code like THOT",
    "Don't Worry, Be Hopi",
    "Forever Whatever",
    "Look up more",
    "Well, I would not say that I was in the great class, but I had a great time while I was trying to be great",
    "Design is for lovers",
    "New and improving",
    "Creativity is just connecting things",
    "Get linked",
    "new little words",
    "Everything is raw material",
    "Give me internet or give me internet"
  ];

  var punctuations = [
    "."
  ];

  var randomizer = function(array) {
    return array[Math.floor(Math.random()*array.length)];
  };

  $('.motto').html(randomizer(mottos) + (randomizer(punctuations)));

});