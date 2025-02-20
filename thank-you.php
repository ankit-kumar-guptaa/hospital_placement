<?php
// You can include any logic to handle the post-submission process if needed.
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            text-align: center;
            padding: 50px;
        }
        .thankyou-container {
            background-color: white;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 0 auto;
        }
        .thankyou-container h2 {
            color: #28a745;
        }
        .thankyou-container p {
            font-size: 16px;
            color: #333;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="thankyou-container">
    <h2>Thank You!</h2>
    <p>Your submission has been received successfully. We will get back to you soon.</p>
    <a href="index.php" class="btn btn-primary">Go to Homepage</a>
</div>

</body>
</html>
