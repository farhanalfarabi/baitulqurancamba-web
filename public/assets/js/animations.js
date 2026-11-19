/**
 * Pondok Pesantren Tahfizh Baitul Qur'an Camba
 * Krackerz-Inspired Tactile Motion & Card Transition Engine
 * Hardware-Accelerated WAAPI Spring Reveals + Continuous Scroll-Linked RAF Physics
 */

(function () {
  'use strict';

  const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  const hasFinePointer = window.matchMedia('(hover: hover) and (pointer: fine)').matches;

  const EASE_SMOOTH_CSS = 'cubic-bezier(0.22, 1, 0.36, 1)';
  const EASE_SPRING_CSS = 'cubic-bezier(0.22, 1.18, 0.36, 1)';
  const EASE_BOUNCE_CSS = 'cubic-bezier(0.34, 1.48, 0.64, 1)';

  function clamp(val, min, max) {
    return Math.max(min, Math.min(max, val));
  }

  function easeOutCubic(t) {
    return 1 - Math.pow(1 - t, 3);
  }

  function markAllRevealed() {
    document.documentElement.classList.remove('motion-ready');
    document.querySelectorAll('[data-animate], [data-stagger-item], [data-hero-animate], .scallop-card-hanger').forEach((el) => {
      el.classList.add('is-revealed');
      el.classList.remove('is-scroll-moving');
      el.style.opacity = '';
      el.style.transform = '';
      el.style.willChange = '';
    });
  }

  function cleanAfterAnimate(el) {
    el.classList.add('is-revealed');
    el.classList.remove('is-scroll-moving');
    el.style.opacity = '';
    el.style.transform = '';
    el.style.willChange = '';
  }

  /**
   * Hardware-accelerated Web Animations API helper.
   * Runs on the GPU compositor thread with zero conflict against CSS hover transitions.
   */
  function playWAAPI(el, keyframes, options) {
    if (!el || typeof el.animate !== 'function') {
      if (el) cleanAfterAnimate(el);
      return Promise.resolve();
    }

    el.classList.remove('is-revealed');
    const anim = el.animate(keyframes, {
      duration: options.duration || 800,
      delay: options.delay || 0,
      easing: options.easing || EASE_SPRING_CSS,
      fill: 'both'
    });

    return anim.finished
      .then(() => {
        el.classList.add('is-revealed');
        el.style.opacity = '';
        el.style.transform = '';
        el.style.willChange = '';
        try {
          anim.cancel();
        } catch (e) {
          // ignore
        }
      })
      .catch(() => {
        cleanAfterAnimate(el);
      });
  }

  /* ==========================================================================
     1. Hero Load Choreography (Staggered Spring Entrance + Playing Card Deal)
     ========================================================================== */
  function initHeroEntrance() {
    const heroSection = document.querySelector('[data-hero-section]');
    if (!heroSection) return;

    const badge = heroSection.querySelector('[data-hero-animate="badge"]');
    const headlines = Array.from(heroSection.querySelectorAll('[data-hero-animate="headline"]'));
    const cta = heroSection.querySelector('[data-hero-animate="cta"]');
    const mobileMarquee = heroSection.querySelector('[data-hero-animate="mobile-marquee"]');
    const desktopCards = Array.from(heroSection.querySelectorAll('.hero-card-inner'));

    if (badge) {
      playWAAPI(
        badge,
        [
          { opacity: 0, transform: 'translate3d(0, -24px, 0) scale(0.82)' },
          { opacity: 1, transform: 'translate3d(0, 0, 0) scale(1)' }
        ],
        { duration: 720, delay: 40, easing: EASE_BOUNCE_CSS }
      );
    }

    let visibleHeadlineIdx = 0;
    headlines.forEach((el) => {
      if (el.offsetParent === null) {
        cleanAfterAnimate(el);
        return;
      }
      const delay = 100 + visibleHeadlineIdx * 95;
      visibleHeadlineIdx += 1;
      playWAAPI(
        el,
        [
          { opacity: 0, transform: 'translate3d(0, 38px, 0) scale(0.96)' },
          { opacity: 1, transform: 'translate3d(0, 0, 0) scale(1)' }
        ],
        { duration: 720, delay, easing: EASE_SMOOTH_CSS }
      );
    });

    if (cta) {
      playWAAPI(
        cta,
        [
          { opacity: 0, transform: 'translate3d(0, 28px, 0) scale(0.85)' },
          { opacity: 1, transform: 'translate3d(0, 0, 0) scale(1)' }
        ],
        { duration: 720, delay: 340, easing: EASE_BOUNCE_CSS }
      );
    }

    if (mobileMarquee) {
      playWAAPI(
        mobileMarquee,
        [
          { opacity: 0, transform: 'translate3d(0, 36px, 0) scale(0.95)' },
          { opacity: 1, transform: 'translate3d(0, 0, 0) scale(1)' }
        ],
        { duration: 780, delay: 360, easing: EASE_SMOOTH_CSS }
      );
    }

    if (desktopCards.length && window.innerWidth >= 1024) {
      desktopCards.forEach((cardInner, idx) => {
        const startTilt = idx % 2 === 0 ? -7 : 7;
        playWAAPI(
          cardInner,
          [
            { opacity: 0, transform: `translate3d(0, 76px, 0) scale(0.84) rotate(${startTilt}deg)` },
            { opacity: 1, transform: 'translate3d(0, 0, 0) scale(1) rotate(0deg)' }
          ],
          { duration: 840, delay: 260 + idx * 75, easing: EASE_SPRING_CSS }
        );
      });
    } else {
      desktopCards.forEach((cardInner) => cleanAfterAnimate(cardInner));
    }
  }

  /* ==========================================================================
     2. Continuous Scroll-Linked Left & Right -> Center Convergence
     Used for 4 Misi Utama (split-2col), Visi 3M & Prestasi (split-3col).
     Cards visibly glide in from left & right edges toward the center directly
     linked to your scroll (like Framer Scroll Transform on krackerz.com),
     and lock seamlessly at rest so hover 3D tilt works cleanly!
     ========================================================================== */
  function initScrollConvergeGroups() {
    const groups = Array.from(
      document.querySelectorAll('[data-stagger-group][data-stagger-variant="split-2col"], [data-stagger-group][data-stagger-variant="split-3col"]')
    );
    if (!groups.length) return;

    const trackedItems = [];

    groups.forEach((group) => {
      const variant = group.getAttribute('data-stagger-variant');
      const items = Array.from(group.querySelectorAll('[data-stagger-item]'));

      items.forEach((el, idx) => {
        // Mark as scroll-managed so IntersectionObserver skips it
        el.dataset.scrollManaged = '1';
        el.dataset.animDone = '1';
        trackedItems.push({
          group,
          el,
          idx,
          variant,
          currentP: 0,
          targetP: 0,
          docked: false
        });
      });
    });

    let rafId = null;

    const getGroupLayoutMode = (group, variant) => {
      const computed = window.getComputedStyle(group);
      const isGrid = computed.display === 'grid';
      const cols = isGrid ? computed.gridTemplateColumns.split(' ').filter(Boolean).length : 1;

      if (variant === 'split-2col') {
        return cols >= 2 ? 'two-col' : 'stack-alt';
      }
      // split-3col
      return cols >= 3 ? 'three-col' : 'vertical';
    };

    const computeTargets = () => {
      const viewH = window.innerHeight;
      const startLine = viewH * 0.98; // Starts entering right as row appears at bottom
      const endLine = viewH * 0.50;   // Locks cleanly into center right in user's sightline

      trackedItems.forEach((item) => {
        const groupRect = item.group.getBoundingClientRect();
        const mode = getGroupLayoutMode(item.group, item.variant);
        item.mode = mode;

        // Use stable layout offsetTop (immune to card's own transform)
        const naturalTop = mode === 'vertical' ? groupRect.top : groupRect.top + item.el.offsetTop;
        const raw = (startLine - naturalTop) / (startLine - endLine);
        item.targetP = clamp(raw, 0, 1);
      });
    };

    const applyItemTransform = (item, p) => {
      const el = item.el;
      const eased = easeOutCubic(p);
      const inv = 1 - eased;

      if (p >= 0.996) {
        if (!item.docked) {
          item.docked = true;
          el.classList.add('is-revealed');
          el.classList.remove('is-scroll-moving');
          el.style.transform = '';
          el.style.opacity = '';
        }
        return;
      }

      item.docked = false;
      el.classList.add('is-revealed', 'is-scroll-moving');

      const opacity = clamp(eased * 1.25, 0, 1);
      let x = 0;
      let y = 0;
      let rot = 0;
      let scale = 1 - inv * 0.14;

      if (item.mode === 'two-col') {
        const isLeft = item.idx % 2 === 0;
        const maxX = Math.min(window.innerWidth * 0.18, 220);
        x = (isLeft ? -maxX : maxX) * inv;
        y = 44 * inv;
        rot = (isLeft ? -8 : 8) * inv;
      } else if (item.mode === 'stack-alt') {
        const isLeft = item.idx % 2 === 0;
        x = (isLeft ? -120 : 120) * inv;
        y = 32 * inv;
        rot = (isLeft ? -5.5 : 5.5) * inv;
      } else if (item.mode === 'three-col') {
        const col = item.idx % 3; // 0 = left, 1 = center, 2 = right
        const maxX = Math.min(window.innerWidth * 0.16, 195);
        if (col === 0) {
          x = -maxX * inv;
          y = 42 * inv;
          rot = -7.5 * inv;
        } else if (col === 2) {
          x = maxX * inv;
          y = 42 * inv;
          rot = 7.5 * inv;
        } else {
          x = 0;
          y = 105 * inv;
          rot = 0;
          scale = 1 - inv * 0.16;
        }
      } else {
        // Horizontal carousel / narrow mobile fallback
        x = 0;
        y = 60 * inv;
        rot = 0;
        scale = 1 - inv * 0.1;
      }

      el.style.opacity = opacity.toFixed(3);
      el.style.transform = `translate3d(${x.toFixed(1)}px, ${y.toFixed(1)}px, 0) scale(${scale.toFixed(4)}) rotate(${rot.toFixed(2)}deg)`;
    };

    const tick = () => {
      let needsMore = false;
      const lerp = 0.13;

      trackedItems.forEach((item) => {
        const diff = item.targetP - item.currentP;
        if (Math.abs(diff) > 0.001) {
          item.currentP += diff * lerp;
          needsMore = true;
        } else {
          item.currentP = item.targetP;
        }
        applyItemTransform(item, item.currentP);
      });

      if (needsMore) {
        rafId = requestAnimationFrame(tick);
      } else {
        rafId = null;
      }
    };

    const onScrollOrResize = () => {
      computeTargets();
      if (!rafId) {
        rafId = requestAnimationFrame(tick);
      }
    };

    window.addEventListener('scroll', onScrollOrResize, { passive: true });
    window.addEventListener('resize', onScrollOrResize, { passive: true });

    // Initial immediate snap (no slow drift on page load)
    computeTargets();
    trackedItems.forEach((item) => {
      item.currentP = item.targetP;
      applyItemTransform(item, item.currentP);
    });
  }

  /* ==========================================================================
     3. Declarative Scroll-Triggered Reveals & Row-Aware Card Waves
     Triggers cleanly inside the viewer's sightline (-14% bottom margin) with
     unmistakable Krackerz spring physics.
     ========================================================================== */
  function animateElementByType(el, type, delayMs) {
    if (el.dataset.animDone === '1') return;
    el.dataset.animDone = '1';

    let keyframes;
    let duration = 820;
    let easing = EASE_SMOOTH_CSS;

    switch (type) {
      case 'pop':
        keyframes = [
          { opacity: 0, transform: 'translate3d(0, 48px, 0) scale(0.8)' },
          { opacity: 1, transform: 'translate3d(0, 0, 0) scale(1)' }
        ];
        duration = 780;
        easing = EASE_BOUNCE_CSS;
        break;
      case 'scale-in':
        keyframes = [
          { opacity: 0, transform: 'translate3d(0, 62px, 0) scale(0.88)' },
          { opacity: 1, transform: 'translate3d(0, 0, 0) scale(1)' }
        ];
        duration = 860;
        easing = EASE_SPRING_CSS;
        break;
      case 'slide-left':
        keyframes = [
          { opacity: 0, transform: 'translate3d(-72px, 0, 0) scale(0.95)' },
          { opacity: 1, transform: 'translate3d(0, 0, 0) scale(1)' }
        ];
        duration = 820;
        easing = EASE_SPRING_CSS;
        break;
      case 'slide-right':
        keyframes = [
          { opacity: 0, transform: 'translate3d(72px, 0, 0) scale(0.95)' },
          { opacity: 1, transform: 'translate3d(0, 0, 0) scale(1)' }
        ];
        duration = 820;
        easing = EASE_SPRING_CSS;
        break;
      case 'card-pop':
        keyframes = [
          { opacity: 0, transform: 'translate3d(0, 52px, 0) scale(0.84) rotate(-4deg)' },
          { opacity: 1, transform: 'translate3d(0, 0, 0) scale(1) rotate(0deg)' }
        ];
        duration = 860;
        easing = EASE_BOUNCE_CSS;
        break;
      case 'fade-up':
      default:
        keyframes = [
          { opacity: 0, transform: 'translate3d(0, 52px, 0) scale(0.96)' },
          { opacity: 1, transform: 'translate3d(0, 0, 0) scale(1)' }
        ];
        duration = 780;
        easing = EASE_SMOOTH_CSS;
        break;
    }

    playWAAPI(el, keyframes, { duration, delay: delayMs || 0, easing });
  }

  function animateSingleStaggerItem(item, idx, variant, useTilt, colCount, stepMs) {
    if (item.dataset.animDone === '1') return;
    item.dataset.animDone = '1';

    const colIdx = colCount > 1 ? idx % colCount : idx;
    const delay = Math.min(colIdx * stepMs, 380);

    let keyframes;
    let duration = 840;
    let easing = EASE_SPRING_CSS;

    if (variant === 'pop') {
      const rot = useTilt ? (idx % 2 === 0 ? -6.5 : 6.5) : 0;
      keyframes = [
        { opacity: 0, transform: `translate3d(0, 58px, 0) scale(0.76) rotate(${rot}deg)` },
        { opacity: 1, transform: 'translate3d(0, 0, 0) scale(1) rotate(0deg)' }
      ];
      duration = 800;
      easing = EASE_BOUNCE_CSS;
    } else if (variant === 'row') {
      keyframes = [
        { opacity: 0, transform: 'translate3d(0, 34px, 0) scale(0.96)' },
        { opacity: 1, transform: 'translate3d(0, 0, 0) scale(1)' }
      ];
      duration = 700;
      easing = EASE_SMOOTH_CSS;
    } else if (variant === 'gallery') {
      const rot = idx % 2 === 0 ? -4 : 4;
      keyframes = [
        { opacity: 0, transform: `translate3d(0, 46px, 0) scale(0.86) rotate(${rot}deg)` },
        { opacity: 1, transform: 'translate3d(0, 0, 0) scale(1) rotate(0deg)' }
      ];
      duration = 680;
      easing = EASE_SPRING_CSS;
    } else {
      // Crisp vertical spring pop-in (e.g. 9 Pillars, Visi 3M)
      const startRot = useTilt ? (idx % 2 === 0 ? -3.5 : 3.5) : 0;
      keyframes = [
        { opacity: 0, transform: `translate3d(0, 64px, 0) scale(0.86) rotate(${startRot}deg)` },
        { opacity: 1, transform: 'translate3d(0, 0, 0) scale(1) rotate(0deg)' }
      ];
      duration = 820;
      easing = EASE_SPRING_CSS;
    }

    playWAAPI(item, keyframes, { duration, delay, easing });
  }

  function initScrollReveals() {
    const singleTargets = Array.from(document.querySelectorAll('[data-animate]'));
    const staggerGroups = Array.from(document.querySelectorAll('[data-stagger-group]')).filter((g) => {
      const v = g.getAttribute('data-stagger-variant');
      return v !== 'split-2col' && v !== 'split-3col';
    });

    const isAboveViewport = (el) => el.getBoundingClientRect().bottom < 0;

    if (!('IntersectionObserver' in window)) {
      markAllRevealed();
      return;
    }

    const observerOptions = {
      rootMargin: '0px 0px -14% 0px',
      threshold: 0.06
    };

    const singleObserver = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          const el = entry.target;
          const type = el.getAttribute('data-animate') || 'fade-up';
          const delayMs = parseFloat(el.getAttribute('data-animate-delay') || '0') * 1000;
          animateElementByType(el, type, delayMs);
          singleObserver.unobserve(el);
        }
      });
    }, observerOptions);

    singleTargets.forEach((el) => {
      if (isAboveViewport(el)) {
        el.dataset.animDone = '1';
        cleanAfterAnimate(el);
      } else {
        singleObserver.observe(el);
      }
    });

    // Observe each card individually for tall grids (so Row 1, Row 2, Row 3 each animate right when scrolled into view!)
    const itemObserver = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          const item = entry.target;
          const group = item.closest('[data-stagger-group]');
          if (!group) return;
          const variant = group.getAttribute('data-stagger-variant') || 'card';
          const useTilt = group.getAttribute('data-stagger-tilt') === 'true';
          const stepMs = parseFloat(group.getAttribute('data-stagger-delay') || '0.095') * 1000;
          const computed = window.getComputedStyle(group);
          const colCount =
            computed.display === 'grid'
              ? computed.gridTemplateColumns.split(' ').filter(Boolean).length
              : 1;
          const idx = parseInt(item.dataset.staggerIdx || '0', 10);

          animateSingleStaggerItem(item, idx, variant, useTilt, colCount, stepMs);
          itemObserver.unobserve(item);
        }
      });
    }, observerOptions);

    staggerGroups.forEach((group) => {
      const items = Array.from(group.querySelectorAll('[data-stagger-item]'));
      items.forEach((item, idx) => {
        item.dataset.staggerIdx = String(idx);
        if (isAboveViewport(item)) {
          item.dataset.animDone = '1';
          cleanAfterAnimate(item);
        } else {
          itemObserver.observe(item);
        }
      });
    });

    // Fail-safe: ONLY reveal items that have been scrolled completely past above the viewport (e.g. anchor jump)
    let sweepTimer;
    window.addEventListener(
      'scroll',
      () => {
        clearTimeout(sweepTimer);
        sweepTimer = setTimeout(() => {
          singleTargets.forEach((el) => {
            if (el.dataset.animDone !== '1' && el.getBoundingClientRect().bottom < 0) {
              el.dataset.animDone = '1';
              cleanAfterAnimate(el);
            }
          });
          staggerGroups.forEach((group) => {
            group.querySelectorAll('[data-stagger-item]').forEach((item) => {
              if (item.dataset.animDone !== '1' && item.getBoundingClientRect().bottom < 0) {
                item.dataset.animDone = '1';
                cleanAfterAnimate(item);
              }
            });
          });
        }, 220);
      },
      { passive: true }
    );
  }

  /* ==========================================================================
     4. Curriculum Sticky Folder Cards Depth & Inner Content Motion
     Keeps all 3 folder tabs 100% flush & aligned on the same baseline (zero
     shell scale/shift), while gently dimming covered folders behind the active
     tab and smoothly settling the inner content as each card docks.
     ========================================================================== */
  function initCurriculumStackMotion() {
    const container = document.getElementById('curriculum-stack-container');
    if (!container) return;

    const cards = [
      document.getElementById('curriculum-card-1'),
      document.getElementById('curriculum-card-2'),
      document.getElementById('curriculum-card-3')
    ].filter(Boolean);

    if (cards.length < 2) return;

    const state = cards.map(() => ({
      bright: 1,
      targetBright: 1,
      contentY: 0,
      targetContentY: 0,
      contentScale: 1,
      targetContentScale: 1,
      contentOpacity: 1,
      targetContentOpacity: 1
    }));

    let rafId = null;

    const computeTargets = () => {
      const stickyTop = window.innerWidth >= 640 ? 98 : 88;
      const rects = cards.map((card) => card.getBoundingClientRect());

      const coverProgress = [];
      for (let i = 0; i < cards.length - 1; i++) {
        const currRect = rects[i];
        const nextRect = rects[i + 1];
        const travelDistance = Math.max(currRect.height * 0.85, 320);
        const raw = (stickyTop + travelDistance - nextRect.top) / travelDistance;
        coverProgress[i] = clamp(raw, 0, 1);
      }

      const p01 = coverProgress[0] || 0;
      const p12 = coverProgress[1] || 0;

      state[0].targetBright = 1 - p01 * 0.08 - p12 * 0.06;
      state[0].targetContentY = -p01 * 14;
      state[0].targetContentScale = 1 - p01 * 0.03;
      state[0].targetContentOpacity = 1 - p01 * 0.28;

      const c2Inv = 1 - p01;
      state[1].targetBright = 1 - p12 * 0.08;
      state[1].targetContentY = c2Inv * 24 - p12 * 14;
      state[1].targetContentScale = 1 - c2Inv * 0.04 - p12 * 0.03;
      state[1].targetContentOpacity = 1 - c2Inv * 0.25 - p12 * 0.28;

      if (state[2]) {
        const c3Inv = 1 - p12;
        state[2].targetBright = 1;
        state[2].targetContentY = c3Inv * 24;
        state[2].targetContentScale = 1 - c3Inv * 0.04;
        state[2].targetContentOpacity = 1 - c3Inv * 0.25;
      }
    };

    const tick = () => {
      let needsMore = false;
      const lerp = 0.16;

      cards.forEach((card, i) => {
        const s = state[i];
        const dBright = s.targetBright - s.bright;
        const dY = s.targetContentY - s.contentY;
        const dScale = s.targetContentScale - s.contentScale;
        const dOp = s.targetContentOpacity - s.contentOpacity;

        if (
          Math.abs(dBright) > 0.001 ||
          Math.abs(dY) > 0.08 ||
          Math.abs(dScale) > 0.0005 ||
          Math.abs(dOp) > 0.002
        ) {
          s.bright += dBright * lerp;
          s.contentY += dY * lerp;
          s.contentScale += dScale * lerp;
          s.contentOpacity += dOp * lerp;
          needsMore = true;
        } else {
          s.bright = s.targetBright;
          s.contentY = s.targetContentY;
          s.contentScale = s.targetContentScale;
          s.contentOpacity = s.targetContentOpacity;
        }

        card.style.setProperty('--stack-brightness', s.bright.toFixed(3));
        card.style.setProperty('--content-y', `${s.contentY.toFixed(2)}px`);
        card.style.setProperty('--content-scale', s.contentScale.toFixed(4));
        card.style.setProperty('--content-opacity', s.contentOpacity.toFixed(3));
      });

      if (needsMore) {
        rafId = requestAnimationFrame(tick);
      } else {
        rafId = null;
      }
    };

    const onScroll = () => {
      computeTargets();
      if (!rafId) {
        rafId = requestAnimationFrame(tick);
      }
    };

    window.addEventListener('scroll', onScroll, { passive: true });
    window.addEventListener('resize', onScroll, { passive: true });
    computeTargets();
    tick();
  }

  /* ==========================================================================
     5. Scalloped Rosette Cards: Pendulum Drop-In & Scroll-Linked Sway
     ========================================================================== */
  function initScallopRosetteMotion() {
    const section = document.getElementById('target-lulusan');
    if (!section) return;

    const wrappers = Array.from(section.querySelectorAll('.scallop-card-wrapper'));
    const hangers = wrappers.map((w) => w.querySelector('.scallop-card-hanger')).filter(Boolean);
    if (!wrappers.length) return;

    let hasEntered = false;
    const triggerEntrance = () => {
      if (hasEntered) return;
      hasEntered = true;

      hangers.forEach((hanger, idx) => {
        const dir = idx % 2 === 0 ? 1 : -1;
        playWAAPI(
          hanger,
          [
            { opacity: 0, transform: `translate3d(0, 92px, 0) scale(0.72) rotate(${dir * 18}deg)`, offset: 0 },
            { opacity: 1, transform: `translate3d(0, -10px, 0) scale(1.05) rotate(${-dir * 7}deg)`, offset: 0.58 },
            { opacity: 1, transform: `translate3d(0, 3px, 0) scale(0.99) rotate(${dir * 3}deg)`, offset: 0.82 },
            { opacity: 1, transform: 'translate3d(0, 0, 0) scale(1) rotate(0deg)', offset: 1 }
          ],
          { duration: 1050, delay: idx * 120, easing: EASE_SMOOTH_CSS }
        );
      });
    };

    if (section.getBoundingClientRect().bottom < 0) {
      hangers.forEach((h) => cleanAfterAnimate(h));
      hasEntered = true;
    } else if ('IntersectionObserver' in window) {
      const obs = new IntersectionObserver(
        (entries) => {
          entries.forEach((entry) => {
            if (entry.isIntersecting) {
              triggerEntrance();
              obs.disconnect();
            }
          });
        },
        { rootMargin: '0px 0px -15% 0px', threshold: 0.1 }
      );
      obs.observe(section);
    } else {
      triggerEntrance();
    }

    // Continuous Scroll-Linked Pendulum Sway & Wave
    let currentProgress = 0;
    let targetProgress = 0;
    let rafId = null;

    const updateProgress = () => {
      const rect = section.getBoundingClientRect();
      const viewH = window.innerHeight;
      const centerRatio = (viewH * 0.5 - (rect.top + rect.height * 0.5)) / (viewH + rect.height);
      targetProgress = clamp(centerRatio * 2, -1, 1);
    };

    const tick = () => {
      const diff = targetProgress - currentProgress;
      if (Math.abs(diff) < 0.001) {
        currentProgress = targetProgress;
        rafId = null;
      } else {
        currentProgress += diff * 0.12;
        rafId = requestAnimationFrame(tick);
      }

      const isDesktop = window.innerWidth >= 1024;
      const rotAmp = isDesktop ? 6.0 : 3.0;
      const yAmp = isDesktop ? 22 : 10;

      wrappers.forEach((wrapper, idx) => {
        const dir = idx % 2 === 0 ? 1 : -1;
        const rot = currentProgress * rotAmp * dir;
        const y = currentProgress * yAmp * -dir;

        wrapper.style.setProperty('--scroll-rot', `${rot.toFixed(2)}deg`);
        wrapper.style.setProperty('--scroll-y', `${y.toFixed(2)}px`);
      });
    };

    const onScroll = () => {
      const rect = section.getBoundingClientRect();
      if (rect.bottom < -120 || rect.top > window.innerHeight + 120) return;
      updateProgress();
      if (!rafId) {
        rafId = requestAnimationFrame(tick);
      }
    };

    window.addEventListener('scroll', onScroll, { passive: true });
    updateProgress();
    tick();
  }

  /* ==========================================================================
     6. Stat Cards Animated Counter (e.g. 8+, 30, 150+, 100%)
     ========================================================================== */
  function initStatCounters() {
    const counters = Array.from(document.querySelectorAll('[data-count-to]'));
    if (!counters.length) return;

    const animateCounter = (el) => {
      if (el.dataset.counted === '1') return;
      el.dataset.counted = '1';

      const target = parseInt(el.getAttribute('data-count-to') || '0', 10);
      const suffix = el.getAttribute('data-count-suffix') || '';
      const duration = 1200;
      const startTime = performance.now();

      const step = (now) => {
        const elapsed = now - startTime;
        const t = Math.min(1, elapsed / duration);
        const eased = 1 - Math.pow(1 - t, 4);
        const current = Math.round(target * eased);
        el.textContent = `${current}${suffix}`;

        if (t < 1) {
          requestAnimationFrame(step);
        } else {
          el.textContent = `${target}${suffix}`;
        }
      };

      requestAnimationFrame(step);
    };

    if ('IntersectionObserver' in window) {
      const obs = new IntersectionObserver(
        (entries) => {
          entries.forEach((entry) => {
            if (entry.isIntersecting) {
              animateCounter(entry.target);
              obs.unobserve(entry.target);
            }
          });
        },
        { rootMargin: '0px 0px -10% 0px', threshold: 0.3 }
      );
      counters.forEach((c) => obs.observe(c));
    } else {
      counters.forEach(animateCounter);
    }
  }

  /* ==========================================================================
     7. Tactile 3D Magnetic Card Hover & Cursor Gloss Spotlight (Desktop)
     ========================================================================== */
  function initMagneticCardTilt() {
    if (!hasFinePointer) return;

    const cards = Array.from(document.querySelectorAll('[data-tilt-card]'));
    if (!cards.length) return;

    cards.forEach((card) => {
      const maxTilt = parseFloat(card.getAttribute('data-tilt-max') || '3.5');
      let rafId = null;
      let targetRx = 0;
      let targetRy = 0;
      let curRx = 0;
      let curRy = 0;
      let isHovering = false;

      const updateTilt = () => {
        curRx += (targetRx - curRx) * 0.18;
        curRy += (targetRy - curRy) * 0.18;

        card.style.setProperty('--tilt-rx', `${curRx.toFixed(2)}deg`);
        card.style.setProperty('--tilt-ry', `${curRy.toFixed(2)}deg`);

        if (isHovering || Math.abs(targetRx - curRx) > 0.04 || Math.abs(targetRy - curRy) > 0.04) {
          rafId = requestAnimationFrame(updateTilt);
        } else {
          rafId = null;
          if (!isHovering) {
            card.classList.remove('is-tilting');
            card.style.removeProperty('--tilt-rx');
            card.style.removeProperty('--tilt-ry');
          }
        }
      };

      card.addEventListener('pointerenter', () => {
        if (!card.classList.contains('is-revealed') || card.classList.contains('is-scroll-moving')) return;
        isHovering = true;
        card.classList.add('is-tilting');
      });

      card.addEventListener('pointermove', (e) => {
        if (card.classList.contains('is-scroll-moving')) return;
        if (!isHovering && card.classList.contains('is-revealed')) {
          isHovering = true;
          card.classList.add('is-tilting');
        }
        if (!isHovering) return;

        const rect = card.getBoundingClientRect();
        const x = (e.clientX - rect.left) / rect.width;
        const y = (e.clientY - rect.top) / rect.height;

        card.style.setProperty('--spot-x', `${(x * 100).toFixed(1)}%`);
        card.style.setProperty('--spot-y', `${(y * 100).toFixed(1)}%`);

        targetRx = (0.5 - y) * maxTilt * 2;
        targetRy = (x - 0.5) * maxTilt * 2;

        if (!rafId) {
          rafId = requestAnimationFrame(updateTilt);
        }
      });

      card.addEventListener('pointerleave', () => {
        isHovering = false;
        targetRx = 0;
        targetRy = 0;
        if (!rafId) {
          rafId = requestAnimationFrame(updateTilt);
        }
      });
    });
  }

  /* ==========================================================================
     8. Subtle Scroll-Linked Parallax (Billboard Image & Decorative Accents)
     ========================================================================== */
  function initScrollParallax() {
    const elements = Array.from(document.querySelectorAll('[data-parallax]'));
    if (!elements.length) return;

    let ticking = false;

    const update = () => {
      ticking = false;
      const viewH = window.innerHeight;

      elements.forEach((el) => {
        const rect = el.getBoundingClientRect();
        if (rect.bottom < -100 || rect.top > viewH + 100) return;

        const speed = parseFloat(el.getAttribute('data-parallax') || '0.12');
        const progress = (rect.top + rect.height * 0.5 - viewH * 0.5) / viewH;
        const offset = progress * speed * 100;
        const scale = el.getAttribute('data-parallax-scale');

        if (scale) {
          el.style.transform = `translate3d(0, ${offset.toFixed(2)}px, 0) scale(${scale})`;
        } else {
          el.style.transform = `translate3d(0, ${offset.toFixed(2)}px, 0)`;
        }
      });
    };

    const onScroll = () => {
      if (!ticking) {
        ticking = true;
        requestAnimationFrame(update);
      }
    };

    window.addEventListener('scroll', onScroll, { passive: true });
    update();
  }

  /* ==========================================================================
     9. Gallery Filter Tab Stagger Re-Animation
     ========================================================================== */
  function initGalleryTabReanimate() {
    const filterBar = document.getElementById('gallery-year-filter');
    if (!filterBar) return;

    const buttons = filterBar.querySelectorAll('.year-tab-btn');
    buttons.forEach((btn) => {
      btn.addEventListener('click', () => {
        requestAnimationFrame(() => {
          const visibleSections = Array.from(document.querySelectorAll('.gallery-year-section')).filter(
            (sec) => !sec.classList.contains('hidden') && sec.style.display !== 'none'
          );

          visibleSections.forEach((section) => {
            const cards = Array.from(section.querySelectorAll('.photo-card')).slice(0, 15);
            cards.forEach((card, idx) => {
              const rot = idx % 2 === 0 ? -3.5 : 3.5;
              playWAAPI(
                card,
                [
                  { opacity: 0, transform: `translate3d(0, 36px, 0) scale(0.88) rotate(${rot}deg)` },
                  { opacity: 1, transform: 'translate3d(0, 0, 0) scale(1) rotate(0deg)' }
                ],
                { duration: 540, delay: Math.min(idx * 40, 340), easing: EASE_SPRING_CSS }
              );
            });
          });
        });
      });
    });
  }

  /* ==========================================================================
     Bootstrap All Motion Systems
     ========================================================================== */
  function initKrackerzMotion() {
    if (prefersReducedMotion) {
      markAllRevealed();
      return;
    }

    document.documentElement.classList.add('motion-ready');

    initHeroEntrance();
    initScrollConvergeGroups();
    initScrollReveals();
    initCurriculumStackMotion();
    initScallopRosetteMotion();
    initStatCounters();
    initMagneticCardTilt();
    initScrollParallax();
    initGalleryTabReanimate();
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initKrackerzMotion);
  } else {
    initKrackerzMotion();
  }
})();
