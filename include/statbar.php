<?php
/**
 * statbar.php - the trust strip that sits directly under the hero in the deck.
 * The .counter class and data-target attribute drive the count-up in footer.php.
 */
$hp_years = (int) date('Y') - 2010;

$hp_stats = array(
  array('i' => 'fa-award',        'n' => $hp_years, 'suf' => '+',  'l' => 'Years of Experience'),
  array('i' => 'fa-user-check',   'n' => 10000,     'suf' => '+',  'l' => 'Successful Placements'),
  array('i' => 'fa-hospital',     'n' => 500,       'suf' => '+',  'l' => 'Hospitals Served'),
  array('i' => 'fa-earth-americas','n' => null,     'txt' => 'Global', 'l' => 'Recruitment Network'),
  array('i' => 'fa-address-book', 'n' => 50000,     'suf' => '+',  'l' => 'Professionals in Database'),
);
?>
<section class="hp-statbar" aria-label="Our track record">
  <div class="hp-wrap">
    <ul class="hp-statbar__grid">
      <?php foreach ($hp_stats as $st): ?>
      <li class="hp-statbar__item hp-rise">
        <span class="hp-statbar__ico"><i class="fa-solid <?php echo $st['i']; ?>" aria-hidden="true"></i></span>
        <span>
          <span class="hp-statbar__n"><?php
            if ($st['n'] === null) {
                echo $st['txt'];
            } else {
                // No whitespace between the counter and its suffix: they are
                // one token and must never wrap apart.
                echo '<span class="counter" data-target="' . $st['n'] . '">0</span>' . $st['suf'];
            }
          ?></span>
          <span class="hp-statbar__l"><?php echo $st['l']; ?></span>
        </span>
      </li>
      <?php endforeach; ?>
    </ul>
  </div>
</section>
