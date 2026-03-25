<?php
$currentPage = basename($_SERVER['PHP_SELF']);
?>
<?php
// layouts/header.php
require_once dirname(__DIR__) . '/config.php';
?>
<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>

    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Home | Moreroom Stone Nigeria</title>
    <meta property="og:title" content="Home | Moreroom Stone Nigeria" />
    <meta property="og:url" content="<?php echo BASE_URL; ?>" />
    <meta property="og:site_name" content="Moreroom Stone Nigeria" />
    <meta property="og:type" content="website" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Home | Moreroom Stone Nigeria" />
    <!-- Initial CSS -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/main.css" media="all" />
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/animate.css" media="all" />
    <link rel="icon" sizes="192x192" href="<?php echo BASE_URL; ?>/assets/images/favicon.png" type="image/x-icon" />
    <link rel="shortcut icon" href="<?php echo BASE_URL; ?>/assets/images/favicon.png" type="image/x-icon" />
    <link rel="apple-touch-icon" href="<?php echo BASE_URL; ?>/assets/images/favicon.png" type="image/x-icon" />
</head>

<body class='responsive'>
    <header class="modern-header" id="mainHeader">
        <div class="header-container">
            <!-- Logo -->
            <div class="logo">
                <a href="<?php echo BASE_URL; ?>/index.php">
                    <img src="<?php echo BASE_URL; ?>/assets/images/moreroomstoneng-logo.png" alt="Moreroomstonenigeria Logo" class="logo-image">
                </a>
            </div>

            <!-- Desktop Navigation -->
            <nav class="desktop-nav">
                <ul class="nav-menu">
                    <li class="nav-item"><a href="<?php echo BASE_URL; ?>/index.php" class="nav-link <?php echo ($currentPage == 'index.php') ? 'active' : ''; ?>">Home</a></li>
                    <li class="nav-item"><a href="<?php echo BASE_URL; ?>/about.php" class="nav-link <?php echo ($currentPage == 'about.php') ? 'active' : ''; ?>">About Us</a></li>
                    <li class="nav-item"><a href="<?php echo BASE_URL; ?>/product-catalogues.php" class="nav-link <?php echo ($currentPage == 'product-catalogues.php') ? 'active' : ''; ?>">Product Catalogues</a></li>
                    <li class="nav-item"><a href="<?php echo BASE_URL; ?>/collections.php" class="nav-link <?php echo ($currentPage == 'collections.php') ? 'active' : ''; ?>">Collections</a></li>
                    <li class="nav-item"><a href="<?php echo BASE_URL; ?>/sintered-stone.php" class="nav-link <?php echo ($currentPage == 'sintered-stone.php') ? 'active' : ''; ?>">Sintered Stone</a></li>
                    <li class="nav-item"><a href="<?php echo BASE_URL; ?>/gallery.php" class="nav-link <?php echo ($currentPage == 'gallery.php') ? 'active' : ''; ?>">Gallery</a></li>
                    <li class="nav-item"><a href="<?php echo BASE_URL; ?>/contact.php" class="nav-link <?php echo ($currentPage == 'contact.php') ? 'active' : ''; ?>">Contact</a></li>
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
        <nav class="mobile-nav" id="mobileNav">
            <ul class="nav-menu">
                <!-- Logo in mobile menu -->
                <li class="nav-item mobile-logo-item">
                    <a href="<?php echo BASE_URL; ?>/index.php" class="nav-link active">
                        <img src="<?php echo BASE_URL; ?>/assets/images/moreroomstoneng-logo.png" alt="Moreroomstonenigeria" style="height: 100px; width: auto;">
                    </a>
                </li>
                
                <li class="nav-item"><a href="<?php echo BASE_URL; ?>/index.php" class="nav-link <?php echo ($currentPage == 'index.php') ? 'active' : ''; ?>">Home</a></li>
                <li class="nav-item"><a href="<?php echo BASE_URL; ?>/about.php" class="nav-link <?php echo ($currentPage == 'about.php') ? 'active' : ''; ?>">About Us</a></li>
                <li class="nav-item"><a href="<?php echo BASE_URL; ?>/product-catalogues.php" class="nav-link <?php echo ($currentPage == 'product-catalogues.php') ? 'active' : ''; ?>">Products</a></li>
                <li class="nav-item"><a href="<?php echo BASE_URL; ?>/collections.php" class="nav-link <?php echo ($currentPage == 'collections.php') ? 'active' : ''; ?>">Collections</a></li>
                <li class="nav-item"><a href="<?php echo BASE_URL; ?>/sintered-stone.php" class="nav-link <?php echo ($currentPage == 'sintered-stone.php') ? 'active' : ''; ?>">Sintered Stone</a></li>
                <li class="nav-item"><a href="<?php echo BASE_URL; ?>/gallery.php" class="nav-link <?php echo ($currentPage == 'gallery.php') ? 'active' : ''; ?>">Gallery</a></li>
                <li class="nav-item"><a href="<?php echo BASE_URL; ?>/contact.php" class="nav-link <?php echo ($currentPage == 'contact.php') ? 'active' : ''; ?>">Contact</a></li>
                <li class="nav-item"><a href="<?php echo BASE_URL; ?>/quote.php" class="cta-button" style="display: inline-block; margin-left: 0;">Get a Quote →</a></li>
            </ul>
        </nav>

        <!-- Overlay -->
        <div class="overlay" id="overlay"></div>
    </header>