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
            <table>
                <tr>
                    <th>Klant ID</th>
                    <th>Voornaam</th>
                    <th>Tussenvoegsel</th>
                    <th>Achternaam</th>
                    <th>Postcode</th>
                    <th>Huisnummer</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                    <?php
                         $sql = "SELECT * FROM klant";
                         $statement = $database->prepare($sql);
                         $statement->execute();

                         while ($rij = $statement->fetch()) {
                            echo "<tr id='rij'>";
                            echo "<td>" . $rij["klant_id"] . "</td>";
                            echo "<td>" . $rij["voornaam"] . "</td>";
                            echo "<td>" . $rij["tussenvoegsel"] . "</td>";
                            echo "<td>" . $rij["achternaam"] . "</td>";
                            echo "<td>" . $rij["postcode"] . "</td>";
                            echo "<td>" . $rij["huisnummer"] . "</td>";
                            echo "<td><a href='admin-klant-gegevens.php?klant_id={$rij['klant_id']}'>Gegevens</a></td>";
                            echo "<td><a href='admin-klant-bewerken.php?klant_id={$rij['klant_id']}&gebruikersnaam={$rij['gebruikersnaam']}'>Bewerken</a></td>";
                            echo "<td><a href='admin-klant-verwijderen.php?klant_id={$rij['klant_id']}&gebruikersnaam={$rij['gebruikersnaam']}'>Verwijderen</a></td>";
                            echo "</tr>";
                        }
                    ?>
            </table>
        </div>
</body>

</html>