<?php
include 'db.php';

$sql = "SELECT * FROM sales"; // SQL query to select all records
$result = $conn->query($sql);

$sales = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $sales[] = $row;
    }
}

echo json_encode($sales);

$conn->close();
?>
