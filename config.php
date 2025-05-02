<?php
// config/config.php

// Database configuration
$host = 'localhost';
$dbname = 'db_B_Academics';
$username = 'root'; // change to your db username
$password = ''; // change to your db password

$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];