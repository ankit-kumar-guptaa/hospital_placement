<?php
require_once __DIR__ . '/pages.php';
// footer.php - site footer plus the shared script tail. Every script that was
// loaded here before is still loaded here, in the same order.
$hp_pf = (strpos($_SERVER['PHP_SELF'], '/blog/') !== false) ? '/' : '';
?>

<footer class="hp-footer">
  <div class="hp-wrap hp-footer__top">

    <div>
      <img class="hp-footer__logo"
           src="https://hosptal.hospitalplacement.com/wp-content/uploads/2021/05/logo-220.jpg"
           alt="HospitalPlacement.com" width="120" height="56" loading="lazy">
      <p class="hp-footer__about">
        A healthcare recruitment consultancy working only in medical staffing since 2010.
        ISO 9001:2000 certified, placing doctors, nurses, paramedical and hospital
        administration staff for hospitals in India, the Gulf and international
        markets, from our offices in New Delhi and Ajman.
      </p>
      <div class="hp-social" style="margin-top:22px;">
        <a href="https://www.instagram.com/hospital_placement?igsh=MWttN2JqZXp1OGRzaw==" aria-label="HospitalPlacement on Instagram" rel="noopener">
          <i class="fab fa-instagram" aria-hidden="true"></i>
        </a>
        <a href="https://www.linkedin.com/posts/hospital-placement_healthcare-facts-hospitalplacement-activity-7289623509473861632-Grtu?utm_source=share&utm_medium=member_android&rcm=ACoAADP699QBNUaBQI6EsjAd4G-1BINWmnVfT6g" aria-label="HospitalPlacement on LinkedIn" rel="noopener">
          <i class="fab fa-linkedin-in" aria-hidden="true"></i>
        </a>
      </div>
    </div>

    <nav aria-labelledby="foot-co">
      <h2 id="foot-co">Company</h2>
      <ul class="hp-fnav">
        <li><a href="<?php echo hp_url(); ?>">Home</a></li>
        <li><a href="<?php echo hp_url('about.php'); ?>">About Us</a></li>
        <li><a href="<?php echo hp_url('solutions.php'); ?>">Solutions</a></li>
        <li><a href="<?php echo hp_url('jobs.php'); ?>">Jobs</a></li>
        <li><a href="/blog/">Blog</a></li>
        <li><a href="<?php echo hp_url('contact.php'); ?>">Contact Us</a></li>
        <li><a href="<?php echo hp_url('privacy-policy.php'); ?>">Privacy Policy</a></li>
      </ul>
    </nav>

    <nav aria-labelledby="foot-sv">
      <h2 id="foot-sv">Services</h2>
      <ul class="hp-fnav">
        <li><a href="<?php echo hp_url('doctor-placement-services.php'); ?>">Doctor Placement</a></li>
        <li><a href="<?php echo hp_url('nurse-staffing-agency-india.php'); ?>">Nurse Staffing</a></li>
        <li><a href="<?php echo hp_url('paramedical-recruitment-agency.php'); ?>">Paramedical Recruitment</a></li>
        <li><a href="<?php echo hp_url('specialty-placement.php'); ?>">Specialty Placements</a></li>
        <li><a href="<?php echo hp_url('permanent-placement.php'); ?>">Permanent Placement</a></li>
        <li><a href="<?php echo hp_url('temporary-staffing-services.php'); ?>">Temporary Staffing</a></li>
        <li><a href="<?php echo hp_url('healthcare-recruitment-for-hospitals.php'); ?>">Recruitment for Hospitals</a></li>
      </ul>
    </nav>

    <div>
      <h2>Talk to us</h2>
      <div class="hp-office">
        <div class="hp-office__row">
          <i class="fa-solid fa-location-dot" aria-hidden="true"></i>
          <span>
            <span class="hp-office__k">India</span>
            <span class="hp-office__v">A-83, Okhla Phase II, New Delhi 110020</span>
            <span class="hp-office__v"><a href="tel:+919871916980">+91 98719 16980</a></span>
          </span>
        </div>
        <div class="hp-office__row">
          <i class="fa-solid fa-location-dot" aria-hidden="true"></i>
          <span>
            <span class="hp-office__k">United Arab Emirates</span>
            <span class="hp-office__v">BC-889265, 26th Floor, Amber Gem Tower, Ajman</span>
            <span class="hp-office__v"><a href="tel:+971582348005">+971 58 234 8005</a></span>
          </span>
        </div>
        <div class="hp-office__row">
          <i class="fa-solid fa-envelope" aria-hidden="true"></i>
          <span>
            <span class="hp-office__k">Email</span>
            <span class="hp-office__v"><a href="mailto:info@hospitalplacement.com">info@hospitalplacement.com</a></span>
          </span>
        </div>
      </div>
    </div>
  </div>

  <div class="hp-wrap">
    <div class="hp-footer__bot">
      <p>&copy; <?php echo date('Y'); ?> HospitalPlacement.com. All rights reserved.</p>
      <ul class="hp-legal">
        <li><a href="<?php echo hp_url('privacy-policy.php'); ?>">Privacy Policy</a></li>
        <li><a href="<?php echo hp_url('contact.php'); ?>">Contact Us</a></li>
        <li><a href="<?php echo hp_url('jobs.php'); ?>">Current Openings</a></li>
      </ul>
    </div>
  </div>
</footer>

<div class="hp-dock">
  <a class="hp-dock__wa" href="https://wa.me/+971582348005" rel="noopener">
    <i class="fab fa-whatsapp" aria-hidden="true"></i><span>Chat on WhatsApp</span>
  </a>
  <a class="hp-dock__tel" href="tel:+919871916980">
    <i class="fa-solid fa-phone" aria-hidden="true"></i><span>Call our India office</span>
  </a>
</div>


<!-- AOS used to run here. The data-aos attributes on the pages are now read
     by the reveal in assets/js/theme.js, which uses an IntersectionObserver
     instead of a scroll listener and animates only transform and opacity.
     That removed a 15KB render blocking library and the flash of unstyled
     content it caused before it booted. -->

<script>
  // Count-up for the .counter elements in the stat band.
  document.addEventListener("DOMContentLoaded", () => {
    const counters = document.querySelectorAll('.counter');
    if (!counters.length) return;

    const reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    // 10000 reads as 10,000 the way the brand deck shows it.
    const fmt = (n) => n.toLocaleString('en-US');

    const animateCounter = (counter) => {
      const target = +counter.getAttribute('data-target');
      if (reduce) { counter.innerText = fmt(target); return; }

      const start = performance.now();
      const duration = 1100;

      const step = (now) => {
        const p = Math.min((now - start) / duration, 1);
        // ease-out so the number settles rather than stopping dead
        const eased = 1 - Math.pow(1 - p, 3);
        counter.innerText = fmt(Math.round(target * eased));
        if (p < 1) requestAnimationFrame(step);
        else counter.innerText = fmt(target);
      };
      requestAnimationFrame(step);
    };

    counters.forEach(counter => {
      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            animateCounter(entry.target);
            observer.unobserve(entry.target);
          }
        });
      }, { threshold: 0.5 });
      observer.observe(counter);
    });
  });
</script>

<script src="/assets/script.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JS (Optional for some features like modals, dropdowns, etc.) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Google reCAPTCHA v3 integration -->
<script src="/assets/js/recaptcha.js"></script>

<!-- Redesigned theme behaviour: reveal, nav, drawer, hero tabs, FAQ, quotes -->
<script src="/assets/js/theme.js" defer></script>
</body>
</html>
