
<!-- slider.php -->
<div class="slider-container">
    <div class="slider-content">
        <!-- <h1>WELCOME TO HOSPITALPLACEMENT.COM</h1> -->
         <h2>I'm an Employee</h2>
        <p>Your Premier Healthcare Recruitment Consultant</p>
        <form action="../backend_job_seeker.php" method="post" class="slider-form">
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
                    <div class="col-md-4">
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
                    <div class="col-md-4">
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

                    <!-- College / Institute / University Selection -->
                    <!-- <div class="col-md-4">
                        <label for="college" class="form-label">College / Institute / University</label>
                        <select id="college" name="college" class="form-select" required>
                            <option value="" disabled selected>Select College</option>
                            <option value="A J Institute of Medical Sciences">A J Institute of Medical Sciences</option>
                            <option value="A N Magadh Medical College">A N Magadh Medical College</option>
                            <option value="All India Institute of Medical Sciences">All India Institute of Medical
                                Sciences</option>
                            <option value="Amala Institute of Medical Sciences">Amala Institute of Medical Sciences
                            </option>
                            <option value="Bangalore Medical College and Research Institute">Bangalore Medical College
                                and Research Institute</option>
                            <option value="Banaras Hindu University">Banaras Hindu University</option>
                            <option value="Bhabha Atomic Research Centre">Bhabha Atomic Research Centre</option>
                            <option value="CMC Vellore">CMC Vellore</option>
                            <option value="Dr. Ram Manohar Lohia Hospital, New Delhi">Dr. Ram Manohar Lohia Hospital,
                                New Delhi</option>
                            <option value="Gandhi Medical College, Bhopal">Gandhi Medical College, Bhopal</option>
                            <option value="Grant Medical College, Mumbai">Grant Medical College, Mumbai</option>
                            <option
                                value="Jawaharlal Institute of Postgraduate Medical Education and Research (JIPMER)">
                                Jawaharlal Institute of Postgraduate Medical Education and Research (JIPMER)</option>
                            <option value="Kasturba Medical College, Manipal">Kasturba Medical College, Manipal</option>
                            <option value="King George's Medical University, Lucknow">King George's Medical University,
                                Lucknow</option>
                            <option value="Maulana Azad Medical College, New Delhi">Maulana Azad Medical College, New
                                Delhi</option>
                            <option value="Medical College, Kolkata">Medical College, Kolkata</option>
                            <option value="MGM Medical College, Navi Mumbai">MGM Medical College, Navi Mumbai</option>
                            <option value="Mysore Medical College and Research Institute">Mysore Medical College and
                                Research Institute</option>
                            <option value="PGIMER Chandigarh">PGIMER Chandigarh</option>
                            <option value="Post Graduate Institute of Medical Education and Research">Post Graduate
                                Institute of Medical Education and Research</option>
                            <option value="Sardar Patel Medical College, Bikaner">Sardar Patel Medical College, Bikaner
                            </option>
                            <option value="Shri Ram Murti Smarak Institute of Medical Sciences">Shri Ram Murti Smarak
                                Institute of Medical Sciences</option>
                            <option value="St. John's Medical College, Bangalore">St. John's Medical College, Bangalore
                            </option>
                            <option value="Sree Chitra Tirunal Institute for Medical Sciences and Technology">Sree
                                Chitra Tirunal Institute for Medical Sciences and Technology</option>
                            <option value="Tata Memorial Hospital, Mumbai">Tata Memorial Hospital, Mumbai</option>
                            <option value="Teerthanker Mahaveer Medical College, Moradabad">Teerthanker Mahaveer Medical
                                College, Moradabad</option>
                            <option value="The Tamil Nadu Dr. M.G.R. Medical University">The Tamil Nadu Dr. M.G.R.
                                Medical University</option>
                            <option value="Others">Others</option>
                        </select>
                    </div> -->

                </div>
            </div>

            <!-- Dynamic Fields for Nurse (hidden by default) -->
            <div id="nurse-fields" class="dynamic-fields" style="display: none;">
                <div class="row mb-3">
                    <!-- Department Selection -->
                    <div class="col-md-4">
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
                    <div class="col-md-4">
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

                    <!-- College / Institute / University Selection -->
                    <!-- <div class="col-md-4">
                        <label for="college" class="form-label">College / Institute / University</label>
                        <select id="college" name="college" class="form-select">
                            <option value="" disabled selected>Select College</option>
                            <option value="ADARSH COLLEGE OF NURSING">ADARSH COLLEGE OF NURSING</option>
                            <option value="AdeshCollege of Nursing, Bhatinda">AdeshCollege of Nursing, Bhatinda</option>
                            <option value="Ahilya Bai College Of Nursing">Ahilya Bai College Of Nursing</option>
                            <option value="AKAL COLLEGE OF NURSING">AKAL COLLEGE OF NURSING</option>
                            <option value="AMAR PROFESSIONAL COLLEGE OF NURSING">AMAR PROFESSIONAL COLLEGE OF NURSING
                            </option>
                            <option value="AMBIKA INSTITUTE OF NURSING">AMBIKA INSTITUTE OF NURSING</option>
                            <option value="Amity College of Nursing, Gurgaon">Amity College of Nursing, Gurgaon</option>
                            <option value="ANIL BAGHI COLLEGE OF NURSING">ANIL BAGHI COLLEGE OF NURSING</option>
                            <option value="BABA FARID COLLEGE OF NURSING">BABA FARID COLLEGE OF NURSING</option>
                            <option value="BANDA BAHADUR COLLEGE OF NURSING">BANDA BAHADUR COLLEGE OF NURSING</option>
                            <option value="Bankura Sammilani Medical College">Bankura Sammilani Medical College</option>
                            <option value="BHARAT INSTITUTE OF NURSING TRAINING">BHARAT INSTITUTE OF NURSING TRAINING
                            </option>
                            <option value="Bhopal Nursing College">Bhopal Nursing College</option>
                            <option value="BIRENDER SINGH COLLEGE OF NURSING">BIRENDER SINGH COLLEGE OF NURSING</option>
                            <option value="CHAMUNDA INSTITUTE OF MEDICAL SCIENCE">CHAMUNDA INSTITUTE OF MEDICAL SCIENCE
                            </option>
                            <option value="CHINTPURNI INSTITUTE OF NURSING">CHINTPURNI INSTITUTE OF NURSING</option>
                            <option value="CHITKARA SCHOOL OF HEALTH SCIENCES">CHITKARA SCHOOL OF HEALTH SCIENCES
                            </option>
                            <option value="College Of Nursing">College Of Nursing</option>
                            <option value="College Of Nursing Kurji">College Of Nursing Kurji</option>
                            <option value="Dayanand Medical College & Hospital College Of Nursing">Dayanand Medical
                                College & Hospital College Of Nursing</option>
                            <option value="Desh Bhagat Institute of Nursing">Desh Bhagat Institute of Nursing</option>
                            <option value="DR JAI PRAKASH SHARMA MEMORIAL COLLEGE">DR JAI PRAKASH SHARMA MEMORIAL
                                COLLEGE</option>
                            <option value="Dr M G R Educational & Research Institute">Dr M G R Educational & Research
                                Institute</option>
                            <option value="DR SHYAM LAL THAPAR COLLEGE OF NURSING">DR SHYAM LAL THAPAR COLLEGE OF
                                NURSING</option>
                            <option value="Galgotias School Of Nursing">Galgotias School Of Nursing</option>
                            <option value="GAUTAM COLLEGE OF NURSING">GAUTAM COLLEGE OF NURSING</option>
                            <option value="GEETANJALI COLLEGE OF NURSING">GEETANJALI COLLEGE OF NURSING</option>
                            <option value="GEMS COLLEGE OF NURSING">GEMS COLLEGE OF NURSING</option>
                            <option value="Government Medical College College Of Nursing">Government Medical College
                                College Of Nursing</option>
                            <option value="Government College Of Nursing, Ajmer">Government College Of Nursing, Ajmer
                            </option>
                            <option value="Govt College Of Nursing">Govt College Of Nursing</option>
                            <option value="GURU DRONACHARYA COLLEGE OF NURSING">GURU DRONACHARYA COLLEGE OF NURSING
                            </option>
                            <option value="GURU GOBIND SINGH COLLEGE OF NURSING">GURU GOBIND SINGH COLLEGE OF NURSING
                            </option>
                            <option value="GURU NANAK COLLEGE OF NURSING">GURU NANAK COLLEGE OF NURSING</option>
                            <option value="GURU TEG BAHADUR COLLEGE OF NURSING">GURU TEG BAHADUR COLLEGE OF NURSING
                            </option>
                            <option value="HOLY FAMILY HOSPITAL">HOLY FAMILY HOSPITAL</option>
                            <option value="Indira Gandhi Institute Of Medical Sciences">Indira Gandhi Institute Of
                                Medical Sciences</option>
                            <option value="Institute Of Nursing">Institute Of Nursing</option>
                            <option value="LINGAYAS INSTITUTE OF HEALTH SCIENCES">LINGAYAS INSTITUTE OF HEALTH SCIENCES
                            </option>
                            <option value="NATIONAL COLLEGE OF NURSING">NATIONAL COLLEGE OF NURSING</option>
                            <option value="RAJENDRA INSTITUTE OF MEDICAL SCIENCES">RAJENDRA INSTITUTE OF MEDICAL
                                SCIENCES</option>
                            <option value="SHIMLA NURSING COLLEGE">SHIMLA NURSING COLLEGE</option>
                            <option value="Sikkim Manipal Institute Of Medical Sciences">Sikkim Manipal Institute Of
                                Medical Sciences</option>
                            <option value="Teerthanker Mahaveer College Of Nursing">Teerthanker Mahaveer College Of
                                Nursing</option>
                            <option value="Others">Others</option>
                        </select>
                    </div> -->

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
                    style="width: 40px; height: 40px; font-size: 16px; padding: 0; line-height: 0; border-radius: 50%;">🔄</button>

                <!-- CAPTCHA Input -->
                <input type="text" name="captcha" class="form-control" placeholder="Enter Captcha" required
                    style="max-width: 120px; margin-right: 10px;">
            </div>

            <button type="submit" name="submit" class="btn btn-warning w-100">Submit</button>
        </form>
    </div>

    <!-- Sidebar Section -->
    <!-- <div class="slider-sidebar">
        <div class="sidebar-content">
            <img src="https://cdn-icons-png.freepik.com/256/4521/4521422.png?semt=ais_hybrid" alt="Hospital Icon"
                class="img-fluid">
            <h3>Hospital / Pharma Co. & Home Care</h3>
            <a href="#" class="share-requirement-btn">Click Here to Share Your Requirement</a>
        </div>
    </div> -->

    <div class="slider-sidebar">
        <div class="sidebar-content">
            <h3>I'm an Employer</h3>
            <form action="../employer_form_submission.php" method="post" class="employer-form">
                <div class="mb-3">
                    <input type="text" id="organization-name" name="organization_name" class="form-control"
                        placeholder="Enter Organization Name" required>
                </div>
                <div class="mb-3 position-relative">
                    <input type="text" id="city" name="city" class="form-control" placeholder="Enter City"
                        oninput="showCitySuggestions()" autocomplete="off" required>
                    <div id="city-suggestions" class="autocomplete-suggestions"></div>
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
                    <label for="remarks" class="form-label">Remarks (Hiring For / Budget, etc.)</label>
                    <textarea id="remarks" name="remarks" class="form-control" placeholder="Enter Details Here" rows="4"
                        required></textarea>
                </div>

                <!-- CAPTCHA Image, Input and Refresh Button in Same Row -->
                <div class="mb-3 d-flex align-items-center">
                    <!-- CAPTCHA Image -->
                    <img src="captcha.php" alt="CAPTCHA Image" class="captcha-image"
                        style="max-width: 150px; height: auto; margin-right: 10px;">

                    <!-- CAPTCHA Refresh Button -->
                    <button type="button" class="refresh-captcha "
                        style="width: 40px; height: 40px; font-size: 16px; padding: 0; line-height: 0; border-radius: 50%;">🔄</button>

                    <!-- CAPTCHA Input -->
                    <input type="text" name="captcha" class="form-control" placeholder="Enter Captcha" required
                        style="max-width: 120px; margin-right: 10px;">
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


