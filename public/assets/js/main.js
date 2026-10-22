/**
 * Pondok Pesantren Tahfizh Baitul Qur'an Camba
 * Tactile Neo-Brutalist Interactivity
 */

function initApp() {
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
  init3DCoverflow();
}

window.initApp = initApp;

document.addEventListener('DOMContentLoaded', () => {
  initApp();
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
   2. Curriculum Stacking Scroll Cards (Sticky Folder Tabs on Scroll)
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
  const googleFormUrl = 'https://forms.gle/dUHmyuv98pgXiPcS7';
  const modal = document.getElementById('waitlist-modal');
  const openButtons = document.querySelectorAll('[data-open-modal="waitlist"]');
  const closeButton = document.getElementById('btn-close-modal');
  const form = document.getElementById('waitlist-form');
  const successState = document.getElementById('waitlist-success');
  const resetBtn = document.getElementById('btn-reset-form');

  openButtons.forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.preventDefault();
      window.open(googleFormUrl, '_blank', 'noopener,noreferrer');
    });
  });

  if (!modal) return;

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
  const waveWrapper = document.querySelector('.hero-wave-wrapper');
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

/* ==========================================================================
   11. 3D Perspective Coverflow Showcase
   ========================================================================== */
function init3DCoverflow() {
  const viewport = document.getElementById('coverflow-viewport');
  if (!viewport) return;

  const cards = Array.from(viewport.querySelectorAll('.coverflow-card'));
  const dotsContainer = document.getElementById('coverflow-dots-container');
  const titleEl = document.getElementById('coverflow-title');
  const subtitleEl = document.getElementById('coverflow-subtitle');
  const yearEl = document.getElementById('coverflow-year');
  const key1El = document.getElementById('coverflow-meta-key-1');
  const val1El = document.getElementById('coverflow-meta-val-1');
  const key2El = document.getElementById('coverflow-meta-key-2');
  const val2El = document.getElementById('coverflow-meta-val-2');
  const btnPrev = document.getElementById('coverflow-btn-prev');
  const btnNext = document.getElementById('coverflow-btn-next');

  if (!cards.length) return;

  const COVERFLOW_DATA = [
    {
      title: "Halaqah Fajar Al-Qur'an",
      subtitle: "Sanctuary of 30 Juz Memorization",
      year: "2025",
      key1: "Program",
      val1: "Tahfizh 30 Juz",
      key2: "Location",
      val2: "Masjid Utama Camba"
    },
    {
      title: "Multilingual Oratory",
      subtitle: "Arabic, English & Indonesian Speech",
      year: "2025",
      key1: "Program",
      val1: "Public Speaking",
      key2: "Schedule",
      val2: "Weekly Stage Routine"
    },
    {
      title: "Dirasah Islamiyyah Turath",
      subtitle: "Classical Islamic Jurisprudence & Adab",
      year: "2024",
      key1: "Program",
      val1: "Fiqh & Hadith Study",
      key2: "Mentorship",
      val2: "Middle East Alumnus"
    },
    {
      title: "Student Leadership Camp",
      subtitle: "Character, Discipline & Resilience",
      year: "2025",
      key1: "Program",
      val1: "Santri Leadership",
      key2: "Focus",
      val2: "Organizational Maturity"
    },
    {
      title: "National Discipline Ceremony",
      subtitle: "Patriotism, Focus & Composure",
      year: "2025",
      key1: "Program",
      val1: "Formal Education",
      key2: "Curriculum",
      val2: "Wustha & Ulya Diploma"
    },
    {
      title: "Sunnah Sports & Vitality",
      subtitle: "Physical Agility & Sportsmanship",
      year: "2024",
      key1: "Program",
      val1: "Sunnah Athletics",
      key2: "Schedule",
      val2: "Afternoon Eskul"
    },
    {
      title: "Open-Air Pine Forest Study",
      subtitle: "Serene Mountain Gazebo Sanctuary",
      year: "2025",
      key1: "Program",
      val1: "Outdoor Muraja'ah",
      key2: "Location",
      val2: "Pine Hill Sanctuary"
    },
    {
      title: "Al-Qur'an Tasmi' Examination",
      subtitle: "Live Memorization & Recitation Assessment",
      year: "2025",
      key1: "Program",
      val1: "Tasmi' & Munaqasyah",
      key2: "Evaluation",
      val2: "Live Examiner Panel"
    },
    {
      title: "Boarding Sanctuary Quarters",
      subtitle: "Clean, Hygienic & Brotherhood Living",
      year: "2024",
      key1: "Program",
      val1: "Residential Life",
      key2: "Supervision",
      val2: "Resident Mentors"
    }
  ];

  let activeIndex = 3; // Default center on item 3 (Leadership)
  const total = cards.length;

  if (dotsContainer) {
    dotsContainer.innerHTML = '';
    for (let i = 0; i < total; i++) {
      const dot = document.createElement('button');
      dot.className = 'w-2 h-2 sm:w-2.5 sm:h-2.5 rounded-full transition-all duration-300 cursor-pointer focus:outline-none';
      dot.setAttribute('aria-label', 'Go to slide ' + (i + 1));
      dot.addEventListener('click', () => {
        goTo(i);
      });
      dotsContainer.appendChild(dot);
    }
  }

  function updateLayout() {
    const width = window.innerWidth;
    const isMobile = width < 640;
    const isTablet = width < 768;

    const stepX = isMobile ? 70 : (isTablet ? 110 : 145);
    const baseOffset = isMobile ? 35 : (isTablet ? 55 : 75);
    const baseZ = isMobile ? 45 : 80;

    cards.forEach((card, i) => {
      const diff = i - activeIndex;

      if (diff === 0) {
        card.style.transform = 'translate(-50%, -50%) translate3d(0px, 0px, 0px) rotateY(0deg) scale(1)';
        card.style.zIndex = '50';
        card.style.opacity = '1';
        card.style.filter = 'brightness(1)';
        card.style.boxShadow = '0 25px 45px -10px rgba(0, 0, 0, 0.35), 0 10px 22px -8px rgba(0, 0, 0, 0.2)';
        card.style.cursor = 'default';
      } else if (diff < 0) {
        const absDiff = Math.abs(diff);
        const tx = diff * stepX - baseOffset;
        const tz = -absDiff * baseZ;
        const ry = 40 + Math.min(absDiff * 2, 8);
        const scale = Math.max(0.6, 1 - absDiff * 0.12);
        const opacity = absDiff > 3 ? 0 : Math.max(0.45, 1 - absDiff * 0.18);
        const bright = Math.max(0.72, 1 - absDiff * 0.08);

        card.style.transform = `translate(-50%, -50%) translate3d(${tx}px, 0px, ${tz}px) rotateY(${ry}deg) scale(${scale})`;
        card.style.zIndex = `${50 - absDiff * 5}`;
        card.style.opacity = `${opacity}`;
        card.style.filter = `brightness(${bright})`;
        card.style.boxShadow = '0 15px 30px -8px rgba(0, 0, 0, 0.22)';
        card.style.cursor = 'pointer';
      } else {
        const absDiff = Math.abs(diff);
        const tx = diff * stepX + baseOffset;
        const tz = -absDiff * baseZ;
        const ry = -(40 + Math.min(absDiff * 2, 8));
        const scale = Math.max(0.6, 1 - absDiff * 0.12);
        const opacity = absDiff > 3 ? 0 : Math.max(0.45, 1 - absDiff * 0.18);
        const bright = Math.max(0.72, 1 - absDiff * 0.08);

        card.style.transform = `translate(-50%, -50%) translate3d(${tx}px, 0px, ${tz}px) rotateY(${ry}deg) scale(${scale})`;
        card.style.zIndex = `${50 - absDiff * 5}`;
        card.style.opacity = `${opacity}`;
        card.style.filter = `brightness(${bright})`;
        card.style.boxShadow = '0 15px 30px -8px rgba(0, 0, 0, 0.22)';
        card.style.cursor = 'pointer';
      }
    });

    const data = COVERFLOW_DATA[activeIndex] || COVERFLOW_DATA[0];
    if (titleEl) titleEl.textContent = data.title;
    if (subtitleEl) subtitleEl.textContent = data.subtitle;
    if (yearEl) yearEl.textContent = data.year;
    if (key1El) key1El.textContent = data.key1;
    if (val1El) val1El.textContent = data.val1;
    if (key2El) key2El.textContent = data.key2;
    if (val2El) val2El.textContent = data.val2;

    if (dotsContainer) {
      const dots = dotsContainer.querySelectorAll('button');
      dots.forEach((dot, idx) => {
        if (idx === activeIndex) {
          dot.className = 'w-2.5 h-2.5 sm:w-3 sm:h-3 rounded-full bg-[#121212] scale-110 transition-all duration-300 cursor-pointer shadow-sm';
        } else {
          dot.className = 'w-2 h-2 sm:w-2 sm:h-2 rounded-full bg-slate-300 hover:bg-slate-400 transition-all duration-300 cursor-pointer';
        }
      });
    }
  }

  function goTo(index) {
    activeIndex = Math.max(0, Math.min(total - 1, index));
    updateLayout();
  }

  function prev() {
    if (activeIndex > 0) goTo(activeIndex - 1);
    else goTo(total - 1);
  }

  function next() {
    if (activeIndex < total - 1) goTo(activeIndex + 1);
    else goTo(0);
  }

  cards.forEach((card, i) => {
    card.addEventListener('click', () => {
      goTo(i);
    });
  });

  if (btnPrev) btnPrev.addEventListener('click', prev);
  if (btnNext) btnNext.addEventListener('click', next);

  window.addEventListener('keydown', (e) => {
    const rect = viewport.getBoundingClientRect();
    const inView = rect.top < window.innerHeight && rect.bottom > 0;
    if (!inView) return;

    if (e.key === 'ArrowLeft') prev();
    if (e.key === 'ArrowRight') next();
  });

  let startX = 0;
  let isDragging = false;

  viewport.addEventListener('mousedown', (e) => {
    startX = e.clientX;
    isDragging = true;
  });

  viewport.addEventListener('mouseup', (e) => {
    if (!isDragging) return;
    const diff = e.clientX - startX;
    if (Math.abs(diff) > 40) {
      if (diff > 0) prev();
      else next();
    }
    isDragging = false;
  });

  viewport.addEventListener('touchstart', (e) => {
    startX = e.touches[0].clientX;
  }, { passive: true });

  viewport.addEventListener('touchend', (e) => {
    const diff = e.changedTouches[0].clientX - startX;
    if (Math.abs(diff) > 40) {
      if (diff > 0) prev();
      else next();
    }
  }, { passive: true });

  window.addEventListener('resize', updateLayout);
  updateLayout();
}


