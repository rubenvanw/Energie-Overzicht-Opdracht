<?php

$id = $_GET["klant_id"];
$jaar = $_GET["jaar"];

require "connect.php";

$sql = "SELECT januari,februari,maart,april,mei,juni,juli,augustus,september,oktober,november,december FROM gas WHERE klant_id = ? AND jaar = ?";
$statement = $database->prepare($sql);
$statement->execute([$id, $jaar]);

while ($res = $statement->fetch()) {
    echo $res['januari'] . "/";
    echo $res['februari'] . "/";
    echo $res['maart'] . "/";
    echo $res['april'] . "/";
    echo $res['mei'] . "/";
    echo $res['juni'] . "/";
    echo $res['juli'] . "/";
    echo $res['augustus'] . "/";
    echo $res['september'] . "/";
    echo $res['oktober'] . "/";
    echo $res['november'] . "/";
    echo $res['december'];
}
?>