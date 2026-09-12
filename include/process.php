<?php
/**
 * process.php - "How It Works", the four-step recruitment process from the
 * brand deck, on a navy band over a photograph.
 */
if (!function_exists('hp_img')) { require_once __DIR__ . '/media.php'; }

$hp_steps = array(
  array('fa-file-lines',   'Share Requirement',        'Tell us your staffing needs and preferences.'),
  array('fa-users',        'Get Shortlisted Candidates','We share pre-screened profiles within the agreed timeline.'),
  array('fa-comments',     'Interview',                 'Select the best fit for your team.'),
  array('fa-circle-check', 'Successful Placement',      'We ensure a smooth joining and follow up.'),
);
?>
<section class="hp-process" aria-labelledby="process-title">
  <div class="hp-process__media" aria-hidden="true">
    <img src="<?php echo hp_img('process_bg', 1600); ?>"
         data-fallback="<?php echo hp_img_fallback('process_bg'); ?>"
         alt="" width="1600" height="700" loading="lazy" decoding="async">
  </div>

  <div class="hp-wrap hp-process__inner">
    <div class="hp-head">
      <h2 class="hp-h2 hp-rise" id="process-title">How It Works</h2>
      <p class="hp-lead hp-rise">A simple and efficient recruitment process.</p>
    </div>

    <ol class="hp-steps">
      <?php foreach ($hp_steps as $n => $st): ?>
      <li class="hp-step hp-rise">
        <span class="hp-step__ico"><i class="fa-solid <?php echo $st[0]; ?>" aria-hidden="true"></i></span>
        <span class="hp-step__n"><?php echo $n + 1; ?>.</span>
        <span class="hp-step__t"><?php echo $st[1]; ?></span>
        <span class="hp-step__d"><?php echo $st[2]; ?></span>
      </li>
      <?php endforeach; ?>
    </ol>
  </div>
</section>
