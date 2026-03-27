<?php
// seo-functions.php - Include this file in all your pages

class SEO {
    private $title;
    private $description;
    private $keywords;
    private $canonical;
    private $ogImage;
    private $ogType = 'website';
    private $robots = 'index, follow';
    private $author = 'Moreroom Stone Nigeria';
    
    // Default values for different pages
    private $defaults = [
        'home' => [
            'title' => 'Premium Sintered Stone Surfaces in Nigeria | Moreroom Stone',
            'description' => 'Moreroom Stone Nigeria offers premium sintered stone surfaces for kitchens, bathrooms, and commercial spaces. Visit our showroom in Lagos for quality stone solutions.',
            'keywords' => 'sintered stone, stone surfaces, kitchen countertops, stone slabs Nigeria, Moreroom Stone'
        ],
        'about' => [
            'title' => 'About Moreroom Stone | Premium Stone Suppliers in Nigeria',
            'description' => 'Learn about Moreroom Stone Nigeria - your trusted partner for high-quality sintered stone surfaces. Discover our commitment to excellence and customer satisfaction.',
            'keywords' => 'about Moreroom Stone, stone suppliers Nigeria, sintered stone company'
        ],
        'contact' => [
            'title' => 'Contact Moreroom Stone | Visit Our Showroom in Lagos Nigeria',
            'description' => 'Get in touch with Moreroom Stone Nigeria. Visit our showroom, call us, or send a message for expert assistance with your stone surface needs.',
            'keywords' => 'contact Moreroom Stone, stone showroom Lagos, stone suppliers Nigeria'
        ],
        'product categories' => [
            'title' => 'Premium Stone Products | Sintered Stone Surfaces Nigeria',
            'description' => 'Explore our wide range of premium sintered stone surfaces for countertops, flooring, and wall cladding. Quality stones for residential and commercial use.',
            'keywords' => 'stone products Nigeria, sintered stone slabs, countertops Nigeria'
        ]
    ];
    
    public function __construct($page = 'home') {
        $this->setDefaults($page);
    }
    
    public function setDefaults($page) {
        if (isset($this->defaults[$page])) {
            $this->title = $this->defaults[$page]['title'];
            $this->description = $this->defaults[$page]['description'];
            $this->keywords = $this->defaults[$page]['keywords'];
        }
    }

    public function getDescription() {
        return $this->description;
    }
    
    public function setTitle($title) {
        $this->title = $title . ' | Moreroom Stone Nigeria';
        return $this;
    }
    
    public function setDescription($description) {
        $this->description = substr($description, 0, 160); // Limit to 160 chars
        return $this;
    }
    
    public function setKeywords($keywords) {
        $this->keywords = $keywords;
        return $this;
    }
    
    public function setCanonical($url) {
        $this->canonical = $url;
        return $this;
    }
    
    public function setOgImage($imageUrl) {
        $this->ogImage = $imageUrl;
        return $this;
    }
    
    public function setRobots($robots) {
        $this->robots = $robots;
        return $this;
    }
    
    public function render() {
        $output = '';
        
        // Basic Meta Tags
        $output .= "<title>" . htmlspecialchars($this->title) . "</title>\n";
        $output .= "<meta name='description' content='" . htmlspecialchars($this->description) . "'>\n";
        $output .= "<meta name='keywords' content='" . htmlspecialchars($this->keywords) . "'>\n";
        $output .= "<meta name='author' content='" . htmlspecialchars($this->author) . "'>\n";
        $output .= "<meta name='robots' content='" . htmlspecialchars($this->robots) . "'>\n";
        
        // Canonical URL
        if ($this->canonical) {
            $output .= "<link rel='canonical' href='" . htmlspecialchars($this->canonical) . "'>\n";
        }
        
        // Open Graph Tags (for social media)
        $output .= "<meta property='og:title' content='" . htmlspecialchars($this->title) . "'>\n";
        $output .= "<meta property='og:description' content='" . htmlspecialchars($this->description) . "'>\n";
        $output .= "<meta property='og:type' content='" . htmlspecialchars($this->ogType) . "'>\n";
        $output .= "<meta property='og:site_name' content='Moreroom Stone Nigeria'>\n";
        
        if ($this->ogImage) {
            $output .= "<meta property='og:image' content='" . htmlspecialchars($this->ogImage) . "'>\n";
        }
        
        // Twitter Cards
        $output .= "<meta name='twitter:card' content='summary_large_image'>\n";
        $output .= "<meta name='twitter:title' content='" . htmlspecialchars($this->title) . "'>\n";
        $output .= "<meta name='twitter:description' content='" . htmlspecialchars($this->description) . "'>\n";
        
        if ($this->ogImage) {
            $output .= "<meta name='twitter:image' content='" . htmlspecialchars($this->ogImage) . "'>\n";
        }
        
        return $output;
    }
}

// Helper function to get current URL
function getCurrentUrl() {
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
    $host = $_SERVER['HTTP_HOST'];
    $uri = $_SERVER['REQUEST_URI'];
    return $protocol . $host . $uri;
}

// Helper function to get page name from URL
function getPageName() {
    $path = trim($_SERVER['REQUEST_URI'], '/');
    $page = explode('/', $path)[0];
    return $page ?: 'home';
}

// Initialize SEO
$seo = new SEO(getPageName());
$seo->setCanonical(getCurrentUrl());
?>