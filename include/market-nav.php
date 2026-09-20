<?php
/**
 * market-nav.php - the four markets as a set of destinations.
 *
 * Used twice: on the home page, where it is the global coverage section, and
 * at the foot of each country page as the way across to the other three.
 *
 * Deliberately typographic rather than photographic. We hold real photographs
 * of the Indian cities and none of the other markets, so a photo treatment
 * here would mean three stock skylines standing in for work we actually do.
 * The market name set in the display face carries it better and never loads
 * a picture that says nothing.
 *
 * Set $hp_mkt_others to a market key before including to leave that one out.
 * Set $hp_mkt_head to false to suppress the section heading.
 */
if (!function_exists('hp_markets')) require_once __DIR__ . '/markets.php';

$hp_mn_skip = isset($hp_mkt_others) ? $hp_mkt_others : null;
$hp_mn_head = isset($hp_mkt_head) ? $hp_mkt_head : true;
$hp_mn_all  = hp_markets();

$hp_mn_list = array();
foreach ($hp_mn_all as $k => $mk) {
    if ($k === $hp_mn_skip) continue;
    $hp_mn_list[$k] = $mk;
}

/* Reset, so a second include on the same page starts from the default. */
unset($hp_mkt_others, $hp_mkt_head);
?>
<section class="hp-section<?php echo $hp_mn_skip ? ' hp-section--tight' : ''; ?>" aria-labelledby="markets-title">
  <div class="hp-wrap">

    <?php if ($hp_mn_head): ?>
    <div class="hp-head">
      <h2 class="hp-h2 hp-rise" id="markets-title">Four markets, four different <span class="hp-mark">routes in</span></h2>
      <p class="hp-lead hp-rise">We recruit from New Delhi and from Ajman for hospitals in India, the Emirates, the United States and Europe. What changes between them is not our service, it is the licensing, the language and the wait. Open a market to see exactly what its route asks of a candidate.</p>
    </div>
    <?php else: ?>
    <h2 class="hp-h3 hp-mkts__k hp-rise" id="markets-title">The other markets we recruit into</h2>
    <?php endif; ?>

    <ul class="hp-mkts<?php echo $hp_mn_head ? '' : ' hp-mkts--compact'; ?>">
      <?php foreach ($hp_mn_list as $k => $mk): ?>
      <li class="hp-rise">
        <a class="hp-mkt" href="<?php echo hp_url($mk['file']); ?>">
          <span class="hp-mkt__n"><?php echo htmlspecialchars($mk['name'], ENT_QUOTES, 'UTF-8'); ?></span>
          <span class="hp-mkt__d"><?php echo htmlspecialchars($mk['blurb'], ENT_QUOTES, 'UTF-8'); ?></span>
          <span class="hp-mkt__g">
            <?php echo $k === 'india' ? 'Six city desks' : 'See the route in'; ?>
            <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
          </span>
        </a>
      </li>
      <?php endforeach; ?>
    </ul>

    <?php if ($hp_mn_head): ?>
    <p class="hp-small hp-rise hp-mkts__foot">
      Our offices are in New Delhi and Ajman. Hiring somewhere not listed here?
      <a class="hp-link" href="<?php echo hp_url('contact.php'); ?>" style="display:inline-flex; vertical-align:baseline;">Tell us the country <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
    </p>
    <?php endif; ?>

  </div>
</section>
