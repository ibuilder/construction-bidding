<?php
require_once '../../config/database.php';

header('Content-Type: application/json');

$database = new Database();
$db = $database->getConnection();

$query = "SELECT * FROM bids";
$stmt = $db->prepare($query);
$stmt->execute();

$bids = array();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $bids[] = $row;
}

echo json_encode($bids);
?>