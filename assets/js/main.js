// assets/js/main.js - Consolidated and Fixed

document.addEventListener("DOMContentLoaded", function () {
  // ===== HEADER FUNCTIONALITY =====
  const header = document.getElementById("mainHeader");
  const mobileBtn = document.getElementById("mobileMenuBtn");
  const mobileNav = document.getElementById("mobileNav");
  const overlay = document.getElementById("overlay");
  const navLinks = document.querySelectorAll(".nav-link");

  if (header) {
    // Scroll effect for header
    function handleScroll() {
      if (window.scrollY > 50) {
        header.classList.add("scrolled");
      } else {
        header.classList.remove("scrolled");
      }
    }

    window.addEventListener("scroll", handleScroll);

    // Mobile menu toggle
    if (mobileBtn && mobileNav && overlay) {
      function toggleMobileMenu() {
        mobileBtn.classList.toggle("active");
        mobileNav.classList.toggle("active");
        overlay.classList.toggle("active");

        if (mobileNav.classList.contains("active")) {
          document.body.style.overflow = "hidden";
        } else {
          document.body.style.overflow = "";
        }
      }

      function closeMobileMenu() {
        mobileBtn.classList.remove("active");
        mobileNav.classList.remove("active");
        overlay.classList.remove("active");
        document.body.style.overflow = "";
      }

      mobileBtn.addEventListener("click", toggleMobileMenu);
      overlay.addEventListener("click", closeMobileMenu);

      // Close mobile menu when clicking a link
      navLinks.forEach((link) => {
        link.addEventListener("click", () => {
          if (window.innerWidth < 992) {
            closeMobileMenu();
          }
        });
      });

      // Handle window resize
      window.addEventListener("resize", function () {
        if (window.innerWidth >= 992) {
          closeMobileMenu();
        }
      });
    }
  }

  // ===== BACK TO TOP BUTTON =====
  // ===== BACK TO TOP BUTTON - ENHANCED VERSION =====
  (function () {
    // Create button
    const backToTop = document.createElement("div");
    backToTop.className = "footer-back-to-top";
    backToTop.innerHTML = `
        <svg viewBox="0 0 24 24">
            <path d="M12 4l-8 8h5v8h6v-8h5z"/>
        </svg>
    `;
    backToTop.setAttribute("aria-label", "Back to top");
    document.body.appendChild(backToTop);

    let scrollTimeout;
    let isVisible = false;

    // Function to check scroll position
    function checkScrollPosition() {
      const scrollPosition = window.scrollY;
      const windowHeight = window.innerHeight;
      const documentHeight = document.documentElement.scrollHeight;

      // Show after scrolling 500px or 30% of page
      const showThreshold = Math.min(500, documentHeight * 0.3);

      if (scrollPosition > showThreshold) {
        if (!isVisible) {
          backToTop.classList.add("visible");
          isVisible = true;

          // Add progress indicator if enabled
          if (backToTop.classList.contains("progress")) {
            updateScrollProgress();
          }
        }
      } else {
        if (isVisible) {
          backToTop.classList.remove("visible");
          isVisible = false;
        }
      }
    }

    // Update scroll progress (for progress style)
    function updateScrollProgress() {
      const scrollPosition = window.scrollY;
      const documentHeight =
        document.documentElement.scrollHeight - window.innerHeight;
      const scrollPercentage = (scrollPosition / documentHeight) * 360;
      backToTop.style.setProperty(
        "--scroll-progress",
        scrollPercentage + "deg",
      );
    }

    // Debounced scroll event for better performance
    function handleScroll() {
      if (scrollTimeout) {
        window.cancelAnimationFrame(scrollTimeout);
      }

      scrollTimeout = requestAnimationFrame(() => {
        checkScrollPosition();
        if (backToTop.classList.contains("progress")) {
          updateScrollProgress();
        }
      });
    }

    // Smooth scroll to top
    function scrollToTop() {
      // Add ripple effect
      const ripple = document.createElement("span");
      ripple.style.position = "absolute";
      ripple.style.width = "100%";
      ripple.style.height = "100%";
      ripple.style.borderRadius = "50%";
      ripple.style.background =
        "radial-gradient(circle, rgba(255,255,255,0.7) 0%, rgba(255,255,255,0) 70%)";
      ripple.style.top = "0";
      ripple.style.left = "0";
      ripple.style.transform = "scale(0)";
      ripple.style.transition = "transform 0.4s ease";
      ripple.style.pointerEvents = "none";

      backToTop.appendChild(ripple);

      requestAnimationFrame(() => {
        ripple.style.transform = "scale(4)";
      });

      setTimeout(() => {
        ripple.remove();
      }, 400);

      // Smooth scroll
      window.scrollTo({
        top: 0,
        behavior: "smooth",
      });

      // Add bounce effect
      backToTop.style.transform = "scale(0.9)";
      setTimeout(() => {
        backToTop.style.transform = "";
      }, 200);
    }

    // Add event listeners
    window.addEventListener("scroll", handleScroll, { passive: true });
    backToTop.addEventListener("click", scrollToTop);

    // Initial check
    checkScrollPosition();

    // Optional: Add keyboard support
    document.addEventListener("keydown", (e) => {
      if (e.key === "ArrowUp" && e.ctrlKey && isVisible) {
        scrollToTop();
      }
    });

    // Optional: Show/hide on window resize
    let resizeTimeout;
    window.addEventListener("resize", () => {
      clearTimeout(resizeTimeout);
      resizeTimeout = setTimeout(checkScrollPosition, 100);
    });

    console.log("Back to Top button initialized");
  })();

  // Optional: Add progress indicator version
  // To enable progress indicator, add 'progress' class:
  backToTop.classList.add("progress");

  // Optional: Add different style variants
  backToTop.classList.add("glow"); // Glow effect
  backToTop.classList.add("border"); // Border style
  backToTop.classList.add("small"); // Smaller size
  backToTop.classList.add("large"); // Larger size

  // ===== INTERSECTION OBSERVER FOR ANIMATIONS =====
  const observerOptions = {
    threshold: 0.1,
    rootMargin: "0px",
  };

  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.style.opacity = "1";
        entry.target.style.transform = "translateY(0)";
        observer.unobserve(entry.target);
      }
    });
  }, observerOptions);

  // Observe all animated elements
  document.querySelectorAll('[class*="animate-"]').forEach((el) => {
    el.style.opacity = "0";
    el.style.transform = "translateY(30px)";
    el.style.transition = "opacity 0.8s ease, transform 0.8s ease";
    observer.observe(el);
  });

  // ===== COUNTER ANIMATION FOR STATS =====
  const stats = document.querySelectorAll(".stat-number");

  if (stats.length > 0) {
    const statsObserver = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            const stat = entry.target;
            const target = parseInt(stat.innerText.replace(/[^0-9]/g, ""));
            animateCounter(stat, target);
            statsObserver.unobserve(stat);
          }
        });
      },
      { threshold: 0.5 },
    );

    stats.forEach((stat) => statsObserver.observe(stat));
  }

  function animateCounter(element, target) {
    let current = 0;
    const increment = target / 50;
    const timer = setInterval(() => {
      current += increment;
      if (current >= target) {
        element.innerText =
          target + (element.innerText.includes("+") ? "+" : "");
        clearInterval(timer);
      } else {
        element.innerText =
          Math.floor(current) + (element.innerText.includes("+") ? "+" : "");
      }
    }, 20);
  }

  // ===== FIX MOBILE HERO STATS =====
  function fixMobileHeroStats() {
    const heroStats = document.querySelector(".hero-stats");
    if (heroStats && window.innerWidth <= 768) {
      heroStats.style.flexDirection = "row";
      heroStats.style.flexWrap = "wrap";
      heroStats.style.justifyContent = "center";
    }
  }

  fixMobileHeroStats();
  window.addEventListener("resize", fixMobileHeroStats);
});

