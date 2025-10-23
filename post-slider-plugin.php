<?php
/**
 * Plugin Name: Post Slider
 * Plugin URI: https://yourwebsite.com/post-slider
 * Description: Simple post slider with 3 styles: Card 1, Card 2, and List. Use shortcode [post_slider style="card1"]
 * Version: 1.0.0
 * Author: Your Name
 * Author URI: https://yourwebsite.com
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: post-slider
 * Domain Path: /languages
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Define plugin constants
define('POST_SLIDER_VERSION', '1.0.0');
define('POST_SLIDER_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('POST_SLIDER_PLUGIN_URL', plugin_dir_url(__FILE__));

/**
 * Main Plugin Class
 */
class Post_Slider_Plugin {
    
    /**
     * Constructor
     */
    public function __construct() {
        // Register shortcode
        add_shortcode('post_slider', array($this, 'shortcode_handler'));
        
        // Enqueue styles and scripts
        add_action('wp_enqueue_scripts', array($this, 'enqueue_assets'));
        
        // Add inline styles
        add_action('wp_footer', array($this, 'inline_styles'));
    }
    
    /**
     * Shortcode Handler
     */
    public function shortcode_handler($atts) {
        // Default attributes
        $atts = shortcode_atts(array(
            'category'        => '',
            'posts_per_page'  => 5,
            'style'           => 'card1',  // card1, card2, list
            'title'           => 'Latest Posts',
            'order'           => 'DESC',
            'orderby'         => 'date',
        ), $atts, 'post_slider');
        
        // Query arguments
        $query_args = array(
            'post_type'      => 'post',
            'posts_per_page' => intval($atts['posts_per_page']),
            'post_status'    => 'publish',
            'order'          => $atts['order'],
            'orderby'        => $atts['orderby'],
        );
        
        // Filter by category if specified
        if (!empty($atts['category'])) {
            $query_args['category_name'] = $atts['category'];
        }
        
        // Execute query
        $posts_query = new WP_Query($query_args);
        
        // Start output buffering
        ob_start();
        
        if ($posts_query->have_posts()) {
            // Render based on selected style
            switch ($atts['style']) {
                case 'list':
                    $this->render_list_style($posts_query, $atts['title']);
                    break;
                case 'card2':
                    $this->render_card2_style($posts_query, $atts['title']);
                    break;
                case 'card1':
                default:
                    $this->render_card1_style($posts_query, $atts['title']);
                    break;
            }
        } else {
            echo '<p>No posts found.</p>';
        }
        
        wp_reset_postdata();
        
        return ob_get_clean();
    }
    
