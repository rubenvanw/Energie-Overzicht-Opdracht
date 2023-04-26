<?php
    require "connect.php";

        if (!empty($_POST['submit-stroom'])) {
          
            $id = $_POST["id"];
            $jaar = $_POST["jaar"];
            $januari = $_POST["januari"];
            $februari = $_POST["februari"];
            $maart = $_POST["maart"];
            $april = $_POST["april"];
            $mei = $_POST["mei"];
            $juni = $_POST["juni"];
            $juli = $_POST["juli"];
            $augustus = $_POST["augustus"];
            $september = $_POST["september"];
            $oktober = $_POST["oktober"];
            $november = $_POST["november"];
            $december = $_POST["december"];

            $statement = $database->prepare("SELECT klant_id, jaar FROM stroom WHERE klant_id = ? AND jaar = ?");
            $statement->execute([$id, $jaar]);
            $resultaat = $statement->fetchColumn();

            if($resultaat > 0){
                header("location: admin-klant-gegevens.php?klant_id={$id}&jaarStroom={$jaar}");
            } else{
                $sql2 = "INSERT INTO stroom (klant_id, jaar, januari, februari, maart, april, mei, juni, juli, augustus, september, oktober, november, december) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                $statement2 = $database->prepare($sql2);
                $statement2->execute([$id, $jaar, $januari, $februari, $maart, $april, $mei, $juni, $juli, $augustus, $september, $oktober, $november, $december]);
                header("location: admin-klant-gegevens.php?klant_id={$id}");
            }
        }

        if (!empty($_POST['submit-gas'])) {
    
            $id = $_POST["id"];
            $jaar = $_POST["jaar"];
            $januari = $_POST["januari"];
            $februari = $_POST["februari"];
            $maart = $_POST["maart"];
            $april = $_POST["april"];
            $mei = $_POST["mei"];
            $juni = $_POST["juni"];
            $juli = $_POST["juli"];
            $augustus = $_POST["augustus"];
            $september = $_POST["september"];
            $oktober = $_POST["oktober"];
            $november = $_POST["november"];
            $december = $_POST["december"];

            $statement = $database->prepare("SELECT klant_id, jaar FROM gas WHERE klant_id = ? AND jaar = ?");
            $statement->execute([$id, $jaar]);
            $resultaat = $statement->fetchColumn();

            if($resultaat > 0){
                header("location: admin-klant-gegevens.php?klant_id={$id}&jaarGas={$jaar}");
            } else{
                $sql2 = "INSERT INTO gas (klant_id, jaar, januari, februari, maart, april, mei, juni, juli, augustus, september, oktober, november, december) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                $statement2 = $database->prepare($sql2);
                $statement2->execute([$id, $jaar, $januari, $februari, $maart, $april, $mei, $juni, $juli, $augustus, $september, $oktober, $november, $december]);
                header("location: admin-klant-gegevens.php?klant_id={$id}");
            }

        }
        ?>