<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You | Hospital Placement</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"> <!-- AOS for animations -->

    <?php include "include/assets.php"?>

    <!-- Google Tag Manager Conversion Tracking -->
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

    <style>
        .thankyou-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 70vh; /* Adjust based on your header/footer height */
            background: #f0f8f7; /* Light mint background like in the image */
            padding: 20px;
        }

        .thankyou-card {
            background: #fff;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
            text-align: center;
            border: 2px solid #e8f5e9; /* Soft green border */
            position: relative;
            overflow: hidden;
        }

        .thankyou-card::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(56, 142, 60, 0.1), transparent);
            animation: pulse 6s infinite;
            z-index: 0;
        }

        .thankyou-title {
            color: #2e7d32; /* Dark green like in the image */
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            position: relative;
            z-index: 1;
            animation: fadeInDown 1s ease-in-out;
        }

        .thankyou-text, .redirect-text {
            color: #4a4a4a;
            font-size: 1.1rem;
            margin-bottom: 15px;
            position: relative;
            z-index: 1;
            animation: fadeInUp 1.2s ease-in-out;
        }

        #countdown {
            display: inline-block;
            background: #2e7d32;
            color: #fff;
            padding: 5px 12px;
            border-radius: 20px;
            font-weight: 600;
            animation: bounce 2s infinite;
        }

        .btn-thankyou {
            background: #2e7d32;
            color: #fff;
            border: none;
            padding: 12px 30px;
            font-size: 1.1rem;
            border-radius: 25px;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            text-decoration: none;
            display: inline-block;
            position: relative;
            z-index: 1;
        }

        .btn-thankyou:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(46, 125, 50, 0.3);
            background: #1b5e20;
        }

        /* Animations */
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
            40% { transform: translateY(-10px); }
            60% { transform: translateY(-5px); }
        }

        /* Responsive */
        @media (max-width: 576px) {
            .thankyou-card {
                padding: 20px;
                margin: 20px;
            }
            .thankyou-title {
                font-size: 2rem;
            }
            .thankyou-text, .redirect-text {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <?php include "include/header.php"?>

    <!-- Thank You Section -->
    <div class="thankyou-container" data-aos="fade-up">
        <div class="thankyou-card">
            <h2 class="thankyou-title">Thank You!</h2>
            <p class="thankyou-text">Your submission has been received successfully. We’ll reach out to you soon!</p>
            <p class="redirect-text">Redirecting to homepage in <span id="countdown">5</span> seconds...</p>
            <a href="index.php" class="btn-thankyou">Back to Homepage</a>
        </div>
    </div>

    <?php include "include/footer.php"?>

    <!-- AOS Script for Animations -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true
        });
    </script>

    <!-- Countdown Script -->
    <script>
        let seconds = 5;
        const countdownElement = document.getElementById('countdown');

        const countdownInterval = setInterval(() => {
            seconds--;
            countdownElement.textContent = seconds;

            if (seconds <= 0) {
                clearInterval(countdownInterval);
                window.location.href = 'index.php';
            }
        }, 1000);
    </script>
</body>
</html>