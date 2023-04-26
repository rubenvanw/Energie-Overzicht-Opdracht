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
        $jaarErrorStroom = $_GET['jaarStroom'];
        $jaarErrorGas = $_GET['jaarGas'];
        ?>
        <div class="admin-content-gegevens">
            <div class="gegevens-forms">
                <form action="admin-klant-gegevens-toevoegen.php" method="POST" class="gegevens-form">

                    <h2>Invoeren klant verbruik stroom</h2>

                    <?php
                        if(!empty($jaarErrorStroom)){
                            echo "Er bestaat al data voor jaar: {$jaarErrorStroom}";
                        } 
                    ?>

                    <input type="hidden" name="id" value="<?php echo $id ?>">

                    <input type="number" name="jaar" placeholder="jaar">

                    <input type="number" name="januari" placeholder="januari">

                    <input type="number" name="februari" placeholder="februari">

                    <input type="number" name="maart" placeholder="maart">

                    <input type="number" name="april" placeholder="april">

                    <input type="number" name="mei" placeholder="mei">

                    <input type="number" name="juni" placeholder="juni">

                    <input type="number" name="juli" placeholder="juli">

                    <input type="number" name="augustus" placeholder="augustus">

                    <input type="number" name="september" placeholder="september">

                    <input type="number" name="oktober" placeholder="oktober">

                    <input type="number" name="november" placeholder="november">

                    <input type="number" name="december" placeholder="december">

                    <input type="submit" name="submit-stroom" value="Submit">

                </form>

                <form action="admin-klant-gegevens-toevoegen.php" method="POST" class="gegevens-form">

                    <h2>Invoeren klant verbruik gas</h2>

                    <?php
                        if(!empty($jaarErrorGas)){
                            echo "Er bestaat al data voor jaar: {$jaarErrorGas}";
                        } 
                    ?>

                    <input type="hidden" name="id" value="<?php echo $id ?>">

                    <input type="number" name="jaar" placeholder="jaar">

                    <input type="number" name="januari" placeholder="januari">

                    <input type="number" name="februari" placeholder="februari">

                    <input type="number" name="maart" placeholder="maart">

                    <input type="number" name="april" placeholder="april">

                    <input type="number" name="mei" placeholder="mei">

                    <input type="number" name="juni" placeholder="juni">

                    <input type="number" name="juli" placeholder="juli">

                    <input type="number" name="augustus" placeholder="augustus">

                    <input type="number" name="september" placeholder="september">

                    <input type="number" name="oktober" placeholder="oktober">

                    <input type="number" name="november" placeholder="november">

                    <input type="number" name="december" placeholder="december">

                    <input type="submit" name="submit-gas" value="Submit">

                </form>
            </div>
            <div class="gegevens-tables">
            <table class="gegevens-table">
                <tr>
                    <th>Klant ID</th>
                    <th>Jaar</th>
                    <th>Januari</th>
                    <th>Februari</th>
                    <th>Maart</th>
                    <th>April</th>
                    <th>Mei</th>
                    <th>Juni</th>
                    <th>Jul</th>
                    <th>Augustus</th>
                    <th>September</th>
                    <th>Oktober</th>
                    <th>November</th>
                    <th>December</th>
                    <th></th>
                    <th></th>
                </tr>
                    <?php

                         $statement = $database->prepare("SELECT * FROM stroom WHERE klant_id = ?");
                         $statement->execute([$id]);

                         while ($rij = $statement->fetch()) {
                            echo "<tr id='rij'>";
                            echo "<td>" . $rij["klant_id"] . "</td>";
                            echo "<td>" . $rij["jaar"] . "</td>";
                            echo "<td>" . $rij["januari"] . "</td>";
                            echo "<td>" . $rij["februari"] . "</td>";
                            echo "<td>" . $rij["maart"] . "</td>";
                            echo "<td>" . $rij["april"] . "</td>";
                            echo "<td>" . $rij["mei"] . "</td>";
                            echo "<td>" . $rij["juni"] . "</td>";
                            echo "<td>" . $rij["juli"] . "</td>";
                            echo "<td>" . $rij["augustus"] . "</td>";
                            echo "<td>" . $rij["september"] . "</td>";
                            echo "<td>" . $rij["oktober"] . "</td>";
                            echo "<td>" . $rij["november"] . "</td>";
                            echo "<td>" . $rij["december"] . "</td>";
                            echo "<td><a href=''>Bewerken</a></td>";
                            echo "<td><a href=''>Verwijderen</a></td>";
                            echo "</tr>";
                        }
                    ?>
            </table>
            <table>
                <tr>
                    <th>Klant ID</th>
                    <th>Jaar</th>
                    <th>Januari</th>
                    <th>Februari</th>
                    <th>Maart</th>
                    <th>April</th>
                    <th>Mei</th>
                    <th>Juni</th>
                    <th>Jul</th>
                    <th>Augustus</th>
                    <th>September</th>
                    <th>Oktober</th>
                    <th>November</th>
                    <th>December</th>
                    <th></th>
                    <th></th>
                </tr>
                    <?php
                         $statement = $database->prepare("SELECT * FROM gas WHERE klant_id = ?");
                         $statement->execute([$id]);

                         while ($rij = $statement->fetch()) {
                            echo "<tr id='rij'>";
                            echo "<td>" . $rij["klant_id"] . "</td>";
                            echo "<td>" . $rij["jaar"] . "</td>";
                            echo "<td>" . $rij["januari"] . "</td>";
                            echo "<td>" . $rij["februari"] . "</td>";
                            echo "<td>" . $rij["maart"] . "</td>";
                            echo "<td>" . $rij["april"] . "</td>";
                            echo "<td>" . $rij["mei"] . "</td>";
                            echo "<td>" . $rij["juni"] . "</td>";
                            echo "<td>" . $rij["juli"] . "</td>";
                            echo "<td>" . $rij["augustus"] . "</td>";
                            echo "<td>" . $rij["september"] . "</td>";
                            echo "<td>" . $rij["oktober"] . "</td>";
                            echo "<td>" . $rij["november"] . "</td>";
                            echo "<td>" . $rij["december"] . "</td>";
                            echo "<td><a href=''>Bewerken</a></td>";
                            echo "<td><a href=''>Verwijderen</a></td>";
                            echo "</tr>";
                        }
                    ?>
            </table>
            </div>
        </div>
</body>

</html>