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

<button data-modal-target="#modal" id="button-main"><p>🢂 Welkom 🢀</p></button>
  <div class="modal" id="modal">
    <div class="modal-header">
      <div class="title"><p>WELKOM!</p></div>
      <button data-close-button class="close-button">&times;</button>
    </div>
    <div class="modal-body">
    Welkom op de homepagina van Tiger Energy, ons bedrijf is begonnen met het maken van energy in 2010 toen de wereld toe was aan een nieuwe unieke energydrank beleving.
    </div>
  </div>
  <div id="overlay"></div>


    <footer>

    <footer class="main-footer">

<article class="f-txt1">
    <h>TIGER</h>
    <p>Plein 16</p>
    <p>2363</p>
    <p>Zuid-Holland</p>
</article>

<article class="f-txt2">
    <p>Tel. 123-456-789</p>
    <p>Mail. contact@tiger.nl</p>
</article>

<article class="f-txt3">
    <h>Werktijden</h>
    <p>Werktijden Ma - Vr: 09:00 - 17:00</p>
    <p>Weekend gesloten</p>
</article>

<article class="f-txt4">
    <p>Copyright 2022 · Alle rechten voorbehouden · </p>
    <p>Algemene Voorwaarden · Privacyverklaring</p>
</article>

<article class="f-txt5">
    <p>Ontwikkeling door: <h>Tom Groenheide</h></p>
</article>
</section>
</footer>
        </section>

    </footer>
    <!--linking a .js file-->
    <script src="./js/index.js" type="text/javascript"></script>
</body>

</html>


