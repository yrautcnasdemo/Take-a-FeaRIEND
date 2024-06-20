<?php

if (isset($_GET["id"]) && !empty($_GET["id"])) {
    require_once("connect.php");

    $id = strip_tags($_GET['id']);

    // Suppression de l'article du panier
    $sql = "DELETE FROM panier WHERE id=:id";
    $query = $db->prepare($sql);

    $query->bindValue(':id', $id);
    $query->execute();

    require_once("close.php");

    header('Location: panier.php');
    exit();
} else {
    header('Location: panier.php');
    exit();
}
