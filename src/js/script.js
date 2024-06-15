const nav = document.getElementById("nav");
const menuBurger = document.getElementById("burger");

menuBurger.addEventListener("click", () => {
  nav.classList.toggle("active");
  menuBurger.classList.toggle("active");
});

// Fonction pour afficher ou masquer la flèche en fonction du défilement
function toggleScrollTopButton() {
  var scrollButton = document.getElementById("scroll-to-top");
  if (window.scrollY > 500 && scrollButton.style.display !== "block") {
    scrollButton.style.display = "block";
  } else if (window.scrollY <= 500 && scrollButton.style.display !== "none") {
    scrollButton.style.display = "none";
  }
}

// SLIDESLOW

const carouselInner = document.querySelector(".carousel-inner");
const carouselItems = document.querySelectorAll(".carousel-item");
let currentIndex = 0;

function showNextSlide() {
  currentIndex = (currentIndex + 1) % carouselItems.length;
  carouselInner.style.transform = `translateX(-${currentIndex * 100}%)`;
}

setInterval(showNextSlide, 3000); // Change slide every 3 seconds
