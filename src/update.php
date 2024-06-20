<?php 
session_start();

if ($_POST){
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
        
        // Vérification de la promotion pour qu'elle soit bien prise en compte si la case n'est pas coché
        if (isset($_POST['discount'])) {
            $discount = 1; // La promotion est activée
        } else {
            $discount = 0; // La promotion n'est pas activée
        }

        // Modification de l'animal dans la base de données
        $sql = 'UPDATE animaux SET `name`=:name, `content`=:content, `category`=:category, `price`=:price, 
        `discount`=:discount WHERE `id`=:id;';
    
        $query = $db->prepare($sql);
    
        $query->bindValue(":id", $id, PDO::PARAM_INT);
        $query->bindValue(":name", $name, PDO::PARAM_STR);
        $query->bindValue(":content", $content, PDO::PARAM_STR);
        $query->bindValue(":category", $category, PDO::PARAM_STR);
        $query->bindValue(":price", $price, PDO::PARAM_INT);
        $query->bindValue(":discount", $discount, PDO::PARAM_INT); // Assurez-vous de définir le type de données correctement
    
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
    // ICI TERMINE LA REPRISE D'UNE PARTIE DE "ajout.php" du projet CRUD
    
    
    // ICI COMMENCE LA REPRISE D'UNE PARTIE DE "details.php" (commentaire néttoyés pour plus de clareté, voir details.php pour avoir la totalité des commentaires)
    if(isset ($_GET["id"]) && !empty($_GET["id"])){
        require_once('connect.php');
    
        $id = strip_tags($_GET["id"]);
    
        $sql = "SELECT * FROM animaux WHERE id = :id;";
    
        $query = $db->prepare($sql);
    
        $query->bindValue(':id', $id, PDO::PARAM_INT);
    
        $query->execute();
    
        $animaux = $query->fetch();
    
        if(!$animaux){
            $_SESSION['erreur'] = "Cet id n'existe pas, votre vie est un echec...";
            // header('Location: index.php');
        }
    
    }else{
        $_SESSION["erreur"] = "URL invalide";
        // header("Location: index.php");
    }
    // ICI TERMINE LA REPRISE D'UNE PARTIE DE "detail.php" 
    
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
            <main class="col-12">
                <section class="update-box">
                        <h1 class="update-title">Modifier un animal</h1>
                        <form class="update-form" method="post">
                            <div class="form-group update-name">
                                <label for="name">Nom:</label>
                                <input type="text" id="name" name="name" class="form-control" value="<?= $animaux['name'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="content">Description:</label>
                                <textarea id="content" name="content" class="form-control"><?= $animaux['content'] ?></textarea>
                            </div>

                            <div class="uptade-row">
                                <div class="form-group">
                                    <label for="category">Catégorie:</label>
                                    <select name="category" id="category" value="<?= $animaux['category']?>" required>
                                        <option value="animaux domestiques">Animaux domestiques</option>
                                        <option value="animaux de sécurités">Animaux de sécurités</option>
                                        <option value="animaux dangereux">Animaux dangereux</option>
                                        <option value="Happy tree Friends">Happy tree Friends</option>
                                    </select>
                                </div>
                                <div class="update-price-row form-group">
                                    <label for="price">Prix:</label>
                                    <input type="text" id="price" name="price" class="update-price form-control" value="<?= $animaux['price']?>">
                                </div>
                                <div class="form-group">
                                    <div>
                                        <label for="discount">Promotion:</label>
                                        <input type="checkbox" name="discount" id="discount" value="<?= $animaux['discount']?>" class="form-check-input">
                                    </div>
                                </div>
                            </div>

                            <!--NE SURTOUT PAS OUBLIER DE RAJOUTER L'id POUR BIEN ENVOYER LA REQUÊTE -->
                            <input type="hidden" value="<?= $animaux["id"]?>" name="id">

                            <button class="btn btn-primary affichage update-btn">Envoyer</button>
                        </form>
                    </section>
            </main>
        </div>
    </main>

    <?php
    require_once("./template/footer.php");
    ?>