// Contact Form Handling
document.addEventListener("DOMContentLoaded", function () {
  const contactForm = document.getElementById("contactForm");
  const faqItems = document.querySelectorAll(".faq-item");

  // Form submission with AJAX
  if (contactForm) {
    contactForm.addEventListener("submit", function (e) {
      e.preventDefault();

      // Simple validation
      let isValid = true;
      const requiredFields = contactForm.querySelectorAll("[required]");

      requiredFields.forEach((field) => {
        if (!field.value.trim()) {
          field.classList.add("error");
          isValid = false;

          // Add error message
          let errorMsg = field.parentElement.querySelector(".error-message");
          if (!errorMsg) {
            errorMsg = document.createElement("div");
            errorMsg.className = "error-message";
            errorMsg.textContent = "This field is required";
            field.parentElement.appendChild(errorMsg);
          }
        } else {
          field.classList.remove("error");
          const errorMsg = field.parentElement.querySelector(".error-message");
          if (errorMsg) errorMsg.remove();
        }
      });

      if (isValid) {
        // Collect form data
        const formData = {
          firstName: document.getElementById("firstName")?.value || "",
          lastName: document.getElementById("lastName")?.value || "",
          email: document.getElementById("email")?.value || "",
          phone: document.getElementById("phone")?.value || "",
          countryCode: document.getElementById("countryCode")?.value || "",
          message: document.getElementById("message")?.value || "",
        };

        // Show loading state
        const submitBtn = contactForm.querySelector(".submit-btn");
        const originalText = submitBtn.innerHTML;
        submitBtn.innerHTML =
          '<span class="btn-text">Sending...</span> <span class="btn-icon">⏳</span>';
        submitBtn.disabled = true;

        // Remove any existing messages
        const existingSuccess = contactForm.querySelector(".success-message");
        if (existingSuccess) existingSuccess.remove();

        // Send AJAX request
        fetch("contact-handler.php", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify(formData),
        })
          .then((response) => response.json())
          .then((data) => {
            if (data.success) {
              // Show success message
              const successMsg = document.createElement("div");
              successMsg.className = "success-message";
              successMsg.textContent =
                data.message ||
                "Thank you! Your message has been sent. We'll get back to you soon.";
              contactForm.prepend(successMsg);

              // Reset form
              contactForm.reset();

              // Remove success message after 5 seconds
              setTimeout(() => {
                successMsg.remove();
              }, 10000);
            } else {
              // Show error message
              const errorMsg = document.createElement("div");
              errorMsg.className = "error-message";
              errorMsg.textContent =
                data.message || "An error occurred. Please try again.";
              contactForm.prepend(errorMsg);

              setTimeout(() => {
                errorMsg.remove();
              }, 10000);
            }
          })
          .catch((error) => {
            console.error("Error:", error);
            const errorMsg = document.createElement("div");
            errorMsg.className = "error-message";
            errorMsg.textContent = "Network error. Please try again.";
            contactForm.prepend(errorMsg);

            setTimeout(() => {
              errorMsg.remove();
            }, 10000);
          })
          .finally(() => {
            // Restore button
            submitBtn.innerHTML = originalText;
            submitBtn.disabled = false;
          });
      }
    });

    // Remove error on input
    contactForm
      .querySelectorAll(".form-input, .form-textarea, .country-code")
      .forEach((field) => {
        field.addEventListener("input", function () {
          this.classList.remove("error");
          const errorMsg = this.parentElement.querySelector(".error-message");
          if (errorMsg) errorMsg.remove();
        });
      });
  }
});

// Hero Slider
document.addEventListener("DOMContentLoaded", function () {
  const slides = document.querySelectorAll(".slide");
  const dots = document.querySelectorAll(".dot");
  const prevBtn = document.getElementById("prevSlide");
  const nextBtn = document.getElementById("nextSlide");
  let currentSlide = 0;
  let slideInterval;

  function showSlide(index) {
    // Remove active class from all slides and dots
    slides.forEach((slide) => slide.classList.remove("active"));
    dots.forEach((dot) => dot.classList.remove("active"));

    // Add active class to current slide and dot
    slides[index].classList.add("active");
    dots[index].classList.add("active");

    currentSlide = index;
  }

  function nextSlide() {
    let next = currentSlide + 1;
    if (next >= slides.length) next = 0;
    showSlide(next);
  }

  function prevSlide() {
    let prev = currentSlide - 1;
    if (prev < 0) prev = slides.length - 1;
    showSlide(prev);
  }

  // Auto-advance slides every 5 seconds
  function startSlider() {
    slideInterval = setInterval(nextSlide, 5000);
  }

  function stopSlider() {
    clearInterval(slideInterval);
  }

  // Event listeners
  if (prevBtn && nextBtn) {
    prevBtn.addEventListener("click", () => {
      prevSlide();
      stopSlider();
      startSlider();
    });

    nextBtn.addEventListener("click", () => {
      nextSlide();
      stopSlider();
      startSlider();
    });
  }

  // Dot navigation
  dots.forEach((dot, index) => {
    dot.addEventListener("click", () => {
      showSlide(index);
      stopSlider();
      startSlider();
    });
  });

  // Pause slider on hover
  const slider = document.querySelector(".hero-slider");
  if (slider) {
    slider.addEventListener("mouseenter", stopSlider);
    slider.addEventListener("mouseleave", startSlider);
  }

  // Start the slider
  startSlider();
});

