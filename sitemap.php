<?php
// sitemap.php - Dynamic sitemap generator
header('Content-Type: application/xml; charset=utf-8');

// Disable error reporting for sitemap
error_reporting(0);

// Get all pages dynamically
$pages = [
    ['url' => '', 'priority' => '1.0', 'changefreq' => 'daily', 'lastmod' => date('Y-m-d')],
    ['url' => 'index.php', 'priority' => '1.0', 'changefreq' => 'daily', 'lastmod' => date('Y-m-d')],
    ['url' => 'about.php', 'priority' => '0.8', 'changefreq' => 'monthly', 'lastmod' => date('Y-m-d')],
    ['url' => 'contact.php', 'priority' => '0.9', 'changefreq' => 'monthly', 'lastmod' => date('Y-m-d')],
    ['url' => 'product-catalogues.php', 'priority' => '0.9', 'changefreq' => 'weekly', 'lastmod' => date('Y-m-d')],
    ['url' => 'collections.php', 'priority' => '0.8', 'changefreq' => 'weekly', 'lastmod' => date('Y-m-d')],
    ['url' => 'sintered-stone.php', 'priority' => '0.8', 'changefreq' => 'weekly', 'lastmod' => date('Y-m-d')],
    ['url' => 'gallery.php', 'priority' => '0.7', 'changefreq' => 'weekly', 'lastmod' => date('Y-m-d')],
    ['url' => 'quote.php', 'priority' => '0.7', 'changefreq' => 'weekly', 'lastmod' => date('Y-m-d')],
];

// Get file modification dates dynamically
foreach ($pages as $key => $page) {
    $filePath = $_SERVER['DOCUMENT_ROOT'] . '/' . $page['url'];
    if (file_exists($filePath)) {
        $pages[$key]['lastmod'] = date('Y-m-d', filemtime($filePath));
    }
}

// Output XML
echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"
        xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
        http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
    
    <?php foreach ($pages as $page): ?>
    <url>
        <loc>https://moreroomstonenigeria.ng/<?php echo $page['url']; ?></loc>
        <lastmod><?php echo $page['lastmod']; ?></lastmod>
        <changefreq><?php echo $page['changefreq']; ?></changefreq>
        <priority><?php echo $page['priority']; ?></priority>
    </url>
    <?php endforeach; ?>
</urlset>