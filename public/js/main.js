document.addEventListener('DOMContentLoaded', function() {
    // Mobile nav toggle
    const mobileNavShow = document.querySelector('.mobile-nav-show');
    const mobileNavHide = document.querySelector('.mobile-nav-hide');
    const navbar = document.querySelector('#navbar');
    
    if (mobileNavShow && mobileNavHide && navbar) {
        mobileNavShow.addEventListener('click', function(e) {
            e.preventDefault();
            navbar.classList.add('active');
            mobileNavShow.classList.add('d-none');
            mobileNavHide.classList.remove('d-none');
            document.body.style.overflow = 'hidden'; // Prevent scrolling when menu is open
        });
        
        mobileNavHide.addEventListener('click', function(e) {
            e.preventDefault();
            navbar.classList.remove('active');
            mobileNavHide.classList.add('d-none');
            mobileNavShow.classList.remove('d-none');
            document.body.style.overflow = ''; // Re-enable scrolling
        });
    }
    
    // Scroll to top button
    const scrollTop = document.querySelector('.scroll-top');
    if (scrollTop) {
        const togglescrollTop = function() {
            window.scrollY > 100 ? scrollTop.classList.add('active') : scrollTop.classList.remove('active');
        }
        window.addEventListener('load', togglescrollTop);
        document.addEventListener('scroll', togglescrollTop);
        scrollTop.addEventListener('click', function(e) {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }
    
    // Initialize AOS animation
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 1000,
            easing: 'ease-in-out',
            once: true,
            mirror: false
        });
    }
    
    // Enhanced dropdown menu functionality
    const dropdowns = document.querySelectorAll('.dropdown');
    
    dropdowns.forEach(function(dropdown) {
        const toggle = dropdown.querySelector('.dropdown-trigger');
        const menu = dropdown.querySelector('.dropdown-menu');
        const indicator = toggle?.querySelector('.dropdown-indicator');
        
        // Desktop hover behavior
        if (toggle && menu) {
            dropdown.addEventListener('mouseenter', function() {
                if (window.innerWidth >= 992) {
                    menu.style.visibility = 'visible';
                    menu.style.opacity = '1';
                    menu.style.display = 'flex';
                    if (indicator) {
                        indicator.classList.remove('bi-chevron-down');
                        indicator.classList.add('bi-chevron-up');
                    }
                }
            });
            
            dropdown.addEventListener('mouseleave', function() {
                if (window.innerWidth >= 992) {
                    menu.style.visibility = 'hidden';
                    menu.style.opacity = '0';
                    if (indicator) {
                        indicator.classList.remove('bi-chevron-up');
                        indicator.classList.add('bi-chevron-down');
                    }
                }
            });
            
            // Mobile click behavior
            toggle.addEventListener('click', function(e) {
                if (window.innerWidth < 992) {
                    e.preventDefault();
                    e.stopPropagation();
                    
                    // Close other open dropdowns
                    document.querySelectorAll('.dropdown-menu').forEach(otherMenu => {
                        if (otherMenu !== menu && otherMenu.style.display === 'flex') {
                            otherMenu.style.display = 'none';
                            const otherIndicator = otherMenu.closest('.dropdown')?.querySelector('.dropdown-indicator');
                            if (otherIndicator) {
                                otherIndicator.classList.remove('bi-chevron-up');
                                otherIndicator.classList.add('bi-chevron-down');
                            }
                        }
                    });
                    
                    // Toggle current dropdown
                    if (menu.style.display === 'flex') {
                        menu.style.display = 'none';
                        if (indicator) {
                            indicator.classList.remove('bi-chevron-up');
                            indicator.classList.add('bi-chevron-down');
                        }
                    } else {
                        menu.style.display = 'flex';
                        if (indicator) {
                            indicator.classList.remove('bi-chevron-down');
                            indicator.classList.add('bi-chevron-up');
                        }
                    }
                }
            });
        }
    });
    
    // Close dropdowns when clicking outside (mobile)
    document.addEventListener('click', function(e) {
        if (window.innerWidth < 992) {
            if (!e.target.closest('.dropdown')) {
                document.querySelectorAll('.dropdown-menu').forEach(menu => {
                    menu.style.display = 'none';
                    const indicator = menu.closest('.dropdown')?.querySelector('.dropdown-indicator');
                    if (indicator) {
                        indicator.classList.remove('bi-chevron-up');
                        indicator.classList.add('bi-chevron-down');
                    }
                });
            }
        }
    });
    
    // Close dropdowns when resizing from mobile to desktop
    window.addEventListener('resize', function() {
        if (window.innerWidth >= 992) {
            document.querySelectorAll('.dropdown-menu').forEach(menu => {
                menu.style.display = '';
                menu.style.visibility = '';
                menu.style.opacity = '';
            });
        }
    });
});

// Newsletter form validation
document.querySelector('.php-email-form')?.addEventListener('submit', function(e) {
    const form = e.target;
    const name = form.querySelector('#name');
    const email = form.querySelector('#email');
    let isValid = true;

    // Clear previous errors
    form.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
    const errorElements = form.querySelectorAll('.invalid-feedback');
    errorElements.forEach(el => el.remove());

    // Validate name
    if (!name.value.trim()) {
        name.classList.add('is-invalid');
        const errorDiv = document.createElement('div');
        errorDiv.className = 'invalid-feedback';
        errorDiv.textContent = 'Please enter your name';
        name.parentNode.appendChild(errorDiv);
        isValid = false;
    }

    // Validate email
    if (!email.value.trim()) {
        email.classList.add('is-invalid');
        const errorDiv = document.createElement('div');
        errorDiv.className = 'invalid-feedback';
        errorDiv.textContent = 'Please enter your email';
        email.parentNode.appendChild(errorDiv);
        isValid = false;
    } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value)) {
        email.classList.add('is-invalid');
        const errorDiv = document.createElement('div');
        errorDiv.className = 'invalid-feedback';
        errorDiv.textContent = 'Please enter a valid email address';
        email.parentNode.appendChild(errorDiv);
        isValid = false;
    }

    if (!isValid) {
        e.preventDefault();
    }
});

// Show or hide the button when scrolling
window.onscroll = function() { scrollFunction(); };

function scrollFunction() {
    const backToTopBtn = document.getElementById("backToTopBtn");
    if (backToTopBtn) {
        if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
            backToTopBtn.style.display = "block";  // Show the button
        } else {
            backToTopBtn.style.display = "none";   // Hide the button
        }
    }
}

// Scroll smoothly to top when the button is clicked
document.getElementById("backToTopBtn")?.addEventListener("click", function(event) {
    event.preventDefault();  // Prevent default anchor behavior
    window.scrollTo({ top: 0, behavior: 'smooth' });
});