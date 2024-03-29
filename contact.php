<?php
    if(isset($_POST['submit'])) {
        if(!empty($_POST['naam'] && !empty($_POST['bericht']))) {
            require("dbconnect.php");
            session_start();
            if ((!isset($_SESSION['ingelogd'])) || ($_SESSION['ingelogd'] != true)) {
                $sql = "INSERT INTO contact (gebruiker_id,naam,bericht) VALUES ('0','".trim($_POST['naam'])."','".trim($_POST['bericht'])."')";
                if ($conn->query($sql) === false) {
                    die("Error: " . $sql . "<br>" . $conn->error);
                }
            } else {
                $sql = "INSERT INTO contact (gebruiker_id,naam,bericht) VALUES (".$_SESSION['id'].",'".trim($_POST['naam'])."','".trim($_POST['bericht'])."')";
                if ($conn->query($sql) === false) {
                    die("Error: " . $sql . "<br>" . $conn->error);
                }
            }
        }
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
    <meta name="description" content="">

    <!--author data-->
    <meta name="author" content="Tom Diede Levy Ryan">

    <!--search words for google-->
    <meta name="keywords" content="">

    <!--website title in tab-->
    <title>www.TIGER.nl</title>

    <!--linking a .css page-->
    <link rel="stylesheet" type="text/css" href="./css/contact.css">
</head>

<body>
    <!--body data-->
    <header>
        <!--header data-->
        <div></div>
        <img src="images/logo.png" alt="Logo">
        <nav>
            <?php
            session_start();
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
    <form method="POST">
        <p>Naam:</p>
        <input type="text" id="name" name="naam" required placeholder="vul hier je naam in">
        <p>Bericht:</p>
        <textarea id="bericht" name="bericht" required placeholder="vul hier je bericht in"></textarea>
        <input type="submit" name="submit" id="submit" value="versturen">
    </form>
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
    <p>Ontwikkeling door: <h>Tom Groenheide en diede</h></p>
</article>
</section>
</footer>
        </section>

    </footer>
    <!--linking a .js file-->
    <script src="" type="text/javascript"></script>
</body>

</html>