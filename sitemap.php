<?php
/**
 * sitemap.php - XML sitemap generated from the real page list, so it cannot
 * drift out of sync with the site the way a hand written sitemap.xml does.
 *
 * Serve it at /sitemap.xml by adding this line to .htaccess:
 *   RewriteRule ^sitemap\.xml$ /sitemap.php [L]
 */
header('Content-Type: application/xml; charset=utf-8');

$base = 'https://hospitalplacement.com/';

// path => [changefreq, priority]
$pages = array(
  ''                                              => array('weekly',  '1.0'),
  'about.php'                                     => array('monthly', '0.8'),
  'solutions.php'                                 => array('monthly', '0.8'),
  'jobs.php'                                      => array('daily',   '0.9'),
  'contact.php'                                   => array('monthly', '0.8'),
  'blog/'                                         => array('weekly',  '0.7'),
  'privacy-policy.php'                            => array('yearly',  '0.3'),

  // services
  'doctor-placement-services.php'                 => array('monthly', '0.9'),
  'nurse-staffing-agency-india.php'               => array('monthly', '0.9'),
  'paramedical-recruitment-agency.php'            => array('monthly', '0.9'),
  'specialty-placement.php'                       => array('monthly', '0.8'),
  'permanent-placement.php'                       => array('monthly', '0.8'),
  'temporary-staffing-services.php'               => array('monthly', '0.8'),
  'healthcare-recruitment-for-hospitals.php'      => array('monthly', '0.9'),
  'hospital-recruitment-agency-in-india.php'      => array('monthly', '0.9'),

  // locations
  'recruitment-agency-in-delhi-and-placement-consultants-in-delhi-ncr-job-placement-consultacy.php' => array('monthly', '0.9'),
  'hospital-job-consultants-delhi-ncr-india.php'  => array('monthly', '0.8'),
  'placement-Agency-in-mumbai.php'                => array('monthly', '0.8'),
  'placement-Agency-in-hyderabad.php'             => array('monthly', '0.8'),
  'placement-Agency-in-chandigarh.php'            => array('monthly', '0.8'),
  'placement-Agency-in-kolkata.php'               => array('monthly', '0.8'),
  'placement-Agency-in-lucknow.php'               => array('monthly', '0.8'),
);

// Blog posts, picked up automatically as new ones are added
foreach (glob(__DIR__ . '/blog/*.php') as $post) {
    $name = basename($post);
    if ($name === 'index.php') continue;
    $pages['blog/' . $name] = array('monthly', '0.6');
}

echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
foreach ($pages as $path => $meta) {
    $file = __DIR__ . '/' . ($path === '' ? 'index.php' : rtrim($path, '/') . (substr($path, -1) === '/' ? '/index.php' : ''));
    $mtime = file_exists($file) ? filemtime($file) : time();
    echo "  <url>\n";
    echo '    <loc>' . htmlspecialchars($base . $path, ENT_XML1) . "</loc>\n";
    echo '    <lastmod>' . date('Y-m-d', $mtime) . "</lastmod>\n";
    echo '    <changefreq>' . $meta[0] . "</changefreq>\n";
    echo '    <priority>' . $meta[1] . "</priority>\n";
    echo "  </url>\n";
}
echo '</urlset>' . "\n";
