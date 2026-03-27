<?php
// components/breadcrumbs.php
function renderBreadcrumbs($pages) {
    if (count($pages) <= 1) return;
    ?>
    <nav aria-label="Breadcrumb" class="breadcrumbs">
        <ol itemscope itemtype="https://schema.org/BreadcrumbList">
            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <a href="<?php echo BASE_URL; ?>/index.php" itemprop="item">
                    <span itemprop="name">Home</span>
                </a>
                <meta itemprop="position" content="1">
            </li>
            <?php
            $position = 2;
            foreach ($pages as $page):
                if ($page['url']):
            ?>
            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <a href="<?php echo BASE_URL . '/' . $page['url']; ?>" itemprop="item">
                    <span itemprop="name"><?php echo htmlspecialchars($page['name']); ?></span>
                </a>
                <meta itemprop="position" content="<?php echo $position; ?>">
            </li>
            <?php else: ?>
            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                <span itemprop="name"><?php echo htmlspecialchars($page['name']); ?></span>
                <meta itemprop="position" content="<?php echo $position; ?>">
            </li>
            <?php endif; $position++; endforeach; ?>
        </ol>
    </nav>
    <?php
}
?>