<?php
/**
 * specializations.php - the five healthcare categories from the brand deck.
 * Replaces the plain-text service list the deck flags as "generic".
 */
$hp_ps = (strpos($_SERVER['PHP_SELF'], '/blog/') !== false) ? '/' : '';

$hp_specs = array(
  array('doctor-placement-services.php',      'fa-user-doctor',  'c1', 'Doctors',
        'Specialists | Consultants | General Practitioners'),
  array('nurse-staffing-agency-india.php',    'fa-user-nurse',   'c2', 'Nurses',
        'Staff Nurses | Nursing Supervisors'),
  array('paramedical-recruitment-agency.php', 'fa-microscope',   'c3', 'Paramedical Staff',
        'Lab Technicians | Radiologists | Physiotherapists'),
  array('specialty-placement.php',            'fa-pills',        'c4', 'Pharma',
        'Pharmacists | Sales &amp; Medical Representatives'),
  array('temporary-staffing-services.php',    'fa-hospital-user','c5', 'Hospital Administration',
        'Operations | HR | Front Office'),
);
?>
<section class="hp-section" aria-labelledby="spec-title">
  <div class="hp-wrap">
    <div class="hp-head hp-head--center">
      <h2 class="hp-h2 hp-rise" id="spec-title">Our Specializations</h2>
      <p class="hp-lead hp-rise">We recruit across a wide range of healthcare roles and departments.</p>
    </div>

    <ul class="hp-specs" style="margin-top:44px;">
      <?php foreach ($hp_specs as $sp): ?>
      <li class="hp-rise">
        <a class="hp-spec" href="<?php echo $hp_ps . $sp[0]; ?>">
          <span class="hp-spec__ico hp-spec__ico--<?php echo $sp[2]; ?>">
            <i class="fa-solid <?php echo $sp[1]; ?>" aria-hidden="true"></i>
          </span>
          <span class="hp-spec__t"><?php echo $sp[3]; ?></span>
          <span class="hp-spec__d"><?php echo $sp[4]; ?></span>
        </a>
      </li>
      <?php endforeach; ?>
    </ul>
  </div>
</section>
