<?php
/**
 * sitemap.php - XML sitemap built from include/pages.php, served at
 * /sitemap.xml by the route in .htaccess.
 *
 * Reading the registry means the sitemap lists exactly the canonical URLs the
 * pages declare, so a route rename can never leave a stale or 404 entry here.
 */
require __DIR__ . '/include/pages.php';
header('Content-Type: application/xml; charset=utf-8');

/* changefreq and priority per nav group */
$w = array(
  'home'      => array('weekly',  '1.0'),
  'hospitals' => array('monthly', '0.9'),
  'locations' => array('monthly', '0.8'),
  'company'   => array('monthly', '0.7'),
  'legal'     => array('yearly',  '0.2'),
);

$urls = array();
foreach (hp_pages() as $file => $p) {
    if ($p['group'] === 'legal') continue;          // noindex, keep it out
    $g = isset($w[$p['group']]) ? $w[$p['group']] : array('monthly', '0.6');
    $urls[] = array(
      'loc'  => hp_abs($file),
      'mod'  => file_exists($file) ? date('Y-m-d', filemtime($file)) : date('Y-m-d'),
      'freq' => $g[0],
      'pri'  => $p['route'] === '' ? '1.0' : $g[1],
    );
}

/* Blog posts, picked up automatically as they are added */
foreach (glob(__DIR__ . '/blog/*.php') as $post) {
    $name = basename($post);
    if ($name === 'index.php') continue;
    $urls[] = array(
      'loc'  => HP_SITE . '/blog/' . $name,
      'mod'  => date('Y-m-d', filemtime($post)),
      'freq' => 'monthly', 'pri' => '0.6',
    );
}
if (file_exists(__DIR__ . '/blog/index.php')) {
    $urls[] = array('loc' => HP_SITE . '/blog/',
      'mod' => date('Y-m-d', filemtime(__DIR__ . '/blog/index.php')),
      'freq' => 'weekly', 'pri' => '0.7');
}

echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
foreach ($urls as $u) {
    echo "  <url>\n";
    echo '    <loc>' . htmlspecialchars($u['loc'], ENT_XML1) . "</loc>\n";
    echo '    <lastmod>' . $u['mod'] . "</lastmod>\n";
    echo '    <changefreq>' . $u['freq'] . "</changefreq>\n";
    echo '    <priority>' . $u['pri'] . "</priority>\n";
    echo "  </url>\n";
}
echo '</urlset>' . "\n";
