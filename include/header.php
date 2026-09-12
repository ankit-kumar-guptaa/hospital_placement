<?php
// header.php - site header. Shared by every page.
// URLs and slugs are unchanged; only the presentation and the grouping of
// links are new. $hp_p prefixes root links correctly from inside /blog/.
$hp_p    = (strpos($_SERVER['PHP_SELF'], '/blog/') !== false) ? '/' : '';
$hp_self = basename($_SERVER['PHP_SELF']);
$hp_blog = (strpos($_SERVER['PHP_SELF'], '/blog/') !== false);

/** Marks the current page in the nav. */
function hp_is($files) {
    global $hp_self;
    return in_array($hp_self, (array) $files, true);
}

$hp_services = array(
    array('doctor-placement-services.php',            'fa-user-doctor',     'Doctor Placement',            'Consultants, residents and super-specialists'),
    array('nurse-staffing-agency-india.php',          'fa-user-nurse',      'Nurse Staffing',              'ICU, OT, ward and speciality nursing'),
    array('paramedical-recruitment-agency.php',       'fa-microscope',      'Paramedical Recruitment',     'Lab, radiology, dialysis and OT technicians'),
    array('specialty-placement.php',                  'fa-stethoscope',     'Specialty Placements',        'Hard to fill clinical and super-speciality roles'),
    array('permanent-placement.php',                  'fa-file-signature',  'Permanent Placement',         'Full time hires on a pay on success model'),
    array('temporary-staffing-services.php',          'fa-clock-rotate-left','Temporary Staffing',         'Locum, contract and short notice cover'),
    array('healthcare-recruitment-for-hospitals.php', 'fa-hospital',        'Recruitment for Hospitals',   'Whole department and greenfield hiring'),
    array('hospital-recruitment-agency-in-india.php', 'fa-building-shield', 'Recruitment Agency in India', 'Nationwide hospital hiring coverage'),
);

$hp_places = array(
    array('recruitment-agency-in-delhi-and-placement-consultants-in-delhi-ncr-job-placement-consultacy.php', 'Delhi NCR',   'India'),
    array('placement-Agency-in-mumbai.php',      'Mumbai',      'India'),
    array('placement-Agency-in-hyderabad.php',   'Hyderabad',   'India'),
    array('placement-Agency-in-chandigarh.php',  'Chandigarh',  'India'),
    array('placement-Agency-in-kolkata.php',     'Kolkata',     'India'),
    array('placement-Agency-in-lucknow.php',     'Lucknow',     'India'),
    array('hospital-job-consultants-delhi-ncr-india.php', 'Hospital Job Consultants, Delhi NCR', 'India'),
);

$hp_service_files = array();
foreach ($hp_services as $s) { $hp_service_files[] = $s[0]; }
$hp_place_files = array();
foreach ($hp_places as $s) { $hp_place_files[] = $s[0]; }
?>

<a class="hp-skip" href="#main">Skip to main content</a>

<header class="hp-header" id="main-header">
  <div class="hp-wrap hp-header__bar">

    <a class="hp-logo" href="<?php echo $hp_p ?: '/'; ?>" aria-label="HospitalPlacement.com home">
      <img src="https://hosptal.hospitalplacement.com/wp-content/uploads/2021/05/logo-220.jpg"
           alt="HospitalPlacement.com, global healthcare recruitment agency"
           width="119" height="52">
    </a>

    <nav class="hp-nav" aria-label="Primary">
      <ul class="hp-nav__list">

        <li class="hp-nav__item">
          <a class="hp-nav__link<?php echo (!$hp_blog && ($hp_self === 'index.php')) ? ' is-active' : ''; ?>"
             href="<?php echo $hp_p ?: '/'; ?>">Home</a>
        </li>

        <li class="hp-nav__item">
          <a class="hp-nav__link<?php echo hp_is('about.php') ? ' is-active' : ''; ?>"
             href="<?php echo $hp_p; ?>about.php">About Us</a>
        </li>

        <li class="hp-nav__item hp-nav__item--has-mega">
          <button type="button" class="hp-nav__link<?php echo hp_is($hp_service_files) ? ' is-active' : ''; ?>"
                  aria-expanded="false" aria-haspopup="true">
            Services <i class="fa-solid fa-chevron-down" aria-hidden="true"></i>
          </button>
          <div class="hp-mega">
            <ul class="hp-mega__grid">
              <?php foreach ($hp_services as $s): ?>
              <li>
                <a class="hp-mega__link" href="<?php echo $hp_p . $s[0]; ?>">
                  <span class="hp-mega__ico"><i class="fa-solid <?php echo $s[1]; ?>" aria-hidden="true"></i></span>
                  <span>
                    <span class="hp-mega__t"><?php echo $s[2]; ?></span>
                    <span class="hp-mega__d"><?php echo $s[3]; ?></span>
                  </span>
                </a>
              </li>
              <?php endforeach; ?>
            </ul>
            <div class="hp-mega__foot">
              <p>Hiring for a department or a whole new unit?</p>
              <a class="hp-link" href="<?php echo $hp_p; ?>contact.php">Hire staff <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
            </div>
          </div>
        </li>

        <li class="hp-nav__item hp-nav__item--has-mega">
          <button type="button" class="hp-nav__link<?php echo hp_is($hp_place_files) ? ' is-active' : ''; ?>"
                  aria-expanded="false" aria-haspopup="true">
            Locations <i class="fa-solid fa-chevron-down" aria-hidden="true"></i>
          </button>
          <div class="hp-mega">
            <ul class="hp-mega__grid">
              <?php foreach ($hp_places as $s): ?>
              <li>
                <a class="hp-mega__link" href="<?php echo $hp_p . $s[0]; ?>">
                  <span class="hp-mega__ico"><i class="fa-solid fa-location-dot" aria-hidden="true"></i></span>
                  <span>
                    <span class="hp-mega__t"><?php echo $s[1]; ?></span>
                    <span class="hp-mega__d"><?php echo $s[2]; ?></span>
                  </span>
                </a>
              </li>
              <?php endforeach; ?>
            </ul>
            <div class="hp-mega__foot">
              <p>Hiring for hospitals in India, the Gulf and overseas.</p>
              <a class="hp-link" href="<?php echo $hp_p; ?>contact.php">Hire staff <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
            </div>
          </div>
        </li>

        <li class="hp-nav__item">
          <a class="hp-nav__link<?php echo hp_is('solutions.php') ? ' is-active' : ''; ?>"
             href="<?php echo $hp_p; ?>solutions.php">Solutions</a>
        </li>

        <li class="hp-nav__item">
          <a class="hp-nav__link<?php echo hp_is('jobs.php') ? ' is-active' : ''; ?>"
             href="<?php echo $hp_p; ?>jobs.php">Jobs</a>
        </li>

        <li class="hp-nav__item">
          <a class="hp-nav__link<?php echo $hp_blog ? ' is-active' : ''; ?>"
             href="<?php echo $hp_p; ?>blog/">Blog</a>
        </li>

        <li class="hp-nav__item">
          <a class="hp-nav__link<?php echo hp_is('contact.php') ? ' is-active' : ''; ?>"
             href="<?php echo $hp_p; ?>contact.php">Contact Us</a>
        </li>
      </ul>
    </nav>

    <div class="hp-header__cta">
      <a class="hp-call" href="tel:+919871916980">
        <span class="hp-call__ico"><i class="fa-solid fa-phone" aria-hidden="true"></i></span>
        <span>
          <span class="hp-call__k">India</span>
          <span class="hp-call__v">+91 98719 16980</span>
        </span>
      </a>

      <a class="hp-btn hp-btn--action hp-btn--sm" href="<?php echo $hp_p; ?>contact.php">Hire staff</a>

      <button type="button" class="hp-burger" aria-expanded="false"
              aria-controls="hp-drawer" aria-label="Open menu">
        <span class="hp-burger__box" aria-hidden="true"><span></span><span></span><span></span></span>
      </button>
    </div>
  </div>
