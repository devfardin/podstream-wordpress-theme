<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

function render_podstream_blogs_list()
{
    ob_start();

    $popularpost = new WP_Query([
        'posts_per_page' => 6,
        'post_type'      => 'post',
        'post_status'    => 'publish',
    ]);
    ?>

    <section class="posts_row">
        <?php if ($popularpost->have_posts()) :  
            while ($popularpost->have_posts()) : $popularpost->the_post(); 
                $author_id = get_the_author_meta('ID'); ?>
            
            <article class="post__container">
                <div class="post_thumb">
                    <a href="<?php echo esc_url(get_permalink()); ?>" rel="bookmark"
                        aria-label="More about <?php echo esc_attr(get_the_title()); ?>">
                        <?php the_post_thumbnail('medium'); ?>
                    </a>
                </div>

                <div class="posts__info_wrap">
                    <!-- Post Meta Info -->
                    <div class="posts__meta_info_wrap">
                        <!-- post terms Info -->
                            <div class="posts__category">
                                <h3>
                                    <?php echo esc_html(wp_get_post_terms(get_the_ID(), 'category')[0]->name); ?>
                                </h3>
                            </div>
                            <div class="post__info_seperator">
                                |
                            </div>
                        <!-- Published Date -->
                        <div class="post_published_date">
                            <h3><?php echo esc_html(get_the_date('M d, Y')); ?></h3>
                        </div>
                    </div>

                    <!-- Post Text Info -->
                    <div class="posts_text__info">
                        <!-- Title -->
                        <a href="<?php echo esc_url(get_permalink()); ?>" class="most-popular-posts__post__title">
                            <?php echo esc_html(get_the_title()); ?>
                        </a>
                    </div>
                </div>
            </article>

        <?php endwhile;
            wp_reset_postdata();
        endif; ?>
    </section>

    <?php
    return ob_get_clean();
}

add_shortcode('podstream_all_post', 'render_podstream_blogs_list');
