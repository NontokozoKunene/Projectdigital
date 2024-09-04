<?php
include 'db.php';

// Fetch sales data
$sql = "SELECT pub_name, beer_name, SUM(quantity_sold) as total_quantity_sold FROM sales GROUP BY pub_name, beer_name";
$result = $conn->query($sql);

$sales_data = [];

if ($result->num_rows > 0) {
    // Fetch all data into an associative array
    while($row = $result->fetch_assoc()) {
        $sales_data[] = $row;
    }
}

// Close connection
$conn->close();

// Return JSON data
echo json_encode($sales_data);
?>
