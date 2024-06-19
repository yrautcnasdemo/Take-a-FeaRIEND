<?php
    session_start();
    require_once("connect.php");
    require_once("./template/header.php");

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <link rel="stylesheet" href="./css/fonts.css">
        <link rel="stylesheet" href="./css/style.css">
        <link rel="stylesheet" href="./css/produits/produits.css">
        <link rel="stylesheet" href="./css/produits/produits-responsive.css">
        <title>Take a FeaRIEND</title>
    </head>

<body class="category-body">
    <h1 class="about-main-title">A propos de nous</h1>
    <section class="about-section">
    <div class="about-cards">
        <div>
            <img src="/img/icons/cosmogreg.jpg" width="400px" alt="">
        </div>
        <div class="about-description">
            <h2 class="about-title">Gregory</h2>
            <p class="about-text-title">Chevaucheur de Godzilla & responsable des tailles crayons</p>
            <p class="about-text"><span class="about-stat">Force:</span> Peut soulever un ordinateur portable d'une main, tout en tenant une tasse de café de l'autre.</p>
            <p class="about-text"><span class="about-stat">Perception:</span> Arrive à comprendre des commentaires de code laissés par lui-même il y a plus de 6 mois.</p>
            <p class="about-text"><span class="about-stat">Endurance:</span> Capable de suivre un tutoriel de 3 heures sans s’endormir.</p>
            <p class="about-text"><span class="about-stat">Charisme:</span> Peut convaincre Erwann que "travailler à distance" est aussi productif que "travailler au bureau".</p>
            <p class="about-text"><span class="about-stat">Intelligence:</span> Sait que "redémarrer le serveur" est souvent la solution la plus rapide. </p>
            <p class="about-text"><span class="about-stat">Agilité:</span> Tombe parfois de sa chaise, mais retrouve toujours son poste de travail. </p>
            <p class="about-text"><span class="about-stat">Chance:</span> A réussi à éviter tous les bugs liés au changement d'heure cette année.</p>
        </div>
    </div>
    </section>

    <section class="about-section">
    <div class="about-cards">
        <div class="about-description">
            <h2 class="about-title">Guilain</h2>
            <p class="about-text-title">Dresseur de Megalodon & responsable des souris</p>
            <p class="about-text"><span class="about-stat">Force:</span> Peut déplacer sa souris sans aide extérieure.</p>
            <p class="about-text"><span class="about-stat">Perception:</span> Peut distinguer un espace d'une tabulation à l'œil nu (surtout en mode dark).</p>
            <p class="about-text"><span class="about-stat">Endurance:</span> Peut supporter Gregory en binôme pendant 2 semaines sans tentative d'homicide.</p>
            <p class="about-text"><span class="about-stat">Charisme:</span> Arrive à faire croire qu'il travaille en ayant l'air sérieux, mais passe son temps à écrire des textes stupides.</p>
            <p class="about-text"><span class="about-stat">Intelligence:</span> Sait exactement combien de temps il peut coder sans commit ni sauvegarder avant que tout ne crash. </p>
            <p class="about-text"><span class="about-stat">Agilité:</span> Arrive à coder tout en esquivant les attaques de son chat.</p>
            <p class="about-text"><span class="about-stat">Chance:</span> A réussi à faire fonctionner Internet Explorer du premier coup... une fois, en 2006.</p>
        </div>
        <div>
            <img src="/img/icons/yraux.webp" width="400px" alt="">
        </div>
    </div>
    </section>

</body>
<script src="/js/script.js"></script>
<?php
require_once("./template/footer.php");
?>
</html>

<!-- 
<button>GitHub</button>
<button>Contact</button> -->