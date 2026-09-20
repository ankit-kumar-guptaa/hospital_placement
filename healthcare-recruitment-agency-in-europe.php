<?php
/**
 * A country landing page. The whole body comes from include/market-page.php,
 * driven by this page's 'market' key in include/pages.php, so the four
 * markets cannot drift apart in structure while they differ in content.
 */
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
<?php include 'include/seo.php'; ?>
</head>
<body class="hp-body">

<?php include 'include/header.php'; ?>

<main>
  <?php include 'include/page-hero.php'; ?>
  <?php include 'include/market-page.php'; ?>
</main>

<?php include 'include/footer.php'; ?>
