<?php
require_once '../config/database.php';

function downloadFile($fileId) {
    global $pdo;

    // Fetch file details from the database
    $stmt = $pdo->prepare("SELECT * FROM files WHERE id = :id");
    $stmt->bindParam(':id', $fileId);
    $stmt->execute();
    $file = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($file) {
        $filePath = '../uploads/' . $file['file_name'];

        // Check if the file exists
        if (file_exists($filePath)) {
            // Set headers to initiate download
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . basename($filePath) . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filePath));

            // Clear output buffer
            ob_clean();
            flush();

            // Read the file
            readfile($filePath);
            exit;
        } else {
            http_response_code(404);
            echo json_encode(['message' => 'File not found.']);
        }
    } else {
        http_response_code(404);
        echo json_encode(['message' => 'File not found in the database.']);
    }
}

// Get the file ID from the request
if (isset($_GET['id'])) {
    downloadFile($_GET['id']);
} else {
    http_response_code(400);
    echo json_encode(['message' => 'No file ID provided.']);
}
?>