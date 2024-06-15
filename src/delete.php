<?php

session_start();

if (isset($_GET["id"]) && !empty($_GET["id"])) {
    require_once("connect.php");

    $id = strip_tags($_GET['id']);

    $sql = "DELETE FROM animaux WHERE id=:id";
    $query = $db->prepare($sql);

    $query->bindValue(':id', $id);
    $query->execute();

    $result = $query->fetch();

    if (!$result) {
        header("Location: backoffice.php");
    }

    $sql = 'DELETE FROM animaux WHERE id=:id';
    $query = $db->prepare($sql);

    $query->bindValue(":id", $id);
    $query->execute();

    require_once("close.php");
    header('Location: backoffice.php');

    session_start();

    $_SESSION['delete_confirm'] = true;
    $_SESSION['article_delete_id'] = $result[1];
} else {
    header('Location: backoffice.php');
}
