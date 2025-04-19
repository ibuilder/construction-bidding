<?php
session_start();
require_once 'config/database.php';
require_once 'api/config.php';

function loadTemplate($template) {
    include "templates/$template.php";
}

if (isset($_SESSION['user_id'])) {
    loadTemplate('projects/list');
} else {
    loadTemplate('auth/login');
}
?>