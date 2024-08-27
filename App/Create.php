<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pub_name = $_POST['pub_name'];
    $beer_name = $_POST['beer_name'];
    $quantity_sold = $_POST['quantity_sold'];
    $sale_date = $_POST['sale_date'];

    // SQL query to insert data
    $stmt = $conn->prepare("INSERT INTO sales (pub_name, beer_name, quantity_sold, sale_date) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssis", $pub_name, $beer_name, $quantity_sold, $sale_date);

    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
