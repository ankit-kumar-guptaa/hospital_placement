<?php
require 'visitor_tracking.php';
require_once __DIR__ . '/include/media.php';

$hp_years = (int) date('Y') - 2010;
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
<?php include 'include/seo.php'; ?>

</head>
<body class="hp-body">

<?php include "include/header.php"; ?>

<main id="main">

  <?php include "include/slider.php"; ?>

  <?php include "include/specializations.php"; ?>

  <?php include "include/ensure.php"; ?>


  <!-- Who we are. The one image plus text split on this page. -->
  <section class="hp-section" aria-labelledby="about-title">
    <div class="hp-wrap hp-split">

      <div class="hp-split__media">
        <div class="hp-collage">
          <img class="hp-collage__a"
               src="<?php echo hp_img('about_main', 760); ?>"
               data-fallback="<?php echo hp_img_fallback('about_main'); ?>"
               alt="<?php echo hp_img_alt('about_main'); ?>"
               width="760" height="950" fetchpriority="high" decoding="async">
          <img class="hp-collage__b"
               src="<?php echo hp_img('about_inset', 460); ?>"
               data-fallback="<?php echo hp_img_fallback('about_inset'); ?>"
               alt="<?php echo hp_img_alt('about_inset'); ?>"
               width="460" height="460" loading="lazy" decoding="async">
          <p class="hp-collage__badge">
            <i class="fa-solid fa-certificate" aria-hidden="true"></i>
            <b>ISO 9001:2000 certified</b>
          </p>
        </div>
      </div>

      <div>
        <h2 class="hp-h2 hp-rise" id="about-title">
          A recruitment firm that only ever worked in <span class="hp-mark">healthcare</span>
        </h2>
        <p class="hp-copy hp-rise" style="margin-top:18px;">
          HospitalPlacement.com has recruited for hospitals, nursing homes and diagnostic
          centres since 2010, and nothing else. That focus is the whole point: our
          consultants read a clinical brief the way your medical superintendent reads it,
          so the shortlist arrives already filtered for registration, speciality and
          shift reality.
        </p>
        <p class="hp-copy hp-rise" style="margin-top:14px;">
          We work from New Delhi and from Ajman, recruiting for hospitals in India, across
          the Gulf and in international markets. One team carries a candidate from first
          call through licensing, visa and joining date, whichever country they are moving
          to, so the file is never handed around.
        </p>

        <ul class="hp-ticks">
          <li class="hp-rise">
            <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
            <span><b>Five role families</b> under one desk: doctors, nurses, paramedical and diagnostics, pharma, and hospital administration.</span>
          </li>
          <li class="hp-rise">
            <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
            <span><b>Permanent, contract and locum</b> hiring on a single agreement, at home or overseas.</span>
          </li>
          <li class="hp-rise">
            <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
            <span><b><?php echo $hp_years; ?> years of placement data</b> behind every salary benchmark we give you.</span>
          </li>
        </ul>

        <a class="hp-link hp-rise" href="about.php">More about how we work <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
      </div>

    </div>
  </section>


  <?php include "include/process.php"; ?>

  

  <?php include "include/solution.php"; ?>

  <?php include "include/service.php"; ?>

  <?php include "include/locations.php"; ?>

  <?php include "include/why-choose.php"; ?>

  <?php include "include/testimonial.php"; ?>

  <?php include "include/faq.php"; ?>

  <?php include "include/cta.php"; ?>

</main>

<?php include "include/footer.php"; ?>
