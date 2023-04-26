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
</head>

<body>
    <div class="container">
        <?php
        require "header.php";
        ?>
        <video autoplay muted loop id="myVideo">
            <source src="src/background.mp4" type="video/mp4">
        </video>
        <div class="video-overlay"></div>
        <div class="login-container">
            <form action="login-script.php" method="POST" class="login-form">

                <?php
                $loginError = $_GET["login"];
                if (!empty($loginError)) {
                    echo "Foute gebruikersnaam of wachtwoord";
                }
                ?>
                <input type="text" name="gebruikersnaam" placeholder="gebruikersnaam" required>
                <input type="password" name="wachtwoord" placeholder="wachtwoord" required>

                <input type="submit" name="submit" value="Log in">
            </form>
            <div class="login-panel">
                <div class="login-panel-content">
                    <h2>Hallo,</h2>
                    <p>Blah blah schone,duurzame energie en maatschappelijk verantwoord!.</p>
                </div>
            </div>
        </div>
        <div class="index-content">
            <div class="index-content-links">
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum voluptatibus suscipit eligendi voluptates fuga rem deleniti, velit officiis dolorum! Soluta atque debitis obcaecati earum consectetur quaerat, molestias expedita sequi dignissimos recusandae voluptatibus perspiciatis corporis hic eveniet non dolores cupiditate ullam suscipit pariatur ipsam fuga temporibus. Placeat doloremque soluta ad accusantium a sint dolorem inventore explicabo id vero eaque dignissimos dolore dolores hic consequatur voluptas unde eveniet quasi, enim distinctio dolor ea facere animi. Perferendis reprehenderit labore architecto sapiente laborum debitis facere deleniti! Reprehenderit, fugit minima, ipsa assumenda nemo blanditiis saepe dolores mollitia numquam perspiciatis repellendus eos corporis exercitationem nulla facere.
                </p>
            </div>
            <div class="index-content-rechts">
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum voluptatibus suscipit eligendi voluptates fuga rem deleniti, velit officiis dolorum! Soluta atque debitis obcaecati earum consectetur quaerat, molestias expedita sequi dignissimos recusandae voluptatibus perspiciatis corporis hic eveniet non dolores cupiditate ullam suscipit pariatur ipsam fuga temporibus. Placeat doloremque soluta ad accusantium a sint dolorem inventore explicabo id vero eaque dignissimos dolore dolores hic consequatur voluptas unde eveniet quasi, enim distinctio dolor ea facere animi. Perferendis reprehenderit labore architecto sapiente laborum debitis facere deleniti! Reprehenderit, fugit minima, ipsa assumenda nemo blanditiis saepe dolores mollitia numquam perspiciatis repellendus eos corporis exercitationem nulla facere.
                </p>
            </div>
        </div>
        <footer>
            <p>Ruben van Woerkom - 85748 - D2D</p>
        </footer>
    </div>
</body>

</html>