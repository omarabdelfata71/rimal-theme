<?php
/**
 * The template for displaying the footer
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
?>
    </div><!-- #content -->

    <footer id="colophon" class="site-footer">
        <div class="footer-container">
            <div class="footer-widgets">
                <?php if (is_active_sidebar('footer-1')) : ?>
                    <div class="widget-column footer-widget-1">
                        <?php dynamic_sidebar('footer-1'); ?>
                    </div>
                <?php endif; ?>

                <?php if (is_active_sidebar('footer-2')) : ?>
                    <div class="widget-column footer-widget-2">
                        <?php dynamic_sidebar('footer-2'); ?>
                    </div>
                <?php endif; ?>

                <?php if (is_active_sidebar('footer-3')) : ?>
                    <div class="widget-column footer-widget-3">
                        <?php dynamic_sidebar('footer-3'); ?>
                    </div>
                <?php endif; ?>
            </div>

            <nav class="footer-navigation">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'footer',
                    'menu_class' => 'footer-menu',
                    'container_class' => 'footer-menu-container',
                    'depth' => 1,
                    'fallback_cb' => false,
                ));
                ?>
            </nav>
        </div>

        <div class="site-info">
            <div class="copyright">
                <?php
                printf(
                    esc_html__('© %1$s %2$s. All rights reserved.', 'rimal-game'),
                    date('Y'),
                    get_bloginfo('name')
                );
                ?>
            </div>
        </div>
    </footer>
</div><!-- #page -->

<?php wp_footer(); ?>

<style>
    .site-footer {
        background-color: var(--rimal-surface);
        color: var(--rimal-text);
        padding: 4rem 0 2rem;
        margin-top: 4rem;
    }

    .footer-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 var(--rimal-spacing-md);
    }

    .footer-widgets {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: var(--rimal-spacing-lg);
        margin-bottom: var(--rimal-spacing-xl);
    }

    .widget-column {
        display: flex;
        flex-direction: column;
        gap: var(--rimal-spacing-md);
    }

    .widget {
        margin-bottom: var(--rimal-spacing-md);
    }

    .widget-title {
        color: var(--rimal-accent);
        font-size: 1.25rem;
        font-weight: 600;
        margin-bottom: var(--rimal-spacing-sm);
    }

    .footer-navigation {
        border-top: 1px solid var(--rimal-primary-dark);
        padding-top: var(--rimal-spacing-md);
        margin-top: var(--rimal-spacing-lg);
    }

    .footer-menu {
        display: flex;
        flex-wrap: wrap;
        gap: var(--rimal-spacing-md);
        justify-content: center;
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .footer-menu a {
        color: var(--rimal-text);
        text-decoration: none;
        transition: color var(--rimal-transition);
    }

    .footer-menu a:hover {
        color: var(--rimal-accent);
    }

    .footer-branding .custom-logo-link {
        max-width: 180px;
    }

    .footer-branding .custom-logo {
        height: auto;
        max-height: 60px;
        width: auto;
    }

    .footer-branding .site-title {
        font-size: 1.5rem;
        margin: 0;
    }

    .footer-branding .site-title a {
        color: var(--rimal-accent);
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .footer-branding .site-title a:hover {
        color: var(--rimal-primary);
    }

    .site-description {
        color: var(--rimal-light);
        margin: 0;
        opacity: 0.8;
    }

    .footer-heading {
        color: var(--rimal-accent);
        font-size: 1.2rem;
        margin: 0 0 1.5rem;
    }

    .footer-menu,
    .footer-cpt-menu {
        list-style: none;
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
    }

    .footer-menu a,
    .footer-cpt-menu a {
        color: var(--rimal-light);
        text-decoration: none;
        transition: color 0.3s ease;
        display: inline-block;
        position: relative;
    }

    .footer-menu a::after,
    .footer-cpt-menu a::after {
        content: '';
        position: absolute;
        width: 100%;
        height: 2px;
        bottom: -2px;
        left: 0;
        background-color: var(--rimal-accent);
        transform: scaleX(0);
        transform-origin: right;
        transition: transform 0.3s ease;
    }

    .footer-menu a:hover,
    .footer-cpt-menu a:hover {
        color: var(--rimal-accent);
    }

    .footer-menu a:hover::after,
    .footer-cpt-menu a:hover::after {
        transform: scaleX(1);
        transform-origin: left;
    }

    .site-info {
        max-width: 1200px;
        margin: 3rem auto 0;
        padding: 2rem 1rem 0;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        text-align: center;
        font-size: 0.9rem;
        color: var(--rimal-light);
        opacity: 0.8;
    }

    @media (max-width: 768px) {
        .site-footer {
            padding: 3rem 0 1.5rem;
        }

        .footer-container {
            grid-template-columns: 1fr;
            gap: 2rem;
            text-align: center;
        }

        .footer-branding {
            align-items: center;
        }

        .site-info {
            margin-top: 2rem;
        }
    }
</style>