<?php
require_once __DIR__ . '/pages.php';
/**
 * slider.php - the hero band.
 *
 * Two columns on the first screen. The left carries the headline, the value
 * line and the three things a visitor wants to know before they type. The
 * right carries the enquiry form itself, so hiring managers and candidates
 * can start without clicking anything first.
 *
 * The form is include/forms.php in its inline mode: one copy of the markup,
 * the same field ids the backend expects, rendered here as a card instead of
 * inside the dialog the inner pages use. It is included ONCE per page, which
 * is what keeps those ids unique.
 *
 * The deck's two journeys survive as the card's two tabs, so the choice
 * between "I am hiring" and "I am looking for a job" is still the first thing
 * on the page, only now it opens the fields rather than a dialog.
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

/* The three reasons to come to us rather than post the job yourself. Each is a
   claim plus the sentence that backs it up, because an unexplained claim on a
   landing page reads as filler, and because three one-line ticks left this
   column far shorter than the card beside it.

   Deliberately not the placement numbers: those are in the stat bar directly
   below, and saying them twice on one screen makes both say less. */
$hero_points = isset($hero_points) ? $hero_points : array(
    array('fa-bolt', 'Shortlists in days, not weeks',
          'A live bench in every speciality, so the first names reach you inside a week.'),
    array('fa-shield-halved', 'Checked before you see a CV',
          'Registration, qualifications, documents and references, verified up front.'),
    array('fa-hand-holding-heart', 'Free for candidates, always',
          'Hospitals pay our fee. The people we place never pay us anything.'),
);
?>

<section class="hp-hero" aria-labelledby="hero-title">

  <div class="hp-hero__media" aria-hidden="true">
    <img src="/assets/img/hero.png"
         data-fallback="<?php echo hp_img_fallback('hero_team', 1800); ?>"
         alt="" width="1800" height="1013" fetchpriority="high" decoding="async">
  </div>

  <div class="hp-wrap hp-hero__inner">

    <div class="hp-hero__copy">

      <p class="hp-hero__eyebrow hp-rise">
        <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
        <span>ISO 9001:2000 certified</span>
        <span class="hp-hero__eyebrow-more">recruiting for healthcare since 2010</span>
      </p>

      <h1 class="hp-h1 hp-hero__h1 hp-rise" id="hero-title"><?php echo $hero_title; ?></h1>

      <p class="hp-lead hp-hero__lead hp-rise"><?php echo $hero_lead; ?></p>

      <ul class="hp-hero__points hp-rise">
        <?php foreach ($hero_points as $pt): ?>
        <li>
          <span class="hp-hero__point-ico"><i class="fa-solid <?php echo $pt[0]; ?>" aria-hidden="true"></i></span>
          <span class="hp-hero__point-txt">
            <strong><?php echo $pt[1]; ?></strong>
            <span><?php echo $pt[2]; ?></span>
          </span>
        </li>
        <?php endforeach; ?>
      </ul>

      <p class="hp-hero__markets hp-rise">
        <span class="hp-hero__markets-k">Recruiting into</span>
        <span class="hp-hero__markets-v">India <i aria-hidden="true">&middot;</i> UAE <i aria-hidden="true">&middot;</i> USA <i aria-hidden="true">&middot;</i> Europe</span>
      </p>
    </div>

    <?php
    /* The form card. Rendered inline here, so the home page carries no dialog
       and there is exactly one copy of every field id on the page. */
    $hp_form_mode = 'inline';
    include __DIR__ . '/forms.php';
    ?>

  </div>
</section>

<?php include __DIR__ . '/statbar.php'; ?>
