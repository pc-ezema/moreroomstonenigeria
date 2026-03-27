<?php
// layouts/header.php

// Get the current page (without .php extension)
$currentPage = basename($_SERVER['PHP_SELF'], '.php');

require_once dirname(__DIR__) . '/config.php';

// Initialize SEO based on current page
require_once dirname(__DIR__) . '/seo-functions.php';

// Create SEO object based on current page
$seo = new SEO($currentPage);

// Customize SEO based on specific pages
switch ($currentPage) {
    case 'index':
    case '':
        $seo->setTitle('Premium Sintered Stone Surfaces in Nigeria | Moreroom Stone')
            ->setDescription('Moreroom Stone Nigeria offers premium sintered stone surfaces for kitchens, bathrooms, and commercial spaces. Visit our showroom in Lagos for quality stone solutions.')
            ->setKeywords('sintered stone, stone surfaces, kitchen countertops, stone slabs Nigeria, Moreroom Stone')
            ->setOgImage(BASE_URL . '/assets/images/home-slider-2.jpeg');
        break;
        
    case 'about':
        $seo->setTitle('About Moreroom Stone | Premium Stone Suppliers in Nigeria')
            ->setDescription('Learn about Moreroom Stone Nigeria - your trusted partner for high-quality sintered stone surfaces. Discover our commitment to excellence and customer satisfaction.')
            ->setKeywords('about Moreroom Stone, stone suppliers Nigeria, sintered stone company')
            ->setOgImage(BASE_URL . '/assets/images/home-slider-3.jpeg');
        break;
        
    case 'product-catalogues':
        $seo->setTitle('Premium Stone Products | Sintered Stone Surfaces Nigeria')
            ->setDescription('Explore our wide range of premium sintered stone surfaces for countertops, flooring, and wall cladding. Quality stones for residential and commercial use.')
            ->setKeywords('stone products Nigeria, sintered stone slabs, countertops Nigeria, stone catalogues')
            ->setOgImage(BASE_URL . '/assets/images/the-perfect-blend.jpeg');
        break;
        
    case 'collections':
        $seo->setTitle('Stone Collections | Premium Sintered Stone Designs Nigeria')
            ->setDescription('Discover our exclusive collections of premium sintered stone surfaces. Find the perfect design for your kitchen, bathroom, or commercial space.')
            ->setKeywords('stone collections Nigeria, sintered stone designs, premium stone surfaces')
            ->setOgImage(BASE_URL . '/assets/images/natural-stone-beauty.jpeg');
        break;
        
    case 'sintered-stone':
        $seo->setTitle('Sintered Stone | Premium Engineered Stone Surfaces Nigeria')
            ->setDescription('Learn about sintered stone - the future of surface technology. Durable, non-porous, and beautiful stone surfaces for modern spaces.')
            ->setKeywords('sintered stone Nigeria, engineered stone, sintered stone benefits, stone surfaces')
            ->setOgImage(BASE_URL . '/assets/images/natural-stone-beauty.jpeg');
        break;
        
    case 'gallery':
        $seo->setTitle('Project Gallery | Stone Installations by Moreroom Stone Nigeria')
            ->setDescription('View our portfolio of completed projects featuring premium sintered stone surfaces. Get inspired for your next renovation or construction project.')
            ->setKeywords('stone gallery Nigeria, sintered stone projects, stone installations, portfolio')
            ->setOgImage(BASE_URL . '/assets/images/about-moreroom-stone-nigeria.jpeg');
        break;
    
    case 'contact':
        $seo->setTitle('Contact Moreroom Stone | Visit Our Showroom in Lagos Nigeria')
            ->setDescription('Get in touch with Moreroom Stone Nigeria. Visit our showroom, call us, or send a message for expert assistance with your stone surface needs.')
            ->setKeywords('contact Moreroom Stone, stone showroom Lagos, stone suppliers Nigeria')
            ->setOgImage(BASE_URL . '/assets/images/home-slider.jpeg');
        break;
        
    case 'quote':
        $seo->setTitle('Get a Quote | Premium Stone Surfaces Nigeria')
            ->setDescription('Request a quote for your stone surface project. Our team will provide competitive pricing for high-quality sintered stone solutions.')
            ->setKeywords('stone quote Nigeria, sintered stone price, stone surfaces cost')
            ->setRobots('index, follow')
            ->setOgImage(BASE_URL . '/assets/images/about-moreroom-stone-nigeria.jpeg');
        break;
        
    default:
        $seo->setTitle('Moreroom Stone Nigeria | Premium Sintered Stone Surfaces')
            ->setDescription('Moreroom Stone Nigeria offers premium sintered stone surfaces for kitchens, bathrooms, and commercial spaces in Lagos and nationwide.')
            ->setKeywords('sintered stone, stone surfaces Nigeria, Moreroom Stone');
        break;
}

