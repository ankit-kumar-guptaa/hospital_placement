<?php
// db.php - Database Connection File

// $host = 'localhost';      // Database host
// $username = 'root';       // Database username
// $password = '';           // Database password

// $database = 'hospital';


$host = 'localhost:3306';      // Database host
$username = 'recru2l1_hospital_placement';       // Database username
$password = 'Hospital@123@';           // Database password

$database = 'recru2l1_hospital_placement';

// $host = 'localhost';      // Database host
// $username = 'u141142577_admin';       // Database username
// $password = 'Elite@1925';           // Database password
// $database = 'u141142577_hospital';    // Database name

// Create a PDO connection
try {
    $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    // echo "Connected successfully";
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
