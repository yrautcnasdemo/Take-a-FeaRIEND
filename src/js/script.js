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

setInterval(showNextSlide, 3000);

// Ajout des quantités et le mettre à jour

document.addEventListener("DOMContentLoaded", () => {
  const articles = document.querySelectorAll(".produits-articles");

  articles.forEach((article) => {
    const decreaseButton = article.querySelector(".decrease");
    const increaseButton = article.querySelector(".increase");
    const quantityDisplay = article.querySelector(".quantity");
    const priceDisplay = article.querySelector(".price");
    const unitPrice = parseInt(priceDisplay.getAttribute("data-unitPrice"));

    let quantity = parseInt(quantityDisplay.textContent);
    updatePrice(quantity, priceDisplay, unitPrice);

    decreaseButton.addEventListener("click", () => {
      let quantity = parseInt(quantityDisplay.textContent);
      if (quantity > 1) {
        quantity--;
        quantityDisplay.textContent = quantity;
        updatePrice(quantity, priceDisplay, unitPrice);
      }
    });

    increaseButton.addEventListener("click", () => {
      let quantity = parseInt(quantityDisplay.textContent);
      quantity++;
      quantityDisplay.textContent = quantity;
      updatePrice(quantity, priceDisplay, unitPrice);
    });
  });

  function updatePrice(quantity, priceDisplay, unitPrice) {
    const totalPrice = unitPrice * quantity;
    priceDisplay.textContent = `${totalPrice}€`;
  }
});

// Faire la checkbox pour tout sélectionner avec un checkbox

document.addEventListener("DOMContentLoaded", function () {
  const selectAllPromoCheckbox = document.getElementById(
    "selectAllPromoCheckbox"
  );
  const deleteCheckboxes = document.querySelectorAll(
    'input[name="delete_ids[]"]'
  );

  // Ecouter les changements sur la checkbox "Sélectionner tout (Promotion)"
  selectAllPromoCheckbox.addEventListener("change", function () {
    deleteCheckboxes.forEach((checkbox) => {
      checkbox.checked = selectAllPromoCheckbox.checked;
    });
  });
});

document.getElementById("image").addEventListener("change", function () {
  var reader = new FileReader();

  reader.onload = function (e) {
    document
      .getElementById("previewImage")
      .setAttribute("src", e.target.result);
    document.getElementById("previewImage").style.display = "block";
    document.getElementById("uploadLabel").style.display = "none"; // Masque le label "Uploader une photo"
  };

  reader.readAsDataURL(this.files[0]);
});
