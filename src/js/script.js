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

// Sound Happy Tree Friends
// let sound = new Audio("../img/deal/HappyTreeFriends.mp3");

// document.addEventListener("DOMContentLoaded", function () {
//   let audio = document.getElementById("background-audio");

//   audio.addEventListener("canplaythrough", function () {
//     var playPromise = audio.play();
//     if (playPromise !== undefined) {
//       playPromise
//         .then(function () {
//           alert("ça marche");
//         })
//         .catch(function (error) {
//           var playButton = document.createElement("button");
//           playButton.innerText = "Play Audio";
//           document.body.appendChild(playButton);
//           playButton.addEventListener("click", function () {
//             audio.play();
//             playButton.style.display = "none"; // Masquer le bouton après lecture
//           });
//         });
//     }
//   });
// });

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

paypal
  .Buttons({
    createOrder: function (data, actions) {
      return actions.order.create({
        purchase_units: [
          {
            amount: {
              value: "0.01", // Le montant à payer
            },
          },
        ],
      });
    },
    onApprove: function (data, actions) {
      return actions.order.capture().then(function (details) {
        alert("Transaction completed by " + details.payer.name.given_name);
        // Ici, vous pouvez rediriger l'utilisateur ou enregistrer les détails de la transaction
      });
    },
    onError: function (err) {
      console.error("An error occurred during the transaction", err);
      alert(
        "Une erreur s'est produite lors de la transaction. Veuillez réessayer."
      );
    },
  })
  .render("#paypal-button-container");
