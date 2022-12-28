<?php
$is_invalid = false;
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $mysqli = require __DIR__ . "./database/db.php";
    $sql = sprintf("SELECT * FROM user
                    WHERE email = '%s'",
        $mysqli->real_escape_string($_POST["email"])
    );
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();
    if ($user) {
        if (password_verify($_POST["password"], $user["password_hash"])) {
            session_start();
            session_regenerate_id();
            $_SESSION["user_id"] = $user["id"];
            header("Location: ../index.php");
            exit;
        }
    }
    $is_invalid = true;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./styles/login.css">
</head>

<body>
    <div class="login-container">
        <h2>Login</h2>
        <?php if ($is_invalid): ?>
        <p class="validation">Invalid login</p>
        <?php endif; ?>
        <form method="POST">
            <div>
                <label for="email">Email</label>
            </div>
            <input type="email" name="email" id="email">
            <div>
                <label for="password">Password</label>
            </div>
            <input type="password" name="password" id="name">
            <div>
                <button type="submit">Login</button>
            </div>
        </form>
        <a href="../index.php"><button class="cancel">Cancel</button></a>
    </div>
</body>

</html>