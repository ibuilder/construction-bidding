<?php
session_start();
require_once '../../config/supabase.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        echo json_encode(['error' => 'Email and password are required.']);
        exit;
    }

    $query = "SELECT * FROM users WHERE email = :email";
    $stmt = $supabase->getClient()->from('users')->select('*')->eq('email', $email)->single();

    if ($stmt) {
        if (password_verify($password, $stmt['password'])) {
            $_SESSION['user_id'] = $stmt['id'];
            echo json_encode(['success' => 'Login successful.']);
        } else {
            echo json_encode(['error' => 'Invalid password.']);
        }
    } else {
        echo json_encode(['error' => 'User not found.']);
    }
} else {
    echo json_encode(['error' => 'Invalid request method.']);
}
?>