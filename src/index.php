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
    <title>Take a FeaRIEND</title>
</head>

<body>
    <section class="intro">
        <?php require_once("./template/header.php"); ?>

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
        <div class="little-box category-1">
            <p>Animaux domestiques</p>
        </div>
        <div class="little-box category-2">
            <p>Animaux de sécurité</p>
        </div>
        <div class="little-box category-3">
            <p>Animaux PRESQUE <br> adoptables</p>
        </div>
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
                            <img class="img-produce" src="<?= htmlspecialchars($imagePath, ENT_QUOTES, 'UTF-8'); ?>" alt="Image de <?= htmlspecialchars($animal['name'], ENT_QUOTES, 'UTF-8'); ?>">
                            <div class="intro-produce"><a href="detail.php?id=<?= htmlspecialchars($animal['id'], ENT_QUOTES, 'UTF-8'); ?>" class="txt-deco">
                                    <h4 class="text-h4"><?= htmlspecialchars($animal["name"], ENT_QUOTES, 'UTF-8'); ?></h4>
                                    <p class="text-p"><?= htmlspecialchars($animal["content"], ENT_QUOTES, 'UTF-8'); ?></p>
                                </a>
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
            <div class="card-produce"><a href="detail.php" class="txt-deco">
                    <img class="img-produce" src="/img/domestiques/105843.png" alt="Animated Card-produce Hover Effect Html & CSS">
                    <div class="intro-produce">
                        <h4 class="text-h4">Smileur</h4>
                        <p class="text-p">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis rerum laudantium, ad deserunt quibusdam corrupti aut, recusandae alias dolores ex expedita quaerat a in et.
                        </p>
                </a>
            </div>
        </div>
        </div>
    </section>
    <script src="/js/script.js"></script>
</body>

<?php
require_once("./template/footer.php");
?>
</html>
