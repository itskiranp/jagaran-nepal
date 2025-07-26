/* ----------------------------------------------------
 * main.js - merged interactive scripts
 * ----------------------------------------------------
 * Features:
 *  - Responsive mobile navigation (slide panel)
 *  - Scroll-darken header (adds .is-scrolled after threshold)
 *  - Accessible mobile dropdown toggles (aria-expanded)
 *  - Scroll-to-top button (.scroll-top)
 *  - Back-to-top legacy button (#backToTopBtn)
 *  - AOS animation init (if loaded)
 *  - Newsletter form validation
 *  - Basic hero carousel controls
 * ---------------------------------------------------- */

// Run after DOM ready
document.addEventListener("DOMContentLoaded", function () {
  initHeaderScroll();     // NEW: darken + shrink header after scroll
  initMobileNav();        // updated to include aria + header state consistency
  initDropdowns();        // rewritten to class-based approach
  initScrollTop();        // existing
  initNewsletterForm();   // existing
  initBackToTop();        // existing (#backToTopBtn version)
  initCarousel();         // existing
  initAOS();              // existing AOS support (loads last; safe)
});

/* ----------------------------------------------------
 * Utility helpers
 * ---------------------------------------------------- */
function isDesktop() { return window.innerWidth >= 992; }
function isMobile() { return !isDesktop(); }

/* ----------------------------------------------------
 * Header scroll (adds .is-scrolled to #header after threshold)
 * Threshold read from data-scroll-threshold attr; default 40px.
 * ---------------------------------------------------- */
function initHeaderScroll() {
  const header = document.getElementById("header");
  if (!header) return;
  const threshold = parseInt(header.getAttribute("data-scroll-threshold") || "40", 10);

  const onScroll = () => {
    if (window.scrollY > threshold) {
      header.classList.add("is-scrolled");
    } else {
      header.classList.remove("is-scrolled");
    }
  };

  window.addEventListener("scroll", onScroll, { passive: true });
  onScroll(); // run once at load
}

/* ----------------------------------------------------
 * Mobile Navigation Toggle (slide-out panel)
 * Locks body scroll when open.
 * Updates aria-expanded on control buttons.
 * ---------------------------------------------------- */
function initMobileNav() {
  const mobileNavShow = document.querySelector(".mobile-nav-show");
  const mobileNavHide = document.querySelector(".mobile-nav-hide");
  const navbar = document.querySelector("#navbar");
  const body = document.body;

  if (!mobileNavShow || !mobileNavHide || !navbar) return;

  const setAria = (expanded) => {
    mobileNavShow.setAttribute("aria-expanded", expanded ? "true" : "false");
    mobileNavHide.setAttribute("aria-expanded", expanded ? "true" : "false");
  };

  const toggleNav = (show) => {
    navbar.classList.toggle("active", show);
    mobileNavShow.classList.toggle("d-none", show);
    mobileNavHide.classList.toggle("d-none", !show);
    body.style.overflow = show ? "hidden" : "";
    setAria(show);
  };

  mobileNavShow.addEventListener("click", (e) => {
    e.preventDefault();
    toggleNav(true);
  });

  mobileNavHide.addEventListener("click", (e) => {
    e.preventDefault();
    toggleNav(false);
  });
}

/* ----------------------------------------------------
 * Dropdown Menus
 * Desktop hover handled by CSS.
 * JS only handles mobile tap to expand/collapse.
 * We toggle .active on the parent <li.dropdown>.
 * aria-expanded updated on the trigger element.
 * ---------------------------------------------------- */
function initDropdowns() {
  const dropdowns = document.querySelectorAll(".dropdown");
  if (!dropdowns.length) return;

  dropdowns.forEach((dropdown) => {
    const trigger = dropdown.querySelector(".dropdown-trigger");
    const menu = dropdown.querySelector(".dropdown-menu");
    if (!trigger || !menu) return;

    // Ensure base aria attributes
    if (!trigger.hasAttribute("aria-expanded")) trigger.setAttribute("aria-expanded", "false");
    trigger.setAttribute("aria-haspopup", "true");

    // Mobile click/tap toggle
    trigger.addEventListener("click", (e) => {
      if (isMobile()) {
        e.preventDefault();
        e.stopPropagation();
        const expanded = dropdown.classList.toggle("active");
        trigger.setAttribute("aria-expanded", expanded ? "true" : "false");
        if (expanded) {
          closeSiblingDropdowns(dropdown);
        }
      }
    });
  });

  // Close when clicking outside (mobile only)
  document.addEventListener("click", (e) => {
    if (isMobile() && !e.target.closest(".dropdown")) {
      closeAllDropdowns();
    }
  });

  // Reset on resize: remove mobile-active states when going desktop
  window.addEventListener("resize", () => {
    if (isDesktop()) {
      closeAllDropdowns();
    }
  });
}

