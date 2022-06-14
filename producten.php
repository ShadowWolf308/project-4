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
    <link rel="stylesheet" type="text/css" href="./css/productinfo.css">
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
    <table>
        <tr>
            <th colspan="2">Smaak</th>
            <th>Welk evenement/datum verkrijgbaar</th>
        </tr>
        <tr>
            <td><img class="img" src="./images/original.png" alt=""></td>
            <td>Peach</td>
            <td>Verkrijgbaar op elke evenement</td>
        </tr>
        <tr>
            <td><img class="img" src="./images/pineapple.png" alt=""></td>
            <td>Pineapple</td>
            <td>Verkrijgbaar op evenementen tussen 2021-03-01 en 2021-04-01</td>
        </tr>
        <tr>
            <td><img class="img" src="./images/lime.png" alt=""></td>
            <td>Lime</td>
            <td>Verkrijgbaar op evenementen tussen 2021-03-15 en 2021-03-31</td>
        </tr>
        <tr>
            <td><img class="img" src="./images/grape.png" alt=""></td>
            <td>Grape</td>
            <td>Verkrijgbaar op het evenement op 2021-03-01</td>
        </tr>
        <tr>
            <td><img class="img" src="./images/watermelon.png" alt=""></td>
            <td>Watermelon</td>
            <td>Verkrijgbaar op evenementen tussen 2021-04-01 en 2021-04-13</td>
        </tr>
        <tr>
            <td><img class="img" src="./images/blueberry.png" alt=""></td>
            <td>Blueberry</td>
            <td>Verkrijgbaar op het evenement op 2021-04-01</td>
        </tr>
    </table>

    <footer>
        <!--footer data-->

    </footer>
    <!--linking a .js file-->
    <script src="" type="text/javascript"></script>
</body>

</html>