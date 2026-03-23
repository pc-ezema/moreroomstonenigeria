<?php
include 'layouts/header.php';
?>

<!-- Gallery Page - Moreroom Stone Nigeria -->
<main id="gallery-page" class="gallery-page">

    <!-- Standard Hero Section -->
    <section class="page-hero">
        <div class="page-hero-background">
            <img src="<?php echo BASE_URL; ?>/assets/images/the-perfect-blend.jpeg"
                alt="Project Gallery" class="page-hero-image">
            <div class="page-hero-overlay"></div>
        </div>

        <div class="page-hero-content container">
            <div class="page-hero-text animate-fade-up-bounce">
                <span class="section-tag">Inspiration</span>
                <h1 class="page-hero-title">Project Gallery</span></h1>
                <p class="page-hero-subtitle">See our sintered stone surfaces in real homes and commercial spaces</p>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="gallery-filter-section">
        <div class="container">
            <div class="gallery-layout">
                <!-- Categories Sidebar - Left Side -->
                <div class="gallery-sidebar">
                    <div class="categories-header">
                        <h3 class="categories-title">Categories</h3>
                        <span class="categories-line"></span>
                    </div>
                    <ul class="categories-list">
                        <li class="category-item active" data-category="all">
                            <span class="category-icon">🎨</span>
                            <span class="category-name">All Projects</span>
                        </li>
                        <li class="category-item" data-category="bathroom">
                            <span class="category-icon">🛁</span>
                            <span class="category-name">Bathroom</span>
                        </li>
                        <li class="category-item" data-category="kitchen">
                            <span class="category-icon">🍳</span>
                            <span class="category-name">Kitchen</span>
                        </li>
                        <li class="category-item" data-category="living-room">
                            <span class="category-icon">🛋️</span>
                            <span class="category-name">Living Room</span>
                        </li>
                        <li class="category-item" data-category="lobby">
                            <span class="category-icon">🏢</span>
                            <span class="category-name">Lobby</span>
                        </li>
                        <li class="category-item" data-category="wall">
                            <span class="category-icon">🧱</span>
                            <span class="category-name">Wall</span>
                        </li>
                    </ul>
                    <div class="filter-stats">
                        <span class="gallery-count">Showing <span id="visibleCount">21</span> of 21 projects</span>
                    </div>
                </div>

                <!-- Gallery Grid - Right Side -->
                <div class="gallery-main">
                    <div class="gallery-grid">
                        <!-- Bathroom Projects -->
                        <div class="gallery-item" data-category="bathroom">
                            <div class="gallery-image-wrapper">
                                <img src="<?php echo BASE_URL; ?>/assets/images/gallery/bathroom/bathroom1.jpg" alt="Bathroom Project" class="gallery-image">
                                <div class="image-overlay"></div>
                                <div class="category-badge">Bathroom</div>
                            </div>
                        </div>

                        <div class="gallery-item" data-category="bathroom">
                            <div class="gallery-image-wrapper">
                                <img src="<?php echo BASE_URL; ?>/assets/images/gallery/bathroom/Bathroom2-1-1-scaled.jpg" alt="Bathroom Project" class="gallery-image">
                                <div class="image-overlay"></div>
                                <div class="category-badge">Bathroom</div>
                            </div>
                        </div>

                        <div class="gallery-item" data-category="bathroom">
                            <div class="gallery-image-wrapper">
                                <img src="<?php echo BASE_URL; ?>/assets/images/gallery/bathroom/bathroom2.jpg" alt="Bathroom Project" class="gallery-image">
                                <div class="image-overlay"></div>
                                <div class="category-badge">Bathroom</div>
                            </div>
                        </div>

                        <div class="gallery-item" data-category="bathroom">
                            <div class="gallery-image-wrapper">
                                <img src="<?php echo BASE_URL; ?>/assets/images/gallery/bathroom/Bathroom3-1-1.jpg" alt="Bathroom Project" class="gallery-image">
                                <div class="image-overlay"></div>
                                <div class="category-badge">Bathroom</div>
                            </div>
                        </div>

                        <div class="gallery-item" data-category="bathroom">
                            <div class="gallery-image-wrapper">
                                <img src="<?php echo BASE_URL; ?>/assets/images/gallery/bathroom/MN013AP261206-2-scaled.jpg" alt="Bathroom Project" class="gallery-image">
                                <div class="image-overlay"></div>
                                <div class="category-badge">Bathroom</div>
                            </div>
                        </div>

                        <div class="gallery-item" data-category="bathroom">
                            <div class="gallery-image-wrapper">
                                <img src="<?php echo BASE_URL; ?>/assets/images/gallery/bathroom/MN072AP261206-1-e1675793499261.jpg" alt="Bathroom Project" class="gallery-image">
                                <div class="image-overlay"></div>
                                <div class="category-badge">Bathroom</div>
                            </div>
                        </div>

                        <div class="gallery-item" data-category="bathroom">
                            <div class="gallery-image-wrapper">
                                <img src="<?php echo BASE_URL; ?>/assets/images/gallery/bathroom/SD1602-MODI-BLACK-Bath-Wall-scaled.jpg" alt="Bathroom Project" class="gallery-image">
                                <div class="image-overlay"></div>
                                <div class="category-badge">Bathroom</div>
                            </div>
                        </div>

                        <div class="gallery-item" data-category="bathroom">
                            <div class="gallery-image-wrapper">
                                <img src="<?php echo BASE_URL; ?>/assets/images/gallery/bathroom/SM-044-Statuario-White-Bath-2.jpg" alt="Bathroom Project" class="gallery-image">
                                <div class="image-overlay"></div>
                                <div class="category-badge">Bathroom</div>
                            </div>
                        </div>

                        <!-- Kitchen Projects -->
                        <div class="gallery-item" data-category="kitchen">
                            <div class="gallery-image-wrapper">
                                <img src="<?php echo BASE_URL; ?>/assets/images/gallery/kitchen/gallery1.jpg" alt="Kitchen Project" class="gallery-image">
                                <div class="image-overlay"></div>
                                <div class="category-badge">Kitchen</div>
                            </div>
                        </div>

                        <div class="gallery-item" data-category="kitchen">
                            <div class="gallery-image-wrapper">
                                <img src="<?php echo BASE_URL; ?>/assets/images/gallery/kitchen/gallery2.jpg" alt="Kitchen Project" class="gallery-image">
                                <div class="image-overlay"></div>
                                <div class="category-badge">Kitchen</div>
                            </div>
                        </div>

                        <div class="gallery-item" data-category="kitchen">
                            <div class="gallery-image-wrapper">
                                <img src="<?php echo BASE_URL; ?>/assets/images/gallery/kitchen/gallery3.jpg" alt="Kitchen Project" class="gallery-image">
                                <div class="image-overlay"></div>
                                <div class="category-badge">Kitchen</div>
                            </div>
                        </div>

                        <div class="gallery-item" data-category="kitchen">
                            <div class="gallery-image-wrapper">
                                <img src="<?php echo BASE_URL; ?>/assets/images/gallery/kitchen/gallery4.jpg" alt="Kitchen Project" class="gallery-image">
                                <div class="image-overlay"></div>
                                <div class="category-badge">Kitchen</div>
                            </div>
                        </div>

                        <div class="gallery-item" data-category="kitchen">
                            <div class="gallery-image-wrapper">
                                <img src="<?php echo BASE_URL; ?>/assets/images/gallery/kitchen/gallery5.jpg" alt="Kitchen Project" class="gallery-image">
                                <div class="image-overlay"></div>
                                <div class="category-badge">Kitchen</div>
                            </div>
                        </div>

                        <div class="gallery-item" data-category="kitchen">
                            <div class="gallery-image-wrapper">
                                <img src="<?php echo BASE_URL; ?>/assets/images/gallery/kitchen/gallery6.jpg" alt="Kitchen Project" class="gallery-image">
                                <div class="image-overlay"></div>
                                <div class="category-badge">Kitchen</div>
                            </div>
                        </div>

                        <div class="gallery-item" data-category="kitchen">
                            <div class="gallery-image-wrapper">
                                <img src="<?php echo BASE_URL; ?>/assets/images/gallery/kitchen/gallery7.jpg" alt="Kitchen Project" class="gallery-image">
                                <div class="image-overlay"></div>
                                <div class="category-badge">Kitchen</div>
                            </div>
                        </div>

                        <div class="gallery-item" data-category="kitchen">
                            <div class="gallery-image-wrapper">
                                <img src="<?php echo BASE_URL; ?>/assets/images/gallery/kitchen/gallery8.jpg" alt="Kitchen Project" class="gallery-image">
                                <div class="image-overlay"></div>
                                <div class="category-badge">Kitchen</div>
                            </div>
                        </div>

                        <div class="gallery-item" data-category="kitchen">
                            <div class="gallery-image-wrapper">
                                <img src="<?php echo BASE_URL; ?>/assets/images/gallery/kitchen/gallery9.jpg" alt="Kitchen Project" class="gallery-image">
                                <div class="image-overlay"></div>
                                <div class="category-badge">Kitchen</div>
                            </div>
                        </div>

                        <div class="gallery-item" data-category="kitchen">
                            <div class="gallery-image-wrapper">
                                <img src="<?php echo BASE_URL; ?>/assets/images/gallery/kitchen/gallery10.jpg" alt="Kitchen Project" class="gallery-image">
                                <div class="image-overlay"></div>
                                <div class="category-badge">Kitchen</div>
                            </div>
                        </div>

                        <div class="gallery-item" data-category="kitchen">
                            <div class="gallery-image-wrapper">
                                <img src="<?php echo BASE_URL; ?>/assets/images/gallery/kitchen/gallery11.jpg" alt="Kitchen Project" class="gallery-image">
                                <div class="image-overlay"></div>
                                <div class="category-badge">Kitchen</div>
                            </div>
                        </div>

                        <div class="gallery-item" data-category="kitchen">
                            <div class="gallery-image-wrapper">
                                <img src="<?php echo BASE_URL; ?>/assets/images/gallery/kitchen/gallery12.jpg" alt="Kitchen Project" class="gallery-image">
                                <div class="image-overlay"></div>
                                <div class="category-badge">Kitchen</div>
                            </div>
                        </div>

                        <div class="gallery-item" data-category="kitchen">
                            <div class="gallery-image-wrapper">
                                <img src="<?php echo BASE_URL; ?>/assets/images/gallery/kitchen/gallery13.jpg" alt="Kitchen Project" class="gallery-image">
                                <div class="image-overlay"></div>
                                <div class="category-badge">Kitchen</div>
                            </div>
                        </div>

                        <!-- Living Room Projects -->
                        <div class="gallery-item" data-category="living-room">
                            <div class="gallery-image-wrapper">
                                <img src="<?php echo BASE_URL; ?>/assets/images/gallery/living-area/gallery1.jpg" alt="Living Room Project" class="gallery-image">
                                <div class="image-overlay"></div>
                                <div class="category-badge">Living Room</div>
                            </div>
                        </div>

                        <div class="gallery-item" data-category="living-room">
                            <div class="gallery-image-wrapper">
                                <img src="<?php echo BASE_URL; ?>/assets/images/gallery/living-area/gallery2.jpg" alt="Living Room Project" class="gallery-image">
                                <div class="image-overlay"></div>
                                <div class="category-badge">Living Room</div>
                            </div>
                        </div>

                        <div class="gallery-item" data-category="living-room">
                            <div class="gallery-image-wrapper">
                                <img src="<?php echo BASE_URL; ?>/assets/images/gallery/living-area/gallery3.jpg" alt="Living Room Project" class="gallery-image">
                                <div class="image-overlay"></div>
                                <div class="category-badge">Living Room</div>
                            </div>
                        </div>

                        <div class="gallery-item" data-category="living-room">
                            <div class="gallery-image-wrapper">
                                <img src="<?php echo BASE_URL; ?>/assets/images/gallery/living-area/gallery4.jpg" alt="Living Room Project" class="gallery-image">
                                <div class="image-overlay"></div>
                                <div class="category-badge">Living Room</div>
                            </div>
                        </div>

                        <div class="gallery-item" data-category="living-room">
                            <div class="gallery-image-wrapper">
                                <img src="<?php echo BASE_URL; ?>/assets/images/gallery/living-area/gallery5.jpg" alt="Living Room Project" class="gallery-image">
                                <div class="image-overlay"></div>
                                <div class="category-badge">Living Room</div>
                            </div>
                        </div>

                        <div class="gallery-item" data-category="living-room">
                            <div class="gallery-image-wrapper">
                                <img src="<?php echo BASE_URL; ?>/assets/images/gallery/living-area/gallery6.jpg" alt="Living Room Project" class="gallery-image">
                                <div class="image-overlay"></div>
                                <div class="category-badge">Living Room</div>
                            </div>
                        </div>

                        <div class="gallery-item" data-category="living-room">
                            <div class="gallery-image-wrapper">
                                <img src="<?php echo BASE_URL; ?>/assets/images/gallery/living-area/gallery7.jpg" alt="Living Room Project" class="gallery-image">
                                <div class="image-overlay"></div>
                                <div class="category-badge">Living Room</div>
                            </div>
                        </div>

                        <div class="gallery-item" data-category="living-room">
                            <div class="gallery-image-wrapper">
                                <img src="<?php echo BASE_URL; ?>/assets/images/gallery/living-area/gallery8.jpg" alt="Living Room Project" class="gallery-image">
                                <div class="image-overlay"></div>
                                <div class="category-badge">Living Room</div>
                            </div>
                        </div>

                        <div class="gallery-item" data-category="living-room">
                            <div class="gallery-image-wrapper">
                                <img src="<?php echo BASE_URL; ?>/assets/images/gallery/living-area/gallery9.jpg" alt="Living Room Project" class="gallery-image">
                                <div class="image-overlay"></div>
                                <div class="category-badge">Living Room</div>
                            </div>
                        </div>

                        <div class="gallery-item" data-category="living-room">
                            <div class="gallery-image-wrapper">
                                <img src="<?php echo BASE_URL; ?>/assets/images/gallery/living-area/gallery10.jpg" alt="Living Room Project" class="gallery-image">
                                <div class="image-overlay"></div>
                                <div class="category-badge">Living Room</div>
                            </div>
                        </div>

                        <!-- Lobby Projects -->
                        <div class="gallery-item" data-category="lobby">
                            <div class="gallery-image-wrapper">
                                <img src="<?php echo BASE_URL; ?>/assets/images/gallery/lobby/gallery1.jpg" alt="Lobby Project" class="gallery-image">
                                <div class="image-overlay"></div>
                                <div class="category-badge">Lobby</div>
                            </div>
                        </div>

                        <div class="gallery-item" data-category="lobby">
                            <div class="gallery-image-wrapper">
                                <img src="<?php echo BASE_URL; ?>/assets/images/gallery/lobby/gallery2.jpg" alt="Lobby Project" class="gallery-image">
                                <div class="image-overlay"></div>
                                <div class="category-badge">Lobby</div>
                            </div>
                        </div>

                        <div class="gallery-item" data-category="lobby">
                            <div class="gallery-image-wrapper">
                                <img src="<?php echo BASE_URL; ?>/assets/images/gallery/lobby/gallery3.jpeg" alt="Lobby Project" class="gallery-image">
                                <div class="image-overlay"></div>
                                <div class="category-badge">Lobby</div>
                            </div>
                        </div>

                        <div class="gallery-item" data-category="lobby">
                            <div class="gallery-image-wrapper">
                                <img src="<?php echo BASE_URL; ?>/assets/images/gallery/lobby/gallery4.jpg" alt="Lobby Project" class="gallery-image">
                                <div class="image-overlay"></div>
                                <div class="category-badge">Lobby</div>
                            </div>
                        </div>

                        <div class="gallery-item" data-category="lobby">
                            <div class="gallery-image-wrapper">
                                <img src="<?php echo BASE_URL; ?>/assets/images/gallery/lobby/gallery5.jpg" alt="Lobby Project" class="gallery-image">
                                <div class="image-overlay"></div>
                                <div class="category-badge">Lobby</div>
                            </div>
                        </div>

                        <div class="gallery-item" data-category="lobby">
                            <div class="gallery-image-wrapper">
                                <img src="<?php echo BASE_URL; ?>/assets/images/gallery/lobby/gallery6.jpg" alt="Lobby Project" class="gallery-image">
                                <div class="image-overlay"></div>
                                <div class="category-badge">Lobby</div>
                            </div>
                        </div>

                        <div class="gallery-item" data-category="lobby">
                            <div class="gallery-image-wrapper">
                                <img src="<?php echo BASE_URL; ?>/assets/images/gallery/lobby/gallery7.jpg" alt="Lobby Project" class="gallery-image">
                                <div class="image-overlay"></div>
                                <div class="category-badge">Lobby</div>
                            </div>
                        </div>

                        <div class="gallery-item" data-category="lobby">
                            <div class="gallery-image-wrapper">
                                <img src="<?php echo BASE_URL; ?>/assets/images/gallery/lobby/gallery8.jpg" alt="Lobby Project" class="gallery-image">
                                <div class="image-overlay"></div>
                                <div class="category-badge">Lobby</div>
                            </div>
                        </div>

                        <div class="gallery-item" data-category="lobby">
                            <div class="gallery-image-wrapper">
                                <img src="<?php echo BASE_URL; ?>/assets/images/gallery/lobby/gallery9.jpg" alt="Lobby Project" class="gallery-image">
                                <div class="image-overlay"></div>
                                <div class="category-badge">Lobby</div>
                            </div>
                        </div>

                        <div class="gallery-item" data-category="lobby">
                            <div class="gallery-image-wrapper">
                                <img src="<?php echo BASE_URL; ?>/assets/images/gallery/lobby/gallery10.jpg" alt="Lobby Project" class="gallery-image">
                                <div class="image-overlay"></div>
                                <div class="category-badge">Lobby</div>
                            </div>
                        </div>

                        <div class="gallery-item" data-category="lobby">
                            <div class="gallery-image-wrapper">
                                <img src="<?php echo BASE_URL; ?>/assets/images/gallery/lobby/gallery11.jpg" alt="Lobby Project" class="gallery-image">
                                <div class="image-overlay"></div>
                                <div class="category-badge">Lobby</div>
                            </div>
                        </div>

                        <div class="gallery-item" data-category="lobby">
                            <div class="gallery-image-wrapper">
                                <img src="<?php echo BASE_URL; ?>/assets/images/gallery/lobby/gallery12.jpg" alt="Lobby Project" class="gallery-image">
                                <div class="image-overlay"></div>
                                <div class="category-badge">Lobby</div>
                            </div>
                        </div>

                        <!-- Wall Projects -->
                        <div class="gallery-item" data-category="wall">
                            <div class="gallery-image-wrapper">
                                <img src="<?php echo BASE_URL; ?>/assets/images/gallery/wall/Bathroom2-1-1-scaled.jpg" alt="Wall Project" class="gallery-image">
                                <div class="image-overlay"></div>
                                <div class="category-badge">Wall</div>
                            </div>
                        </div>

                        <div class="gallery-item" data-category="wall">
                            <div class="gallery-image-wrapper">
                                <img src="<?php echo BASE_URL; ?>/assets/images/gallery/wall/Livingroom1-1-scaled-e1675795274742.jpg" alt="Wall Project" class="gallery-image">
                                <div class="image-overlay"></div>
                                <div class="category-badge">Wall</div>
                            </div>
                        </div>

                        <div class="gallery-item" data-category="wall">
                            <div class="gallery-image-wrapper">
                                <img src="<?php echo BASE_URL; ?>/assets/images/gallery/wall/Livingroom2-1-1-scaled.jpg" alt="Wall Project" class="gallery-image">
                                <div class="image-overlay"></div>
                                <div class="category-badge">Wall</div>
                            </div>
                        </div>

                        <div class="gallery-item" data-category="wall">
                            <div class="gallery-image-wrapper">
                                <img src="<?php echo BASE_URL; ?>/assets/images/gallery/wall/Livingroom3-1-scaled-e1675795355397.jpg" alt="Wall Project" class="gallery-image">
                                <div class="image-overlay"></div>
                                <div class="category-badge">Wall</div>
                            </div>
                        </div>

                        <div class="gallery-item" data-category="wall">
                            <div class="gallery-image-wrapper">
                                <img src="<?php echo BASE_URL; ?>/assets/images/gallery/wall/MN012AP26120-1-scaled.jpg" alt="Wall Project" class="gallery-image">
                                <div class="image-overlay"></div>
                                <div class="category-badge">Wall</div>
                            </div>
                        </div>

                        <div class="gallery-item" data-category="wall">
                            <div class="gallery-image-wrapper">
                                <img src="<?php echo BASE_URL; ?>/assets/images/gallery/wall/MN012AP26120-scaled.jpg" alt="Wall Project" class="gallery-image">
                                <div class="image-overlay"></div>
                                <div class="category-badge">Wall</div>
                            </div>
                        </div>

                        <div class="gallery-item" data-category="wall">
                            <div class="gallery-image-wrapper">
                                <img src="<?php echo BASE_URL; ?>/assets/images/gallery/wall/MN022AP261206-2-scaled.jpg" alt="Wall Project" class="gallery-image">
                                <div class="image-overlay"></div>
                                <div class="category-badge">Wall</div>
                            </div>
                        </div>

                        <div class="gallery-item" data-category="wall">
                            <div class="gallery-image-wrapper">
                                <img src="<?php echo BASE_URL; ?>/assets/images/gallery/wall/MN043AP261206-scaled.jpg" alt="Wall Project" class="gallery-image">
                                <div class="image-overlay"></div>
                                <div class="category-badge">Wall</div>
                            </div>
                        </div>

                        <div class="gallery-item" data-category="wall">
                            <div class="gallery-image-wrapper">
                                <img src="<?php echo BASE_URL; ?>/assets/images/gallery/wall/SD-058-GILDED-YEARS-Wall-scaled.jpg" alt="Wall Project" class="gallery-image">
                                <div class="image-overlay"></div>
                                <div class="category-badge">Wall</div>
                            </div>
                        </div>

                        <div class="gallery-item" data-category="wall">
                            <div class="gallery-image-wrapper">
                                <img src="<?php echo BASE_URL; ?>/assets/images/gallery/wall/WechatIMG4223-1.png" alt="Wall Project" class="gallery-image">
                                <div class="image-overlay"></div>
                                <div class="category-badge">Wall</div>
                            </div>
                        </div>

                        <div class="gallery-item" data-category="wall">
                            <div class="gallery-image-wrapper">
                                <img src="<?php echo BASE_URL; ?>/assets/images/gallery/wall/微信图片_20230213102221.jpg" alt="Wall Project" class="gallery-image">
                                <div class="image-overlay"></div>
                                <div class="category-badge">Wall</div>
                            </div>
                        </div>
                    </div>

                    <div class="gallery-load-more">
                        <button class="gallery-load-more-btn">Load More Gallery</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Lightbox -->
    <div class="lightbox" id="lightbox">
        <div class="lightbox-content">
            <span class="lightbox-close">&times;</span>
            <img class="lightbox-image" src="">
            <button class="lightbox-prev">❮</button>
            <button class="lightbox-next">❯</button>
        </div>
    </div>
</main>

<?php
include 'layouts/footer.php';
?>