<?php
// counter.php - placement numbers as a dark stat band, no card containers.
// The .counter class and data-target attribute drive the count-up script
// that already lives in footer.php.
$hp_years = (int) date('Y') - 2010;
?>
<section class="hp-section hp-band" aria-labelledby="numbers-title">
  <div class="hp-wrap">
    <h2 class="hp-h2 hp-rise" id="numbers-title" style="color:#fff; max-width:22ch; margin-bottom:40px;">
      The record behind the shortlist
    </h2>

    <div class="hp-band__grid">
      <div class="hp-stat hp-rise">
        <p class="hp-stat__n"><span class="counter" data-target="240">0</span><sup>+</sup></p>
        <p>Hospitals, clinics and nursing homes we have hired for</p>
      </div>
      <div class="hp-stat hp-rise">
        <p class="hp-stat__n"><span class="counter" data-target="640">0</span><sup>+</sup></p>
        <p>Medical professionals placed into permanent and contract posts</p>
      </div>
      <div class="hp-stat hp-rise">
        <p class="hp-stat__n"><span class="counter" data-target="<?php echo $hp_years; ?>">0</span></p>
        <p>Years recruiting for healthcare, every year since 2010</p>
      </div>
      <div class="hp-stat hp-rise">
        <p class="hp-stat__n"><span class="counter" data-target="2">0</span></p>
        <p>Offices, New Delhi and Ajman, recruiting worldwide</p>
      </div>
    </div>
  </div>
</section>
