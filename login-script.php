<?php
require "connect.php";

 if (isset($_POST["submit"])) {

    $statement = $database->prepare("SELECT * FROM gebruiker WHERE gebruikersnaam = ? AND wachtwoord = ?");
    $statement->execute([$_POST['gebruikersnaam'], sha1($_POST["wachtwoord"])]);
    $gebruiker = $statement->fetch();

    if ($gebruiker && $gebruiker["gebruikersnaam"] == "admin") {
        session_start();
        unset($_SESSION["login_error"]);
        $_SESSION["admin"] = $_POST['gebruikersnaam'];
        header("location: overzicht-admin.php");
    } else if ($gebruiker && $gebruiker["gebruikersnaam"] != "admin") {
        session_start();
        unset($_SESSION["login_error"]);
        $_SESSION["klant"] = $_POST['gebruikersnaam'];
        header("location: overzicht-klant.php?gebruikersnaam={$_POST['gebruikersnaam']}");
    } else {
        header("location: index.php?login=error");
    }
} else {
    echo "error";
}
?>
