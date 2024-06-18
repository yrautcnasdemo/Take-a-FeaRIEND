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
        <header>
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
        </header>
        <section class="image-illus"></section>
        <section class="produits">
            <h2>Votre panier</h2>
            <div class="container-articles">
                <article class="produits-articles">
                    <figure>
                        <img src="./img/domestiques/105309.png" alt="test">
                    </figure>
                    <figcaption>
                        <h3>Poiduse</h3>
                        <p id="price">275€</p>
                        <div class="container-figcaption">
                            <div class="figcaption-left">
                                <p class="left-p">Quantité</p>
                                <button class="decrease">-</button>
                                <span class="quantity">1</span>
                                <button class="increase">+</button>
                            </div>
                            <div class="figcaption-right">
                                <button class="delete">Supprimer</button>
                            </div>
                        </div>
                    </figcaption>
                </article>
                <article class="produits-articles">
                    <figure>
                        <img src="./img/domestiques/105309.png" alt="test">
                    </figure>
                    <figcaption>
                        <h3>Poiduse</h3>
                        <p id="price">275€</p>
                        <div class="container-figcaption">
                            <div class="figcaption-left">
                                <p class="left-p">Quantité</p>
                                <button class="decrease">-</button>
                                <span class="quantity">1</span>
                                <button class="increase">+</button>
                            </div>
                            <div class="figcaption-right">
                                <button class="delete">Supprimer</button>
                            </div>
                        </div>
                    </figcaption>
                </article>
                <article class="produits-articles">
                    <figure>
                        <img src="./img/domestiques/105309.png" alt="test">
                    </figure>
                    <figcaption>
                        <h3>Poiduse</h3>
                        <p id="price">275€</p>
                        <div class="container-figcaption">
                            <div class="figcaption-left">
                                <p class="left-p">Quantité</p>
                                <button class="decrease">-</button>
                                <span class="quantity">1</span>
                                <button class="increase">+</button>
                            </div>
                            <div class="figcaption-right">
                                <button class="delete">Supprimer</button>
                            </div>
                        </div>
                    </figcaption>
                </article>

                <article class="produits-articles">
                    <figure>
                        <img src="./img/domestiques/105309.png" alt="test">
                    </figure>
                    <figcaption>
                        <h3>Poiduse</h3>
                        <p id="price">275€</p>
                        <div class="container-figcaption">
                            <div class="figcaption-left">
                                <p class="left-p">Quantité</p>
                                <button class="decrease">-</button>
                                <span class="quantity">1</span>
                                <button class="increase">+</button>
                            </div>
                            <div class="figcaption-right">
                                <button class="delete">Supprimer</button>
                            </div>
                        </div>
                    </figcaption>
                </article>
                <article class="produits-articles">
                    <figure>
                        <img src="./img/domestiques/105309.png" alt="test">
                    </figure>
                    <figcaption>
                        <h3>Poiduse</h3>
                        <p id="price">275€</p>
                        <div class="container-figcaption">
                            <div class="figcaption-left">
                                <p class="left-p">Quantité</p>
                                <button class="decrease">-</button>
                                <span class="quantity">1</span>
                                <button class="increase">+</button>
                            </div>
                            <div class="figcaption-right">
                                <button class="delete">Supprimer</button>
                            </div>
                        </div>
                    </figcaption>
                </article>
                <article class="produits-articles">
                    <figure>
                        <img src="./img/domestiques/105309.png" alt="test">
                    </figure>
                    <figcaption>
                        <h3>Poiduse</h3>
                        <p id="price">275€</p>
                        <div class="container-figcaption">
                            <div class="figcaption-left">
                                <p class="left-p">Quantité</p>
                                <button class="decrease">-</button>
                                <span class="quantity">1</span>
                                <button class="increase">+</button>
                            </div>
                            <div class="figcaption-right">
                                <button class="delete">Supprimer</button>
                            </div>
                        </div>
                    </figcaption>
                </article>
            </div>
        </section>

        <?php
        require_once("./template/footer.php");
        ?>
</body>
<script src="./js/script.js"></script>

</html>