/**
 * KRACKERZ - Tactile Neo-Brutalist Interactivity
 */

window.initKrackerzApp = function() {
  initMobileMenu();
  initFolderTabs();
  initPricingToggle();
  initFaqAccordion();
  initDraggableStickers();
  initWaitlistModal();
  initHeroWaveParallax();
  initHeroCardsScrollStraighten();
};

document.addEventListener('DOMContentLoaded', () => {
  // If no component loader is running or if components are already rendered
  if (!document.querySelector('[data-component]')) {
    window.initKrackerzApp();
  }
});

/* ==========================================================================
   1. Mobile Menu Drawer
   ========================================================================== */
function initMobileMenu() {
  const menuBtn = document.getElementById('btn-mobile-menu');
  const mobileNav = document.getElementById('mobile-nav');

  if (!menuBtn || !mobileNav) return;

  menuBtn.addEventListener('click', () => {
    const isHidden = mobileNav.classList.contains('hidden');
    if (isHidden) {
      mobileNav.classList.remove('hidden');
      menuBtn.setAttribute('aria-expanded', 'true');
    } else {
      mobileNav.classList.add('hidden');
      menuBtn.setAttribute('aria-expanded', 'false');
    }
  });

  // Close when clicking nav links
  const links = mobileNav.querySelectorAll('a');
  links.forEach(link => {
    link.addEventListener('click', () => {
      mobileNav.classList.add('hidden');
      menuBtn.setAttribute('aria-expanded', 'false');
    });
  });
}

/* ==========================================================================
   2. Folder Tabs (Core Features - Krackerz Asymmetrical Tabs)
   ========================================================================== */
function initFolderTabs() {
  const tabs = document.querySelectorAll('.folder-tab-btn');
  const panels = document.querySelectorAll('.folder-panel');
  const cardBody = document.getElementById('folder-card-body');

  if (!tabs.length || !panels.length) return;

  tabs.forEach(tab => {
    tab.addEventListener('click', () => {
      const targetId = tab.getAttribute('data-tab');
      const targetColor = tab.getAttribute('data-color') || '#CF2B09';

      // 1. Update card body background color to match active tab
      if (cardBody) {
        cardBody.style.backgroundColor = targetColor;
      }

      // 2. Update active tab states, opacity & elevation z-index
      tabs.forEach(t => {
        if (t === tab) {
          t.classList.add('active', 'opacity-100');
          t.classList.remove('opacity-85');
          t.style.zIndex = '30';
        } else {
          t.classList.remove('active', 'opacity-100');
          t.classList.add('opacity-85');
          t.style.zIndex = '10';
        }
      });

      // 3. Update visible panel
      panels.forEach(p => {
        if (p.id === targetId) {
          p.classList.remove('hidden');
        } else {
          p.classList.add('hidden');
        }
      });
    });
  });
}


/* ==========================================================================
   3. Pricing Toggle (Monthly vs Yearly)
   ========================================================================== */
function initPricingToggle() {
  const toggle = document.getElementById('billing-toggle');
  const priceReady = document.getElementById('price-ready');
  const priceStudents = document.getElementById('price-students');
  const periodReady = document.getElementById('period-ready');
  const periodStudents = document.getElementById('period-students');
  const labelMonthly = document.getElementById('label-monthly');
  const labelYearly = document.getElementById('label-yearly');

  if (!toggle) return;

  toggle.addEventListener('change', () => {
    const isYearly = toggle.checked;

    if (isYearly) {
      if (priceReady) priceReady.textContent = 'Rp 360rb';
      if (periodReady) periodReady.textContent = '/ BULAN (BAYAR TAHUNAN)';
      if (priceStudents) priceStudents.textContent = 'Rp 200rb';
      if (periodStudents) periodStudents.textContent = '/ BULAN (BAYAR TAHUNAN)';
      if (labelYearly) labelYearly.classList.add('text-[#121212]', 'font-bold');
      if (labelMonthly) labelMonthly.classList.remove('font-bold');
    } else {
      if (priceReady) priceReady.textContent = 'Rp 450rb';
      if (periodReady) periodReady.textContent = '/ BULAN';
      if (priceStudents) priceStudents.textContent = 'Rp 250rb';
      if (periodStudents) periodStudents.textContent = '/ BULAN';
      if (labelMonthly) labelMonthly.classList.add('font-bold');
      if (labelYearly) labelYearly.classList.remove('font-bold');
    }
  });
}

/* ==========================================================================
   4. FAQ Accordion
   ========================================================================== */
