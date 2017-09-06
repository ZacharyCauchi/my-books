<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link rel="stylesheet" type="text/css" href="../view/style/style.css">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    </head>
    <body>
            <div class="bookCoverContainer">
                <?php 
                $table = selectFunction(0, array('state' => 'returnAll', 'table' => 'books')); 
                if (!empty($table)){
                    $count = 0;
                    foreach ($table as $row) {
                        $count++
                        ?>
                        <div class="bookCover">
                            <img src="<?php 
                            if(isset($row['BookCoverURL'])){
                            echo $row['BookCoverURL'];
                            } else {
                            echo "../view/images/BookCovers/default.png";
                            } ?>"/>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </form>
    </body>
</html>