// Set canonical URL
$canonicalUrl = BASE_URL . '/' . ($currentPage == 'index' ? '' : $currentPage . '.php');
$seo->setCanonical($canonicalUrl);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- Dynamic SEO Tags -->
    <?php echo $seo->render(); ?>
    
    <!-- Additional SEO tags -->
    <meta name="format-detection" content="telephone=no">
    <meta name="theme-color" content="#d62828">
    
    <!-- Preconnect for performance -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <!-- CSS files -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/main.css" media="all">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/animate.css" media="all">
    
    <!-- Favicon -->
    <link rel="icon" sizes="192x192" href="<?php echo BASE_URL; ?>/assets/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="<?php echo BASE_URL; ?>/assets/images/favicon.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="<?php echo BASE_URL; ?>/assets/images/favicon.png">
    
    <!-- Schema.org markup for Google -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "LocalBusiness",
        "name": "Moreroom Stone Nigeria",
        "image": "<?php echo BASE_URL; ?>/assets/images/moreroomstoneng-logo.png",
        "logo": "<?php echo BASE_URL; ?>/assets/images/moreroomstoneng-logo.png",
        "description": "<?php echo addslashes($seo->getDescription()); ?>",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "10 Westerner Industrial Avenue, Isheri Oke",
            "addressLocality": "Ojodu Berger",
            "addressRegion": "Lagos",
            "postalCode": "102109",
            "addressCountry": "NG"
        },
        "geo": {
            "@type": "GeoCoordinates",
            "latitude": "6.6543045",
            "longitude": "3.3952191"
        },
        "url": "<?php echo BASE_URL; ?>",
        "telephone": "+2348139466765",
        "email": "info@moreroomstonenigeria.ng",
        "priceRange": "$$",
        "openingHours": "Mo-Fr 09:00-17:00",
        "sameAs": [
            "https://www.facebook.com/moreroomstone",
            "https://www.instagram.com/moreroomstone"
        ]
    }
    </script>
</head>

