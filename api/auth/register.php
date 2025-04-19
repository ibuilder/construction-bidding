<?php
require_once '../../config/database.php';

header('Content-Type: application/json');

$data = json_decode(file_get_contents("php://input"));

if (isset($data->username) && isset($data->email) && isset($data->password)) {
    $username = $data->username;
    $email = $data->email;
    $password = password_hash($data->password, PASSWORD_BCRYPT);

    $query = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
    $stmt = $pdo->prepare($query);

    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
        echo json_encode(["message" => "User registered successfully."]);
    } else {
        echo json_encode(["message" => "User registration failed."]);
    }
} else {
    echo json_encode(["message" => "Invalid input."]);
}
?>