<?php
// assets.php - shared <head> assets for every page.
// The Tailwind Play CDN that used to load here has been removed: no page in
// the project used a Tailwind utility class, and its preflight reset fought
// Bootstrap while costing a render-blocking script on every page.
?>
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Font Awesome 6 -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />


<!-- Typeface -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

<!-- Photography CDN: warm the connection before the hero image is requested -->
<link rel="preconnect" href="https://images.unsplash.com" crossorigin>

<!-- Legacy page styles -->
<link rel="stylesheet" href="/assets/style.css">

<!-- Design system: tokens and the purpose built sections. -->
<link rel="stylesheet" href="/assets/css/theme.css">

<!-- Content layer: dresses the Bootstrap markup the body copy is written in.
     Loads after theme.css so it can use the tokens, and last overall so it
     can answer Bootstrap's !important utilities. -->
<link rel="stylesheet" href="/assets/css/content.css">

<link rel="icon" type="image/png" href="https://hosptal.hospitalplacement.com/wp-content/uploads/2021/05/logo-220.jpg">
<meta name="theme-color" content="#1D4ED8">
