<?php
session_start();
require 'include/db.php'; // Include the database connection

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate CAPTCHA
    if (!isset($_POST['captcha']) || $_POST['captcha'] !== $_SESSION['captcha']) {
        echo "<script>alert('Invalid CAPTCHA. Please try again.'); window.history.back();</script>";
        exit();
    }
    unset($_SESSION['captcha']); // Clear CAPTCHA session after validation

    // Collect and sanitize form data
    $organization_name = htmlspecialchars(trim($_POST['organization_name']));
    $city = htmlspecialchars(trim($_POST['city']));
    $contact_name = htmlspecialchars(trim($_POST['contact_name']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $phone = htmlspecialchars(trim($_POST['phone']));
    $remarks = htmlspecialchars(trim($_POST['remarks']));

    // Check if required fields are filled
    if (empty($organization_name) || empty($city) || empty($contact_name) || empty($email) || empty($phone) || empty($remarks)) {
        echo "<script>alert('All fields are required.'); window.history.back();</script>";
        exit();
    }

    // Insert data into the database
    try {
        // Prepare SQL statement
        $stmt = $pdo->prepare("INSERT INTO employer_submissions (organization_name, city, contact_name, email, phone, remarks) VALUES (?, ?, ?, ?, ?, ?)");
        
        // Execute query with form data
        $stmt->execute([$organization_name, $city, $contact_name, $email, $phone, $remarks]);

        // On successful submission, show alert and redirect
        echo "<script> window.location.href = 'thankyou.php';</script>";

    } catch (PDOException $e) {
        // Handle database errors
        echo "<script>alert('Database error: " . $e->getMessage() . "'); window.history.back();</script>";
        exit();
    }
}
?>
