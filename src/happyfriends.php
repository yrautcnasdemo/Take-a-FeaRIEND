<?php

session_start();

require_once("connect.php");

if (isset($_POST['ajouter_panier'])) {
    if (isset($_POST["animal_id"]) && isset($_SESSION["user"]["id"])) {
        $animal_id = strip_tags($_POST["animal_id"]);
        $user_id = $_SESSION["user"]["id"];

        $sql = "SELECT * FROM panier WHERE user_id = :user_id AND animal_id = :animal_id ";
        $query = $db->prepare($sql);

        $query->bindValue(":user_id", $user_id);
        $query->bindValue(":animal_id", $animal_id);

        $query->execute();

        $panier = $query->fetch(PDO::FETCH_ASSOC);

        if (!empty($panier)) {
            // On vérifie si le panier contient déjà un article similaire
            $quantite = $panier["quantity"];
            $quantite++;
            $panier_id = $panier['id'];

            $sql = "UPDATE panier SET quantity = :quantity WHERE id = :panier_id";
            $query = $db->prepare($sql);

            $query->bindValue(":quantity", $quantite);
            $query->bindValue(":panier_id", $panier_id);

            $query->execute();
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

$sql = "SELECT * FROM animaux WHERE category = 'Happy tree Friends'";

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
    <title>Happy Three Friends</title>
</head>

<body>

    <main>
        <?php require_once("./template/header.php") ?>
        <section class="image-illustration-happy"></section>
        <section class="cards-section">
            <h2>Happy Tree Friends</h2>
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
                                                    <h3 class="text-h4"><?php echo $animal['name']; ?></h3>
                                                    <div class="txt-limit">
                                                        <p class="text-p">
                                                            <?php echo $animal['content']; ?>
                                                        </p>
                                                    </div>
                                                </a>
                                                <form action="" method="post" class="center-btn">
                                                    <input type="hidden" name="animal_id" value="<?= htmlspecialchars($animal['id']); ?>">
                                                    <button type="submit" name="ajouter_panier" class="panier" value="1">Ajouter au panier</button>
                                                </form>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <p class="info">* Un don de 100€ pour les personnes qui arrivent à les garder vivants</p>
        </section>

        <section class="desktop-flex">
            <h2>Happy Tree Friends</h2>
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
                                        <h3 class="text-h4"><?= htmlspecialchars($animal["name"]); ?></h3>
                                        <div class="txt-limit">
                                            <p class="text-p"><?= htmlspecialchars($animal["content"]); ?></p>
                                        </div>
                                    </a>
                                    <form action="" method="post" class="center-btn">
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
            <p class="info">* Un don de 100€ pour les personnes qui arrivent à les garder vivants</p>
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

    <audio id="background-audio" src="./img/deal/HappyTreeFriends.mp3"></audio>

</body>
<script src="./js/script.js"></script>

</html>