    /**
     * STYLE: CARD 1 (Full Width with Image)
     */
    private function render_card1_style($posts_query, $title) {
        $posts = $posts_query->posts;
        $unique_id = 'card1_' . uniqid();
        ?>
        
        <div class="ps-slider-container ps-card1" id="<?php echo esc_attr($unique_id); ?>">
            <?php if ($title) : ?>
                <h2 class="ps-title"><?php echo esc_html($title); ?></h2>
            <?php endif; ?>
            
            <div class="ps-slider">
                <div class="ps-slider-wrapper">
                    <?php foreach ($posts as $post) : 
                        $thumbnail = get_the_post_thumbnail_url($post->ID, 'large');
                        if (!$thumbnail) {
                            $thumbnail = 'https://via.placeholder.com/600x400?text=No+Image';
                        }
                        $categories = get_the_category($post->ID);
                        $excerpt = wp_trim_words(get_the_excerpt($post->ID), 25, '...');
                        $author = get_the_author_meta('display_name', $post->post_author);
                        $date = get_the_date('j F Y', $post->ID);
                    ?>
                        <div class="ps-card">
                            <div class="ps-card-image" style="background-image:url('<?php echo esc_url($thumbnail); ?>')"></div>
                            <div class="ps-card-content">
                                <div>
                                    <?php if ($categories) : ?>
                                        <?php foreach (array_slice($categories, 0, 2) as $cat) : ?>
                                            <span class="ps-tag"><?php echo esc_html($cat->name); ?></span>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                    <div class="ps-card-title">
                                        <a href="<?php echo get_permalink($post->ID); ?>">
                                            <?php echo esc_html($post->post_title); ?>
                                        </a>
                                    </div>
                                    <div class="ps-card-meta">
                                        <?php echo esc_html(human_time_diff(get_the_time('U', $post->ID), current_time('timestamp'))); ?> ago
                                    </div>
                                    <div class="ps-card-description">
                                        <?php echo esc_html($excerpt); ?>
                                    </div>
                                </div>
                                <div class="ps-card-author">
                                    <div class="ps-author-avatar">
                                        <?php echo esc_html(substr($author, 0, 1)); ?>
                                    </div>
                                    <div class="ps-author-info">
                                        <div class="ps-author-name"><?php echo esc_html($author); ?></div>
                                        <div class="ps-author-date"><?php echo esc_html($date); ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            
            <div class="ps-slider-controls">
                <button class="ps-slider-btn ps-prev" onclick="psPrev_<?php echo esc_js($unique_id); ?>()">‹</button>
                <button class="ps-slider-btn ps-next" onclick="psNext_<?php echo esc_js($unique_id); ?>()">›</button>
            </div>
            
            <div class="ps-slider-dots" id="dots_<?php echo esc_attr($unique_id); ?>"></div>
        </div>
        
        <script>
        (function() {
            var container = document.getElementById('<?php echo esc_js($unique_id); ?>');
            var currentSlide = 0;
            var slides = container.querySelectorAll('.ps-card');
            var totalSlides = slides.length;
            var wrapper = container.querySelector('.ps-slider-wrapper');
            var dotsContainer = document.getElementById('dots_<?php echo esc_js($unique_id); ?>');
            
            // Create dots
            for (var i = 0; i < totalSlides; i++) {
                var dot = document.createElement('div');
                dot.className = 'ps-dot';
                if (i === 0) dot.classList.add('active');
                dot.setAttribute('data-index', i);
                dot.onclick = function() {
                    currentSlide = parseInt(this.getAttribute('data-index'));
                    updateSlider();
                };
                dotsContainer.appendChild(dot);
            }
            
            function updateSlider() {
                wrapper.style.transform = 'translateX(-' + (currentSlide * 100) + '%)';
                var dots = container.querySelectorAll('.ps-dot');
                dots.forEach(function(dot, index) {
                    dot.classList.toggle('active', index === currentSlide);
                });
            }
            
            window['psNext_<?php echo esc_js($unique_id); ?>'] = function() {
                currentSlide = (currentSlide + 1) % totalSlides;
                updateSlider();
            };
            
            window['psPrev_<?php echo esc_js($unique_id); ?>'] = function() {
                currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
                updateSlider();
            };
            
            // Auto slide
            setInterval(function() {
                window['psNext_<?php echo esc_js($unique_id); ?>']();
            }, 5000);
            
            updateSlider();
        })();
        </script>
        <?php
    }
    
