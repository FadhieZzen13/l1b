<?php
require 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $conn->query("DELETE FROM library WHERE id=$id");
    echo "Book deleted. <a href='read.php'>Back to list</a>";
}
?>
