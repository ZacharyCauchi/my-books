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
            <form action="../controller/loginController.php?state=registration" method="POST">
            <h2>Register</h2>
                <div class="loginText">First Name:</div><input type="text" name="firstName"></input> <br />
                <div class="loginText">Last Name:</div><input type="text" name="lastName"></input> <br />
                <div class="loginText">Email:</div><input type="text" name="email"></input> <br />
                <div class="loginText">Username:</div><input type="text" name="username"></input> <br />
                <div class="loginText">Password:</div><input type="text" name="password"></input> <br />
                <input type="submit" value="Submit" id="registrationSubmit">
                <a href="loginController.php"><input type="button" value="Already a member? click here to login" id="register"></input></a>
            </form>
        </div>
    </body>
</html>
