<?php
function updateFunction($conditions = array(), $values = array()){
    include('dbconnection.php');
    $sql1 = "UPDATE book SET ";
    if(isset($values['title'])){
        if($values['title'] != ''){
            $sql1 = $sql1 . "BookTitle = '" . $values['title'] . "', ";
        }
    }
    if(isset($values['original'])){
        if($values['original'] != ''){
            $sql1 = $sql1 . "OriginalTitle = '" . $values['original'] . "', ";
        }
    }
    if(isset($values['year'])){
        if($values['year'] != ''){
            $sql1 = $sql1 . "YearofPublication = " . $values['year'] . ", ";
        }
    }
    if(isset($values['genre'])){
        if($values['genre'] != ''){
            $sql1 = $sql1 . "Genre = '" . $values['genre'] . "', ";
        }
    }
    if(isset($values['millions'])){
        if($values['millions'] != ''){
            $sql1 = $sql1 . "MillionsSold = " . $values['millions'] . ", ";
        }
    }
    if(isset($values['lang'])){
        if($values['lang'] != ''){
            $sql1 = $sql1 . "LanguageWritten = '" . $values['lang'] . "', ";
        }
    }
    if(isset($values['cover'])){
        if($values['cover'] != ''){
            $sql1 = $sql1 . "BookCoverURL = '" . $values['cover'] . "', ";
        }
    }
    $sql1 = rtrim($sql1, ", ");
    $sql1 = $sql1 . " WHERE BookID = " . $values['BookID'];
    $res = $db->prepare($sql1);
    $res->execute();
}
?>