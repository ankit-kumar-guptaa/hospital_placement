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

    // Google reCAPTCHA v3 validation
    $recaptcha_secret = '6Ledy8UrAAAAAERlqjDOP4rshduNBcWdZ_l_n-av';
    $recaptcha_response = $_POST['g-recaptcha-response'] ?? '';
    
    // Make the API call to verify the token
    $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
    $recaptcha_data = [
        'secret' => $recaptcha_secret,
        'response' => $recaptcha_response,
        'remoteip' => $_SERVER['REMOTE_ADDR']
    ];
    
    $recaptcha_options = [
        'http' => [
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($recaptcha_data)
        ]
    ];
    
    $recaptcha_context = stream_context_create($recaptcha_options);
    $recaptcha_result = file_get_contents($recaptcha_url, false, $recaptcha_context);
    $recaptcha_json = json_decode($recaptcha_result, true);
    
    // Check if the reCAPTCHA verification was successful
    if (!$recaptcha_json['success'] || $recaptcha_json['score'] < 0.5) {
        echo "<script>
                alert('reCAPTCHA verification failed. Please try again.');
                window.history.back();
              </script>";
        exit();
    }

    // Collect form data
    $role = $_POST['role'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $department = $_POST['department'] ?? null; // Optional field
    $qualification = $_POST['qualification'] ?? null; // Optional field

    // Check if the PDO connection is established
    if ($pdo) {
        try {
            // Insert data into the database
            $stmt = $pdo->prepare("INSERT INTO form_submissions (role, name, email, phone, department, qualification) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->execute([$role, $name, $email, $phone, $department, $qualification]);
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
        $mail->Username   = 'no-reply@greencarcarpool.com'; // SMTP username
        $mail->Password   = 'Rajiv@111@'; // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Recipients
        $mail->setFrom('no-reply@greencarcarpool.com', 'Form Submission from HospitalPlacement.com');
        $mail->addAddress('info@hospitalplacement.com'); // Admin email

        // Email content
        $mail->isHTML(true);
        $mail->Subject = 'New Job Seeker Form Submission from HospitalPlacement.com';
        $mail->Body = "
            <h2>New Job Seeker Form Submission</h2>
            <p><strong>Role:</strong> $role</p>
            <p><strong>Name:</strong> $name</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Phone:</strong> $phone</p>
            <p><strong>Department:</strong> " . ($department ?? 'Not provided') . "</p>
            <p><strong>Qualification:</strong> " . ($qualification ?? 'Not provided') . "</p>
        ";

        // Send the email
        $mail->send();

        echo "<script>
              
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