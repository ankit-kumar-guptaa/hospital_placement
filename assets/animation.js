






// Register GSAP ScrollTrigger plugin
gsap.registerPlugin(ScrollTrigger);

/* 
========================
  Hospital Section Animations
========================
*/

// Left Images Animation




gsap.from(".image-1", {
  scrollTrigger: {
    trigger: ".hospital-placement-section",
    start: "top 80%",
    toggleActions: "play none none none",
  },
  x: -100,
  opacity: 0,
  duration: 1,
  ease: "power2.out",
});

gsap.from(".image-2", {
  scrollTrigger: {
    trigger: ".hospital-placement-section",
    start: "top 80%",
    toggleActions: "play none none none",
  },
  x: 100,
  opacity: 0,
  duration: 1,
  ease: "power2.out",
});

// Right Text Content Animation
gsap.from(".text-header", {
  scrollTrigger: {
    trigger: ".hospital-placement-section",
    start: "top 80%",
    toggleActions: "play none none none",
  },
  y: -50,
  opacity: 0,
  duration: 0.8,
  ease: "power2.out",
});

gsap.from(".text-title", {
  scrollTrigger: {
    trigger: ".hospital-placement-section",
    start: "top 80%",
    toggleActions: "play none none none",
  },
  y: -30,
  opacity: 0,
  delay: 0.2,
  duration: 0.8,
  ease: "power2.out",
});

gsap.from(".text-paragraph", {
  scrollTrigger: {
    trigger: ".hospital-placement-section",
    start: "top 80%",
    toggleActions: "play none none none",
  },
  y: 30,
  opacity: 0,
  delay: 0.4,
  duration: 0.8,
  ease: "power2.out",
});

gsap.from(".text-list-item", {
  scrollTrigger: {
    trigger: ".hospital-placement-section",
    start: "top 80%",
    toggleActions: "play none none none",
  },
  opacity: 0,
  delay: 0.6,
  duration: 0.6,
  stagger: 0.2,
  ease: "power2.out",
});

gsap.from(".text-button", {
  scrollTrigger: {
    trigger: ".hospital-placement-section",
    start: "top 80%",
    toggleActions: "play none none none",
  },
  scale: 0.8,
  opacity: 0,
  delay: 0.8,
  duration: 0.8,
  ease: "elastic.out(1, 0.5)",
});

/* 
========================
  Ensure Section Animations
========================
*/

// Heading Animation


// Divider Animation
gsap.from(".divider", {
  scrollTrigger: {
    trigger: ".ensure-section",
    start: "top 85%", // Trigger slightly after heading
  },
  scaleX: 0,           // Start with horizontal scale 0
  opacity: 0,          // Fade in effect
  transformOrigin: "center", // Grow from the center
  duration: 0.8,       // Smooth duration
  ease: "power2.out"   // Smooth easing
});

// Feature Cards Animation
gsap.from("#feature1", {
  scrollTrigger: {
    trigger: "#feature1",
    start: "top 90%", // Trigger when the first card enters
  },
  x: -100,            // Slide in from the left
  opacity: 0,         // Fade in
  duration: 1,        // Animation duration
  ease: "power3.out", // Smooth easing
});

gsap.from("#feature2", {
  scrollTrigger: {
    trigger: "#feature2",
    start: "top 90%", // Trigger when the second card enters
  },
  y: 100,             // Slide in from below
  opacity: 0,
  duration: 1.2,
  ease: "power3.out",
});

gsap.from("#feature3", {
  scrollTrigger: {
    trigger: "#feature3",
    start: "top 90%", // Trigger when the third card enters
  },
  rotate: -15,        // Rotate slightly
  opacity: 0,
  duration: 1.4,
  ease: "power3.out",
});

gsap.from("#feature4", {
  scrollTrigger: {
    trigger: "#feature4",
    start: "top 90%", // Trigger when the fourth card enters
  },
  x: 100,             // Slide in from the right
  opacity: 0,
  duration: 1.6,
  ease: "power3.out",
});

gsap.from("#feature5", {
  scrollTrigger: {
    trigger: "#feature5",
    start: "top 90%", // Trigger when the fifth card enters
  },
  y: -100,            // Slide in from above
  opacity: 0,
  duration: 1.8,
  ease: "power3.out",
});

/* 
========================
  Solutions Section Animations
========================
*/

document.addEventListener("DOMContentLoaded", () => {
  // Section Animation
  gsap.from(".solutions-description", {
    scrollTrigger: {
      trigger: ".solutions-section",
      start: "top 75%",
      end: "top 45%",
      scrub: 1,
    },
    y: 50,
    opacity: 0,
    duration: 1,
  });

  // Animations for Each Solution Card
  const cards = document.querySelectorAll(".solution-card");

  cards.forEach((card, index) => {
    gsap.from(card, {
      scrollTrigger: {
        trigger: card,
        start: "top 85%",
        end: "top 60%",
        scrub: 1,
      },
      y: 100 * (index % 2 === 0 ? 1 : -1), // Alternate direction
      opacity: 0,
      rotation: index % 2 === 0 ? 5 : -5, // Add slight rotation
      duration: 1.2,
    });
  });
});



// why choose us ki animation 

