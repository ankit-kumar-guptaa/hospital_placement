<?php
/**
 * htaccess.php - builds the routing rules for Apache from include/pages.php.
 *
 * There is one list of routes on this site, in include/pages.php. Everything
 * else reads it: the <head>, the page heroes, the sitemap, the local router,
 * and this file. That is what stops a route and its metadata from drifting.
 *
 * Nothing here has to be run by hand. hp_htaccess_sync() is called on a normal
 * page load and rewrites .htaccess only when the registry is newer than it, so
 * editing include/pages.php and reloading the site is the whole workflow. The
 * CLI script scripts/build-htaccess.php forces the same rebuild when you would
 * rather see it happen before deploying.
 */
if (!function_exists('hp_pages')) require_once __DIR__ . '/pages.php';

define('HP_HT_A', '# ===== HP BASE (generated, do not hand edit) =====');
define('HP_HT_B', '# ===== END HP BASE =====');
define('HP_HT_C', '# ===== HP ROUTES (generated, do not hand edit) =====');
define('HP_HT_D', '# ===== END HP ROUTES =====');

/**
 * Server defaults: error pages, compression, caching, and a lock on the
 * include files. Compression and caching are here because Core Web Vitals is
 * a ranking input, so they are part of the SEO work rather than a nicety.
 *
 * @param array $errorDocs ErrorDocument lines already present in the file.
 */
function hp_htaccess_base($errorDocs = array())
{
    $o = array(HP_HT_A);

    if ($errorDocs) {
        $o[] = '# Custom error documents, carried over from the previous file.';
        foreach (array_unique($errorDocs) as $line) $o[] = $line;
        $o[] = '';
    }

    $o[] = '# Compression and caching. Both feed Core Web Vitals, which is a';
    $o[] = '# ranking input, so they belong with the SEO work.';
    $o[] = '<IfModule mod_deflate.c>';
    $o[] = '  AddOutputFilterByType DEFLATE text/html text/css text/plain text/xml';
    $o[] = '  AddOutputFilterByType DEFLATE application/javascript application/json';
    $o[] = '  AddOutputFilterByType DEFLATE image/svg+xml';
    $o[] = '</IfModule>';
    $o[] = '<IfModule mod_expires.c>';
    $o[] = '  ExpiresActive On';
    $o[] = '  ExpiresByType text/css "access plus 1 year"';
    $o[] = '  ExpiresByType application/javascript "access plus 1 year"';
    $o[] = '  ExpiresByType image/jpeg "access plus 1 year"';
    $o[] = '  ExpiresByType image/png "access plus 1 year"';
    $o[] = '  ExpiresByType image/webp "access plus 1 year"';
    $o[] = '  ExpiresByType image/svg+xml "access plus 1 year"';
    $o[] = '  ExpiresByType text/html "access plus 0 seconds"';
    $o[] = '</IfModule>';
    $o[] = '';
    $o[] = '# The include files are fragments, not pages: no direct HTTP access.';
    $o[] = '# Guarded by module so it cannot 500 the site on older Apache.';
    $o[] = '<FilesMatch "^(db|pages|seo|media|htaccess|assets|header|footer|page-hero|page-faq|topbar|forms|statbar|specializations|process|solution|service|counter|testimonial|why-choose|ensure|locations|faq|cta|slider|skeleton-loader|cookie-consent)\.php$">';
    $o[] = '  <IfModule mod_authz_core.c>';
    $o[] = '    Require all denied';
    $o[] = '  </IfModule>';
    $o[] = '  <IfModule !mod_authz_core.c>';
    $o[] = '    Order allow,deny';
    $o[] = '    Deny from all';
    $o[] = '  </IfModule>';
    $o[] = '</FilesMatch>';
    $o[] = HP_HT_B;

    return implode("\n", $o);
}

