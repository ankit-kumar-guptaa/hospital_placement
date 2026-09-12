<?php
// service.php - the two audiences, side by side. Dual panel layout.
$hp_p2 = (strpos($_SERVER['PHP_SELF'], '/blog/') !== false) ? '/' : '';
?>
<section id="service" class="hp-section hp-section--canvas" aria-labelledby="audiences-title">
  <div class="hp-wrap">
    <div class="hp-head hp-head--center">
      <h2 class="hp-h2 hp-rise" id="audiences-title">Two sides of the same desk</h2>
      <p class="hp-lead hp-rise">The same consultant who briefs the hospital also briefs the candidate. That is why our shortlists hold.</p>
    </div>

    <div class="hp-duo" style="margin-top:44px;">

      <article class="hp-panel hp-panel--dark hp-rise">
        <span class="hp-panel__k">For hospitals and clinics</span>
        <h3>Fill the post, keep the ward running</h3>
        <p>Give us the role, the country and the salary band. You get a shortlist you can interview, not a pile of CVs to sort.</p>
        <ul class="hp-panel__list">
          <li><i class="fa-solid fa-check" aria-hidden="true"></i> Permanent, contract and locum hiring under one agreement</li>
          <li><i class="fa-solid fa-check" aria-hidden="true"></i> Registration and qualification verified before shortlisting</li>
          <li><i class="fa-solid fa-check" aria-hidden="true"></i> Salary benchmarked against your market and speciality</li>
          <li><i class="fa-solid fa-check" aria-hidden="true"></i> One named consultant from brief to joining date</li>
        </ul>
        <div class="hp-panel__foot">
          <a class="hp-btn hp-btn--action" href="<?php echo $hp_p2; ?>contact.php">Hire staff</a>
          <a class="hp-btn hp-btn--onDark" href="<?php echo $hp_p2; ?>healthcare-recruitment-for-hospitals.php">How it works</a>
        </div>
      </article>

      <article class="hp-panel hp-rise">
        <span class="hp-panel__k">For medical professionals</span>
        <h3>Move to the role you actually trained for</h3>
        <p>Register once and a consultant who knows your speciality works your case. No spray and pray applications.</p>
        <ul class="hp-panel__list">
          <li><i class="fa-solid fa-check" aria-hidden="true"></i> Roles in India, the Gulf and international markets, updated as hospitals brief us</li>
          <li><i class="fa-solid fa-check" aria-hidden="true"></i> Doctors, nurses, paramedical, pharma, diagnostics and administration</li>
          <li><i class="fa-solid fa-check" aria-hidden="true"></i> Guidance on licensing and documentation for overseas moves</li>
          <li><i class="fa-solid fa-check" aria-hidden="true"></i> Your CV is never sent to a hospital without your go ahead</li>
        </ul>
        <div class="hp-panel__foot">
          <a class="hp-btn" href="<?php echo $hp_p2; ?>jobs.php">Browse jobs</a>
          <a class="hp-btn hp-btn--ghost" href="<?php echo ($hp_p2 ?: '/'); ?>#find-a-job">Register your CV</a>
        </div>
      </article>

    </div>
  </div>
</section>
