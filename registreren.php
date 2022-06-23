<?php
    $error = "";
    if (isset($_POST['submit'])) {
        if (!empty($_POST['username']) && !empty($_POST['password'])) {
            if(trim($_POST['password']) == trim($_POST['passwordcheck'])){
                require("dbconnect.php");
                function safe($data) {
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
                }
                $user = safe($_POST['username']);
                $user = $conn->real_escape_string($user);
                $pass = safe($_POST['password']);
                $pass = $conn->real_escape_string($pass);
                $sql = "SELECT * FROM gebruikers WHERE username = '".$user."'";
                if ($result = $conn->query($sql)) {
                    $aantal = $result->num_rows;
                    if ($aantal == 0) {
                    $sql = "INSERT INTO gebruikers (username,password,permission) VALUES ('".$user."','".$pass."','1')";
                    if ($result = $conn->query($sql)) {
                        $sql = "SELECT * FROM gebruikers WHERE username = '".$user."' AND password = '".$pass."'";
                        if ($result = $conn->query($sql)) {
                            $aantal = $result->num_rows;
                            if ($aantal == 1) {
                                $row = $result->fetch_assoc();
                                session_start();
                                $_SESSION['ingelogd'] = true;
                                $_SESSION['username'] = trim($_POST['username']);
                                $_SESSION['id'] = (integer)$row['gebruiker_id'];
                                $_SESSION['perm'] = (integer)$row['permission'];
                                header("location: ingelogd.php");
                            }
                        }
                    } 
                } else {
                    $error = "deze gebruikersnaam is al in gebruik";
                }
            } else {
                $error = "wachtwoorden zijn niet hetzelfde";
            }
        } else {
            $error = "vul de velden in";
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
    <link rel="stylesheet" type="text/css" href="./css/registreren.css">
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

    <section class="Registreer">
    <form method="POST">
        <input type="text" name="username" required placeholder="vul hier je username in"> <br>
        <input type="password" name="password" required placeholder="vul hier je wachtwoord in"> <br>
        <input type="password" name="passwordcheck" required placeholder="vul hier je wachtwoord nog een keer in"> <br>
        <input type="submit" value="registreer" name="submit">
        
        <p id='error'> <?php echo $error ?> </p>
    </form> <br> <br>
    <section class="alacc">
    <p class="p2">Heb je al een account?</p>
    <a class="inlog" href="inloggen.php">Log In</a>
    </section>
    </section>

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

    <!--linking a .js file-->
    <script src="" type="text/javascript"></script>
</body>

</html>

