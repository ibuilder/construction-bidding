<?php
require_once '../../config/supabase.php';

header('Content-Type: application/json');

$input = json_decode(file_get_contents('php://input'), true);

if (!isset($input['project_id']) || !isset($input['name']) || !isset($input['description'])) {
    echo json_encode(['error' => 'Invalid input']);
    http_response_code(400);
    exit;
}

$project_id = $input['project_id'];
$name = $input['name'];
$description = $input['description'];

try {
    $response = $supabase->from('projects')->update([
        'name' => $name,
        'description' => $description
    ])->eq('id', $project_id)->execute();

    if ($response['status'] === 200) {
        echo json_encode(['message' => 'Project updated successfully']);
    } else {
        echo json_encode(['error' => 'Failed to update project']);
        http_response_code(500);
    }
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
    http_response_code(500);
}
?>