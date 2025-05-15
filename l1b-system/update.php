<?php
require 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM library WHERE id=$id");
    $book = $result->fetch_assoc();
}

if (isset($_POST['update'])) {
    $title = $_POST['book_title'];
    $author = $_POST['author_name'];
    $genre = $_POST['genre'];
    $year = date('Y', strtotime($_POST['publication_year']));
    $quantity = $_POST['quantity'];

    $conn->query("UPDATE library SET 
        book_title='$title', 
        author_name='$author', 
        genre='$genre', 
        publication_year='$year', 
        quantity=$quantity 
        WHERE id=$id");

    echo "Book updated. <a href='read.php'>Back to list</a>";
    exit();
}
?>

<form method="POST">
    <label>Title:</label><br>
    <input type="text" name="book_title" value="<?= $book['book_title'] ?>"><br>
    
    <label>Author:</label><br>
    <input type="text" name="author_name" value="<?= $book['author_name'] ?>"><br>

    <label>Genre:</label><br>
    <input type="text" name="genre" value="<?= $book['genre'] ?>"><br>

    <label>Year:</label><br>
    <input type="date" name="publication_year" value="<?= $book['publication_year'] ?>-01-01"><br>

    <label>Quantity:</label><br>
    <input type="number" name="quantity" value="<?= $book['quantity'] ?>"><br><br>

    <input type="submit" name="update" value="Update Book">
</form>
