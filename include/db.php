<?php
// db.php - Database Connection File

// $host = 'localhost';      // Database host
// $username = 'root';       // Database username
// $password = 'newpassword';           // Database password
// $database = 'form_db';    // Database name

$host = 'localhost';      // Database host
$username = 'u141142577_admin';       // Database username
$password = 'Elite@1925';           // Database password
$database = 'u141142577_hospital';    // Database name

// Create a PDO connection
try {
    $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
