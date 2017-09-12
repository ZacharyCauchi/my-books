<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form id="newBookForm"  action="loginController.php?request=newBookSubmit" method="POST">
        <div class="inputText">Title:</div><input class="newBookInputField" type="text" name="bookTitle"></input>
        <div class="inputText">Original Title:</div><input class="newBookInputField"  type="text" name="originalTitle"></input>
        <div class="inputText">Year of Publication:</div><input class="newBookInputField"  type="text" name="publicationYear"></input>
        <div class="inputText">Genre:</div><input class="newBookInputField"  type="text" name="genre"></input>
        <div class="inputText">Millions Sold:</div><input class="newBookInputField"  type="text" name="millionsSold"></input>
        <div class="inputText">Language:</div><input class="newBookInputField"  type="text" name="language"></input>
        <div class="inputText">Author ID:</div><input class="newBookInputField"  type="text" name="authorID"></input>
        <div class="inputText">BookCoverUrl:</div><input class="newBookInputField"  type="text" name="bookCoverUrl"></input>
        <input type="submit" name="submit" value="submit"></input>
    </form>
</body>
</html>