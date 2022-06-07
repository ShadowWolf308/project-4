<?php
    $error = "";
    if (isset($_POST['submit'])) {
        if (!empty($_POST['username']) && !empty($_POST['password'])) {
            require("dbconnect.php");
            $sql = "SELECT * FROM gebruikers WHERE username = '".trim($_POST['username'])."' AND password = '".trim($_POST['password'])."'";
            if ($result = $conn->query($sql)) {
                $aantal = $result->num_rows;
                if ($aantal == 1) {
                    $row = $result->fetch_assoc();
                    session_start();
                    $_SESSION['ingelogd'] = true;
                    $_SESSION['username'] = trim($_POST['username']);
                    $_SESSION['id'] = (integer)$row['gebruiker_id'];
                    header("location: ingelogd.php");
                } else {
                    $error = "niet de juiste gegevens ingevuld";
                }
            } 
        } else {
            $error = "vul de velden in";
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
    <link rel="stylesheet" type="text/css" href="./css/inloggen.css">
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
            <a href="./aanbiedingen.php">Aanbiedingen</a>
            <a href="./contact.php">Contact</a>
            <a href="./registreren.php">Registreren</a>
        </nav>
        <div></div>
    </header>
    <form method="POST">
        <input type="text" name="username" required placeholder="vul hier je username in">
        <input type="password" name="password" required placeholder="vul hier je wachtwoord in">
        <input type="submit" value="log in" name="submit">
    </form>
    <p>Nog geen account</p>
    <a href="registreren.php">Maak een account aan</a>
    <footer>
        <!--footer data-->

    </footer>
    <!--linking a .js file-->
    <script src="" type="text/javascript"></script>
</body>

</html>