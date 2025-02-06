<footer class="footer py-5" style="background: linear-gradient(135deg, #2c3e50, #34495e); overflow: hidden;">
  <div class="container">
    <div class="row text-light">
      <!-- Logo and About Section -->
      <div class="col-md-4 mb-4 mb-md-0" data-aos="fade-up" data-aos-delay="100">
        <img src="https://hospitalplacement.com/wp-content/uploads/2021/05/logo-220.jpg" alt="HospitalPlacement Logo" class="mb-3" style="width: 180px;">
        <p style="color: #dcdde1; line-height: 1.8;">
          HospitalPlacement.com is your trusted partner in medical recruitment, offering seamless staffing solutions for healthcare facilities nationwide. Bridging talent with opportunity since 2010.
        </p>
      </div>

      <!-- Quick Links Section -->
      <div class="col-md-4 mb-4 mb-md-0" data-aos="fade-up" data-aos-delay="200">
        <h5 class="fw-bold text-uppercase mb-3" style="color: #ecf0f1;">Quick Links</h5>
        <ul class="list-unstyled">
          <li class="mb-2">
            <a href="#home" class="text-decoration-none" style="color: #1abc9c; transition: color 0.3s;">
              <i class="fa fa-home me-2"></i>Home
            </a>
          </li>
          <li class="mb-2">
            <a href="#services" class="text-decoration-none" style="color: #1abc9c; transition: color 0.3s;">
              <i class="fa fa-briefcase me-2"></i>Services
            </a>
          </li>
          <li class="mb-2">
            <a href="#about" class="text-decoration-none" style="color: #1abc9c; transition: color 0.3s;">
              <i class="fa fa-info-circle me-2"></i>About Us
            </a>
          </li>
          <li>
            <a href="#contact" class="text-decoration-none" style="color: #1abc9c; transition: color 0.3s;">
              <i class="fa fa-phone me-2"></i>Contact
            </a>
          </li>
        </ul>
      </div>

      <!-- Contact Info Section -->
      <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
        <h5 class="fw-bold text-uppercase mb-3" style="color: #ecf0f1;">Contact Us</h5>
        <ul class="list-unstyled">
          <li class="mb-3">
            <i class="fa fa-map-marker-alt me-2" style="color: #1abc9c;"></i>
            <span style="color: #dcdde1;">916, Astralis Tower, Supernova, Sector 94, Noida</span>
          </li>
          <li class="mb-3">
            <i class="fa fa-envelope me-2" style="color: #1abc9c;"></i>
            <a href="mailto:info@hospitalplacement.com" style="color: #1abc9c; text-decoration: none; transition: color 0.3s;">
              info@hospitalplacement.com
            </a>
          </li>
          <li>
            <i class="fa fa-phone-alt me-2" style="color: #1abc9c;"></i>
            <a href="tel:+919870364340" style="color: #1abc9c; text-decoration: none; transition: color 0.3s;">
              +91 98703 64340
            </a>
          </li>
        </ul>
      </div>
    </div>

    <hr class="text-muted my-4" style="border-color: rgba(236, 240, 241, 0.2);">

    <!-- Footer Bottom -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center text-light">
      <p class="mb-2 mb-md-0">&copy; 2025 HospitalPlacement.com. All rights reserved.</p>
      <div>
        <a href="#" class="text-light me-3" style="font-size: 18px; color: #1abc9c; transition: color 0.3s;">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a href="#" class="text-light me-3" style="font-size: 18px; color: #1abc9c; transition: color 0.3s;">
          <i class="fab fa-twitter"></i>
        </a>
        <a href="#" class="text-light" style="font-size: 18px; color: #1abc9c; transition: color 0.3s;">
          <i class="fab fa-linkedin-in"></i>
        </a>
      </div>
    </div>
  </div>
</footer>


  <!-- GSAP CDN -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
//  AOS.init({
//         duration: 800, // Animation duration in ms
//         easing: 'ease-in-out', // Animation easing
//         once: true // Animation happens only once
//     });

AOS.init({
        duration: 1000, // Animation duration in ms
        easing: 'ease-in-out', // Animation easing
        once: true, // Animation happens only once
        offset: 100, // Trigger animation when 200px above the section's center
        anchorPlacement: 'top-center', // Animations trigger when the top of the section is near the center of the viewport
    });
</script>
<script>
  document.addEventListener("DOMContentLoaded", () => {
    const counters = document.querySelectorAll('.counter');

    const animateCounter = (counter) => {
      const target = +counter.getAttribute('data-target');
      const speed = 200;

      const updateCount = () => {
        const current = +counter.innerText;
        const increment = Math.ceil(target / speed);

        if (current < target) {
          counter.innerText = current + increment;
          setTimeout(updateCount, 10);
        } else {
          counter.innerText = target;
        }
      };

      updateCount();
    };

    const observeCounters = () => {
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
    };

    observeCounters();
  });
</script>



<script src="assets/animation.js"></script>
<!-- Bootstrap JS (Optional for some features like modals, dropdowns, etc.) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>