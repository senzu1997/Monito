<?php
$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

if(empty($_POST['username'])){
    die("Name is required");
}

if(! filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)) {
    die('Valid email is required');
}
if ($_POST['password'] !== $_POST['repeatPassword']) {
    die("Password adress does not match");
}
if (strlen($_POST['password']) <8) {
    die("Password must be at least 8 characters");
}

if ( ! preg_match("/[a-z]/i", $_POST["password"])) {
    die("Password must contain at least one letter");
}

if ( ! preg_match("/[0-9]/", $_POST["password"])) {
    die("Password must contain at least one number");
}
$mysqli = include "./database/db.php";
$sql = "INSERT INTO user (username , password_hash , email)
VALUES (?,?,?)";

$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("sss",$_POST['username'],$password_hash,$_POST['email'],);

mysqli_report(MYSQLI_REPORT_OFF);
if ($stmt->execute()) {

    header("Location: signup-success.html");
    exit;
    
} else {
    
    if ($mysqli->errno === 1062) {
       echo("email already taken");
    } else {
        echo($mysqli->error . " " . $mysqli->errno);
    }
}
echo $mysqli->error;




?>