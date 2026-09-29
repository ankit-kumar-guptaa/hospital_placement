<?php
/**
 * page-hero.php - the hero for every page that is not the home page.
 *
 * Deliberately not the home hero. Each page gets its own H1 carrying its own
 * target keyword, its own answer-first opening line, and its own photograph,
 * all read from include/pages.php.
 *
 * Two shapes:
 *
 *   The default is one centred column: crumbs, H1, lead, the two journey
 *   buttons, a trust line. The buttons open the enquiry dialog, which this
 *   file also brings in.
 *
 *   A market page (one carrying a 'market' key in the registry) gets the
 *   home page shape instead: the pitch on the left, the enquiry form itself
 *   in a card on the right. Those four pages are the ones a visitor lands on
 *   from an advert or a search for a country, and a form they can start
 *   without a click converts better than a button that opens one. The three
 *   points beside it come from that market's own entry in markets.php, and
 *   the trust line names that market's desk and its phone number.
 *
 * The form is include/forms.php, included ONCE per page either way: inline
 * for the market pages, wrapped in the dialog for everything else. That is
 * what keeps the field ids the backend and showFields() depend on unique.
 */
if (!function_exists('hp_pages')) require_once __DIR__ . '/pages.php';
if (!function_exists('hp_img'))   require_once __DIR__ . '/media.php';

$p = hp_page();
if (!$p) return;

$hp_file = hp_current_file();

/* Market pages carry the form; everything else keeps the dialog. */
$hp_ph_market = null;
if (!empty($p['market'])) {
    if (!function_exists('hp_markets')) require_once __DIR__ . '/markets.php';
    $hp_ph_market = hp_market($p['market']);
}
$hp_ph_form = ($hp_ph_market && !empty($hp_ph_market['points']));
$hp_ph_tel  = function_exists('hp_page_phone') ? hp_page_phone() : null;

/* Breadcrumb trail, matching the BreadcrumbList emitted in seo.php. */
$trail = array(array('Home', '/'));
if ($p['group'] === 'hospitals') {
    $trail[] = array('For Hospitals', hp_url('healthcare-recruitment-for-hospitals.php'));
} elseif ($p['group'] === 'locations') {
    $trail[] = array('Locations', hp_url('hospital-recruitment-agency-in-india.php'));
}
?>
<!-- id="main" is the skip link's target. It lives here rather than on each
     page because every page that is not the home page opens with this hero,
     and without it the first link on the page went nowhere. -->
<section class="hp-pagehero<?php echo $hp_ph_form ? ' hp-pagehero--form' : ''; ?>"
         id="main" tabindex="-1" aria-labelledby="page-title">

  <div class="hp-pagehero__media" aria-hidden="true">
    <img src="<?php echo hp_img($p['img'], 1600); ?>"
         data-fallback="<?php echo hp_img_fallback($p['img'], 1600); ?>"
         alt="" width="1600" height="700" fetchpriority="high" decoding="async">
  </div>

  <div class="hp-wrap hp-pagehero__inner">

    <div class="hp-pagehero__copy">

      <nav class="hp-crumbs" aria-label="Breadcrumb">
        <ol>
          <?php foreach ($trail as $t): ?>
          <li><a href="<?php echo $t[1]; ?>"><?php echo $t[0]; ?></a></li>
          <?php endforeach; ?>
          <li aria-current="page"><?php echo $p['crumb']; ?></li>
        </ol>
      </nav>

      <h1 class="hp-h1 hp-pagehero__h1" id="page-title"><?php echo $p['h1']; ?></h1>

      <p class="hp-lead hp-pagehero__lead"><?php echo $p['lead']; ?></p>

      <?php if ($hp_ph_form): ?>

      <ul class="hp-hero__points hp-pagehero__points">
        <?php foreach ($hp_ph_market['points'] as $pt): ?>
        <li>
          <span class="hp-hero__point-ico"><i class="fa-solid <?php echo $pt[0]; ?>" aria-hidden="true"></i></span>
          <span class="hp-hero__point-txt">
            <strong><?php echo $pt[1]; ?></strong>
            <span><?php echo $pt[2]; ?></span>
          </span>
        </li>
        <?php endforeach; ?>
      </ul>

      <?php if ($hp_ph_tel): ?>
      <p class="hp-pagehero__note">
        <i class="fa-solid fa-phone" aria-hidden="true"></i>
        <?php echo htmlspecialchars($hp_ph_tel[2], ENT_QUOTES, 'UTF-8'); ?>:
        <a href="tel:<?php echo $hp_ph_tel[1]; ?>"><?php echo $hp_ph_tel[0]; ?></a>
      </p>
      <?php endif; ?>

      <?php else: ?>

      <div class="hp-choices hp-pagehero__cta">
        <a class="hp-choice hp-choice--primary" href="/#hire"
           data-modal-open="hp-formmodal" data-modal-tab="hp-tab-employer">
          <span class="hp-choice__ico"><i class="fa-solid fa-hospital" aria-hidden="true"></i></span>
          <span class="hp-choice__txt">
            <span class="hp-choice__t">I am Hiring</span>
            <span class="hp-choice__s">For Hospitals</span>
          </span>
        </a>
        <a class="hp-choice" href="/#find-a-job"
           data-modal-open="hp-formmodal" data-modal-tab="hp-tab-jobseeker">
          <span class="hp-choice__ico"><i class="fa-solid fa-user-doctor" aria-hidden="true"></i></span>
          <span class="hp-choice__txt">
            <span class="hp-choice__t">I am Looking for a Job</span>
            <span class="hp-choice__s">For Candidates</span>
          </span>
        </a>
      </div>

      <p class="hp-pagehero__note">
        <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
        recruiting for healthcare since 2010
      </p>

      <?php endif; ?>
    </div>

    <?php if ($hp_ph_form): ?>
    <?php
    /* The same card the home page carries, from the same markup. Inline, so
       this page has no dialog and exactly one copy of every field id. */
    $hp_form_mode = 'inline';
    include __DIR__ . '/forms.php';
    ?>
    <?php endif; ?>

  </div>
</section>

<?php if (!$hp_ph_form) { include __DIR__ . '/forms.php'; } ?>
