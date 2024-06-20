<?php
session_start();

// Traitement du formulaire de mise à jour
if ($_POST) {
    if (isset($_POST['id']) && !empty($_POST['id'])
        && isset($_POST['name']) && !empty($_POST['name'])
        && isset($_POST['content']) && !empty($_POST['content'])
        && isset($_POST['category']) && !empty($_POST['category'])
        && isset($_POST['price']) && !empty($_POST['price'])) {

        require_once('connect.php');

        $id = strip_tags($_POST["id"]);
        $name = strip_tags($_POST["name"]);
        $content = strip_tags($_POST["content"]);
        $category = strip_tags($_POST["category"]);
        $price = strip_tags($_POST["price"]);

        // Vérification de la promotion
        $discount = isset($_POST['discount']) ? 1 : 0;

        // Gestion de l'upload de l'image
        $imagePath = ""; // Initialisation de la variable
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

        // Construction de la requête SQL
        $sql = 'UPDATE animaux SET `name`=:name, `content`=:content, `category`=:category, `price`=:price, `discount`=:discount';
        if ($imagePath) {
            $sql .= ', `images`=:images';
        }
        $sql .= ' WHERE `id`=:id;';

        $query = $db->prepare($sql);

        $query->bindValue(":id", $id, PDO::PARAM_INT);
        $query->bindValue(":name", $name, PDO::PARAM_STR);
        $query->bindValue(":content", $content, PDO::PARAM_STR);
        $query->bindValue(":category", $category, PDO::PARAM_STR);
        $query->bindValue(":price", $price, PDO::PARAM_INT);
        $query->bindValue(":discount", $discount, PDO::PARAM_INT);
        if ($imagePath) {
            $query->bindValue(":images", $imagePath, PDO::PARAM_STR);
        }

        $query->execute();

        $_SESSION['message'] = "Fiche animal modifiée";
        header("Location: detail.php?id=$id");
        exit();

    } else {
        $_SESSION['erreur'] = "Le formulaire est incomplet";
        header('Location: update.php?id=' . $_POST['id']);
        exit();
    }
}

// Récupération des données actuelles de l'animal si l'id est présent dans l'URL
if (isset($_GET["id"]) && !empty($_GET["id"])) {
    require_once('connect.php');

    $id = strip_tags($_GET["id"]);

    $sql = "SELECT * FROM animaux WHERE id = :id;";

    $query = $db->prepare($sql);

    $query->bindValue(':id', $id, PDO::PARAM_INT);

    $query->execute();

    $animaux = $query->fetch();

    if (!$animaux) {
        $_SESSION['erreur'] = "Cet id n'existe pas, votre vie est un échec...";
    }

} else {
    $_SESSION["erreur"] = "URL invalide";
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
    <title>Update</title>
</head>

<body class="detail-body">
    <?php require_once("./template/header.php"); ?>
    <main class="container">
        <div class="row">
            <main class="col-5">
                <section class="update-box">
                    <h1 class="update-title">Modifier un animal</h1>
                    <form class="update-form-card" method="post" enctype="multipart/form-data">
                        <div class="update-form">
                            <div class="form-group update-name">
                                <label for="name">Nom:</label>
                                <input type="text" id="name" name="name" class="form-control" value="<?= $animaux['name'] ?? '' ?>">
                            </div>
                            <div class="form-group">
                                <label for="content">Description:</label>
                                <textarea id="content" name="content" class="form-control"><?= $animaux['content'] ?? '' ?></textarea>
                            </div>
                            <div class="update-row">
                                <div class="form-group">
                                    <label for="category">Catégorie:</label>
                                    <select name="category" id="category" required>
                                        <option value="animaux domestiques" <?= ($animaux['category'] ?? '') === 'animaux domestiques' ? 'selected' : '' ?>>Animaux domestiques</option>
                                        <option value="animaux de sécurités" <?= ($animaux['category'] ?? '') === 'animaux de sécurités' ? 'selected' : '' ?>>Animaux de sécurité</option>
                                        <option value="animaux dangereux" <?= ($animaux['category'] ?? '') === 'animaux dangereux' ? 'selected' : '' ?>>Animaux dangereux</option>
                                        <option value="Happy tree Friends" <?= ($animaux['category'] ?? '') === 'Happy tree Friends' ? 'selected' : '' ?>>Happy tree Friends</option>
                                    </select>
                                </div>
                                <div class="update-price-row form-group">
                                    <label for="price">Prix:</label>
                                    <input type="text" id="price" name="price" class="update-price form-control" value="<?= $animaux['price'] ?? '' ?>">
                                </div>
                                <div class="form-group">
                                    <div class="discount-update">
                                        <label for="discount">Promotion:</label>
                                        <input type="checkbox" name="discount" id="discount" <?= isset($animaux['discount']) && $animaux['discount'] ? 'checked' : '' ?> class="form-check-input">
                                    </div>
                                </div>
                                <div class="update-form-right">
                                    <div class="form-group">
                                        <label for="image">Changer l'image:</label>
                                        <input type="file" id="image" name="image" class="form-control" accept="image/*">
                                    </div>
                                    <input type="hidden" value="<?= $animaux["id"] ?? '' ?>" name="id">
                                    <button class="btn btn-primary affichage update-btn">Envoyer</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </section>
            </main>

            <main class="col-6">
                <section class="update-box">
                    <h1 class="update-title">Modèle actuel</h1>
                    <?php if (isset($animaux) && $animaux): ?>
                        <div class="current-model">
                            <p><strong>Nom:</strong> <?= htmlspecialchars($animaux['name'] ?? '') ?></p>
                            <p><strong>Description:</strong> <?= htmlspecialchars($animaux['content'] ?? '') ?></p>
                            <p><strong>Catégorie:</strong> <?= htmlspecialchars($animaux['category'] ?? '') ?></p>
                            <p><strong>Prix:</strong> <?= htmlspecialchars($animaux['price'] ?? '') ?></p>
                            <p><strong>Promotion:</strong> <?= isset($animaux['discount']) && $animaux['discount'] ? 'Oui' : 'Non' ?></p>
                        </div>
                    <?php else: ?>
                        <p>Aucun animal trouvé pour cet ID.</p>
                    <?php endif; ?>
                </section>
            </main>
        </div>
    </main>

    <script src="/js/script.js"></script>
    <?php require_once("./template/footer.php"); ?>
</body>
</html>
