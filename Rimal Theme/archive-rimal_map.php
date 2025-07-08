<?php
/**
 * The template for displaying map archive pages
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

get_header();
?>

<main id="primary" class="site-main">
    <?php if (have_posts()) : ?>
        <header class="page-header">
            <h1 class="page-title"><?php esc_html_e('Maps', 'rimal-game'); ?></h1>
            <div class="archive-description">
                <?php esc_html_e('Explore the vast landscapes of Rimal. From scorching deserts to ancient ruins, each map offers unique challenges and opportunities.', 'rimal-game'); ?>
            </div>
        </header>

        <?php
        get_template_part('template-parts/archive', 'map');

        the_posts_pagination(array(
            'prev_text' => '<i class="fas fa-chevron-left"></i> ' . esc_html__('Previous', 'rimal-game'),
            'next_text' => esc_html__('Next', 'rimal-game') . ' <i class="fas fa-chevron-right"></i>',
        ));
    else :
        get_template_part('template-parts/content', 'none');
    endif;
    ?>
</main>

<style>
    .page-header {
        text-align: center;
        padding: var(--rimal-spacing-xxl) var(--rimal-spacing-lg);
        background-color: var(--rimal-primary-dark);
        color: var(--rimal-text-light);
        margin-bottom: var(--rimal-spacing-xl);
        background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('<?php echo esc_url(get_theme_file_uri("assets/images/maps-bg.jpg")); ?>');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        position: relative;
        overflow: hidden;
    }

    .page-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: radial-gradient(circle at center, transparent 0%, rgba(0, 0, 0, 0.6) 100%);
        z-index: 1;
    }

    .page-header > * {
        position: relative;
        z-index: 2;
    }

    .page-title {
        margin: 0 0 var(--rimal-spacing-md);
        font-size: 2.5rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 2px;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    }

    .archive-description {
        max-width: 600px;
        margin: 0 auto;
        font-size: 1.125rem;
        line-height: 1.6;
        opacity: 0.9;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
    }

    .navigation.pagination {
        margin: var(--rimal-spacing-xl) 0;
        text-align: center;
    }

    .nav-links {
        display: inline-flex;
        gap: var(--rimal-spacing-sm);
        padding: var(--rimal-spacing-sm);
        background-color: var(--rimal-surface);
        border-radius: var(--rimal-border-radius);
    }

    .page-numbers {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 40px;
        height: 40px;
        padding: 0 var(--rimal-spacing-sm);
        border-radius: var(--rimal-border-radius-sm);
        color: var(--rimal-text);
        text-decoration: none;
        transition: all var(--rimal-transition);
    }

    .page-numbers.current {
        background-color: var(--rimal-primary);
        color: var(--rimal-text-light);
    }

    .page-numbers:not(.current):hover {
        background-color: var(--rimal-primary-light);
        color: var(--rimal-primary);
    }

    .page-numbers.prev,
    .page-numbers.next {
        display: inline-flex;
        align-items: center;
        gap: var(--rimal-spacing-xs);
    }

    @media (max-width: 768px) {
        .page-header {
            padding: var(--rimal-spacing-xl) var(--rimal-spacing-md);
            background-attachment: scroll;
        }

        .page-title {
            font-size: 2rem;
        }

        .archive-description {
            font-size: 1rem;
        }
    }
</style>

<?php
get_footer();