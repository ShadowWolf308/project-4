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
    <meta name="author" content="Levy van der Valk">

    <!--search words for google-->
    <meta name="keywords" content="">

    <!--website title in tab-->
    <title>contact</title>

    <!--linking a .css page-->
    <link rel="stylesheet" type="text/css" href="./css/style.css">
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
            <a href="">Registreren</a>
        </nav>
        <div></div>
    </header>
    <form method="POST">
        <input type="text" name="username" required placeholder="vul hier je username in">
        <input type="password" name="password" required placeholder="vul hier je wachtwoord in">
        <input type="submit" value="log in" name="submit">
    </form>
    <footer>
        <!--footer data-->

    </footer>
    <!--linking a .js file-->
    <script src="" type="text/javascript"></script>
</body>

</html>