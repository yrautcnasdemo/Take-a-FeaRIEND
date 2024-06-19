<?php

session_start();

if (isset($_SESSION['user']['id'])) {
    $user_id = $_SESSION['user']['id'];

    // Requête pour récupérer les articles dans le panier de l'utilisateur
    $sql = "SELECT p.*, a.name, a.price, a.images, p.quantity as quantity_in_cart
            FROM panier p 
            JOIN animaux a ON p.animal_id = a.id 
            WHERE p.user_id = :user_id";

    $query = $db->prepare($sql);
    $query->bindValue(":user_id", $user_id);
    $query->execute();
    $panier_item = $query->fetchAll(PDO::FETCH_ASSOC);

    // Traitement de l'ajout d'un nouvel article au panier
    if ($_POST) {
        if (
            isset($_POST["user_id"]) &&
            isset($_POST["animal_id"]) &&
            isset($_POST["quantity"])
        ) {
            $user_id = strip_tags($_POST["user_id"]);
            $animal_id = strip_tags($_POST["animal_id"]);
            $quantity = strip_tags($_POST["quantity"]);

            // Insertion dans la table 'panier'
            $sql = "INSERT INTO panier (user_id, animal_id, quantity) VALUES (:user_id, :animal_id, :quantity)";
            $query = $db->prepare($sql);
            $query->bindValue(":user_id", $user_id);
            $query->bindValue(":animal_id", $animal_id);
            $query->bindValue(":quantity", $quantity);
            $query->execute();

            // Fermeture de la connexion à la base de données
            require_once("close.php");

            // Redirection vers la page 'domestiques.php' après l'ajout
            header("Location: domestiques.php");
            exit();
        }
    }
} else {
    // Débogage temporaire pour afficher le contenu de la session
    echo "Session user_id non définie. Contenu de la session : ";
    var_dump($_SESSION);

    // Redirection vers la page de connexion si 'user_id' n'est pas défini
    header("Location: ConnexionUser.php");
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
            <h2>Votre panier <!-- Nom utilisateur et prénom --></h2>
            <div class="container-articles">
                <?php
                // Boucle foreach pour afficher les animaux de la BDD
                foreach ($panier_item as $animal) {
                    // Définir le chemin de l'image pour chaque animal
                    if (!empty($animal['images'])) {
                        $imagePath = $animal['images'];
                    } else {
                        $imagePath = 'img/upload_animaux/nointernet.jpg';
                    }
                ?>
                    <article class="produits-articles">
                        <figure>
                            <img src="<?= htmlspecialchars($imagePath); ?>" alt="Image de <?= htmlspecialchars($animal['name']); ?>">
                            <figcaption>
                                <h3><?= htmlspecialchars($animal["name"]); ?></h3>
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
                        </figure>
                    </article>
                <?php
                }
                ?>

            </div>
        </section>

        <?php
        require_once("./template/footer.php");
        ?>
</body>
<script src="./js/script.js"></script>

</html>