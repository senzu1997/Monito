<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $mysqli = include "./database/db.php";
    $sql = "INSERT INTO user (username, email, password_hash)
    VALUES (?,?,?)";
    $stmt = $mysqli->stmt_init();
    $stmt->prepare($sql);
    $stmt->bind_param("sss", $_POST['username'], $_POST['email'], $password_hash);
    mysqli_report(MYSQLI_REPORT_OFF);
    if ($stmt->execute()) {
        header("Location: ./signup-success.html");
        exit;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles/signup.css">
</head>

<body>
    <div class="register-container">
        <h2>Sign up</h2>
        <form action="./signup.php" method="POST">
            <div>
                <label for="username">Username</label>
            </div>
            <input type="username" name="username">
            <?php
            if (empty($_POST["username"]) && $_SERVER['REQUEST_METHOD'] == 'POST') { ?>
            <p class="validation">Username is required</p>
            <?php } else {
                echo "<p>" . " " . "</p>";
            } ?>
            <div>
                <label for="email">Email</label>
            </div>
            <input type="email" name="email">
            <?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (empty($_POST["username"])) { ?>
            <p class="validation">Valid email is required</p>
            <?php } else {
                    echo "<p>" . " " . "</p>";
                }
            } ?>
            <div>
                <label for="password">Password</label>
            </div>
            <input type="password" name="password">
            <?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (strlen($_POST["password"]) < 8) { ?>
            <p class="validation">Password must be at least 8 characters</p>
            <?php } else {
                    echo "<p>" . " " . "</p>";
                }
            } ?>
            <div>
                <label for="passwordConfirm">Password Confirmation</label>
            </div>
            <input type="password" name="password_confirmation">
            <?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if ($_POST["password"] !== $_POST["password_confirmation"]) { ?>
            <p class="validation">Password must match</p>
            <?php } else {
                    echo "<p>" . " " . "</p>";
                }
            } ?>
            <?php if (($_SERVER["REQUEST_METHOD"] == "POST")) {
                if ($mysqli->errno === 1062) {
                    echo "<p class='validation last'>" . "Email already taken" . "</p>";
                } else {
                    echo "";
                }
            } ?>
            <div class="form-buttons">
                <button type="submit" id="register">Register</button>

                <a href=".././index.php">
                    <button type="button" id="registerCancel">Cancel</button></a>

            </div>


        </form>
    </div>







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>