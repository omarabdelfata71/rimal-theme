<?php
/**
 * Template for displaying single tribe posts
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

get_header();

// Check if Elementor is being used
if (function_exists('elementor_theme_do_location') && elementor_theme_do_location('single')) {
    // Elementor will handle the layout
} else {
    // Custom layout
    while (have_posts()) : the_post();
        get_template_part('template-parts/single', 'rimal_tribe');
    endwhile;
}

get_footer();