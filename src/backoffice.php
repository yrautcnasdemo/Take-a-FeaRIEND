<?php
session_start();
require_once("connect.php");

// Gestion de la suppression multiple
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_ids']) && is_array($_POST['delete_ids'])) {
    $ids = implode(',', array_map('intval', $_POST['delete_ids']));
    $sql = "DELETE FROM animaux WHERE id IN ($ids)";
    $query = $db->prepare($sql);
    $query->execute();
    header("Location: backoffice.php");
    exit();
}

$imagePath = ""; // Initialisation de la variable

// Vérification et traitement du fichier uploadé
if (isset($_FILES["image"]) && $_FILES["image"]["error"] === 0) {
    $allowed = [
        "jpg" => "image/jpeg",
        "jpeg" => "image/jpeg",
        "png" => "image/png"
    ];

    $filename = $_FILES["image"]["name"];
    $filetype = $_FILES["image"]["type"];
    $filesize = $_FILES["image"]["size"];
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    if (!array_key_exists($extension, $allowed) || !in_array($filetype, $allowed)) {
        die("Erreur : le format du fichier est incorrect");
    }

    if ($filesize > 1024 * 1024) {
        die("Fichier trop volumineux");
    }

    $newname = md5(uniqid()) . ".$extension";
    $newfilename = __DIR__ . "/img/upload_animaux/$newname";

    if (!move_uploaded_file($_FILES["image"]["tmp_name"], $newfilename)) {
        die("L'upload a échoué");
    }

    chmod($newfilename, 0644);
    $imagePath = "img/upload_animaux/$newname"; // Chemin relatif à stocker dans la base de données
}

$sql = "SELECT * FROM animaux";
$query = $db->prepare($sql);
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);

if ($_POST && isset($_POST["name"]) && isset($_POST["content"]) && isset($_POST["category"]) && isset($_POST["price"])) {
    $name = strip_tags($_POST["name"]);
    $content = strip_tags($_POST["content"]);
    $category = strip_tags($_POST["category"]);
    $price = strip_tags($_POST["price"]);
    $discount = isset($_POST["discount"]) ? 1 : 0;

    // Utilisation de $imagePath défini plus haut
    $images = $imagePath;

    $sql = "INSERT INTO animaux (name, content, category, price, discount, images) VALUES (:name, :content, :category, :price, :discount, :images)";
    $query = $db->prepare($sql);

    $query->bindValue(":name", $name);
    $query->bindValue(":content", $content);
    $query->bindValue(":category", $category);
    $query->bindValue(":price", $price);
    $query->bindValue(":discount", $discount);
    $query->bindValue(":images", $images);

    $query->execute();

    require_once("close.php");

    header("Location: backoffice.php");
    exit();
} else if ($_POST) {
    var_dump($_POST);
    die("Erreur veuillez réessayer");
}


?>



<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/fonts.css">
    <link rel="stylesheet" href="./css/produits/produits.css">
    <link rel="stylesheet" href="./css/produits/produits-responsive.css">
    <title>Take a FeaRIEND</title>
</head>

<body>
    <?php require_once("./template/header.php"); ?>
    <div class="bannerOffice"></div>
    <section class="add-panel">
        <div class="card-add">
            <form method="POST" class="form" enctype="multipart/form-data">
                <div class="left-column">
                    <div class="form-groupcard">
                        <label for="name">Nom:</label>
                        <input type="text" name="name" id="name" placeholder="Nom" required>
                    </div>
                    <div class="form-groupcard">
                        <label for="price">Prix:</label>
                        <input type="text" name="price" id="price" placeholder="Prix" required>
                    </div>
                    <div class="form-groupcard">
                        <label for="category">Catégorie:</label>
                        <select name="category" id="category" required>
                            <option value="animaux domestiques">Animaux domestiques</option>
                            <option value="animaux de sécurités">Animaux de sécurités</option>
                            <option value="animaux dangereux">Animaux dangereux</option>
                            <option value="Happy tree Friends">Happy tree Friends</option>
                        </select>
                    </div>
                    <div class="form-groupcard">
                        <label for="content">Description:</label>
                        <textarea name="content" id="content" placeholder="Description" required></textarea>
                    </div>
                    <div class="promotion-checkbox">
                        <label for="discount">Promotion</label>
                        <input type="checkbox" name="discount" id="discount" class="form-check-input">
                    </div>
                </div>
                <div class="right-column">
                    <div class="upload-box">
                        <label id="uploadLabel" for="image">Uploader une photo</label>
                        <img id="previewImage" src="#" alt="Aperçu de l'image" style="max-width: 100%; display: none;">
                    </div>
                    <label for="image" class="upload-btn">Upload</label>
                    <input type="file" name="image" id="image" accept="image/*" style="display: none;">
                </div>
                <button type="submit" value="Enregistrer" class="valide-btn-bo" name="uploadAnimal">
                    <img src="/img/icons/green-add-button-12023.png" alt="">
                </button>
            </form>
        </div>
        <div class="Admin-title">
            <h2>Bienvenue Administrateur</h2>
            <span><?= $_SESSION['user']['prenom']; ?></span>
        </div>
    </section>
    <section>
        <div class="container-fluid mt-5 dashboard">
            <div class="row">
                <div class="col-md-3">
                    <img src="/img/godzilla-Paneladmin2.jpg" alt="Bannière" class="img-fluid banner">
                </div>
                <div class="col-md-9">
                    <h2 class="mb-4 admin-board">Liste produits</h2>
                    <form method="POST" action="backoffice.php">
                        <table class="table table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Action</th>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Catégorie</th>
                                    <th scope="col">Prix</th>
                                    <th scope="col">Promotion</th>
                                    <th scope="col"><input type="checkbox" id="selectAllPromoCheckbox"></th>
                                </tr>
                            </thead>
                            <?php foreach ($result as $animaux) : ?>
                                <tbody>
                                    <tr>
                                        <td>
                                            <button class="btn btn-primary btn-sm"><a href="detail.php?id=<?= $animaux["id"] ?>">Voir</a></button>
                                            <button class="btn btn-warning btn-sm"><a href="update.php?id=<?= $animaux["id"] ?>">Modifier</a></button>
                                            <button class="btn btn-danger btn-sm"><a href="delete.php?id=<?= $animaux["id"] ?>">Supprimer</a></button>
                                        </td>
                                        <td><?= $animaux['id'] ?></td>
                                        <td><?= $animaux['name'] ?></td>
                                        <td><?= $animaux['category'] ?></td>
                                        <td><?= $animaux['price'] ?></td>
                                        <td><?= $animaux['discount'] ? 'Oui' : 'Non' ?></td>
                                        <td><input type="checkbox" name="delete_ids[]" value="<?= $animaux['id'] ?>"></td>
                                    </tr>
                                </tbody>
                            <?php endforeach; ?>
                        </table>
                        <button type="submit" class="btn btn-danger">Supprimer les articles sélectionnés</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="./js/script.js"></script>
</body>

</html>