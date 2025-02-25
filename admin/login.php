<?php
session_start();

// Redirect to dashboard if already logged in
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header('Location: dashboard.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sample hardcoded admin credentials (you can store in DB later)
    $admin_email = 'admin@example.com';
    $admin_password = 'admin123'; // In real systems, use hashed passwords!

    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($email === $admin_email && $password === $admin_password) {
        $_SESSION['admin_logged_in'] = true;
        header('Location: index.php');
        exit();
    } else {
        $error = 'Invalid login credentials';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Admin Login</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            /* background: linear-gradient(135deg, #00c6ff, #0072ff); */
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Arial', sans-serif;
        }
        .login-container {
            background: #ffffff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 100%;
            max-width: 400px;
            position: relative;
            overflow: hidden;
        }
        .login-container img {
            width: 80px;
            margin-bottom: 15px;
        }
        .btn-custom {
            background: linear-gradient(45deg, #0072ff, #00c6ff);
            color: #fff;
            border: none;
            font-weight: bold;
            border-radius: 50px;
            padding: 10px 20px;
            transition: all 0.3s;
        }
        .btn-custom:hover {
            background: linear-gradient(45deg, #005bb5, #0096ff);
            transform: scale(1.05);
        }
        .hospital-name {
            font-size: 22px;
            font-weight: bold;
            color: #0072ff;
            margin-bottom: 20px;
        }
        .floating-icons {
            position: absolute;
            width: 150px;
            opacity: 0.2;
        }
        .icon-left {
            top: -30px;
            left: -30px;
        }
        .icon-right {
            bottom: -30px;
            right: -30px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <img src="https://hospitalplacement.com/wp-content/uploads/2021/05/logo-220.jpg" alt="Hospital Logo">
        <!-- <div class="hospital-name">CityCare Hospital</div> -->
        <h2>Admin Login</h2>
        <img src="https://hospitalplacement.com/wp-content/uploads/2021/05/logo-220.jpg" class="floating-icons icon-left" alt="Hospital Icon">
        <img src="https://hospitalplacement.com/wp-content/uploads/2021/05/logo-220.jpg" class="floating-icons icon-right" alt="Hospital Icon">
        <?php if (isset($error)): ?>
            <div class="alert alert-danger"> <?php echo $error; ?> </div>
        <?php endif; ?>
        <form method="POST">
            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
            </div>
            <button type="submit" class="btn btn-custom btn-block">Login</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

