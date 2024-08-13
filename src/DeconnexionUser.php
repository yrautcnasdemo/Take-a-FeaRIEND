<?php
session_start();
unset($_SESSION["user_monster"]);

header('location: index.php');
