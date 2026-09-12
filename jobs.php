<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
<?php include 'include/seo.php'; ?>
</head>

<body class="hp-body">

<?php include "include/header.php"?>

<?php include "include/page-hero.php"; ?>

<!-- ===== Application form ================================================
     The page used to load a second copy of Bootstrap, a second Font Awesome,
     a second webfont and a second copy of theme.css on top of the shared head,
     then override all of it with its own stylesheet. All of that is gone: the
     form is the same form, with the same action, field names, options and
     required flags, dressed by the design system like every other page.
     ==================================================================== -->
<section id="apply" class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card border-0 shadow-sm hp-applycard" data-aos="fade-up">
                    <div class="card-body">

                        <h2 class="section-heading">Hospital placement application form</h2>
                        <p class="section-subheading mb-4">
                            One form, and your profile reaches the consultants recruiting for your
                            speciality. Everything marked with an asterisk is required.
                        </p>

                        <form action="process_form.php" method="POST" enctype="multipart/form-data">
                            <div class="row g-3">

                                <div class="col-12">
                                    <h3 class="hp-formgroup__t">About you</h3>
                                </div>
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
                                    <label class="form-label" for="dateOfBirth">Date of birth*</label>
                                    <input type="date" id="dateOfBirth" class="form-control" name="dateOfBirth" placeholder="Date of Birth*" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="email">Email*</label>
                                    <input type="email" id="email" class="form-control" name="email" placeholder="Email ID*" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="phone">Phone*</label>
                                    <input type="text" id="phone" class="form-control" name="phone" placeholder="Phone Number*" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="address" placeholder="Address*" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="city" placeholder="City*" required>
                                </div>

                                <div class="col-12 mt-4">
                                    <h3 class="hp-formgroup__t">Your professional details</h3>
                                </div>
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
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="skills" placeholder="Skills (e.g., Patient Care, CPR, etc.)*" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="certifications" placeholder="Certifications (if any)">
                                </div>

                                <div class="col-12 mt-4">
                                    <h3 class="hp-formgroup__t">Your CV</h3>
                                </div>
                                <div class="col-12">
                                    <div class="hp-upload">
                                        <input type="file" id="upload_cv" name="upload_cv" class="form-control d-none" accept=".doc, .pdf, .docx" required>
                                        <button type="button" id="custom-button" class="btn btn-secondary">
                                            <i class="fa-solid fa-paperclip" aria-hidden="true"></i> Upload CV*
                                        </button>
                                        <span id="custom-text">No file chosen, yet.</span>
                                    </div>
                                    <p class="form-privacy mt-2">Accepted formats: PDF, DOC and DOCX.</p>
                                </div>

                                <div class="col-12 mt-4">
                                    <h3 class="hp-formgroup__t">One last check</h3>
                                </div>
                                <div class="col-12">
                                    <label class="form-label" for="captcha-input">Enter CAPTCHA*</label>
                                    <div class="hp-captcha">
                                        <img src="captcha.php" alt="CAPTCHA verification code" id="captcha-image" width="150" height="50">
                                        <button type="button" id="refresh-captcha" class="btn btn-secondary">
                                            <i class="fa-solid fa-rotate-right" aria-hidden="true"></i> Refresh
                                        </button>
                                    </div>
                                    <input type="text" class="form-control mt-2" id="captcha-input" name="captcha" placeholder="Enter CAPTCHA*" required>
                                    <span id="captcha-error" class="text-danger"></span>
                                </div>

                                <div class="col-12 mt-4">
                                    <div class="d-flex flex-wrap align-items-center gap-3">
                                        <button type="submit" class="btn btn-primary btn-lg">
                                            <i class="fa-solid fa-paper-plane" aria-hidden="true"></i> Submit Application
                                        </button>
                                        <span class="form-privacy">
                                            <i class="bi bi-shield-check" aria-hidden="true"></i>
                                            Your CV goes only to our recruitment team. No listing fee, ever.
                                        </span>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

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

<?php include "include/page-faq.php"; ?>

<?php include "include/footer.php"; ?>
