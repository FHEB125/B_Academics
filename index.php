<?php
// public/index.php

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../controllers/AuthController.php';

try {
    $db = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    die('Database connection failed: ' . $e->getMessage());
}

$authController = new AuthController($db);

$action = $_GET['action'] ?? 'login_page';

switch ($action) {
    case 'login':
        $authController->login();
        break;
    case 'register':
        $authController->register();
        break;
    case 'login_page':
        include __DIR__ . '/../views/login.php';
        break;
    case 'register_page':
        include __DIR__ . '/../views/register.php';
        break;
    case 'dashboard':
        session_start();
        if (!isset($_SESSION['user_email'])) {
            header('Location: index.php?action=login_page&error=' . urlencode('Please login first'));
            exit;
        }
        include __DIR__ . '/../views/dashboard.php';
        break;
    default:
        http_response_code(404);
        echo 'Page not found';
        break;
}