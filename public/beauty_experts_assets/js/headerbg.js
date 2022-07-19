var section_main = document.querySelector('#section-main');
var bgImageArray = ["g2.png", "g3.png", "g4.png", "g5.png", "g6.png", "g7.png", "g8.png", "g9.png", "g1.png"],
  base = "./assets/images/fallback/",
  secs = 2;
bgImageArray.forEach(function (img) {
  new Image().src = base + img;
  // caches images, avoiding white flash between background replacements
});

function backgroundSequence() {
  window.clearTimeout();
  var k = 0;
  for (i = 0; i < bgImageArray.length; i++) {
    setTimeout(function () {
      section_main.style.backgroundImage = "url(" + base + bgImageArray[k] + ")";
      if ((k + 1) === bgImageArray.length) { setTimeout(function () { backgroundSequence() }, (secs * 1000)) } else { k++; }
    }, (secs * 1000) * i)
  }
}
backgroundSequence();