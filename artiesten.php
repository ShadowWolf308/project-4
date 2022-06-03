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
            <a href="">Product Info</a>
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
                <th>Naam</th>
                <th>Achternaam</th>
                <th>Voornaam</th>
                <th>Tussenvoegsel</th>
                <th>Statement</th>
                <th>Telefoon Nummer</th>
                <th>Actief of niet</th>
            </tr>
            <?php
            require('dbconnect.php');
            $sql = "SELECT * FROM artiesten";
            if ($result = $conn->query($sql)) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>";
                    echo $row['naam'];
                    echo "</td>";
                    echo "<td>";
                    echo $row['achternaam'];
                    echo "</td>";
                    echo "<td>";
                    echo $row['voornaam'];
                    echo "</td>";
                    echo "<td>";
                    echo $row['tussenvoegsel'];
                    echo "</td>";
                    echo "<td>";
                    echo $row['statement'];
                    echo "</td>";
                    echo "<td>";
                    echo $row['telefoon'];
                    echo "</td>";
                    echo "<td>";
                    if ($row['actief'] == 1) {
                        echo "wel actief";
                    } else if ($row['actief'] == 0) {
                        echo "niet actief";
                    }
                    echo "</td>";
                    echo "</tr>";
                }
                
            }
            ?>
        </table>
    </section>

    <footer>
        <!--footer data-->

    </footer>
    <!--linking a .js file-->
    <script src="" type="text/javascript"></script>
</body>

</html>