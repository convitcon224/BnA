var acc = document.getElementsByClassName("accordion");

// Animating the accordion
for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    // Close the accordion
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else { // Open the accordion
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}