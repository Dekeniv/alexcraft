<!doctype html>
<html lang="fr">

<head>
    <!-- Encoding -->
    <meta charset="UTF-8">

    <!-- Responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Title/Description -->
    <title>Alex Craft</title>
    <meta name="description" content="Description">

    <!-- Favicon (ico + png), icon website (tabs, favorites) -->
    <link rel="icon" type="image/png" href="img/favicon.png">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=La+Belle+Aurore&display=swap" rel="stylesheet">

    <!-- Font Awesome 5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">


    <!-- Jquery -->
    <!-- CSS JS EN PREMIER -->
    <link rel="stylesheet" type="text/css" href="/css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="/css/owl.theme.default.min.css">
    
    <!-- CSS (my style.css always last) -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- HEADER -->
    <header>
        <!-- Logo -->
        <div class="container">
            <div class="container90 flexHeader">
                <a href="index.php"><img src="/img/logo.png" alt="logo du site Alex Craft" class="logo"></a>
                <a href="index.php">
                    <p class="titleWebsite"><strong>Alex Craft</strong></p>
                </a>
            </div>
        </div>

        <!-- Site en construction -->
        <p id="construction">
            Site en construction
        </p>


        <!-- Menu Normal-->
        <nav class="navMenu menuNormal">
            <div class="flexHeader menu">
                <a href="index.php">
                    <p>Accueil</p>
                </a>
                <a href="particuliers.php">
                    <p>Particuliers</p>
                </a>
                <a href="professionnels.php">
                    <p>Professionnels</p>
                </a>
                <a href="contact.php">
                    <p>Contactez-moi</p>
                </a>
                <a href="quisuisje.php">
                    <p>Qui sommes-nous ?</p>
                </a>
                <a href="covid.php">
                    <p>Info Covid-19</p>
                </a>
            </div>
        </nav>

        <!-- Menu Hamburger-->

        <button type="button" class="buttonHamburger displayNone" id="buttonMenuHamburger">
            <i class="fas fa-bars fa-2x" id="iconOpen"></i>
            <i class="fas fa-times fa-2x displayNone" id="iconClose"></i>
        </button>

        <nav class="menuHamburger displayNone" id="menuHamburger">
            <ul class="">
                <li><a href="/index.php">Accueil</a></li>
                <li><a href="particuliers.php">Particuliers</a></li>
                <li><a href="professionnels.php">Professionnels</a></li>
                <li><a href="contact.php">Contactez-moi</a></li>
                <li><a href="quisuisje.php">Qui sommes-nous ?</a></li>
                <li><a href="covid.php">Info Covid-19</a></li>
            </ul>
        </nav>

    </header>