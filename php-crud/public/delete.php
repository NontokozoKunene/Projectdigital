<?php
include 'db.php';

$id = $_POST['id'];

$sql = "DELETE FROM sales WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Sale record deleted successfully.";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
