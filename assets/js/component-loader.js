/**
 * Krackerz Component Loader
 * Loads modular components into placeholders marked with [data-component="name"].
 * Supports instant loading via pre-compiled components or dynamic fetch.
 */

async function loadComponents() {
  const elements = document.querySelectorAll('[data-component]');
  
  for (const el of elements) {
    const componentName = el.getAttribute('data-component');
    let html = null;

    // 1. Try pre-compiled components registry
    if (window.KRACKERZ_COMPONENTS && window.KRACKERZ_COMPONENTS[componentName]) {
      html = window.KRACKERZ_COMPONENTS[componentName];
    } else {
      // 2. Fetch asynchronously from components/{name}.html
      try {
        const response = await fetch(`./components/${componentName}.html`);
        if (response.ok) {
          html = await response.text();
        }
      } catch (err) {
        console.warn(`Could not load component ${componentName} via fetch:`, err);
      }
    }

    if (html) {
      // Replace placeholder with component content
      const temp = document.createElement('div');
      temp.innerHTML = html.trim();
      const node = temp.firstElementChild;
      if (node) {
        el.replaceWith(node);
      } else {
        el.innerHTML = html;
      }
    }
  }

  // Once all components are injected into the DOM, initialize interactive features
  if (typeof window.initKrackerzApp === 'function') {
    window.initKrackerzApp();
  }
}

// Auto-run when DOM is ready
if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', loadComponents);
} else {
  loadComponents();
}
