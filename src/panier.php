<?php

session_start();

require_once("connect.php");

if (isset($_SESSION['user']['id'])) {
    $user_id = $_SESSION['user']['id'];

    // Requête pour récupérer les articles dans le panier de l'utilisateur
    $sql = "SELECT p.*
            FROM panier p 
            WHERE user_id = :user_id";

    $query = $db->prepare($sql);
    $query->bindValue(":user_id", $user_id);
    $query->execute();
    $panier_item = $query->fetchAll(PDO::FETCH_ASSOC);

    // Traitement de l'ajout d'un nouvel article au panier
    if ($_POST) {
        if (
            isset($_POST["user_id"]) &&
            isset($_POST["animal_id"]) &&
            isset($_POST["quantity"])
        ) {
            $user_id = strip_tags($_POST["user_id"]);
            $animal_id = strip_tags($_POST["animal_id"]);
            $quantity = strip_tags($_POST["quantity"]);

            // Insertion dans la table 'panier'
            $sql = "INSERT INTO panier (user_id, animal_id, quantity) VALUES (:user_id, :animal_id, :quantity)";
            $query = $db->prepare($sql);
            $query->bindValue(":user_id", $user_id);
            $query->bindValue(":animal_id", $animal_id);
            $query->bindValue(":quantity", $quantity);
            $query->execute();

            // Fermeture de la connexion à la base de données
            require_once("close.php");

            // Redirection vers la page 'domestiques.php' après l'ajout
            header("Location: domestiques.php");
            exit();
        }
    }
} else {
    // Débogage temporaire pour afficher le contenu de la session
    echo "Session user_id non définie. Contenu de la session : ";


    // Redirection vers la page de connexion si 'user_id' n'est pas défini
    header("Location: ConnexionUser.php");
    exit();
}

?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/fonts.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/panier/panier.css">
    <link rel="stylesheet" href="./css/panier/panier-responsive.css">
    <link rel="stylesheet" href="./css/produits/produits.css">
    <link rel="stylesheet" href="./css/produits/produits-responsive.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Panier</title>
</head>

<body>
    <main>
        <?php require_once("./template/header.php") ?>
        <section class="image-illus"></section>
        <section class="produits">
            <h2>Panier de <?= $_SESSION['user']["nom"] . " " . $_SESSION['user']["prenom"]; ?></h2>
            <div class="container-articles">
                <?php
                // Boucle foreach pour afficher le panier
                foreach ($panier_item as $panier) {

                    $animal_id = $panier["animal_id"];

                    $sql = "SELECT a.*
                    FROM animaux a
                    WHERE id = :animal_id";

                    $query = $db->prepare($sql);
                    $query->bindValue(":animal_id", $animal_id);
                    $query->execute();
                    $animal = $query->fetch(PDO::FETCH_ASSOC);

                    // Définir le chemin de l'image pour chaque animal
                    if (!empty($animal['images'])) {
                        $imagePath = $animal['images'];
                    } else {
                        $imagePath = 'img/upload_animaux/nointernet.jpg';
                    }

                    if ($animal['discount'] == 1) {
                        $prixpromo = $animal["price"] / 1.10;
                        $prix = $animal["price"];
                    } else {
                        $prix = $animal["price"];
                    }
                ?>
                    <article class="produits-articles">
                        <figure>
                            <img src="<?= htmlspecialchars($imagePath); ?>" alt="Image de <?= htmlspecialchars($animal['name']); ?>">
                            <figcaption>
                                <h3><?= htmlspecialchars($animal['name']) ?></h3>
                                <?php
                                if ($animal['discount'] == 1) { ?>
                                    <div class="container-price">
                                        <p class="ancien"><?php echo $prix; ?>€/pièce</p>
                                        <p class="promotion"></p>
                                        <p class="price" data-unitPrice="<?php echo $prixpromo; ?>"></p>
                                    </div>
                                <?php } else { ?>
                                    <p class="price" data-unitPrice="<?php echo $animal["price"]; ?>"></p>
                                <?php } ?>




                                <div class="container-figcaption">
                                    <div class="figcaption-left">
                                        <p class="left-p">Quantité</p>
                                        <button class="decrease">-</button>
                                        <span class="quantity"><?php echo $panier["quantity"]; ?></span>
                                        <button class="increase">+</button>
                                    </div>
                                    <div class="figcaption-right">
                                        <button class="delete"><a href="delete_panier.php?id=<?= $panier["id"] ?>">Supprimer</a></button>


                                    </div>
                                </div>
                            </figcaption>
                        </figure>
                    </article>
                <?php
                }
                ?>
            </div>
        </section>
        <section class="total">
            <?php
            $total = 0; // Initialisation de la variable pour le total

            // Boucle foreach pour afficher le panier
            foreach ($panier_item as $panier) {
                $animal_id = $panier["animal_id"];

                $sql = "SELECT a.*
            FROM animaux a
            WHERE id = :animal_id";

                $query = $db->prepare($sql);
                $query->bindValue(":animal_id", $animal_id);
                $query->execute();
                $animal = $query->fetch(PDO::FETCH_ASSOC);

                // Calcul du total en fonction du prix de l'animal et de la quantité
                if ($animal['discount'] == 1) {
                    $prixpromo = $animal["price"] / 1.10;
                    $prix = $animal["price"];
                } else {
                    $prix = $animal["price"];
                }

                $total += $prix * $panier["quantity"]; // On ajoute au total
            }
            ?>

            <section class="paiement">
                <div class="total">
                    Total à payer : <?= $total ?>€
                </div>
                <form action="traitement_paiement.php" method="POST">
                    <button type="submit" name="payer">Payer</button>
                </form>
            </section>

            </div>
        </section>

        <?php
        require_once("./template/footer.php");
        ?>
</body>
<script src="./js/script.js"></script>

</html>