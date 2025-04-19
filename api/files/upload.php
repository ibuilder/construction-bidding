<?php
require_once '../../config/database.php';

$database = new Database();
$db = $database->getConnection();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['file'])) {
        $file = $_FILES['file'];
        $projectId = $_POST['project_id'];
        
        $uploadDirectory = '../../uploads/';
        $uploadFilePath = $uploadDirectory . basename($file['name']);
        
        // Validate file type and size
        $fileType = strtolower(pathinfo($uploadFilePath, PATHINFO_EXTENSION));
        $allowedTypes = ['pdf', 'doc', 'docx', 'xls', 'xlsx', 'jpg', 'png'];
        
        if (in_array($fileType, $allowedTypes) && $file['size'] < 5000000) {
            if (move_uploaded_file($file['tmp_name'], $uploadFilePath)) {
                // Save file information to the database
                $query = "INSERT INTO project_files (project_id, file_name, file_path) VALUES (:project_id, :file_name, :file_path)";
                $stmt = $db->prepare($query);
                $stmt->bindParam(':project_id', $projectId);
                $stmt->bindParam(':file_name', $file['name']);
                $stmt->bindParam(':file_path', $uploadFilePath);
                
                if ($stmt->execute()) {
                    echo json_encode(['message' => 'File uploaded successfully.']);
                } else {
                    echo json_encode(['message' => 'Failed to save file information in the database.']);
                }
            } else {
                echo json_encode(['message' => 'Failed to upload file.']);
            }
        } else {
            echo json_encode(['message' => 'Invalid file type or size exceeds limit.']);
        }
    } else {
        echo json_encode(['message' => 'No file uploaded.']);
    }
} else {
    echo json_encode(['message' => 'Invalid request method.']);
}
?>