<?php
include 'db.php';

// Fetch pubs
$pubsResult = $conn->query("SELECT id, name FROM pubs");
$pubs = [];
while($row = $pubsResult->fetch_assoc()) {
    $pubs[] = $row;
}

// Fetch beers
$beersResult = $conn->query("SELECT id, name FROM beer_names");
$beers = [];
while($row = $beersResult->fetch_assoc()) {
    $beers[] = $row;
}



// Return pubs and beers in JSON format
echo json_encode(['pubs' => $pubs, 'beers' => $beers]);

$conn->close();
?>