// Gallery Page
document.addEventListener('DOMContentLoaded', function() {
    const categoryItems = document.querySelectorAll('.category-item');
    const galleryItems = document.querySelectorAll('.gallery-item');
    const visibleCountSpan = document.getElementById('visibleCount');
    const loadMoreBtn = document.querySelector('.gallery-load-more-btn');
    
    // Lightbox elements
    const lightbox = document.getElementById('lightbox');
    const lightboxImg = document.querySelector('.lightbox-image');
    const lightboxClose = document.querySelector('.lightbox-close');
    const lightboxPrev = document.querySelector('.lightbox-prev');
    const lightboxNext = document.querySelector('.lightbox-next');
    
    let currentCategory = 'all';
    let visibleItems = 100; // Initially show 9 items
    let currentImageIndex = 0;
    let currentVisibleImages = [];
    
    // Function to filter gallery items
    function filterGallery() {
        let visibleCount = 0;
        
        galleryItems.forEach((item, index) => {
            const itemCategory = item.getAttribute('data-category');
            
            // Check if item matches current category
            if (currentCategory === 'all' || itemCategory === currentCategory) {
                // Check if item should be visible based on load more limit
                if (visibleCount < visibleItems) {
                    item.style.display = 'block';
                    visibleCount++;
                } else {
                    item.style.display = 'none';
                }
            } else {
                item.style.display = 'none';
            }
        });
        
        // Update count display
        const totalVisible = Array.from(galleryItems).filter(item => 
            item.style.display === 'block'
        ).length;
        
        if (visibleCountSpan) {
            visibleCountSpan.textContent = totalVisible;
        }
        
        // Hide load more button if all items are visible
        const totalInCategory = Array.from(galleryItems).filter(item => 
            currentCategory === 'all' || item.getAttribute('data-category') === currentCategory
        ).length;
        
        if (loadMoreBtn) {
            if (totalVisible >= totalInCategory) {
                loadMoreBtn.style.display = 'none';
            } else {
                loadMoreBtn.style.display = 'inline-flex';
            }
        }
    }
    
    // Update visible images array for lightbox navigation
    function updateVisibleImages() {
        currentVisibleImages = Array.from(galleryItems).filter(item => 
            item.style.display === 'block'
        );
    }
    
    // Open lightbox
    function openLightbox(index) {
        if (!currentVisibleImages.length) return;
        
        currentImageIndex = index;
        const currentItem = currentVisibleImages[currentImageIndex];
        const img = currentItem.querySelector('.gallery-image');
        
        if (lightboxImg) {
            lightboxImg.src = img.src;
            lightboxImg.alt = img.alt || 'Gallery Image';
        }
        
        if (lightbox) {
            lightbox.classList.add('active');
            document.body.style.overflow = 'hidden';
        }
    }
    
    // Close lightbox
    function closeLightbox() {
        if (lightbox) {
            lightbox.classList.remove('active');
            document.body.style.overflow = '';
        }
    }
    
    // Next image
    function nextImage() {
        if (currentVisibleImages.length === 0) return;
        currentImageIndex = (currentImageIndex + 1) % currentVisibleImages.length;
        const currentItem = currentVisibleImages[currentImageIndex];
        const img = currentItem.querySelector('.gallery-image');
        
        if (lightboxImg) {
            lightboxImg.src = img.src;
            lightboxImg.alt = img.alt || 'Gallery Image';
        }
    }
    
    // Previous image
    function prevImage() {
        if (currentVisibleImages.length === 0) return;
        currentImageIndex = (currentImageIndex - 1 + currentVisibleImages.length) % currentVisibleImages.length;
        const currentItem = currentVisibleImages[currentImageIndex];
        const img = currentItem.querySelector('.gallery-image');
        
        if (lightboxImg) {
            lightboxImg.src = img.src;
            lightboxImg.alt = img.alt || 'Gallery Image';
        }
    }
    
    // Add click event to all gallery items
    function bindGalleryItemClick() {
        galleryItems.forEach((item, index) => {
            // Remove existing listener to avoid duplicates
            item.removeEventListener('click', item.clickHandler);
            
            // Create new click handler
            item.clickHandler = function(e) {
                // Don't trigger if clicking on load more button or category badge
                if (e.target.closest('.gallery-load-more-btn')) return;
                
                // Update visible images array before opening
                updateVisibleImages();
                
                // Find index in visible images
                const visibleIndex = currentVisibleImages.findIndex(visibleItem => visibleItem === item);
                if (visibleIndex !== -1) {
                    openLightbox(visibleIndex);
                }
            };
            
            item.addEventListener('click', item.clickHandler);
        });
    }
    
    // Category click handler
    categoryItems.forEach(item => {
        item.addEventListener('click', function() {
            // Update active class
            categoryItems.forEach(cat => cat.classList.remove('active'));
            this.classList.add('active');
            
            // Get category
            currentCategory = this.getAttribute('data-category');
            
            // Reset visible items count
            visibleItems = 100;
            
            // Filter gallery
            filterGallery();
            
            // Re-bind click events after filtering
            setTimeout(() => {
                bindGalleryItemClick();
            }, 100);
        });
    });
    
    // Load more functionality
    if (loadMoreBtn) {
        loadMoreBtn.addEventListener('click', function() {
            visibleItems += 6;
            filterGallery();
            
            // Re-bind click events after loading more
            setTimeout(() => {
                bindGalleryItemClick();
            }, 100);
        });
    }
    
    // Lightbox event listeners
    if (lightboxClose) {
        lightboxClose.addEventListener('click', closeLightbox);
    }
    
    if (lightboxPrev) {
        lightboxPrev.addEventListener('click', function(e) {
            e.stopPropagation();
            prevImage();
        });
    }
    
    if (lightboxNext) {
        lightboxNext.addEventListener('click', function(e) {
            e.stopPropagation();
            nextImage();
        });
    }
    
    // Close lightbox when clicking outside the image
    if (lightbox) {
        lightbox.addEventListener('click', function(e) {
            if (e.target === lightbox) {
                closeLightbox();
            }
        });
    }
    
    // Keyboard navigation for lightbox
    document.addEventListener('keydown', function(e) {
        if (!lightbox || !lightbox.classList.contains('active')) return;
        
        if (e.key === 'Escape') {
            closeLightbox();
        }
        if (e.key === 'ArrowLeft') {
            prevImage();
        }
        if (e.key === 'ArrowRight') {
            nextImage();
        }
    });
    
    // Initial filter and bindings
    filterGallery();
    bindGalleryItemClick();
    
    // Also bind on window resize (in case layout changes)
    window.addEventListener('resize', function() {
        bindGalleryItemClick();
    });
});

