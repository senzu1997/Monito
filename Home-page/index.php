<?php
session_start();
if (isset($_SESSION["user_id"])) {
    $mysqli = include "./php/database/db.php";
    $sql = "SELECT * FROM user WHERE id = {$_SESSION["user_id"]}";
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();
    $name = htmlspecialchars($user["username"]);
}
include "./routes.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="./Styles/style.css" />
    <title>Monito - Pets for Best!</title>
</head>

<body>
    <header>
        <div class="nav">
            <img src="./Images/Frame.png" alt="Monito logo">
            <a href="">Home</a>
            <a href="">Category</a>
            <a href="">About</a>
            <a href="">Contact</a>
            <?php if (isset($_SESSION["user_id"])) { ?>
            <div class="user">
                <p> Hello <span><?= $name; ?></span> </p>
                <a href="./php/logout.php">Log out</a>
            </div>
            <?php } else { ?>
            <div class="login-form">
                <a href="./php/login.php"><button class="login">Login</button></a>
                <a href="./php/signup.php"><button class="registration">Register</button></a>
            </div>
            <?php } ?>
        </div>
        <div class="menu-toggle">
            <div class="menu-btn-burger">
            </div>
        </div>
        <div class="hero-banner">
            <h1>One More Friend</h1>
            <h2>Thousands More Fun!</h2>
            <p>Having a pet means you have more joy, a new friend, a happy person who will always be with you to have
                fun. We have 200+ different pets that can meet your needs</p>
            <div class="intro-video" id="introVideo">
                <iframe width="700" height="500" src="https://www.youtube.com/embed/pcDjNkW26fI?start=10"
                    title="YouTube video player" frameborder="1"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
                <div class="intro-buttons">
                    <button class="close-intro explore">Close</button>
                </div>
            </div>
            <div class="hero-buttons">
                <button class="view-intro">View intro <img src="./images/icons/play-icon.png" alt="play-icon"></button>
                <button class="explore">Explore now</button>
            </div>
        </div>
    </header>
    <section>
        <div class="section-header">
            <p>Whats new?</p>
            <div class="header-bottom">
                <h3>Take a Look At Some Of Our Pets</h3>
                <button>View more
                    <img src="./Images/Icons/arrow-icon.png" alt="arrow-icon">
                </button>
            </div>
        </div>
        <div class="card-container">
            <?php foreach ($cards as $card) { ?>
            <div class="card">
                <img src="<?= $card->image ?>" alt="picture of a dog">
                <p><?= $card->title ?></p>
                <div>
                    <p>Gender <?= $card->gender ?></p>
                    <p>Age <?= $card->age ?></p>
                </div>
                <p><?= $card->price ?></p>
            </div>
            <?php } ?>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
    <script src="./Scripts/script.js"></script>
</body>

</html>