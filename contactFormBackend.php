<?php
session_start();

// Include PHPMailer library
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'include/db.php'; // Include database connection file

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     // Validate CAPTCHA (optional, if you have CAPTCHA implemented)
//     if (!isset($_POST['captcha']) || $_POST['captcha'] !== $_SESSION['captcha']) {
//         echo "<script>
//                 alert('Invalid CAPTCHA. Please try again.');
//                 window.history.back();
//               </script>";
//         exit();
//     }
    unset($_SESSION['captcha']);

    // Collect form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    // Check if the PDO connection is established
    if ($pdo) {
        try {
            // Insert data into the database
            $stmt = $pdo->prepare("INSERT INTO contact_forms (name, email, phone, message) VALUES (?, ?, ?, ?)");
            $stmt->execute([$name, $email, $phone, $message]);
        } catch (PDOException $e) {
            echo "Database error: " . $e->getMessage();
            exit();
        }
    } else {
        echo "Database connection failed!";
        exit();
    }

    // Send email using PHPMailer
    $mail = new PHPMailer(true);
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.hostinger.com'; // Replace with your SMTP server
        $mail->SMTPAuth   = true;
        $mail->Username   = 'rajiv@greencarcarpool.com'; // SMTP username
        $mail->Password   = 'Rajiv@111@'; // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Recipients
        $mail->setFrom('rajiv@greencarcarpool.com', 'Contact Form Submission');
        $mail->addAddress('theankitkumarg@gmail.com'); // Admin email

        // Email content
        $mail->isHTML(true);
        $mail->Subject = 'New Contact Form Submission';
        $mail->Body = "
            <h2>New Contact Form Submission</h2>
            <p><strong>Name:</strong> $name</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Phone:</strong> $phone</p>
            <p><strong>Message:</strong> $message</p>
        ";

        // Send the email
        $mail->send();
        echo "<script>
                alert('Form submitted successfully!');
                window.location.href = 'thankyou.php';
              </script>";
        exit();
    } catch (Exception $e) {
        echo "Email sending failed: {$mail->ErrorInfo}";
    }

?>