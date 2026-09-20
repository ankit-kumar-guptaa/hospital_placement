<?php
/**
 * market-page.php - the body of a country landing page.
 *
 * The four markets in the topbar share a shape because they answer the same
 * four questions in the same order: what is this market, what stands between
 * a candidate and a job in it, what do hospitals here hire, and where exactly
 * do we cover. They do not share content. Everything below is read from
 * include/markets.php, and what differs between markets is the part that
 * actually differs in the work: the regulator, the exam, the timeline.
 *
 * The page it sits in supplies the hero (include/page-hero.php, driven by the
 * registry) and the footer. This file is everything between them.
 */
if (!function_exists('hp_markets')) require_once __DIR__ . '/markets.php';
if (!function_exists('hp_img'))     require_once __DIR__ . '/media.php';

$hp_mp  = hp_page();
$hp_mk  = ($hp_mp && !empty($hp_mp['market'])) ? hp_market($hp_mp['market']) : null;
if (!$hp_mk) return;

$hp_mk_key = $hp_mp['market'];
/* "hiring in India", but "hiring in the USA". */
$hp_in = htmlspecialchars(hp_mkt_in($hp_mk), ENT_QUOTES, 'UTF-8');
?>

<!-- The market brief: the paragraph a client reads, and beside it the four
     facts they came for, as a definition list rather than as four cards. -->
<section class="hp-section" aria-labelledby="mkt-brief-title">
  <div class="hp-wrap hp-mkt-brief">

    <div class="hp-mkt-brief__copy">
      <h2 class="hp-h2 hp-rise" id="mkt-brief-title">
        What hiring in <?php echo $hp_in; ?>
        actually <span class="hp-mark">turns on</span>
      </h2>
      <p class="hp-copy hp-rise" style="margin-top:18px;">
        <?php echo $hp_mk['opening']; ?>
      </p>
      <a class="hp-link hp-rise" href="<?php echo hp_url('contact.php'); ?>" style="margin-top:22px;">
        Talk to the <?php echo htmlspecialchars($hp_mk['name'], ENT_QUOTES, 'UTF-8'); ?> desk
        <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
      </a>
    </div>

    <dl class="hp-mkt-facts hp-rise">
      <?php foreach ($hp_mk['facts'] as $k => $v): ?>
      <div class="hp-mkt-fact">
        <dt><?php echo htmlspecialchars($k, ENT_QUOTES, 'UTF-8'); ?></dt>
        <dd><?php echo htmlspecialchars($v, ENT_QUOTES, 'UTF-8'); ?></dd>
      </div>
      <?php endforeach; ?>
    </dl>

  </div>
</section>


<!-- The route in. Numbered because the sequence is the information: these
     steps genuinely cannot be taken out of order, and a candidate who starts
     at step three is the candidate whose file stalls. -->
<section class="hp-process" aria-labelledby="mkt-route-title">
  <div class="hp-process__media" aria-hidden="true">
    <img src="<?php echo hp_img('process_bg', 1600); ?>"
         data-fallback="<?php echo hp_img_fallback('process_bg'); ?>"
         alt="" width="1600" height="700" loading="lazy" decoding="async">
  </div>

  <div class="hp-wrap hp-process__inner">
    <div class="hp-head">
      <h2 class="hp-h2 hp-rise" id="mkt-route-title">The route into <?php echo $hp_in; ?>, in order</h2>
      <p class="hp-lead hp-rise">Each step gates the next one. We run all four rather than handing a candidate a checklist and wishing them luck.</p>
    </div>

    <ol class="hp-steps">
      <?php foreach ($hp_mk['route'] as $n => $st): ?>
      <li class="hp-step hp-rise">
        <span class="hp-step__ico"><i class="fa-solid <?php echo $st[0]; ?>" aria-hidden="true"></i></span>
        <span class="hp-step__n"><?php echo $n + 1; ?>.</span>
        <span class="hp-step__t"><?php echo htmlspecialchars($st[1], ENT_QUOTES, 'UTF-8'); ?></span>
        <span class="hp-step__d"><?php echo htmlspecialchars($st[2], ENT_QUOTES, 'UTF-8'); ?></span>
      </li>
      <?php endforeach; ?>
    </ol>
  </div>
