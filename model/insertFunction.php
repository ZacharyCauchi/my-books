<?php
function insertFunction($conditions = array(), $values = array()){
    include('dbconnection.php');
    $sql = "INSERT INTO ";
    if(array_key_exists('state', $conditions)) {
       if($conditions['state'] == 'insertNewBook'){
           if($values['cover'] == ''){
                $values['cover'] = 'NULL';
            } else {
                $values['cover'] = "'" . $values['cover'] . "'";
            }
            global $lastInsert;
            $sql = $sql . "book (BookTitle, OriginalTitle, YearofPublication, Genre, MillionsSold, LanguageWritten, AuthorID, BookCoverURL) VALUES('" . $values['title'] . "', '" . $values['original'] . "', " . $values['year'] . ", '" . $values['genre'] . "', " . $values['millions'] .", '" . $values['lang'] . "', " . $lastInsert . ", " . $values['cover'] . ")";
            $res = $db->prepare($sql);
            $res->execute();
            $lastInsert = $db->lastInsertID();
        } else if($conditions['state'] == 'insertNewAuthor'){
            $sql = $sql . "author (Name, Surname, Nationality, BirthYear, DeathYear) VALUES('" . $values['authorName'] . "', '" . $values['authorSurname'] ."', '" . $values['authorNation'] . "', " . $values['authorBirth'] . ", " . $values['authorDeath'] . ")";
            $res = $db->prepare($sql);
            $res->execute();
            global $lastInsert;
            $lastInsert = $db->lastInsertID();
        } else if($conditions['state'] == 'insertBookPlot'){
            global $lastInsert;
            $sql = $sql . "bookplot (Plot, PlotSource, BookID) VALUES('" . $values['plot'] . "', '" . $values['plotSource'] . "', " . $lastInsert . ")";
            $res = $db->prepare($sql);
            $res->execute();
            echo $sql;
        } else if($conditions['state'] == 'insertModification'){
            global $lastInsert;
            $sql = $sql . "modifications (modificationDate, BookID, UserID) VALUES(CURRENT_TIMESTAMP," . $lastInsert . ", " . $values['admin'] . ")";
            $res = $db->prepare($sql);
            $res->execute();
        }
    }   
}
?>