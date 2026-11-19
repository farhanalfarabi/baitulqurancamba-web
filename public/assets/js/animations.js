/**
 * Pondok Pesantren Tahfizh Baitul Qur'an Camba
 * Krackerz-Inspired Tactile Motion & Card Transition Engine
 * Powered by Framer Motion (window.Motion) + Damped RAF Scroll Physics
 */

(function () {
  'use strict';

  const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  const hasFinePointer = window.matchMedia('(hover: hover) and (pointer: fine)').matches;

  const EASE_SMOOTH = [0.22, 1, 0.36, 1];
  const EASE_SPRING = [0.34, 1.56, 0.64, 1];

  function markAllRevealed() {
    document.documentElement.classList.remove('motion-ready');
    document.querySelectorAll('[data-animate], [data-stagger-item], [data-hero-animate], .scallop-card-hanger').forEach((el) => {
      el.classList.add('is-revealed');
      el.style.opacity = '';
      el.style.transform = '';
      el.style.willChange = '';
    });
  }

  function cleanAfterAnimate(el) {
    el.classList.add('is-revealed');
    el.style.opacity = '';
    el.style.transform = '';
    el.style.willChange = '';
  }

  function runAnimate(target, keyframes, options) {
    if (window.Motion && typeof window.Motion.animate === 'function') {
      return window.Motion.animate(target, keyframes, options);
    }

    // Minimal WAAPI fallback if window.Motion is unavailable
    const elements = target instanceof Element ? [target] : Array.from(target || []);
    elements.forEach((el) => cleanAfterAnimate(el));
    return Promise.resolve();
  }

  /* ==========================================================================
     1. Hero Load Choreography (Staggered Framer Spring Entrance)
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
      runAnimate(
        badge,
        { opacity: [0, 1], y: [-18, 0], scale: [0.88, 1] },
        { duration: 0.65, ease: EASE_SPRING, delay: 0.05 }
      ).then(() => cleanAfterAnimate(badge));
    }

    let visibleHeadlineIdx = 0;
    headlines.forEach((el) => {
      if (el.offsetParent === null) {
        cleanAfterAnimate(el);
        return;
      }
      const delay = 0.1 + visibleHeadlineIdx * 0.085;
      visibleHeadlineIdx += 1;
      runAnimate(
        el,
        { opacity: [0, 1], y: [28, 0] },
        { duration: 0.66, ease: EASE_SMOOTH, delay }
      ).then(() => cleanAfterAnimate(el));
    });

    if (cta) {
      runAnimate(
        cta,
        { opacity: [0, 1], y: [22, 0], scale: [0.9, 1] },
        { duration: 0.65, ease: EASE_SPRING, delay: 0.34 }
      ).then(() => cleanAfterAnimate(cta));
    }

    if (mobileMarquee) {
      runAnimate(
        mobileMarquee,
        { opacity: [0, 1], y: [28, 0] },
        { duration: 0.72, ease: EASE_SMOOTH, delay: 0.36 }
      ).then(() => cleanAfterAnimate(mobileMarquee));
    }

    // Deal out the 6 desktop hero cards like playing cards (animating inner so scroll-straighten stays independent)
    if (desktopCards.length && window.innerWidth >= 1024) {
      desktopCards.forEach((cardInner, idx) => {
        // Animate from center outward feel: subtle alternating micro-tilt settle
        const startTilt = idx % 2 === 0 ? -4 : 4;
        runAnimate(
          cardInner,
          { opacity: [0, 1], y: [56, 0], scale: [0.88, 1], rotate: [startTilt, 0] },
          {
            duration: 0.78,
            ease: EASE_SPRING,
            delay: 0.28 + idx * 0.065
          }
        ).then(() => cleanAfterAnimate(cardInner));
      });
    } else {
      desktopCards.forEach((cardInner) => cleanAfterAnimate(cardInner));
    }
  }

  /* ==========================================================================
     2. Declarative Scroll Reveals & Staggered Card Waves
     ========================================================================== */
  function animateElementByType(el, type, delaySec) {
    if (el.dataset.animDone === '1') return;
    el.dataset.animDone = '1';

    let keyframes = { opacity: [0, 1], y: [36, 0] };
    let options = { duration: 0.68, ease: EASE_SMOOTH, delay: delaySec || 0 };

    switch (type) {
      case 'pop':
        keyframes = { opacity: [0, 1], y: [24, 0], scale: [0.86, 1] };
        options = { duration: 0.62, ease: EASE_SPRING, delay: delaySec || 0 };
        break;
      case 'scale-in':
        keyframes = { opacity: [0, 1], y: [32, 0], scale: [0.93, 1] };
        options = { duration: 0.74, ease: EASE_SMOOTH, delay: delaySec || 0 };
        break;
      case 'slide-left':
        keyframes = { opacity: [0, 1], x: [-36, 0] };
        options = { duration: 0.68, ease: EASE_SMOOTH, delay: delaySec || 0 };
        break;
      case 'slide-right':
        keyframes = { opacity: [0, 1], x: [36, 0] };
        options = { duration: 0.68, ease: EASE_SMOOTH, delay: delaySec || 0 };
        break;
      case 'card-pop':
        keyframes = { opacity: [0, 1], y: [46, 0], scale: [0.92, 1] };
        options = { duration: 0.72, ease: EASE_SPRING, delay: delaySec || 0 };
        break;
      case 'fade-up':
      default:
        keyframes = { opacity: [0, 1], y: [34, 0] };
        options = { duration: 0.68, ease: EASE_SMOOTH, delay: delaySec || 0 };
        break;
    }

    runAnimate(el, keyframes, options).then(() => cleanAfterAnimate(el));
  }

  function animateStaggerGroup(group) {
    if (group.dataset.staggerDone === '1') return;
    group.dataset.staggerDone = '1';

    const items = Array.from(group.querySelectorAll('[data-stagger-item]'));
    if (!items.length) return;

    const stepDelay = parseFloat(group.getAttribute('data-stagger-delay') || '0.075');
    const useTilt = group.getAttribute('data-stagger-tilt') === 'true';
    const variant = group.getAttribute('data-stagger-variant') || 'card';

    items.forEach((item, idx) => {
      if (item.dataset.animDone === '1') return;
      item.dataset.animDone = '1';

      // Cap max delay for very large grids (like gallery) so bottom items feel snappy
      const delay = Math.min(idx * stepDelay, 0.52);

      let keyframes;
      let ease = EASE_SPRING;
      let duration = 0.72;

      if (variant === 'pop') {
        const rot = useTilt ? (idx % 2 === 0 ? -3.5 : 3.5) : 0;
        keyframes = {
          opacity: [0, 1],
          y: [34, 0],
          scale: [0.85, 1],
          ...(useTilt ? { rotate: [rot, 0] } : {})
        };
        duration = 0.66;
      } else if (variant === 'row') {
        keyframes = {
          opacity: [0, 1],
          x: [-20, 0],
          y: [14, 0]
        };
        ease = EASE_SMOOTH;
        duration = 0.55;
      } else if (variant === 'gallery') {
        const rot = idx % 2 === 0 ? -1.8 : 1.8;
        keyframes = {
          opacity: [0, 1],
          y: [28, 0],
          scale: [0.92, 1],
          rotate: [rot, 0]
        };
        ease = EASE_SPRING;
        duration = 0.58;
      } else {
        // Default signature Krackerz tactile card deal
        const rot = useTilt ? (idx % 2 === 0 ? -2.4 : 2.4) : 0;
        keyframes = {
          opacity: [0, 1],
          y: [46, 0],
          scale: [0.92, 1],
          ...(useTilt ? { rotate: [rot, 0] } : {})
        };
        ease = EASE_SPRING;
        duration = 0.72;
      }

      runAnimate(item, keyframes, { duration, ease, delay }).then(() => {
        cleanAfterAnimate(item);
      });
    });
  }

  function initScrollReveals() {
    const singleTargets = Array.from(document.querySelectorAll('[data-animate]'));
    const staggerGroups = Array.from(document.querySelectorAll('[data-stagger-group]'));

    // Immediately reveal elements already scrolled past (e.g. page reload mid-scroll or hash navigation)
    const isAboveViewport = (el) => el.getBoundingClientRect().bottom < 20;

    if ('IntersectionObserver' in window) {
      const singleObserver = new IntersectionObserver(
        (entries) => {
          entries.forEach((entry) => {
            if (entry.isIntersecting || entry.boundingClientRect.top < window.innerHeight * 0.92) {
              const el = entry.target;
              const type = el.getAttribute('data-animate') || 'fade-up';
              const delay = parseFloat(el.getAttribute('data-animate-delay') || '0');
              animateElementByType(el, type, delay);
              singleObserver.unobserve(el);
            }
          });
        },
        { rootMargin: '0px 0px -6% 0px', threshold: 0.05 }
      );

      singleTargets.forEach((el) => {
        if (isAboveViewport(el)) {
          el.dataset.animDone = '1';
          cleanAfterAnimate(el);
        } else {
          singleObserver.observe(el);
        }
      });

      const groupObserver = new IntersectionObserver(
        (entries) => {
          entries.forEach((entry) => {
            if (entry.isIntersecting || entry.boundingClientRect.top < window.innerHeight * 0.92) {
              animateStaggerGroup(entry.target);
              groupObserver.unobserve(entry.target);
            }
          });
        },
        { rootMargin: '0px 0px -5% 0px', threshold: 0.04 }
      );

      staggerGroups.forEach((group) => {
        if (isAboveViewport(group)) {
          group.dataset.staggerDone = '1';
          group.querySelectorAll('[data-stagger-item]').forEach((item) => {
            item.dataset.animDone = '1';
            cleanAfterAnimate(item);
          });
        } else {
          groupObserver.observe(group);
        }
      });

      // Fail-safe sweep on scroll settle so fast anchor jumps never leave elements hidden
      let sweepTimer;
      window.addEventListener(
        'scroll',
        () => {
          clearTimeout(sweepTimer);
          sweepTimer = setTimeout(() => {
            const viewH = window.innerHeight;
            singleTargets.forEach((el) => {
              if (el.dataset.animDone !== '1') {
                const rect = el.getBoundingClientRect();
                if (rect.top < viewH * 0.96) {
                  animateElementByType(el, el.getAttribute('data-animate') || 'fade-up', 0);
                }
              }
            });
            staggerGroups.forEach((group) => {
              if (group.dataset.staggerDone !== '1') {
                const rect = group.getBoundingClientRect();
                if (rect.top < viewH * 0.96) {
                  animateStaggerGroup(group);
                }
              }
            });
          }, 160);
        },
        { passive: true }
      );
    } else {
      markAllRevealed();
    }
  }

  /* ==========================================================================
     3. Curriculum Sticky Card Stack Depth Physics (Krackerz / Framer Style)
     As Card 2 & Card 3 scroll over previous cards, cards underneath scale down,
     tuck slightly upward, and gently dim to create genuine tactile 3D depth.
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
      scale: 1,
      targetScale: 1,
      y: 0,
      targetY: 0,
      bright: 1,
      targetBright: 1
    }));

    let rafId = null;

    const computeTargets = () => {
      const stickyTop = window.innerWidth >= 640 ? 98 : 88;
      const isCompact = window.innerWidth < 640;
      const scaleStep = isCompact ? 0.04 : 0.055;
      const yStep = isCompact ? -10 : -16;
      const brightStep = 0.1;

      const rects = cards.map((card) => card.getBoundingClientRect());

      // Compute overlap progress of card[i+1] sliding over card[i]
      const coverProgress = [];
      for (let i = 0; i < cards.length - 1; i++) {
        const currRect = rects[i];
        const nextRect = rects[i + 1];
        const travelDistance = Math.max(currRect.height * 0.85, 320);
        // Progress is 0 when nextCard top is at stickyTop + travelDistance, 1 when nextCard docks at stickyTop
        const raw = (stickyTop + travelDistance - nextRect.top) / travelDistance;
        coverProgress[i] = Math.max(0, Math.min(1, raw));
      }

      // Card 0 recedes when Card 1 covers it, and recedes further when Card 2 covers Card 1
      const p01 = coverProgress[0] || 0;
      const p12 = coverProgress[1] || 0;

      state[0].targetScale = 1 - p01 * scaleStep - p12 * (scaleStep * 0.72);
      state[0].targetY = p01 * yStep + p12 * (yStep * 0.65);
      state[0].targetBright = 1 - p01 * brightStep - p12 * (brightStep * 0.8);

      // Card 1 gently scales up from 0.975 -> 1.0 as it docks, then recedes when Card 2 covers it
      const card1EntryBoost = (1 - p01) * -0.025;
      state[1].targetScale = 1 + card1EntryBoost - p12 * scaleStep;
      state[1].targetY = p12 * yStep;
      state[1].targetBright = 1 - p12 * brightStep;

      // Card 2 gently scales up from 0.975 -> 1.0 as it docks
      if (state[2]) {
        const card2EntryBoost = (1 - p12) * -0.025;
        state[2].targetScale = 1 + card2EntryBoost;
        state[2].targetY = 0;
        state[2].targetBright = 1;
      }
    };

    const tick = () => {
      let needsMore = false;
      const lerp = 0.16;

      cards.forEach((card, i) => {
        const s = state[i];
        const dScale = s.targetScale - s.scale;
        const dY = s.targetY - s.y;
        const dBright = s.targetBright - s.bright;

        if (Math.abs(dScale) > 0.0005 || Math.abs(dY) > 0.08 || Math.abs(dBright) > 0.001) {
          s.scale += dScale * lerp;
          s.y += dY * lerp;
          s.bright += dBright * lerp;
          needsMore = true;
        } else {
          s.scale = s.targetScale;
          s.y = s.targetY;
          s.bright = s.targetBright;
        }

        card.style.setProperty('--stack-scale', s.scale.toFixed(4));
        card.style.setProperty('--stack-y', `${s.y.toFixed(2)}px`);
        card.style.setProperty('--stack-brightness', s.bright.toFixed(3));
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
     4. Scalloped Rosette Cards: Pendulum Drop-In & Scroll-Linked Sway
     ========================================================================== */
  function initScallopRosetteMotion() {
    const section = document.getElementById('target-lulusan');
    if (!section) return;

    const wrappers = Array.from(section.querySelectorAll('.scallop-card-wrapper'));
    const hangers = wrappers.map((w) => w.querySelector('.scallop-card-hanger')).filter(Boolean);
    if (!wrappers.length) return;

    // 4a. Pendulum Bounce-In Entrance when section enters viewport
    let hasEntered = false;
    const triggerEntrance = () => {
      if (hasEntered) return;
      hasEntered = true;

      hangers.forEach((hanger, idx) => {
        const swingDir = idx % 2 === 0 ? 1 : -1;
        runAnimate(
          hanger,
          {
            opacity: [0, 1],
            y: [52, -8, 0],
            scale: [0.84, 1.03, 1],
            rotate: [swingDir * 11, -swingDir * 4.5, swingDir * 1.8, 0]
          },
          {
            duration: 0.95,
            ease: EASE_SMOOTH,
            delay: idx * 0.11
          }
        ).then(() => {
          // Clear inline transform so CSS :hover hangingSwing works cleanly!
          hanger.style.transform = '';
          hanger.style.opacity = '';
          hanger.classList.add('is-revealed');
        });
      });
    };

    if (section.getBoundingClientRect().top < window.innerHeight * 0.92) {
      triggerEntrance();
    } else if ('IntersectionObserver' in window) {
      const obs = new IntersectionObserver(
        (entries) => {
          entries.forEach((entry) => {
            if (entry.isIntersecting || entry.boundingClientRect.top < window.innerHeight * 0.92) {
              triggerEntrance();
              obs.disconnect();
            }
          });
        },
        { threshold: 0.08 }
      );
      obs.observe(section);
    } else {
      triggerEntrance();
    }

    // 4b. Subtle Continuous Scroll-Linked Pendulum Sway & Wave
    let currentProgress = 0;
    let targetProgress = 0;
    let rafId = null;

    const updateProgress = () => {
      const rect = section.getBoundingClientRect();
      const viewH = window.innerHeight;
      // Normalized -1 (entering bottom) to +1 (leaving top)
      const centerRatio = (viewH * 0.5 - (rect.top + rect.height * 0.5)) / (viewH + rect.height);
      targetProgress = Math.max(-1, Math.min(1, centerRatio * 2));
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
      const rotAmp = isDesktop ? 4.2 : 2.2;
      const yAmp = isDesktop ? 16 : 8;

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
     5. Stat Cards Animated Counter (e.g. 8+, 30, 150+, 100%)
     ========================================================================== */
  function initStatCounters() {
    const counters = Array.from(document.querySelectorAll('[data-count-to]'));
    if (!counters.length) return;

    const animateCounter = (el) => {
      if (el.dataset.counted === '1') return;
      el.dataset.counted = '1';

      const target = parseInt(el.getAttribute('data-count-to') || '0', 10);
      const suffix = el.getAttribute('data-count-suffix') || '';
      const duration = 1100;
      const startTime = performance.now();

      const step = (now) => {
        const elapsed = now - startTime;
        const t = Math.min(1, elapsed / duration);
        // Smooth easeOutQuart
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
        { threshold: 0.35 }
      );
      counters.forEach((c) => obs.observe(c));
    } else {
      counters.forEach(animateCounter);
    }
  }

  /* ==========================================================================
     6. Tactile 3D Magnetic Card Hover & Cursor Gloss Spotlight (Desktop)
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
        // Don't start tilting while entrance animation is still running
        if (card.hasAttribute('data-stagger-item') && !card.classList.contains('is-revealed')) return;
        isHovering = true;
        card.classList.add('is-tilting');
      });

      card.addEventListener('pointermove', (e) => {
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
     7. Subtle Scroll-Linked Parallax (Billboard Image & Decorative Accents)
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
     8. Gallery Filter Tab Stagger Re-Animation
     ========================================================================== */
  function initGalleryTabReanimate() {
    const filterBar = document.getElementById('gallery-year-filter');
    if (!filterBar) return;

    const buttons = filterBar.querySelectorAll('.year-tab-btn');
    buttons.forEach((btn) => {
      btn.addEventListener('click', () => {
        // Wait 1 frame for existing filter handler to toggle visibility
        requestAnimationFrame(() => {
          const visibleSections = Array.from(document.querySelectorAll('.gallery-year-section')).filter(
            (sec) => !sec.classList.contains('hidden') && sec.style.display !== 'none'
          );

          visibleSections.forEach((section) => {
            const cards = Array.from(section.querySelectorAll('.photo-card')).slice(0, 15);
            cards.forEach((card, idx) => {
              runAnimate(
                card,
                { opacity: [0, 1], y: [22, 0], scale: [0.93, 1] },
                { duration: 0.45, ease: EASE_SPRING, delay: Math.min(idx * 0.035, 0.32) }
              ).then(() => cleanAfterAnimate(card));
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
