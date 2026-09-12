<?php
/**
 * router.php - local development router, so the clean routes behave the same
 * on a laptop as they do on the server.
 *
 *   php -S localhost:8000 router.php
 *
 * On the server Apache handles this through .htaccess. PHP's built-in server
 * has no mod_rewrite, so this file reproduces the same rules from the same
 * registry: there is one list of routes, in include/pages.php, and both the
 * generated .htaccess and this router read it.
 */
require __DIR__ . '/include/pages.php';

$uri  = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$path = trim(rawurldecode($uri), '/');

/* A real file that exists is served as it is: assets, images, the admin area. */
$onDisk = __DIR__ . '/' . $path;
if ($path !== '' && file_exists($onDisk) && !is_dir($onDisk)) {
    $pages = hp_pages();

    /* Requested the .php file directly? Send the same 301 Apache would. */
    if (isset($pages[$path])) {
        $to = $pages[$path]['route'] === '' ? '/' : '/' . $pages[$path]['route'];
        header('Location: ' . $to, true, 301);
        exit;
    }
    return false;   // let the built-in server stream it
}

$pages = hp_pages();

/* Home. */
if ($path === '') { require __DIR__ . '/index.php'; return; }

/* Canonical sitemap path. */
if ($path === 'sitemap.xml') { require __DIR__ . '/sitemap.php'; return; }

/* Clean route, matched case-insensitively like the Apache rules. */
foreach ($pages as $file => $p) {
    if ($p['route'] !== '' && strcasecmp($path, $p['route']) === 0) {
        require __DIR__ . '/' . $file;
        return;
    }
}

/* An earlier route spelling: one 301 to the current one. */
foreach ($pages as $file => $p) {
    if (!empty($p['alias']) && strcasecmp($path, $p['alias']) === 0) {
        header('Location: /' . $p['route'], true, 301);
        exit;
    }
}

/* A directory index, such as /blog/. */
foreach (array($path . '/index.php', $path . '.php') as $try) {
    if (file_exists(__DIR__ . '/' . $try)) { require __DIR__ . '/' . $try; return; }
}

/* Nothing matched: a real 404, not a silent redirect to the home page. */
http_response_code(404);
$hp_404 = true;
require __DIR__ . '/index.php';
