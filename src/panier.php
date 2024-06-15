<?php

// Afficher le panier

$sql = "SELECT * FROM animaux WHERE user_id=:user_id";
$query = $db->prepare($sql);

$query->bindValue(':user_id', $user_id);
$query->execute();

$resultat->fetch_assoc($sql);

    // ON AFFICHE TOUS LES RESULTATS QUI ONT UN USER_ID = 1 (Avo)
    // boucle qui affiche tous les résultats