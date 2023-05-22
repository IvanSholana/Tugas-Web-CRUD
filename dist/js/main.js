$(document).ready(function () {
  var slides = $(".carousel-item");
  var currentItem = 0;
  var slidesWidth = slides.width();
  var slidesTotal = slides.length;

  function nextSlide() {
    if (currentItem < slidesTotal - 1) {
      currentItem++;
    }

    if (currentItem == slidesTotal) {
      var translateXValue = -1 * currentItem * slidesWidth - 40;
    } else {
      var translateXValue = -1 * currentItem * slidesWidth - 20;
    }

    slides.css("transform", "translateX(" + translateXValue + "px)");
  }

  function prevSlide() {
    if (currentItem > 0) {
      currentItem--;
    }

    if (currentItem == 0) {
      var translateXValue = -1 * currentItem * slidesWidth;
    } else {
      var translateXValue = -1 * currentItem * slidesWidth - 20;
    }

    slides.css("transform", "translateX(" + translateXValue + "px)");
  }

  $(".next-button").click(function () {
    nextSlide();
    console.log(currentItem);
  });

  $(".prev-button").click(function () {
    prevSlide();
    console.log(currentItem);
  });
});