function initFaqAccordion() {
  const faqItems = document.querySelectorAll('.faq-item');

  faqItems.forEach(item => {
    const trigger = item.querySelector('.faq-trigger');
    if (!trigger) return;

    trigger.addEventListener('click', () => {
      const isActive = item.classList.contains('active');

      // Close other open items
      faqItems.forEach(otherItem => {
        if (otherItem !== item) {
          otherItem.classList.remove('active');
        }
      });

      // Toggle current
      if (isActive) {
        item.classList.remove('active');
      } else {
        item.classList.add('active');
      }
    });
  });
}

/* ==========================================================================
   5. Interactive Draggable Stickers (Laptop Surface)
   ========================================================================== */
function initDraggableStickers() {
  const laptopSurface = document.getElementById('laptop-surface');
  const stickers = document.querySelectorAll('.draggable-sticker');

  if (!laptopSurface || !stickers.length) return;

  let activeSticker = null;
  let offsetX = 0;
  let offsetY = 0;
  let highestZ = 20;

  stickers.forEach(sticker => {
    // Mouse events
    sticker.addEventListener('mousedown', (e) => {
      startDrag(sticker, e.clientX, e.clientY);
      e.preventDefault();
    });

    // Touch events
    sticker.addEventListener('touchstart', (e) => {
      if (e.touches.length === 1) {
        startDrag(sticker, e.touches[0].clientX, e.touches[0].clientY);
      }
    }, { passive: false });
  });

  function startDrag(sticker, clientX, clientY) {
    activeSticker = sticker;
    highestZ += 1;
    activeSticker.style.zIndex = highestZ;
    activeSticker.classList.add('is-dragging');

    const rect = activeSticker.getBoundingClientRect();
    offsetX = clientX - rect.left;
    offsetY = clientY - rect.top;
  }

  // Pointer move handler
  function onMove(clientX, clientY) {
    if (!activeSticker) return;

    const surfaceRect = laptopSurface.getBoundingClientRect();
    let newX = clientX - surfaceRect.left - offsetX;
    let newY = clientY - surfaceRect.top - offsetY;

    // Boundaries within laptop lid
    const stickerWidth = activeSticker.offsetWidth;
    const stickerHeight = activeSticker.offsetHeight;

    newX = Math.max(0, Math.min(newX, surfaceRect.width - stickerWidth));
    newY = Math.max(0, Math.min(newY, surfaceRect.height - stickerHeight));

    activeSticker.style.left = `${newX}px`;
    activeSticker.style.top = `${newY}px`;
    activeSticker.style.transform = 'none'; // Lock position on move
  }

  document.addEventListener('mousemove', (e) => {
    if (activeSticker) {
      onMove(e.clientX, e.clientY);
    }
  });

  document.addEventListener('touchmove', (e) => {
    if (activeSticker && e.touches.length === 1) {
      onMove(e.touches[0].clientX, e.touches[0].clientY);
      e.preventDefault();
    }
  }, { passive: false });

  function stopDrag() {
    if (activeSticker) {
      activeSticker.classList.remove('is-dragging');
      activeSticker = null;
    }
  }

  document.addEventListener('mouseup', stopDrag);
  document.addEventListener('touchend', stopDrag);
}

/* ==========================================================================
   6. Waitlist Modal & Feedback
   ========================================================================== */
function initWaitlistModal() {
  const modal = document.getElementById('waitlist-modal');
  const openButtons = document.querySelectorAll('[data-open-modal="waitlist"]');
  const closeButton = document.getElementById('btn-close-modal');
  const form = document.getElementById('waitlist-form');
  const successState = document.getElementById('waitlist-success');
  const resetBtn = document.getElementById('btn-reset-form');

  if (!modal) return;

  openButtons.forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.preventDefault();
      openModal();
    });
  });

  if (closeButton) {
    closeButton.addEventListener('click', closeModal);
  }

  // Backdrop click
  modal.addEventListener('click', (e) => {
    if (e.target === modal) {
      closeModal();
    }
  });

  // ESC key
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
      closeModal();
    }
  });

  function openModal() {
    modal.classList.remove('hidden');
    document.body.style.overflow = 'hidden';
    const firstInput = modal.querySelector('input');
    if (firstInput) firstInput.focus();
  }

  function closeModal() {
    modal.classList.add('hidden');
    document.body.style.overflow = '';
  }

  // Form Submission
  if (form) {
    form.addEventListener('submit', (e) => {
      e.preventDefault();
      const nameInput = form.querySelector('#waitlist-name');
      const emailInput = form.querySelector('#waitlist-email');
      const roleSelect = form.querySelector('#waitlist-role');

      if (!nameInput.value.trim() || !emailInput.value.trim()) {
        alert('Mohon isi nama lengkap calon santri dan kontak wali santri.');
        return;
      }

      // Show success
      form.classList.add('hidden');
      if (successState) {
        successState.classList.remove('hidden');
        const userEmailSpan = document.getElementById('success-email-text');
        if (userEmailSpan) {
          userEmailSpan.textContent = emailInput.value.trim();
        }
      }
    });
  }

  // Reset form
  if (resetBtn && form && successState) {
    resetBtn.addEventListener('click', () => {
      form.reset();
      form.classList.remove('hidden');
      successState.classList.add('hidden');
      closeModal();
    });
  }
}