</section>


<!-- What this market briefs us for. Different lists per market, because a
     Gulf clinic network and an NHS trust do not hire the same people. -->
<section class="hp-section hp-section--canvas" aria-labelledby="mkt-roles-title">
  <div class="hp-wrap">
    <div class="hp-head hp-head--center">
      <h2 class="hp-h2 hp-rise" id="mkt-roles-title">What <?php echo htmlspecialchars($hp_mk['name'], ENT_QUOTES, 'UTF-8'); ?> employers brief us for</h2>
      <p class="hp-lead hp-rise">These are the roles that come up most, not the whole list. We recruit across every clinical and hospital administration family.</p>
    </div>

    <ul class="hp-rail" style="margin-top:44px;">
      <?php foreach ($hp_mk['roles'] as $r): ?>
      <li class="hp-chip hp-rise">
        <span class="hp-chip__ico"><i class="fa-solid <?php echo $r[0]; ?>" aria-hidden="true"></i></span>
        <b><?php echo htmlspecialchars($r[1], ENT_QUOTES, 'UTF-8'); ?></b>
        <span><?php echo htmlspecialchars($r[2], ENT_QUOTES, 'UTF-8'); ?></span>
      </li>
      <?php endforeach; ?>
    </ul>
  </div>
</section>


<?php if ($hp_mk['cover'] === 'cities'): $hp_cities = hp_india_cities(); ?>
<!-- India: the city desks, each with its own page. These are the pages the
     search traffic arrives on, so they are shown as themselves rather than
     summarised. -->
<section class="hp-section" id="cities" aria-labelledby="mkt-cities-title">
  <div class="hp-wrap">
    <div class="hp-head">
      <h2 class="hp-h2 hp-rise" id="mkt-cities-title">Our city desks across India</h2>
      <p class="hp-lead hp-rise">Each desk holds the pay bands, the notice period habits and the candidates for its own city. Open one to see how that market hires.</p>
    </div>

    <div class="hp-places hp-places--wide" style="margin-top:44px;">
      <?php foreach ($hp_cities as $file => $c): ?>
      <a class="hp-place hp-rise" href="<?php echo hp_url($file); ?>">
        <img src="<?php echo hp_img($c['img'], 520); ?>"
             data-fallback="<?php echo hp_img_fallback($c['img']); ?>"
             alt="<?php echo hp_img_alt($c['img']); ?>"
             width="520" height="420" loading="lazy" decoding="async">
        <span class="hp-place__on">
          <span class="hp-place__c">India</span>
          <span class="hp-place__n"><?php echo htmlspecialchars($c['city'], ENT_QUOTES, 'UTF-8'); ?></span>
          <span class="hp-place__g">View local roles <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></span>
        </span>
      </a>
      <?php endforeach; ?>
    </div>

    <p class="hp-small hp-rise" style="margin-top:26px;">
      Hiring outside these six cities? We recruit nationwide from New Delhi.
      Healthcare professionals in the capital region can also talk to our
      <a class="hp-link" href="<?php echo hp_url('hospital-job-consultants-delhi-ncr-india.php'); ?>" style="display:inline-flex; vertical-align:baseline;">hospital job consultants for Delhi NCR <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
    </p>
  </div>
</section>

<?php else: ?>
<!-- Everywhere else: where inside the market we actually operate, and the
     caveat that goes with it. Named plainly, with no link to a page that
     does not exist yet. -->
<section class="hp-section" aria-labelledby="mkt-cover-title">
  <div class="hp-wrap">
    <div class="hp-head">
      <h2 class="hp-h2 hp-rise" id="mkt-cover-title">Where we place inside <?php echo $hp_in; ?></h2>
    </div>

    <ul class="hp-cover" style="margin-top:36px;">
      <?php foreach ($hp_mk['list'] as $c): ?>
      <li class="hp-cover__row hp-rise">
        <span class="hp-cover__n"><?php echo htmlspecialchars($c[0], ENT_QUOTES, 'UTF-8'); ?></span>
        <span class="hp-cover__d"><?php echo htmlspecialchars($c[1], ENT_QUOTES, 'UTF-8'); ?></span>
      </li>
      <?php endforeach; ?>
    </ul>

    <?php if (!empty($hp_mk['note'])): ?>
    <p class="hp-cover__note hp-rise">
      <i class="fa-solid fa-circle-info" aria-hidden="true"></i>
      <span><?php echo htmlspecialchars($hp_mk['note'], ENT_QUOTES, 'UTF-8'); ?></span>
    </p>
    <?php endif; ?>
  </div>
