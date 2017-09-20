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
                // insert new author on table
                $authorName = $_POST['authorName'];
                $authorSurname = $_POST['authorSurname'];
                $authorNation = $_POST['authorNation'];
                $authorBirth = $_POST['authorBirth'];
                $authorDeath = $_POST['authorDeath'];
                insertFunction(array('state' => 'insertNewAuthor'), array('authorName' => $authorName, 'authorSurname' => $authorSurname, 'authorNation' => $authorNation, 'authorBirth' => $authorBirth, 'authorDeath' => $authorDeath));
                // use last insert id to use the new author id in book submission
                $title = $_POST['bookTitle'];
                $original = $_POST['originalTitle'];
                $year = $_POST['publicationYear'];
                $genre = $_POST['genre'];
                $millions = $_POST['millionsSold'];
                $lang = $_POST['language'];
                $cover = $_POST['bookCoverUrl'];
                if(isset($_POST['bookCoverUrl']) == false){
                    $cover = NULL;
                }
                insertFunction(array('state' => 'insertNewBook'), array('title' => $title, 'original' => $original, 'year' => $year, 'genre' => $genre, 'millions' => $millions, 'lang' => $lang, 'author' => $lastInsert, 'cover' => $cover));
                // use last insert id to reference bookID in bookplot
                $plot = $_POST['plot'];
                $plotSource = $_POST['plotSource'];
                insertFunction(array('state' => 'insertBookPlot'), array('plot' => $plot, 'plotSource' => $plotSource));
                // insert modification in modifications table
                insertFunction(array('state' => 'insertModification'), array('admin' => $_SESSION['adminID']));
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
