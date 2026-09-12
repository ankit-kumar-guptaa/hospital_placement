<?php
// solution.php - six recruitment solutions as a bento grid.
// Exactly six cells for six items: one wide photo cell, one brand fill,
// one tint, three plain. No empty tiles.
if (!function_exists('hp_img')) { require_once __DIR__ . '/media.php'; }
$hp_years = (int) date('Y') - 2010;
?>
<section class="hp-section" aria-labelledby="solutions-title">
  <div class="hp-wrap">
    <div class="hp-head">
      <p class="hp-eyebrow hp-rise">
        <i class="fa-solid fa-diagram-project" aria-hidden="true"></i> Our solutions
      </p>
      <h2 class="hp-h2 hp-rise" id="solutions-title">Six ways hospitals hand us their hiring</h2>
      <p class="hp-lead hp-rise">Take the whole recruitment cycle off your desk, or use us only for the roles your own team cannot reach. Both work.</p>
    </div>

    <div class="hp-bento" style="margin-top:44px;">

      <article class="hp-cell hp-cell--w2 hp-cell--t2 hp-cell--media hp-rise">
        <img src="<?php echo hp_img('solutions_media', 900); ?>"
             data-fallback="<?php echo hp_img_fallback('solutions_media'); ?>"
             alt="<?php echo hp_img_alt('solutions_media'); ?>"
             width="900" height="500" loading="lazy" decoding="async">
        <div class="hp-cell__on">
          <h3 class="hp-h3">Complete recruitment process outsourcing</h3>
          <p>We run sourcing, screening, interview scheduling, offer and joining for a department or for the whole hospital. Your HR team stays on retention and compliance.</p>
        </div>
      </article>

      <article class="hp-cell hp-cell--t2 hp-cell--fill hp-rise">
        <span class="hp-cell__ico"><i class="fa-solid fa-handshake" aria-hidden="true"></i></span>
        <h3 class="hp-h3">Pay on success</h3>
        <p>No retainer and no upfront listing cost. Our fee falls due when your candidate joins and clears the agreed guarantee period.</p>
      </article>

      <article class="hp-cell hp-rise">
        <span class="hp-cell__ico"><i class="fa-solid fa-bolt" aria-hidden="true"></i></span>
        <h3 class="hp-h3">Short notice cover</h3>
        <p>A resignation on a critical ward does not wait. We keep pre-screened locum and contract staff ready for urgent gaps.</p>
      </article>

      <article class="hp-cell hp-cell--w2 hp-cell--tint hp-rise">
        <span class="hp-cell__ico"><i class="fa-solid fa-clipboard-check" aria-hidden="true"></i></span>
        <h3 class="hp-h3">Pre-screening that holds up</h3>
        <p>Registration, qualification and experience verified before a CV reaches you, so your panel interviews three real candidates rather than thirty maybes.</p>
      </article>

      <article class="hp-cell hp-rise">
        <span class="hp-cell__ico"><i class="fa-solid fa-database" aria-hidden="true"></i></span>
        <h3 class="hp-h3">A deep candidate base</h3>
        <p>Doctors, nurses, paramedical, pharma, diagnostics and hospital administration, built up across <?php echo $hp_years; ?> years of placements.</p>
      </article>

      <article class="hp-cell hp-cell--w2 hp-rise">
        <span class="hp-cell__ico"><i class="fa-solid fa-crosshairs" aria-hidden="true"></i></span>
        <h3 class="hp-h3">Head hunting</h3>
        <p>For heads of department, super-specialists and leadership roles we approach the people who are not answering job adverts.</p>
      </article>

    </div>
  </div>
</section>
