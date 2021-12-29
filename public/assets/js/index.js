var slideIndex = 1;
var slideIndex2 = 1;
showSlides(slideIndex);
showSlides2(slideIndex2);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function plusSlides2(n) {
  showSlides2(slideIndex2 += n);
}

function currentSlide2(n) {
  showSlides(slideIndex2 = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  /*slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}
  slides[slideIndex-1].style.display = "block";
  setTimeout(showSlides, 2000);*/
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}

function showSlides2(n) {
  var j;
  var slides = document.getElementsByClassName("mySlides2");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex2 = 1}
  if (n < 1) {slideIndex2 = slides.length}
  for (j = 0; j < slides.length; j++) {
      slides[j].style.display = "none";
  }
  for (j = 0; j < dots.length; j++) {
      dots[j].className = dots[j].className.replace(" active", "");
  }
  /*slideIndex2++;
  if (slideIndex2 > slides.length) {slideIndex2 = 1}
  slides[slideIndex2-1].style.display = "block";
  setTimeout(showSlides2, 2000);*/
  slides[slideIndex2-1].style.display = "block";
  dots[slideIndex2-1].className += " active";
}