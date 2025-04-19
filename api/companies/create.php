<?php
require_once '../../config/database.php';

header('Content-Type: application/json');

$database = new Database();
$db = $database->getConnection();

$data = json_decode(file_get_contents("php://input"));

if (isset($data->name) && isset($data->address) && isset($data->contact_person) && isset($data->contact_email)) {
    $query = "INSERT INTO companies (name, address, contact_person, contact_email) VALUES (:name, :address, :contact_person, :contact_email)";
    
    $stmt = $db->prepare($query);
    
    $stmt->bindParam(':name', $data->name);
    $stmt->bindParam(':address', $data->address);
    $stmt->bindParam(':contact_person', $data->contact_person);
    $stmt->bindParam(':contact_email', $data->contact_email);
    
    if ($stmt->execute()) {
        echo json_encode(array("message" => "Company created successfully."));
    } else {
        echo json_encode(array("message" => "Unable to create company."));
    }
} else {
    echo json_encode(array("message" => "Incomplete data."));
}
?>