/** The clean-URL rules, one per registry entry. */
function hp_htaccess_routes()
{
    $pages = hp_pages();
    $o = array(HP_HT_C);
    $o[] = '# Clean, extensionless URLs, built from include/pages.php.';
    $o[] = '';
    $o[] = '<IfModule mod_rewrite.c>';
    $o[] = 'RewriteEngine On';
    $o[] = 'RewriteBase /';
    $o[] = '';
    $o[] = '# -- 0. Keep the Authorization header reachable from PHP, which is';
    $o[] = '#       what the original file did and what some hosts need.';
    $o[] = 'RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]';
    $o[] = '';
    $o[] = '# -- 1. Canonical host. Uncomment once you have confirmed the SSL';
    $o[] = '#       certificate covers the bare domain as well as www.';
    $o[] = '# RewriteCond %{HTTP_HOST} !^www\. [NC]';
    $o[] = '# RewriteRule ^ https://www.%{HTTP_HOST}%{REQUEST_URI} [R=301,L]';
    $o[] = '# RewriteCond %{HTTPS} off';
    $o[] = '# RewriteRule ^ https://%{HTTP_HOST}%{REQUEST_URI} [R=301,L]';
    $o[] = '';
    $o[] = '# -- 2. Old .php URLs redirect once to the clean route, so whatever';
    $o[] = '#       is already indexed carries its ranking across.';
    foreach ($pages as $file => $p) {
        $to = $p['route'] === '' ? '/' : '/' . $p['route'];
        $o[] = 'RewriteCond %{THE_REQUEST} "\s/+' . $file . '[\s?]" [NC]';
        $o[] = 'RewriteRule ^ ' . $to . ' [R=301,L]';
    }
    $o[] = '';
    $o[] = '# -- 3. Earlier route spellings keep working, also in one hop.';
    foreach ($pages as $file => $p) {
        if (empty($p['alias']) || $p['alias'] === $p['route']) continue;
        $o[] = 'RewriteRule ^' . $p['alias'] . '/?$ /' . $p['route'] . ' [R=301,L,NC]';
    }
    $o[] = '';
    $o[] = '# -- 4. Strip a trailing slash, so /contact/ and /contact are one URL.';
    $o[] = 'RewriteCond %{REQUEST_FILENAME} !-d';
    $o[] = 'RewriteRule ^(.+)/$ /$1 [R=301,L]';
    $o[] = '';
    $o[] = '# -- 5. Serve each clean route from its real file.';
    foreach ($pages as $file => $p) {
        if ($p['route'] === '') continue;
        $o[] = 'RewriteRule ^' . $p['route'] . '$ ' . $file . ' [L,NC]';
    }
    $o[] = '';
    $o[] = '# -- 6. The generated sitemap at its canonical path.';
    $o[] = 'RewriteRule ^sitemap\.xml$ sitemap.php [L]';
    $o[] = '';
    $o[] = '# -- 7. Generic fallback: /some-page is served from some-page.php';
    $o[] = '#       whenever that file exists. A brand new page therefore works';
    $o[] = '#       the moment it is uploaded, with no config to touch.';
    $o[] = 'RewriteCond %{REQUEST_FILENAME} !-f';
    $o[] = 'RewriteCond %{REQUEST_FILENAME} !-d';
    $o[] = 'RewriteCond %{DOCUMENT_ROOT}/$1.php -f';
    $o[] = 'RewriteRule ^([^/.]+)/?$ $1.php [L]';
    $o[] = '';
    $o[] = '# -- 8. Real files and folders are served as they are; anything';
    $o[] = '#       left over falls back to the home page.';
    $o[] = 'RewriteRule ^index\.php$ - [L]';
    $o[] = 'RewriteCond %{REQUEST_FILENAME} !-f';
    $o[] = 'RewriteCond %{REQUEST_FILENAME} !-d';
    $o[] = 'RewriteRule . /index.php [L]';
    $o[] = '</IfModule>';
    $o[] = HP_HT_D;

    return implode("\n", $o);
}

/**
 * Swap a marked block in $text for $new, or append it when absent.
 *
 * str_replace rather than preg_replace on purpose: the rules contain $1
 * backreferences, and preg_replace would read those as its own and blank them.
 */
function hp_htaccess_splice($text, $open, $close, $new)
{
    $a = strpos($text, $open);
    $b = strpos($text, $close);
    if ($a !== false && $b !== false && $b > $a) {
        $end = $b + strlen($close);
        return substr($text, 0, $a) . $new . substr($text, $end);
    }
    return rtrim($text) === '' ? $new . "\n" : rtrim($text) . "\n\n" . $new . "\n";
}

/** The full file contents, given whatever is on disk now. */
function hp_htaccess_render($current)
{
    /* Pull any ErrorDocument lines out before rewriting, because the old
       WordPress block wrapped them together with the rewrite rules. */
    $errs = array();
    if (preg_match_all('/^[ \t]*ErrorDocument[ \t]+.+$/mi', $current, $m)) {
        foreach ($m[0] as $line) $errs[] = trim($line);
    }

    /* Drop the legacy WordPress block and any stray loose directives that the
       generated blocks below now own. */
    $out = preg_replace('/# BEGIN WordPress.*?# END WordPress\s*/s', '', $current);
    $out = preg_replace('/^[ \t]*ErrorDocument[ \t]+.+\R?/mi', '', $out);
    $out = preg_replace('/^# ===== HP ROUTES \(generated by scripts.*?# ===== END HP ROUTES =====\s*/sm', '', $out);

    $out = hp_htaccess_splice($out, HP_HT_A, HP_HT_B, hp_htaccess_base($errs));
    $out = hp_htaccess_splice($out, HP_HT_C, HP_HT_D, hp_htaccess_routes());

    return trim($out) . "\n";
}

/**
 * Write .htaccess when it is missing or older than the registry.
 *
 * Called on a normal page load, so the routes look after themselves. It stays
 * quiet about anything it cannot do: a read-only document root is a perfectly
 * normal deployment, and the site has to keep serving either way.
 *
 * @param bool $force rebuild even when the file looks current.
 * @return string one of: written, current, unwritable, unchanged.
 */
function hp_htaccess_sync($root = null, $force = false)
{
    $root = $root ? rtrim($root, '/') : dirname(__DIR__);
    $file = $root . '/.htaccess';
    $srcs = array(__DIR__ . '/pages.php', __FILE__);

    if (!$force && is_file($file)) {
        $age = @filemtime($file);
        $new = false;
        foreach ($srcs as $s) {
            if (@filemtime($s) > $age) { $new = true; break; }
        }
        if (!$new) return 'current';
    }

    $current = is_file($file) ? (string) @file_get_contents($file) : '';
    $next    = hp_htaccess_render($current);
    if ($next === $current) { @touch($file); return 'unchanged'; }

    if ((is_file($file) && !is_writable($file)) || (!is_file($file) && !is_writable($root))) {
        return 'unwritable';
    }

    /* Write through a temp file and rename, so a half written .htaccess can
       never be served. A broken one takes the whole site down with a 500. */
    $tmp = $file . '.' . getmypid() . '.tmp';
    if (@file_put_contents($tmp, $next, LOCK_EX) === false) return 'unwritable';
    if (!@rename($tmp, $file)) { @unlink($tmp); return 'unwritable'; }
    @chmod($file, 0644);

    return 'written';
}
