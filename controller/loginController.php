<?php
include('loginFunction.php');
include('registerFunction.php');
include('../model/selectFunction.php');
include('../model/insertFunction.php');


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
        if(isset($_GET['request'])){
            if($_GET['request'] == 'newBook'){
                include '../view/newBook.php';
            }
            elseif($_GET['request'] == 'newBookSubmit'){
                //insert new author on table

                //use last insert id to use the new author id in book submission

                //use last insert id to reference bookID in bookplot

                //insert modification in modifications table


                $title = $_POST['bookTitle'];
                $original = $_POST['originalTitle'];
                $year = $_POST['publicationYear'];
                $genre = $_POST['genre'];
                $millions = $_POST['millionsSold'];
                $lang = $_POST['language'];
                $author = $_POST['authorID'];
                $cover = $_POST['bookCoverUrl'];
                if(isset($_POST['bookCoverUrl']) == false){
                    $cover = NULL;
                }
                insertFunction(array('state' => 'insertNewBook'), $title, $original, $year, $genre, $millions, $lang, $author, $cover);
            }
        }
        
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