<!-- JavaScript for City Autocomplete -->
<script>
    // List of Cities
    const cities = [
        "Mumbai", "Delhi", "Bangalore", "Hyderabad", "Ahmedabad", "Chennai", "Kolkata", "Surat",
        "Pune", "Jaipur", "Lucknow", "Kanpur", "Nagpur", "Indore", "Thane", "Bhopal", "Visakhapatnam",
        "Pimpri-Chinchwad", "Patna", "Vadodara", "Ghaziabad", "Ludhiana", "Agra", "Nashik",
        "Ranchi", "Faridabad", "Meerut", "Rajkot", "Kalyan-Dombivli", "Vasai-Virar", "Varanasi",
        "Srinagar", "Aurangabad", "Dhanbad", "Amritsar", "Navi Mumbai", "Allahabad", "Howrah",
        // Andhra Pradesh
        "Vijayawada", "Guntur", "Nellore", "Tirupati", "Kurnool", "Kakinada", "Rajahmundry",
        // Arunachal Pradesh
        "Itanagar", "Naharlagun", "Pasighat",
        // Assam
        "Guwahati", "Dibrugarh", "Silchar", "Jorhat", "Tinsukia",
        // Bihar
        "Gaya", "Bhagalpur", "Muzaffarpur", "Purnia", "Darbhanga",
        // Chhattisgarh
        "Raipur", "Bilaspur", "Korba", "Durg-Bhilai", "Jagdalpur",
        // Goa
        "Panaji", "Margao", "Vasco da Gama", "Mapusa",
        // Gujarat
        "Rajkot", "Bhavnagar", "Jamnagar", "Junagadh", "Gandhinagar",
        // Haryana
        "Gurgaon", "Panipat", "Ambala", "Yamunanagar", "Hisar",
        // Himachal Pradesh
        "Shimla", "Dharamshala", "Solan", "Mandi",
        // Jammu and Kashmir
        "Jammu", "Baramulla", "Udhampur",
        // Jharkhand
        "Jamshedpur", "Hazaribagh", "Bokaro",
        // Karnataka
        "Mysore", "Hubli-Dharwad", "Belgaum", "Mangalore", "Gulbarga",
        // Kerala
        "Thiruvananthapuram", "Kochi", "Kozhikode", "Kollam", "Kannur",
        // Madhya Pradesh
        "Gwalior", "Jabalpur", "Ujjain", "Sagar", "Dewas",
        // Maharashtra
        "Nagpur", "Nashik", "Aurangabad", "Solapur", "Jalgaon",
        // Manipur
        "Imphal",
        // Meghalaya
        "Shillong", "Tura",
        // Mizoram
        "Aizawl", "Lunglei",
        // Nagaland
        "Kohima", "Dimapur",
        // Odisha
        "Bhubaneswar", "Cuttack", "Rourkela", "Berhampur", "Sambalpur",
        // Punjab
        "Ludhiana", "Amritsar", "Jalandhar", "Patiala", "Bathinda",
        // Rajasthan
        "Jodhpur", "Kota", "Ajmer", "Udaipur", "Bikaner",
        // Sikkim
        "Gangtok",
        // Tamil Nadu
        "Coimbatore", "Madurai", "Salem", "Tiruchirappalli", "Erode",
        // Telangana
        "Warangal", "Karimnagar", "Nizamabad",
        // Tripura
        "Agartala",
        // Uttar Pradesh
        "Agra", "Varanasi", "Meerut", "Bareilly", "Aligarh",
        // Uttarakhand
        "Dehradun", "Haridwar", "Rishikesh",
        // West Bengal
        "Asansol", "Durgapur", "Siliguri", "Kharagpur",
        // States
        "Andhra Pradesh",
        "Arunachal Pradesh",
        "Assam",
        "Bihar",
        "Chhattisgarh",
        "Goa",
        "Gujarat",
        "Haryana",
        "Himachal Pradesh",
        "Jharkhand",
        "Karnataka",
        "Kerala",
        "Madhya Pradesh",
        "Maharashtra",
        "Manipur",
        "Meghalaya",
        "Mizoram",
        "Nagaland",
        "Odisha",
        "Punjab",
        "Rajasthan",
        "Sikkim",
        "Tamil Nadu",
        "Telangana",
        "Tripura",
        "Uttar Pradesh",
        "Uttarakhand",
        "West Bengal",

        // Union Territories
        "Andaman and Nicobar Islands",
        "Chandigarh",
        "Dadra and Nagar Haveli and Daman and Diu",
        // "Delhi",
        "noida",
        "Jammu and Kashmir",
        "Ladakh",
        "Lakshadweep",
        "Puducherry"
    ];


    // Show Suggestions
    function showCitySuggestions() {
        const input = document.getElementById("city").value.toLowerCase();
        const suggestionsBox = document.getElementById("city-suggestions");
        suggestionsBox.innerHTML = "";

        if (input.length > 0) {
            const filteredCities = cities.filter(city => city.toLowerCase().startsWith(input));
            if (filteredCities.length > 0) {
                filteredCities.forEach(city => {
                    const suggestion = document.createElement("div");
                    suggestion.className = "suggestion";
                    suggestion.textContent = city;
                    suggestion.onclick = () => {
                        document.getElementById("city").value = city;
                        suggestionsBox.innerHTML = "";
                    };
                    suggestionsBox.appendChild(suggestion);
                });
            } else {
                suggestionsBox.innerHTML = "<div class='no-suggestions'>No suggestions found</div>";
            }
        }
    }
