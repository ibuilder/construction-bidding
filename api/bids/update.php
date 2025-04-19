<?php
require_once '../../config/database.php';

header('Content-Type: application/json');

$input = json_decode(file_get_contents('php://input'), true);

if (!isset($input['id']) || !isset($input['data'])) {
    echo json_encode(['message' => 'Invalid input']);
    http_response_code(400);
    exit;
}

$id = $input['id'];
$data = $input['data'];

try {
    $db = new Database();
    $connection = $db->getConnection();

    $query = "UPDATE bids SET title = :title, description = :description, amount = :amount WHERE id = :id";
    $stmt = $connection->prepare($query);

    $stmt->bindParam(':title', $data['title']);
    $stmt->bindParam(':description', $data['description']);
    $stmt->bindParam(':amount', $data['amount']);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        echo json_encode(['message' => 'Bid updated successfully']);
    } else {
        echo json_encode(['message' => 'Failed to update bid']);
        http_response_code(500);
    }
} catch (Exception $e) {
    echo json_encode(['message' => 'Error: ' . $e->getMessage()]);
    http_response_code(500);
}
?>