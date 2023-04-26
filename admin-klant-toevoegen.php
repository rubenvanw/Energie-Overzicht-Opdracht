<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>
    <div class="admin-container">
        <?php
        require "navigatie-admin.php";
        ?>
        <div class="admin-content">
            <form action="#" method="POST">

                <input type="text" name="gebruikersnaam" placeholder="gebruikersnaam">
                <input type="password" name="wachtwoord" placeholder="wachtwoord">
                <input type="hidden" name="rol" value="klant">

                <input type="text" name="voornaam" placeholder="voornaam">
                <input type="text" name="tussenvoegsel" placeholder="tussenvoegsel">
                <input type="text" name="achternaam" placeholder="achternaam">

                <input type="text" name="postcode" placeholder="postcode">
                <input type="text" name="huisnummer" placeholder="huisnummer">

                <input type="submit" name="submit" value="Toevoegen">

            </form>
        </div>
        <?php
        if (!empty($_POST)) {

            //inloggegevens
            $gebruikersnaam = $_POST["gebruikersnaam"];
            $wachtwoord = $_POST["wachtwoord"];
            $rol = $_POST["rol"];

            //klantgegevens
            $voornaam = $_POST["voornaam"];
            $tussenvoegsel = $_POST["tussenvoegsel"];
            $achternaam = $_POST["achternaam"];
            $postcode = $_POST["postcode"];
            $huisnummer = $_POST["huisnummer"];

            // $sql0 = "SELECT gebruikersnaam FROM gebruiker WHERE gebebruikersnaam = ?";
            // $statement0 = $database->prepare($sql0);
            // $statement0->execute([$gebruikersnaam]);
            // $resultaat = $statement0->fetch();

            $sql = "INSERT INTO gebruiker (gebruikersnaam, wachtwoord, rol) VALUES (?,?,?)";
            $statement = $database->prepare($sql);
            $statement->execute([$gebruikersnaam, sha1($wachtwoord), $rol]);

            $sql2 = "INSERT INTO klant (gebruikersnaam, voornaam, tussenvoegsel, achternaam, postcode, huisnummer) VALUES (?,?,?,?,?,?)";
            $statement2 = $database->prepare($sql2);
            $statement2->execute([$gebruikersnaam, $voornaam, $tussenvoegsel, $achternaam, $postcode, $huisnummer]);

            if ($statement && $statement2) {
                header("location:overzicht-admin.php");
            } else {
                echo "FOUT bij het toevoegen<br/>";
            }
          
        }

        ?>
</body>

</html>