<?php
/**
 * build-htaccess.php - forces a rebuild of .htaccess from include/pages.php.
 *
 *   php scripts/build-htaccess.php
 *
 * You do not normally need this. include/htaccess.php rebuilds the file by
 * itself on the next page load after include/pages.php changes. Run it when you
 * want to see the rules before deploying, or when the document root is not
 * writable by the web server and you are generating the file from a shell.
 */
require __DIR__ . '//../include/htaccess.php';

$root   = dirname(__DIR__);
$result = hp_htaccess_sync($root, true);
$count  = count(hp_pages());

if ($result === 'unwritable') {
    fwrite(STDERR, ".htaccess is not writable: check permissions on $root\n");
    exit(1);
}
echo "$result: .htaccess, $count routes\n";
