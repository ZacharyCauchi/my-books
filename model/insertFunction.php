<?php
function insertFunction($conditions = array(), $title, $original, $year, $genre, $millions, $lang, $author, $cover){
    include('dbconnection.php');
    if(array_key_exists('state',$conditions)) {
       if($conditions['state'] == 'insertNewBook'){
           if($cover == ''){
                $cover = 'NULL';
            } else {
                $cover = "'" . $cover . "'";
            }
            $sql = "INSERT INTO book (BookTitle, OriginalTitle, YearofPublication, Genre, MillionsSold, LanguageWritten, AuthorID, BookCoverURL) VALUES('" . $title . "', '" . $original . "', " . $year . ", '" . $genre . "', " . $millions .", '" . $lang . "', " . $author . ", " . $cover . ")";
            $res = $db->prepare($sql);
            $res->execute();
            header('Location:loginController.php');
    }
}
}
?>