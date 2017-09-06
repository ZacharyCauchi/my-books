<?php
function loginFunction($user, $pass){
    include('../model/dbconnection.php');
    $sql = "SELECT * FROM userdetails WHERE username = '" . $user . "'";
    $res = $db->prepare($sql);
    $res->execute();
    $dbPassword = $res->fetch(PDO::FETCH_ASSOC);
    $x = $dbPassword['password'];
    if(password_verify($pass, $x)){
        $_SESSION['loggedIn'] = true;
        header('Location:loginController.php');
    } else {
        $_SESSION['failCount'] = $_SESSION['failCount'] + 1;
        header('Location:loginController.php');
    }
}
?>