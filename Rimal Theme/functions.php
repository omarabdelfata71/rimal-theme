<?php
/**
 * Rimal Game Theme functions and definitions
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// Define theme constants
define('RIMAL_THEME_VERSION', '1.0.0');
define('RIMAL_THEME_DIR', get_template_directory());
define('RIMAL_THEME_URI', get_template_directory_uri());

// Check if required plugins are active
function rimal_check_required_plugins() {
    if (!class_exists('ACF')) {
        add_action('admin_notices', function() {
            echo '<div class="notice notice-error"><p>' . esc_html__('Rimal Game Theme requires Advanced Custom Fields PRO plugin to be installed and activated.', 'rimal-game') . '</p></div>';
        });
    }

    if (!did_action('elementor/loaded')) {
        add_action('admin_notices', function() {
            echo '<div class="notice notice-error"><p>' . esc_html__('Rimal Game Theme requires Elementor plugin to be installed and activated.', 'rimal-game') . '</p></div>';
        });
    }
}
add_action('admin_init', 'rimal_check_required_plugins');

// Theme setup
function rimal_theme_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    add_theme_support('elementor');
    add_theme_support('align-wide');
    add_theme_support('editor-styles');
    add_theme_support('responsive-embeds');
    add_theme_support('custom-line-height');
    add_theme_support('custom-spacing');
    add_theme_support('wp-block-styles');

    // Add support for editor color palette
    add_theme_support('editor-color-palette', array(
        array(
            'name'  => esc_html__('Primary', 'rimal-game'),
            'slug'  => 'primary',
            'color' => 'var(--rimal-primary)',
        ),
        array(
            'name'  => esc_html__('Primary Light', 'rimal-game'),
            'slug'  => 'primary-light',
            'color' => 'var(--rimal-primary-light)',
        ),
        array(
            'name'  => esc_html__('Primary Dark', 'rimal-game'),
            'slug'  => 'primary-dark',
            'color' => 'var(--rimal-primary-dark)',
        ),
        array(
            'name'  => esc_html__('Accent', 'rimal-game'),
            'slug'  => 'accent',
            'color' => 'var(--rimal-accent)',
        ),
        array(
            'name'  => esc_html__('Background', 'rimal-game'),
            'slug'  => 'background',
            'color' => 'var(--rimal-background)',
        ),
        array(
            'name'  => esc_html__('Surface', 'rimal-game'),
            'slug'  => 'surface',
            'color' => 'var(--rimal-surface)',
        ),
        array(
            'name'  => esc_html__('Text', 'rimal-game'),
            'slug'  => 'text',
            'color' => 'var(--rimal-text)',
        ),
        array(
            'name'  => esc_html__('Text Muted', 'rimal-game'),
            'slug'  => 'text-muted',
            'color' => 'var(--rimal-text-muted)',
        ),
    ));

    // Register navigation menus
    register_nav_menus(array(
        'primary' => esc_html__('Primary Menu', 'rimal-game'),
        'footer' => esc_html__('Footer Menu', 'rimal-game'),
    ));

    // Set content width
    if (!isset($content_width)) {
        $content_width = 1200;
    }
}
add_action('after_setup_theme', 'rimal_theme_setup');

// Enqueue scripts and styles
function rimal_enqueue_scripts() {
    // Enqueue theme stylesheet
    wp_enqueue_style(
        'rimal-style',
        get_stylesheet_uri(),
        array(),
        RIMAL_THEME_VERSION
    );

    // Enqueue theme custom styles
    wp_enqueue_style(
        'rimal-custom',
        RIMAL_THEME_URI . '/assets/css/custom.css',
        array('rimal-style'),
        RIMAL_THEME_VERSION
    );

    // Enqueue theme scripts
    wp_enqueue_script(
        'rimal-scripts',
        RIMAL_THEME_URI . '/assets/js/scripts.js',
        array('jquery'),
        RIMAL_THEME_VERSION,
        true
    );

    // Localize script
    wp_localize_script(
        'rimal-scripts',
        'rimalData',
        array(
            'ajaxUrl' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('rimal-nonce')
        )
    );
}
add_action('wp_enqueue_scripts', 'rimal_enqueue_scripts');

// Register Custom Post Types
function rimal_register_post_types() {
    // Heroes CPT
    register_post_type('rimal_hero', array(
        'labels' => array(
            'name' => esc_html__('Heroes', 'rimal-game'),
            'singular_name' => esc_html__('Hero', 'rimal-game'),
            'add_new' => esc_html__('Add New', 'rimal-game'),
            'add_new_item' => esc_html__('Add New Hero', 'rimal-game'),
            'edit_item' => esc_html__('Edit Hero', 'rimal-game'),
            'new_item' => esc_html__('New Hero', 'rimal-game'),
            'view_item' => esc_html__('View Hero', 'rimal-game'),
            'search_items' => esc_html__('Search Heroes', 'rimal-game'),
            'not_found' => esc_html__('No heroes found', 'rimal-game'),
            'not_found_in_trash' => esc_html__('No heroes found in Trash', 'rimal-game'),
        ),
        'public' => true,
        'has_archive' => true,
        'show_in_rest' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon' => 'dashicons-superhero',
        'rewrite' => array('slug' => 'heroes'),
        'show_in_nav_menus' => true,
    ));

    // Tribes CPT
    register_post_type('rimal_tribe', array(
        'labels' => array(
            'name' => esc_html__('Tribes', 'rimal-game'),
            'singular_name' => esc_html__('Tribe', 'rimal-game'),
            'add_new' => esc_html__('Add New', 'rimal-game'),
            'add_new_item' => esc_html__('Add New Tribe', 'rimal-game'),
            'edit_item' => esc_html__('Edit Tribe', 'rimal-game'),
            'new_item' => esc_html__('New Tribe', 'rimal-game'),
            'view_item' => esc_html__('View Tribe', 'rimal-game'),
            'search_items' => esc_html__('Search Tribes', 'rimal-game'),
            'not_found' => esc_html__('No tribes found', 'rimal-game'),
            'not_found_in_trash' => esc_html__('No tribes found in Trash', 'rimal-game'),
        ),
        'public' => true,
        'has_archive' => true,
        'show_in_rest' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_icon' => 'dashicons-groups',
        'rewrite' => array('slug' => 'tribes'),
        'show_in_nav_menus' => true,
    ));

    // Maps CPT
    register_post_type('rimal_map', array(
        'labels' => array(
            'name' => esc_html__('Maps', 'rimal-game'),
            'singular_name' => esc_html__('Map', 'rimal-game'),
            'add_new' => esc_html__('Add New', 'rimal-game'),
            'add_new_item' => esc_html__('Add New Map', 'rimal-game'),
            'edit_item' => esc_html__('Edit Map', 'rimal-game'),
            'new_item' => esc_html__('New Map', 'rimal-game'),
            'view_item' => esc_html__('View Map', 'rimal-game'),
            'search_items' => esc_html__('Search Maps', 'rimal-game'),
            'not_found' => esc_html__('No maps found', 'rimal-game'),
            'not_found_in_trash' => esc_html__('No maps found in Trash', 'rimal-game'),
        ),
        'public' => true,
        'has_archive' => true,
        'show_in_rest' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_icon' => 'dashicons-location-alt',
        'rewrite' => array('slug' => 'maps'),
        'show_in_nav_menus' => true,
    ));
}
add_action('init', 'rimal_register_post_types');

// Register ACF Fields
function rimal_register_acf_fields() {
    if (function_exists('acf_add_local_field_group')) {
        // Hero Fields
        acf_add_local_field_group(array(
            'key' => 'group_hero_details',
            'title' => 'Hero Details',
            'fields' => array(
                array(
                    'key' => 'field_tribe',
                    'label' => 'Tribe',
                    'name' => 'tribe',
                    'type' => 'relationship',
                    'instructions' => '',
                    'required' => 1,
                    'post_type' => array('rimal_tribe'),
                    'filters' => array('search'),
                    'max' => 1,
                    'return_format' => 'object',
                ),
                array(
                    'key' => 'field_short_description',
                    'label' => 'Short Description',
                    'name' => 'short_description',
                    'type' => 'textarea',
                    'instructions' => '',
                    'required' => 1,
                    'rows' => 3,
                ),
                array(
                    'key' => 'field_main_image',
                    'label' => 'Main Image',
                    'name' => 'main_image',
                    'type' => 'image',
                    'instructions' => '',
                    'required' => 1,
                    'return_format' => 'array',
                    'preview_size' => 'medium',
                    'library' => 'all',
                ),
                array(
                    'key' => 'field_stats',
                    'label' => 'Stats',
                    'name' => 'stats',
                    'type' => 'group',
                    'instructions' => '',
                    'required' => 1,
                    'layout' => 'block',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_range',
                            'label' => 'Range',
                            'name' => 'range',
                            'type' => 'number',
                            'instructions' => '',
                            'required' => 1,
                            'min' => 0,
                            'max' => 10,
                            'step' => 1,
                        ),
                        array(
                            'key' => 'field_power',
                            'label' => 'Power',
                            'name' => 'power',
                            'type' => 'number',
                            'instructions' => '',
                            'required' => 1,
                            'min' => 0,
                            'max' => 10,
                            'step' => 1,
                        ),
                        array(
                            'key' => 'field_speed',
                            'label' => 'Speed',
                            'name' => 'speed',
                            'type' => 'number',
                            'instructions' => '',
                            'required' => 1,
                            'min' => 0,
                            'max' => 10,
                            'step' => 1,
                        ),
                    ),
                ),
                array(
                    'key' => 'field_abilities',
                    'label' => 'Abilities',
                    'name' => 'abilities',
                    'type' => 'repeater',
                    'instructions' => '',
                    'required' => 1,
                    'min' => 1,
                    'layout' => 'block',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_ability_name',
                            'label' => 'Ability Name',
                            'name' => 'ability_name',
                            'type' => 'text',
                            'required' => 1,
                        ),
                        array(
                            'key' => 'field_ability_icon',
                            'label' => 'Ability Icon',
                            'name' => 'ability_icon',
                            'type' => 'image',
                            'required' => 1,
                            'return_format' => 'array',
                            'preview_size' => 'thumbnail',
                        ),
                        array(
                            'key' => 'field_ability_description',
                            'label' => 'Ability Description',
                            'name' => 'ability_description',
                            'type' => 'wysiwyg',
                            'required' => 1,
                            'tabs' => 'all',
                            'toolbar' => 'full',
                            'media_upload' => 0,
                        ),
                        array(
                            'key' => 'field_casting_type',
                            'label' => 'Casting Type',
                            'name' => 'casting_type',
                            'type' => 'text',
                            'required' => 1,
                        ),
                        array(
                            'key' => 'field_damage',
                            'label' => 'Damage',
                            'name' => 'damage',
                            'type' => 'number',
                            'required' => 1,
                            'min' => 0,
                        ),
                        array(
                            'key' => 'field_ammo',
                            'label' => 'Ammo',
                            'name' => 'ammo',
                            'type' => 'number',
                            'required' => 1,
                            'min' => 0,
                        ),
                        array(
                            'key' => 'field_fire_rate',
                            'label' => 'Fire Rate',
                            'name' => 'fire_rate',
                            'type' => 'number',
                            'required' => 1,
                            'min' => 0,
                        ),
                        array(
                            'key' => 'field_agility',
                            'label' => 'Agility',
                            'name' => 'agility',
                            'type' => 'number',
                            'required' => 1,
                            'min' => 0,
                            'max' => 10,
                        ),
                        array(
                            'key' => 'field_health',
                            'label' => 'Health',
                            'name' => 'health',
                            'type' => 'number',
                            'required' => 1,
                            'min' => 0,
                            'max' => 10,
                        ),
                        array(
                            'key' => 'field_attack',
                            'label' => 'Attack',
                            'name' => 'attack',
                            'type' => 'number',
                            'required' => 1,
                            'min' => 0,
                            'max' => 10,
                        ),
                        array(
                            'key' => 'field_defense',
                            'label' => 'Defense',
                            'name' => 'defense',
                            'type' => 'number',
                            'required' => 1,
                            'min' => 0,
                            'max' => 10,
                        ),
                        array(
                            'key' => 'field_ability_video',
                            'label' => 'Ability Video',
                            'name' => 'ability_video',
                            'type' => 'oembed',
                            'required' => 0,
                        ),
                    ),
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'rimal_hero',
                    ),
                ),
            ),
        ));

        // Tribe Fields
        acf_add_local_field_group(array(
            'key' => 'group_tribe_details',
            'title' => 'Tribe Details',
            'fields' => array(
                array(
                    'key' => 'field_tribe_name',
                    'label' => 'Tribe Name',
                    'name' => 'tribe_name',
                    'type' => 'text',
                    'required' => 1,
                ),
                array(
                    'key' => 'field_symbol',
                    'label' => 'Symbol/Icon',
                    'name' => 'symbol',
                    'type' => 'image',
                    'required' => 1,
                    'return_format' => 'array',
                    'preview_size' => 'medium',
                ),
                array(
                    'key' => 'field_lore',
                    'label' => 'Lore/Description',
                    'name' => 'lore',
                    'type' => 'wysiwyg',
                    'required' => 1,
                    'tabs' => 'all',
                    'toolbar' => 'full',
                    'media_upload' => 1,
                ),
                array(
                    'key' => 'field_main_color',
                    'label' => 'Main Color',
                    'name' => 'main_color',
                    'type' => 'color_picker',
                    'required' => 1,
                ),
                array(
                    'key' => 'field_background_image',
                    'label' => 'Background Image',
                    'name' => 'background_image',
                    'type' => 'image',
                    'required' => 1,
                    'return_format' => 'array',
                    'preview_size' => 'medium',
                ),
                array(
                    'key' => 'field_associated_heroes',
                    'label' => 'Associated Heroes',
                    'name' => 'associated_heroes',
                    'type' => 'relationship',
                    'instructions' => '',
                    'required' => 0,
                    'post_type' => array('rimal_hero'),
                    'filters' => array('search'),
                    'return_format' => 'object',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'rimal_tribe',
                    ),
                ),
            ),
        ));

        // Map Fields
        acf_add_local_field_group(array(
            'key' => 'group_map_details',
            'title' => 'Map Details',
            'fields' => array(
                array(
                    'key' => 'field_map_name',
                    'label' => 'Map Name',
                    'name' => 'map_name',
                    'type' => 'text',
                    'required' => 1,
                ),
                array(
                    'key' => 'field_region',
                    'label' => 'Region/Theme',
                    'name' => 'region',
                    'type' => 'text',
                    'required' => 1,
                ),
                array(
                    'key' => 'field_map_type',
                    'label' => 'Map Type',
                    'name' => 'map_type',
                    'type' => 'select',
                    'required' => 1,
                    'choices' => array(
                        'arena' => 'Arena',
                        'forest' => 'Forest',
                        'desert' => 'Desert',
                        'mountain' => 'Mountain',
                        'city' => 'City',
                        'space' => 'Space',
                    ),
                    'default_value' => 'arena',
                    'return_format' => 'value',
                ),
                array(
                    'key' => 'field_preview_image',
                    'label' => 'Preview Image',
                    'name' => 'preview_image',
                    'type' => 'image',
                    'required' => 1,
                    'return_format' => 'array',
                    'preview_size' => 'medium',
                ),
                array(
                    'key' => 'field_gameplay_video',
                    'label' => 'Gameplay Video',
                    'name' => 'gameplay_video',
                    'type' => 'oembed',
                    'required' => 0,
                ),
                array(
                    'key' => 'field_difficulty',
                    'label' => 'Difficulty Level',
                    'name' => 'difficulty',
                    'type' => 'select',
                    'required' => 1,
                    'choices' => array(
                        'easy' => 'Easy',
                        'medium' => 'Medium',
                        'hard' => 'Hard',
                        'extreme' => 'Extreme',
                    ),
                    'default_value' => 'medium',
                    'return_format' => 'value',
                ),
                array(
                    'key' => 'field_players',
                    'label' => 'Recommended Players',
                    'name' => 'players',
                    'type' => 'number',
                    'required' => 1,
                    'min' => 1,
                ),
                array(
                    'key' => 'field_map_description',
                    'label' => 'Map Description',
                    'name' => 'map_description',
                    'type' => 'wysiwyg',
                    'required' => 1,
                    'tabs' => 'all',
                    'toolbar' => 'full',
                    'media_upload' => 1,
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'rimal_map',
                    ),
                ),
            ),
        ));
    }
}
add_action('acf/init', 'rimal_register_acf_fields');

// Add Elementor support for custom post types
function rimal_add_cpt_support() {
    $cpt_support = get_option('elementor_cpt_support');
    if (!$cpt_support) {
        $cpt_support = array();
    }

    $cpt_support = array_merge($cpt_support, array('rimal_hero', 'rimal_tribe', 'rimal_map'));
    update_option('elementor_cpt_support', $cpt_support);

    // Enable Elementor for single and archive templates
    update_option('elementor_disable_default_schemes', true);
    update_option('elementor_disable_color_schemes', true);
    update_option('elementor_disable_typography_schemes', true);
}
add_action('after_switch_theme', 'rimal_add_cpt_support');

// Register widget areas
function rimal_widgets_init() {
    register_sidebar(array(
        'name'          => esc_html__('Sidebar', 'rimal-game'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Add widgets here.', 'rimal-game'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer 1', 'rimal-game'),
        'id'            => 'footer-1',
        'description'   => esc_html__('Add widgets here.', 'rimal-game'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer 2', 'rimal-game'),
        'id'            => 'footer-2',
        'description'   => esc_html__('Add widgets here.', 'rimal-game'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

    register_sidebar(array(
        'name'          => esc_html__('Footer 3', 'rimal-game'),
        'id'            => 'footer-3',
        'description'   => esc_html__('Add widgets here.', 'rimal-game'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'rimal_widgets_init');