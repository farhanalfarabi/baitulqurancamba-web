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
   2. Folder Tabs (Core Features)
   ========================================================================== */
function initFolderTabs() {
  const tabs = document.querySelectorAll('.folder-tab-btn');
  const panels = document.querySelectorAll('.folder-panel');

  if (!tabs.length || !panels.length) return;

  tabs.forEach(tab => {
    tab.addEventListener('click', () => {
      const targetId = tab.getAttribute('data-tab');

      // Update active tabs
      tabs.forEach(t => {
        t.classList.remove('active', 'bg-[#E53935]', 'text-white');
        t.classList.add('inactive', 'bg-[#E8E2D5]', 'text-[#121212]');
      });
      tab.classList.remove('inactive', 'bg-[#E8E2D5]', 'text-[#121212]');
      tab.classList.add('active', 'bg-[#E53935]', 'text-white');

      // Update visible panel
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
      if (priceReady) priceReady.textContent = '$28';
      if (periodReady) periodReady.textContent = '/ MONTH (BILLED ANNUALLY)';
      if (priceStudents) priceStudents.textContent = '$12.99';
      if (periodStudents) periodStudents.textContent = '/ MONTH (BILLED ANNUALLY)';
      if (labelYearly) labelYearly.classList.add('text-[#121212]', 'font-bold');
      if (labelMonthly) labelMonthly.classList.remove('font-bold');
    } else {
      if (priceReady) priceReady.textContent = '$35';
      if (periodReady) periodReady.textContent = '/ MONTH';
      if (priceStudents) priceStudents.textContent = '$15.99';
      if (periodStudents) periodStudents.textContent = '/ MONTH';
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
        alert('Please fill in your name and email address.');
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
   ========================================================================== */
function initHeroCardsScrollStraighten() {
  const cardsTrack = document.getElementById('hero-cards-track');
  if (!cardsTrack) return;

  const updateCardState = () => {
    const scrollY = window.scrollY || window.pageYOffset;
    // When scrolled down > 40px, cards straighten into neat horizontal row matching reference
    if (scrollY > 40) {
      if (!cardsTrack.classList.contains('is-straightened')) {
        cardsTrack.classList.add('is-straightened');
        cardsTrack.classList.remove('-space-x-2.5', 'sm:-space-x-3.5', 'lg:-space-x-4');
      }
    } else {
      if (cardsTrack.classList.contains('is-straightened')) {
        cardsTrack.classList.remove('is-straightened');
        cardsTrack.classList.add('-space-x-2.5', 'sm:-space-x-3.5', 'lg:-space-x-4');
      }
    }
  };

  window.addEventListener('scroll', updateCardState, { passive: true });
  window.addEventListener('resize', updateCardState, { passive: true });
  updateCardState();
}
