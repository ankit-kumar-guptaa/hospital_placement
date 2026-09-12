<?php
/**
 * slider.php - hero band. Shared by the home page and the landing pages.
 *
 * The two forms below are spliced in unchanged: every field name, id, option
 * value, form action and method is exactly as the backend expects. Only the
 * wrapper markup and styling are new, plus one placeholder option LABEL that
 * carried an em dash.
 *
 * A page may set $hero_eyebrow / $hero_title / $hero_lead before including
 * this file to override the copy. Defaults are the home page copy.
 */
$hero_eyebrow = isset($hero_eyebrow) ? $hero_eyebrow : 'Healthcare recruitment worldwide since 2010';
$hero_title   = isset($hero_title)   ? $hero_title   : 'We staff hospitals <span class="hp-mark">anywhere in the world</span>';
$hero_lead    = isset($hero_lead)    ? $hero_lead    : 'Doctors, nurses and paramedical teams placed across India, the Gulf and international markets. ISO 9001:2000 certified.';
$hp_pp        = (strpos($_SERVER['PHP_SELF'], '/blog/') !== false) ? '/' : '';

if (!function_exists('hp_img')) { require_once __DIR__ . '/media.php'; }

/* Hero slider: one slide per role family we recruit for. */
$hero_slides = array(
  array('key' => 'hero_doctors',     't' => 'Doctors and consultants',   'd' => 'Physicians, surgeons and super-specialists across every major department.'),
  array('key' => 'hero_nurses',      't' => 'Nursing teams',             'd' => 'ICU, theatre, ward and speciality nursing, from staff nurse to nurse manager.'),
  array('key' => 'hero_paramedical', 't' => 'Paramedical and diagnostics', 'd' => 'Laboratory, radiology, dialysis and cardiac technicians.'),
  array('key' => 'hero_theatre',     't' => 'Whole department builds',   'd' => 'New units and greenfield hospitals staffed end to end.'),
);
?>

