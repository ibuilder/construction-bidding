<?php
require_once '../../config/supabase.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    $projectId = $data['project_id'] ?? null;
    $bidPackageName = $data['bid_package_name'] ?? null;
    $bidManual = $data['bid_manual'] ?? null;

    if (!$projectId || !$bidPackageName || !$bidManual) {
        http_response_code(400);
        echo json_encode(['message' => 'Invalid input']);
        exit;
    }

    $query = "INSERT INTO bids (project_id, bid_package_name, bid_manual) VALUES (?, ?, ?)";
    $stmt = $supabase->getClient()->prepare($query);
    
    try {
        $stmt->execute([$projectId, $bidPackageName, $bidManual]);
        http_response_code(201);
        echo json_encode(['message' => 'Bid package created successfully']);
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode(['message' => 'Error creating bid package', 'error' => $e->getMessage()]);
    }
} else {
    http_response_code(405);
    echo json_encode(['message' => 'Method not allowed']);
}
?>