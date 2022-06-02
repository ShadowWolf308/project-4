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
    <meta name="author" content="Tom_Diede_Levy_Ryan">

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
            <a href="">Product Info</a>
            <a href="">Kalender</a>
            <a href="">Artiesten</a>   
            <a href="">Aanbiedingen</a>
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

<div id="popup1" class="overlay">
	<div class="popup">
    Uw persoonlijke aanbieding is toegevoegd aan uw winkelmandje
		<a class="close" href="#">&times;</a>
		<div class="content">
        <img id="imgblik" src="./images/blink.png" alt="blikje">
            <button id="mandje"> Ga naar winkelmandje </button>
		</div>
	</div>
</div>
    

    <footer>
        <!--footer data-->

    </footer>
    <!--linking a .js file-->
    <script src="" type="text/javascript"></script>
</body>

</html>