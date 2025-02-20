
<!-- slider.php -->
<div class="slider-container">
<div class="heading1">HOSPITAL PLACEMENT HR <div class="small1">SINCE 2010</div></div>
    <div class="slider-content">
       
         <h3>Looking For Job</h3>
        <!-- <p>Your Premier Healthcare Recruitment Consultant</p> -->
        <form action="backend_job_seeker.php" method="post" class="slider-form">
            <!-- Role Selection -->
            <div class="mb-3">
                <label for="role" class="form-label">I'm a</label>
                <select id="role" name="role" class="form-select" required onchange="showFields()">
                    <option value="" disabled selected>—Please choose an option—</option>
                    <option value="doctor">Doctor</option>
                    <option value="nurse">Nurse</option>
                    <option value="Pharma">Pharma</option>
                    <option value="Diagnostics">Diagnostics</option>
                    <option value="Administrative">Administrative</option>
                </select>
            </div>

            <!-- Dynamic Fields for Doctor (hidden by default) -->
            <div id="doctor-fields" class="dynamic-fields" style="display: none;">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="department" class="form-label">Department</label>
                        <select id="department" name="department" class="form-select">
                            <option value="" disabled selected>Select Department</option>
                            <option value="Cardiology">Cardiology</option>
                            <option value="Dermatology">Dermatology</option>
                            <option value="ENT">ENT</option>
                            <option value="Gastroenterology">Gastroenterology</option>
                            <option value="General Practitioner">General Practitioner</option>
                            <option value="General surgery">General surgery</option>
                            <option value="Gynaecology">Gynaecology</option>
                            <option value="Others">Others</option>
                        </select>
                    </div>

                    <!-- Qualification Selection -->
                    <div class="col-md-6">
                        <label for="qualification" class="form-label">Qualification</label>
                        <select id="qualification" name="qualification" class="form-select" required>
                            <option value="" disabled selected>Select Qualification</option>
                            <option value="MD">MD</option>
                            <option value="MS">MS</option>
                            <option value="MBBS">MBBS</option>
                            <option value="BAMS">BAMS</option>
                            <option value="BDS">BDS</option>
                            <option value="BHMS">BHMS</option>
                            <option value="PhD">PhD</option>
                            <option value="Others">Others</option>
                        </select>
                    </div>

                 
                </div>
            </div>

            <!-- Dynamic Fields for Nurse (hidden by default) -->
            <div id="nurse-fields" class="dynamic-fields" style="display: none;">
                <div class="row mb-3">
                    <!-- Department Selection -->
                    <div class="col-md-6">
                        <label for="department" class="form-label">Department</label>
                        <select id="department" name="department" class="form-select">
                            <option value="" disabled selected>Select Department</option>
                            <option value="Anaesthesiology">Anaesthesiology</option>
                            <option value="Critical-care / ICU">Critical-care / ICU</option>
                            <option value="Cardiology">Cardiology</option>
                            <option value="Geriatrics">Geriatrics</option>
                            <option value="Obstetric & Gynaecological (OB-GYN)">Obstetric & Gynaecological (OB-GYN)
                            </option>
                            <option value="Oncology">Oncology</option>
                            <option value="Paediatrics">Paediatrics</option>
                            <option value="Surgery and transplantation">Surgery and transplantation</option>
                            <option value="Mental Health">Mental Health</option>
                            <option value="Nurse Manager">Nurse Manager</option>
                            <option value="Orthopaedic">Orthopaedic</option>
                            <option value="Travel / Home Care">Travel / Home Care</option>
                            <option value="Neonatal">Neonatal</option>
                            <option value="Others">Others</option>
                        </select>
                    </div>

                    <!-- Qualification Selection -->
                    <div class="col-md-6">
                        <label for="qualification" class="form-label">Qualification</label>
                        <select id="qualification" name="qualification" class="form-select">
                            <option value="" disabled selected>Select Qualification</option>
                            <option value="B.Sc (N) Distance">B.Sc (N) Distance</option>
                            <option value="B.Sc (N) Post-Basic">B.Sc (N) Post-Basic</option>
                            <option value="B.Sc (N) Basic">B.Sc (N) Basic</option>
                            <option value="ANM (Auxiliary Nursing and Midwifery)">ANM (Auxiliary Nursing and Midwifery)
                            </option>
                            <option value="GNM (General) Nursing and Midwifery">GNM (General) Nursing and Midwifery
                            </option>
                            <option value="Others">Others</option>
                        </select>
                    </div>

                   
                </div>
            </div>

            <div id="pharma-fields" class="dynamic-fields" style="display: none;">
                <div class="row mb-3">
                    <!-- Department Selection -->
                    <div class="col-md-6">
                        <label for="department" class="form-label">Department</label>
                        <select id="department" name="department" class="form-select">
                            <option value="" disabled selected>Select Department</option>
                            <option value="Clinical">Clinical</option>
                            <option value="Manufacturing">Manufacturing</option>
                            <option value="Marketing">Marketing</option>
                            <option value="Purchasing">Purchasing</option>
                            <option value="Quality">Quality</option>
                            <option value="R&D">R&D</option>
                            <option value="Sales">Sales</option>
                            <option value="Supply Chain & Logistics">Supply Chain & Logistics</option>
                            <option value="Hospital Pharmacist">Hospital Pharmacist</option>
                            <option value="Pharmacist">Pharmacist</option>
                            <option value="Others">Others</option>
                        </select>
                    </div>

                    <!-- Qualification Selection -->
                    <div class="col-md-6">
                        <label for="qualification" class="form-label">Qualification</label>
                        <select id="qualification" name="qualification" class="form-select">
                            <option value="" disabled selected>Select Qualification</option>
                            <option value="10th Pass">10th Pass</option>
                            <option value="12th">12th</option>
                            <option value="Graduation">Graduation</option>
                            <option value="Post Graduation">Post Graduation</option>
                            <option value="Others">Others</option>
                        </select>
                    </div>

                </div>
            </div>



            <!-- Diagnostics Fields -->
            <div id="diagnostics-fields" class="dynamic-fields" style="display: none;">
                <div class="row mb-3">
                    <!-- Department Selection -->
                    <div class="col-md-4">
                        <label for="department" class="form-label">Department</label>
                        <select id="department" name="department" class="form-select">
                            <option value="" disabled selected>Select Department</option>
                            <option value="Audio metrics">Audio metrics</option>
                            <option value="Bronchoscopy">Bronchoscopy</option>
                            <option value="Ecg">Ecg</option>
                            <option value="Echo/tmt">Echo/tmt</option>
                            <option value="Eeg/emg/vep">Eeg/emg/vep</option>
                            <option value="Ercp">Ercp</option>
                            <option value="Pathology">Pathology</option>
                            <option value="Radiology">Radiology</option>
                            <option value="Uroflometric">Uroflometric</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>

                    <!-- Qualification Selection -->
                    <div class="col-md-4">
                        <label for="qualification" class="form-label">Qualification</label>
                        <select id="qualification" name="qualification" class="form-select">
                            <option value="" disabled selected>Select Qualification</option>
                            <option value="BOT - Bachelor of Occupational Therapy">BOT - Bachelor of Occupational
                                Therapy</option>
                            <option value="B.Sc (Audiology and Speech Therapy)">B.Sc (Audiology and Speech Therapy)
                            </option>
                            <option value="B.Sc (Ophthalmic Technology)">B.Sc (Ophthalmic Technology)</option>
                            <option value="B.Sc (Radiography)">B.Sc (Radiography)</option>
                            <option value="B.Sc (Nuclear Medicine)">B.Sc (Nuclear Medicine)</option>
                            <option value="B.Sc (Medical Lab Technology)">B.Sc (Medical Lab Technology)</option>
                            <option value="B.Sc in Operation Theatre Technology">B.Sc in Operation Theatre Technology
                            </option>
                            <option value="B.Sc (Respiratory Therapy Technology)">B.Sc (Respiratory Therapy Technology)
                            </option>
                            <option value="B.Sc (Radio Therapy)">B.Sc (Radio Therapy)</option>
                            <option value="B.Sc (Allied Health Services)">B.Sc (Allied Health Services)</option>
                            <option value="Bachelor of Naturopathy & Yogic Science">Bachelor of Naturopathy & Yogic
                                Science</option>
                            <option value="B.Sc in Dialysis Therapy">B.Sc in Dialysis Therapy</option>
                            <option value="B.Sc in Critical Care Technology">B.Sc in Critical Care Technology</option>
                            <option value="Bachelor of Physiotherapy">Bachelor of Physiotherapy</option>
                            <option value="B.Sc Nursing">B.Sc Nursing</option>
                            <option value="Diploma in Physiotherapy">Diploma in Physiotherapy</option>
                            <option value="Diploma in Medical Laboratory Technology">Diploma in Medical Laboratory
                                Technology</option>
                            <option value="Diploma in Dialysis Technology">Diploma in Dialysis Technology</option>
                            <option value="Diploma in Medical Imaging Technology">Diploma in Medical Imaging Technology
                            </option>
                            <option value="Diploma in Anaesthesia">Diploma in Anaesthesia</option>
                            <option value="Diploma in OT Technician">Diploma in OT Technician</option>
                            <option value="Diploma in Nursing Care Assistant">Diploma in Nursing Care Assistant</option>
                            <option value="Diploma in Hear Language and Speech">Diploma in Hear Language and Speech
                            </option>
                            <option value="Diploma in Rural Health Care">Diploma in Rural Health Care</option>
                            <option value="Diploma in Ophthalmic Technology">Diploma in Ophthalmic Technology</option>
                            <option value="Diploma in Dental Hygienist">Diploma in Dental Hygienist</option>
                            <option value="Diploma in Medical Record Technology">Diploma in Medical Record Technology
                            </option>
                            <option value="Diploma in X-Ray Technology">Diploma in X-Ray Technology</option>
                            <option value="MD in Pathology">MD in Pathology</option>
                            <option value="MD in Radiodiagnosis">MD in Radiodiagnosis</option>
                            <option value="MD in Anaesthesia">MD in Anaesthesia</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                </div>
            </div>


            <!-- Administrative Fields -->
            <div id="administrative-fields" class="dynamic-fields" style="display: none;">
                <div class="row mb-3">
                    <!-- Department Selection -->
                    <div class="col-md-6">
                        <label for="department" class="form-label">Department</label>
                        <select id="department" name="department" class="form-select">
                            <option value="" disabled selected>Select Department</option>
                            <option value="Purchasing">Purchasing</option>
                            <option value="Accounts">Accounts</option>
                            <option value="Billing">Billing</option>
                            <option value="Housekeeping">Housekeeping</option>
                            <option value="Laundry">Laundry</option>
                            <option value="Mechanical">Mechanical</option>
                            <option value="Maintenance">Maintenance</option>
                            <option value="Central Supply">Central Supply</option>
                            <option value="Waste Management">Waste Management</option>
                            <option value="Central Sterile Supply">Central Sterile Supply</option>
                            <option value="Medical Record">Medical Record</option>
                            <option value="Personnel">Personnel</option>
                            <option value="TPA">TPA</option>
                            <option value="Ward Boy">Ward Boy</option>
                            <option value="IT">IT</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>

                    <!-- Qualification Selection -->
                    <div class="col-md-6">
                        <label for="qualification" class="form-label">Qualification</label>
                        <select id="qualification" name="qualification" class="form-select">
                            <option value="" disabled selected>Select Qualification</option>
                            <option value="10th Pass">10th Pass</option>
                            <option value="12th">12th</option>
                            <option value="Graduation">Graduation</option>
                            <option value="Post Graduation">Post Graduation</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                </div>
            </div>



            <h6> Personal Info : </h6>
            <div class="personal-info mb-3 row">
                <div class="col-md-4">

                    <input type="text" name="name" class="form-control" placeholder="Name" required>
                </div>
                <div class="col-md-4">
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                </div>
                <div class="col-md-4">
                    <input type="text" name="phone" class="form-control" placeholder="Phone No" required>
                </div>
            </div>

            <!-- CAPTCHA Image, Input and Refresh Button in Same Row -->
            <div class="mb-3 d-flex align-items-center">
                <!-- CAPTCHA Image -->
                <img src="captcha.php" alt="CAPTCHA Image" class="captcha-image"
                    style="max-width: 150px; height: auto; margin-right: 10px;">

                <!-- CAPTCHA Refresh Button -->
                <button type="button" class="refresh-captcha btn btn-light"
                    style="width: 40px; height: 40px; font-size: 16px; padding: 0; line-height: 0; border-radius: 50%; background-color:aliceblue;">🔄</button>

                <!-- CAPTCHA Input -->
                <input type="text" name="captcha" class="form-control" placeholder="Enter Captcha" required
                    style="max-width: 130px; margin-right: 10px;">
            </div>

            <button type="submit" name="submit" class="btn btn-warning w-100">Submit</button>
        </form>
    </div>

  

    <div class="slider-sidebar">
        <div class="sidebar-content">
            <h3>Looking for Employee</h3>
            <form action="employer_form_submission.php" method="post" class="employer-form">
                <div class="mb-3">
                    <input type="text" id="organization-name" name="organization_name" class="form-control"
                        placeholder="Enter Organization Name" required>
                </div>
                
                <div class="mb-3">
                    <input type="text" id="contact-name" name="contact_name" class="form-control"
                        placeholder="Enter Contact Name" required>
                </div>
                <div class="mb-3">
                    <input type="email" id="email" name="email" class="form-control" placeholder="Enter Email" required>
                </div>
                <div class="mb-3">
                    <input type="tel" id="phone" name="phone" class="form-control" placeholder="Enter Phone Number"
                        required>
                </div>
                <div class="mb-3">
                    <!-- <label for="remarks" class="form-label">Remarks (Hiring For / Budget, etc.)</label> -->
                    <textarea id="remarks" name="remarks" class="form-control" placeholder="Remarks (Hiring For / Budget, etc.)" rows="2"
                        required></textarea>
                </div>

                <!-- CAPTCHA Image, Input and Refresh Button in Same Row -->
                <div class="mb-3 d-flex align-items-center">
                    <!-- CAPTCHA Image -->
                    <img src="captcha.php" alt="CAPTCHA Image" class="captcha-image"
                        style="max-width: 150px; height: auto; margin-right: 10px;">

                    <!-- CAPTCHA Refresh Button -->
                    <button type="button" class="refresh-captcha "
                        style="width: 40px; height: 40px; font-size: 16px; padding: 0; line-height: 0; border-radius: 50%; background-color:aliceblue;">🔄</button>

                    <!-- CAPTCHA Input -->
                    <input type="text" name="captcha" class="form-control" placeholder="Enter Captcha" required
                        style="max-width: 130px; margin-right: 10px;">
                </div>

                <button style="background-color: #ffcc00;" type="submit" name="submit" class="btn btn-primary w-100">Submit</button>
            </form>



        </div>
    </div>


