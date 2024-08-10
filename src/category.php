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
    <section class="category-intro">
        <h1 class="category-title">Chose your friend !</h1>
    </section>

    <section>
        <div class="container-category">
            <div class="card-produce">
                <img class="img-produce" src="./img/domestiques/chatonresize.png" alt="animaux domestique">
                <div class="intro-produce"><a href="domestiques.php" class="txt-deco">
                        <h4 class="text-h4">Animaux domestiques</h4>
                        <p class="text-p">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur ab perspiciatis earum molestiae illum omnis optio hic ex modi eaque cumque a, incidunt sit saepe repellendus laudantium cum beatae error!
                            Dignissimos natus minus harum veritatis, quos vitae aspernatur, ab laudantium quis repudiandae dicta saepe hic inventore, quod ipsam esse deleniti perspiciatis corrupti maiores.
                    </a>
                </div>
            </div>

            <div class="card-produce">
                <img class="img-produce" src="./img/securites/105547.png" alt="Animaux de sécurité">
                <div class="intro-produce"><a href="securites.php" class="txt-deco">
                        <h4 class="text-h4">Animaux de sécurité</h4>
                        <p class="text-p">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur ab perspiciatis earum molestiae illum omnis optio hic ex modi eaque cumque a, incidunt sit saepe repellendus laudantium cum beatae error!
                            Dignissimos natus minus harum veritatis, quos vitae aspernatur, ab laudantium quis repudiandae dicta saepe hic inventore, quod ipsam esse deleniti perspiciatis corrupti maiores.
                    </a>
                </div>
            </div>

            <div class="card-produce">
                <img class="img-produce" src="./img/dangereux/105856.png" alt="Animaux PRESQUE adoptables">
                <div class="intro-produce"><a href="dangereux.php" class="txt-deco">
                        <h4 class="text-h4">Animaux PRESQUE adoptables</h4>
                        <p class="text-p">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur ab perspiciatis earum molestiae illum omnis optio hic ex modi eaque cumque a, incidunt sit saepe repellendus laudantium cum beatae error!
                            Dignissimos natus minus harum veritatis, quos vitae aspernatur, ab laudantium quis repudiandae dicta saepe hic inventore, quod ipsam esse deleniti perspiciatis corrupti maiores.
                    </a>
                </div>
            </div>

            <div class="card-produce">
                <img class="img-produce" src="./img/happytreefriends/happytreefriends.png" alt="Happy tree friends">
                <div class="intro-produce"><a href="happyfriends.php" class="txt-deco">
                        <h4 class="text-h4">Les Happy tree friends</h4>
                        <p class="text-p">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur ab perspiciatis earum molestiae illum omnis optio hic ex modi eaque cumque a, incidunt sit saepe repellendus laudantium cum beatae error!
                            Dignissimos natus minus harum veritatis, quos vitae aspernatur, ab laudantium quis repudiandae dicta saepe hic inventore, quod ipsam esse deleniti perspiciatis corrupti maiores.
                    </a>
                </div>
            </div>
    </section>
</body>
<script src="/js/script.js"></script>
<?php
require_once("./template/footer.php");
?>

</html>