</script>

<!-- CSS for Suggestions -->
<style>
    .autocomplete-suggestions {
        position: absolute;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 5px;
        max-height: 150px;
        overflow-y: auto;
        z-index: 1000;
        width: 100%;
        margin-top: 5px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .suggestion {
        padding: 8px;
        cursor: pointer;
        font-size: 0.9rem;
    }

    .suggestion:hover {
        background-color: #f0f0f0;
    }

    .no-suggestions {
        padding: 8px;
        color: #888;
        font-style: italic;
    }

    .position-relative {
        position: relative;
    }
</style>










<style>
    /* General Styles */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
    }

    /* Slider Container */
    .slider-container {
        display: flex;
        flex-wrap: wrap;
        /* background: linear-gradient(135deg, #42a5f5, #1e88e5); */
        background-color: #6ec1e4;
        padding: 40px 20px;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        align-items: flex-start;
        justify-content: space-between;
        gap: 20px;
    }

    .slider-content {
        flex: 1 1 60%;
        padding: 20px;
        color: #000;
        width: 100%;
    }

    .slider-content h1 {
        font-size: 2.5rem;
        margin-bottom: 10px;
        font-weight: bold;
        text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
    }

    .slider-content p {
        font-size: 1.1rem;
        margin-bottom: 20px;
        color: #f1f1f1;
    }

    /* Form Styling */
    .slider-form,
    .employer-form {
        background-color: #ffffff;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .slider-form {
        width: 100%;
    }

    /* Employer Form Styling */
    .employer-form {
        max-width: 400px;
        /* Slightly increased width */
        margin: 0 auto;
        padding: 15px;
        /* Reduced padding */
        font-size: 0.9rem;
        background-color: #f8f9fa;
        line-height: 1.2;
        /* Reduced line height for compact look */
    }

    .employer-form label {
        font-weight: bold;
        font-size: 0.85rem;
        margin-bottom: 4px;
        display: block;
    }

    .employer-form input,
    .employer-form textarea,
    .employer-form select {
        width: 100%;
        padding: 6px;
        /* Reduced padding */
        font-size: 0.85rem;
        border: 1px solid #ccc;
        border-radius: 6px;
        margin-bottom: 8px;
        /* Compact spacing */
        background-color: #f9f9f9;
        transition: border-color 0.3s ease;
        height: 35px;
        /* Adjusted height of input fields */
    }

    .employer-form textarea {
        height: 50px;
        /* Reduced height for textarea */
        resize: none;
        /* Prevent resizing */
    }

    .employer-form input:focus,
    .employer-form textarea:focus,
    .employer-form select:focus {
        border-color: #42a5f5;
        outline: none;
        background-color: #fff;
    }

    .employer-form button {
        /* background-color: #ffcc00; */
        color: #000;
        border: none;
        cursor: pointer;
        font-weight: bold;
        border-radius: 6px;
        padding: 8px;
        /* Reduced button padding */
        font-size: 0.85rem;
        transition: background-color 0.3s ease, transform 0.3s ease;
        width: 100%;
    }

    .employer-form button:hover {
        background-color: #ff9900;
        transform: translateY(-3px);
    }

    /* Sidebar Styling */
    .slider-sidebar {
        flex: 1 1 30%;
        display: flex;
        justify-content: center;
        align-items: flex-start;
    }

    .sidebar-content {
        background-color: #fff;
        padding: 15px;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        width: 100%;
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

        .employer-form {
            max-width: 90%;
        }
    }

    @media screen and (max-width: 576px) {
        .slider-content h1 {
            font-size: 1rem;
        }

        .slider-form input,
        .slider-form select,
        .employer-form input,
        .employer-form select,
        .employer-form textarea {
            font-size: 0.8rem;
            padding: 5px;
        }

        .slider-form button,
        .employer-form button {
            font-size: 0.8rem;
            padding: 7px;
        }

        .employer-form textarea {
            height: 40px;
            /* Further reduced textarea height for small screens */
        }
    }
</style>