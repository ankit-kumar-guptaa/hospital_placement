<?php
/**
 * topbar.php - the market strip above the header.
 *
 * India, UAE, USA and Europe are the four markets we recruit into, so they
 * sit at the very top of every page. Each one now opens that market's own
 * landing page rather than dropping the visitor on the contact form: the
 * strip names four countries, so it owes the visitor four countries.
 *
 * The list is read from include/markets.php, which is the same source the
 * header menu and the home page band read, so the strip cannot name a market
 * the site has no page for.
 */
require_once __DIR__ . '/markets.php';
?>
<div class="hp-topbar">
  <div class="hp-wrap hp-topbar__in">

    <nav class="hp-topbar__markets" aria-label="Markets we recruit in">
      <span class="hp-topbar__k">Hiring in</span>
      <ul>
        <?php foreach (hp_markets() as $hp_tb): ?>
          <li><a href="<?php echo hp_url($hp_tb['file']); ?>"><?php echo htmlspecialchars($hp_tb['name'], ENT_QUOTES, 'UTF-8'); ?></a></li>
        <?php endforeach; ?>
      </ul>
    </nav>

    <div class="hp-topbar__contact">
      <a href="tel:+919870364340">
        <i class="fa-solid fa-phone" aria-hidden="true"></i>
        +91 98703 64340
      </a>
      <a href="mailto:info@hospitalplacement.com" class="hp-topbar__mail">
        <i class="fa-solid fa-envelope" aria-hidden="true"></i>
        info@hospitalplacement.com
      </a>
    </div>
  </div>
</div>