function closeSiblingDropdowns(current) {
  document.querySelectorAll(".dropdown.active").forEach((dd) => {
    if (dd !== current) {
      dd.classList.remove("active");
      const trig = dd.querySelector(".dropdown-trigger");
      if (trig) trig.setAttribute("aria-expanded", "false");
    }
  });
}

function closeAllDropdowns() {
  document.querySelectorAll(".dropdown.active").forEach((dd) => {
    dd.classList.remove("active");
    const trig = dd.querySelector(".dropdown-trigger");
    if (trig) trig.setAttribute("aria-expanded", "false");
  });
}

/* ----------------------------------------------------
 * Scroll to Top Button (.scroll-top)
 * Shows after 100px scroll; smooth scroll to top.
 * ---------------------------------------------------- */
function initScrollTop() {
  const scrollTop = document.querySelector(".scroll-top");
  if (!scrollTop) return;

  const toggleScrollTop = () => {
    scrollTop.classList.toggle("active", window.scrollY > 100);
  };

  scrollTop.addEventListener("click", (e) => {
    e.preventDefault();
    window.scrollTo({ top: 0, behavior: "smooth" });
  });

  window.addEventListener("load", toggleScrollTop);
  document.addEventListener("scroll", toggleScrollTop);
}

/* ----------------------------------------------------
 * Newsletter Form Validation
 * ---------------------------------------------------- */
function initNewsletterForm() {
  const form = document.querySelector(".php-email-form");
  if (!form) return;

  form.addEventListener("submit", (e) => {
    const name = form.querySelector("#name");
    const email = form.querySelector("#email");
    let isValid = true;

    // Clear previous errors
    form.querySelectorAll(".is-invalid").forEach((el) => el.classList.remove("is-invalid"));
    form.querySelectorAll(".invalid-feedback").forEach((el) => el.remove());

    // Validate name
    if (!name.value.trim()) {
      showError(name, "Please enter your name");
      isValid = false;
    }

    // Validate email
    if (!email.value.trim()) {
      showError(email, "Please enter your email");
      isValid = false;
    } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value)) {
      showError(email, "Please enter a valid email address");
      isValid = false;
    }

    if (!isValid) {
      e.preventDefault();
    }
  });
}

function showError(input, message) {
  input.classList.add("is-invalid");
  const errorDiv = document.createElement("div");
  errorDiv.className = "invalid-feedback";
  errorDiv.textContent = message;
  input.parentNode.appendChild(errorDiv);
}

/* ----------------------------------------------------
 * Back to Top Button (#backToTopBtn) legacy element
 * Kept for backward compatibility with existing markup.
 * ---------------------------------------------------- */
function initBackToTop() {
  const backToTopBtn = document.getElementById("backToTopBtn");
  if (!backToTopBtn) return;

  const scrollFunction = () => {
    const shouldShow = document.body.scrollTop > 100 || document.documentElement.scrollTop > 100;
    backToTopBtn.style.display = shouldShow ? "block" : "none";
  };

  backToTopBtn.addEventListener("click", (e) => {
    e.preventDefault();
    window.scrollTo({ top: 0, behavior: "smooth" });
  });

  window.addEventListener("scroll", scrollFunction, { passive: true });
  scrollFunction();
}

/* ----------------------------------------------------
 * Carousel Functionality
 * ---------------------------------------------------- */
function initCarousel() {
  const slides = document.querySelectorAll(".carousel-slide");
  const indicators = document.querySelectorAll(".indicator");
  const prevBtn = document.querySelector(".prev-btn");
  const nextBtn = document.querySelector(".next-btn");
  
  if (!slides.length || !indicators.length || !prevBtn || !nextBtn) return;

  let currentIndex = 0;

  const updateCarousel = () => {
    slides.forEach((slide, index) => {
      slide.classList.toggle("active", index === currentIndex);
    });

    indicators.forEach((indicator, index) => {
      indicator.classList.toggle("active", index === currentIndex);
    });
  };

  const goToSlide = (index) => {
    currentIndex = (index + slides.length) % slides.length;
    updateCarousel();
  };

  const nextSlide = () => goToSlide(currentIndex + 1);
  const prevSlide = () => goToSlide(currentIndex - 1);

  // Event Listeners
  nextBtn.addEventListener("click", nextSlide);
  prevBtn.addEventListener("click", prevSlide);
  indicators.forEach((indicator, index) => {
    indicator.addEventListener("click", () => goToSlide(index));
  });
  
  // Optional: Auto-advance
  // setInterval(nextSlide, 5000);
}

/* ----------------------------------------------------
 * AOS Animation (if library loaded)
 * ---------------------------------------------------- */
function initAOS() {
  if (typeof AOS !== "undefined") {
    AOS.init({
      duration: 1000,
      easing: "ease-in-out",
      once: true,
      mirror: false,
    });
  }
}
