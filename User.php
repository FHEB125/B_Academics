<?php
// models/User.php

class User {
    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    // Register user method
    public function register($fullName, $email, $password) {
        // Check if email already exists
        $stmt = $this->db->prepare("SELECT id FROM users WHERE email = :email LIMIT 1");
        $stmt->execute(['email' => $email]);
        if ($stmt->fetch()) {
            return ['success' => false, 'message' => 'Email is already registered'];
        }

        // Hash password securely
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $this->db->prepare("INSERT INTO users (full_name, email, password_hash, created_at) VALUES (:full_name, :email, :password_hash, NOW())");
        $success = $stmt->execute([
            'full_name'     => $fullName,
            'email'         => $email,
            'password_hash' => $passwordHash
        ]);

        if ($success) {
            return ['success' => true];
        } else {
            return ['success' => false, 'message' => 'Failed to register user, please try again'];
        }
    }

    // Authenticate user method (for completeness)
    public function authenticate($email, $password) {
        $stmt = $this->db->prepare("SELECT password_hash FROM users WHERE email = :email LIMIT 1");
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch();
        if ($user && password_verify($password, $user['password_hash'])) {
            return true;
        }
        return false;
    }
}