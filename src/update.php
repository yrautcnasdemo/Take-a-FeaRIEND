<?php 
    session_start();
    
    
    if($_POST){
        if(isset($_POST['id']) && !empty($_POST['id']) //pour update.php on rajoute l'id
        && isset($_POST['name']) && !empty($_POST['name'])
        && isset($_POST['content']) && !empty($_POST['content'])
        && isset($_POST['category']) && !empty($_POST['category'])
        && isset($_POST['price']) && !empty($_POST['price'])
        && isset($_POST['discount']) && !empty($_POST['discount'])){
        
        require_once('connect.php');
    
        $id = strip_tags($_POST["id"]); //pour update.php on rajoute l'id
        $name = strip_tags($_POST["name"]);
        $content = strip_tags($_POST["content"]);
        $category = strip_tags($_POST["category"]);
        $price = strip_tags($_POST["price"]);
        $discount = strip_tags($_POST["discount"]);
    
        //on change le INSERT INTO de ajout.php en UPDATE et on rajoute SET pour changer les parametres
        $sql = 'UPDATE animaux SET `name`=:name, `content`=:content, `category`=:category, `price`=:price, 
        `discount`=:discount WHERE `id`=:id;';
    
        $query = $db->prepare($sql);
    
        $query->bindValue(":id", $id, PDO::PARAM_INT);//On rajoute la valeur bindValue id 
        $query->bindValue(":name", $name, PDO::PARAM_STR);
        $query->bindValue(":content", $content, PDO::PARAM_STR);
        $query->bindValue(":category", $category, PDO::PARAM_STR);
        $query->bindValue(":price", $price, PDO::PARAM_INT);
        $query->bindValue(":discount", $discount);
    
        $query->execute();
    
        $_SESSION['message'] = "Fiche animal modifiée";
        require_once('DeconnexionUser.php');
        header('Location: index.php');
    
        }else{
            //sinon envoyer le message d'erreur formulaire complet
            $_SESSION['erreur'] = "Le formulaire est incomplet";
        }
    }
    // ICI TERMINE LA REPRISE D'UNE PARTIE DE "ajout.php"
    
    
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
            header('Location: index.php');
        }
    
    }else{
        $_SESSION["erreur"] = "URL invalide";
        header("Location: index.php");
    }
    // ICI TERMINE LA REPRISE D'UNE PARTIE DE "details.php" 
    
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
    <main class="container">
        <div class="row">
            <section class="col-12">

                <h1>Modifier un animal</h1>
                        <form method="post">
                            <div class="form-group">
                                <label for="name">Nom</label>
                                <input type="text" id="name" name="name" class="form-control" value="<?= $animaux['name'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="content">Description</label>
                                <input type="text" id="content" name="content" class="form-control" value="<?= $animaux['content']?>">
                            </div>
                            <div class="form-group">
                                <label for="category">category</label>
                                <input type="text" id="category" name="category" class="form-control" value="<?= $animaux['category']?>">
                            </div>
                            <div class="form-group">
                                <label for="price">Prix</label>
                                <input type="text" id="price" name="price" class="form-control" value="<?= $animaux['price']?>">
                            </div>
                            <div class="form-group">
                                <label for="discount">Promotion</label>
                                <input type="text" id="discount" name="discount" class="form-control" value="<?= $animaux['discount']?>">
                            </div>

                            <!--NE SURTOUT PAS OUBLIER DE RAJOUTER L'id POUR BIEN ENVOYER LA REQUÊTE -->
                            <input type="hidden" value="<?= $animaux["id"]?>" name="id">

                            <button class="btn btn-primary affichage">Envoyer</button>
                        </form>
            </section>
        </div>
    </main>

    <?php
    require_once("./template/footer.php");
    ?>
