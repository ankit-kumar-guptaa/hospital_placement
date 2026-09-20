<?php
/**
 * seo.php - the whole <head> for every page, driven by include/pages.php.
 *
 * Include it inside <head> and it emits: title, meta description, canonical,
 * robots, Open Graph, Twitter card, hreflang, the Google Ads tag, the shared
 * stylesheets, and the JSON-LD graph for that page.
 *
 * Because every value comes from the registry, no page can ship a missing,
 * empty or duplicated tag, which is the usual source of on-page SEO errors.
 *
 * AEO note: alongside the normal page schema we emit a speakable block and,
 * where a page defines questions, a FAQPage. Answer engines read those to
 * quote a page directly, which is why every registry entry opens with an
 * answer-first 'lead' sentence.
 */
if (!function_exists('hp_pages')) require_once __DIR__ . '/pages.php';
if (!function_exists('hp_img'))   require_once __DIR__ . '/media.php';

$hp_p    = hp_page();
$hp_file = hp_current_file();

/* A page outside the registry still gets a valid, indexable head. */
if (!$hp_p) {
    $hp_p = array(
        'route' => ltrim(str_replace('.php', '', $hp_file), '/'),
        'kw' => 'healthcare recruitment', 'title' => HP_BRAND,
        'desc' => 'Healthcare recruitment agency placing doctors, nurses and paramedical staff with hospitals worldwide since 2010.',
        'h1' => HP_BRAND, 'lead' => '', 'img' => 'hero_team',
        'crumb' => 'Page', 'type' => 'WebPage', 'group' => '',
    );
}

/**
 * Where the Service on this page is offered.
 *
 * A city page serves its city, a country landing page serves the countries
 * its market covers, and everything else serves the four markets we work in.
 * Read from include/markets.php so the schema cannot disagree with the page.
 */
if (!function_exists('hp_area_served')) {
function hp_area_served($p) {
    if (!empty($p['city'])) return array('@type' => 'City', 'name' => $p['city']);
    if (!empty($p['market'])) {
        require_once __DIR__ . '/markets.php';
        $mk = hp_market($p['market']);
        if ($mk && !empty($mk['area'])) return $mk['area'];
    }
    return array(array('@type' => 'Country', 'name' => 'India'),
                 array('@type' => 'Country', 'name' => 'United Arab Emirates'),
                 array('@type' => 'Country', 'name' => 'United States'),
                 array('@type' => 'Place',   'name' => 'Europe'));
}
}

$hp_canon = hp_abs($hp_file);
$hp_title = $hp_p['title'];
$hp_desc  = $hp_p['desc'];
$hp_ogimg = HP_SITE . '/assets/img/hero.png';
$hp_years = (int) date('Y') - 2010;
?>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<title><?php echo $hp_title; ?></title>
<meta name="description" content="<?php echo htmlspecialchars($hp_desc, ENT_QUOTES, 'UTF-8'); ?>">
<link rel="canonical" href="<?php echo $hp_canon; ?>">
<meta name="robots" content="<?php echo ($hp_p['group'] === 'legal') ? 'noindex, follow' : 'index, follow, max-image-preview:large, max-snippet:-1'; ?>">
<meta name="author" content="<?php echo HP_BRAND; ?>">

<!-- One language, served worldwide -->
<link rel="alternate" hreflang="en" href="<?php echo $hp_canon; ?>">
<link rel="alternate" hreflang="x-default" href="<?php echo $hp_canon; ?>">

<!-- Open Graph -->
<meta property="og:type" content="website">
<meta property="og:site_name" content="<?php echo HP_BRAND; ?>">
<meta property="og:locale" content="en">
<meta property="og:url" content="<?php echo $hp_canon; ?>">
<meta property="og:title" content="<?php echo htmlspecialchars(html_entity_decode($hp_title), ENT_QUOTES, 'UTF-8'); ?>">
<meta property="og:description" content="<?php echo htmlspecialchars($hp_desc, ENT_QUOTES, 'UTF-8'); ?>">
<meta property="og:image" content="<?php echo $hp_ogimg; ?>">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:image:alt" content="<?php echo HP_BRAND; ?> healthcare recruitment">

