<?php
/**
 * faq.php - questions we are actually asked, plus the FAQPage structured
 * data generated from the same array, so the markup and the schema can
 * never drift apart.
 */
$hp_p4 = (strpos($_SERVER['PHP_SELF'], '/blog/') !== false) ? '/' : '';
$hp_years = (int) date('Y') - 2010;

$hp_faq = array(
  array(
    'q' => 'Which healthcare roles do you recruit for?',
    'a' => 'Five role families. Doctors across all major specialities, nurses from ANM and GNM through to post-basic B.Sc, paramedical and diagnostics staff including lab, radiology, dialysis and OT technicians, pharma roles across clinical, quality, manufacturing and sales, and hospital administration covering billing, medical records, TPA, purchasing and facilities.',
  ),
  array(
    'q' => 'How does your fee model work?',
    'a' => 'We work on a pay on success basis. There is no retainer and no upfront listing charge. Our fee becomes due once your candidate joins and clears the guarantee period agreed in writing before the search starts.',
  ),
  array(
    'q' => 'Which cities and countries do you cover?',
    'a' => 'Across India we run dedicated desks for Delhi NCR, Mumbai, Hyderabad, Chandigarh, Kolkata and Lucknow, and we recruit nationwide from our New Delhi office. Our Ajman office covers the Emirates and the wider Gulf, and we place candidates into international markets from both offices. Tell us the country you are hiring for and we will confirm the desk that handles it.',
  ),
  array(
    'q' => 'How quickly can you send a shortlist?',
    'a' => 'It depends on the role. Ward nursing, administration and most paramedical posts move fastest because we hold pre-screened candidates. Super-speciality consultant and head of department searches take longer because they are head hunted rather than advertised. We commit to a timeline with you when we take the brief, not after.',
  ),
  array(
    'q' => 'Do you help candidates moving abroad?',
    'a' => 'Yes, that is a large part of what we do. Practising clinically in another country means holding a licence from that country health authority, and each one sets its own examination and document requirements. We tell you which pathway applies to your qualification, what paperwork to prepare, and we coordinate the employer side of the process.',
  ),
  array(
    'q' => 'Are you certified, and how long have you been doing this?',
    'a' => 'HospitalPlacement.com is an ISO 9001:2000 certified recruitment consultancy and has worked exclusively in healthcare staffing since 2010, which is ' . $hp_years . ' years of placements into hospitals, nursing homes and diagnostic centres in India and overseas.',
  ),
  array(
    'q' => 'Do you charge job seekers a placement fee?',
    'a' => 'Registering with us is free for candidates. Our fee is paid by the hiring hospital or clinic. If anyone asks you for money to be placed through us, tell us before you pay anything.',
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
      <a class="hp-link" href="<?php echo $hp_p4; ?>contact.php" style="display:inline-flex; vertical-align:baseline;">Ask our team <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
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