// Series Gallery JavaScript
document.addEventListener('DOMContentLoaded', function() {
    // Filter functionality
    const filterBtns = document.querySelectorAll('.series-filter-btn');
    const seriesItems = document.querySelectorAll('.series-item');
    const seriesCount = document.querySelector('.series-count');
    
    // Function to update series count
    function updateSeriesCount() {
        const visibleItems = Array.from(seriesItems).filter(item => item.style.display !== 'none');
        if (seriesCount) {
            seriesCount.textContent = `${visibleItems.length} Projects`;
        }
    }
    
    // Initialize count on page load
    updateSeriesCount();
    
    if (filterBtns.length > 0) {
        filterBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                // Update active button
                filterBtns.forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                
                const filterValue = this.getAttribute('data-filter');
                let visibleCount = 0;
                
                // Filter items based on series category
                seriesItems.forEach(item => {
                    if (filterValue === 'all' || item.getAttribute('data-category') === filterValue) {
                        item.style.display = 'block';
                        visibleCount++;
                        // Add animation
                        item.style.animation = 'zoomIn 0.5s ease forwards';
                    } else {
                        item.style.display = 'none';
                    }
                });
                
                // Update count
                if (seriesCount) {
                    seriesCount.textContent = `${visibleCount} Projects`;
                }
                
                // Reset load more button state after filtering
                const loadMoreBtn = document.querySelector('.load-more-btn');
                if (loadMoreBtn) {
                    // Reset visible items display
                    const allVisibleItems = Array.from(seriesItems).filter(item => 
                        item.style.display !== 'none'
                    );
                    
                    // Hide all items first
                    allVisibleItems.forEach((item, index) => {
                        if (index >= 9) {
                            item.style.display = 'none';
                        } else {
                            item.style.display = 'block';
                        }
                    });
                    
                    // Show load more button if there are more than 9 items
                    if (allVisibleItems.length > 9) {
                        loadMoreBtn.style.display = 'inline-flex';
                        loadMoreBtn.textContent = 'Load More Series';
                    } else {
                        loadMoreBtn.style.display = 'none';
                    }
                }
            });
        });
    }
    
    // Lightbox functionality
    const lightbox = document.getElementById('series-lightbox');
    const lightboxImg = document.querySelector('.series-lightbox-image');
    const lightboxTitle = document.querySelector('.series-lightbox-title');
    const lightboxDesc = document.querySelector('.series-lightbox-description');
    const lightboxTags = document.querySelector('.series-lightbox-tags');
    const closeBtn = document.querySelector('.series-lightbox-close');
    const prevBtn = document.querySelector('.series-lightbox-prev');
    const nextBtn = document.querySelector('.series-lightbox-next');
    
    let currentIndex = 0;
    let currentVisibleItems = [];
    
    // Update visible items array based on current filter
    function updateVisibleItems() {
        currentVisibleItems = Array.from(seriesItems).filter(item => item.style.display !== 'none');
    }
    
    // Open lightbox on series item click
    if (seriesItems.length > 0) {
        seriesItems.forEach((item, index) => {
            item.addEventListener('click', function(e) {
                // Don't trigger if clicking on the link inside overlay
                if (e.target.closest('.series-link')) return;
                
                updateVisibleItems();
                const visibleIndex = currentVisibleItems.findIndex(visibleItem => visibleItem === item);
                currentIndex = visibleIndex >= 0 ? visibleIndex : 0;
                
                const img = this.querySelector('.series-image');
                const title = this.querySelector('.series-title');
                const desc = this.querySelector('.series-description');
                const tags = this.querySelectorAll('.series-tag');
                const series = this.getAttribute('data-series');
                const category = this.getAttribute('data-category');
                
                if (lightboxImg) lightboxImg.src = img ? img.src : '';
                if (lightboxTitle) lightboxTitle.textContent = title ? title.textContent : '';
                if (lightboxDesc) lightboxDesc.textContent = desc ? desc.textContent : '';
                
                // Clear and populate tags
                if (lightboxTags) {
                    lightboxTags.innerHTML = '';
                    if (series) {
                        const seriesSpan = document.createElement('span');
                        seriesSpan.className = 'series-tag';
                        seriesSpan.textContent = series;
                        lightboxTags.appendChild(seriesSpan);
                    }
                    if (category && category !== series) {
                        const categorySpan = document.createElement('span');
                        categorySpan.className = 'series-tag';
                        categorySpan.textContent = category.charAt(0).toUpperCase() + category.slice(1);
                        lightboxTags.appendChild(categorySpan);
                    }
                    if (tags.length > 0) {
                        tags.forEach(tag => {
                            const tagSpan = document.createElement('span');
                            tagSpan.className = 'series-tag';
                            tagSpan.textContent = tag.textContent;
                            lightboxTags.appendChild(tagSpan);
                        });
                    }
                }
                
                if (lightbox) {
                    lightbox.classList.add('active');
                    document.body.style.overflow = 'hidden';
                }
            });
        });
    }
    
    // Close lightbox
    function closeLightbox() {
        if (lightbox) {
            lightbox.classList.remove('active');
            document.body.style.overflow = '';
        }
    }
    
    if (closeBtn) closeBtn.addEventListener('click', closeLightbox);
    if (lightbox) {
        lightbox.addEventListener('click', (e) => {
            if (e.target === lightbox) closeLightbox();
        });
    }
    
    // Navigation
    function showPrev() {
        if (currentVisibleItems.length === 0) return;
        currentIndex = (currentIndex - 1 + currentVisibleItems.length) % currentVisibleItems.length;
        const item = currentVisibleItems[currentIndex];
        const img = item.querySelector('.series-image');
        const title = item.querySelector('.series-title');
        const desc = item.querySelector('.series-description');
        const tags = item.querySelectorAll('.series-tag');
        const series = item.getAttribute('data-series');
        const category = item.getAttribute('data-category');
        
        if (lightboxImg) lightboxImg.src = img ? img.src : '';
        if (lightboxTitle) lightboxTitle.textContent = title ? title.textContent : '';
        if (lightboxDesc) lightboxDesc.textContent = desc ? desc.textContent : '';
        
        if (lightboxTags) {
            lightboxTags.innerHTML = '';
            if (series) {
                const seriesSpan = document.createElement('span');
                seriesSpan.className = 'series-tag';
                seriesSpan.textContent = series;
                lightboxTags.appendChild(seriesSpan);
            }
            if (category && category !== series) {
                const categorySpan = document.createElement('span');
                categorySpan.className = 'series-tag';
                categorySpan.textContent = category.charAt(0).toUpperCase() + category.slice(1);
                lightboxTags.appendChild(categorySpan);
            }
            tags.forEach(tag => {
                const tagSpan = document.createElement('span');
                tagSpan.className = 'series-tag';
                tagSpan.textContent = tag.textContent;
                lightboxTags.appendChild(tagSpan);
            });
        }
    }
    
    function showNext() {
        if (currentVisibleItems.length === 0) return;
        currentIndex = (currentIndex + 1) % currentVisibleItems.length;
        const item = currentVisibleItems[currentIndex];
        const img = item.querySelector('.series-image');
        const title = item.querySelector('.series-title');
        const desc = item.querySelector('.series-description');
        const tags = item.querySelectorAll('.series-tag');
        const series = item.getAttribute('data-series');
        const category = item.getAttribute('data-category');
        
        if (lightboxImg) lightboxImg.src = img ? img.src : '';
        if (lightboxTitle) lightboxTitle.textContent = title ? title.textContent : '';
        if (lightboxDesc) lightboxDesc.textContent = desc ? desc.textContent : '';
        
        if (lightboxTags) {
            lightboxTags.innerHTML = '';
            if (series) {
                const seriesSpan = document.createElement('span');
                seriesSpan.className = 'series-tag';
                seriesSpan.textContent = series;
                lightboxTags.appendChild(seriesSpan);
            }
            if (category && category !== series) {
                const categorySpan = document.createElement('span');
                categorySpan.className = 'series-tag';
                categorySpan.textContent = category.charAt(0).toUpperCase() + category.slice(1);
                lightboxTags.appendChild(categorySpan);
            }
            tags.forEach(tag => {
                const tagSpan = document.createElement('span');
                tagSpan.className = 'series-tag';
                tagSpan.textContent = tag.textContent;
                lightboxTags.appendChild(tagSpan);
            });
        }
    }
    
    if (prevBtn) prevBtn.addEventListener('click', showPrev);
    if (nextBtn) nextBtn.addEventListener('click', showNext);
    
    // Keyboard navigation
    document.addEventListener('keydown', (e) => {
        if (!lightbox || !lightbox.classList.contains('active')) return;
        
        if (e.key === 'Escape') closeLightbox();
        if (e.key === 'ArrowLeft') showPrev();
        if (e.key === 'ArrowRight') showNext();
    });
    
    // Load more functionality
    const loadMoreBtn = document.querySelector('.load-more-btn');
    let itemsToShow = 30;
    const allSeriesItems = document.querySelectorAll('.series-item');
    
    // Initialize: hide items beyond itemsToShow for each category
    function initializeVisibility() {
        const activeFilter = document.querySelector('.series-filter-btn.active');
        const filterValue = activeFilter ? activeFilter.getAttribute('data-filter') : 'all';
        
        let filteredItems;
        if (filterValue === 'all') {
            filteredItems = Array.from(allSeriesItems);
        } else {
            filteredItems = Array.from(allSeriesItems).filter(item => 
                item.getAttribute('data-category') === filterValue
            );
        }
        
        // Hide items beyond first itemsToShow
        filteredItems.forEach((item, index) => {
            if (index >= itemsToShow) {
                item.style.display = 'none';
            } else {
                item.style.display = 'block';
            }
        });
        
        // Update count
        const visibleCount = filteredItems.filter(item => item.style.display !== 'none').length;
        if (seriesCount) {
            seriesCount.textContent = `${visibleCount} Series`;
        }
        
        // Show/hide load more button
        if (filteredItems.length > itemsToShow) {
            loadMoreBtn.style.display = 'inline-flex';
        } else {
            loadMoreBtn.style.display = 'none';
        }
    }
    
    // Run initialization
    initializeVisibility();
    
    if (loadMoreBtn) {
        loadMoreBtn.addEventListener('click', function() {
            const activeFilter = document.querySelector('.series-filter-btn.active');
            const filterValue = activeFilter ? activeFilter.getAttribute('data-filter') : 'all';
            
            let filteredItems;
            if (filterValue === 'all') {
                filteredItems = Array.from(allSeriesItems);
            } else {
                filteredItems = Array.from(allSeriesItems).filter(item => 
                    item.getAttribute('data-category') === filterValue
                );
            }
            
            // Count currently visible items
            const currentVisible = filteredItems.filter(item => item.style.display !== 'none').length;
            
            // Show next 6 items
            const nextItems = filteredItems.slice(currentVisible, currentVisible + 6);
            nextItems.forEach(item => {
                item.style.display = 'block';
            });
            
            // Update visible items for lightbox
            updateVisibleItems();
            
            // Hide button if all items are visible
            const newVisible = filteredItems.filter(item => item.style.display !== 'none').length;
            if (newVisible >= filteredItems.length) {
                loadMoreBtn.style.display = 'none';
            }
            
            // Update count
            if (seriesCount) {
                seriesCount.textContent = `${newVisible} Projects`;
            }
        });
    }
    
    // Re-initialize when filter changes (handled in filter click)
    const observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
            if (mutation.attributeName === 'class') {
                const activeFilter = document.querySelector('.series-filter-btn.active');
                if (activeFilter) {
                    initializeVisibility();
                }
            }
        });
    });
    
    filterBtns.forEach(btn => {
        observer.observe(btn, { attributes: true });
    });
});

