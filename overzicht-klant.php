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
    <div class="klant-container">
        <?php
        require "navigatie-klant.php";

        $gebruikersnaam = $_GET["gebruikersnaam"];


        $sql = "SELECT klant_id FROM klant WHERE gebruikersnaam = '{$gebruikersnaam}'";
        $statement = $database->prepare($sql);
        $statement->execute();
        $resultaat = $statement->fetch();

        $sql2 = "SELECT januari,februari,maart,april,mei,juni,juli,augustus,september,oktober,november,december FROM stroom WHERE klant_id = {$resultaat['klant_id']}";
        $statement2 = $database->prepare($sql2);
        $statement2->execute();
        $resultaat2 = $statement2->fetch();
        if ($resultaat2) {
            $gegevensstroom = array();
            array_push(
                $gegevensstroom,
                $resultaat2['januari'],
                $resultaat2['februari'],
                $resultaat2['maart'],
                $resultaat2['april'],
                $resultaat2['mei'],
                $resultaat2['juni'],
                $resultaat2['juli'],
                $resultaat2['augustus'],
                $resultaat2['september'],
                $resultaat2['oktober'],
                $resultaat2['november'],
                $resultaat2['december'],
            );
        } else {
            echo "geen gegevens gevonden";
        }

        $sql4 = "SELECT januari,februari,maart,april,mei,juni,juli,augustus,september,oktober,november,december FROM gas WHERE klant_id = {$resultaat['klant_id']}";
        $statement4 = $database->prepare($sql4);
        $statement4->execute();
        $resultaat4 = $statement4->fetch();
        if ($resultaat4) {
            $gegevensgas = array();
            array_push(
                $gegevensgas,
                $resultaat4['januari'],
                $resultaat4['februari'],
                $resultaat4['maart'],
                $resultaat4['april'],
                $resultaat4['mei'],
                $resultaat4['juni'],
                $resultaat4['juli'],
                $resultaat4['augustus'],
                $resultaat4['september'],
                $resultaat4['oktober'],
                $resultaat4['november'],
                $resultaat4['december'],
            );
        } else {
            echo "geen gegevens gevonden";
        }

        $sql5 = "SELECT jaar FROM stroom WHERE klant_id = ?";
        $statement5 = $database->prepare($sql5);
        $statement5->execute([$resultaat["klant_id"]]);

        $sql6 = "SELECT jaar FROM gas WHERE klant_id = ?";
        $statement6 = $database->prepare($sql6);
        $statement6->execute([$resultaat["klant_id"]]);

        ?>

        <div class="klant-content">
            <div class="opties">
                <label for="grafiek-type">Grafiek type:</label>
                <button class="optie-button" onclick="grafiekType('bar')">staaf</button>
                <button class="optie-button" onclick="grafiekType('line')">lijn</button>
                <label for="jaar">Gegevens stroom jaar:</label>
                <select name="jaar" id="jaar" onchange="veranderJaarStroom()">
                    <?php
                    while ($resultaat5 = $statement5->fetch()) {
                        echo "<option value='{$resultaat5['jaar']}'>{$resultaat5['jaar']}</option>";
                    }
                    ?>
                </select>
                <label for="jaar2">Gegevens gas jaar:</label>
                <select name="jaar2" id="jaar2" onchange="veranderJaarGas()">
                    <?php
                    while ($resultaat6 = $statement6->fetch()) {
                        echo "<option value='{$resultaat6['jaar']}'>{$resultaat6['jaar']}</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="stroom">
                <canvas id="stroom"></canvas>
                <div class="info-stroom">
                    <div class="gegevens">
                        <span>Totale stroomverbruik in kWh</span>
                        <span class="totale-verbruik-stroom"></span>
                    </div>
                    <div class="gegevens">
                        <span>Kosten stroomvebruik</span>
                        <span class="totale-kosten-stroom"></span>
                    </div>
                </div>
            </div>
            <div class="gas">
                <div class="info-gas">
                    <div class="gegevens">
                        <span>Totale gasvebruik m3</span>
                        <span class="totale-verbruik-gas"></span>
                    </div>
                    <div class="gegevens">
                        <span>Kosten gasvebruik</span>
                        <span class="totale-kosten-gas"></span>
                    </div>
                </div>
                <canvas id="gas"></canvas>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            // setup block stroom 

            const gegevensstroom = <?php echo json_encode($gegevensstroom); ?>;
            const data = {
                labels: ['Jan', 'Feb', 'Maart', 'April', 'Mei', 'Juni', 'Juli', 'Aug', 'Sep', 'Okt', 'Nov', 'Dec'],
                datasets: [{
                        label: 'Uw stroomverbruik in kWh',
                        data: gegevensstroom,
                        backgroundColor: [
                            'rgba(54, 162, 235, 0.2)'
                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 1)',
                        ],
                        borderWidth: 1
                    },
                    {
                        label: 'gemiddeld verbruik',
                        data: ["354", "345", "357", "365", "349", "374", "324", "316", "318", "352", "356", "346"],
                        backgroundColor: [
                            'rgba(255, 206, 86, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 206, 86, 1)',
                        ],
                        borderWidth: 1
                    }
                ]
            }

            // config block stroom

            const config = {
                type: "bar",
                data,
                options: {
                    responsive: false,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            }

            // render block stroom

            const myChart = new Chart(document.getElementById('stroom'), config);


            // setup block gas
            const gegevensgas = <?php echo json_encode($gegevensgas); ?>;
            const data2 = {
                labels: ['Jan', 'Feb', 'Maart', 'April', 'Mei', 'Juni', 'Juli', 'Aug', 'Sep', 'Okt', 'Nov', 'Dec'],
                datasets: [{
                        label: 'Uw gasverbruik in m3',
                        data: gegevensgas,
                        backgroundColor: [
                            'rgba(54, 162, 235, 0.2)'
                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 1)',
                        ],
                        borderWidth: 1
                    },
                    {
                        label: 'gemiddeld verbruik',
                        data: ["187", "178", "165", "152", "154", "132", "127", "123", "134", "165", "176", "191"],
                        backgroundColor: [
                            'rgba(255, 206, 86, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 206, 86, 1)',
                        ],
                        borderWidth: 1
                    }
                ]
            }

            // config block gas
            const config2 = {
                type: "bar",
                data: data2,
                options: {
                    responsive: false,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            }

            // render block gas
            const myChart2 = new Chart(document.getElementById('gas'), config2);

            function grafiekType(type) {
                myChart.config.type = type;
                myChart2.config.type = type;
                myChart.update();
                myChart2.update();
            }

            function veranderJaarStroom() {
                let jaar = document.getElementById("jaar");
                let xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (xhttp.readyState === 4) {
                        if (xhttp.status === 200) {
                            let responseData = xhttp.response.split("/");
                            myChart.data.datasets[0].data = responseData;
                            myChart.update();

                            let totaalVerbruikStroom = 0;

                            for (x = 0; x < responseData.length; x++) {
                                totaalVerbruikStroom += parseInt(responseData[x]);
                            }

                            let totaleKostenStroom = totaalVerbruikStroom * 0.15;
                            document.querySelector(".totale-verbruik-stroom").innerHTML = totaalVerbruikStroom;
                            document.querySelector(".totale-kosten-stroom").innerHTML = "€" + totaleKostenStroom;
                        }
                    }
                }
                xhttp.open('GET', 'https://85748.ict-lab.nl/Minor%20Verdieping/energieoverzicht/get-gegevens-stroom.php?klant_id=<?php echo $resultaat['klant_id'] ?>&jaar=' + jaar.value, true);
                xhttp.send();
            }

            function veranderJaarGas() {
                let jaar = document.getElementById("jaar2");
                let xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (xhttp.readyState === 4) {
                        if (xhttp.status === 200) {
                            let responseData = xhttp.response.split("/");
                            myChart2.data.datasets[0].data = responseData;
                            myChart2.update();

                            let totaalVerbruikGas = 0;

                            for (x = 0; x < responseData.length; x++) {
                                totaalVerbruikGas += parseInt(responseData[x]);
                            }

                            let totaleKostenGas = totaalVerbruikGas * 2.24;

                            document.querySelector(".totale-verbruik-gas").innerHTML = totaalVerbruikGas;
                            document.querySelector(".totale-kosten-gas").innerHTML = "€" + totaleKostenGas;
                        }
                    }
                }
                xhttp.open('GET', 'https://85748.ict-lab.nl/Minor%20Verdieping/energieoverzicht/get-gegevens-gas.php?klant_id=<?php echo $resultaat['klant_id'] ?>&jaar=' + jaar.value, true);
                xhttp.send();
            }

            let totaalVerbruikStroom = 0
            let totaalVerbruikGas = 0;

            for (x = 0; x < gegevensstroom.length; x++) {
                totaalVerbruikStroom += parseInt(gegevensstroom[x]);
                totaalVerbruikGas += parseInt(gegevensgas[x]);
            }

            let totaleKostenStroom = totaalVerbruikStroom * 0.15;
            let totaleKostenGas = totaalVerbruikGas * 2.24;

            document.querySelector(".totale-verbruik-stroom").innerHTML = totaalVerbruikStroom;
            document.querySelector(".totale-verbruik-gas").innerHTML = totaalVerbruikGas;
            document.querySelector(".totale-kosten-stroom").innerHTML = "€" + totaleKostenStroom;
            document.querySelector(".totale-kosten-gas").innerHTML = "€" + totaleKostenGas;
        </script>
</body>

</html>