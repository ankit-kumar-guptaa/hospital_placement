<?php
require_once __DIR__ . '/pages.php';
/**
 * slider.php - the hero band, rebuilt to the brand deck.
 *
 * The deck's first finding is "two large forms dominate the first screen".
 * So the hero is now a full-bleed healthcare photograph, one headline, one
 * value line and the two journey CTAs. Both forms moved to include/forms.php
 * with every field untouched, and the CTAs link straight to them.
 *
 * A page may set $hero_eyebrow / $hero_title / $hero_lead before including
 * this file to override the copy. Defaults are the home page copy.
 */
if (!function_exists('hp_img')) { require_once __DIR__ . '/media.php'; }

$hp_pp      = (strpos($_SERVER['PHP_SELF'], '/blog/') !== false) ? '/' : '';
$hero_title = isset($hero_title) ? $hero_title
            : 'Healthcare Recruitment<br>Made <span class="hp-mark">Simple.</span>';
$hero_lead  = isset($hero_lead)  ? $hero_lead
            : 'Connecting hospitals with the right healthcare professionals, and helping candidates find the right opportunities.';
?>

<section class="hp-hero" aria-labelledby="hero-title">

  <div class="hp-hero__media" aria-hidden="true">
    <img src="/assets/img/hero.png"
         data-fallback="<?php echo hp_img_fallback('hero_team', 1800); ?>"
         alt="" width="1800" height="1013" fetchpriority="high" decoding="async">
  </div>

  <div class="hp-wrap hp-hero__inner">
    <div class="hp-hero__copy">
      <h1 class="hp-h1 hp-hero__h1 hp-rise" id="hero-title"><?php echo $hero_title; ?></h1>

      <p class="hp-lead hp-hero__lead hp-rise"><?php echo $hero_lead; ?></p>

      <div class="hp-choices hp-rise">
        <a class="hp-choice hp-choice--primary" href="<?php echo $hp_pp; ?>#hire"
           data-modal-open="hp-formmodal" data-modal-tab="hp-tab-employer">
          <span class="hp-choice__ico"><i class="fa-solid fa-hospital" aria-hidden="true"></i></span>
          <span class="hp-choice__txt">
            <span class="hp-choice__t">I am Hiring</span>
            <span class="hp-choice__s">For Hospitals</span>
          </span>
        </a>
        <a class="hp-choice" href="<?php echo $hp_pp; ?>#find-a-job"
           data-modal-open="hp-formmodal" data-modal-tab="hp-tab-jobseeker">
          <span class="hp-choice__ico"><i class="fa-solid fa-user-doctor" aria-hidden="true"></i></span>
          <span class="hp-choice__txt">
            <span class="hp-choice__t">I am Looking for a Job</span>
            <span class="hp-choice__s">For Candidates</span>
          </span>
        </a>
      </div>
    </div>
  </div>
</section>

<?php include __DIR__ . '/statbar.php'; ?>

<?php include __DIR__ . '/forms.php'; ?>
