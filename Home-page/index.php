<?php
// include "./php/login.php";
session_start();
if (isset($_SESSION["user_id"])) {
    $mysqli = include "./php/database/db.php";
    $sql = "SELECT * FROM user WHERE id = {$_SESSION["user_id"]}";
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();
    $name = htmlspecialchars($user["username"]);
}

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
    <link rel="stylesheet" type="text/css" href="style.css" />
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
            <p class="user"> Hello <?= $name; ?> <a href="./php/logout.php">Log out</a> </p>
            <?php } else { ?>
            <div class="logind-form">
                <a href="./php/login.php"><button class="login">Login</button></a>
                <a href="./php/signup.php"><button class="registration">Register</button></a>
            </div>
            <?php } ?>
        </div>
        <div class="menu-toggle">
            <div class="menu-btn-burger">
            </div>
            <div class="right-side">
            </div>
        </div>
    </header>
    <h2 class="h2">Labas</h2>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
    <script src="./Scripts/script.js"></script>
</body>

</html>