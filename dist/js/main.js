$(document).ready(function () {
  var slideContainer = $("#carousel");
  var slides = $("#carousel .carousel-slide");
  var widthslide = slides.width();
  var currentIndex = 0;

  function nextSlide() {
    if (currentIndex < slides.length) {
      currentIndex++;
    }
    slideContainer.css(
      "transform",
      "translateX(-" + currentIndex * widthslide + "px)"
    );

    $("#next-buttons").click(function () {
      nextSlide();
    });
  }
});