// Quote Form JavaScript
document.addEventListener('DOMContentLoaded', function() {
    const quoteForm = document.getElementById('quoteForm');
    const submitBtn = document.getElementById('submitBtn');
    
    if (quoteForm) {
        quoteForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Remove existing messages
            const existingMessages = quoteForm.querySelectorAll('.success-message, .error-message-global');
            existingMessages.forEach(msg => msg.remove());
            
            // Simple validation
            let isValid = true;
            const requiredFields = quoteForm.querySelectorAll('[required]');
            
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    field.classList.add('error');
                    isValid = false;
                    
                    // Add error message
                    let errorMsg = field.parentElement.querySelector('.error-message');
                    if (!errorMsg) {
                        errorMsg = document.createElement('div');
                        errorMsg.className = 'error-message';
                        errorMsg.textContent = 'This field is required';
                        field.parentElement.appendChild(errorMsg);
                    }
                } else {
                    field.classList.remove('error');
                    const errorMsg = field.parentElement.querySelector('.error-message');
                    if (errorMsg) errorMsg.remove();
                }
            });
            
            // Email validation
            const emailField = document.getElementById('email');
            if (emailField && emailField.value.trim()) {
                const emailPattern = /^[^\s@]+@([^\s@]+\.)+[^\s@]+$/;
                if (!emailPattern.test(emailField.value.trim())) {
                    emailField.classList.add('error');
                    isValid = false;
                    let errorMsg = emailField.parentElement.querySelector('.error-message');
                    if (!errorMsg) {
                        errorMsg = document.createElement('div');
                        errorMsg.className = 'error-message';
                        errorMsg.textContent = 'Please enter a valid email address';
                        emailField.parentElement.appendChild(errorMsg);
                    }
                }
            }
            
            // Phone validation (basic)
            const phoneField = document.getElementById('phone');
            if (phoneField && phoneField.value.trim()) {
                const phonePattern = /^[\d\s\+\(\)\-]{8,}$/;
                if (!phonePattern.test(phoneField.value.trim())) {
                    phoneField.classList.add('error');
                    isValid = false;
                    let errorMsg = phoneField.parentElement.querySelector('.error-message');
                    if (!errorMsg) {
                        errorMsg = document.createElement('div');
                        errorMsg.className = 'error-message';
                        errorMsg.textContent = 'Please enter a valid phone number';
                        phoneField.parentElement.appendChild(errorMsg);
                    }
                }
            }
            
            if (isValid) {
                // Collect form data
                const formData = {
                    name: document.getElementById('name')?.value || '',
                    role: document.getElementById('role')?.value || '',
                    email: document.getElementById('email')?.value || '',
                    phone: document.getElementById('phone')?.value || '',
                    shopping_for: Array.from(document.querySelectorAll('input[name="shopping_for[]"]:checked')).map(cb => cb.value),
                    project_description: document.getElementById('project_description')?.value || '',
                    how_found: document.getElementById('how_found')?.value || '',
                    newsletter: document.querySelector('input[name="newsletter"]')?.checked || false
                };
                
                // Show loading state
                const originalText = submitBtn.innerHTML;
                submitBtn.innerHTML = '<span class="btn-text">Sending...</span> <span class="btn-icon">⏳</span>';
                submitBtn.disabled = true;
                
                // Send AJAX request to PHP handler
                fetch('submit-quote.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(formData)
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Success message
                        const successMsg = document.createElement('div');
                        successMsg.className = 'success-message';
                        successMsg.innerHTML = `
                            <div class="success-icon">✓</div>
                            <div class="success-text">
                                <strong>Thank you for your interest!</strong><br>
                                ${data.message || 'We\'ll contact you within 24 hours to discuss your project.'}
                            </div>
                        `;
                        quoteForm.prepend(successMsg);
                        
                        // Reset form
                        quoteForm.reset();
                        
                        // Scroll to success message
                        successMsg.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    } else {
                        // Error message from server
                        const errorMsg = document.createElement('div');
                        errorMsg.className = 'error-message-global';
                        errorMsg.innerHTML = `
                            <div class="error-icon">⚠️</div>
                            <div class="error-text">
                                <strong>Something went wrong!</strong><br>
                                ${data.message || 'Please try again or call us directly.'}
                            </div>
                        `;
                        quoteForm.prepend(errorMsg);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    const errorMsg = document.createElement('div');
                    errorMsg.className = 'error-message-global';
                    errorMsg.innerHTML = `
                        <div class="error-icon">⚠️</div>
                        <div class="error-text">
                            <strong>Network Error!</strong><br>
                            Please check your connection and try again.
                        </div>
                    `;
                    quoteForm.prepend(errorMsg);
                })
                .finally(() => {
                    // Restore button
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                });
            }
        });
        
        // Remove error on input
        quoteForm.querySelectorAll('.form-input, .form-select, .form-textarea').forEach(field => {
            field.addEventListener('input', function() {
                this.classList.remove('error');
                const errorMsg = this.parentElement.querySelector('.error-message');
                if (errorMsg) errorMsg.remove();
            });
        });
    }
});

