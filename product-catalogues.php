<?php
include 'layouts/header.php';

require_once 'components/breadcrumbs.php';

$breadcrumbs = [
    ['name' => 'Project Catalogues', 'url' => '']
];
renderBreadcrumbs($breadcrumbs);
?>

<!-- Products Page - Moreroom Stone Nigeria -->
<main id="products-page" class="products-page">

    <!-- Standard Hero Section -->
    <section class="page-hero">
        <div class="page-hero-background">
            <img src="<?php echo BASE_URL; ?>/assets/images/home-slider.jpeg"
                alt="Our Sintered Stone Collections" class="page-hero-image">
            <div class="page-hero-overlay"></div>
        </div>

        <div class="page-hero-content container">
            <div class="page-hero-text animate-fade-up-bounce">
                <span class="section-tag">Our Products</span>
                <h1 class="page-hero-title">Product Catalogues</span></h1>
                <p class="page-hero-subtitle">Discover our extensive range of high-quality sintered stone surfaces for every space</p>
            </div>
        </div>
    </section>

    <!-- Download Catalogues Section -->
    <section class="catalogues-section">
        <div class="container">
            <div class="section-header text-center">
                <span class="section-tag">Resources</span>
                <h2 class="section-title">Download <span class="text-gradient">Catalogues</span></h2>
                <p class="section-subtitle">Access our complete product documentation and specifications</p>
            </div>

            <div class="catalogues-grid">
                <!-- Complete Catalogue -->
                <div class="catalogue-card animate-zoom-in">
                    <div class="catalogue-icon">📘</div>
                    <h3 class="catalogue-title">Collection Catalogue</h3>
                    <p class="catalogue-description">Overview of all sintered stone collections with specifications</p>

                    <button class="catalogue-btn" onclick="openDownloadModal('1200x2700-Sintered-Stone-Moreroom.pdf', 'Collection Catalogue')">
                        <span>Download PDF</span>
                        <span class="btn-arrow">↓</span>
                    </button>
                </div>

                <!-- Technical Specifications -->
                <div class="catalogue-card animate-zoom-in stagger-1">
                    <div class="catalogue-icon">📘</div>
                    <h3 class="catalogue-title">Latest Collection Catalogue</h3>
                    <p class="catalogue-description">Complete catalogue with all new arrivals and specifications</p>

                    <button class="catalogue-btn" onclick="openDownloadModal('Latest-3200x1600-Sintered-Moreroom-Stone-Catalog.pdf', 'Latest Collection Catalogue')">
                        <span>Download PDF</span>
                        <span class="btn-arrow">↓</span>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Download Modal -->
    <div id="downloadModal" class="download-modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Download Catalogue</h3>
                <button class="modal-close" onclick="closeDownloadModal()">&times;</button>
            </div>

            <div class="modal-body">
                <p class="modal-description">Please provide your details to download the catalogue. We'll send you updates about new products and special offers.</p>

                <form id="downloadForm" class="download-form">
                    <input type="hidden" id="catalogueFile" name="catalogueFile">
                    <input type="hidden" id="catalogueName" name="catalogueName">

                    <div class="form-group">
                        <label for="fullName">Full Name <span class="required">*</span></label>
                        <input type="text" id="fullName" name="fullName" class="form-input" placeholder="John Doe" required>
                        <div class="input-focus-effect"></div>
                    </div>

                    <div class="form-group">
                        <label for="userEmail">Email Address <span class="required">*</span></label>
                        <input type="email" id="userEmail" name="userEmail" class="form-input" placeholder="john@example.com" required>
                        <div class="input-focus-effect"></div>
                    </div>

                    <div class="form-group">
                        <label for="userPhone">Phone Number <span class="required">*</span></label>
                        <input type="tel" id="userPhone" name="userPhone" class="form-input" placeholder="+234 123 456 7890" required>
                        <div class="input-focus-effect"></div>
                    </div>

                    <div class="form-group checkbox-group">
                        <input type="checkbox" id="subscribeNewsletter" name="subscribeNewsletter" checked>
                        <label for="subscribeNewsletter">Subscribe to our newsletter for product updates and offers</label>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="submit-btn">
                            <span class="btn-text">Download Now</span>
                            <span class="btn-icon">↓</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Success Modal -->
    <div id="successModal" class="download-modal">
        <div class="modal-content success-modal">
            <div class="modal-header">
                <h3>Download Started!</h3>
                <button class="modal-close" onclick="closeSuccessModal()">&times;</button>
            </div>
            <div class="modal-body">
                <div class="success-icon">✓</div>
                <p class="success-message">Your download will begin shortly.</p>
                <p class="success-submessage">Check your email for confirmation and product information.</p>
                <button class="close-btn" onclick="closeSuccessModal()">Continue Browsing</button>
            </div>
        </div>
    </div>

    <!-- Call to Action -->
    <section class="cta-section">
        <div class="container">
            <div class="cta-content">
                <h2 class="cta-title">Need Help Choosing?</h2>
                <p class="cta-text">Our stone experts are here to assist you in finding the perfect sintered stone for your project</p>
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