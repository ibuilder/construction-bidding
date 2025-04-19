<?php
$host = 'your_supabase_host';
$port = '5432';
$dbname = 'your_database_name';
$user = 'your_database_user';
$password = 'your_database_password';

try {
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>