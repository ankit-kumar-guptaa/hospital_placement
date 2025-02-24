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
    unset($_SESSION['captcha']);

    // Collect form data
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $gender = $_POST['gender'];
    $dateOfBirth = $_POST['dateOfBirth'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $role = $_POST['role'];
    $qualification = $_POST['qualification'];
    $experience = $_POST['experience'];
    $skills = $_POST['skills'];
    $certifications = $_POST['certifications'] ?? ''; // Optional field

    // Handle CV upload
    $upload_dir = __DIR__ . "/uploads/"; // Use absolute path
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0755, true); // Create the directory if it doesn't exist
    }

    if ($_FILES['upload_cv']['error'] !== UPLOAD_ERR_OK) {
        $error_messages = [
            UPLOAD_ERR_INI_SIZE => 'The uploaded file exceeds the upload_max_filesize directive in php.ini.',
            UPLOAD_ERR_FORM_SIZE => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.',
            UPLOAD_ERR_PARTIAL => 'The uploaded file was only partially uploaded.',
            UPLOAD_ERR_NO_FILE => 'No file was uploaded.',
            UPLOAD_ERR_NO_TMP_DIR => 'Missing a temporary folder.',
            UPLOAD_ERR_CANT_WRITE => 'Failed to write file to disk.',
            UPLOAD_ERR_EXTENSION => 'A PHP extension stopped the file upload.',
        ];
        $error_code = $_FILES['upload_cv']['error'];
        echo "<script>
                alert('File upload error: " . ($error_messages[$error_code] ?? 'Unknown error.') . "');
                window.history.back();
              </script>";
        exit();
    }

    $allowed_types = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
    $max_size = 5 * 1024 * 1024; // 5MB

    if (!in_array($_FILES['upload_cv']['type'], $allowed_types)) {
        echo "<script>
                alert('Invalid file type. Only PDF, DOC, and DOCX files are allowed.');
                window.history.back();
              </script>";
        exit();
    }

    if ($_FILES['upload_cv']['size'] > $max_size) {
        echo "<script>
                alert('File size exceeds the maximum limit of 5MB.');
                window.history.back();
              </script>";
        exit();
    }

    $cv_file = basename($_FILES['upload_cv']['name']);
    $cv_path = $upload_dir . $cv_file;

    if (!move_uploaded_file($_FILES['upload_cv']['tmp_name'], $cv_path)) {
        echo "<script>
                alert('Failed to upload CV. Please try again.');
                window.history.back();
              </script>";
        exit();
    }

    // Insert data into the database
    if ($pdo) {
        try {
            $stmt = $pdo->prepare("
                INSERT INTO hospital_applications (
                    first_name, last_name, gender, date_of_birth, email, phone, address, city, role, qualification, experience, skills, certifications, cv_path, created_at
                ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())
            ");
            $stmt->execute([
                $firstName, $lastName, $gender, $dateOfBirth, $email, $phone, $address, $city, $role, $qualification, $experience, $skills, $certifications, $cv_path
            ]);
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
        $mail->isSMTP();
        $mail->Host       = 'smtp.hostinger.com'; // Replace with your SMTP server
        $mail->SMTPAuth   = true;
        $mail->Username   = 'rajiv@greencarcarpool.com'; // SMTP username
        $mail->Password   = 'Rajiv@111@'; // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        $mail->setFrom('rajiv@greencarcarpool.com', 'Hospital Placement Application');
        $mail->addAddress('rajiv@elitecorporatesolutions.com'); // Admin email

        $mail->isHTML(true);
        $mail->Subject = 'New Hospital Placement Application';
        $mail->Body = "
            <h2>New Hospital Placement Application</h2>
            <p><strong>First Name:</strong> $firstName</p>
            <p><strong>Last Name:</strong> $lastName</p>
            <p><strong>Gender:</strong> $gender</p>
            <p><strong>Date of Birth:</strong> $dateOfBirth</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Phone:</strong> $phone</p>
            <p><strong>Address:</strong> $address</p>
            <p><strong>City:</strong> $city</p>
            <p><strong>Role:</strong> $role</p>
            <p><strong>Qualification:</strong> $qualification</p>
            <p><strong>Experience:</strong> $experience years</p>
            <p><strong>Skills:</strong> $skills</p>
            <p><strong>Certifications:</strong> $certifications</p>
            <p><strong>CV File:</strong> <a href='" . $_SERVER['HTTP_HOST'] . "/$cv_path'>Download CV</a></p>
        ";

        $mail->send();
        echo "<script>
                alert('Application submitted successfully!');
                window.location.href = 'thankyou.php';
              </script>";
        exit();
    } catch (Exception $e) {
        echo "Email sending failed: {$mail->ErrorInfo}";
    }
}
?>