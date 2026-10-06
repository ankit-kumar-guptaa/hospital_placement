<?php
/**
 * ensure.php - what sits behind every shortlist, as a sliding rail.
 *
 * Six checks rather than five, and the row slides rather than squeezing six
 * cards into one screen width. The rail is a scroll-snap container, so it is
 * a swipe on a phone and a pair of arrows on a desktop, with no library and
 * no auto-advance: it moves when the reader asks it to.
 */
$hp_ensure = array(
  array('fa-users', 'Right people',
        'Screened against your brief, not against a keyword list.'),
  array('fa-certificate', 'Right skills',
        'Qualifications, registration and experience checked before shortlisting.'),
  array('fa-handshake-angle', 'Right behaviour',
        'Bedside manner and team fit assessed at interview stage.'),
  array('fa-location-crosshairs', 'Right place',
        'Candidates who will actually relocate and stay in post.'),
  array('fa-scale-balanced', 'Right cost',
        'Salary benchmarked to your city and the role you are filling.'),
  array('fa-file-shield', 'Right paperwork',
        'Registration, licence and documents in order, so the joining date does not slip.'),
);
?>
<section class="hp-section hp-section--canvas" aria-labelledby="ensure-title">
  <div class="hp-wrap">
    <div class="hp-head hp-head--center">
      <h2 class="hp-h2 hp-rise" id="ensure-title">What every shortlist we send you carries</h2>
      <p class="hp-lead hp-rise">Six checks sit behind each candidate, so the interview is about fit and not about verification.</p>
    </div>

    <div class="hp-railwrap hp-rise" data-rail style="margin-top:44px;">
      <ul class="hp-rail hp-rail--slide" id="ensure-rail" tabindex="0"
          aria-label="The six checks behind every shortlist">
        <?php foreach ($hp_ensure as $hp_en): ?>
        <li class="hp-chip">
          <span class="hp-chip__ico"><i class="fa-solid <?php echo $hp_en[0]; ?>" aria-hidden="true"></i></span>
          <b><?php echo $hp_en[1]; ?></b>
          <span><?php echo $hp_en[2]; ?></span>
        </li>
        <?php endforeach; ?>
      </ul>

      <div class="hp-rail__nav" hidden>
        <button type="button" class="hp-rail__btn" data-rail-prev
                aria-controls="ensure-rail" aria-label="Show previous checks">
          <i class="fa-solid fa-chevron-left" aria-hidden="true"></i>
        </button>
        <button type="button" class="hp-rail__btn" data-rail-next
                aria-controls="ensure-rail" aria-label="Show more checks">
          <i class="fa-solid fa-chevron-right" aria-hidden="true"></i>
        </button>
      </div>
    </div>
  </div>
</section>
