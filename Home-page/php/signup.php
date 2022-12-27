<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles/signup.css">
</head>
<body>
    <div class="register-container">
        <h2>Register</h2>
        <form action="./process-signup.php" method="POST">
                <div>
                    <label for="username">Username</label>
                </div>
            <input type="username" name="username">
                <div>
                    <label for="email">Email</label>
                </div>
            <input type="email" name="email">
                <div>
                    <label for="password">Password</label>
                </div>
            <input type="password" name="password">
                <div>
                    <label for="passwordConfirm">Password Confirmation</label>
                </div>
            <input type="password" name="passwordConfirmation">
            <div class="form-buttons">
                <button type = "submit" id="register" >Register</button>
                <button type = "submit" id="registerCancel" >Cancel</button>
            </div>
            
            
        </form>
    </div>    







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>