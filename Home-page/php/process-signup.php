<?php

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




?>