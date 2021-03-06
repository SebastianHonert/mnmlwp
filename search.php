<?php

    if ( ! defined( 'ABSPATH' ) ) {
        exit;
    }

    get_header();

    global $wp_query;

    if( is_active_sidebar( 'mnmlwp-sidebar' ) ) {
        echo '<div class="mnmlwp-flex-columns mnmlwp-flex-columns--main">';
        echo '<div class="mnmlwp-flex-column mnmlwp-flex-column--two-third mnmlwp-flex-column--content">';
    }

    echo mnmlwp_get_posts();

    echo '<div class="clear-column"></div>';

    if( is_active_sidebar( 'mnmlwp-sidebar' ) ) {

        echo '</div>';

        echo '<div class="mnmlwp-flex-column mnmlwp-flex-column--third mnmlwp-flex-column--sidebar">';

            echo get_sidebar();

        echo '</div>';
        echo '</div>';

    }

    get_footer();
