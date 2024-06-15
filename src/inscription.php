<?php
//On vérifie si le formulaire a était envoyé 
if (!empty($_POST)) {
    if (
        isset($_POST["nom"], $_POST["prenom"], $_POST["email"], $_POST["pass"], $_POST["pass2"])
        && !empty($_POST["nom"]) && !empty($_POST["prenom"]) && !empty($_POST["email"]) && !empty($_POST["pass"]) && !empty($_POST["pass2"])
    ) {

        //formulaire complet
        $nom = strip_tags($_POST["nom"]);
        $prenom = strip_tags($_POST["prenom"]);

        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            //filter_var et FILTER_VALIDATE_EMAIL servent a sécuriser l'adresse mail en back-end
            die("L'adresse eMail est incorrecte");
        }

        //On se connecte a la BDD
        require_once("connect.php");

        //On ajoute les vérifications : 
        // ETAPE 1 : Vérification de l'existence de l'e-mail
        $sql_mail = "SELECT COUNT(*) AS nb_emails FROM users WHERE email = :email";
        $requete_email = $db->prepare($sql_mail);
        $requete_email->bindValue(":email", $_POST["email"], PDO::PARAM_STR);
        $requete_email->execute();

        $email_count = $requete_email->fetchColumn(); // Récupère le nombre d'emails trouvés

        if ($email_count > 0) {
            die("Cette adresse eMail est déjà utilisée");
        }

        // ETAPE 2 : Confirmation des mots de passes
        if (isset($_POST["pass"]) && isset($_POST["pass2"])) {
            $pass = $_POST['pass'];
            $pass2 = $_POST['pass2'];

            // Validation de la correspondance des mots de passe
            if ($pass === $pass2) {
                //On hash le mdp
                $pass = password_hash($_POST["pass"], PASSWORD_ARGON2ID);
                // Mot de passe confirmé, procédez à la logique d'inscription (par exemple, hachage et stockage du mot de passe)
                header("Location: index.php");
            } else {
                die("Les mots de passe ne correspondent pas.");
            }
        }

        //on écrit la requête sql d'inscription
        $sql = "INSERT INTO users(nom, prenom, email, pass, roles) VALUES (:nom, :prenom, :email, '$pass', 'user')";

        $requete = $db->prepare($sql);

        $requete->bindValue(":nom", $nom, PDO::PARAM_STR);
        $requete->bindValue(":prenom", $prenom, PDO::PARAM_STR);
        $requete->bindValue("email", $_POST["email"], PDO::PARAM_STR);

        $requete->execute();
    } else {
        die("Le formulaire est incomplet");
    }
}

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Take a FeaRIEND: Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/fonts.css">
</head>

<body>
    <section class="full-box">
        <h1 class="font-take">Take a FeaRIEND</h1>
        <form method="POST" class="p-4 p-md-5 border rounded-3 bg-body-tertiary center-form">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="nom" id="floatingInput" placeholder="Alice">
                <label for="floatingInput">Nom</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="prenom" id="floatingInput" placeholder="Blue">
                <label for="floatingInput">Prénom</label>
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com">
                <label for="email">Email address</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" name="pass" id="pass" placeholder="Password">
                <label for="pass">Password</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" name="pass2" id="pass2" placeholder="Confirme Password">
                <label for="pass2">Confirme Password</label>
            </div>
            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">S'enregistrer</button>
            <hr class="my-4">
            <small class="text-body-secondary">Si vous possédez déjà un compte cliquer sur <a href="ConnexionUser.php">Connexion</a>.</small>
        </form>


        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>