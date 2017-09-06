<?php
include('loginFunction.php');
include('registerFunction.php');
include('../model/selectFunction.php');

session_start();
if(!isset($_SESSION['failCount'])){
    $_SESSION['failCount'] = 0;
}
if(isset($_GET['logout'])) {
    session_destroy();
    header('Location:../index.php');
}

if(isset($_SESSION['loggedIn'])){
    if($_SESSION['loggedIn'] == true){
        include '../view/headerSecure.php';
        include '../view/secure.php';
        
    }
} else {
    if(isset($_GET['state'])){
        if($_GET['state'] == 'loginTry'){
            $user = $_POST["username"];
            $pass = $_POST["password"];
            loginFunction($user, $pass);

        } elseif($_GET['state'] == 'registration'){
            $firstName = $_POST["firstName"];
            $lastName = $_POST["lastName"];
            $email = $_POST["email"];
            $user = $_POST["username"];
            $pass = $_POST["password"];
            registerFunction($firstName, $lastName, $email, $user, $pass);
        } elseif($_GET['state'] == 'registrationForm'){
            include '../view/registration.php';
        }  
     
    } else {
            if ($_SESSION['failCount'] > 50){
                echo 'Too many failed attempts, try again soon';
            } else {
                    include '../view/login.php';
                    echo 'welcome ';
                    echo $_SESSION['failCount'];
            }   
        }
}

?>
