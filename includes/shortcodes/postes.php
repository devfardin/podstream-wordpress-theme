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
                        <?php the_post_thumbnail(); ?>
                    </a>
                </div>

                <div class="posts__info_wrap">
                    <!-- Post Meta Info -->
                    <div class="posts__meta_info_wrap">

                        <!-- Author Info -->
                        <div class="posts__auther_wrap">
                            <div class="posts__auther">
                                <img class="most-popular-post__author_avatar"
                                    src="<?php echo esc_url(get_avatar_url($author_id)); ?>"
                                    alt="<?php echo esc_attr(get_the_author_meta('display_name', $author_id)); ?>">

                                <h3 class="auther_display_name">
                                    <?php echo esc_html(get_the_author_meta('display_name', $author_id)); ?>
                                </h3>
                            </div>
                        </div>

                        <!-- Published Date -->
                        <div class="post_published_date">
                            <div class="post_published_date__icon">
                                <svg aria-hidden="true" class="e-font-icon-svg e-far-calendar-alt" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M148 288h-40c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12zm108-12v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm96 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm-96 96v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm-96 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm192 0v-40c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12zm96-260v352c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V112c0-26.5 21.5-48 48-48h48V12c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v52h128V12c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v52h48c26.5 0 48 21.5 48 48zm-48 346V160H48v298c0 3.3 2.7 6 6 6h340c3.3 0 6-2.7 6-6z"></path>
                                </svg>
                            </div>

                            <h3><?php echo esc_html(get_the_date('M d, Y')); ?></h3>
                        </div>
                    </div>

                    <!-- Post Text Info -->
                    <div class="posts_text__info">
                        <!-- Title -->
                        <a href="<?php echo esc_url(get_permalink()); ?>" class="most-popular-posts__post__title">
                            <?php echo esc_html(get_the_title()); ?>
                        </a>

                        <!-- Excerpt -->
                        <p class="posts_info__excerpt">
                            <?php echo esc_html(wp_trim_words(get_the_excerpt(), 60, '...')); ?>
                        </p>

                        <a class="btn btn__post" href="<?php echo esc_url(get_permalink()); ?>">
                            Continue Reading
                            <svg aria-hidden="true" class="e-font-icon-svg e-fas-arrow-right" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg">
                                <path d="M190.5 66.9l22.2-22.2c9.4-9.4 24.6-9.4 33.9 0L441 239c9.4 9.4 9.4 24.6 0 33.9L246.6 467.3c-9.4 9.4-24.6 9.4-33.9 0l-22.2-22.2c-9.5-9.5-9.3-25 .4-34.3L311.4 296H24c-13.3 0-24-10.7-24-24v-32c0-13.3 10.7-24 24-24h287.4L190.9 101.2c-9.8-9.3-10-24.8-.4-34.3z"/>
                            </svg>
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