// Hero Slider with 5 Slides
document.addEventListener('DOMContentLoaded', function() {
    // Initialize slider
    function initSlider() {
        const slides = document.querySelectorAll('.slide');
        const dots = document.querySelectorAll('.dot');
        const prevBtn = document.getElementById('prevSlide');
        const nextBtn = document.getElementById('nextSlide');
        
        if (!slides.length) return;
        
        let currentSlide = 0;
        let slideInterval;
        const autoPlayDelay = 6000;
        
        function showSlide(index) {
            // Remove active class from all slides
            slides.forEach(slide => slide.classList.remove('active'));
            if (dots.length) dots.forEach(dot => dot.classList.remove('active'));
            
            // Ensure index is within bounds
            if (index >= slides.length) index = 0;
            if (index < 0) index = slides.length - 1;
            
            slides[index].classList.add('active');
            if (dots.length) dots[index].classList.add('active');
            currentSlide = index;
        }
        
        function nextSlide() {
            showSlide(currentSlide + 1);
        }
        
        function prevSlide() {
            showSlide(currentSlide - 1);
        }
        
        function startAutoPlay() {
            if (slideInterval) clearInterval(slideInterval);
            slideInterval = setInterval(nextSlide, autoPlayDelay);
        }
        
        function stopAutoPlay() {
            if (slideInterval) {
                clearInterval(slideInterval);
                slideInterval = null;
            }
        }
        
        // Show first slide
        showSlide(0);
        
        // Start autoplay immediately
        startAutoPlay();
        
        // Add event listeners
        if (prevBtn) {
            prevBtn.addEventListener('click', function(e) {
                e.preventDefault();
                prevSlide();
                startAutoPlay(); // Restart timer
            });
        }
        
        if (nextBtn) {
            nextBtn.addEventListener('click', function(e) {
                e.preventDefault();
                nextSlide();
                startAutoPlay(); // Restart timer
            });
        }
        
        // Dot navigation
        if (dots.length) {
            dots.forEach((dot, i) => {
                dot.addEventListener('click', function() {
                    showSlide(i);
                    startAutoPlay(); // Restart timer
                });
            });
        }
        
        // Pause on hover
        const slider = document.querySelector('.hero-slider');
        if (slider) {
            slider.addEventListener('mouseenter', stopAutoPlay);
            slider.addEventListener('mouseleave', startAutoPlay);
        }
        
        // Touch swipe for mobile
        let touchStart = 0;
        slider?.addEventListener('touchstart', (e) => {
            touchStart = e.changedTouches[0].screenX;
        });
        slider?.addEventListener('touchend', (e) => {
            const touchEnd = e.changedTouches[0].screenX;
            if (touchEnd < touchStart - 50) nextSlide();
            if (touchEnd > touchStart + 50) prevSlide();
            startAutoPlay();
        });
    }
    
    // Initialize after a short delay to ensure all elements are ready
    setTimeout(initSlider, 100);
});

// ========== VISION & MISSION SCROLL ANIMATION ==========
document.addEventListener("DOMContentLoaded", function() {
    // Intersection Observer for scroll animations
    const animateElements = document.querySelectorAll('.animate-scale');
    
    if (animateElements.length > 0 && 'IntersectionObserver' in window) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animated');
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.2,
            rootMargin: '0px 0px -50px 0px'
        });
        
        animateElements.forEach(element => {
            observer.observe(element);
        });
    } else {
        // Fallback for older browsers
        animateElements.forEach(element => {
            element.classList.add('animated');
        });
    }
});

/* ============================================
   CORE VALUES SECTION - CLICK EFFECTS
   ============================================ */

document.addEventListener("DOMContentLoaded", function() {
    
    // ========== VALUE CARD CLICK EFFECTS ==========
    const valueCards = document.querySelectorAll('.value-card');
    
    if (valueCards.length > 0) {
        
        // Function to create ripple effect
        function createRipple(event, card) {
            const rect = card.getBoundingClientRect();
            const x = event.clientX - rect.left;
            const y = event.clientY - rect.top;
            
            const ripple = document.createElement('span');
            ripple.className = 'ripple';
            ripple.style.left = `${x}px`;
            ripple.style.top = `${y}px`;
            
            card.appendChild(ripple);
            
            // Remove ripple after animation
            setTimeout(() => {
                ripple.remove();
            }, 600);
        }
        
        // Add click event listeners to each card
        valueCards.forEach(card => {
            card.addEventListener('click', function(e) {
                // Create ripple effect at click position
                createRipple(e, this);
                
                // Add flash effect
                this.classList.add('flash');
                setTimeout(() => {
                    this.classList.remove('flash');
                }, 300);
                
                // Add pulse effect to icon
                const iconWrapper = this.querySelector('.value-icon-wrapper');
                if (iconWrapper) {
                    iconWrapper.style.animation = 'icon-pulse 0.5s ease-out';
                    setTimeout(() => {
                        iconWrapper.style.animation = '';
                    }, 500);
                }
                
                // Add click scale effect
                this.classList.add('click-effect');
                setTimeout(() => {
                    this.classList.remove('click-effect');
                }, 300);
                
                // Optional: Log which value was clicked
                const valueName = this.querySelector('.value-title')?.textContent || 'Unknown';
                console.log(`Value clicked: ${valueName}`);
                
                // Optional: Show toast notification (you can customize this)
                showValueNotification(valueName);
            });
            
            // Add hover effect for better UX
            card.addEventListener('mouseenter', function() {
                this.style.cursor = 'pointer';
            });
        });
        
        // Optional: Show notification when value is clicked
        function showValueNotification(valueName) {
            // Create notification element if it doesn't exist
            let notification = document.querySelector('.value-notification');
            if (!notification) {
                notification = document.createElement('div');
                notification.className = 'value-notification';
                document.body.appendChild(notification);
                
                // Add styles for notification
                const style = document.createElement('style');
                style.textContent = `
                    .value-notification {
                        position: fixed;
                        bottom: 30px;
                        left: 50%;
                        transform: translateX(-50%) translateY(100px);
                        background: linear-gradient(135deg, #d01323 0%, #e63946 100%);
                        color: #0a0a0a;
                        padding: 12px 24px;
                        border-radius: 50px;
                        font-size: 0.9rem;
                        font-weight: 600;
                        z-index: 9999;
                        opacity: 0;
                        transition: all 0.3s ease;
                        white-space: nowrap;
                        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
                    }
                    .value-notification.show {
                        transform: translateX(-50%) translateY(0);
                        opacity: 1;
                    }
                    @media (max-width: 576px) {
                        .value-notification {
                            white-space: normal;
                            text-align: center;
                            max-width: 90%;
                            font-size: 0.8rem;
                            padding: 10px 20px;
                        }
                    }
                `;
                document.head.appendChild(style);
            }
            
            // Show notification
            notification.textContent = `✨ ${valueName} - Our guiding principle ✨`;
            notification.classList.add('show');
            
            // Hide notification after 2 seconds
            setTimeout(() => {
                notification.classList.remove('show');
            }, 2000);
        }
    }
    
    // ========== SCROLL ANIMATION FOR VALUE CARDS ==========
    const animatedElements = document.querySelectorAll('.animate-float');
    
    if (animatedElements.length > 0 && 'IntersectionObserver' in window) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animated');
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.2,
            rootMargin: '0px 0px -50px 0px'
        });
        
        animatedElements.forEach(element => {
            observer.observe(element);
        });
    } else {
        // Fallback for older browsers
        animatedElements.forEach(element => {
            element.classList.add('animated');
        });
    }
});