</div>

<script>
    // Attach event listeners to all refresh buttons
    document.querySelectorAll('.refresh-captcha').forEach(function (button) {
        button.addEventListener('click', function () {
            // Find the closest captcha image related to this button
            const captchaImage = this.parentElement.querySelector('.captcha-image');
            if (captchaImage) {
                // Refresh the CAPTCHA image
                captchaImage.src = 'captcha.php?' + new Date().getTime(); // Add timestamp to avoid caching
            }
        });
    });
</script>



<!-- Add this JavaScript for Dynamic Fields -->
<!-- <script>
    function showFields() {
        var role = document.getElementById('role').value;
        var doctorFields = document.getElementById('doctor-fields');
        var nurseFields = document.getElementById('nurse-fields');

        // Hide all fields first
        doctorFields.style.display = 'none';
        nurseFields.style.display = 'none';

        // Show the appropriate fields based on the selected role
        if (role === 'doctor') {
            doctorFields.style.display = 'block';
        } else if (role === 'nurse') {
            nurseFields.style.display = 'block';
        }
    }
</script> -->
<script>
    function showFields() {
        var role = document.getElementById('role').value;
        var doctorFields = document.getElementById('doctor-fields');
        var nurseFields = document.getElementById('nurse-fields');
        var pharmaFields = document.getElementById('pharma-fields');  // Add this for Pharma, if needed

        var diagnosticsFields = document.getElementById('diagnostics-fields');  // Add this for Diagnostics, if needed
        var administrativeFields = document.getElementById('administrative-fields');  // Add this for Administrative, if needed
        // Hide all fields first
        doctorFields.style.display = 'none';
        nurseFields.style.display = 'none';
        pharmaFields.style.display = 'none';  // Add this line if you want to handle Pharma
        diagnosticsFields.style.display = 'none';  // Add this line if you want to handle Diagnostics
        administrativeFields.style.display = 'none';  // Add this line if you want to handle Administrative
        // Show the appropriate fields based on the selected role
        if (role === 'doctor') {
            doctorFields.style.display = 'block';
        } else if (role === 'nurse') {
            nurseFields.style.display = 'block';
        } else if (role === 'Pharma') {
            pharmaFields.style.display = 'block';  // Add this if Pharma is selected
        }
        // Add this else if if you want to handle Diagnostics
        else if (role === 'Diagnostics') {
            diagnosticsFields.style.display = 'block';
        }
        // Add this else if if you want to handle Administrative
        else if (role === 'Administrative') {
            administrativeFields.style.display = 'block';
        }
    }
