<?php
/**
 * page-hero.php - the hero for every page that is not the home page.
 *
 * Deliberately not the home hero. Each page gets its own H1 carrying its own
 * target keyword, its own answer-first opening line, and its own photograph,
 * all read from include/pages.php.
 *
 * The CTA sits here, at the top of the page, because visitors act from the
 * first screen: the body copy below is what earns the ranking, not what earns
 * the enquiry. Both buttons open the same modal the home page uses.
 */
if (!function_exists('hp_pages')) require_once __DIR__ . '/pages.php';
if (!function_exists('hp_img'))   require_once __DIR__ . '/media.php';

$p = hp_page();
if (!$p) return;

$hp_file = hp_current_file();

/* Breadcrumb trail, matching the BreadcrumbList emitted in seo.php. */
$trail = array(array('Home', '/'));
if ($p['group'] === 'hospitals') {
    $trail[] = array('For Hospitals', hp_url('healthcare-recruitment-for-hospitals.php'));
} elseif ($p['group'] === 'locations') {
    $trail[] = array('Locations', hp_url('hospital-recruitment-agency-in-india.php'));
}
?>
<section class="hp-pagehero" aria-labelledby="page-title">

  <div class="hp-pagehero__media" aria-hidden="true">
    <img src="<?php echo hp_img($p['img'], 1600); ?>"
         data-fallback="<?php echo hp_img_fallback($p['img'], 1600); ?>"
         alt="" width="1600" height="700" fetchpriority="high" decoding="async">
  </div>

  <div class="hp-wrap hp-pagehero__inner">

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
      ISO 9001:2000 certified &middot; recruiting for healthcare since 2010
    </p>
  </div>
</section>

<?php include __DIR__ . '/forms.php'; ?>
