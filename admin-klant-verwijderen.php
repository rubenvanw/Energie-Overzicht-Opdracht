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
        $gebruikersnaam = $_GET['gebruikersnaam'];

        $sql = "DELETE FROM gebruiker WHERE gebruikersnaam=?";
        $statement = $database->prepare($sql);
        $statement->execute([$$gebruikersnaam]);

        $sql2 = "DELETE FROM klant WHERE klant_id=?";
        $statement2 = $database->prepare($sql2);
        $statement2->execute([$id]);


        header("location:overzicht-admin.php");
        ?>
</body>

</html>