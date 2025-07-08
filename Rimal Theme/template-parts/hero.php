<?php
/**
 * Template part for displaying hero section
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
?>

<section class="hero">
    <div class="hero-content">
        <img src="<?php echo esc_url(get_theme_file_uri('assets/images/rimal-logo.svg')); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" class="hero-logo">
        <p class="hero-tagline"><?php echo esc_html(get_bloginfo('description')); ?></p>
        <div class="hero-cta">
            <a href="#" class="btn btn-primary btn-lg"><?php esc_html_e('Play Now', 'rimal-game'); ?></a>
            <a href="<?php echo esc_url(get_post_type_archive_link('rimal_hero')); ?>" class="btn btn-accent btn-lg"><?php esc_html_e('Meet Heroes', 'rimal-game'); ?></a>
        </div>
    </div>
</section>

<style>
    .hero {
        position: relative;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        background-image: url('<?php echo esc_url(get_theme_file_uri("assets/images/hero-bg.jpg")); ?>');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        padding: var(--rimal-spacing-xxl) var(--rimal-spacing-lg);
        color: var(--rimal-text-light);
    }

    .hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(to bottom, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.8));
        z-index: 1;
    }

    .hero-content {
        position: relative;
        z-index: 2;
        max-width: 800px;
        margin: 0 auto;
    }

    .hero-logo {
        max-width: 320px;
        height: auto;
        margin-bottom: var(--rimal-spacing-xl);
        filter: drop-shadow(0 0 20px rgba(var(--rimal-accent-rgb), 0.3));
    }

    .hero-tagline {
        font-size: 1.5rem;
        line-height: 1.4;
        margin-bottom: var(--rimal-spacing-xl);
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
    }

    .hero-cta {
        display: flex;
        gap: var(--rimal-spacing-md);
        justify-content: center;
    }

    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: var(--rimal-spacing-sm) var(--rimal-spacing-lg);
        border-radius: var(--rimal-border-radius);
        font-weight: 600;
        text-decoration: none;
        transition: all var(--rimal-transition);
    }

    .btn-lg {
        padding: var(--rimal-spacing-md) var(--rimal-spacing-xl);
        font-size: 1.125rem;
    }

    .btn-primary {
        background-color: var(--rimal-primary);
        color: var(--rimal-text-light);
    }

    .btn-primary:hover {
        background-color: var(--rimal-primary-dark);
        transform: translateY(-2px);
        box-shadow: var(--rimal-shadow-lg);
    }

    .btn-accent {
        background-color: var(--rimal-accent);
        color: var(--rimal-text-light);
    }

    .btn-accent:hover {
        background-color: var(--rimal-accent-dark);
        transform: translateY(-2px);
        box-shadow: var(--rimal-shadow-lg);
    }

    @media (max-width: 768px) {
        .hero-logo {
            max-width: 240px;
        }

        .hero-tagline {
            font-size: 1.25rem;
        }

        .hero-cta {
            flex-direction: column;
        }

        .btn-lg {
            width: 100%;
        }
    }
</style>