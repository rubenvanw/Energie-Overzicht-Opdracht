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

        $id = $_GET['klant_id'];
        $sql = "SELECT * FROM klant WHERE klant_id = ?";
        $statement = $database->prepare($sql);
        $statement->execute([$id]);
        $klant = $statement->fetch();

        ?>
        <div class="admin-content">
            <form action="#" method="POST">

                <input type="text" name="voornaam" placeholder="voornaam" value="<?php echo $klant['voornaam'] ?>">
                <input type="text" name="tussenvoegsel" placeholder="tussenvoegsel" value="<?php echo $klant['tussenvoegsel'] ?>">
                <input type="text" name="achternaam" placeholder="achternaam" value="<?php echo $klant['achternaam'] ?>">

                <input type="text" name="postcode" placeholder="postcode" value="<?php echo $klant['postcode'] ?>">
                <input type="text" name="huisnummer" placeholder="huisnummer" value="<?php echo $klant['huisnummer'] ?>">

                <input type="submit" name="submit" value="Bewerken">

            </form>
        </div>
        <?php
        if (isset($_POST["submit"])) {
            $voornaam = $_POST["voornaam"];
            $tussenvoegsel = $_POST["tussenvoegsel"];
            $achternaam = $_POST["achternaam"];
            $postcode = $_POST["postcode"];
            $huisnummer = $_POST["huisnummer"];

            $sql2 = "UPDATE klant SET voornaam=?, tussenvoegsel=?, achternaam=?, postcode=?, huisnummer=? WHERE klant_id=?";
            $statement2 = $database->prepare($sql2);
            $statement2->execute([$voornaam, $tussenvoegsel, $achternaam, $postcode, $huisnummer, $id]);

        }

        ?>
</body>

</html>