<?php
// testimonial.php - client quotes. Crossfade carousel, paused on hover and
// focus, stopped under prefers-reduced-motion. Quote bodies capped at three
// lines. Initial-monogram avatars: we do not put a stranger's stock photo
// against a named client.
$hp_quotes = array(
  array(
    'q'  => 'They filled two ICU consultant posts we had carried vacant for four months. The shortlist was three names and we hired two of them.',
    'n'  => 'Dr. Arjun Kapoor',
    'r'  => 'Medical Director, WellCare Hospital',
    'in' => 'AK',
  ),
  array(
    'q'  => 'What I value is that they push back. When our band was below market for a cath lab technician they said so instead of sending us people who would leave.',
    'n'  => 'Ms. Radhika Iyer',
    'r'  => 'Head of HR, Harmony Clinics',
    'in' => 'RI',
  ),
  array(
    'q'  => 'We opened a new nursing home and needed twenty two staff across nursing, housekeeping and front office. They ran the whole cycle and we opened on schedule.',
    'n'  => 'Mr. Rajesh Khanna',
    'r'  => 'Managing Director, Sunshine Nursing Home',
    'in' => 'RK',
  ),
);
?>
<section class="hp-section" aria-labelledby="quotes-title">
  <div class="hp-wrap">
    <div class="hp-head hp-head--center">
      <h2 class="hp-h2 hp-rise" id="quotes-title">What our clients say</h2>
    </div>

    <div data-quotes style="margin-top:40px;" class="hp-rise">
      <?php foreach ($hp_quotes as $i => $t): ?>
      <figure class="hp-quote" data-quote <?php echo $i ? 'hidden' : ''; ?>>
        <p class="hp-quote__stars" aria-label="Rated 5 out of 5">
          <i class="fa-solid fa-star" aria-hidden="true"></i><i class="fa-solid fa-star" aria-hidden="true"></i><i class="fa-solid fa-star" aria-hidden="true"></i><i class="fa-solid fa-star" aria-hidden="true"></i><i class="fa-solid fa-star" aria-hidden="true"></i>
        </p>
        <blockquote><?php echo htmlspecialchars($t['q'], ENT_QUOTES, 'UTF-8'); ?></blockquote>
        <figcaption>
          <span class="hp-quote__av" aria-hidden="true" style="display:grid;place-items:center;font-weight:700;font-size:.85rem;color:var(--hp-brand);background:var(--hp-brand-tint);"><?php echo $t['in']; ?></span>
          <span>
            <span class="hp-quote__nm"><?php echo htmlspecialchars($t['n'], ENT_QUOTES, 'UTF-8'); ?></span>
            <span class="hp-quote__ro"><?php echo htmlspecialchars($t['r'], ENT_QUOTES, 'UTF-8'); ?></span>
          </span>
        </figcaption>
      </figure>
      <?php endforeach; ?>

      <div class="hp-dots" role="tablist" aria-label="Choose a client quote">
        <?php foreach ($hp_quotes as $i => $t): ?>
        <button type="button" data-quote-dot role="tab"
                aria-current="<?php echo $i ? 'false' : 'true'; ?>"
                aria-label="Quote <?php echo $i + 1; ?> of <?php echo count($hp_quotes); ?>"></button>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>
