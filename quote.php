<?php
include 'layouts/header.php';

require_once 'components/breadcrumbs.php';

$breadcrumbs = [
    ['name' => 'Get Guote', 'url' => '']
];
renderBreadcrumbs($breadcrumbs);
?>

<!-- Get a Quote / Book Consultation Page - Moreroom Stone Nigeria -->
<main id="quote-page" class="quote-page">

    <!-- Hero Section -->
    <section class="page-hero">
        <div class="page-hero-background">
            <img src="<?php echo BASE_URL; ?>/assets/images/natural-stone-beauty.jpeg" 
                 alt="Book Consultation" class="page-hero-image">
            <div class="page-hero-overlay"></div>
        </div>
        
        <div class="page-hero-content container">
            <div class="page-hero-text animate-fade-up-bounce">
                <span class="section-tag">Limited Time Offer</span>
                <h1 class="page-hero-title">Consultation</h1>
                <p class="page-hero-subtitle">Get expert advice on our premium sintered stone surfaces and financing options</p>
            </div>
        </div>
    </section>

    <!-- Quote / Consultation Section -->
    <section class="quote-section">
        <div class="container">
            <div class="quote-grid">
                <!-- Left Column - Offer Info -->
                <div class="quote-info animate-fade-left">
                    <div class="offer-badge">
                        <span class="badge-icon">🎯</span>
                        <span class="badge-text">Limited Time Offer</span>
                    </div>
                    <h2 class="quote-info-title">Learn more about our <span class="text-gradient">Financing Program</span> on qualified orders*</h2>
                    <p class="quote-info-text">Get expert guidance on selecting the perfect sintered stone surfaces for your project. Our specialists will help you understand the financing options available for your qualified purchase.</p>
                    
                    <div class="info-features">
                        <div class="info-feature">
                            <div class="feature-icon">✓</div>
                            <div class="feature-text">Free consultation with stone experts</div>
                        </div>
                        <div class="info-feature">
                            <div class="feature-icon">✓</div>
                            <div class="feature-text">Personalized project recommendations</div>
                        </div>
                        <div class="info-feature">
                            <div class="feature-icon">✓</div>
                            <div class="feature-text">Financing options available on qualified orders*</div>
                        </div>
                        <div class="info-feature">
                            <div class="feature-icon">✓</div>
                            <div class="feature-text">Sample requests and material selection</div>
                        </div>
                    </div>
                </div>
                
                <!-- Form -->
                <div class="quote-form-container animate-fade-right">
                    <div class="form-header">
                        <h3 class="form-title">Request a Quote</h3>
                        <p class="form-subtitle">Fill out the form below and we'll get back to you within 24 hours</p>
                    </div>
                    
                    <form class="quote-form" id="quoteForm" method="post">
                        <div class="form-row">
                            <div class="form-group half">
                                <label for="name" class="form-label">Full Name <span class="required">*</span></label>
                                <input type="text" id="name" name="name" class="form-input" placeholder="John Doe" required>
                                <div class="input-focus-effect"></div>
                            </div>
                            <div class="form-group half">
                                <label for="role" class="form-label">I am a <span class="required">*</span></label>
                                <select id="role" name="role" class="form-select" required>
                                    <option value="">- I AM A -</option>
                                    <option value="Designer">Designer</option>
                                    <option value="Home Owner">Home Owner</option>
                                    <option value="Contractor">Contractor</option>
                                    <option value="Fabricator">Fabricator</option>
                                    <option value="Other">Other</option>
                                </select>
                                <div class="input-focus-effect"></div>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group half">
                                <label for="email" class="form-label">Email Address <span class="required">*</span></label>
                                <input type="email" id="email" name="email" class="form-input" placeholder="john@example.com" required>
                                <div class="input-focus-effect"></div>
                            </div>
                            <div class="form-group half">
                                <label for="phone" class="form-label">Phone Number <span class="required">*</span></label>
                                <input type="tel" id="phone" name="phone" class="form-input" placeholder="+234 123 456 7890" required>
                                <div class="input-focus-effect"></div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">I am shopping for</label>
                            <div class="checkbox-group">
                                <label class="checkbox-label">
                                    <input type="checkbox" name="shopping_for[]" value="Current project(s)">
                                    <span class="checkmark"></span>
                                    Current project(s)
                                </label>
                                <label class="checkbox-label">
                                    <input type="checkbox" name="shopping_for[]" value="Future project(s)">
                                    <span class="checkmark"></span>
                                    Future project(s)
                                </label>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="project_description" class="form-label">Project Description</label>
                            <textarea id="project_description" name="project_description" class="form-textarea" rows="3" placeholder="Tell us about your project, space requirements, and any specific needs..."></textarea>
                            <div class="input-focus-effect"></div>
                        </div>
                        
                        <div class="form-group">
                            <label for="how_found" class="form-label">How did you find us?</label>
                            <select id="how_found" name="how_found" class="form-select">
                                <option value="">-- Please Select --</option>
                                <option value="Instagram">Instagram</option>
                                <option value="Facebook">Facebook</option>
                                <option value="Google Search">Google Search</option>
                                <option value="Referral">Referral</option>
                                <option value="Other">Other</option>
                            </select>
                            <div class="input-focus-effect"></div>
                        </div>
                        
                        <div class="form-group">
                            <label class="checkbox-label">
                                <input type="checkbox" name="newsletter" value="True" checked>
                                <span class="checkmark"></span>
                                Join our newsletter to receive the latest promotions, product launches, and inspiring content. You can unsubscribe at any time.
                            </label>
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" class="submit-btn" id="submitBtn">
                                <span class="btn-text">Book a Free Consultation</span>
                                <span class="btn-icon">→</span>
                            </button>
                        </div>
                    </form>
                    
                    <div class="alternative-actions">
                        <a href="<?php echo BASE_URL; ?>/contact.php" class="alt-btn book-showroom">
                            <span>🏢</span> Book Showroom Visit
                        </a>
                        <a href="tel:+2348139466765" class="alt-btn call-us">
                            <span>📞</span> Or call us at <span class="phone-number">+234 813 946 6765</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
include 'layouts/footer.php';
?>