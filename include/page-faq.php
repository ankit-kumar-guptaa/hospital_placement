<?php
/**
 * page-faq.php - the FAQ block for any page whose registry entry defines one.
 *
 * AEO: the questions are phrased the way people actually ask them and each
 * answer opens with the answer itself rather than a preamble, so an answer
 * engine can lift a complete response. seo.php emits the matching FAQPage.
 */
if (!function_exists('hp_pages')) require_once __DIR__ . '/pages.php';
$p = hp_page();
if (!$p || empty($p['faq'])) return;
?>
<section class="hp-section hp-section--canvas" aria-labelledby="pfaq-title">
  <div class="hp-wrap">
    <div class="hp-head hp-head--center">
      <h2 class="hp-h2 hp-rise" id="pfaq-title">Questions we are asked about <?php echo htmlspecialchars($p['kw'], ENT_QUOTES, 'UTF-8'); ?></h2>
    </div>

    <div class="hp-faq" style="margin-top:36px;">
      <?php foreach ($p['faq'] as $i => $f): ?>
      <div class="hp-faq__item hp-rise<?php echo $i === 0 ? ' is-open' : ''; ?>">
        <h3>
          <button type="button" class="hp-faq__q" aria-expanded="<?php echo $i === 0 ? 'true' : 'false'; ?>"
                  aria-controls="pfaq-a-<?php echo $i; ?>" id="pfaq-q-<?php echo $i; ?>">
            <span><?php echo htmlspecialchars($f['q'], ENT_QUOTES, 'UTF-8'); ?></span>
            <i class="fa-solid fa-chevron-down" aria-hidden="true"></i>
          </button>
        </h3>
        <div class="hp-faq__a" id="pfaq-a-<?php echo $i; ?>" role="region" aria-labelledby="pfaq-q-<?php echo $i; ?>">
          <div><p><?php echo htmlspecialchars($f['a'], ENT_QUOTES, 'UTF-8'); ?></p></div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>

    <p class="hp-small hp-rise" style="text-align:center; margin-top:30px;">
      Something not covered here?
      <a class="hp-link" href="<?php echo hp_url('contact.php'); ?>" style="display:inline-flex; vertical-align:baseline;">Ask our team <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></a>
    </p>
  </div>
</section>
