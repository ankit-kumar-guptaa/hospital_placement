<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
<?php include 'include/seo.php'; ?>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- Typeface + design system, so the shared header and footer match the rest of the site -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/theme.css">

    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f0f8ff; /* Light blue background for a hospital theme */
            font-family: 'Arial', sans-serif;
        }

        .container {
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-top: 50px;
            margin-bottom: 50px;
        }

        h2 {
            color: #007bff; /* Blue color for headings */
            font-weight: bold;
            text-align: center;
            margin-bottom: 30px;
        }

        .form-control, .form-select {
            border-radius: 25px;
            padding: 10px 20px;
            border: 1px solid #ced4da;
            font-size: 14px;
            width: 100%;
            margin-bottom: 15px;
        }

        .form-control:focus, .form-select:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        .btn-primary, .btn-success {
            border-radius: 25px;
            font-size: 16px;
            font-weight: bold;
            padding: 10px 20px;
            width: 100%;
            margin-top: 10px;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-success {
            background-color: #28a745;
            border: none;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        #custom-button {
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 25px;
            padding: 10px 20px;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        #custom-button:hover {
            background-color: #0056b3;
        }

        #custom-text {
            font-size: 14px;
            color: #6c757d;
            margin-left: 10px;
        }

        .text-danger {
            font-size: 12px;
            margin-top: 5px;
        }

        .input-group {
            margin-bottom: 15px;
        }

        .input-group img {
            border-radius: 10px;
        }

        .input-group button {
            border-radius: 25px;
        }

        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }

            h2 {
                font-size: 24px;
            }

            .form-control, .form-select {
                font-size: 12px;
                padding: 8px 15px;
            }

            .btn-primary, .btn-success {
                font-size: 14px;
                padding: 8px 15px;
            }
        }
    </style>



</head>

<body class="hp-body">

<?php include "include/header.php"?>

<?php include "include/page-hero.php"; ?>
    <div class="container">
        <h2><i class="fas fa-hospital"></i> Hospital Placement Application Form</h2>
        <form action="process_form.php" method="POST" enctype="multipart/form-data">
            <div class="row g-3">
                <!-- Personal Details -->
                <div class="col-md-4">
                    <input type="text" class="form-control" name="firstName" placeholder="First Name*" required>
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control" name="lastName" placeholder="Last Name*" required>
                </div>
                <div class="col-md-4">
                    <select name="gender" class="form-select" required>
                        <option value="" selected disabled>Select Gender*</option>
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                        <option value="O">Other</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <input type="date" class="form-control" name="dateOfBirth" placeholder="Date of Birth*" required>
                </div>
                <div class="col-md-4">
                    <input type="email" class="form-control" name="email" placeholder="Email ID*" required>
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control" name="phone" placeholder="Phone Number*" required>
                </div>

                <!-- Address Details -->
                <div class="col-md-6">
                    <input type="text" class="form-control" name="address" placeholder="Address*" required>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="city" placeholder="City*" required>
                </div>

                <!-- Professional Details -->
                <div class="col-md-4">
                    <select name="role" class="form-select" required>
                        <option value="" selected disabled>Select Role*</option>
                        <option value="Doctor">Doctor</option>
                        <option value="Nurse">Nurse</option>
                        <option value="Lab Technician">Lab Technician</option>
                        <option value="Receptionist">Receptionist</option>
                        <option value="Ward Boy">Ward Boy</option>
                        <option value="Pharmacist">Pharmacist</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control" name="qualification" placeholder="Qualification*" required>
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control" name="experience" placeholder="Experience (in years)*" required>
                </div>

                <!-- Skills and Certifications -->
                <div class="col-md-6">
                    <input type="text" class="form-control" name="skills" placeholder="Skills (e.g., Patient Care, CPR, etc.)*" required>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="certifications" placeholder="Certifications (if any)">
                </div>

                <!-- Upload CV -->
                <div class="col-md-12">
                    <div class="d-flex align-items-center">
                        <input type="file" id="upload_cv" name="upload_cv" class="form-control d-none" accept=".doc, .pdf, .docx" required>
                        <button type="button" id="custom-button" class="btn btn-primary me-2">Upload CV*</button>
                        <span id="custom-text">No file chosen, yet.</span>
                    </div>
                </div>

                <!-- CAPTCHA -->
                <div class="col-md-12">
                    <label for="captcha-input">Enter CAPTCHA*</label>
                    <div class="input-group">
                        <img src="captcha.php" alt="CAPTCHA" id="captcha-image" class="img-fluid" style="width: 150px; height: 50px;">
                        <button type="button" id="refresh-captcha" class="btn btn-outline-secondary ms-2">
                            <i class="fas fa-sync-alt"></i> Refresh
                        </button>
                    </div>
                    <input type="text" class="form-control mt-2" id="captcha-input" name="captcha" placeholder="Enter CAPTCHA*" required>
                    <span id="captcha-error" class="text-danger"></span>
                </div>

                <!-- Submit Button -->
                <div class="col-12">
                    <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Submit Application</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom Scripts -->
    <script>
        document.getElementById('custom-button').addEventListener('click', function () {
            document.getElementById('upload_cv').click();
        });

        document.getElementById('upload_cv').addEventListener('change', function () {
            const fileName = this.files[0]?.name || "No file chosen, yet.";
            document.getElementById('custom-text').textContent = fileName;
        });

        document.getElementById('refresh-captcha').addEventListener('click', function () {
            const captchaImage = document.getElementById('captcha-image');
            captchaImage.src = 'captcha.php?' + Date.now(); // Append a timestamp to prevent caching
        });
    </script>

<?php include "include/footer.php"; ?>