<body class='responsive'>
    <header class="modern-header" id="mainHeader">
        <div class="header-container">
            <!-- Logo -->
            <div class="logo">
                <a href="<?php echo BASE_URL; ?>/index.php">
                    <img src="<?php echo BASE_URL; ?>/assets/images/moreroomstoneng-logo.png" alt="Moreroom Stone Nigeria - Premium Sintered Stone Surfaces" class="logo-image" width="200" height="60">
                </a>
            </div>

            <!-- Desktop Navigation -->
            <nav class="desktop-nav" aria-label="Main Navigation">
                <ul class="nav-menu">
                    <li class="nav-item"><a href="<?php echo BASE_URL; ?>/index.php" class="nav-link <?php echo ($currentPage == 'index') ? 'active' : ''; ?>">Home</a></li>
                    <li class="nav-item"><a href="<?php echo BASE_URL; ?>/about.php" class="nav-link <?php echo ($currentPage == 'about') ? 'active' : ''; ?>">About Us</a></li>
                    <li class="nav-item"><a href="<?php echo BASE_URL; ?>/product-catalogues.php" class="nav-link <?php echo ($currentPage == 'product-catalogues') ? 'active' : ''; ?>">Product Catalogues</a></li>
                    <li class="nav-item"><a href="<?php echo BASE_URL; ?>/collections.php" class="nav-link <?php echo ($currentPage == 'collections') ? 'active' : ''; ?>">Collections</a></li>
                    <li class="nav-item"><a href="<?php echo BASE_URL; ?>/sintered-stone.php" class="nav-link <?php echo ($currentPage == 'sintered-stone') ? 'active' : ''; ?>">Sintered Stone</a></li>
                    <li class="nav-item"><a href="<?php echo BASE_URL; ?>/gallery.php" class="nav-link <?php echo ($currentPage == 'gallery') ? 'active' : ''; ?>">Gallery</a></li>
                    <li class="nav-item"><a href="<?php echo BASE_URL; ?>/contact.php" class="nav-link <?php echo ($currentPage == 'contact') ? 'active' : ''; ?>">Contact</a></li>
                </ul>
                <a href="<?php echo BASE_URL; ?>/quote.php" class="cta-button">Get a Quote →</a>
            </nav>

            <!-- Mobile Menu Button -->
            <button class="mobile-menu-btn" id="mobileMenuBtn" aria-label="Toggle menu">
                <div class="hamburger-line"></div>
                <div class="hamburger-line"></div>
                <div class="hamburger-line"></div>
            </button>
        </div>

        <!-- Mobile Navigation -->
        <nav class="mobile-nav" id="mobileNav" aria-label="Mobile Navigation">
            <ul class="nav-menu">
                <li class="nav-item mobile-logo-item">
                    <a href="<?php echo BASE_URL; ?>/index.php" class="nav-link">
                        <img src="<?php echo BASE_URL; ?>/assets/images/moreroomstoneng-logo.png" alt="Moreroom Stone Nigeria" style="height: 80px; width: auto;">
                    </a>
                </li>
                <li class="nav-item"><a href="<?php echo BASE_URL; ?>/index.php" class="nav-link <?php echo ($currentPage == 'index') ? 'active' : ''; ?>">Home</a></li>
                <li class="nav-item"><a href="<?php echo BASE_URL; ?>/about.php" class="nav-link <?php echo ($currentPage == 'about') ? 'active' : ''; ?>">About Us</a></li>
                <li class="nav-item"><a href="<?php echo BASE_URL; ?>/product-catalogues.php" class="nav-link <?php echo ($currentPage == 'product-catalogues') ? 'active' : ''; ?>">Product Catalogues</a></li>
                <li class="nav-item"><a href="<?php echo BASE_URL; ?>/collections.php" class="nav-link <?php echo ($currentPage == 'collections') ? 'active' : ''; ?>">Collections</a></li>
                <li class="nav-item"><a href="<?php echo BASE_URL; ?>/sintered-stone.php" class="nav-link <?php echo ($currentPage == 'sintered-stone') ? 'active' : ''; ?>">Sintered Stone</a></li>
                <li class="nav-item"><a href="<?php echo BASE_URL; ?>/gallery.php" class="nav-link <?php echo ($currentPage == 'gallery') ? 'active' : ''; ?>">Gallery</a></li>
                <li class="nav-item"><a href="<?php echo BASE_URL; ?>/contact.php" class="nav-link <?php echo ($currentPage == 'contact') ? 'active' : ''; ?>">Contact</a></li>
                <li class="nav-item"><a href="<?php echo BASE_URL; ?>/quote.php" class="cta-button" style="display: inline-block; margin-left: 0;">Get a Quote →</a></li>
            </ul>
        </nav>

        <!-- Overlay -->
        <div class="overlay" id="overlay"></div>
    </header>