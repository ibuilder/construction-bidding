<?php
require_once '../../config/supabase.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    $company_id = $data['company_id'] ?? null;
    $qualification_data = $data['qualification_data'] ?? null;

    if ($company_id && $qualification_data) {
        $response = $supabase->from('prequalifications')->insert([
            'company_id' => $company_id,
            'qualification_data' => $qualification_data,
            'created_at' => date('Y-m-d H:i:s')
        ])->execute();

        if ($response['status'] === 201) {
            echo json_encode(['message' => 'Prequalification submitted successfully.']);
        } else {
            echo json_encode(['error' => 'Failed to submit prequalification.']);
        }
    } else {
        echo json_encode(['error' => 'Invalid input.']);
    }
} else {
    echo json_encode(['error' => 'Invalid request method.']);
}
?>