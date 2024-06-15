<?php 
    session_start();
    require_once("connect.php");
    require_once("./template/header.php");

    define('_ASSET_IMG_PATH_','img/');

    if(!isset($_GET['id'])){
        die('Id pas trouvé');
    }

    $id = $_GET['id'];

    $sql = "SELECT * FROM animaux WHERE id = :id";
    $requete = $db->prepare($sql);
    $requete->bindValue(':id', $id, PDO::PARAM_INT);
    $requete->execute();

    $animal = $requete->fetch(PDO::FETCH_ASSOC);

    if (!$animal) {
        die("Animal pas trouvé");
    }

    $imagePath = _ASSET_IMG_PATH_ . 'nointernet.jpg'; // Valeur par défaut
    if (!empty($animal['images'])) {
        $imagePath = _ASSET_IMG_PATH_ . $animal['images'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="./css/produits/produits.css">
    <link rel="stylesheet" href="./css/produits/produits-responsive.css">
    <link rel="stylesheet" href="./css/fonts.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>Détails de <?= htmlspecialchars($animal["name"], ENT_QUOTES, 'UTF-8') ?></title>
</head>

<body class="detail-body">
    <main class="container">
        <div class="row">
            <section class="col-12">

                <div class="bg-dark row flex-lg-row-reverse align-items-center g-5 pb-5 detail-card">
                    <div class="col-10 col-sm-8 col-lg-6">
                    <img src="<?= $imagePath; ?>" class="d-block mx-lg-auto" alt="Bootstrap Themes" width="auto" height="600px" loading="lazy">
                    </div>
                    <div class="col-lg-6">
                            <h1 class="detail-name"><?= $animal['name'] ?></h1>
                            <p class="detail-id">ID: <?= $animal['id'] ?></p>
                            <p class="detail-category">Catégorie: <?= $animal['category'] ?></p>
                            <p class="detail-description">Description: </p>
                            <p class="detail-description"><?= $animal['content'] ?></p>
                            <p class="detail-price">Prix: <?= $animal['price'] ?>€</p>
                            <button type="button" class="btn btn-outline-warning btn-buy">+ Panier</button>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <?php
    require_once("./template/footer.php");


    ?>


<!-- EN DURE <img src="/img/dangereux/105813.png" class="d-block mx-lg-auto" alt="Bootstrap Themes" width="auto" height="600px" loading="lazy"> -->
    <!-- EN PHP CODE <img src="/img/dangereux/<POINTDINTERROGATION=$animal['image']?>" class="d-block mx-lg-auto" alt="Bootstrap Themes" width="auto" height="600px" loading="lazy"> -->