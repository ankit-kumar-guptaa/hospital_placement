<?php
require_once __DIR__ . '/pages.php';
/**
 * faq.php - questions we are actually asked, plus the FAQPage structured
 * data generated from the same array, so the markup and the schema can
 * never drift apart.
 */
$hp_p4 = (strpos($_SERVER['PHP_SELF'], '/blog/') !== false) ? '/' : '';

$hp_faq = array(
  array(
    'q' => 'Which healthcare roles do you recruit for?',
    'a' => 'Five role families. Doctors across all major specialities, nurses from ANM and GNM through to post-basic B.Sc, paramedical and diagnostics staff including lab, radiology, dialysis and OT technicians, pharma roles across clinical, quality, manufacturing and sales, and hospital administration covering billing, medical records, TPA, purchasing and facilities.',
  ),
  array(
    'q' => 'How does your fee model work?',
    'a' => 'Let us discuss it. We keep our fee structure transparent, flexible and designed to work in your favour.',
  ),
  array(
    'q' => 'Which cities and countries do you cover?',
    'a' => 'We serve all locations in India and the UAE. Locations in the USA and Europe are to be discussed.',
  ),
  array(
    'q' => 'How quickly can you send a shortlist?',
    'a' => 'We keep searches as fast as we can, however it depends on the specific role and requirement.',
  ),
  array(
    'q' => 'Do you help candidates moving abroad?',
    'a' => 'Generally we do not. That is pretty much between the hospital and the candidate. Our role is to match the right candidate with the requirement.',
  ),
  array(
    'q' => 'Are you certified, and how long have you been doing this?',
    'a' => 'Yes, we are certified, and we have been serving since 2010.',
  ),
  array(
    'q' => 'Do you charge job seekers a placement fee?',
    'a' => 'We never charge any jobseeker in any circumstance.',
  ),
);
?>
<section class="hp-section hp-section--canvas" aria-labelledby="faq-title">
  <div class="hp-wrap">
    <div class="hp-head hp-head--center">
      <h2 class="hp-h2 hp-rise" id="faq-title">Questions before you brief us</h2>
    </div>

    <div class="hp-faq" style="margin-top:40px;">
      <?php foreach ($hp_faq as $i => $f): ?>
      <div class="hp-faq__item hp-rise<?php echo $i === 0 ? ' is-open' : ''; ?>">
        <h3>
          <button type="button" class="hp-faq__q" aria-expanded="<?php echo $i === 0 ? 'true' : 'false'; ?>"
                  aria-controls="faq-a-<?php echo $i; ?>" id="faq-q-<?php echo $i; ?>">
            <span><?php echo htmlspecialchars($f['q'], ENT_QUOTES, 'UTF-8'); ?></span>
            <i class="fa-solid fa-chevron-down" aria-hidden="true"></i>
          </button>
        </h3>
        <div class="hp-faq__a" id="faq-a-<?php echo $i; ?>" role="region" aria-labelledby="faq-q-<?php echo $i; ?>">
          <div><p><?php echo htmlspecialchars($f['a'], ENT_QUOTES, 'UTF-8'); ?></p></div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>

    <p class="hp-small hp-rise" style="text-align:center; margin-top:34px;">
      Something not covered here?
      <a class="hp-link" href="<?php echo hp_url('contact.php'); ?>" style="display:inline-flex; vertical-align:baseline;">Ask our team <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
    </p>
  </div>
</section>

<script type="application/ld+json">
<?php
echo json_encode(array(
  '@context' => 'https://schema.org',
  '@type'    => 'FAQPage',
  'mainEntity' => array_map(function ($f) {
      return array(
        '@type' => 'Question',
        'name'  => $f['q'],
        'acceptedAnswer' => array('@type' => 'Answer', 'text' => $f['a']),
      );
  }, $hp_faq),
), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
?>
</script>
