<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<?php
$bookTable = selectFunction(0, array('state' => 'returnAll', 'table' => 'books', 'where' => $_GET['bookID']));
?>
<body>
    <form id="newBookForm"  action="loginController.php?request=updateBookSubmit" method="POST">
        <div class="inputText">Title:</div><input class="newBookInputField" type="text" name="bookTitle" value="<?php if(isset($bookTable[0]['BookTitle'])){echo $bookTable[0]['BookTitle'];} ?>"></input>
        <div class="inputText">Original Title:</div><input class="newBookInputField"  type="text" name="originalTitle" value="<?php if(isset($bookTable[0]['OriginalTitle'])){echo $bookTable[0]['OriginalTitle'];} ?>"></input>
        <div class="inputText">Year of Publication:</div><input class="newBookInputField"  type="text" name="publicationYear" value="<?php if(isset($bookTable[0]['YearofPublication'])){echo $bookTable[0]['YearofPublication'];} ?>"></input>
        <div class="inputText">Genre:</div><input class="newBookInputField"  type="text" name="genre" value="<?php if(isset($bookTable[0]['Genre'])){echo $bookTable[0]['Genre'];} ?>"></input>
        <div class="inputText">Millions Sold:</div><input class="newBookInputField"  type="text" name="millionsSold" value="<?php if(isset($bookTable[0]['MillionsSold'])){echo $bookTable[0]['MillionsSold'];} ?>"></input>
        <div class="inputText">Language:</div><input class="newBookInputField"  type="text" name="language" value="<?php if(isset($bookTable[0]['LanguageWritten'])){echo $bookTable[0]['LanguageWritten'];} ?>"></input>
        <div class="inputText">BookCoverUrl:</div><input class="newBookInputField"  type="text" name="bookCoverUrl" value="<?php if(isset($bookTable[0]['BookCoverUrl'])){echo $bookTable[0]['BookCoverUrl'];} ?>"></input>
        <input type="submit" name="submit" value="submit"></input>
    </form>
</body>
</html>