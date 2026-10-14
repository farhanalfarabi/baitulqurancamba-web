/**
 * KRACKERZ - Tactile Neo-Brutalist Interactivity
 */

window.initKrackerzApp = function() {
  initMobileMenu();
  initCurriculumScrollStack();
  initPricingToggle();
  initFaqAccordion();
  initDraggableStickers();
  initWaitlistModal();
  initHeroWaveParallax();
  initHeroCardsScrollStraighten();
  initGalleryInteractivity();
  initPrestasiInteractivity();
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
   2. Curriculum Stacking Scroll Cards (Krackerz Sticky Folder Tabs on Scroll)
   ========================================================================== */
function initCurriculumScrollStack() {
  const container = document.getElementById('curriculum-stack-container');
  if (!container) return;

  const cards = [
    document.getElementById('curriculum-card-1'),
    document.getElementById('curriculum-card-2'),
    document.getElementById('curriculum-card-3')
  ];

  const triggers = container.querySelectorAll('.curriculum-tab-trigger');
  triggers.forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.preventDefault();
      const cardNum = parseInt(btn.getAttribute('data-target-card'), 10);
      const targetCard = cards[cardNum - 1];
      if (targetCard) {
        const rect = targetCard.getBoundingClientRect();
        const currentScroll = window.scrollY || window.pageYOffset;
        const targetTop = currentScroll + rect.top - 100;
        window.scrollTo({
          top: targetTop,
          behavior: 'smooth'
        });
      }
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

  // Base configurations for 6 cards (Organic fanned & staggered "tidak rapi" layout)
  const baseCardConfigs = [
    { rot: -6, y: 24, overlap: 0 },
    { rot: -4, y: 0, overlap: -14 },
    { rot: -2, y: 10, overlap: -14 },
    { rot: 2, y: 0, overlap: -14 },
    { rot: 4, y: 26, overlap: -14 },
    { rot: 6, y: 0, overlap: -14 }
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

/* ==========================================================================
   9. Gallery Interactivity (Year Filtering & Pure Photo Lightbox)
   ========================================================================== */
function initGalleryInteractivity() {
  const yearFilterContainer = document.getElementById('gallery-year-filter');
  const lightbox = document.getElementById('gallery-lightbox');

  // Highlight active nav link on gallery page
  const currentPath = window.location.pathname;
  if (currentPath.includes('gallery.html')) {
    const galleryLinks = document.querySelectorAll('a[href*="gallery.html"]');
    galleryLinks.forEach(link => {
      link.classList.add('text-[#CF2B09]', 'font-bold');
    });
  }

  const photoCards = Array.from(document.querySelectorAll('.photo-card'));
  const yearSections = Array.from(document.querySelectorAll('.gallery-year-section'));

  // 1. Year Filtering Tabs
  if (yearFilterContainer && yearSections.length > 0) {
    const tabs = yearFilterContainer.querySelectorAll('.year-tab-btn');

    tabs.forEach(tab => {
      tab.addEventListener('click', () => {
        const year = tab.getAttribute('data-year');

        // Update active tab styles
        tabs.forEach(t => {
          t.classList.remove('active', 'bg-[#121212]', 'text-lime', 'brutal-shadow-sm');
          t.classList.add('bg-white', 'text-[#121212]', 'border-transparent');
        });
        tab.classList.add('active', 'bg-[#121212]', 'text-lime', 'brutal-shadow-sm');
        tab.classList.remove('bg-white', 'text-[#121212]', 'border-transparent');

        // Filter Year Sections
        yearSections.forEach(section => {
          const sectionId = section.id; // e.g. section-2026
          if (year === 'all' || sectionId === `section-${year}`) {
            section.style.display = '';
            section.style.opacity = '0';
            section.style.transform = 'translateY(12px)';
            requestAnimationFrame(() => {
              section.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
              section.style.opacity = '1';
              section.style.transform = 'translateY(0)';
            });
          } else {
            section.style.display = 'none';
          }
        });
      });
    });
  }

  // 2. Pure Photo Lightbox Viewer
  if (!lightbox || photoCards.length === 0) return;

  const lightboxImg = document.getElementById('lightbox-img');
  const lightboxYear = document.getElementById('lightbox-year');
  const lightboxCounter = document.getElementById('lightbox-counter');
  const closeBtn = document.getElementById('lightbox-close-btn');
  const prevBtn = document.getElementById('lightbox-prev-btn');
  const nextBtn = document.getElementById('lightbox-next-btn');

  let currentIndex = 0;
  let visibleCards = photoCards;

  function updateVisibleCards() {
    visibleCards = photoCards.filter(card => {
      const parentSection = card.closest('.gallery-year-section');
      return !parentSection || parentSection.style.display !== 'none';
    });
  }

  function openLightbox(index) {
    updateVisibleCards();
    if (!visibleCards.length) return;

    currentIndex = (index + visibleCards.length) % visibleCards.length;
    const currentCard = visibleCards[currentIndex];
    const imgEl = currentCard.querySelector('img');
    const yearVal = currentCard.getAttribute('data-year') || 'CAMPUS';

    if (imgEl && lightboxImg) {
      lightboxImg.src = imgEl.src;
      lightboxImg.alt = imgEl.alt || 'Gallery photo';
    }
    if (lightboxYear) {
      lightboxYear.textContent = yearVal;
    }
    if (lightboxCounter) {
      lightboxCounter.textContent = `${currentIndex + 1} / ${visibleCards.length}`;
    }

    lightbox.classList.remove('hidden');
    lightbox.classList.add('flex');
    document.body.style.overflow = 'hidden';
  }

  function closeLightbox() {
    lightbox.classList.add('hidden');
    lightbox.classList.remove('flex');
    document.body.style.overflow = '';
  }

  function showNext() {
    updateVisibleCards();
    if (visibleCards.length > 0) {
      openLightbox((currentIndex + 1) % visibleCards.length);
    }
  }

  function showPrev() {
    updateVisibleCards();
    if (visibleCards.length > 0) {
      openLightbox((currentIndex - 1 + visibleCards.length) % visibleCards.length);
    }
  }

  // Attach click listener to each scattered photo card
  photoCards.forEach(card => {
    card.addEventListener('click', () => {
      updateVisibleCards();
      const idx = visibleCards.indexOf(card);
      if (idx !== -1) {
        openLightbox(idx);
      }
    });
  });

  // Buttons event listeners
  if (closeBtn) closeBtn.addEventListener('click', closeLightbox);
  if (nextBtn) nextBtn.addEventListener('click', showNext);
  if (prevBtn) prevBtn.addEventListener('click', showPrev);

  // Close when clicking backdrop outside modal content
  lightbox.addEventListener('click', (e) => {
    if (e.target === lightbox) {
      closeLightbox();
    }
  });

  // Keyboard navigation support (Esc, Left arrow, Right arrow)
  document.addEventListener('keydown', (e) => {
    if (lightbox.classList.contains('flex')) {
      if (e.key === 'Escape') closeLightbox();
      if (e.key === 'ArrowRight') showNext();
      if (e.key === 'ArrowLeft') showPrev();
    }
  });
}

/* ==========================================================================
   10. Prestasi / Student Achievements (Filtering & Poster Lightbox)
   ========================================================================== */
function initPrestasiInteractivity() {
  const filterBtns = document.querySelectorAll('.prestasi-filter-btn');
  const cards = document.querySelectorAll('.prestasi-card');
  const lightbox = document.getElementById('prestasi-lightbox-modal');
  const lightboxImg = document.getElementById('prestasi-lightbox-img');
  const lightboxTitle = document.getElementById('prestasi-lightbox-title');
  const lightboxDesc = document.getElementById('prestasi-lightbox-desc');
  const closeBtn = document.getElementById('prestasi-lightbox-close');

  if (!cards.length) return;

  // Filter tabs handling
  filterBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      const filter = btn.getAttribute('data-prestasi-filter');

      // Update button styling
      filterBtns.forEach(b => {
        b.classList.remove('bg-[#121212]', 'text-lime', 'border-2', 'border-[#121212]', 'active-tab');
        b.classList.add('bg-white', 'text-[#121212]', 'border', 'border-[#161616]/20');
      });
      btn.classList.remove('bg-white', 'text-[#121212]', 'border', 'border-[#161616]/20');
      btn.classList.add('bg-[#121212]', 'text-lime', 'border-2', 'border-[#121212]', 'active-tab');

      // Filter cards with smooth fade
      cards.forEach(card => {
        const cat = card.getAttribute('data-category');
        if (filter === 'all' || cat === filter) {
          card.style.display = 'flex';
          setTimeout(() => {
            card.style.opacity = '1';
            card.style.transform = 'translateY(0) scale(1)';
          }, 10);
        } else {
          card.style.opacity = '0';
          card.style.transform = 'scale(0.95)';
          setTimeout(() => {
            card.style.display = 'none';
          }, 200);
        }
      });
    });
  });

  // Lightbox Modal for Full Poster
  if (!lightbox || !lightboxImg) return;

  function openLightbox(card) {
    const src = card.getAttribute('data-poster-src');
    const title = card.getAttribute('data-poster-title');
    const desc = card.getAttribute('data-poster-desc');

    if (!src) return;

    lightboxImg.src = src;
    if (lightboxTitle) lightboxTitle.textContent = title || '';
    if (lightboxDesc) lightboxDesc.textContent = desc || '';

    lightbox.classList.remove('hidden');
    lightbox.classList.add('flex');
    requestAnimationFrame(() => {
      lightbox.classList.remove('opacity-0');
      lightbox.classList.add('opacity-100');
      const dialog = lightbox.querySelector('.transform');
      if (dialog) {
        dialog.classList.remove('scale-95');
        dialog.classList.add('scale-100');
      }
    });
    document.body.style.overflow = 'hidden';
  }

  function closeLightbox() {
    lightbox.classList.remove('opacity-100');
    lightbox.classList.add('opacity-0');
    const dialog = lightbox.querySelector('.transform');
    if (dialog) {
      dialog.classList.remove('scale-100');
      dialog.classList.add('scale-95');
    }
    setTimeout(() => {
      lightbox.classList.remove('flex');
      lightbox.classList.add('hidden');
      document.body.style.overflow = '';
      lightboxImg.src = '';
    }, 250);
  }

  // Open modal on card click
  cards.forEach(card => {
    card.addEventListener('click', () => {
      openLightbox(card);
    });
  });

  if (closeBtn) closeBtn.addEventListener('click', closeLightbox);

  lightbox.addEventListener('click', (e) => {
    if (e.target === lightbox) {
      closeLightbox();
    }
  });

  document.addEventListener('keydown', (e) => {
    if (lightbox.classList.contains('flex') && e.key === 'Escape') {
      closeLightbox();
    }
  });
}