/* ============================================
   WHY CHOOSE SECTION - CLICK EFFECTS
   ============================================ */

document.addEventListener("DOMContentLoaded", function() {
    
    // ========== WHY CHOOSE CARD CLICK EFFECTS ==========
    const whyCards = document.querySelectorAll('.why-card');
    
    if (whyCards.length > 0) {
        
        // Function to create ripple effect
        function createRipple(event, card) {
            const rect = card.getBoundingClientRect();
            const x = event.clientX - rect.left;
            const y = event.clientY - rect.top;
            
            const ripple = document.createElement('span');
            ripple.className = 'ripple';
            ripple.style.left = `${x}px`;
            ripple.style.top = `${y}px`;
            
            card.appendChild(ripple);
            
            // Remove ripple after animation
            setTimeout(() => {
                ripple.remove();
            }, 600);
        }
        
        // Add click event listeners to each card
        whyCards.forEach(card => {
            card.addEventListener('click', function(e) {
                // Create ripple effect at click position
                createRipple(e, this);
                
                // Add flash effect
                this.classList.add('flash');
                setTimeout(() => {
                    this.classList.remove('flash');
                }, 300);
                
                // Add pulse effect to icon
                const icon = this.querySelector('.why-icon');
                if (icon) {
                    icon.style.animation = 'icon-pulse 0.5s ease-out';
                    setTimeout(() => {
                        icon.style.animation = '';
                    }, 500);
                }
                
                // Get feature name for notification
                const featureName = this.querySelector('h3')?.textContent || 'Feature';
                const featureDesc = this.querySelector('p')?.textContent || '';
                
                // Show notification
                showWhyChooseNotification(featureName, featureDesc);
            });
            
            // Add hover effect for better UX
            card.addEventListener('mouseenter', function() {
                this.style.cursor = 'pointer';
            });
        });
        
        // Function to show notification
        function showWhyChooseNotification(featureName, featureDesc) {
            // Create notification element if it doesn't exist
            let notification = document.querySelector('.why-choose-notification');
            if (!notification) {
                notification = document.createElement('div');
                notification.className = 'why-choose-notification';
                document.body.appendChild(notification);
                
                // Add styles for notification
                const style = document.createElement('style');
                style.textContent = `
                    .why-choose-notification {
                        position: fixed;
                        bottom: 30px;
                        left: 50%;
                        transform: translateX(-50%) translateY(100px);
                        background: linear-gradient(135deg, #d01323 0%, #e63946 100%);
                        color: #0a0a0a;
                        padding: 14px 28px;
                        border-radius: 50px;
                        font-size: 0.9rem;
                        font-weight: 600;
                        z-index: 9999;
                        opacity: 0;
                        transition: all 0.3s ease;
                        max-width: 90%;
                        text-align: center;
                        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
                        font-family: 'Inter', sans-serif;
                    }
                    .why-choose-notification strong {
                        color: #0a0a0a;
                        font-weight: 700;
                    }
                    .why-choose-notification.show {
                        transform: translateX(-50%) translateY(0);
                        opacity: 1;
                    }
                    @media (max-width: 576px) {
                        .why-choose-notification {
                            font-size: 0.8rem;
                            padding: 10px 20px;
                            white-space: normal;
                            line-height: 1.4;
                        }
                    }
                `;
                document.head.appendChild(style);
            }
            
            // Show notification
            notification.innerHTML = `✨ <strong>${featureName}</strong> - ${featureDesc} ✨`;
            notification.classList.add('show');
            
            // Hide notification after 2.5 seconds
            setTimeout(() => {
                notification.classList.remove('show');
            }, 2500);
        }
    }
    
    // ========== SCROLL ANIMATION FOR WHY CARDS ==========
    const animatedCards = document.querySelectorAll('.animate-zoom-in');
    
    if (animatedCards.length > 0 && 'IntersectionObserver' in window) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animated');
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.2,
            rootMargin: '0px 0px -50px 0px'
        });
        
        animatedCards.forEach(element => {
            observer.observe(element);
        });
    } else {
        // Fallback for older browsers
        animatedCards.forEach(element => {
            element.classList.add('animated');
        });
    }
});

/* ============================================
   APPLICATIONS SECTION - CLICK EFFECTS
   ============================================ */

