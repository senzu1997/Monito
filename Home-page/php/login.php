<?php
$is_invalid = false;
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $mysqli = include './database/db.php';
    $sql = sprintf("SELECT * FROM user
                    WHERE email = '%s'",
                   $mysqli->real_escape_string($_POST["email"]));
                   $result = $mysqli ->query($sql);
                   $user = $result->fetch_assoc();

                   if ($user) {
                    if (password_verify($_POST['password'], $user['password_hash'])) {
                        session_start();
                        $_SESSION['user_id'] = $user['id'];

                        header('Location: home.php');
                        exit;
                    };
                    
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
</head>
<body>
    
<form id="login-form" method="POST">
                    <h3>Login</h3>
                    <h4>
                    <?php if ($is_invalid): ?>
        <em>Invalid login</em>
    <?php endif; ?>
                 </h4>
                    <div class="login-container">
                        <label for="email">Email:</label><br>
                        <input type="email" id="email" name="email" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>"> <br>
                        <label for="password">Password:</label><br>
                        <input type="password" id="password" name="password"><br><br>
                        <input class="submit" type="submit" value="Log in">
                        <input class="close" type="submit" value="Close">
                    </div>
                </form>
</body>
</html>