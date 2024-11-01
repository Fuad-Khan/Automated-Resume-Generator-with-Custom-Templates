<?php
$host = 'localhost';
$dbname = 'resume_generator';
$user = 'root'; // Default user in XAMPP
$pass = ''; // Empty password if none is set in XAMPP

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
