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
$gender = ($card->gender === 1) ? "male" : "female";

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
                <p class="title"><?= $card->title ?></p>
                <div class="gender">
                    <p>Gender: <span><?= $gender ?></span> </p>
                    <p>Age: <span><?= $card->age ?></span> months. </p>
                </div>
                <p>Price: <span><?= $card->price ?> &euro;</span> </p>
            </div>
            <?php } ?>
        </div>
        <div class="banner-container">
            <h3>One More Friend</h3>
            <h4>Thousands More Fun!</h4>
            <p>Having a pet means you have more joy, a new friend, a happy person who will always be with you to have
                fun. We have 200+ different pets that can meet your needs!</p>
            <div class="banner-buttons">
                <button class="view-intro">View intro <img src="./images/icons/play-icon.png" alt="play-icon"></button>
                <button class="explore">Explore now</button>
            </div>
        </div>
    </section>
    <section>
        <div class="sellers-header">
            <p>Proud to be part of <span> Pet Sellers</span> </p>
            <button>View all our sellers <img src="./images/Icons/arrow-icon.png" alt=""></button>
        </div>
        <div class="image-list">
            <img src="./Images/Pet_seller_icons/bakers.png" alt="Bakers logo">
            <img src="./Images/Pet_seller_icons/butchers.png" alt="Buchers logo">
            <img src="./Images/Pet_seller_icons/felix.png" alt="Felix logo">
            <img src="./Images/Pet_seller_icons/Good_boy.png" alt="Goodboy logo">
            <img src="./Images/Pet_seller_icons/Pedigree.png" alt="Pedigree logo">
            <img src="./Images/Pet_seller_icons/sheba.png" alt="Sheba logo">
            <img src="./Images/Pet_seller_icons/whiskas.png" alt="Whiskas logo">
        </div>
    </section>
    <article>
        <div class="adopt-banner">
            <h2>Adoption</h2>
            <h3>We Need Help. So Do They.</h3>
            <p>Adopt a pet and give it a home, it will love you unconditionally. </p>
            <div class="banner-buttons">
                <button class="explore">Explore Now</button>
                <button class="view-intro">View Intro <img src="./Images/Icons/play-icon.png" alt="play-icon"></button>
            </div>
        </div>
    </article>
    <footer>
        <div class="footer-container">
            <h2>Register Now So You Don't Miss Our Programs</h2>
            <div class="input-container">
                <input type="text" placeholder="Enter your Email">
                <button type="submit">Subscribe Now</button>
            </div>
        </div>
        <div class="footer-bottom-container">
            <nav>
                <a href="">Home</a>
                <a href="">Category</a>
                <a href="">About</a>
                <a href="">Contact</a>
            </nav>
            <div class="social">
                <a href="">
                    <img src="./Images/social_icons/fb.png" alt="Fb icon">
                </a>
                <a href="">
                    <img src="./Images/social_icons/twitter.png" alt="Twitter icon">
                </a>
                <a href="">
                    <img src="./Images/social_icons/instagram.png" alt="Instagram icon">
                </a>
                <a href="">
                    <img src="./Images/social_icons/youtube.png" alt="Youtube icon">
                </a>
            </div>
        </div>
        <hr>
        <div class="copyright">
            <p>&#169; 2022 Monito. All rights reserved.</p>
            <img src="./Images/Frame.png" alt="Monito logo">
            <div>
                <a href="">Terms of Service</a>
                <a href="">Privacy Policy</a>
            </div>

        </div>
    </footer>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
    <script src="./Scripts/script.js"></script>
</body>

</html>