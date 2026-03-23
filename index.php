<?php
include 'layouts/header.php';
?>

<!-- Home Page - Moreroom Stone Nigeria -->
<main id="tiles-home" class="tiles-page">

    <!-- Hero Slider Section - 5 Slides -->
    <section class="hero-slider">
        <div class="slider-container">
            <!-- Slide 1 -->
            <div class="slide active">
                <div class="slide-bg">
                    <img src="<?php echo BASE_URL; ?>/assets/images/home-slider.jpeg" 
                        alt="Premium Sintered Stone" class="slide-image">
                    <div class="slide-overlay"></div>
                </div>
                <div class="slide-content container">
                    <div class="slide-text-wrapper">
                        <span class="slide-tag">Premium Quality</span>
                        <h1 class="slide-title">Premium Sintered Stone Surfaces For Modern Architecture</h1>
                        <p class="slide-subtitle">Designed for kitchens, walls, floors, and architectural spaces.</p>
                        <div class="slide-buttons">
                            <a href="<?php echo BASE_URL; ?>/collections.php" class="btn-primary-slide">Explore Collections</a>
                            <a href="<?php echo BASE_URL; ?>/quote.php" class="btn-outline-slide">Get a Quote</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Slide 2 -->
            <div class="slide">
                <div class="slide-bg">
                    <img src="<?php echo BASE_URL; ?>/assets/images/home-slider-2.jpeg" 
                        alt="Durability and Elegance" class="slide-image">
                    <div class="slide-overlay"></div>
                </div>
                <div class="slide-content container">
                    <div class="slide-text-wrapper">
                        <span class="slide-tag">Unmatched Quality</span>
                        <h1 class="slide-title">Premium Sintered Stone Surfaces For Modern Architecture</h1>
                        <p class="slide-subtitle">Designed for kitchens, walls, floors, and architectural spaces.</p>
                        <div class="slide-buttons">
                            <a href="<?php echo BASE_URL; ?>/collections.php" class="btn-primary-slide">Explore Collections</a>
                            <a href="<?php echo BASE_URL; ?>/quote.php" class="btn-outline-slide">Get a Quote</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Slide 3 -->
            <div class="slide">
                <div class="slide-bg">
                    <img src="<?php echo BASE_URL; ?>/assets/images/home-slider-3.jpeg" 
                        alt="Aesthetics and Excellence" class="slide-image">
                    <div class="slide-overlay"></div>
                </div>
                <div class="slide-content container">
                    <div class="slide-text-wrapper">
                        <span class="slide-tag">Design Excellence</span>
                        <h1 class="slide-title">Premium Sintered Stone Surfaces For Modern Architecture</h1>
                        <p class="slide-subtitle">Designed for kitchens, walls, floors, and architectural spaces.</p>
                        <div class="slide-buttons">
                            <a href="<?php echo BASE_URL; ?>/collections.php" class="btn-primary-slide">Explore Collections</a>
                            <a href="<?php echo BASE_URL; ?>/quote.php" class="btn-outline-slide">Get a Quote</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Slide 4 -->
            <div class="slide">
                <div class="slide-bg">
                    <img src="<?php echo BASE_URL; ?>/assets/images/the-perfect-blend.jpeg" 
                        alt="Sustainable Luxury" class="slide-image">
                    <div class="slide-overlay"></div>
                </div>
                <div class="slide-content container">
                    <div class="slide-text-wrapper">
                        <span class="slide-tag">Eco-Friendly</span>
                        <h1 class="slide-title">Premium Sintered Stone Surfaces For Modern Architecture</h1>
                        <p class="slide-subtitle">Designed for kitchens, walls, floors, and architectural spaces.</p>
                        <div class="slide-buttons">
                            <a href="<?php echo BASE_URL; ?>/collections.php" class="btn-primary-slide">Explore Collections</a>
                            <a href="<?php echo BASE_URL; ?>/quote.php" class="btn-outline-slide">Get a Quote</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Slide 5 -->
            <div class="slide">
                <div class="slide-bg">
                    <img src="<?php echo BASE_URL; ?>/assets/images/natural-stone-beauty.jpeg" 
                        alt="Endless Possibilities" class="slide-image">
                    <div class="slide-overlay"></div>
                </div>
                <div class="slide-content container">
                    <div class="slide-text-wrapper">
                        <span class="slide-tag">Versatile Applications</span>
                        <h1 class="slide-title">Premium Sintered Stone Surfaces For Modern Architecture</h1>
                        <p class="slide-subtitle">Designed for kitchens, walls, floors, and architectural spaces.</p>
                        <div class="slide-buttons">
                            <a href="<?php echo BASE_URL; ?>/collections.php" class="btn-primary-slide">Explore Collections</a>
                            <a href="<?php echo BASE_URL; ?>/quote.php" class="btn-outline-slide">Get a Quote</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Slider Controls -->
        <button class="slider-arrow prev" id="prevSlide">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M15 18L9 12L15 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>
        <button class="slider-arrow next" id="nextSlide">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9 18L15 12L9 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>
        
        <div class="slider-dots">
            <span class="dot active"></span>
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
        </div>
    </section>

    <!-- The Perfect Blend Section -->
    <section class="blend-section">
        <div class="container">
            <div class="blend-grid">
                <div class="blend-content animate-fade-left">
                    <!-- <span class="section-tag"></span> -->
                    <h2 class="blend-title">The Perfect Blend of <span class="text-gradient">Durability and Elegance</span></h2>
                    <p class="blend-text">Our products are crafted to meet top-tier industry standards, ensuring exceptional quality in every slab. Choosing Sintered stone means selecting surfaces that strike a perfect balance between elegance, durability, and value.</p>
                    <div class="blend-features">
                        <div class="blend-feature">
                            <div class="feature-icon-wrapper">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M12 2L15 8L22 9L17 14L18 21L12 17.5L6 21L7 14L2 9L9 8L12 2Z" fill="currentColor"/>
                                </svg>
                            </div>
                            <div>
                                <h4>Top-Tier Quality</h4>
                                <p>Exceptional standards in every slab</p>
                            </div>
                        </div>
                        <div class="blend-feature">
                            <div class="feature-icon-wrapper">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M12 2L15 8L22 9L17 14L18 21L12 17.5L6 21L7 14L2 9L9 8L12 2Z" fill="currentColor"/>
                                </svg>
                            </div>
                            <div>
                                <h4>Perfect Balance</h4>
                                <p>Elegance, durability, and value combined</p>
                            </div>
                        </div>
                        <div class="blend-feature">
                            <div class="feature-icon-wrapper">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M12 2L15 8L22 9L17 14L18 21L12 17.5L6 21L7 14L2 9L9 8L12 2Z" fill="currentColor"/>
                                </svg>
                            </div>
                            <div>
                                <h4>Industry Standards</h4>
                                <p>Certified and tested for excellence</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="blend-image animate-fade-right">
                    <div class="image-container">
                        <img src="<?php echo BASE_URL; ?>/assets/images/the-perfect-blend.jpeg" alt="Sintered Stone Surface" class="blend-img">
                        <div class="image-overlay"></div>
                    </div>
                    <div class="floating-badge">
                        <span class="badge-icon">✦</span>
                        <span>Premium Quality</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission & Innovation Section -->
    <section class="mission-section">
        <div class="container">
            <div class="mission-grid">
                <div class="mission-image animate-fade-left">
                    <div class="image-container">
                        <img src="<?php echo BASE_URL; ?>/assets/images/natural-stone-beauty.jpeg" alt="Natural Stone Beauty" class="mission-img">
                        <div class="image-caption">Timeless natural stone appeal</div>
                    </div>
                </div>
                <div class="mission-content animate-fade-right">
                    <span class="section-tag">Our Mission</span>
                    <h2 class="mission-title">Delivering the <span class="text-gradient">Timeless Appeal</span> of Natural Stone</h2>
                    <p class="mission-text">From the outset, our mission has been to deliver the timeless appeal of natural stone while enhancing it with the strength and performance of advanced sintered materials.</p>
                    <p class="mission-text">Each piece reflects the authentic charm of natural stone, brought to life through innovative technology that produces striking and detailed patterns.</p>
                    <div class="mission-stats">
                        <div class="stat">
                            <span class="stat-number">50+</span>
                            <span class="stat-label">Design Patterns</span>
                        </div>
                        <div class="stat">
                            <span class="stat-number">20+</span>
                            <span class="stat-label">Texture Finishes</span>
                        </div>
                        <div class="stat">
                            <span class="stat-number">10+</span>
                            <span class="stat-label">Thickness Options</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Extensive Range Section -->
    <section class="range-section">
        <div class="container">
            <div class="section-header text-center">
                <span class="section-tag">Extensive Range</span>
                <h2 class="section-title">Available in <span class="text-gradient">Diverse Designs</span>, Textures & Thicknesses</h2>
                <p class="section-subtitle">Providing the flexibility to suit a wide variety of interior styles and help bring your vision to life</p>
            </div>

            <div class="range-grid">
                <div class="range-card animate-zoom-in">
                    <div class="range-image-wrapper">
                        <img src="<?php echo BASE_URL; ?>/assets/images/luxury/freezing-emeral.jpg" alt="Freezing Emerald" class="range-image">
                        <div class="range-overlay">
                            <h3 class="range-title">Freezing Emerald</h3>
                            <p class="range-text">From classic to contemporary</p>
                        </div>
                    </div>
                </div>
                <div class="range-card animate-zoom-in stagger-1">
                    <div class="range-image-wrapper">
                        <img src="<?php echo BASE_URL; ?>/assets/images/luxury/napoleon-black.jpg" alt="Napoleon Black" class="range-image">
                        <div class="range-overlay">
                            <div class="range-icon">✨</div>
                            <h3 class="range-title">Napoleon Black</h3>
                            <p class="range-text">Matte, polished, and natural finishes</p>
                        </div>
                    </div>
                </div>
                <div class="range-card animate-zoom-in stagger-2">
                    <div class="range-image-wrapper">
                        <img src="<?php echo BASE_URL; ?>/assets/images/luxury/palissandro-blue.jpg" alt="Palissandro Blue" class="range-image">
                        <div class="range-overlay">
                            <h3 class="range-title">Palissandro Blue</h3>
                            <p class="range-text">6mm, 12mm, 20mm, and custom options</p>
                        </div>
                    </div>
                </div>
                <div class="range-card animate-zoom-in stagger-3">
                    <div class="range-image-wrapper">
                        <img src="<?php echo BASE_URL; ?>/assets/images/luxury/verde-maestro.jpg" alt="Verde Maestro" class="range-image">
                        <div class="range-overlay">
                            <h3 class="range-title">Verde Maestro</h3>
                            <p class="range-text">For every interior style</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Where Aesthetics Meet Excellence -->
    <section class="excellence-section">
        <div class="container">
            <div class="excellence-grid">
                <div class="excellence-content animate-fade-left">
                    <span class="section-tag">Where Aesthetics Meet Excellence</span>
                    <h2 class="excellence-title">Balancing Design Costs Without <span class="text-gradient">Sacrificing Quality</span></h2>
                    <p class="excellence-text">Balancing design costs without sacrificing quality or visual appeal can be challenging. That's why our focus is on creating surfaces that seamlessly combine style, strength, and affordability.</p>
                    <p class="excellence-text">By offering a wide range of slabs in diverse designs, textures, and thicknesses, we aim to inspire innovative interior solutions for both residential and commercial spaces.</p>
                    <div class="excellence-buttons">
                        <a href="<?php echo BASE_URL; ?>/collections.php" class="btn btn-primary hover-glow">Explore Collections</a>
                        <a href="<?php echo BASE_URL; ?>/product-catalogues.php" class="btn btn-primary hover-float">Request Catalog</a>
                    </div>
                </div>
                <div class="excellence-image animate-fade-right">
                    <div class="image-container">
                        <img src="<?php echo BASE_URL; ?>/assets/images/about.jpeg" alt="Aesthetics Meet Excellence" class="excellence-img">
                        <div class="image-floating-text">
                            <span>Style + Strength + Affordability</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us -->
    <!-- <section class="features-section">
        <div class="container">
            <div class="section-header text-center">
                <span class="section-tag">Why Choose Us</span>
                <h2 class="section-title">The <span class="text-gradient">Sintered Stone</span> Advantage</h2>
            </div>

            <div class="features-grid">
                <div class="feature-card animate-float">
                    <div class="feature-icon">🏆</div>
                    <h3 class="feature-title">Premium Quality</h3>
                    <p class="feature-text">Crafted to meet top-tier industry standards, ensuring exceptional quality in every slab.</p>
                </div>

                <div class="feature-card animate-float stagger-1">
                    <div class="feature-icon">💪</div>
                    <h3 class="feature-title">Unmatched Durability</h3>
                    <p class="feature-text">Heat-resistant, scratch-resistant, and incredibly strong for lasting performance.</p>
                </div>

                <div class="feature-card animate-float stagger-2">
                    <div class="feature-icon">🎨</div>
                    <h3 class="feature-title">Design Flexibility</h3>
                    <p class="feature-text">Available in diverse designs, textures, and thicknesses to suit any style.</p>
                </div>

                <div class="feature-card animate-float stagger-3">
                    <div class="feature-icon">💎</div>
                    <h3 class="feature-title">Value for Money</h3>
                    <p class="feature-text">Strike the perfect balance between elegance, durability, and affordability.</p>
                </div>
            </div>
        </div>
    </section> -->

    <!-- Call to Action -->
    <section class="cta-section">
        <div class="container">
            <div class="cta-content">
                <h2 class="cta-title">Ready to Transform Your Space?</h2>
                <p class="cta-text">Visit our showroom or book a free consultation with our sintered stone experts</p>
                <div class="cta-buttons">
                    <a href="<?php echo BASE_URL; ?>/quote.php" class="btn btn-primary btn-large hover-glow">Book Consultation</a>
                    <a href="<?php echo BASE_URL; ?>/contact.php" class="btn btn-outline-light btn-large hover-float">Request Samples</a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
include 'layouts/footer.php';
?>