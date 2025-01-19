
    // Register GSAP ScrollTrigger plugin
    gsap.registerPlugin(ScrollTrigger);

    // Heading Animation
    gsap.from("h2", {
        scrollTrigger: {
            trigger: ".ensure-section",
            start: "top 80%", // Trigger when heading is visible
        },
        y: -50,           // Slide from above
        opacity: 0,       // Fade in effect
        duration: 1,      // Smooth duration
        ease: "power2.out" // Soft easing
    });

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

    // Unique Animations for Each Feature Card
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
        opacity: 0,         // Fade in
        duration: 1.2,      // Animation duration
        ease: "power3.out", // Smooth easing
    });

    gsap.from("#feature3", {
        scrollTrigger: {
            trigger: "#feature3",
            start: "top 90%", // Trigger when the third card enters
        },
        rotate: -15,        // Rotate slightly
        opacity: 0,         // Fade in
        duration: 1.4,      // Animation duration
        ease: "power3.out", // Smooth easing
    });

    gsap.from("#feature4", {
        scrollTrigger: {
            trigger: "#feature4",
            start: "top 90%", // Trigger when the fourth card enters
        },
        x: 100,             // Slide in from the right
        opacity: 0,         // Fade in
        duration: 1.6,      // Animation duration
        ease: "power3.out", // Smooth easing
    });

    gsap.from("#feature5", {
        scrollTrigger: {
            trigger: "#feature5",
            start: "top 90%", // Trigger when the fifth card enters
        },
        y: -100,            // Slide in from above
        opacity: 0,         // Fade in
        duration: 1.8,      // Animation duration
        ease: "power3.out", // Smooth easing
    });







    // solution animation

    document.addEventListener("DOMContentLoaded", () => {
        // Register ScrollTrigger plugin
        gsap.registerPlugin(ScrollTrigger);
      
        // Section animation
        // gsap.from(".section-title", {
        //   scrollTrigger: {
        //     trigger: ".solutions-section",
        //     start: "top 80%",
        //     end: "top 50%",
        //     scrub: 1,
        //   },
        //   y: -50,
        //   opacity: 0,
        //   duration: 1,
        // });
      
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
      
        // Animations for each card
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
      