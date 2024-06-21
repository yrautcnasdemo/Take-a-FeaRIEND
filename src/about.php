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

<body>
    <section class="about-page">
    <h1 class="about-main-title">A propos de nous</h1>
        <div>
            <img class="about-img-border" src="/img/WIN_20240621_08_41_28_Pro.jpg" alt="Binome">
        </div>
        <div class="about-duo">
            <div class="about-description">
                <h2 class="about-title">Gregory</h2>
                <p class="about-text-title">Chevaucheur de Godzilla & responsable des tailles crayons</p>
                <div class="about-card-compil">
                <div class="about-stat-size">
                    <div class="card-stat">
                        <h5 class="card-txt-about-title">force:</h5>
                        <p class="card-txt-about">Peut soulever un ordinateur portable d'une main, tout en tenant une tasse de café de l'autre.</p>
                    </div>
                </div>
                <div class="about-stat-size">
                    <div class="card-stat">
                        <h5 class="card-txt-about-title">Perception:</h5>
                        <p class="card-txt-about">Arrive à comprendre des commentaires de code laissés par lui-même il y a plus de 6 mois.</p>
                    </div>
                </div>
                <div class="about-stat-size">
                    <div class="card-stat">
                        <h5 class="card-txt-about-title">Endurance</h5>
                        <p class="card-txt-about">Capable de suivre un tutoriel de 3 heures sans s’endormir.</p>
                    </div>
                </div>
                <div class="about-stat-size">
                    <div class="card-stat">
                        <h5 class="card-txt-about-title">Charisme:</h5>
                        <p class="card-txt-about">Peut convaincre Erwann que "travailler à distance" est aussi productif que "travailler en formation".</p>
                    </div>
                </div>
                <div class="about-stat-size">
                    <div class="card-stat">
                        <h5 class="card-txt-about-title">Intelligence:</h5>
                        <p class="card-txt-about">Sait que "redémarrer le serveur" est souvent la solution la plus rapide.</p>
                    </div>
                </div>
                <div class="about-stat-size">
                    <div class="card-stat">
                        <h5 class="card-txt-about-title">Agilité:</h5>
                        <p class="card-txt-about">Tombe parfois de sa chaise, mais retrouve toujours son poste de travail.</p>
                    </div>
                </div>
                <div class="about-stat-size">
                    <div class="card-stat">
                        <h5 class="card-txt-about-title">Chance:</h5>
                        <p class="card-txt-about">A réussi à éviter tous les bugs liés au changement d'heure cette année.</p>
                    </div>
                </div>
                </div>  
            </div>

            <div class="about-description">
                <h2 class="about-title">Guilain</h2>
                <p class="about-text-title">Dresseur de Megalodon & responsable des portes ouvertes</p>
                <div class="about-card-compil">
                <div class="about-stat-size">
                    <div class="card-stat">
                        <h5 class="card-txt-about-title">force:</h5>
                        <p class="card-txt-about">Peut déplacer sa souris d'une main sans aide extérieure.</p>
                    </div>
                </div>
                <div class="about-stat-size">
                    <div class="card-stat">
                        <h5 class="card-txt-about-title">Perception:</h5>
                        <p class="card-txt-about">Peut distinguer un espace d'une tabulation à l'œil nu (surtout en mode dark).</p>
                    </div>
                </div>
                <div class="about-stat-size">
                    <div class="card-stat">
                        <h5 class="card-txt-about-title">Endurance</h5>
                        <p class="card-txt-about">Peut supporter Gregory en binôme pendant 2 semaines sans tentative d'homicide.</p>
                    </div>
                </div>
                <div class="about-stat-size">
                    <div class="card-stat">
                        <h5 class="card-txt-about-title">Charisme:</h5>
                        <p class="card-txt-about">Arrive à faire croire qu'il travaille en ayant l'air sérieux, mais passe son temps à écrire des textes stupides.</p>
                    </div>
                </div>
                <div class="about-stat-size">
                    <div class="card-stat">
                        <h5 class="card-txt-about-title">Intelligence:</h5>
                        <p class="card-txt-about">Sait exactement combien de temps il peut coder sans commit ni sauvegarder avant que tout ne crash.</p>
                    </div>
                </div>
                <div class="about-stat-size">
                    <div class="card-stat">
                        <h5 class="card-txt-about-title">Agilité:</h5>
                        <p class="card-txt-about">Arrive à coder tout en esquivant les attaques de son chat.</p>
                    </div>
                </div>
                <div class="about-stat-size">
                    <div class="card-stat">
                        <h5 class="card-txt-about-title">Chance:</h5>
                        <p class="card-txt-about">A réussi à faire fonctionner Internet Explorer du premier coup... une fois, en 2006.</p>
                    </div>
                </div>
                </div> 
            </div>
        </div>
    </section>

</body>
<script src="/js/script.js"></script>
<?php
require_once("./template/footer.php");
?>
</html>
