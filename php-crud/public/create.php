<?php
include 'db.php';

// create the sales records

$pub_id = $_POST['pub_id'];
$beer_id = $_POST['beer_id'];
$quantity = $_POST['quantity'];

$sql = "INSERT INTO sales (pub_id, beer_id, quantity) VALUES ('$pub_id', '$beer_id', '$quantity')";

if ($conn->query($sql) === TRUE) {
    echo "New sale record created successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
