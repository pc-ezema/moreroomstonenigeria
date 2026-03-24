<?php
include 'layouts/header.php';
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

                    <a href="<?php echo BASE_URL; ?>/assets/catalogues/1200x2700-Sintered-Stone-Moreroom.pdf" class="catalogue-btn" download>
                        <span>Download PDF</span>
                        <span class="btn-arrow">↓</span>
                    </a>
                </div>

                <!-- Technical Specifications -->
                <div class="catalogue-card animate-zoom-in stagger-1">
                    <div class="catalogue-icon">📘</div>
                    <h3 class="catalogue-title">Collection Catalogue</h3>
                    <p class="catalogue-description">Overview of all sintered stone collections with specifications</p>
                    <a href="<?php echo BASE_URL; ?>/assets/catalogues/Latest-3200x1600-Sintered-Moreroom-Stone-Catalog.pdf" class="catalogue-btn" download>
                        <span>Download PDF</span>
                        <span class="btn-arrow">↓</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

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