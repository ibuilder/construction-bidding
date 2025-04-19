<?php
require_once '../../config/supabase.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $projectId = isset($_GET['id']) ? intval($_GET['id']) : 0;

    if ($projectId > 0) {
        $response = deleteProject($projectId);
        echo json_encode($response);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid project ID']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}

function deleteProject($id) {
    global $supabase;

    $response = $supabase->from('projects')->delete()->eq('id', $id)->execute();

    if ($response->status() === 200) {
        return ['status' => 'success', 'message' => 'Project deleted successfully'];
    } else {
        return ['status' => 'error', 'message' => 'Failed to delete project'];
    }
}
?>