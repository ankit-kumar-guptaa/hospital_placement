<?php
/**
 * topbar.php - the market strip above the header.
 *
 * India, UAE, USA and Europe are the four markets we recruit into, so they
 * sit at the very top of every page. Each one jumps to the coverage section
 * on the India page, which is where the market detail and the city links
 * live, so the strip adds internal links rather than dead anchors.
 *
 * The India city pages stay in the header's Locations menu untouched: they
 * are the pages that rank, and moving them would cost that.
 */
if (!function_exists('hp_url')) require_once __DIR__ . '/pages.php';

$hp_markets = array(
  array('India',  'fa-location-dot', hp_url('hospital-recruitment-agency-in-india.php')),
  array('UAE',    'fa-location-dot', hp_url('contact.php')),
  array('USA',    'fa-location-dot', hp_url('contact.php')),
  array('Europe', 'fa-location-dot', hp_url('contact.php')),
);
?>
<div class="hp-topbar">
  <div class="hp-wrap hp-topbar__in">

    <nav class="hp-topbar__markets" aria-label="Markets we recruit in">
      <span class="hp-topbar__k">Hiring in</span>
      <ul>
        <?php foreach ($hp_markets as $m): ?>
        <li><a href="<?php echo $m[2]; ?>"><?php echo $m[0]; ?></a></li>
        <?php endforeach; ?>
      </ul>
    </nav>

    <div class="hp-topbar__contact">
      <!-- <a href="tel:+919871916980">
        <i class="fa-solid fa-phone" aria-hidden="true"></i>
        <span class="hp-topbar__cc">India</span> +91 98719 16980
      </a> -->
      <a href="tel:+971582348005">
        <i class="fa-solid fa-phone" aria-hidden="true"></i>
        <span class="hp-topbar__cc">UAE</span> +971 58 234 8005
      </a>
      <a href="mailto:info@hospitalplacement.com" class="hp-topbar__mail">
        <i class="fa-solid fa-envelope" aria-hidden="true"></i>
        info@hospitalplacement.com
      </a>
    </div>
  </div>
</div>
