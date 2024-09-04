<?php
include 'db.php';

// Handle Create or Update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;
    $name = $_POST['name'];

    if ($id) {
        // Update existing pub
        $sql = "UPDATE pubs SET name='$name' WHERE id=$id";
    } else {
        // Insert new pub
        $sql = "INSERT INTO pubs (name) VALUES ('$name')";
    }

    if ($conn->query($sql) === TRUE) {
        echo "Record saved successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Handle Delete
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM pubs WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Handle Read
$sql = "SELECT * FROM pubs";
$result = $conn->query($sql);
$pubs = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $pubs[] = $row;
    }
}
$conn->close();
?>
