<?php
require_once '../../config/database.php';

header('Content-Type: application/json');

$database = new Database();
$db = $database->getConnection();

$query = "SELECT * FROM projects";
$stmt = $db->prepare($query);
$stmt->execute();

$projects = array();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $projects[] = $row;
}

echo json_encode($projects);
?>