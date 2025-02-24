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
    if (!isset($_POST['captcha']) || $_POST['captcha'] !== $_SESSION['captcha']) {
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

    // Check if required fields are filled
    if (empty($organization_name) || empty($contact_name) || empty($email) || empty($phone) || empty($remarks)) {
        echo "<script>
                alert('All fields are required.');
                window.history.back();
              </script>";
        exit();
    }

    // Insert data into the database
    if ($pdo) {
        try {
            // Prepare SQL statement
            $stmt = $pdo->prepare("INSERT INTO employer_submissions (organization_name, contact_name, email, phone, remarks) VALUES (?, ?, ?, ?, ?)");
            
            // Execute query with form data
            $stmt->execute([$organization_name, $contact_name, $email, $phone, $remarks]);
        } catch (PDOException $e) {
            echo "<script>
                    alert('Database error: " . $e->getMessage() . "');
                    window.history.back();
                  </script>";
            exit();
        }
    } else {
        echo "<script>
                alert('Database connection failed!');
                window.history.back();
              </script>";
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
        $mail->setFrom('rajiv@greencarcarpool.com', 'Form Submission');
        $mail->addAddress('theankitkumarg@gmail.com'); // Admin email

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
        ";

        // Send the email
        $mail->send();

        echo "<script>
                alert('Form submitted successfully!');
                window.location.href = 'thankyou.php';
              </script>";
        exit();

    } catch (Exception $e) {
        echo "<script>
                alert('Email sending failed: {$mail->ErrorInfo}');
                window.history.back();
              </script>";
    }
}
?>