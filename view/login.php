<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../view/style/style.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
</head>
    <body>
        <div class="loginBox">
            <form action="loginController.php?state=loginTry" method="POST">
            <h2>Login</h2>
                <div class="loginText">Username:</div><input type="text" name="username"></input> <br />
                <div class="loginText">Password:</div><input type="text" name="password"></input> <br />
                <input type="submit" value="Submit" id="loginSubmit">
                <a href="loginController.php?state=registrationForm"><input type="button" value="Not a member? Click here to register" id="register"></input></a>
            </form>
        </div>
    </body>
</html>