</section>
<?php endif; ?>


<!-- The two audiences, in this market's own words. -->
<section class="hp-section hp-section--canvas" aria-labelledby="mkt-duo-title">
  <div class="hp-wrap">
    <div class="hp-head hp-head--center">
      <h2 class="hp-h2 hp-rise" id="mkt-duo-title">Two sides of the <?php echo htmlspecialchars($hp_mk['name'], ENT_QUOTES, 'UTF-8'); ?> desk</h2>
    </div>

    <div class="hp-duo" style="margin-top:44px;">

      <article class="hp-panel hp-panel--dark hp-rise">
        <span class="hp-panel__k">If you are hiring in <?php echo $hp_in; ?></span>
        <h3>Give us the post, not a job advert</h3>
        <p>Tell us the role, the grade and the band. You get a shortlist that has already cleared this market's registration and documentation requirements.</p>
        <ul class="hp-panel__list">
          <li><i class="fa-solid fa-check" aria-hidden="true"></i> Candidates screened against <?php echo htmlspecialchars($hp_mk['name'], ENT_QUOTES, 'UTF-8'); ?> requirements before you see them</li>
          <li><i class="fa-solid fa-check" aria-hidden="true"></i> Salary benchmarked against what this market pays now</li>
          <li><i class="fa-solid fa-check" aria-hidden="true"></i> Permanent, contract and locum hiring on one agreement</li>
          <li><i class="fa-solid fa-check" aria-hidden="true"></i> One named consultant from the brief to the joining date</li>
        </ul>
        <div class="hp-panel__foot">
          <a class="hp-btn hp-btn--action" href="/#hire"
             data-modal-open="hp-formmodal" data-modal-tab="hp-tab-employer">Post a requirement</a>
          <a class="hp-btn hp-btn--onDark" href="<?php echo hp_url('healthcare-recruitment-for-hospitals.php'); ?>">How we work</a>
        </div>
      </article>

      <article class="hp-panel hp-rise">
        <span class="hp-panel__k">If you want to work in <?php echo $hp_in; ?></span>
        <h3>Find out where you actually stand</h3>
        <p>Send your CV and we will tell you which step of the route above you are on, what it will cost and how long it realistically takes. Before you spend anything.</p>
        <ul class="hp-panel__list">
          <li><i class="fa-solid fa-check" aria-hidden="true"></i> An honest read of your eligibility, not an enrolment pitch</li>
          <li><i class="fa-solid fa-check" aria-hidden="true"></i> Guidance through registration, examination and documentation</li>
          <li><i class="fa-solid fa-check" aria-hidden="true"></i> Our placement fee is paid by the employer</li>
          <li><i class="fa-solid fa-check" aria-hidden="true"></i> Your CV is never sent to a hospital without your go ahead</li>
        </ul>
        <div class="hp-panel__foot">
          <a class="hp-btn" href="/#find-a-job"
             data-modal-open="hp-formmodal" data-modal-tab="hp-tab-jobseeker">Register your CV</a>
          <a class="hp-btn hp-btn--ghost" href="<?php echo hp_url('jobs.php'); ?>">Browse jobs</a>
        </div>
      </article>

    </div>
  </div>
</section>


<?php include __DIR__ . '/page-faq.php'; ?>

<?php
/* The other three markets, so the nav is not the only way across. The home
   page owns the full band; here it is a compact row at the foot. */
$hp_mkt_others = $hp_mk_key;
$hp_mkt_head   = false;
include __DIR__ . '/market-nav.php';
?>

<?php include __DIR__ . '/cta.php'; ?>
