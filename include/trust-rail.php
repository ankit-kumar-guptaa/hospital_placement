<?php
// trust-rail.php - credential strip. Sits directly under the hero, never inside it.
$hp_years = (int) date('Y') - 2010;
?>
<section class="hp-section hp-section--tight" aria-label="Our credentials">
  <div class="hp-wrap">
    <ul class="hp-facts hp-facts--band">
      <li class="hp-rise">
        <b>ISO 9001:2000</b>
        <span>Certified recruitment process</span>
      </li>
      <li class="hp-rise">
        <b><?php echo $hp_years; ?> years</b>
        <span>Healthcare staffing since 2010</span>
      </li>
      <li class="hp-rise">
        <b>Worldwide</b>
        <span>India, the Gulf and international markets</span>
      </li>
      <li class="hp-rise">
        <b>5 role families</b>
        <span>Doctors, nurses, paramedical, pharma, admin</span>
      </li>
    </ul>
  </div>
</section>
