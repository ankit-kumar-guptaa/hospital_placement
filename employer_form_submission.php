<?php
session_start();

// Include PHPMailer library
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'include/db.php'; // Include database connection file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate CAPTCHA
    if (!isset($_POST['captcha']) || empty($_POST['captcha']) || $_POST['captcha'] !== $_SESSION['captcha']) {
        echo "<script>
                alert('Invalid CAPTCHA. Please try again.');
                window.history.back();
              </script>";
        exit();
    }
    unset($_SESSION['captcha']); // Clear CAPTCHA session after validation

    // Collect and sanitize form data
    $organization_name = htmlspecialchars(trim($_POST['organization_name']));
    $contact_name = htmlspecialchars(trim($_POST['contact_name']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $phone = htmlspecialchars(trim($_POST['phone']));
    $remarks = htmlspecialchars(trim($_POST['remarks']));

    // Validate required fields
    if (empty($organization_name) || empty($contact_name) || empty($email) || empty($phone) || empty($remarks)) {
        echo "<script>
                alert('All fields are required.');
                window.history.back();
              </script>";
        exit();
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>
                alert('Invalid email format.');
                window.history.back();
              </script>";
        exit();
    }

    // Validate phone (simple check for numeric and length, adjust as needed)
    if (!is_numeric($phone) || strlen($phone) < 10) {
        echo "<script>
                alert('Invalid phone number. Please enter a 10-digit number.');
                window.history.back();
              </script>";
        exit();
    }

    // Insert data into the database
    try {
        // Prepare SQL statement (matching the table structure in the image: id, organization_name, contact_name, email, phone, remarks, submission_date)
        $stmt = $pdo->prepare("INSERT INTO employer_submissions (organization_name, contact_name, email, phone, remarks, submission_date) VALUES (?, ?, ?, ?, ?, NOW())");
        
        // Execute query with form data
        $stmt->execute([$organization_name, $contact_name, $email, $phone, $remarks]);

        // On successful submission, send email and redirect
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
            $mail->setFrom('rajiv@greencarcarpool.com', 'Form Submission');
            $mail->addAddress('rajiv@elitecorporatesolutions.com'); // Admin email

            // Email content
            $mail->isHTML(true);
            $mail->Subject = 'New Employer Form Submission';
            $mail->Body = "
                <h2>New Employer Form Submission</h2>
                <p><strong>Organization Name:</strong> $organization_name</p>
                <p><strong>Contact Name:</strong> $contact_name</p>
                <p><strong>Email:</strong> $email</p>
                <p><strong>Phone:</strong> $phone</p>
                <p><strong>Remarks:</strong> $remarks</p>
                <p><strong>Submission Date:</strong> " . date('Y-m-d H:i:s') . "</p>
            ";

            // Send the email
            $mail->send();

            // Redirect to thank you page after successful submission and email
            echo "<script>
                    // alert('Form submitted successfully! Thank you.');
                    window.location.href = 'thankyou.php';
                  </script>";
            exit();

        } catch (Exception $e) {
            echo "<script>
                    alert('Email sending failed: {$mail->ErrorInfo}');
                    window.history.back();
                  </script>";
            exit();
        }

    } catch (PDOException $e) {
        // Handle database errors
        echo "<script>
                alert('Database error: " . $e->getMessage() . "');
                window.history.back();
              </script>";
        exit();
    }
}
?>