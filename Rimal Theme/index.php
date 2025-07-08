<?php
/**
 * The main template file
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

if (!function_exists('get_header')) {
    function get_header() {
        include_once 'header.php';
    }
}

if (!function_exists('get_footer')) {
    function get_footer() {
        include_once 'footer.php';
    }
}

if (!function_exists('get_template_part')) {
    function get_template_part($slug, $name = null) {
        $template = "";
        if ($name) {
            $template = "{$slug}-{$name}.php";
        } else {
            $template = "{$slug}.php";
        }
        if (file_exists($template)) {
            include $template;
        }
    }
}

if (!function_exists('is_singular')) {
    function is_singular($post_types = null) {
        return false;
    }
}

if (!function_exists('is_post_type_archive')) {
    function is_post_type_archive($post_types = null) {
        return false;
    }
}

if (!function_exists('get_post_type')) {
    function get_post_type() {
        return 'post';
    }
}

if (!function_exists('get_post_format')) {
    function get_post_format() {
        return '';
    }
}

if (!function_exists('have_posts')) {
    function have_posts() {
        return false;
    }
}

if (!function_exists('the_post')) {
    function the_post() {}
}

if (!function_exists('the_posts_pagination')) {
    function the_posts_pagination($args = array()) {
        echo '<div class="pagination">';
        if (!empty($args['prev_text'])) {
            echo '<a href="#" class="prev">' . $args['prev_text'] . '</a>';
        }
        if (!empty($args['next_text'])) {
            echo '<a href="#" class="next">' . $args['next_text'] . '</a>';
        }
        echo '</div>';
    }
}

if (!function_exists('esc_html__')) {
    function esc_html__($text, $domain = 'default') {
        return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
    }
}

if (!function_exists('elementor_theme_do_location')) {
    function elementor_theme_do_location($location) {
        return false;
    }
}

get_header();
?>

<?php

// Check if Elementor is being used
if (function_exists('elementor_theme_do_location') && elementor_theme_do_location('archive')) {
    // Elementor will handle the layout
} else {
    // Custom layout for different post types
    if (is_singular(['rimal_hero', 'rimal_tribe', 'rimal_map'])) {
        get_template_part('template-parts/single', get_post_type());
    } elseif (is_post_type_archive(['rimal_hero', 'rimal_tribe', 'rimal_map'])) {
        get_template_part('template-parts/archive', get_post_type());
    } else {
        // Default WordPress loop
        if (have_posts()) :
            while (have_posts()) : the_post();
                get_template_part('template-parts/content', get_post_format());
            endwhile;
            
            the_posts_pagination([
                'prev_text' => esc_html__('Previous', 'rimal-game'),
                'next_text' => esc_html__('Next', 'rimal-game'),
            ]);
        else :
            get_template_part('template-parts/content', 'none');
        endif;
    }
}

get_footer();