<?php
session_start();

require_once("connect.php");

if ($_POST) {
    if (
        isset($_POST["user_id"]) &&
        isset($_POST["animal_id"]) &&
        isset($_POST["quantity"])
    ) {


        $user_id = strip_tags($_POST["user_id"]);
        $animal_id = strip_tags($_POST["animal_id"]);
        $quantity = strip_tags($_POST["quantity"]);
    }

    $sql = "INSERT INTO panier (user_id, animal_id, quantity) VALUES (:user_id, :animal_id, :quantity)";
    $query = $db->prepare($sql);

    $query->bindValue(":user_id", $user_id);
    $query->bindValue(":animal_id", $animal_id);
    $query->bindValue(":quantity", $quantity);

    $query->execute();

    require_once("close.php");

    header("Location: domestiques.php");
    exit();
}





?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/fonts.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/panier/panier.css">
    <link rel="stylesheet" href="./css/panier/panier-responsive.css">
    <link rel="stylesheet" href="./css/produits/produits.css">
    <link rel="stylesheet" href="./css/produits/produits-responsive.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Panier</title>
</head>

<body>
    <main>
        <?php require_once("./template/header.php") ?>
        <section class="image-illus"></section>
        <section class="produits">
            <h2>Votre panier</h2>
            <div class="container-articles">
                <article class="produits-articles">
                    <figure>
                        <img src="./img/domestiques/105309.png" alt="test">
                    </figure>
                    <figcaption>
                        <h3>Poiduse</h3>
                        <p class="price">275€</p>
                        <div class="container-figcaption">
                            <div class="figcaption-left">
                                <p class="left-p">Quantité</p>
                                <button class="decrease">-</button>
                                <span class="quantity">1</span>
                                <button class="increase">+</button>
                            </div>
                            <div class="figcaption-right">
                                <button class="delete">Supprimer</button>
                            </div>
                        </div>
                    </figcaption>
                </article>
                <article class="produits-articles">
                    <figure>
                        <img src="./img/domestiques/105309.png" alt="test">
                    </figure>
                    <figcaption>
                        <h3>Poiduse</h3>
                        <p class="price">275€</p>
                        <div class="container-figcaption">
                            <div class="figcaption-left">
                                <p class="left-p">Quantité</p>
                                <button class="decrease">-</button>
                                <span class="quantity">1</span>
                                <button class="increase">+</button>
                            </div>
                            <div class="figcaption-right">
                                <button class="delete">Supprimer</button>
                            </div>
                        </div>
                    </figcaption>
                </article>

            </div>
        </section>

        <?php
        require_once("./template/footer.php");
        ?>
</body>
<script src="./js/script.js"></script>

</html>