<!-- Twitter -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?php echo htmlspecialchars(html_entity_decode($hp_title), ENT_QUOTES, 'UTF-8'); ?>">
<meta name="twitter:description" content="<?php echo htmlspecialchars($hp_desc, ENT_QUOTES, 'UTF-8'); ?>">
<meta name="twitter:image" content="<?php echo $hp_ogimg; ?>">

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-10893858085"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-10893858085');
</script>
<script>
function gtag_report_conversion(url) {
  var callback = function () {
    if (typeof(url) != 'undefined') {
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

<?php include __DIR__ . '/assets.php'; ?>

<script type="application/ld+json">
<?php
/* ---------- the organisation, referenced by every other node ---------- */
$org = array(
  '@type' => 'EmploymentAgency',
  '@id'   => HP_SITE . '/#organisation',
  'name'  => HP_BRAND,
  'alternateName' => 'Hospital Placement',
  'url'   => HP_SITE . '/',
  'description' => 'Healthcare recruitment consultancy placing doctors, nurses, paramedical, pharma and hospital administration staff with hospitals, clinics and nursing homes in India, the Gulf, the USA and Europe.',
  'foundingDate' => '2010',
  'logo'  => 'https://hosptal.hospitalplacement.com/wp-content/uploads/2021/05/logo-220.jpg',
  'image' => $hp_ogimg,
  'email' => 'info@hospitalplacement.com',
  'telephone' => '+91-98719-16980',
  'areaServed' => array(
    array('@type' => 'Country', 'name' => 'India'),
    array('@type' => 'Country', 'name' => 'United Arab Emirates'),
    array('@type' => 'Country', 'name' => 'United States'),
    array('@type' => 'Place',   'name' => 'Europe'),
  ),
  'address' => array(
    array('@type' => 'PostalAddress', 'streetAddress' => 'A-83, Okhla Phase II',
          'addressLocality' => 'New Delhi', 'postalCode' => '110020', 'addressCountry' => 'IN'),
    array('@type' => 'PostalAddress', 'streetAddress' => 'BC-889265, 26th Floor, Amber Gem Tower',
          'addressLocality' => 'Ajman', 'addressCountry' => 'AE'),
  ),
  'contactPoint' => array(
    array('@type' => 'ContactPoint', 'contactType' => 'sales', 'telephone' => '+91-98719-16980',
          'email' => 'info@hospitalplacement.com', 'areaServed' => 'IN',
          'availableLanguage' => array('English', 'Hindi')),
    array('@type' => 'ContactPoint', 'contactType' => 'sales', 'telephone' => '+971-58-234-8005',
          'areaServed' => array('AE', 'SA', 'QA', 'OM', 'KW', 'BH'),
          'availableLanguage' => array('English')),
  ),
  'sameAs' => array(
    'https://www.instagram.com/hospital_placement',
    'https://www.linkedin.com/company/hospital-placement',
  ),
  'knowsAbout' => array(
    'Doctor recruitment', 'Nurse staffing', 'Paramedical recruitment',
    'Hospital administration hiring', 'Locum and contract medical staffing',
    'International healthcare recruitment', 'Overseas medical licensing support',
  ),
);

/* ---------- breadcrumb: home, then group, then this page ---------- */
$crumbs = array(array('name' => 'Home', 'item' => HP_SITE . '/'));
if ($hp_p['group'] === 'hospitals') {
    $crumbs[] = array('name' => 'For Hospitals', 'item' => hp_abs('healthcare-recruitment-for-hospitals.php'));
} elseif ($hp_p['group'] === 'locations') {
    $crumbs[] = array('name' => 'Locations', 'item' => hp_abs('hospital-recruitment-agency-in-india.php'));
}
if ($hp_p['route'] !== '') {
    $crumbs[] = array('name' => html_entity_decode($hp_p['crumb']), 'item' => $hp_canon);
}
$breadcrumb = array('@type' => 'BreadcrumbList', '@id' => $hp_canon . '#breadcrumb', 'itemListElement' => array());
foreach ($crumbs as $i => $c) {
    $breadcrumb['itemListElement'][] = array(
        '@type' => 'ListItem', 'position' => $i + 1, 'name' => $c['name'], 'item' => $c['item']);
}

/* ---------- the page itself, plus speakable for answer engines ---------- */
$page = array(
  '@type'      => 'WebPage',
  '@id'        => $hp_canon . '#webpage',
  'url'        => $hp_canon,
  'name'       => html_entity_decode($hp_p['title']),
  'description'=> $hp_p['desc'],
  'isPartOf'   => array('@id' => HP_SITE . '/#website'),
  'about'      => array('@id' => HP_SITE . '/#organisation'),
  'inLanguage' => 'en',
  'primaryImageOfPage' => array('@type' => 'ImageObject', 'url' => $hp_ogimg),
  'breadcrumb' => array('@id' => $hp_canon . '#breadcrumb'),
  'speakable'  => array(
    '@type' => 'SpeakableSpecification',
    'cssSelector' => array('.hp-pagehero__h1', '.hp-pagehero__lead', '.hp-hero__h1', '.hp-hero__lead'),
  ),
);

$graph = array(
  $org,
  array('@type' => 'WebSite', '@id' => HP_SITE . '/#website', 'url' => HP_SITE . '/',
        'name' => HP_BRAND, 'publisher' => array('@id' => HP_SITE . '/#organisation'),
        'inLanguage' => 'en'),
  $page,
  $breadcrumb,
);

/* AEO: a page that defines questions gets a FAQPage, which is the node
   answer engines read when they quote a page directly. */
if (!empty($hp_p['faq'])) {
    $qs = array();
    foreach ($hp_p['faq'] as $f) {
        $qs[] = array(
          '@type' => 'Question',
          'name'  => $f['q'],
          'acceptedAnswer' => array('@type' => 'Answer', 'text' => $f['a']),
        );
    }
    $graph[] = array('@type' => 'FAQPage', '@id' => $hp_canon . '#faq', 'mainEntity' => $qs);
}

/* A service page also describes the service it sells. */
if ($hp_p['type'] === 'Service') {
    $svc = array(
      '@type' => 'Service',
      '@id'   => $hp_canon . '#service',
      'name'  => html_entity_decode(strip_tags($hp_p['h1'])),
      'description' => $hp_p['desc'],
      'serviceType' => ucfirst($hp_p['kw']),
      'provider' => array('@id' => HP_SITE . '/#organisation'),
      'areaServed' => hp_area_served($hp_p),
      'audience' => array('@type' => 'Audience', 'audienceType' => 'Hospitals, clinics and nursing homes'),
      'url' => $hp_canon,
    );
    $graph[] = $svc;
}

echo json_encode(array('@context' => 'https://schema.org', '@graph' => $graph),
    JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
?>
</script>
