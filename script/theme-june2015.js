// Camera shutter effect

var audioElement = document.createElement('audio');
audioElement.setAttribute('src', '/sounds/camera_shutter.mp3');
audioElement.setAttribute('autoplay', 'autoplay');

$.get();

function cameraSound() {
  if (audioElement.paused) {
    console.log("it's paused");
    audioElement.play();
  }
  else {
    audioElement.play();
    console.log("you played it");
  }
}

audioElement.addEventListener("load", function() {
  cameraSound();
}, true);

$('html, body, a').click(function() {
  cameraSound();
});