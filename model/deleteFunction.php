<?php
function deleteFunction($conditions = array(), $values = array()){
    include('dbconnection.php');
    $sql = 'DELETE FROM ';
    if($conditions['state'] = 'deleteBook'){
        $sql .= "book WHERE bookID = " . $values['bookID'];
        $res = $db->prepare($sql);
        $res->execute();
    }
}
?>