<?php
include 'db.php';

$sale_id = $_POST['id'];
$pub_name = $_POST['pub_name'];
$quantity = $_POST['quantity'];
$beer_name = $_POST['beer_name'];


try{

    $sql = "UPDATE sales SET quantity ='$quantity' WHERE id='$sale_id'";
    $conn->query($sql);

    $sql1 = "UPDATE pubs SET name='$pub_name' WHERE id='$sale_id'";
    $conn->query($sql1);

    $sql2 = "UPDATE beer_names SET name='$beer_name' WHERE id='$sale_id'";
    $conn->query($sql2);
    echo "Records updated successfully";

}catch (Exception $e) {
    // Rollback the transaction if any update fails
    $conn->rollback();
    echo "Failed to update records: " . $e->getMessage();
}


$conn->close();
?>
