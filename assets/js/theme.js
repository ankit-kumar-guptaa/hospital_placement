/* =============================================================================
   HospitalPlacement.com - interaction layer
   -----------------------------------------------------------------------------
   Every animation here is transform/opacity only, on a strong ease-out, gated
   on prefers-reduced-motion. Scroll work is IntersectionObserver based, never
   a scroll listener.
   ========================================================================== */
(function () {
  'use strict';

  var root = document.documentElement;
  root.classList.remove('no-js');

  var reduced = window.matchMedia('(prefers-reduced-motion: reduce)');

  function on(el, ev, fn) { if (el) el.addEventListener(ev, fn); }
  function all(sel, ctx) { return Array.prototype.slice.call((ctx || document).querySelectorAll(sel)); }

  /* ---------------------------------------------------------------------------
     1. Scroll reveal. Purpose: hierarchy. A section's parts arrive in reading
        order instead of the whole page appearing at once.
        opacity + translateY, 480ms, cubic-bezier(.23,1,.32,1), 60ms stagger.
     ------------------------------------------------------------------------ */
  function initReveal() {
    var hero = document.querySelector('.hp-hero');
    var items = all('.hp-rise').filter(function (el) {
      return !(hero && hero.contains(el));   // the hero runs its own entrance
    });
    if (!items.length) return;

    if (!('IntersectionObserver' in window)) {
      items.forEach(function (el) { el.classList.add('is-in'); });
      return;
    }

    var io = new IntersectionObserver(function (entries) {
      // Stagger by document order within each batch, not by index in the list.
      entries.filter(function (e) { return e.isIntersecting; })
        .sort(function (a, b) { return a.boundingClientRect.top - b.boundingClientRect.top; })
        .forEach(function (entry, i) {
          var el = entry.target;
          var own = el.getAttribute('data-rise-delay');
          el.style.setProperty('--hp-rise-delay', (own !== null ? +own : i * 60) + 'ms');
          el.classList.add('is-in');
          io.unobserve(el);
        });
    }, { rootMargin: '0px 0px -8% 0px', threshold: 0.08 });

    items.forEach(function (el) { io.observe(el); });
  }

  /* ---------------------------------------------------------------------------
     2. Header elevation. A sentinel above the header tells us when the page
        has scrolled, so there is no scroll listener.
     ------------------------------------------------------------------------ */
  function initHeader() {
    var header = document.querySelector('.hp-header');
    if (!header || !('IntersectionObserver' in window)) return;

    var sentinel = document.createElement('div');
    sentinel.setAttribute('aria-hidden', 'true');
    sentinel.style.cssText = 'position:absolute;top:0;left:0;width:1px;height:1px;pointer-events:none;';
    document.body.insertBefore(sentinel, document.body.firstChild);

    new IntersectionObserver(function (entries) {
      header.classList.toggle('is-stuck', !entries[0].isIntersecting);
    }, { threshold: 0 }).observe(sentinel);
  }

  /* ---------------------------------------------------------------------------
     3. Desktop mega menus. Hover opens on fine pointers; keyboard and click
        work everywhere. Escape closes and returns focus to the trigger.
     ------------------------------------------------------------------------ */
  function initMega() {
    var items = all('.hp-nav__item--has-mega');
    if (!items.length) return;

    var fine = window.matchMedia('(hover: hover) and (pointer: fine)');
    var openItem = null;
    var closeTimer = null;

    function setOpen(item, open) {
      item.classList.toggle('is-open', open);
      var trigger = item.querySelector('.hp-nav__link');
      if (trigger) trigger.setAttribute('aria-expanded', open ? 'true' : 'false');
      openItem = open ? item : (openItem === item ? null : openItem);
    }

    function closeAll() {
      items.forEach(function (i) { setOpen(i, false); });
      openItem = null;
    }

    items.forEach(function (item) {
      var trigger = item.querySelector('.hp-nav__link');

      on(trigger, 'click', function (e) {
        e.preventDefault();
        var isOpen = item.classList.contains('is-open');
        closeAll();
        if (!isOpen) setOpen(item, true);
      });

      on(item, 'mouseenter', function () {
        if (!fine.matches) return;
        clearTimeout(closeTimer);
        items.forEach(function (i) { if (i !== item) setOpen(i, false); });
        setOpen(item, true);
      });

      on(item, 'mouseleave', function () {
        if (!fine.matches) return;
        closeTimer = setTimeout(function () { setOpen(item, false); }, 140);
      });

      // Tabbing out of the panel closes it.
      on(item, 'focusout', function (e) {
        if (!item.contains(e.relatedTarget)) setOpen(item, false);
      });
    });

    on(document, 'keydown', function (e) {
      if (e.key !== 'Escape' || !openItem) return;
      var trigger = openItem.querySelector('.hp-nav__link');
      closeAll();
      if (trigger) trigger.focus();
    });

    on(document, 'click', function (e) {
      if (openItem && !openItem.contains(e.target)) closeAll();
    });
  }

  /* ---------------------------------------------------------------------------
     4. Mobile drawer. Slides in on the iOS drawer curve, traps nothing but
        does move focus, locks the page behind it, and closes on Escape.
     ------------------------------------------------------------------------ */
  function initDrawer() {
    var burger = document.querySelector('.hp-burger');
    var drawer = document.querySelector('.hp-drawer');
    var scrim = document.querySelector('.hp-scrim');
    if (!burger || !drawer) return;

    function setDrawer(open) {
      burger.setAttribute('aria-expanded', open ? 'true' : 'false');
      drawer.classList.toggle('is-open', open);
      if (scrim) scrim.classList.toggle('is-open', open);

      // Overflow lock, not a position:fixed body: the header is sticky and
      // would detach from the viewport if the body stopped being the scroller.
      root.classList.toggle('hp-lock', open);

      if (open) {
        var first = drawer.querySelector('a, button');
        if (first) first.focus({ preventScroll: true });
      }
    }

    on(burger, 'click', function () {
      setDrawer(burger.getAttribute('aria-expanded') !== 'true');
    });
    on(scrim, 'click', function () { setDrawer(false); });
    on(document, 'keydown', function (e) {
      if (e.key === 'Escape' && drawer.classList.contains('is-open')) {
        setDrawer(false);
        burger.focus();
      }
    });

    // Collapsible groups inside the drawer.
    all('.hp-drawer__link[aria-expanded]').forEach(function (btn) {
      on(btn, 'click', function () {
        var open = btn.getAttribute('aria-expanded') === 'true';
        all('.hp-drawer__link[aria-expanded]').forEach(function (other) {
          if (other !== btn) other.setAttribute('aria-expanded', 'false');
        });
        btn.setAttribute('aria-expanded', open ? 'false' : 'true');
      });
    });

    // Leaving the mobile breakpoint while open would leave the body locked.
    window.matchMedia('(min-width: 1141px)').addEventListener('change', function (e) {
      if (e.matches && drawer.classList.contains('is-open')) setDrawer(false);
    });
  }

  /* ---------------------------------------------------------------------------
     5. Hero form tabs. Transitions, not keyframes: a visitor can flip between
        "hiring" and "job hunting" several times a second.
        Field names, ids and form actions are untouched.
     ------------------------------------------------------------------------ */
  function initTabs() {
    var tabs = all('.hp-tab');
    if (!tabs.length) return;

    function select(tab) {
      tabs.forEach(function (t) {
        var panel = document.getElementById(t.getAttribute('aria-controls'));
        var isMe = t === tab;
        t.setAttribute('aria-selected', isMe ? 'true' : 'false');
        t.setAttribute('tabindex', isMe ? '0' : '-1');
        if (panel) panel.hidden = !isMe;
      });
    }

    tabs.forEach(function (tab, i) {
      on(tab, 'click', function () { select(tab); });
      on(tab, 'keydown', function (e) {
        var next = e.key === 'ArrowRight' ? 1 : e.key === 'ArrowLeft' ? -1 : 0;
        if (!next) return;
        e.preventDefault();
        var target = tabs[(i + next + tabs.length) % tabs.length];
        select(target);
        target.focus();
      });
    });

  }

  /* ---------------------------------------------------------------------------
     6. FAQ disclosure. height has no transform equivalent for an accordion,
        so grid-template-rows 0fr -> 1fr carries it.
     ------------------------------------------------------------------------ */
  function initFaq() {
    all('.hp-faq__q').forEach(function (btn) {
      var item = btn.closest('.hp-faq__item');
      on(btn, 'click', function () {
        var open = btn.getAttribute('aria-expanded') === 'true';
        btn.setAttribute('aria-expanded', open ? 'false' : 'true');
        if (item) item.classList.toggle('is-open', !open);
      });
    });
  }

  /* ---------------------------------------------------------------------------
     7. Testimonials. Crossfade on a timer, paused on hover and focus, and
        stopped entirely under reduced motion (a moving quote is not
        comprehension, it is decoration).
     ------------------------------------------------------------------------ */
  function initQuotes() {
    var stage = document.querySelector('[data-quotes]');
    if (!stage) return;

    var slides = all('[data-quote]', stage);
    var dots = all('[data-quote-dot]');
    if (slides.length < 2) return;

    var i = 0, timer = null, paused = false;

    function show(n) {
      i = (n + slides.length) % slides.length;
      slides.forEach(function (s, k) { s.hidden = k !== i; });
      dots.forEach(function (d, k) {
        d.setAttribute('aria-current', k === i ? 'true' : 'false');
      });
    }

    function start() {
      if (reduced.matches || paused) return;
      stop();
      timer = setInterval(function () { show(i + 1); }, 6500);
    }
    function stop() { clearInterval(timer); timer = null; }

    dots.forEach(function (d, k) {
      on(d, 'click', function () { show(k); start(); });
    });

    ['mouseenter', 'focusin'].forEach(function (ev) {
      on(stage, ev, function () { paused = true; stop(); });
    });
    ['mouseleave', 'focusout'].forEach(function (ev) {
      on(stage, ev, function () { paused = false; start(); });
    });

    on(document, 'visibilitychange', function () {
      document.hidden ? stop() : start();
    });

    show(0);
    start();
  }

  /* ---------------------------------------------------------------------------
     8. Photography fallback. Every remote photo names a local stand-in, so a
        blocked or moved CDN file never renders as a broken image.
     ------------------------------------------------------------------------ */
  function initImageFallback() {
    all('img[data-fallback]').forEach(function (img) {
      // An ordered list: alternate photos first, the local file last. Each
      // failure walks one step down, so one moved CDN file never shows as a
      // broken image.
      var queue = (img.getAttribute('data-fallback') || '')
        .split(',').map(function (s) { return s.trim(); })
        .filter(Boolean);

      function swap() {
        var next = queue.shift();
        if (!next) { img.removeAttribute('data-fallback'); return; }
        if (next === img.getAttribute('src')) { swap(); return; }
        img.removeAttribute('srcset');
        img.src = next;
      }
      if (img.complete && img.naturalWidth === 0) swap();
      on(img, 'error', swap);
    });
  }


  /* ---------------------------------------------------------------------------
     10. Hero entrance. Purpose: hierarchy. The hero arrives in reading order
         on load rather than all at once, so the eye lands on the headline
         first. Runs once, 70ms apart, and is skipped under reduced motion.
     ------------------------------------------------------------------------ */
  function initHeroEntrance() {
    var hero = document.querySelector('.hp-hero');
    if (!hero) return;

    var parts = all('.hp-rise', hero);
    if (!parts.length) return;

    parts.forEach(function (el, n) {
      el.style.setProperty('--hp-rise-delay', (reduced.matches ? 0 : n * 70) + 'ms');
    });
    // Next frame, so the transition has a start value to animate from.
    requestAnimationFrame(function () {
      requestAnimationFrame(function () {
        parts.forEach(function (el) { el.classList.add('is-in'); });
      });
    });
  }


  /* ---------------------------------------------------------------------------
     11. Form modal. Purpose: spatial consistency. The hero's two buttons and
         the header CTA open the same dialog on the matching tab, so the first
         screen stays clean and the form is one click away.

         Focus moves in on open and returns to the trigger on close, Tab is
         kept inside the panel, Escape closes, and the page behind is locked.
     ------------------------------------------------------------------------ */
  function initModal() {
    var modal = document.getElementById('hp-formmodal');
    if (!modal) return;

    var panel = modal.querySelector('.hp-modal__panel');
    var opener = null;
    var FOCUSABLE = 'a[href],button:not([disabled]),input:not([disabled]),' +
                    'select:not([disabled]),textarea:not([disabled]),[tabindex]:not([tabindex="-1"])';

    function focusable() {
      return all(FOCUSABLE, panel).filter(function (el) {
        return el.offsetParent !== null || el === document.activeElement;
      });
    }

    function open(trigger, tabId) {
      opener = trigger || null;
      modal.hidden = false;
      // Next frame so the transition has a start value to run from.
      requestAnimationFrame(function () { modal.classList.add('is-open'); });
      root.classList.add('hp-modal-open');

      if (tabId) {
        var tab = document.getElementById(tabId);
        if (tab) tab.click();
      }
      var first = focusable()[0];
      if (first) first.focus({ preventScroll: true });
    }

    function close() {
      modal.classList.remove('is-open');
      root.classList.remove('hp-modal-open');
      var done = function () {
        modal.hidden = true;
        panel.removeEventListener('transitionend', done);
      };
      if (reduced.matches) { done(); }
      else {
        panel.addEventListener('transitionend', done);
        setTimeout(done, 400);   // belt and braces if the event never fires
      }
      if (opener) { opener.focus({ preventScroll: true }); opener = null; }
    }

    all('[data-modal-open]').forEach(function (btn) {
      on(btn, 'click', function (e) {
        if (btn.getAttribute('data-modal-open') !== 'hp-formmodal') return;
        e.preventDefault();
        open(btn, btn.getAttribute('data-modal-tab'));
      });
    });

    all('[data-modal-close]', modal).forEach(function (el) {
      on(el, 'click', close);
    });

    on(document, 'keydown', function (e) {
      if (modal.hidden) return;
      if (e.key === 'Escape') { e.preventDefault(); close(); return; }
      if (e.key !== 'Tab') return;

      var items = focusable();
      if (!items.length) return;
      var first = items[0], last = items[items.length - 1];
      if (e.shiftKey && document.activeElement === first) { e.preventDefault(); last.focus(); }
      else if (!e.shiftKey && document.activeElement === last) { e.preventDefault(); first.focus(); }
      else if (!panel.contains(document.activeElement)) { e.preventDefault(); first.focus(); }
    });

    // Landing on /#hire or /#find-a-job opens the dialog on the right tab.
    if (location.hash === '#hire' || location.hash === '#find-a-job') {
      open(null, location.hash === '#find-a-job' ? 'hp-tab-jobseeker' : 'hp-tab-employer');
    }
  }

  /* ---------------------------------------------------------------------------
     11. Content reveal on the inner pages. Those pages were authored with AOS
         attributes; the library is gone and these attributes are read here
         instead, against the rules in assets/css/content.css.

         Same discipline as initReveal: one IntersectionObserver, transform and
         opacity only, and each element released once and then forgotten.
     ------------------------------------------------------------------------ */
  function initContentReveal() {
    var hero = document.querySelector('.hp-hero');
    var items = all('[data-aos]').filter(function (el) {
      return !(hero && hero.contains(el));
    });
    if (!items.length) return;

    // Reduced motion, or a browser without the observer: show everything now.
    if (reduced.matches || !('IntersectionObserver' in window)) {
      items.forEach(function (el) { el.classList.add('is-in'); });
      return;
    }

    var io = new IntersectionObserver(function (entries) {
      entries.filter(function (e) { return e.isIntersecting; })
        .sort(function (a, b) { return a.boundingClientRect.top - b.boundingClientRect.top; })
        .forEach(function (entry, i) {
          var el = entry.target;
          // An authored delay is already in the stylesheet. Anything without
          // one is staggered by its place in this batch, capped so a wide grid
          // does not keep the reader waiting on the last card.
          if (!el.hasAttribute('data-aos-delay')) {
            el.style.transitionDelay = Math.min(i * 70, 350) + 'ms';
          }
          el.classList.add('is-in');
          io.unobserve(el);
        });
    }, { rootMargin: '0px 0px -6% 0px', threshold: 0.06 });

    items.forEach(function (el) { io.observe(el); });
  }

  /* ---------------------------------------------------------------------------
     12. A table wider than the screen should scroll inside its own frame, not
         push the whole page sideways. The wrapper is added here because the
         pages write a bare <table> and there is no need for them to change.
     ------------------------------------------------------------------------ */
  function initTableWrap() {
    all('table').forEach(function (t) {
      if (t.closest('.hp-tablewrap') || t.closest('.hp-modal')) return;
      var w = document.createElement('div');
      w.className = 'hp-tablewrap';
      t.parentNode.insertBefore(w, t);
      w.appendChild(t);
    });
  }

  function init() {
    initImageFallback();
    initHeader();
    initMega();
    initDrawer();
    initTabs();
    initFaq();
    initQuotes();
    initHeroEntrance();
    initModal();
    initReveal();
    initTableWrap();
    initContentReveal();
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }
})();
