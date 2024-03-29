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
    <link rel="stylesheet" type="text/css" href="css/kalender.css">
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

    <section>
        <table>
            <tr>
                <th>Naam van de artiest</th>
                <th>Plaats van evenement</th>
                <th>Datum van het evenement</th>
            </tr>
            <?php
            require('dbconnect.php');
            $sql = "SELECT * FROM evenementen";
            if ($result = $conn->query($sql)) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    $sql = "SELECT * FROM artiesten WHERE artiest_id = ".$row['artiest_id'];
                    if($result2 = $conn->query($sql)) {
                        $row2 = $result2->fetch_assoc();
                        echo "<td>";
                        echo $row2['naam'];
                        echo "</td>";
                    }
                    $sql = "SELECT* FROM locaties WHERE locatie_id = ".$row['locatie_id'];
                    if($result2 = $conn->query($sql)){
                        $row2 = $result2->fetch_assoc();
                        echo "<td>";
                        echo $row2['gebouw'].", ".$row2['plaatsnaam'];
                        echo "</td>";
                    }
                    echo "<td>";
                    echo $row['datum'];
                    echo "</td>";
                    echo "</tr>";
                }
                
            }
            ?>
        </table>
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

    </footer>
    <!--linking a .js file-->
    <script src="" type="text/javascript"></script>
</body>

</html>