</script>











<style>
    /* General Styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Arial', sans-serif;
    background-color: #f1f1f1; /* Light gray background */
    color: #333; /* Dark text for better readability */
}

/* Slider Container */
.slider-container {
    display: flex;
    flex-wrap: wrap;
    background: linear-gradient(135deg, #42a5f5, #262728); /* Gradient background for a fresh look */
    padding: 40px 20px;
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    align-items: flex-start;
    justify-content: space-between;
    gap: 20px;
    /* margin: 40px auto; Center and add some space around the container */
    /* max-width: 1200px; */
}

/* Slider Content and Sidebar */
.slider-content,
.slider-sidebar {
    flex: 1 1 48%; /* Same width for both forms */
    padding: 20px;
    background-color: #fff;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    height: 100%;
}

/* Heading Styling */
.slider-container .heading1 {
    font-family: 'Dancing Script', cursive; /* Elegant font for the heading */
    font-size: 3rem; /* Larger font size */
    text-align: center;
    margin: 0 auto 20px;
    font-weight: bold;
    color: #fff; /* White color for the heading */
    text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3); /* Soft shadow effect */
    width: 100%;
}

/* Small Heading for Subsections */
.slider-container .small1 {
    font-size: 1.2rem;
    color: #ffcc00;
    text-align: center;
    margin-top: 10px;
    font-weight: 600;
}

