<?php
session_start();
if(isset($_SESSION['ingelogd']) && $_SESSION['ingelogd'] == true) {
    header('location: ingelogd.php');
}
?>
<!doctype html>
<html>

<head>
    <!--meta data-->
    <!--usable characters for the website-->
    <meta charset="utf-8">

    <!--language of the page-->
    <meta http-equiv="language" content="NL">

    <!--display settings-->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--website description-->
    <meta name="description" content="Website TIGER">

    <!--author data-->
    <meta name="author" content="Tom Diede Levy Ryan">

    <!--search words for google-->
    <meta name="keywords" content="">

    <!--website title in tab-->
    <title>www.TIGER.nl</title>

    <!--linking a .css page-->
    <link rel="stylesheet" type="text/css" href="./css/index.css">
</head>

<body>
    <!--body data-->
    <header>
        <!--header data-->
        <div></div>
        <img src="images/logo.png" alt="Logo">
        <nav>
            <?php
                if(isset($_SESSION['ingelogd']) && $_SESSION['ingelogd'] == true) {
                    echo '<a href="./ingelogd.php">Home</a>';
                } else {
                    echo '<a href="./index.php">Home</a>';
                }
            ?>
            <a href="./producten.php">Product Info</a>
            <a href="./kalender.php">Kalender</a>
            <a href="./artiesten.php">Artiesten</a>   
            <a href="./Aanbiedingen.php">Aanbiedingen</a>
            <a href="./contact.php">Contact</a>
            <a href="./registreren.php">Registreren</a>
        </nav>
        <div></div>
    </header>
    <article class= "text1">
    <h1>aanbieding van de week</h1>
    <p>2+1 Gratis</p>
    </article>

    <article class= "text2">
    <h1>Welkom!</h1><br>
    <p>Welkom op de homepagina van Tiger Energy, ons bedrijf is begonnen met het maken van energy in 2010 toen de wereld toe was aan een nieuwe unieke energydrank beleving.<br>
    </p>
    </article>  


<button data-modal-target="#modal">Welkom</button>
  <div class="modal" id="modal">
    <div class="modal-header">
      <div class="title">Example Modal</div>
      <button data-close-button class="close-button">&times;</button>
    </div>
    <div class="modal-body">
    Welkom op de homepagina van Tiger Energy, ons bedrijf is begonnen met het maken van energy in 2010 toen de wereld toe was aan een nieuwe unieke energydrank beleving.
    </div>
  </div>
  <div id="overlay"></div>


    <footer>
        <!--footer data-->

    </footer>
    <!--linking a .js file-->
    <script src="./js/index.js" type="text/javascript"></script>
</body>

</html>


