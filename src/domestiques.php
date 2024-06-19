<?php

session_start();

require_once("connect.php");

$sql = "SELECT * FROM animaux WHERE category = 'animaux domestiques'";

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
    <title>Animaux domestiques</title>
</head>

<body>

    <main>
        <?php require_once("./template/header.php") ?>
        <section class="image-illustration"></section>
        <section class="cards-section">
            <h2>Animaux doméstiques</h2>
            <div class="container-domestique">
                <div class="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <article class="container-cards">
                                <figure>
                                    <img src="./img/domestiques/0f5fabd8.png" alt="Chat-Dragon">
                                    <figcaption>
                                        <div class="intro-card"><a href="detail.php">
                                                <h3>Chagon</h3>
                                                <p>
                                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis rerum laudantium, ad deserunt quibusdam corrupti aut, recusandae alias dolores ex expedita quaerat a in et.
                                                </p>
                                                <button class="panier">Ajouter au panier</button>
                                            </a>
                                        </div>
                                    </figcaption>
                                </figure>
                            </article>
                        </div>
                        <div class="carousel-item">
                            <article class="container-cards">
                                <figure>
                                    <img src="./img/domestiques/105135.png" alt="Moustique-Migale">
                                    <figcaption>
                                        <div class="intro-card"><a href="detail.php">
                                                <h3>Moustigale</h3>
                                                <p>
                                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis rerum laudantium, ad deserunt quibusdam corrupti aut, recusandae alias dolores ex expedita quaerat a in et.
                                                </p>
                                                <button class="panier">Ajouter au panier</button>
                                            </a>
                                        </div>
                                    </figcaption>
                                </figure>
                            </article>
                        </div>
                        <div class="carousel-item">
                            <article class="container-cards">
                                <figure>
                                    <img src="./img/domestiques/105309.png" alt="Poisson-Méduse">
                                    <figcaption>
                                        <div class="intro-card"><a href="detail.php">
                                                <h3>Poiduse</h3>
                                                <p>
                                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis rerum laudantium, ad deserunt quibusdam corrupti aut, recusandae alias dolores ex expedita quaerat a in et.
                                                </p>
                                                <button class="panier">Ajouter au panier</button>
                                            </a>
                                        </div>
                                    </figcaption>
                                </figure>
                            </article>
                        </div>
                        <div class="carousel-item">
                            <article class="container-cards">
                                <figure>
                                    <img src="./img/domestiques/105356.png" alt="Scolopendre-Loup">
                                    <figcaption>
                                        <div class="intro-card"><a href="detail.php">
                                                <h3>Scololoup</h3>
                                                <p>
                                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis rerum laudantium, ad deserunt quibusdam corrupti aut, recusandae alias dolores ex expedita quaerat a in et.
                                                </p>
                                            </a>
                                            <button class="panier">Ajouter au panier</button>
                                        </div>
                                    </figcaption>
                                </figure>
                            </article>
                        </div>
                        <div class="carousel-item">
                            <article class="container-cards">
                                <figure>
                                    <img src="./img/domestiques/105644.png" alt="FrelonAsiatique-Migale">
                                    <figcaption>
                                        <div class="intro-card"><a href="detail.php">
                                                <h3>Fresiale</h3>
                                                <p>
                                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis rerum laudantium, ad deserunt quibusdam corrupti aut, recusandae alias dolores ex expedita quaerat a in et.
                                                </p>
                                            </a>
                                            <button class="panier">Ajouter au panier</button>
                                        </div>
                                    </figcaption>
                                </figure>
                            </article>
                        </div>
                        <div class="carousel-item">
                            <article class="container-cards">
                                <figure>
                                    <img src="./img/domestiques/105843.png" alt="Requin-Crocodile">
                                    <figcaption>
                                        <div class="intro-card"><a href="detail.php">
                                                <h3>Croquin</h3>
                                                <p>
                                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis rerum laudantium, ad deserunt quibusdam corrupti aut, recusandae alias dolores ex expedita quaerat a in et.
                                                </p>
                                            </a>
                                            <button class="panier">Ajouter au panier</button>
                                        </div>
                                    </figcaption>
                                </figure>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </section>





        <section class="desktop-flex">
            <h2>Animaux doméstiques</h2>
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
                                    <button class="panier">Ajouter au panier</button>
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