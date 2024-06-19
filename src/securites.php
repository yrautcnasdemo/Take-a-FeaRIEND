<?php

session_start();

require_once("connect.php");

if (isset($_POST['ajouter_panier'])) {
    echo "a";
    if (isset($_POST["animal_id"]) && isset($_SESSION["user"]["id"])) {
        echo "b";
        $animal_id = strip_tags($_POST["animal_id"]);
        $user_id = $_SESSION["user"]["id"];

        $sql = "SELECT * FROM panier WHERE user_id = :user_id AND animal_id = :animal_id ";
        $query = $db->prepare($sql);

        $query->bindValue(":user_id", $user_id);
        $query->bindValue(":animal_id", $animal_id);

        $query->execute();
        echo "1";

        $panier = $query->fetch(PDO::FETCH_ASSOC);
        echo "2";

        if (!empty($panier)) {
            // On vérifie si le panier contient déjà un article similaire
            $quantite = $panier["quantity"];
            $quantite++;
            $panier_id = $panier['id'];

            $sql = "UPDATE panier SET quantity = :quantity WHERE id = :panier_id";
            $query = $db->prepare($sql);
            echo "PANIER ID " . $panier_id;

            $query->bindValue(":quantity", $quantite);
            $query->bindValue(":panier_id", $panier_id);

            $query->execute();
            echo "marche";
        } else {
            // Le panier ne contient pas d'article similaire
            $sql = "INSERT INTO panier (user_id, animal_id, quantity) VALUES (:user_id, :animal_id, 1)";
            $query = $db->prepare($sql);

            $query->bindValue(":user_id", $user_id, PDO::PARAM_INT);
            $query->bindValue(":animal_id", $animal_id, PDO::PARAM_INT);

            $query->execute();
        }
    }
}

$sql = "SELECT * FROM animaux WHERE category = 'animaux de sécurités'";

$query = $db->prepare($sql);

$query->execute();

$animals = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/fonts.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/produits/produits.css">
    <link rel="stylesheet" href="./css/produits/produits-responsive.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Animaux de sécurité</title>
</head>

<body>

    <main>
        <?php require_once("./template/header.php") ?>
        <section class="image-illustration"></section>
        <section class="cards-section">
            <h2>Animaux de sécurité</h2>
            <div class="container-domestique">
                <div class="carousel">
                    <div class="carousel-inner">
                        <?php
                        // Boucle foreach pour afficher les animaux de la BDD
                        foreach ($animals as $animal) {
                            if (!empty($animal['images'])) {
                                $imagePath = $animal['images'];
                            } else {
                                $imagePath = 'img/upload_animaux/nointernet.jpg';
                            } ?>

                            <div class="carousel-item">
                                <article class="container-cards">
                                    <figure>
                                        <img src="<?= htmlspecialchars($imagePath); ?>" alt="Image de <?= htmlspecialchars($animal['name']); ?>">
                                        <figcaption>
                                            <div class="intro-card"><a href="detail.php">
                                                    <h3><?php echo $animal['name']; ?></h3>
                                                    <p>
                                                        <?php echo $animal['content']; ?>
                                                    </p>
                                                </a>
                                                <button class="panier">Ajouter au panier</button>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                            </div>

                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>





        <section class="desktop-flex">
            <h2>Animaux de sécurité</h2>
            <div class="container-flex">
                <?php
                // Boucle foreach pour afficher les animaux de la BDD
                foreach ($animals as $animal) {
                    // Définir le chemin de l'image pour chaque animal
                    if (!empty($animal['images'])) {
                        $imagePath = $animal['images'];
                    } else {
                        $imagePath = 'img/upload_animaux/nointernet.jpg';
                    }
                ?>
                    <article class="container-cards">
                        <figure>
                            <img src="<?= htmlspecialchars($imagePath); ?>" alt="Image de <?= htmlspecialchars($animal['name']); ?>">
                            <figcaption>
                                <div class="intro-card">
                                    <a href="detail.php?id=<?= htmlspecialchars($animal['id']); ?>">
                                        <h3><?= htmlspecialchars($animal["name"]); ?></h3>
                                        <p><?= htmlspecialchars($animal["content"]); ?></p>
                                    </a>
                                    <form action="" method="post">
                                        <input type="hidden" name="animal_id" value="<?= htmlspecialchars($animal['id']); ?>">
                                        <button type="submit" name="ajouter_panier" class="panier" value="1">Ajouter au panier</button>
                                    </form>

                                </div>
                            </figcaption>
                        </figure>
                    </article>
                <?php
                }
                ?>
            </div>
        </section>
    </main>
    <footer>
        <div class="container-footer">
            <div class="left-footer">
                <div class="container-left-footer">
                    <h3>Informations</h3>
                    <ul>
                        <li><a href="#">Accueil</a></li>
                        <li><a href="#">A propos</a></li>
                    </ul>
                </div>

                <div class="container-left-footer">
                    <h3>Catégories</h3>
                    <ul>
                        <li><a href="#">Animaux doméstiques</a></li>
                        <li><a href="#">Animaux de sécurité</a></li>
                        <li><a href="#">Animeaux PRESQUE adoptables</a></li>
                    </ul>
                </div>
                <div class="container-promos">
                    <h3>Promotions</h3>
                    <ul>
                        <li><a href="#">Promotion du jour</a></li>
                        <li><a href="#">Promotion de la semaine</a></li>
                    </ul>
                </div>
            </div>

            <div class="container-titre">
                <div class="logo-footer">
                    <img src="./img/logosite.png" alt="Logo Take a FeaRIEND">
                </div>
                <h2>Take a FeaRIEND</h2>
                <p>Nos réseaux pas très sociaux</p>
                <div class="container-logos">
                    <a href="https://twitter.com" class="text-white me-3" target="_blank">
                        <i class="fab fa-twitter fa-2x"></i>
                    </a>
                    <a href="https://facebook.com" class="text-white me-3" target="_blank">
                        <i class="fab fa-facebook-f fa-2x"></i>
                    </a>
                    <a href="https://instagram.com" class="text-white" target="_blank">
                        <i class="fab fa-instagram fa-2x"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="container-reserve">
            <p>© All rights reserved. Guilain et Grég</p>
        </div>
    </footer>


</body>
<script src="./js/script.js"></script>

</html>