    /**
     * STYLE: CARD 2 (3 Cards Horizontal)
     */
    private function render_card2_style($posts_query, $title) {
        $posts = $posts_query->posts;
        $unique_id = 'card2_' . uniqid();
        ?>
        
        <div class="ps-slider-container ps-card2" id="<?php echo esc_attr($unique_id); ?>">
            <?php if ($title) : ?>
                <h2 class="ps-title"><?php echo esc_html($title); ?></h2>
            <?php endif; ?>
            
            <div class="ps-slider">
                <div class="ps-slider-wrapper">
                    <?php foreach ($posts as $post) : 
                        $categories = get_the_category($post->ID);
                        $excerpt = wp_trim_words(get_the_excerpt($post->ID), 20, '...');
                        $author = get_the_author_meta('display_name', $post->post_author);
                        $date = get_the_date('j M Y', $post->ID);
                    ?>
                        <div class="ps-card">
                            <div>
                                <?php if ($categories) : ?>
                                    <?php foreach (array_slice($categories, 0, 2) as $cat) : ?>
                                        <span class="ps-tag"><?php echo esc_html($cat->name); ?></span>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                            <div class="ps-card-title">
                                <a href="<?php echo get_permalink($post->ID); ?>">
                                    <?php echo esc_html($post->post_title); ?>
                                </a>
                            </div>
                            <div class="ps-card-meta">
                                <?php echo esc_html(human_time_diff(get_the_time('U', $post->ID), current_time('timestamp'))); ?> ago • <?php echo esc_html($date); ?>
                            </div>
                            <div class="ps-card-description">
                                <?php echo esc_html($excerpt); ?>
                            </div>
                            <div class="ps-card-author">
                                <div class="ps-author-avatar">
                                    <?php echo esc_html(substr($author, 0, 1)); ?>
                                </div>
                                <div class="ps-author-info">
                                    <div class="ps-author-name"><?php echo esc_html($author); ?></div>
                                    <div class="ps-author-date"><?php echo esc_html(get_the_author_meta('description', $post->post_author) ?: 'Author'); ?></div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            
            <div class="ps-slider-controls">
                <button class="ps-slider-btn ps-prev" id="prev_<?php echo esc_attr($unique_id); ?>" onclick="psPrev_<?php echo esc_js($unique_id); ?>()">‹</button>
                <button class="ps-slider-btn ps-next" id="next_<?php echo esc_attr($unique_id); ?>" onclick="psNext_<?php echo esc_js($unique_id); ?>()">›</button>
            </div>
        </div>
        
        <script>
        (function() {
            var container = document.getElementById('<?php echo esc_js($unique_id); ?>');
            var currentIndex = 0;
            var cards = container.querySelectorAll('.ps-card');
            var totalCards = cards.length;
            var cardsToShow = 3;
            var maxIndex = Math.max(0, totalCards - cardsToShow);
            var wrapper = container.querySelector('.ps-slider-wrapper');
            var prevBtn = document.getElementById('prev_<?php echo esc_js($unique_id); ?>');
            var nextBtn = document.getElementById('next_<?php echo esc_js($unique_id); ?>');
            
            function updateSlider() {
                if (cards.length === 0) return;
                var cardWidth = cards[0].offsetWidth;
                var gap = 30;
                var offset = currentIndex * (cardWidth + gap);
                wrapper.style.transform = 'translateX(-' + offset + 'px)';
                prevBtn.disabled = currentIndex === 0;
                nextBtn.disabled = currentIndex >= maxIndex;
            }
            
            window['psNext_<?php echo esc_js($unique_id); ?>'] = function() {
                if (currentIndex < maxIndex) {
                    currentIndex++;
                    updateSlider();
                }
            };
            
            window['psPrev_<?php echo esc_js($unique_id); ?>'] = function() {
                if (currentIndex > 0) {
                    currentIndex--;
                    updateSlider();
                }
            };
            
            window.addEventListener('resize', updateSlider);
            updateSlider();
        })();
        </script>
        <?php
    }
    