/* Section Heading Styling */
.slider-content h3,
.slider-sidebar h3 {
    font-size: 2rem;
    font-weight: bold;
    text-align: center;
    margin-bottom: 20px;
    color: #1e88e5; /* Blue color for headings */
    text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.1); /* Soft shadow effect */
}

/* Form Styling */
.slider-form,
.employer-form {
    width: 100%;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    background-color: #f9f9f9;
    margin-top: 10px;
    border: 2px solid #ddd; /* Light border for forms */
}

/* Input & Select Styling */
.slider-form input,
.slider-form select,
.slider-form textarea,
.employer-form input,
.employer-form select,
.employer-form textarea {
    width: 100%;
    padding: 12px;
    font-size: 1rem;
    border: 1px solid #ccc;
    border-radius: 8px;
    margin-bottom: 15px;
    background-color: #fff;
    transition: border-color 0.3s ease, background-color 0.3s ease;
}

/* Focus Effect on Inputs */
.slider-form input:focus,
.slider-form select:focus,
.slider-form textarea:focus,
.employer-form input:focus,
.employer-form select:focus,
.employer-form textarea:focus {
    border-color: #42a5f5;
    background-color: #f0f8ff; /* Soft blue background on focus */
}

/* Button Styling */
.slider-form button,
.employer-form button {
    background-color: #ff5722;
    color: white;
    border: none;
    cursor: pointer;
    font-weight: bold;
    border-radius: 6px;
    padding: 14px;
    font-size: 1.1rem;
    transition: background-color 0.3s ease, transform 0.3s ease;
    width: 100%;
    margin-top: 10px;
}

.slider-form button:hover,
.employer-form button:hover {
    background-color: #e64a19; /* Darker orange on hover */
    transform: translateY(-3px);
}

/* Responsive Design */
@media screen and (max-width: 768px) {
    .slider-container {
        flex-direction: column;
        align-items: center;
    }

    .slider-content,
    .slider-sidebar {
        flex: 1 1 100%;
    }

    .slider-form input,
    .slider-form select,
    .slider-form textarea,
    .employer-form input,
    .employer-form select,
    .employer-form textarea {
        font-size: 1rem;
        padding: 12px;
    }
}

@media screen and (max-width: 576px) {
    .slider-content h1,
    .slider-sidebar h3 {
        font-size: 1.5rem;
    }

    .slider-form input,
    .slider-form select,
    .employer-form input,
    .employer-form select,
    .employer-form textarea {
        font-size: 0.9rem;
        padding: 10px;
    }

    .slider-form button,
    .employer-form button {
        font-size: 1rem;
        padding: 12px;
    }
}

</style>