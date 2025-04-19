<?php
require_once '../../config/supabase.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    $projectName = $data['name'] ?? '';
    $companyId = $data['company_id'] ?? '';
    $description = $data['description'] ?? '';
    $bidPackage = $data['bid_package'] ?? '';
    $bidManual = $data['bid_manual'] ?? '';

    if (empty($projectName) || empty($companyId)) {
        echo json_encode(['error' => 'Project name and company ID are required.']);
        http_response_code(400);
        exit;
    }

    $query = "INSERT INTO projects (name, company_id, description, bid_package, bid_manual) VALUES (?, ?, ?, ?, ?)";
    $stmt = $supabase->getConnection()->prepare($query);

    try {
        $stmt->execute([$projectName, $companyId, $description, $bidPackage, $bidManual]);
        echo json_encode(['success' => 'Project created successfully.']);
        http_response_code(201);
    } catch (Exception $e) {
        echo json_encode(['error' => 'Failed to create project: ' . $e->getMessage()]);
        http_response_code(500);
    }
} else {
    echo json_encode(['error' => 'Invalid request method.']);
    http_response_code(405);
}
?>