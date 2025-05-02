<?php
// controllers/AuthController.php

require_once __DIR__ . '/../models/User.php';

class AuthController {
    private $userModel;

    public function __construct(PDO $db) {
        $this->userModel = new User($db);
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $fullName = trim($_POST['full_name'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';
            $confirmPassword = $_POST['confirm_password'] ?? '';

            // Basic validations
            if (empty($fullName) || empty($email) || empty($password) || empty($confirmPassword)) {
                header('Location: index.php?action=register_page&error=' . urlencode('Please fill in all fields'));
                exit;
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                header('Location: index.php?action=register_page&error=' . urlencode('Invalid email address'));
                exit;
            }

            if ($password !== $confirmPassword) {
                header('Location: index.php?action=register_page&error=' . urlencode('Passwords do not match'));
                exit;
            }

            $result = $this->userModel->register($fullName, $email, $password);

            if ($result['success']) {
                header('Location: index.php?action=login_page&success=' . urlencode('Registration successful. Please login.'));
                exit;
            } else {
                header('Location: index.php?action=register_page&error=' . urlencode($result['message']));
                exit;
            }
        } else {
            header('Location: index.php?action=register_page');
            exit;
        }
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';

            if (empty($email) || empty($password)) {
                header('Location: index.php?action=login_page&error=' . urlencode('Please fill all fields'));
                exit;
            }

            if ($this->userModel->authenticate($email, $password)) {
                session_start();
                $_SESSION['user_email'] = $email;
                header('Location: index.php?action=dashboard');
                exit;
            } else {
                header('Location: index.php?action=login_page&error=' . urlencode('Invalid credentials'));
                exit;
            }
        } else {
            header('Location: index.php?action=login_page');
            exit;
        }
    }
}