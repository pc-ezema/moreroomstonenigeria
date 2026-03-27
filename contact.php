<?php
include 'layouts/header.php';

require_once 'components/breadcrumbs.php';

$breadcrumbs = [
    ['name' => 'Contact Us', 'url' => '']
];
renderBreadcrumbs($breadcrumbs);
?>

<!-- Contact Page - Moreroom Stone Nigeria -->
<main id="contact-page" class="contact-page">

    <!-- Standard Hero Section -->
    <section class="page-hero">
        <div class="page-hero-background">
            <img src="https://images.unsplash.com/photo-1423666639041-f56000c27a9a?w=1600&q=80"
                alt="Contact Us" class="page-hero-image">
            <div class="page-hero-overlay"></div>
        </div>

        <div class="page-hero-content container">
            <div class="page-hero-text animate-fade-up-bounce">
                <span class="section-tag">Get in Touch</span>
                <h1 class="page-hero-title">Contact Us</span></h1>
                <p class="page-hero-subtitle">Visit our showroom or reach out to our team for expert assistance</p>
            </div>
        </div>
    </section>

    <!-- Showroom & Contact Info Section -->
    <section class="showroom-section">
        <div class="container">
            <div class="section-header text-center">
                <span class="section-tag">Visit Us</span>
                <h2 class="section-title" style="color: #fff;">Our Showroom & <span class="text-gradient">Warehouse</span></h2>
                <p class="section-subtitle" style="color: #fff;">Experience our premium sintered stone surfaces in person</p>
            </div>

            <div class="showroom-grid">
                <!-- Main Showroom Card -->
                <div class="showroom-card animate-zoom-in">
                    <div class="card-icon-large">
                        <svg viewBox="0 0 24 24" width="48" height="48">
                            <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" fill="currentColor" />
                        </svg>
                    </div>
                    <h3 class="showroom-title">Showroom & Warehouse</h3>
                    <p class="showroom-address">
                        10 Westerner Industrial Avenue,<br>
                        Isheri Oke, Ojodu Berger,<br>
                        Lagos State, Nigeria
                    </p>
                    <div class="showroom-divider"></div>
                    <div class="showroom-contact">
                        <div class="contact-phone">
                            <span class="phone-icon">📞</span>
                            <div>
                                <a href="tel:+2348139466765">+234 813 946 6765</a>
                                <a href="tel:+2348039458434">+234 803 945 8434</a>
                            </div>
                        </div>
                    </div>
                    <div class="showroom-hours">
                        <span class="hours-icon">🕒</span>
                        <span>Mon-Fri: 9:00 AM - 5:00 PM | Sat: Strictly on Appointment | Sun: Closed</span>
                    </div>
                </div>

                <!-- Quick Contact Card -->
                <div class="quick-contact-card animate-zoom-in stagger-1">
                    <div class="quick-contact-icon">💬</div>
                    <h3>Quick Contact</h3>
                    <p>Prefer to call or email? Reach us directly</p>
                    <div class="quick-contact-details">
                        <a href="tel:+2348139466765" class="quick-phone">
                            <span>📱</span> +234 813 946 6765
                        </a>
                        <a href="tel:+2348039458434" class="quick-phone">
                            <span>📱</span> +234 803 945 8434
                        </a>
                        <a href="mailto:info@moreroomstonenigeria.com" class="quick-email">
                            <span>✉️</span> info@moreroomstonenigeria.com
                        </a>
                    </div>
                    <a href="#contactForm" class="quick-btn">Send a Message →</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form Section -->
    <section class="contact-form-section">
        <div class="container">
            <!-- At the top of your form section, replace your existing PHP block with this -->
            <div class="form-container">
                <div class="form-header">
                    <h2 class="form-title">Send Us a <span class="text-gradient">Message</span></h2>
                    <p class="form-subtitle">We'll get back to you within 24 hours</p>
                </div>

                <form class="contact-form" id="contactForm">
                    <div class="form-row">
                        <div class="form-group half">
                            <label for="firstName" class="form-label">First Name <span class="required">*</span></label>
                            <input type="text" id="firstName" name="firstName" class="form-input" placeholder="John" required>
                            <div class="input-focus-effect"></div>
                        </div>
                        <div class="form-group half">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input type="text" id="lastName" name="lastName" class="form-input" placeholder="Doe">
                            <div class="input-focus-effect"></div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group half">
                            <label for="email" class="form-label">Email <span class="required">*</span></label>
                            <input type="email" id="email" name="email" class="form-input" placeholder="john@example.com" required>
                            <div class="input-focus-effect"></div>
                        </div>
                        <div class="form-group half">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="tel" id="phone" name="phone" class="form-input" placeholder="+234 123 456 7890">
                            <div class="input-focus-effect"></div>
                        </div>
                    </div>

                    <div class="form-group full">
                        <label for="message" class="form-label">Message <span class="required">*</span></label>
                        <textarea id="message" name="message" class="form-textarea" rows="5" placeholder="Tell us about your project..." required></textarea>
                        <div class="input-focus-effect"></div>
                    </div>

                    <div class="form-group full">
                        <button type="submit" class="submit-btn">
                            <span class="btn-text">Send Message</span>
                            <span class="btn-icon">→</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="map-section">
        <div class="container">
            <div class="map-container">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.940442031528!2d3.3952190746315054!3d6.65430449334047!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103b949fbadf5eb5%3A0xb831dc5d53c1e8de!2s10%20Westerner%20Industrial%20Ave%2C%20Isheri%20Oke%2C%20Ojodu%20Berger%20102109%2C%20Ogun%20State!5e0!3m2!1sen!2sng!4v1774192174663!5m2!1sen!2sng"
                    width="100%"
                    height="450"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    class="map-iframe"></iframe>
                <div class="map-overlay"></div>
            </div>
        </div>
    </section>
</main>

<?php
include 'layouts/footer.php';
?>