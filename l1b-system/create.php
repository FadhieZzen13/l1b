<?php
require 'db.php';

$title = $_POST['book_title'];
$author = $_POST['author_name'];
$genre = $_POST['genre'];
$year = date('Y', strtotime($_POST['publication_year']));
$quantity = $_POST['quantity'];
$image = addslashes(file_get_contents($_FILES['book_cover']['tmp_name']));

$sql = "INSERT INTO library (book_title, author_name, book_cover, genre, publication_year, quantity)
        VALUES ('$title', '$author', '$image', '$genre', '$year', '$quantity')";

if ($conn->query($sql) === TRUE) {
    echo "Book added successfully. <a href='index.html'>Back to Home</a>";
} else {
    echo "Error: " . $conn->error;
}
$conn->close();
?>
