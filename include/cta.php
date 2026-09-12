<?php
// cta.php - closing conversion band. One CTA label per intent, matching
// the header and the hero.
$hp_p5 = (strpos($_SERVER['PHP_SELF'], '/blog/') !== false) ? '/' : '';
?>
<section class="hp-section" aria-labelledby="cta-title">
  <div class="hp-wrap">
    <div class="hp-cta hp-rise">
      <h2 class="hp-h2" id="cta-title">Tell us the post you cannot fill</h2>
      <p>Send the role, the city and the band. A consultant who recruits in that speciality will come back to you within one working day.</p>
      <div class="hp-cta__row">
        <a class="hp-btn hp-btn--action" href="<?php echo $hp_p5; ?>contact.php">Hire staff</a>
        <a class="hp-btn hp-btn--onDark" href="tel:+919871916980">
          <i class="fa-solid fa-phone" aria-hidden="true"></i> +91 98719 16980
        </a>
      </div>
      <p class="hp-cta__note">New Delhi and Ajman. UAE enquiries on +971 58 234 8005.</p>
    </div>
  </div>
</section>
