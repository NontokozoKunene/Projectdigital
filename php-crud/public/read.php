<?php
include 'db.php';

$sql = "SELECT sales.id, pubs.name AS pub_name, beer_names.name AS beer_name, sales.quantity 
        FROM sales 
        JOIN pubs ON sales.pub_id = pubs.id 
        JOIN beer_names ON sales.beer_id = beer_names.id";
        

$result = $conn->query($sql);

$sales = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $sales[] = $row;
    }
}
echo json_encode($sales);

$conn->close();
?>

