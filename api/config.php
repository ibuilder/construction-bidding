<?php
// Configuration settings for the API

// Database connection settings
define('SUPABASE_URL', 'your_supabase_url');
define('SUPABASE_KEY', 'your_supabase_key');

// API routing settings
define('API_VERSION', 'v1');

// Set the content type to JSON
header('Content-Type: application/json');

// Enable CORS
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

// Include database connection
require_once '../config/supabase.php';
?>