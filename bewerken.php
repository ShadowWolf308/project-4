<?php
    session_start();
    // if ($_SESSION['ingelogd'] != true) {
    //     header("location: index.php");
    // }
    // if ($_SESSION['perm'] != 2) {
    //     header("location: ingelogd.php");
    // }
    require('dbconnect.php');
    function safe($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = $conn->real_escape_string($data);
        return $data;
    }
    $error = "";
    if (isset($_POST['submit'])) {
        if ($_POST['select'] == "insert") {
            if ($_POST['selecttable'] == "gebruiker") {
                $username = safe($_POST['insertname']);
                $password = safe($_POST['insertpass']);
                $permision = safe($_POST['insertperm']);
                $sql = "INSERT INTO gebruikers (username, password, permission) VALUES (".$username.",".$password.",".$permision.")";
                if ($result = $conn->query($sql)) {
                    $error = "toe gevoegt!";
                } 
            }
            if ($_POST['selecttable'] == "aanbieding") {
                $titel = safe($_POST['inserttitel']);
                $begin = safe($_POST['insertbegindatum']);
                $eind = safe($_POST['inserteinddatum']);
                $omschrijving = safe($_POST['insertomschrijving']);
                $png = safe($_POST['insertpng']);
                $sql = "INSERT INTO aanbiedingen (titel,begindatum,einddatum,omschrijving,afbeelding) VALUES (".$titel.",".$begin.",".$eind.",".$omschrijving.",".$png.")";
                if ($result = $conn->query($sql)) {
                    $error = "toe gevoegt!";
                } 
            }
            if ($_POST['selecttable'] == "artiesten") {
                $naam = safe($_Post['insertnaam']);
                $achternaam = safe($_Post['insertachternaam']);
                $voornaam = safe($_Post['insertvoornaam']);
                $tussenvoegsel = safe($_Post['inserttussenvoegsel']);
                $statement = safe($_Post['insertstatement']);
                $telefoon = safe($_Post['inserttelefoon']);
                $actief = safe($_Post['insertactief']);
                $sql = "INSERT INTO artiesten (naam,achternaam,voornaam,tussenvoegsel,`statement`,telefoon,actief) VALUES (".$naam.",".$achternaam.",".$voornaam.",".$tussenvoegsel.",".$statement.",".$telefoon.",".$actief.")";
                if ($result = $conn->query($sql)) {
                    $error = "toe gevoegt!";
                } 
            }
            if ($_POST['selecttable'] == "locaties") {
                $plaatsnaam = safe($_Post['insertplaatsnaam']);
                $gebouw = safe($_Post['insertgebouw']);
                $adres = safe($_Post['insertadres']);
                $postcode = safe($_Post['insertpostcode']);
                $sql = "INSERT INTO locaties (plaatsnaam,gebouw,adres,postcode) VALUES (".$plaatsnaam.",".$gebouw.",".$adres.",".$postcode.")";
                if ($result = $conn->query($sql)) {
                    $error = "toe gevoegt!";
                } 
            }
        }
        else if ($_POST['select'] == "update") {
            if ($_POST['selecttable'] == "gebruiker") {
                $perm = safe($_POST['permissions']);
                $sql = "UPDATE `gebruikers` SET `permission`='".$perm."' WHERE `username` = ".$_POST['gebruikersupdate'];
                if ($result = $conn->query($sql)) {
                    $error = "geupdate!";
                } 
            }
            if ($_POST['selecttable'] == "aanbieding") {
                $begin = safe($_POST['updatebegin']);
                $eind = safe($_POST['updateeind']);
                $omschrijf = safe($_POST['updateomschrijving']);
                $sql = "UPDATE `aanbiedingen` SET `begindatum` = '".$begin."', `einddatum` = '".$eind."', `omschrijving` = '".$omschrijf."' `WHERE titel` = ".$_POST['aanbiedingsupdate'];
                if ($result = $conn->query($sql)) {
                    $error = "geupdate!";
                } 
            }
            if ($_POST['selecttable'] == "artiesten") {
                $naam = safe($_POST['naamupdate']);
                $achternaam = safe($_POST['achternaamupdate']);
                $voornaam = safe($_POST['voornaamupdate']);
                $tussen = safe($_POST['tussenvoegselupdate']);
                $state = safe($_POST['statementupdate']);
                $telefoon = safe($_POST['telefoonupdate']);
                $actief = safe($_POST['actiefupdate']);
                $sql = "UPDATE `artiesten` SET `naam` = '".$naam."', `achternaam` = '".$achternaam."', `voornaam` = '".$voornaam."', `tussenvoegsel` = '".$tussen."', `statement` = '".$state."', `telefoon` = '".$telefoon."', `actief` = '".$actief."' WHERE artiest_id =".$_POST['artiestupdate'];
                if ($result = $conn->query($sql)) {
                    $error = "geupdate!";
                } 
            }
            if ($_POST['selecttable'] == "locaties") {
                $gebouw = safe($_POST['gebouwupdate']);
                $plaats = safe($_POST['plaatsnaamupdate']);
                $post = safe($_POST['postupdate']);
                $adres = safe($_POST['adresupdate']);
                $sql = "UPDATE locaties SET `gebouw` = '".$gebouw."', `plaatsnaam` = '".$plaats."', `postcode` = '".$post."', `adres` = '".$adres."' WHERE locatie_id = ".$_POST['locatieupdate'];
                if ($result = $conn->query($sql)) {
                    $error = "geupdate!";
                } 
            }
        }
        else if ($_POST['select'] == "delete") {
            if ($_POST['selecttable'] == "gebruiker") {
                $sql = "DELETE FROM gebruikers WHERE gebruiker_id = ".$_POST['gebruikerdelete'];
                if ($result = $conn->query($sql)) {
                    $error = "gedelete!";
                } 
            }
            if ($_POST['selecttable'] == "aanbieding") {
                $sql = "DELETE FROM aanbiedingen WHERE titel = ".$_POST['aanbiedingdelete'];
                if ($result = $conn->query($sql)) {
                    $error = "gedelete!";
                }
            }
            if ($_POST['selecttable'] == "artiesten") {
                $sql = "DELETE FROM artiesten WHERE artiest_id = ".$_POST['artiestdelete'];
                if ($result = $conn->query($sql)) {
                    $error = "gedelete!";
                }
            }
            if ($_POST['selecttable'] == "locaties") {
                $sql = "DELETE FROM locaties WHERE locatie_id = ".$_POST['locatiedelete'];
                if ($result = $conn->query($sql)) {
                    $error = "gedelete!";
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
    <meta name="author" content="Tom Diede Levy Ryan">

    <!--search words for google-->
    <meta name="keywords" content="">

    <!--website title in tab-->
    <title>www.TIGER.nl</title>

    <!--linking a .css page-->
    <link rel="stylesheet" type="text/css" href="./css/bewerken.css">
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
            <a href="./Aanbiedingen.php">Aanbiedingen</a>
            <a href="./contact.php">Contact</a>
            <a href="./registreren.php">Registreren</a>
        </nav>
        <div></div>
    </header>
    <form method="POST">
        <label for="select">Wat wil je doen?</label>
        <select name="select" id="doen" onChange="select_change()">
            <option value="insert">voeg toe</option>
            <option value="update">update</option>
            <option value="delete">verwijder</option>
        </select>
        <label for="selecttable">Welke tabel wil je bewerken?</label>
        <select name="selecttable" id="tabel" onChange="select_change1()">
            <option value="gebruiker">gebruikers</option>
            <option value="aanbieding">aanbiedingen</option>
            <option value="artiesten">artiesten</option>
            <option value="locaties">locaties</option>
        </select>
        <p>VUL ALTIJD ALLES IN!</p><br><br>
        <section id="update">
            <article id="gebruiker">
                <select name="gebruikersupdate" id="">
                    <?php
                        $sql = "SELECT * FROM gebruikers";
                        if($result = $conn->query($sql)) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value ".$row['username'].">";
                                echo $row['username'];
                                echo "</option>";
                            }
                        }
                    ?>
                </select><br>
                <input type="text" name="permissions"><br>
            </article>
            <article id="aanbieding">
                <select name="aanbiedingsupdate" id="">
                    <?php
                        $sql = "SELECT * FROM aanbiedingen";
                        if($result = $conn->query($sql)) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value ".$row['titel'].">";
                                echo $row['titel'];
                                echo "</option>";
                            }
                        }
                    ?>
                </select><br>
                <label for="updatebegin">begindatum:</label><br>
                <input type="text" name="updatebegin"><br>
                <label for="updateeind">einddatum:</label><br>
                <input type="text" name="updateeind"><br>
                <label for="updateomschrijving">omschrijving:</label><br>
                <input type="text" name="updateomschrijving"><br>
            </article>
            <article id="artiest">
                <select name="artiestupdate" id="">
                    <?php
                        $sql = "SELECT * FROM artiesten";
                        if($result = $conn->query($sql)) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value ".$row['artiest_id'].">";
                                echo $row['naam'];
                                echo "</option>";
                            }
                        }
                    ?>
                </select><br>
                <label for="naamupdate">artiesten naam:</label><br>
                <input type="text" name="naamupdate" id=""><br>
                <label for="achternaamupdate">achternaam:</label><br>
                <input type="text" name="achternaamupdate" id=""><br>
                <label for="voornaamupdate">voornaam:</label><br>
                <input type="text" name="voornaamupdate" id=""><br>
                <label for="tussenvoegselupdate">tussenvoegsels:</label><br>
                <input type="text" name="tussenvoegselupdate" id=""><br>
                <label for="statementupdate">statement:</label><br>
                <input type="text" name="statementupdate" id=""><br>
                <label for="telefoonupdate">telefoonnummer:</label><br>
                <input type="text" name="telefoonupdate" id=""><br>
                <label for="actiefupdate">actief &#40;alleen een 1 of een 0 invullen!&#41;:</label><br>
                <input type="text" name="actiefupdate" id=""><br>
            </article>
            <article id="locatie">
                <select name="locatieupdate" id="">
                    <?php
                        $sql = "SELECT * FROM locaties";
                        if($result = $conn->query($sql)) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value ".$row['locatie_id'].">";
                                echo $row['plaatsnaam'].", ".$row['gebouw'];
                                echo "</option>";
                            }
                        }
                    ?>
                </select><br>
                <label for="plaatsnaamupdate">plaatsnaam:</label><br>
                <input type="text" name="plaatsnaamupdate" id=""><br>
                <label for="gebouwupdate">gebouw:</label><br>
                <input type="text" name="gebouwupdate" id=""><br>
                <label for="postupdate">postcode:</label><br>
                <input type="text" name="postupdate" id=""><br>
                <label for="adresupdate">adres:</label><br>
                <input type="text" name="adresupdate" id=""><br>
            </article>
        </section>
        <section id="insert">
            <article id="gebruiker1">
                <label for="insertname">username:</label><br>
                <input name="insertname" type="text"><br>
                <label for="insertpass">password:</label><br>
                <input name="insertpass" type="text"><br>
                <label for="insertperm">permission level &#40;alleen een 1 en een 2 invullen!&#41;:</label><br>
                <input name="insertperm" type="text"><br>
            </article>
            <article id="aanbieding1">
                <label for="inserttitel">titel:</label><br>
                <input name="inserttitel" type="text"><br>
                <label for="insertbegindatum">begindatum:</label><br>
                <input name="insertbegindatum" type="text"><br>
                <label for="inserteinddatum">einddatum:</label><br>
                <input name="inserteinddatum" type="text"><br>
                <label for="insertomschrijving">omschrijving:</label><br>
                <input name="insertomschrijving" type="text"><br>
                <label for="insertpng">png:</label><br>
                <input name="insertpng" type="text"><br>
            </article>
            <article id="artiest1">
                <label for="insertnaam">naam:</label><br>
                <input name="insertnaam" type="text"><br>
                <label for="insertachternaam">achternaam:</label><br>
                <input name="insertachternaam" type="text"><br>
                <label for="insertvoornaam">voornaam:</label><br>
                <input name="insertvoornaam" type="text"><br>
                <label for="inserttussen">tussenvoegsels:</label><br>
                <input name="inserttussen" type="text"><br>
                <label for="insertstatement">statement:</label><br>
                <input name="insertstatement" type="text"><br>
                <label for="inserttelefoon">telefoonnummer:</label><br>
                <input name="inserttelefoon" type="text"><br>
                <label for="insertactief">actief &#40;alleen een 0 of een 1 invullen!&#41;:</label><br>
                <input name="insertactief" type="text"><br>
            </article>
            <article id="locatie1">
                <label for="insertplaatsnaam">plaatsnaam:</label><br>
                <input name="insertplaatsnaam" type="text"><br>
                <label for="insertgebouw">gebouw:</label><br>
                <input name="insertgebouw" type="text"><br>
                <label for="insertadres">adres:</label><br>
                <input name="insertadres" type="text"><br>
                <label for="insertpost">postcode:</label><br>
                <input name="insertpost" type="text"><br>
            </article>
        </section>
        <section id="delete">
            <article id="gebruiker2">
            <select name="gebruikerdelete" id="">
                    <?php
                        $sql = "SELECT * FROM gebruikers";
                        if($result = $conn->query($sql)) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value ".$row['gebruiker_id'].">";
                                echo $row['username'];
                                echo "</option>";
                            }
                        }
                    ?>
                </select>
            </article>
            <article id="aanbieding2">
            <select name="aanbiedingdelete" id="">
                    <?php
                        $sql = "SELECT * FROM aanbiedingen";
                        if($result = $conn->query($sql)) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value ".$row['titel'].">";
                                echo $row['titel'];
                                echo "</option>";
                            }
                        }
                    ?>
                </select>
            </article>
            <article id="artiest2">
            <select name="artiestdelete" id="">
                    <?php
                        $sql = "SELECT * FROM artiesten";
                        if($result = $conn->query($sql)) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value ".$row['artiest_id'].">";
                                echo $row['naam'];
                                echo "</option>";
                            }
                        }
                    ?>
                </select>
            </article>
            <article id="locatie2">
            <select name="locatiedelete" id="">
                    <?php
                        $sql = "SELECT * FROM locaties";
                        if($result = $conn->query($sql)) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value ".$row['locatie_id'].">";
                                echo $row['plaatsnaam'].", ".$row['gebouw'];
                                echo "</option>";
                            }
                        }
                    ?>
                </select>
            </article>
        </section>
        <input type="submit" name="submit" id="submit" value="voer uit">
        <?php echo $error ?>
    </form>
    <footer>
        <!--footer data-->

    </footer>
    <!--linking a .js file-->
    <script>
        function select_change() {
            var x = document.getElementById('doen').value;
            if (x == "update") {
                document.getElementById('update').style.display = 'block';
                document.getElementById('insert').style.display = 'none';
                document.getElementById('delete').style.display = 'none';
                document.getElementById('gebruiker').style.display = 'none';
                document.getElementById('aanbieding').style.display = 'none';
                document.getElementById('artiest').style.display = 'none';
                document.getElementById('locatie').style.display = 'none';
                document.getElementById('gebruiker1').style.display = 'none';
                document.getElementById('aanbieding1').style.display = 'none';
                document.getElementById('artiest1').style.display = 'none';
                document.getElementById('locatie1').style.display = 'none';
                document.getElementById('gebruiker2').style.display = 'none';
                document.getElementById('aanbieding2').style.display = 'none';
                document.getElementById('artiest2').style.display = 'none';
                document.getElementById('locatie2').style.display = 'none';
            }else if (x == "insert") {
                document.getElementById('update').style.display = 'none';
                document.getElementById('insert').style.display = 'block';
                document.getElementById('delete').style.display = 'none';
                document.getElementById('gebruiker').style.display = 'none';
                document.getElementById('aanbieding').style.display = 'none';
                document.getElementById('artiest').style.display = 'none';
                document.getElementById('locatie').style.display = 'none';
                document.getElementById('gebruiker1').style.display = 'none';
                document.getElementById('aanbieding1').style.display = 'none';
                document.getElementById('artiest1').style.display = 'none';
                document.getElementById('locatie1').style.display = 'none';
                document.getElementById('gebruiker2').style.display = 'none';
                document.getElementById('aanbieding2').style.display = 'none';
                document.getElementById('artiest2').style.display = 'none';
                document.getElementById('locatie2').style.display = 'none';
            }else if (x == "delete") {
                document.getElementById('update').style.display = 'none';
                document.getElementById('insert').style.display = 'none';
                document.getElementById('delete').style.display = 'block';
                document.getElementById('gebruiker').style.display = 'none';
                document.getElementById('aanbieding').style.display = 'none';
                document.getElementById('artiest').style.display = 'none';
                document.getElementById('locatie').style.display = 'none';
                document.getElementById('gebruiker1').style.display = 'none';
                document.getElementById('aanbieding1').style.display = 'none';
                document.getElementById('artiest1').style.display = 'none';
                document.getElementById('locatie1').style.display = 'none';
                document.getElementById('gebruiker2').style.display = 'none';
                document.getElementById('aanbieding2').style.display = 'none';
                document.getElementById('artiest2').style.display = 'none';
                document.getElementById('locatie2').style.display = 'none';
            }
        }
        function select_change1() {
            var x = document.getElementById('doen').value;
            var y = document.getElementById('tabel').value;
            if (x == "update") {
                if (y == "gebruiker") {
                    document.getElementById('gebruiker').style.display = 'block';
                    document.getElementById('aanbieding').style.display = 'none';
                    document.getElementById('artiest').style.display = 'none';
                    document.getElementById('locatie').style.display = 'none';
                }
                if (y == "aanbieding") {
                    document.getElementById('gebruiker').style.display = 'none';
                    document.getElementById('aanbieding').style.display = 'block';
                    document.getElementById('artiest').style.display = 'none';
                    document.getElementById('locatie').style.display = 'none';
                }
                if (y == "artiesten") {
                    document.getElementById('gebruiker').style.display = 'none';
                    document.getElementById('aanbieding').style.display = 'none';
                    document.getElementById('artiest').style.display = 'block';
                    document.getElementById('locatie').style.display = 'none';
                }
                if (y == "locaties") {
                    document.getElementById('gebruiker').style.display = 'none';
                    document.getElementById('aanbieding').style.display = 'none';
                    document.getElementById('artiest').style.display = 'none';
                    document.getElementById('locatie').style.display = 'block';
                }
                
            }else if (x == "insert") {
                if (y == "gebruiker") {
                    document.getElementById('gebruiker1').style.display = 'block';
                    document.getElementById('aanbieding1').style.display = 'none';
                    document.getElementById('artiest1').style.display = 'none';
                    document.getElementById('locatie1').style.display = 'none';
                }
                if (y == "aanbieding") {
                    document.getElementById('gebruiker1').style.display = 'none';
                    document.getElementById('aanbieding1').style.display = 'block';
                    document.getElementById('artiest1').style.display = 'none';
                    document.getElementById('locatie1').style.display = 'none';
                }
                if (y == "artiesten") {
                    document.getElementById('gebruiker1').style.display = 'none';
                    document.getElementById('aanbieding1').style.display = 'none';
                    document.getElementById('artiest1').style.display = 'block';
                    document.getElementById('locatie1').style.display = 'none';
                }
                if (y == "locaties") {
                    document.getElementById('gebruiker1').style.display = 'none';
                    document.getElementById('aanbieding1').style.display = 'none';
                    document.getElementById('artiest1').style.display = 'none';
                    document.getElementById('locatie1').style.display = 'block';
                }
            }else if (x == "delete") {
                if (y == "gebruiker") {
                    document.getElementById('gebruiker2').style.display = 'block';
                    document.getElementById('aanbieding2').style.display = 'none';
                    document.getElementById('artiest2').style.display = 'none';
                    document.getElementById('locatie2').style.display = 'none';
                }
                if (y == "aanbieding") {
                    document.getElementById('gebruiker2').style.display = 'none';
                    document.getElementById('aanbieding2').style.display = 'block';
                    document.getElementById('artiest2').style.display = 'none';
                    document.getElementById('locatie2').style.display = 'none';
                }
                if (y == "artiesten") {
                    document.getElementById('gebruiker2').style.display = 'none';
                    document.getElementById('aanbieding2').style.display = 'none';
                    document.getElementById('artiest2').style.display = 'block';
                    document.getElementById('locatie2').style.display = 'none';
                }
                if (y == "locaties") {
                    document.getElementById('gebruiker2').style.display = 'none';
                    document.getElementById('aanbieding2').style.display = 'none';
                    document.getElementById('artiest2').style.display = 'none';
                    document.getElementById('locatie2').style.display = 'block';
                }
            }
        }
    </script>
</body>

</html>