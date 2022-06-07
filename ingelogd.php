<?php
session_start();

// if ($_SESSION['ingelogd'] != true) {
  //   header("location: inloggen.php");
 //}

?>

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
    <link rel="stylesheet" href="./css/ingelogd.CSS">
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
            <a href="./aanbiedingen.php">Aanbiedingen</a>
            <a href="./contact.php">Contact</a>
            <a href="./registreren.php">Registreren</a>
        </nav>
        <div></div>
    </header>
    <h1 class="echoname">
    <?php
    echo "Welkom ".$_SESSION['username'];
    ?>  
    </h1>
    <div class="box">
	    <a class="button" href="#popup1">Toon uw persoonlijke aanbieding</a>
    </div>
    <div class="box2">
	    <a class="button2" href="#popup2">Gegevens aanpassen</a>
    </div>
    <div id="popup1" class="overlay">
        <div class="popup">
        Scan deze code bij de bar voor uw kortingscode!
            <a class="close" href="#">&times;</a>
            <div class="content">
                <img id="imgblik" src="./images/blink.png" alt="blikje" size="100">
                <span id="text"></span>
                <button id="mandje">Kopieer uw code</button>
            </div>
        </div>
    </div>
    <div id="popup2" class="overlay">
        <div class="popup">
            Pas uw gegevens aan
            <a class="close" href="#">&times;</a>
            <div class="content">
                <form method="POST">
                    <label for="Username">Gebruikersnaam:</label><br>
                    <input type="text" id="Username" name="Username"><br>
                    <label for="Wachtwoord">Uw Oude Wachtwoord:</label><br>
                    <input type="password" id="Wachtwoord" name="WWoud"><br>
                    <label for="Wachtwoord">Uw Nieuwe Wachtwoord:</label><br>
                    <input type="password" id="Wachtwoord" name="WWnieuw"><br>
                    <label for="Wachtwoord">Herhaal uw Nieuwe wachtwoord:</label><br>
                    <input type="password" id="Wachtwoord" name="WWherhaal"> <br> <br>
                    <input type="submit" value="Aanpassen" name="submit">
                </form>
            </div>
        </div>
    </div>
    <script>
    var copy = "";
    function makeid(length) {
        var result = '';
        var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        var charactersLength = characters.length;
        for ( var i = 0; i < length; i++ ) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
        }
        document.getElementById('text').innerHTML=result;
        copy = result;
    }
    makeid(7);
    document.getElementById('mandje').addEventListener('click',function() {
    navigator.clipboard.writeText(copy);
    alert('Uw code is gekopieerd.');
    });
    </script>
    <footer>
        <!--footer data-->

    </footer>
    <!--linking a .js file-->
    <script src="" type="text/javascript"></script>
</body>

</html>