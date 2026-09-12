<?php
// locations.php - city and country coverage. Internal links to every
// location landing page, which is where most of this site's search
// traffic arrives.
if (!function_exists('hp_img')) { require_once __DIR__ . '/media.php'; }
$hp_p3 = (strpos($_SERVER['PHP_SELF'], '/blog/') !== false) ? '/' : '';

$hp_loc = array(
  array('key' => 'city_delhi',      'country' => 'India', 'name' => 'Delhi NCR',  'href' => 'recruitment-agency-in-delhi-and-placement-consultants-in-delhi-ncr-job-placement-consultacy.php'),
  array('key' => 'city_mumbai',     'country' => 'India', 'name' => 'Mumbai',     'href' => 'placement-Agency-in-mumbai.php'),
  array('key' => 'city_hyderabad',  'country' => 'India', 'name' => 'Hyderabad',  'href' => 'placement-Agency-in-hyderabad.php'),
  array('key' => 'city_uae',        'country' => 'UAE',   'name' => 'Ajman and the Emirates', 'href' => 'contact.php'),
  array('key' => 'city_chandigarh', 'country' => 'India', 'name' => 'Chandigarh', 'href' => 'placement-Agency-in-chandigarh.php'),
  array('key' => 'city_kolkata',    'country' => 'India', 'name' => 'Kolkata',    'href' => 'placement-Agency-in-kolkata.php'),
  array('key' => 'city_lucknow',    'country' => 'India', 'name' => 'Lucknow',    'href' => 'placement-Agency-in-lucknow.php'),
  array('key' => 'city_consultants','country' => 'India', 'name' => 'Hospital job consultants, Delhi NCR', 'href' => 'hospital-job-consultants-delhi-ncr-india.php'),
);
?>
<section class="hp-section" aria-labelledby="locations-title">
  <div class="hp-wrap">
    <div class="hp-head">
      <p class="hp-eyebrow hp-rise">
        <i class="fa-solid fa-earth-asia" aria-hidden="true"></i> Where we work
      </p>
      <h2 class="hp-h2 hp-rise" id="locations-title">Hiring desks in India, now open in the UAE</h2>
      <p class="hp-lead hp-rise">Our consultants know the pay bands, the registration rules and the commute realities of each market. Pick your city to see local roles and local rates.</p>
    </div>

    <div class="hp-places" style="margin-top:44px;">
      <?php foreach ($hp_loc as $l): ?>
      <a class="hp-place hp-rise" href="<?php echo $hp_p3 . $l['href']; ?>">
        <img src="<?php echo hp_img($l['key'], 520); ?>"
             data-fallback="<?php echo hp_img_fallback($l['key']); ?>"
             alt="<?php echo hp_img_alt($l['key']); ?>"
             width="520" height="420" loading="lazy" decoding="async">
        <span class="hp-place__on">
          <span class="hp-place__c"><?php echo $l['country']; ?></span>
          <span class="hp-place__n"><?php echo $l['name']; ?></span>
          <span class="hp-place__g">View local roles <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></span>
        </span>
      </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>
