<?php
require 'db.php';

$sql = "SELECT id, book_title, author_name, genre, publication_year, quantity FROM library";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Library Book List</h2>";
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Title</th><th>Author</th><th>Genre</th><th>Year</th><th>Qty</th><th>Actions</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['book_title']}</td>
            <td>{$row['author_name']}</td>
            <td>{$row['genre']}</td>
            <td>{$row['publication_year']}</td>
            <td>{$row['quantity']}</td>
            <td>
                <a href='update.php?id={$row['id']}'>Update</a> | 
                <a href='delete.php?id={$row['id']}'>Delete</a>
            </td>
        </tr>";
    }

    echo "</table>";
} else {
    echo "No books found.";
}

$conn->close();
?>
