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

    <?php include "include/assets.php"?>

    <!-- Event snippet for hospital placement conversion page -->
    <script>
        gtag('event', 'conversion', {'send_to': 'AW-10893858085/yNPDCKzkkLwDEKWqzMoo'});
    </script>
    <script>
        function gtag_report_conversion(url) {
            var callback = function () {
                if (typeof(url) != 'undefined') {
                    window.location = url;
                }
            };
            gtag('event', 'conversion', {
                'send_to': 'AW-10893858085/p3sfCI6N-qEaEKWqzMoo',
                'value': 1.0,
                'currency': 'INR',
                'event_callback': callback
            });
            return false;
        }
    </script>
</head>
<body>

<div class="thankyou-container">
    <h2>Thank You!</h2>
    <p>Your submission has been received successfully. We will get back to you soon.</p>
    <p>You will be redirected to the homepage in <span id="countdown">5</span> seconds.</p>
    <a href="index.php" class="btn btn-primary">Go to Homepage</a>
</div>

<script>
    // Countdown and redirect logic
    let seconds = 5;
    const countdownElement = document.getElementById('countdown');

    const countdownInterval = setInterval(() => {
        seconds--;
        countdownElement.textContent = seconds;

        if (seconds <= 0) {
            clearInterval(countdownInterval);
            window.location.href = 'index.php'; // Redirect to homepage
        }
    }, 1000);
</script>

</body>
</html>