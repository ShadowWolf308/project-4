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
            <a href="">Kalender</a>
            <a href="">Artiesten</a>   
            <a href="">Aanbiedingen</a>
            <a href="./contact.php">Contact</a>
            <a href="./registreren.php">Registreren</a>
        </nav>
        <div></div>
    </header>

    <section>
        <?php
        require('dbconnect.php');
        $sql = "SELECT * FROM evenementen";
        if ($result = $conn->query($sql)) {
            while ($row = $result->fetch_assoc()) {
                $sql = "SELECT * FROM artiesten WHERE artiest_id = ".$row['artiest_id']."";
                if($result2 = $conn->query($sql)) {
                    $row2 = $result2->fetch_assoc();
                    echo $row2['naam']." ";
                }
                $sql = "SELECT* FROM locaties WHERE locatie_id = ".$row['locatie_id']."";
                if($result2 = $conn->query($sql)){
                    $row2 = $result2->fetch_assoc();
                    echo $row2['plaatsnaam']." ".$row2['gebouw']." ";
                }
                echo $row['datum']."<br>";
            }
            
        }
        ?>
    </section>

    <footer>
        <!--footer data-->

    </footer>
    <!--linking a .js file-->
    <script src="" type="text/javascript"></script>
</body>

</html>