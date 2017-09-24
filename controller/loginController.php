<?php
ob_start();
include('loginFunction.php');
include('registerFunction.php');

include('inputFilter.php');

include('../model/selectFunction.php');
include('../model/insertFunction.php');
include('../model/deleteFunction.php');
include('../model/updateFunction.php');


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
                $authorName = filter_var(inputCheck($_POST['authorName']), FILTER_SANITIZE_STRING);
                $authorSurname = filter_var(inputCheck($_POST['authorSurname']), FILTER_SANITIZE_STRING);
                $authorNation = filter_var(inputCheck($_POST['authorNation']), FILTER_SANITIZE_STRING);
                $authorBirth = filter_var(inputCheck($_POST['authorBirth']), FILTER_SANITIZE_STRING);
                $authorDeath = filter_var(inputCheck($_POST['authorDeath']), FILTER_SANITIZE_STRING);
                insertFunction(array('state' => 'insertNewAuthor'), array('authorName' => $authorName, 'authorSurname' => $authorSurname, 'authorNation' => $authorNation, 'authorBirth' => $authorBirth, 'authorDeath' => $authorDeath));
                // use last insert id to use the new author id in book submission
                $title = filter_var(inputCheck($_POST['bookTitle']), FILTER_SANITIZE_STRING);
                $original = filter_var(inputCheck($_POST['originalTitle']), FILTER_SANITIZE_STRING);
                $year = filter_var(inputCheck($_POST['publicationYear']), FILTER_SANITIZE_STRING);
                $genre = filter_var(inputCheck($_POST['genre']), FILTER_SANITIZE_STRING);
                $millions = filter_var(inputCheck($_POST['millionsSold']), FILTER_SANITIZE_STRING);
                $lang = filter_var(inputCheck($_POST['language']), FILTER_SANITIZE_STRING);
                $cover = filter_var(inputCheck($_POST['bookCoverUrl']), FILTER_SANITIZE_STRING);
                if(isset($_POST['bookCoverUrl']) == false){
                    $cover = NULL;
                }
                insertFunction(array('state' => 'insertNewBook'), array('title' => $title, 'original' => $original, 'year' => $year, 'genre' => $genre, 'millions' => $millions, 'lang' => $lang, 'author' => $lastInsert, 'cover' => $cover));
                // use last insert id to reference bookID in bookplot
                $plot = filter_var(inputCheck($_POST['plot']), FILTER_SANITIZE_STRING);
                $plotSource = filter_var(inputCheck($_POST['plotSource']), FILTER_SANITIZE_STRING);
                insertFunction(array('state' => 'insertBookPlot'), array('plot' => $plot, 'plotSource' => $plotSource));
                // insert modification in modifications table
                insertFunction(array('state' => 'insertModification'), array('admin' => $_SESSION['adminID']));
                header('Location: logincontroller.php');
            } elseif($_GET['request'] == 'delete'){
                deleteFunction(array('state' => 'deleteBook'), array('bookID' => $_GET['bookID']));
                header('Location: logincontroller.php');
            } elseif($_GET['request'] == 'updateView'){
                include_once '../view/updateBook.php';
            } elseif($_GET['request'] == 'updateBookSubmit'){
                $title = filter_var(inputCheck($_POST['updatedBookTitle']), FILTER_SANITIZE_STRING);
                $original = filter_var(inputCheck($_POST['updatedOriginalTitle']), FILTER_SANITIZE_STRING);
                $year = filter_var(inputCheck($_POST['updatedPublicationYear']), FILTER_SANITIZE_STRING);
                $genre = filter_var(inputCheck($_POST['updatedGenre']), FILTER_SANITIZE_STRING);
                $millions = filter_var(inputCheck($_POST['updatedMillionsSold']), FILTER_SANITIZE_STRING);
                $lang = filter_var(inputCheck($_POST['updatedLanguage']), FILTER_SANITIZE_STRING);
                $cover = filter_var(inputCheck($_POST['updatedBookCoverUrl']), FILTER_SANITIZE_STRING);
                if(isset($_POST['updatedBookCoverUrl']) == false){
                    $cover = NULL;
                }
                updateFunction(array('state' => 'updateBook'), array('title' => $title, 'original' => $original, 'year' => $year, 'genre' => $genre, 'millions' => $millions, 'lang' => $lang, 'cover' => $cover, 'BookID' => $_GET['BookID']));
                header('Location: logincontroller.php');
            }
        }
        
    }
} else {
    if(isset($_GET['state'])){
        if($_GET['state'] == 'loginTry'){
            $user = filter_var(inputCheck($_POST['username']), FILTER_SANITIZE_STRING);
            $pass = filter_var(inputCheck($_POST['password']), FILTER_SANITIZE_STRING);
            loginFunction($user, $pass);

        } elseif($_GET['state'] == 'registration'){
            $firstName = filter_var(inputCheck($_POST['firstName']), FILTER_SANITIZE_STRING);
            $lastName = filter_var(inputCheck($_POST['lastName']), FILTER_SANITIZE_STRING);
            $email = filter_var(inputCheck($_POST['email']), FILTER_SANITIZE_STRING);
            $user = filter_var(inputCheck($_POST['username']), FILTER_SANITIZE_STRING);
            $pass = filter_var(inputCheck($_POST['password']), FILTER_SANITIZE_STRING);
            registerFunction($firstName, $lastName, $email, $user, $pass);
        } elseif($_GET['state'] == 'registrationForm'){
            include '../view/registration.php';
        }  
     
    } else {
            if ($_SESSION['failCount'] > 50){
                echo 'Too many failed attempts, try again soon';
            } else {
                    include '../view/login.php';
            }   
        }
}

?>
