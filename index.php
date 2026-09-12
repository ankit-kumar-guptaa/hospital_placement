<?php
require 'visitor_tracking.php';
require_once __DIR__ . '/include/media.php';

$hp_years = (int) date('Y') - 2010;
$hp_canonical = 'https://hospitalplacement.com/';
?>
<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Global Healthcare Recruitment Agency | HospitalPlacement.com</title>
  <meta name="description"
    content="ISO 9001:2000 certified medical recruitment consultancy placing doctors, nurses, paramedical and hospital admin staff worldwide since 2010. India, the Gulf and international markets. Pay on success.">
  <link rel="canonical" href="<?php echo $hp_canonical; ?>">
  <meta name="robots" content="index, follow, max-image-preview:large">

  <!-- Open Graph -->
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="HospitalPlacement.com">
  <meta property="og:locale" content="en_IN">
  <meta property="og:url" content="<?php echo $hp_canonical; ?>">
  <meta property="og:title" content="Global Healthcare Recruitment Agency | HospitalPlacement.com">
  <meta property="og:description"
    content="Doctors, nurses, paramedical and hospital administration staff for hospitals, clinics and nursing homes worldwide. ISO 9001:2000 certified, recruiting since 2010.">
  <meta property="og:image" content="https://hosptal.hospitalplacement.com/wp-content/uploads/2021/05/logo-220.jpg">
  <meta property="og:image:alt" content="HospitalPlacement.com healthcare recruitment">

  <!-- Twitter -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="Global Healthcare Recruitment Agency">
  <meta name="twitter:description"
    content="Doctors, nurses, paramedical and hospital administration staff placed worldwide. ISO 9001:2000 certified, recruiting since 2010.">
  <meta name="twitter:image" content="https://hosptal.hospitalplacement.com/wp-content/uploads/2021/05/logo-220.jpg">

  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=AW-10893858085"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag() { dataLayer.push(arguments); }
    gtag('js', new Date());

    gtag('config', 'AW-10893858085');
  </script>
  <script>
    function gtag_report_conversion(url) {
      var callback = function () {
        if (typeof (url) != 'undefined') {
          window.location = url;
        }
      };
      gtag('event', 'conversion', {
        'send_to': 'AW-10893858085/p3sfCI6N-qEaEKWqzMoo',
        'value': 1.0,
        'currency': 'INR',
        'event_callback': callback
      });
      return false;
    }
  </script>

  <?php include 'include/assets.php'; ?>

  <script type="application/ld+json">
