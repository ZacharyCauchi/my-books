<?php
function selectFunction($user, $conditions = array()){
    include('dbconnection.php');
    if(array_key_exists('state',$conditions)) {
        if($conditions['state'] == 'returnAll'){
            if($conditions['table'] == 'users'){
                header('Content-Type: application/json');
                $sql = 'SELECT firstName, lastName, email, username FROM ';
                $sql = $sql . "userdetails WHERE userID = " . $user;
                $res = $db->prepare($sql);
                $res->execute();
                $queryResults = $res->fetch(PDO::FETCH_ASSOC);
                echo json_encode($queryResults);
            }
            else if ($conditions['table'] == 'books'){
                $sql = 'SELECT * FROM ';
                $sql = $sql . "Book";
                if (isset($conditions['where'])){
                    $sql = $sql . " WHERE BookID = " . $conditions['where'];
                }
                $res = $db->prepare($sql);
                $res->execute();
                $queryResults = $res->fetchALL();
                return $queryResults;
            }
        }
    }
}
?>