/* ==========================================================================
   7. Hero Wave Scroll Parallax (Complementing the 68s continuous rotation)
   ========================================================================== */
function initHeroWaveParallax() {
  const waveWrapper = document.querySelector('.krackerz-wave-wrapper');
  if (!waveWrapper) return;

  window.addEventListener('scroll', () => {
    const scrollY = window.scrollY;
    if (scrollY < 1200) {
      waveWrapper.style.transform = `translateY(${scrollY * 0.12}px)`;
    }
  }, { passive: true });
}

/* ==========================================================================
   8. Hero Cards Scroll Straighten (Fanned -> Straightened Row on Scroll)
   Continuous Scroll-Linked Interpolation (Silky Smooth RAF + Damped Lerp)
   ========================================================================== */
function initHeroCardsScrollStraighten() {
  const cardsTrack = document.getElementById('hero-cards-track');
  if (!cardsTrack) return;

  const cards = cardsTrack.querySelectorAll('.hero-card-fan');
  if (!cards.length) return;

  // Base fanned configurations for 6 cards (Desktop reference)
  const baseCardConfigs = [
    { rot: -6, y: 24, overlap: 0 },
    { rot: -4, y: 0,  overlap: -14 },
    { rot: -2, y: 10, overlap: -14 },
    { rot: 2,  y: 0,  overlap: -14 },
    { rot: 4,  y: 26, overlap: -14 },
    { rot: 6,  y: 0,  overlap: -14 }
  ];

  let currentP = 0;
  let targetP = 0;
  let isTicking = false;

  const getResponsiveFactors = () => {
    const width = window.innerWidth;
    if (width < 640) {
      return { scale: 0.5, maxGap: 12, maxScroll: 150 };
    } else if (width < 1024) {
      return { scale: 0.75, maxGap: 16, maxScroll: 175 };
    } else {
      return { scale: 1.0, maxGap: 20, maxScroll: 200 };
    }
  };

  const applyProgress = (p) => {
    const { scale, maxGap } = getResponsiveFactors();
    const inv = 1 - p;

    // Smooth gap expansion on track
    const gap = p * maxGap;
    cardsTrack.style.setProperty('--track-gap', `${gap.toFixed(2)}px`);

    // Smooth transform & overlap on each individual card
    cards.forEach((card, index) => {
      const cfg = baseCardConfigs[index] || { rot: 0, y: 0, overlap: -14 };
      const rot = cfg.rot * scale * inv;
      const y = cfg.y * scale * inv;
      const overlap = cfg.overlap * scale * inv;

      card.style.setProperty('--card-rot', `${rot.toFixed(2)}deg`);
      card.style.setProperty('--card-y', `${y.toFixed(2)}px`);
      card.style.setProperty('--card-overlap', `${overlap.toFixed(2)}px`);
    });

    if (p > 0.95) {
      cardsTrack.classList.add('is-straightened');
    } else {
      cardsTrack.classList.remove('is-straightened');
    }
  };

  const tick = () => {
    const diff = targetP - currentP;
    if (Math.abs(diff) < 0.001) {
      currentP = targetP;
      applyProgress(currentP);
      isTicking = false;
      return;
    }

    // Damped lerp (factor 0.18 for instant reactivity + fluid damping)
    currentP += diff * 0.18;
    applyProgress(currentP);
    requestAnimationFrame(tick);
  };

  const onScrollOrResize = () => {
    const scrollY = window.scrollY || window.pageYOffset;
    const { maxScroll } = getResponsiveFactors();

    // Direct mapping to target progress [0, 1]
    targetP = Math.min(1, Math.max(0, scrollY / maxScroll));

    if (!isTicking) {
      isTicking = true;
      requestAnimationFrame(tick);
    }
  };

  window.addEventListener('scroll', onScrollOrResize, { passive: true });
  window.addEventListener('resize', onScrollOrResize, { passive: true });

  // Initial immediate evaluation based on current page scroll
  const initialY = window.scrollY || window.pageYOffset;
  const { maxScroll } = getResponsiveFactors();
  targetP = Math.min(1, Math.max(0, initialY / maxScroll));
  currentP = targetP;
  applyProgress(currentP);
}
