/**
 * Smart Electronics Theme - Main JavaScript
 */

// Import dependencies
import Alpine from 'alpinejs';
import Swiper from 'swiper/bundle';
import AOS from 'aos';

// Initialize Alpine.js
window.Alpine = Alpine;
Alpine.start();

// Initialize AOS (Animate on Scroll)
AOS.init({
    duration: 800,
    once: true,
    offset: 100
});

// Document Ready
document.addEventListener('DOMContentLoaded', function() {
    
    // Mobile Menu Toggle
    initMobileMenu();
    
    // Search Modal
    initSearchModal();
    
    // Scroll to Top
    initScrollToTop();
    
    // Product Image Gallery
    initProductGallery();
    
    // AJAX Add to Cart
    initAjaxCart();
    
    // Sticky Header
    initStickyHeader();
    
});

/**
 * Mobile Menu Toggle
 */
function initMobileMenu() {
    const toggle = document.querySelector('.mobile-menu-toggle');
    const menu = document.querySelector('.mobile-menu');
    
    if (toggle && menu) {
        toggle.addEventListener('click', function() {
            toggle.classList.toggle('active');
            menu.classList.toggle('active');
            document.body.classList.toggle('menu-open');
        });
    }
}

/**
 * Search Modal
 */
function initSearchModal() {
    const searchToggle = document.querySelector('.search-toggle');
    const searchModal = document.querySelector('.search-modal');
    
    if (searchToggle && searchModal) {
        searchToggle.addEventListener('click', function() {
            searchModal.classList.toggle('active');
            if (searchModal.classList.contains('active')) {
                searchModal.querySelector('input[type="search"]').focus();
            }
        });
        
        // Close on ESC key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && searchModal.classList.contains('active')) {
                searchModal.classList.remove('active');
            }
        });
    }
}

/**
 * Scroll to Top Button
 */
function initScrollToTop() {
    const scrollBtn = document.getElementById('scroll-to-top');
    
    if (scrollBtn) {
        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 300) {
                scrollBtn.style.opacity = '1';
                scrollBtn.style.pointerEvents = 'auto';
            } else {
                scrollBtn.style.opacity = '0';
                scrollBtn.style.pointerEvents = 'none';
            }
        });
        
        scrollBtn.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }
}

/**
 * Product Image Gallery (Swiper)
 */
function initProductGallery() {
    const productGallery = document.querySelector('.product-gallery-slider');
    
    if (productGallery) {
        new Swiper(productGallery, {
            loop: true,
            spaceBetween: 10,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
    }
}

/**
 * AJAX Add to Cart
 */
function initAjaxCart() {
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('ajax-add-to-cart')) {
            e.preventDefault();
            
            const button = e.target;
            const productId = button.dataset.productId;
            
            // Add loading state
            button.classList.add('loading');
            button.disabled = true;
            
            // AJAX request
            fetch(smartTheme.ajaxUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: new URLSearchParams({
                    action: 'smart_add_to_cart',
                    product_id: productId,
                    nonce: smartTheme.nonce
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Update cart count
                    updateCartCount(data.cart_count);
                    
                    // Show success message
                    showNotification('Product added to cart!', 'success');
                    
                    // Trigger cart fragment refresh
                    jQuery(document.body).trigger('wc_fragment_refresh');
                } else {
                    showNotification('Error adding product to cart', 'error');
                }
            })
            .catch(error => {
                showNotification('Error adding product to cart', 'error');
            })
            .finally(() => {
                button.classList.remove('loading');
                button.disabled = false;
            });
        }
    });
}

/**
 * Update Cart Count
 */
function updateCartCount(count) {
    const cartCountEl = document.querySelector('.cart-count');
    if (cartCountEl) {
        cartCountEl.textContent = count;
        cartCountEl.classList.add('pulse');
        setTimeout(() => cartCountEl.classList.remove('pulse'), 300);
    }
}

/**
 * Show Notification
 */
function showNotification(message, type = 'info') {
    const notification = document.createElement('div');
    notification.className = `notification notification-${type}`;
    notification.textContent = message;
    
    document.body.appendChild(notification);
    
    setTimeout(() => notification.classList.add('show'), 100);
    
    setTimeout(() => {
        notification.classList.remove('show');
        setTimeout(() => notification.remove(), 300);
    }, 3000);
}

/**
 * Sticky Header
 */
function initStickyHeader() {
    const header = document.getElementById('masthead');
    let lastScroll = 0;
    
    window.addEventListener('scroll', function() {
        const currentScroll = window.pageYOffset;
        
        if (currentScroll > 100) {
            header.classList.add('scrolled');
            
            if (currentScroll > lastScroll) {
                header.classList.add('hide');
            } else {
                header.classList.remove('hide');
            }
        } else {
            header.classList.remove('scrolled', 'hide');
        }
        
        lastScroll = currentScroll;
    });
}

// Export for global use
window.SmartTheme = {
    showNotification,
    updateCartCount
};