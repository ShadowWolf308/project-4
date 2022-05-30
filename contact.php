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
    <meta name="author" content="Levy van der Valk">

    <!--search words for google-->
    <meta name="keywords" content="">

    <!--website title in tab-->
    <title>contact</title>

    <!--linking a .css page-->
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="stylesheet" type="text/css" href="./css/contact.css">
</head>

<body>
    <!--body data-->
    <header>
        <!--header data-->
        <div></div>
        <img src="images/logo.png" alt="Logo">
        <nav>
            <a href="./index.php">Home</a>
            <a href="">Product Info</a>
            <a href="">Kalender</a>
            <a href="">Artiesten</a>   
            <a href="">Aanbiedingen</a>
            <a href="./contact.php">Contact</a>
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
    <footer>
        <!--footer data-->

    </footer>
    <!--linking a .js file-->
    <script src="" type="text/javascript"></script>
</body>

</html>