<section class="hp-hero" aria-labelledby="hero-title">
  <div class="hp-wrap hp-hero__grid">

    <div class="hp-hero__copy">
      <p class="hp-eyebrow hp-rise">
        <i class="fa-solid fa-certificate" aria-hidden="true"></i>
        <?php echo $hero_eyebrow; ?>
      </p>

      <h1 class="hp-h1 hp-hero__h1 hp-rise" id="hero-title"><?php echo $hero_title; ?></h1>

      <p class="hp-lead hp-hero__lead hp-rise"><?php echo $hero_lead; ?></p>

      <div class="hp-hero__cta hp-rise">
        <a class="hp-btn hp-btn--action" href="<?php echo $hp_pp; ?>contact.php">Hire staff</a>
        <a class="hp-btn hp-btn--ghost" href="<?php echo $hp_pp; ?>jobs.php">Browse jobs</a>
      </div>

      <div class="hp-slider hp-rise" data-hero-slider aria-roledescription="carousel"
           aria-label="The healthcare roles we recruit for">
        <?php foreach ($hero_slides as $i => $sl): ?>
        <div class="hp-slide<?php echo $i === 0 ? ' is-on' : ''; ?>" data-hero-slide
             role="group" aria-roledescription="slide"
             aria-label="<?php echo ($i + 1) . ' of ' . count($hero_slides); ?>">
          <img src="<?php echo hp_img($sl['key'], 1000); ?>"
               data-fallback="<?php echo hp_img_fallback($sl['key']); ?>"
               alt="<?php echo hp_img_alt($sl['key']); ?>"
               width="1000" height="563"
               <?php echo $i === 0 ? 'fetchpriority="high"' : 'loading="lazy"'; ?> decoding="async">
          <span class="hp-slide__cap">
            <span>
              <span class="hp-slide__t"><?php echo $sl['t']; ?></span>
              <span class="hp-slide__d"><?php echo $sl['d']; ?></span>
            </span>
          </span>
        </div>
        <?php endforeach; ?>

        <div class="hp-slider__pips">
          <?php foreach ($hero_slides as $i => $sl): ?>
          <button type="button" data-hero-pip
                  aria-current="<?php echo $i === 0 ? 'true' : 'false'; ?>"
                  aria-label="Show <?php echo htmlspecialchars($sl['t'], ENT_QUOTES, 'UTF-8'); ?>"></button>
          <?php endforeach; ?>
        </div>
      </div>
    </div>

    <div class="hp-formcard hp-rise" data-rise-delay="120">
      <div class="hp-formcard__tabs" role="tablist" aria-label="What brings you here">
        <button type="button" class="hp-tab" role="tab" id="hp-tab-employer"
                aria-controls="hp-employer" aria-selected="true" tabindex="0">
          <i class="fa-solid fa-hospital-user" aria-hidden="true"></i> I am hiring
        </button>
        <button type="button" class="hp-tab" role="tab" id="hp-tab-jobseeker"
                aria-controls="hp-jobseeker" aria-selected="false" tabindex="-1">
          <i class="fa-solid fa-user-doctor" aria-hidden="true"></i> I want a job
        </button>
      </div>

      <div class="hp-formcard__body" id="hp-employer" role="tabpanel"
           aria-labelledby="hp-tab-employer">
        <h2 class="hp-h3 hp-formcard__title">Tell us who you need</h2>
        <p class="hp-formcard__sub">A consultant replies within one working day.</p>

          <form action="employer_form_submission.php" method="post" class="employer-form hp-form">
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
          <textarea id="remarks" name="remarks" class="form-control"
          placeholder="Remarks (Hiring For / Budget, etc.)" rows="2" required></textarea>
          </div>

          <!-- reCAPTCHA v3 hidden input -->
          <input type="hidden" name="g-recaptcha-response" id="employer-recaptcha-response">

          <button style="background-color: #ffcc00;" type="submit" name="submit"
          class="btn btn-primary w-100">Submit</button>
          </form>

        <p class="hp-form-note">
          <i class="fa-solid fa-lock" aria-hidden="true"></i>
          Your details stay with our recruitment team. No listing fee, no obligation.
        </p>
      </div>

      <div class="hp-formcard__body" id="hp-jobseeker" role="tabpanel"
           aria-labelledby="hp-tab-jobseeker" hidden>
        <h2 class="hp-h3 hp-formcard__title">Find your next role</h2>
        <p class="hp-formcard__sub">Register once. We match you against live hospital vacancies.</p>

          <form action="backend_job_seeker.php" method="post" class="slider-form hp-form">
          <!-- Role Selection -->
          <div class="mb-3">
          <label for="role" class="form-label">I'm a</label>
          <select id="role" name="role" class="form-select" required onchange="showFields()">
          <option value="" disabled selected>Select your role</option>
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
          <label for="doctor-department" class="form-label">Department</label>
          <select id="doctor-department" name="department" class="form-select">
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
          <div class="col-md-6">
          <label for="doctor-qualification" class="form-label">Qualification</label>
          <select id="doctor-qualification" name="qualification" class="form-select">
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
          <div class="col-md-6">
          <label for="nurse-department" class="form-label">Department</label>
          <select id="nurse-department" name="department" class="form-select">
          <option value="" disabled selected>Select Department</option>
          <option value="Anaesthesiology">Anaesthesiology</option>
          <!-- <option value="Critical-care / ICU">Critical-care / ICU</option> -->
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
          <div class="col-md-6">
          <label for="nurse-qualification" class="form-label">Qualification</label>
          <select id="nurse-qualification" name="qualification" class="form-select">
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

          <!-- Repeat similar structure for other roles (Pharma, Diagnostics, Administrative) -->
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



          <p class="hp-form-legend">Personal info</p>
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

          <!-- CAPTCHA Container -->
          <!-- <div class="mb-3 captcha-container">

          <div class="d-flex align-items-center mb-2">

          <img src="captcha.php" alt="CAPTCHA Image" class="captcha-image"
          style="max-width: 150px; height: auto; margin-right: 10px;">


          <button type="button" class="refresh-captcha btn btn-light"
          style="width: 40px; height: 40px; font-size: 16px; padding: 0; line-height: 0; border-radius: 50%; background-color:aliceblue;">🔄</button>
          </div>


          <div>
          <input type="text" name="captcha" class="form-control" placeholder="Enter Captcha" required
          style="max-width: 100%;">
          </div>
          </div> -->

          <!-- reCAPTCHA v3 hidden input -->
          <input type="hidden" name="g-recaptcha-response" id="jobseeker-recaptcha-response">


          <button type="submit" name="submit" class="btn btn-warning w-100">Submit</button>
          </form>

        <p class="hp-form-note">
          <i class="fa-solid fa-lock" aria-hidden="true"></i>
          Registration is free for candidates. We never charge job seekers a placement fee.
        </p>
      </div>
    </div>

  </div>
</section>

<script>
    // Captcha refresh, kept from the original markup for the commented-out
    // image captcha so nothing breaks if it is switched back on.
    document.querySelectorAll('.refresh-captcha').forEach(function (button) {
        button.addEventListener('click', function () {
            const captchaImage = this.parentElement.querySelector('.captcha-image');
            if (captchaImage) {
                captchaImage.src = 'captcha.php?' + new Date().getTime();
            }
        });
    });
</script>

<script>
    // Role-driven field visibility. Unchanged behaviour and element ids.
    function showFields() {
        var role = document.getElementById('role').value;
        var doctorFields = document.getElementById('doctor-fields');
        var nurseFields = document.getElementById('nurse-fields');
        var pharmaFields = document.getElementById('pharma-fields');
        var diagnosticsFields = document.getElementById('diagnostics-fields');
        var administrativeFields = document.getElementById('administrative-fields');

        doctorFields.style.display = 'none';
        nurseFields.style.display = 'none';
        pharmaFields.style.display = 'none';
        diagnosticsFields.style.display = 'none';
        administrativeFields.style.display = 'none';

        if (role === 'doctor') {
            doctorFields.style.display = 'block';
        } else if (role === 'nurse') {
            nurseFields.style.display = 'block';
        } else if (role === 'Pharma') {
            pharmaFields.style.display = 'block';
        } else if (role === 'Diagnostics') {
            diagnosticsFields.style.display = 'block';
        } else if (role === 'Administrative') {
            administrativeFields.style.display = 'block';
        }
    }
</script>