<?php
echo json_encode(array(
  '@context' => 'https://schema.org',
  '@graph' => array(

    array(
      '@type' => 'EmploymentAgency',
      '@id' => $hp_canonical . '#organisation',
      'name' => 'HospitalPlacement.com',
      'url' => $hp_canonical,
      'description' => 'Healthcare recruitment consultancy placing doctors, nurses, paramedical, pharma and hospital administration staff with hospitals, clinics and nursing homes in India, the Gulf and international markets, from offices in New Delhi and Ajman.',
      'foundingDate' => '2010',
      'logo' => 'https://hosptal.hospitalplacement.com/wp-content/uploads/2021/05/logo-220.jpg',
      'image' => 'https://hosptal.hospitalplacement.com/wp-content/uploads/2021/05/logo-220.jpg',
      'email' => 'info@hospitalplacement.com',
      'telephone' => '+91-98719-16980',
      'areaServed' => array(
        array('@type' => 'Country', 'name' => 'India'),
        array('@type' => 'Country', 'name' => 'United Arab Emirates'),
        array('@type' => 'Place', 'name' => 'Gulf Cooperation Council'),
        array('@type' => 'Place', 'name' => 'Worldwide'),
      ),
      'address' => array(
        array(
          '@type' => 'PostalAddress',
          'streetAddress' => 'A-83, Okhla Phase II',
          'addressLocality' => 'New Delhi',
          'postalCode' => '110020',
          'addressCountry' => 'IN',
        ),
        array(
          '@type' => 'PostalAddress',
          'streetAddress' => 'BC-889265, 26th Floor, Amber Gem Tower',
          'addressLocality' => 'Ajman',
          'addressCountry' => 'AE',
        ),
      ),
      'contactPoint' => array(
        array(
          '@type' => 'ContactPoint',
          'contactType' => 'sales',
          'telephone' => '+91-98719-16980',
          'email' => 'info@hospitalplacement.com',
          'areaServed' => 'IN',
          'availableLanguage' => array('English', 'Hindi'),
        ),
        array(
          '@type' => 'ContactPoint',
          'contactType' => 'sales',
          'telephone' => '+971-58-234-8005',
          'areaServed' => array('AE', 'SA', 'QA', 'OM', 'KW', 'BH'),
          'availableLanguage' => array('English'),
        ),
      ),
      'sameAs' => array(
        'https://www.instagram.com/hospital_placement',
        'https://www.linkedin.com/company/hospital-placement',
      ),
      'knowsAbout' => array(
        'Doctor recruitment',
        'Nurse staffing',
        'Paramedical recruitment',
        'Hospital administration hiring',
        'Locum and contract medical staffing',
        'International healthcare recruitment',
        'Overseas medical licensing support',
      ),
    ),

    array(
      '@type' => 'WebSite',
      '@id' => $hp_canonical . '#website',
      'url' => $hp_canonical,
      'name' => 'HospitalPlacement.com',
      'publisher' => array('@id' => $hp_canonical . '#organisation'),
      'inLanguage' => 'en',
    ),

    array(
      '@type' => 'WebPage',
      '@id' => $hp_canonical . '#webpage',
      'url' => $hp_canonical,
      'name' => 'Global Healthcare Recruitment Agency',
      'isPartOf' => array('@id' => $hp_canonical . '#website'),
      'about' => array('@id' => $hp_canonical . '#organisation'),
      'description' => 'Medical and healthcare recruitment services for hospitals, clinics and nursing homes worldwide, from offices in India and the UAE.',
    ),

    array(
      '@type' => 'BreadcrumbList',
      '@id' => $hp_canonical . '#breadcrumb',
      'itemListElement' => array(
        array('@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => $hp_canonical),
      ),
    ),

  ),
), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
?>
</script>

</head>

<body class="hp-body">

  <?php include "include/header.php"; ?>

  <main id="main">

    <?php include "include/slider.php"; ?>

    <?php include "include/trust-rail.php"; ?>

    <?php include "include/ensure.php"; ?>


    <!-- Who we are. The one image plus text split on this page. -->
    <section class="hp-section" aria-labelledby="about-title">
      <div class="hp-wrap hp-split">

        <div class="hp-split__media">
          <div class="hp-collage">
            <img class="hp-collage__a" src="<?php echo hp_img('about_main', 760); ?>"
              data-fallback="<?php echo hp_img_fallback('about_main'); ?>" alt="<?php echo hp_img_alt('about_main'); ?>"
              width="760" height="950" fetchpriority="high" decoding="async">
            <img class="hp-collage__b" src="<?php echo hp_img('about_inset', 460); ?>"
              data-fallback="<?php echo hp_img_fallback('about_inset'); ?>"
              alt="<?php echo hp_img_alt('about_inset'); ?>" width="460" height="460" loading="lazy" decoding="async">
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
              <span><b>Five role families</b> under one desk: doctors, nurses, paramedical and diagnostics, pharma, and
                hospital administration.</span>
            </li>
            <li class="hp-rise">
              <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
              <span><b>Permanent, contract and locum</b> hiring on a single agreement, at home or overseas.</span>
            </li>
            <li class="hp-rise">
              <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
              <span><b><?php echo $hp_years; ?> years of placement data</b> behind every salary benchmark we give
                you.</span>
            </li>
          </ul>

          <a class="hp-link hp-rise" href="about.php">More about how we work <i class="fa-solid fa-arrow-right"
              aria-hidden="true"></i></a>
        </div>

      </div>
    </section>


    <?php include "include/solution.php"; ?>

    <?php include "include/service.php"; ?>

    <?php include "include/counter.php"; ?>

    <?php include "include/locations.php"; ?>

    <?php include "include/why-choose.php"; ?>

    <?php include "include/testimonial.php"; ?>

    <?php include "include/faq.php"; ?>

    <?php include "include/cta.php"; ?>

  </main>

  <?php include "include/footer.php"; ?>