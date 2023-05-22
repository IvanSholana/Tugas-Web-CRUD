$(document).ready(function () {
  var slides = $(".carousel-slide");
  var currentItem = 0;
  var slidesWidth = slides.width();
  var slidesTotal = slides.length;

  function updateSlidePosition(tambah) {
    var translateXValue = -1 * currentItem * slidesWidth - tambah;
    slides.css("transform", "translateX(" + translateXValue + "px)");
  }

  function nextSlide() {
    if (currentItem < slidesTotal - 1) {
      currentItem++;
      updateSlidePosition(38);
    }
  }

  function prevSlide() {
    if (currentItem > 0) {
      currentItem--;
      updateSlidePosition(0);
    }
  }

  $(window).resize(function () {
    slidesWidth = slides.width();
    updateSlidePosition();
  });

  $(".next-button").click(function () {
    nextSlide();
  });

  $(".prev-button").click(function () {
    prevSlide();
  });
});