</header>

<div class="hp-scrim" aria-hidden="true"></div>

<div class="hp-drawer" id="hp-drawer">
  <ul class="hp-drawer__list">
    <li><a class="hp-drawer__link<?php echo (!$hp_blog && $hp_self === 'index.php') ? ' is-active' : ''; ?>" href="<?php echo $hp_p ?: '/'; ?>">Home</a></li>
    <li><a class="hp-drawer__link<?php echo hp_is('about.php') ? ' is-active' : ''; ?>" href="<?php echo $hp_p; ?>about.php">About Us</a></li>

    <li>
      <button type="button" class="hp-drawer__link" aria-expanded="false">
        Services <i class="fa-solid fa-chevron-down" aria-hidden="true"></i>
      </button>
      <div class="hp-drawer__sub"><div>
        <?php foreach ($hp_services as $s): ?>
        <a href="<?php echo $hp_p . $s[0]; ?>"><?php echo $s[2]; ?></a>
        <?php endforeach; ?>
      </div></div>
    </li>

    <li>
      <button type="button" class="hp-drawer__link" aria-expanded="false">
        Locations <i class="fa-solid fa-chevron-down" aria-hidden="true"></i>
      </button>
      <div class="hp-drawer__sub"><div>
        <?php foreach ($hp_places as $s): ?>
        <a href="<?php echo $hp_p . $s[0]; ?>"><?php echo $s[1]; ?></a>
        <?php endforeach; ?>
      </div></div>
    </li>

    <li><a class="hp-drawer__link<?php echo hp_is('solutions.php') ? ' is-active' : ''; ?>" href="<?php echo $hp_p; ?>solutions.php">Solutions</a></li>
    <li><a class="hp-drawer__link<?php echo hp_is('jobs.php') ? ' is-active' : ''; ?>" href="<?php echo $hp_p; ?>jobs.php">Jobs</a></li>
    <li><a class="hp-drawer__link<?php echo $hp_blog ? ' is-active' : ''; ?>" href="<?php echo $hp_p; ?>blog/">Blog</a></li>
    <li><a class="hp-drawer__link<?php echo hp_is('contact.php') ? ' is-active' : ''; ?>" href="<?php echo $hp_p; ?>contact.php">Contact Us</a></li>
  </ul>

  <div class="hp-drawer__foot">
    <a class="hp-btn hp-btn--action hp-btn--block" href="<?php echo $hp_p; ?>contact.php">Hire staff</a>
    <a class="hp-btn hp-btn--ghost hp-btn--block" href="<?php echo $hp_p; ?>jobs.php">Browse jobs</a>
  </div>

  <div class="hp-drawer__phones">
    <a class="hp-call" href="tel:+919871916980">
      <span class="hp-call__ico"><i class="fa-solid fa-phone" aria-hidden="true"></i></span>
      <span><span class="hp-call__k">India</span><span class="hp-call__v">+91 98719 16980</span></span>
    </a>
    <a class="hp-call" href="tel:+971582348005">
      <span class="hp-call__ico"><i class="fa-solid fa-phone" aria-hidden="true"></i></span>
      <span><span class="hp-call__k">UAE</span><span class="hp-call__v">+971 58 234 8005</span></span>
    </a>
  </div>
</div>
