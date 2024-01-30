var currentSlide = 1;

function showPreviousSlide() {
  if (currentSlide > 1) {
    currentSlide--;
    showSlide(currentSlide);
  }
}

function showNextSlide() {
  if (currentSlide < 2) {
    currentSlide++;
    showSlide(currentSlide);
  }
}

function showSlide(slideIndex) {
  var slideshow1 = document.querySelector('.slide-images.slideshow1');
  var slideshow2 = document.querySelector('.slide-images.slideshow2');

  if (slideIndex === 1) {
    slideshow1.style.display = 'flex';
    slideshow2.style.display = 'none';
  } else {
    slideshow1.style.display = 'none';
    slideshow2.style.display = 'flex';
  }
}


// function updateCat(){
//   document.getElementById("category-button").innerHTML = "ABC";
// }