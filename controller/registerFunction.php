<?php
function registerFunction($firstName, $lastName, $email, $user, $pass){
    include('../model/dbconnection.php');
    $passNew = password_hash($pass, PASSWORD_DEFAULT);
    $sql = "INSERT INTO userDetails (firstName, lastName, password, email, username, role) VALUES('" . $firstName . "', '" . $lastName . "', '" . $passNew . "', '" . $email . "', '" . $user ."', 'user');";
    $res = $db->prepare($sql);
    $res->execute();
    header('Location:loginController.php');
}
?>