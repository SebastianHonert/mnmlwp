<?php

    /**
     * Template Name: Hero (Post)
     * Template Post Type: post
     */

    if ( ! defined( 'ABSPATH' ) ) {
        exit;
    }

    get_header();

    echo mnmlwp_get_hero_row();

    $mnmlwp_show_sidebar = get_post_meta( $post->ID, '_mnmlwp_show_sidebar', true );
    $mnmlwp_hide_page_title = filter_var(get_post_meta( $post->ID, '_mnmlwp_hide_page_title', true ), FILTER_VALIDATE_BOOLEAN);

    while ( have_posts() ) : the_post(); ?>

        <div class="mnmlwp-row mnmlwp-row--single mnmlwp-row--single-hero">

            <div class="mnmlwp-column mnmlwp-column--single mnmlwp-column--single-hero">

                <?php

                if( is_active_sidebar( 'mnmlwp-sidebar' ) && $mnmlwp_show_sidebar == 1 ) {
                    echo '<div class="mnmlwp-flex-columns mnmlwp-flex-columns--main">';
                    echo '<div class="mnmlwp-flex-column mnmlwp-flex-column--two-third mnmlwp-flex-column--content">';
                }

                ?>
                
                <main>

                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                        <header class="entry-header">
                            <!-- Categories and Tags, Author and Date -->
                            <div class="mnmlwp-meta-wrapper mnmlwp-meta-wrapper--single">
                                <?php
                                echo mnmlwp_get_post_meta( get_the_ID(), array('categories', 'tags') );
                                echo mnmlwp_get_post_meta( get_the_ID(), array('author', 'date') );
                                ?>
                            </div>
                        </header>

                        <!-- Entry Content -->
                        <div class="entry-content">
                            <?php
                            if( ! $mnmlwp_hide_page_title ) {
                                echo '<h1>' . get_the_title() . '</h1>';
                            }
                            
                            the_content();
                            ?>
                        </div>

                    </article>
                    
                </main>

                <!-- Shariff -->
                <?php if ( shortcode_exists( 'shariff' ) ) {
                        echo do_shortcode('[shariff]');
                    } ?>

                <!-- Previous/Next Posts -->
                <?php mnmlwp_adjacent_posts(); ?>

                <?php

                if( is_active_sidebar( 'mnmlwp-sidebar' )  && $mnmlwp_show_sidebar == 1 ) {

                    echo '</div>';

                    echo '<div class="mnmlwp-flex-column mnmlwp-flex-column--third mnmlwp-flex-column--sidebar">';

                        echo get_sidebar();

                    echo '</div>';
                    echo '</div>';

                }

                ?>

            </div>

        </div>

        <?php // Comments

        if ( comments_open() || get_comments_number() ) :

            echo '<div class="mnmlwp-row mnmlwp-row--comments">';
                echo '<div class="mnmlwp-column mnmlwp-column--comments">';
                    comments_template();
                echo '</div>';
            echo '</div>';

        endif;

        ?>

    <?php endwhile;

    get_footer();