    /**
     * STYLE: LIST (Sidebar + Big Image)
     */
    private function render_list_style($posts_query, $title) {
        $posts = $posts_query->posts;
        $unique_id = 'list_' . uniqid();
        ?>
        
        <div class="ps-slider-container ps-list" id="<?php echo esc_attr($unique_id); ?>">
            <div class="ps-list-container">
                <!-- Left Sidebar -->
                <div class="ps-list-sidebar">
                    <h1><?php echo esc_html($title); ?></h1>
                    <ul class="ps-list-items">
                        <?php foreach ($posts as $index => $post) : 
                            $class = $index === 0 ? 'ps-list-item active featured' : 'ps-list-item';
                        ?>
                            <li class="<?php echo esc_attr($class); ?>" data-slide="<?php echo esc_attr($index); ?>">
                                <h3><?php echo esc_html($post->post_title); ?></h3>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                
                <!-- Right Slider -->
                <div class="ps-list-slider">
                    <div class="ps-list-slider-wrapper">
                        <?php foreach ($posts as $index => $post) : 
                            $active_class = $index === 0 ? 'active' : '';
                            $thumbnail = get_the_post_thumbnail_url($post->ID, 'full');
                            if (!$thumbnail) {
                                $thumbnail = 'https://via.placeholder.com/1920x1080?text=No+Image';
                            }
                            $categories = get_the_category($post->ID);
                            $cat_names = array();
                            if ($categories) {
                                foreach ($categories as $cat) {
                                    $cat_names[] = $cat->name;
                                }
                            }
                            $category_text = !empty($cat_names) ? implode(', ', $cat_names) : 'Uncategorized';
                        ?>
                            <div class="ps-list-slide <?php echo esc_attr($active_class); ?>">
                                <img src="<?php echo esc_url($thumbnail); ?>" alt="<?php echo esc_attr($post->post_title); ?>">
                                <div class="ps-list-slide-overlay">
                                    <div class="ps-list-slide-content">
                                        <h2><?php echo esc_html($post->post_title); ?></h2>
                                        <p class="ps-list-category"><?php echo esc_html($category_text); ?></p>
                                        <a href="<?php echo get_permalink($post->ID); ?>" class="ps-list-slide-link">Read More</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    
                    <!-- Navigation -->
                    <button class="ps-list-nav ps-prev" onclick="psListPrev_<?php echo esc_js($unique_id); ?>()">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"/>
                        </svg>
                    </button>
                    <button class="ps-list-nav ps-next" onclick="psListNext_<?php echo esc_js($unique_id); ?>()">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"/>
                        </svg>
                    </button>
                    
                    <!-- Pagination Dots -->
                    <div class="ps-list-pagination">
                        <?php foreach ($posts as $index => $post) : 
                            $dot_class = $index === 0 ? 'ps-list-dot active' : 'ps-list-dot';
                        ?>
                            <button class="<?php echo esc_attr($dot_class); ?>" onclick="psListGoTo_<?php echo esc_js($unique_id); ?>(<?php echo esc_js($index); ?>)"></button>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        
        <script>
        (function() {
            var container = document.getElementById('<?php echo esc_js($unique_id); ?>');
            var currentSlide = 0;
            var slides = container.querySelectorAll('.ps-list-slide');
            var dots = container.querySelectorAll('.ps-list-dot');
            var items = container.querySelectorAll('.ps-list-item');
            var autoSlideInterval;
            
            function showSlide(index) {
                slides.forEach(function(slide) { slide.classList.remove('active'); });
                dots.forEach(function(dot) { dot.classList.remove('active'); });
                items.forEach(function(item) { item.classList.remove('active'); });
                
                if (slides[index]) slides[index].classList.add('active');
                if (dots[index]) dots[index].classList.add('active');
                if (items[index]) items[index].classList.add('active');
            }
            
            window['psListNext_<?php echo esc_js($unique_id); ?>'] = function() {
                currentSlide = (currentSlide + 1) % slides.length;
                showSlide(currentSlide);
                resetAutoSlide();
            };
            
            window['psListPrev_<?php echo esc_js($unique_id); ?>'] = function() {
                currentSlide = (currentSlide - 1 + slides.length) % slides.length;
                showSlide(currentSlide);
                resetAutoSlide();
            };
            
            window['psListGoTo_<?php echo esc_js($unique_id); ?>'] = function(index) {
                currentSlide = index;
                showSlide(currentSlide);
                resetAutoSlide();
            };
            
            function startAutoSlide() {
                autoSlideInterval = setInterval(function() {
                    window['psListNext_<?php echo esc_js($unique_id); ?>']();
                }, 5000);
            }
            
            function resetAutoSlide() {
                clearInterval(autoSlideInterval);
                startAutoSlide();
            }
            
            // Click items to change slide
            items.forEach(function(item, index) {
                item.addEventListener('click', function() {
                    window['psListGoTo_<?php echo esc_js($unique_id); ?>'](index);
                });
            });
            
            showSlide(0);
            startAutoSlide();
        })();
        </script>
        <?php
    }
    
    /**
     * Enqueue Assets
     */
    public function enqueue_assets() {
        // No external assets needed - using inline styles
    }
    
    /**
     * Inline Styles
     */
    public function inline_styles() {
        global $post;
        if (is_a($post, 'WP_Post') && has_shortcode($post->post_content, 'post_slider')) {
            require_once POST_SLIDER_PLUGIN_DIR . 'includes/styles.php';
        }
    }
}

// Initialize the plugin
new Post_Slider_Plugin();

/**
 * Activation Hook
 */
register_activation_hook(__FILE__, function() {
    // Flush rewrite rules
    flush_rewrite_rules();
});

/**
 * Deactivation Hook
 */
register_deactivation_hook(__FILE__, function() {
    // Flush rewrite rules
    flush_rewrite_rules();
});
