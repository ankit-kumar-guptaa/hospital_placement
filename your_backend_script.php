<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if CAPTCHA input matches the session CAPTCHA code
    if (isset($_POST['captcha']) && $_POST['captcha'] === $_SESSION['captcha']) {
        // CAPTCHA is correct, proceed with form processing
        echo 'CAPTCHA verification successful! Form data received:';
        
        // Here you can process the form (e.g., store it in a database or send an email)
        // You can access form data like:
        $organization_name = $_POST['organization_name'];
        $city = $_POST['city'];
        $contact_name = $_POST['contact_name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $remarks = $_POST['remarks'];

        // Process the form data...

    } else {
        // CAPTCHA is incorrect
        echo 'Error: Incorrect CAPTCHA. Please try again.';
    }
}
?>
