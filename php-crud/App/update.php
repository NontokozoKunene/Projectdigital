<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $pub_name = $_POST['pub_name'];
    $beer_category = $_POST['beer_category'];
    $beer_name = $_POST['beer_name'];
    $quantity_sold = $_POST['quantity_sold'];
    $sale_date = $_POST['sale_date'];

    // SQL query to update data
    $stmt = $conn->prepare("UPDATE sales  SET pub_name = ?, beer category = ?, beer_name = ?, quantity_sold = ?, sale_date = ? WHERE id = ?");
    $stmt->bind_param("ssisi", $pub_name, $beer_name, $quantity_sold, $sale_date, $id);

    if ($stmt->execute()) {
        echo "Record updated successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
