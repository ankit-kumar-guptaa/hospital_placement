<?php
/**
 * thankyou.php - where all four forms land after a successful submit.
 *
 * Two things were wrong with the page this replaces.
 *
 * It linked AOS's stylesheet, which sets [data-aos]{opacity:0} and waits for
 * AOS's JavaScript to add .aos-animate. That JavaScript was removed from the
 * site, so nothing ever added the class and the whole card sat at opacity 0:
 * the page loaded, and the visitor saw an empty screen.
 *
 * It also fired the Google Ads conversion without ever loading gtag, because
 * it built its own <head> instead of using include/seo.php. Every conversion
 * from every form threw "gtag is not defined" and was lost. Including seo.php
 * fixes that, and marks the page noindex on the way past.
 */
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
<?php include 'include/seo.php'; ?>

<!-- Google Ads conversion for a completed form. seo.php has already defined
     gtag above, so this now has something to fire into. -->
<script>
  gtag('event', 'conversion', {'send_to': 'AW-10893858085/yNPDCKzkkLwDEKWqzMoo'});
</script>
</head>

<body class="hp-body">

<?php include "include/header.php"; ?>

<main id="main" tabindex="-1">
  <section class="hp-ty" aria-labelledby="ty-title">
    <div class="hp-wrap">
      <div class="hp-ty__card">

        <span class="hp-ty__tick" aria-hidden="true">
          <i class="fa-solid fa-check"></i>
        </span>

        <h1 class="hp-ty__h1" id="ty-title">Thank you. We have your details.</h1>

        <p class="hp-ty__lead">
          Your enquiry has reached our recruitment team. A consultant who works
          your speciality will come back to you within one working day.
        </p>

        <p class="hp-ty__call">
          In a hurry? Call us on
          <?php
          $hp_ty_tel = function_exists('hp_page_phone')
              ? hp_page_phone()
              : array('+91 76690 73000', '+917669073000', 'India desk');
          ?>
          <a href="tel:<?php echo $hp_ty_tel[1]; ?>"><?php echo $hp_ty_tel[0]; ?></a>
        </p>

        <div class="hp-ty__act">
          <a class="hp-btn hp-btn--action" href="<?php echo hp_url(); ?>">Back to home</a>
          <a class="hp-btn hp-btn--ghost" href="<?php echo hp_url('jobs.php'); ?>">Explore jobs</a>
        </div>

        <p class="hp-ty__redirect">
          Taking you back to the home page in <span id="countdown">5</span> seconds.
          <button type="button" class="hp-ty__stay" id="ty-stay">Stay on this page</button>
        </p>

      </div>
    </div>
  </section>
</main>

<script>
  /* The countdown the page has always had, with one addition: it stops if the
     visitor is still reading. Redirecting somebody away mid sentence is the
     one thing a confirmation page must not do. */
  (function () {
    var el = document.getElementById('countdown');
    var stay = document.getElementById('ty-stay');
    var note = document.querySelector('.hp-ty__redirect');
    var left = 5;

    var timer = setInterval(function () {
      left -= 1;
      el.textContent = left;
      if (left <= 0) {
        clearInterval(timer);
        window.location.href = <?php echo json_encode(hp_url()); ?>;
      }
    }, 1000);

    function cancel() {
      clearInterval(timer);
      if (note) note.hidden = true;
    }

    stay.addEventListener('click', cancel);
    /* Any real sign of reading cancels it too. */
    ['keydown', 'wheel', 'touchstart'].forEach(function (ev) {
      window.addEventListener(ev, cancel, { once: true, passive: true });
    });
  })();
</script>

<?php include "include/footer.php"; ?>
