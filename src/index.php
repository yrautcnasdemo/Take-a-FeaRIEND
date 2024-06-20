<?php
session_start();
require_once("connect.php");
require_once("./template/tools.php");

$sql = "SELECT * FROM animaux";
$requete = $db->prepare($sql);
$requete->execute();
$animals = $requete->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="./css/produits/produits.css">
    <link rel="stylesheet" href="./css/produits/produits-responsive.css">
    <link rel="stylesheet" href="./css/fonts.css">
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://www.youtube.com/iframe_api"></script>
    <title>Take a FeaRIEND</title>
</head>

<body>
    <section class="intro">
        <?php require_once("./template/header.php"); ?>
        <div >
            <a href="/happyfriends.php"><img class="happy-box" src="/img/happytreefriends/happytreefriends.png" alt=""></a>
        </div>
        <div >
            <a href="/happyfriends.php"><img class="stickernew" src="/img/icons/stickerNew.png" alt="stickernew"></a>
        </div>

        <article class="text-intro">
            <div>
                <h1 class="title">Take a FeaRIEND</h1>
                <p class="text-content">Bienvenue sur <span class="sub-title">Take a FeaRIEND</span>
                    Votre boutique en ligne pour adopter des Créatures aussi étonnantes qu’amicales.</p>
                <p class="text-content2">*Nous déclinons toutes reponsabilitées en cas de mort brutale</p>
            </div>
        </article>
    </section>

    <section class="category-box">
    <a href="domestiques.php" class="category-link">
        <div class="little-box category-1">
            <p class="category-text">Animaux domestiques</p>
        </div>
    </a>
    <a href="securites.php" class="category-link">
        <div class="little-box category-2">
            <p class="category-text">Animaux de sécurité</p>
        </div>
    </a>
    <a href="dangereux.php" class="category-link">
        <div class="little-box category-3">
            <p class="category-text">Animaux dangereux</p>
        </div>
    </a>
    </section>

    <section>
        <div class="produce-box">
            <div class="produces-title">
                <h2>Nos Produits</h2>
            </div>
        </div>
        <article class="produces-cards">
            <div class="container-produce">

                <?php
                // Mélanger les animaux de manière aléatoire
                shuffle($animals);
                // Déclaration de la variable counter pour limiter les cartes affichées sur l'index
                $counter = 0;
                // Boucle foreach pour afficher et limiter à 4 cartes les animaux de la BDD
                foreach ($animals as $animal) {
                    if ($counter < 4) {
                        // Définir le chemin de l'image pour chaque animal
                        if (!empty($animal['images'])) {
                            $imagePath = $animal['images'];
                        } else {
                            $imagePath = 'img/upload_animaux/nointernet.jpg';
                        }
                ?>

                        <div class="card-produce">
                            <img class="img-produce" src="<?= htmlspecialchars($imagePath); ?>" alt="Image de <?= htmlspecialchars($animal['name']); ?>">
                            <div class="intro-produce"><a href="detail.php?id=<?= htmlspecialchars($animal['id']); ?>" class="txt-deco">
                                    <h4 class="text-h4"><?= htmlspecialchars($animal["name"]); ?></h4>
                                    <div class="txt-limit">
                                        <p class="text-p"><?= htmlspecialchars($animal["content"]); ?></p>
                                    </div>    
                                </a>
                                <form action="" method="post" class="center-btn">
                                    <input type="hidden" name="animal_id" value="<?= htmlspecialchars($animal['id']); ?>">
                                    <button type="submit" name="ajouter_panier" class="panier" value="1">Ajouter au panier</button>
                                </form>
                            </div>
                        </div>
                <?php
                        $counter++;
                    } else {
                        break;
                    }
                } ?>
            </div>
        </article>
    </section>

    <section class="discount">
        <div class="discount-pub">
            <div class="discount-left">
                <h4 class="discount-title">DEAL OF THE DAY</h4>
            </div>
            <div class="discount-price">
                <p>30% de réduction</p>
            </div>
            <div class="discount-btn">
                <button class="discount-buy">Acheter</button>
            </div>
        </div>
        <div class="discount-produce">
            <?php foreach ($animals as $animal) : ?>
                <?php if ($animal['id'] == 35) : ?>
                    <div class="card-produce">
                        <video width="350" height="560" controls>
                            <source src="/img/deal/Meg.mp4" type="video/mp4">
                        </video>
                        <div class="intro-produce">
                            <a href="detail.php?id=<?= htmlspecialchars($animal['id']); ?>" class="txt-deco">
                                <h4 class="text-h4"><?= htmlspecialchars($animal["name"]); ?></h4>
                                <p class="text-p"><?= htmlspecialchars($animal["content"]); ?></p>
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </section>
    <script src="/js/script.js"></script>
</body>

<?php
require_once("./template/footer.php");
?>

</html>