document.addEventListener("DOMContentLoaded", function() {
    
    // ========== APPLICATIONS CARD CLICK EFFECTS ==========
    const appCards = document.querySelectorAll('.app-card');
    
    if (appCards.length > 0) {
        
        // Function to create ripple effect
        function createRipple(event, card) {
            const rect = card.getBoundingClientRect();
            const x = event.clientX - rect.left;
            const y = event.clientY - rect.top;
            
            const ripple = document.createElement('span');
            ripple.className = 'ripple';
            ripple.style.left = `${x}px`;
            ripple.style.top = `${y}px`;
            
            card.appendChild(ripple);
            
            setTimeout(() => {
                ripple.remove();
            }, 800);
        }
        
        // Add click event listeners
        appCards.forEach(card => {
            card.addEventListener('click', function(e) {
                // Create ripple effect
                createRipple(e, this);
                
                // Add flash effect
                this.classList.add('flash');
                setTimeout(() => {
                    this.classList.remove('flash');
                }, 400);
                
                // Add clicked class for icon animation
                this.classList.add('clicked');
                setTimeout(() => {
                    this.classList.remove('clicked');
                }, 500);
                
                // Get application name
                const appName = this.querySelector('h3')?.textContent || 'Application';
                
                // Show floating notification
                showAppNotification(appName);
                
                // Optional: Log to console
                console.log(`Application selected: ${appName}`);
            });
            
            // Add hover effect
            card.addEventListener('mouseenter', function() {
                this.style.cursor = 'pointer';
            });
        });
        
        // Function to show notification
        function showAppNotification(appName) {
            let notification = document.querySelector('.app-notification');
            if (!notification) {
                notification = document.createElement('div');
                notification.className = 'app-notification';
                document.body.appendChild(notification);
                
                const style = document.createElement('style');
                style.textContent = `
                    .app-notification {
                        position: fixed;
                        bottom: 30px;
                        left: 50%;
                        transform: translateX(-50%) translateY(100px);
                        background: linear-gradient(135deg, #d01323 0%, #e63946 100%);
                        color: #0a0a0a;
                        padding: 12px 24px;
                        border-radius: 50px;
                        font-size: 0.9rem;
                        font-weight: 600;
                        z-index: 9999;
                        opacity: 0;
                        transition: all 0.3s ease;
                        white-space: nowrap;
                        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
                        font-family: 'Inter', sans-serif;
                    }
                    .app-notification.show {
                        transform: translateX(-50%) translateY(0);
                        opacity: 1;
                    }
                    @media (max-width: 576px) {
                        .app-notification {
                            white-space: normal;
                            text-align: center;
                            max-width: 90%;
                            font-size: 0.8rem;
                            padding: 10px 20px;
                        }
                    }
                `;
                document.head.appendChild(style);
            }
            
            notification.innerHTML = `✨ ${appName} - Perfect for your project ✨`;
            notification.classList.add('show');
            
            setTimeout(() => {
                notification.classList.remove('show');
            }, 2000);
        }
    }
    
    // ========== SCROLL ANIMATION ==========
    const animatedCards = document.querySelectorAll('.animate-zoom-in');
    
    if (animatedCards.length > 0 && 'IntersectionObserver' in window) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animated');
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.2,
            rootMargin: '0px 0px -50px 0px'
        });
        
        animatedCards.forEach(element => {
            observer.observe(element);
        });
    } else {
        animatedCards.forEach(element => {
            element.classList.add('animated');
        });
    }
});

// Download Modal Functions
let currentDownloadFile = '';
let currentDownloadName = '';

function openDownloadModal(catalogueFile, catalogueName) {
    currentDownloadFile = catalogueFile;
    currentDownloadName = catalogueName;
    
    const modal = document.getElementById('downloadModal');
    const fileInput = document.getElementById('catalogueFile');
    const nameInput = document.getElementById('catalogueName');
    
    if (fileInput) fileInput.value = catalogueFile;
    if (nameInput) nameInput.value = catalogueName;
    
    if (modal) {
        modal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
        
        setTimeout(() => {
            document.getElementById('fullName')?.focus();
        }, 100);
    }
}

function closeDownloadModal() {
    const modal = document.getElementById('downloadModal');
    if (modal) {
        modal.style.display = 'none';
        document.body.style.overflow = '';
        const form = document.getElementById('downloadForm');
        if (form) form.reset();
    }
}

function closeSuccessModal() {
    const modal = document.getElementById('successModal');
    if (modal) {
        modal.style.display = 'none';
        document.body.style.overflow = '';
    }
}

// Reliable download function using fetch and blob
async function downloadFile(url, filename) {
    try {
        // Show loading indicator
        const loadingMsg = document.createElement('div');
        loadingMsg.className = 'download-loading';
        loadingMsg.textContent = 'Preparing download...';
        loadingMsg.style.cssText = 'position: fixed; bottom: 20px; right: 20px; background: #d62828; color: white; padding: 10px 20px; border-radius: 5px; z-index: 10000;';
        document.body.appendChild(loadingMsg);
        
        // Fetch the file
        const response = await fetch(url);
        
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        
        // Get the file as a blob
        const blob = await response.blob();
        
        // Create a temporary URL for the blob
        const blobUrl = window.URL.createObjectURL(blob);
        
        // Create a hidden anchor element
        const link = document.createElement('a');
        link.href = blobUrl;
        link.download = filename;
        link.style.display = 'none';
        
        // Append to body, click, and remove
        document.body.appendChild(link);
        link.click();
        
        // Clean up
        setTimeout(() => {
            document.body.removeChild(link);
            window.URL.revokeObjectURL(blobUrl);
        }, 100);
        
        // Remove loading message
        setTimeout(() => {
            if (loadingMsg && loadingMsg.parentNode) {
                loadingMsg.remove();
            }
        }, 1000);
        
        return true;
        
    } catch (error) {
        console.error('Download error:', error);
        
        // Fallback: Open in new window if fetch fails
        window.open(url, '_blank');
        
        return false;
    }
}

// Handle form submission
document.addEventListener('DOMContentLoaded', function() {
    const downloadForm = document.getElementById('downloadForm');
    
    if (downloadForm) {
        downloadForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            // Get form data
            const fullName = document.getElementById('fullName').value;
            const userEmail = document.getElementById('userEmail').value;
            const userPhone = document.getElementById('userPhone').value;
            const catalogueFile = document.getElementById('catalogueFile').value;
            const catalogueName = document.getElementById('catalogueName').value;
            const subscribeNewsletter = document.getElementById('subscribeNewsletter').checked;
            
            // Validate
            if (!fullName || !userEmail || !userPhone) {
                alert('Please fill in all required fields');
                return;
            }
            
            // Validate email format
            const emailRegex = /^[^\s@]+@([^\s@]+\.)+[^\s@]+$/;
            if (!emailRegex.test(userEmail)) {
                alert('Please enter a valid email address');
                return;
            }
            
            // Validate phone (basic)
            if (userPhone.length < 8) {
                alert('Please enter a valid phone number');
                return;
            }
            
            // Show loading state
            const submitBtn = this.querySelector('.submit-btn');
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<span class="btn-text">Processing...</span>';
            submitBtn.disabled = true;
            
            try {
                const response = await fetch('download-handler.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        fullName: fullName,
                        userEmail: userEmail,
                        userPhone: userPhone,
                        catalogueFile: catalogueFile,
                        catalogueName: catalogueName,
                        subscribeNewsletter: subscribeNewsletter
                    })
                });

                const data = await response.json();
                
                if (data.success) {
                    // Close the download modal
                    closeDownloadModal();
                    
                    // Start the download in background
                    await downloadFile(data.downloadUrl, data.catalogueFile);
                    
                    // Show success modal
                    const successModal = document.getElementById('successModal');
                    if (successModal) {
                        successModal.style.display = 'flex';
                        document.body.style.overflow = 'hidden';
                    }
                    
                    // Auto close success modal after 5 seconds
                    setTimeout(() => {
                        closeSuccessModal();
                    }, 5000);
                    
                } else {
                    alert('Error: ' + (data.message || 'Could not process download. Please try again.'));
                }
            } catch (error) {
                // console.error('Error:', error);
                alert('Network error. Please check your connection and try again.');
            } finally {
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            }
        });
    }
    
    // Close modals when clicking outside
    window.addEventListener('click', function(event) {
        const downloadModal = document.getElementById('downloadModal');
        const successModal = document.getElementById('successModal');
        
        if (event.target === downloadModal) {
            closeDownloadModal();
        }
        if (event.target === successModal) {
            closeSuccessModal();
        }
    });
    
    // Close with Escape key
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            closeDownloadModal();
            closeSuccessModal();
        }
    });
});