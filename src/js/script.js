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

// Ajout des quantités et le mettre à jour

document.addEventListener("DOMContentLoaded", () => {
  const decreaseButton = document.getElementById("decrease");
  const increaseButton = document.getElementById("increase");
  const quantityDisplay = document.getElementById("quantity");
  const priceDisplay = document.getElementById("price");
  const unitPrice = 275; // prix par article

  decreaseButton.addEventListener("click", () => {
    let quantity = parseInt(quantityDisplay.textContent);
    if (quantity > 1) {
      quantity--;
      quantityDisplay.textContent = quantity;
      updatePrice(quantity);
    }
  });

  increaseButton.addEventListener("click", () => {
    let quantity = parseInt(quantityDisplay.textContent);
    quantity++;
    quantityDisplay.textContent = quantity;
    updatePrice(quantity);
  });

  function updatePrice(quantity) {
    const totalPrice = unitPrice * quantity;
    priceDisplay.textContent = `${totalPrice}€`;
  }
});
