<header>
    <div class="logo">
        <img src="./img/logosite.png" alt="Logo Take a FeaRIEND">
    </div>
    <nav id="nav">
        <ul>
            <div class="container-li">
                <li><a href="index.php">Accueil</a></li>
                <li><a href="category.php">Catégories</a></li>
                <li><a href="about.php">A propos</a></li>
            </div>
            <div class="container-button-li">
                <?php if (empty($_SESSION['user'])) { ?>
                    <div class="container-button-li">
                        <button type="button" class="Login"><a class="login-link" href="ConnexionUser.php">Login</a></button>
                    </div>
                    <?php } else {
                    if (isset($_SESSION['user']['roles']) && ($_SESSION['user']['roles'] == 'administrateur')) { ?>
                        <div class="container-button-li">
                            <button type="button" class="panierheader"><a class="admin-link" href="backoffice.php">Admin</a></button>
                            <button type="button" class="Logout"><a class="logout-link" href="DeconnexionUser.php">Logout</a></button>
                        </div>
                    <?php } else { ?>
                        <div class="container-button-li">
                            <button type="button" class="panierheader"><a class="panier-link" href="panier.php">Panier</a></button>
                            <button type="button" class="Logout"><a class="logout-link" href="DeconnexionUser.php">Logout</a></button>
                        </div>
                <?php }
                } ?>
            </div>
        </ul>
        <div id="burger">
            <img src="./img/burger-bar.png" alt="Menu Burger">
        </div>
    </nav>
</header>