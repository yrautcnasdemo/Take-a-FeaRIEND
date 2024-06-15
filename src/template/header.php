<header>
    <div class="logo">
        <img src="./img/logosite.png" alt="Logo Take a FeaRIEND">
    </div>
    <nav id="nav">
        <ul>
            <div class="container-li">
                <li><a href="../index.php">Accueil</a></li>
                <li><a href="#">Catégories</a></li>
                <li><a href="#">A propos</a></li>
            </div>
            <div class="container-button-li">

            <?php if(empty($_SESSION['user'])) { ?>
                <div class="container-button-li">
                    <button type="button" class="Login"><a class="login-link" href="ConnexionUser.php">Login</a></button>
                </div>
            <?php } else { ?>
                <div class="container-button-li">
                    <button type="button" class="Logout"><a class="logout-link" href="DeconnexionUser.php">Logout</a></button>
                </div>
            <?php } ?>
            
            </div> 
        </ul>
        <div id="burger">
            <img src="./img/burger-bar.png" alt="Menu Burger">
        </div>
    </nav>
</header>




<!-- <header>
    <div class="logo">
        <img src="./img/logosite.png" alt="Logo Take a FeaRIEND">
    </div>
    <nav id="nav">
        <ul>
            <div class="container-li">
                <li><a href="#">Accueil</a></li>
                <li><a href="#">Catégories</a></li>
                <li><a href="#">A propos</a></li>
            </div>
            <div class="container-button-li">
                <li><button class="Login">Login</button></li>
            </div>
        </ul>
        <div id="burger">
            <img src="./img/burger-bar.png" alt="Menu Burger">
        </div>
    </nav>
</header> -->