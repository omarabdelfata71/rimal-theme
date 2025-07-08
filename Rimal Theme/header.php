<?php
/**
 * The header for our theme
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <header id="masthead" class="site-header">
        <div class="header-container">
            <div class="site-branding">
                <?php
                if (has_custom_logo()) :
                    the_custom_logo();
                else :
                ?>
                    <h1 class="site-title">
                        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                            <?php bloginfo('name'); ?>
                        </a>
                    </h1>
                    <?php
                    $description = get_bloginfo('description', 'display');
                    if ($description || is_customize_preview()) :
                    ?>
                        <p class="site-description"><?php echo $description; ?></p>
                    <?php endif; ?>
                <?php endif; ?>
            </div>

            <nav id="site-navigation" class="main-navigation">
                <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                    <span class="screen-reader-text"><?php esc_html_e('Menu', 'rimal-game'); ?></span>
                    <span class="menu-icon"></span>
                </button>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_id' => 'primary-menu',
                    'container_class' => 'primary-menu-container',
                    'fallback_cb' => false,
                ));
                ?>
            </nav>
        </div>
    </header>

    <div id="content" class="site-content">

    <style>
        .site-header {
            background-color: var(--rimal-surface);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 100;
        }

        .header-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            max-width: 1200px;
            margin: 0 auto;
            padding: 1rem;
        }

        .site-branding {
            display: flex;
            align-items: center;
        }

        .custom-logo-link {
            max-width: 180px;
            margin-right: 1rem;
        }

        .custom-logo {
            height: auto;
            max-height: 60px;
            width: auto;
        }

        .site-title {
            margin: 0;
            font-size: 1.5rem;
            font-weight: 700;
        }

        .site-title a {
            color: var(--rimal-accent);
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .site-title a:hover {
            color: var(--rimal-primary);
        }

        .main-navigation {
            display: flex;
            align-items: center;
        }

        .menu-toggle {
            display: none;
            background: none;
            border: none;
            padding: 0.5rem;
            cursor: pointer;
        }

        .menu-icon {
            display: block;
            width: 24px;
            height: 2px;
            background-color: var(--rimal-light);
            position: relative;
            transition: background-color 0.3s ease;
        }

        .menu-icon::before,
        .menu-icon::after {
            content: '';
            display: block;
            width: 24px;
            height: 2px;
            background-color: var(--rimal-light);
            position: absolute;
            left: 0;
            transition: transform 0.3s ease;
        }

        .menu-icon::before {
            top: -6px;
        }

        .menu-icon::after {
            bottom: -6px;
        }

        .menu-toggle[aria-expanded="true"] .menu-icon {
            background-color: transparent;
        }

        .menu-toggle[aria-expanded="true"] .menu-icon::before {
            transform: rotate(45deg);
            top: 0;
        }

        .menu-toggle[aria-expanded="true"] .menu-icon::after {
            transform: rotate(-45deg);
            bottom: 0;
        }

        .primary-menu-container {
            display: flex;
            align-items: center;
        }

        #primary-menu {
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
            gap: 1.5rem;
        }

        #primary-menu li {
            position: relative;
        }

        #primary-menu a {
            color: var(--rimal-light);
            text-decoration: none;
            font-weight: 500;
            padding: 0.5rem 0;
            transition: color 0.3s ease;
        }

        #primary-menu a:hover,
        #primary-menu .current-menu-item > a {
            color: var(--rimal-accent);
        }

        @media (max-width: 768px) {
            .menu-toggle {
                display: block;
            }

            .primary-menu-container {
                display: none;
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                background-color: var(--rimal-surface);
                padding: 1rem;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }

            .menu-toggle[aria-expanded="true"] + .primary-menu-container {
                display: block;
            }

            #primary-menu {
                flex-direction: column;
                gap: 1rem;
            }

            #primary-menu a {
                display: block;
                padding: 0.5rem;
            }
        }
    </style>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const menuToggle = document.querySelector('.menu-toggle');
        
        if (menuToggle) {
            menuToggle.addEventListener('click', function() {
                const expanded = this.getAttribute('aria-expanded') === 'true';
                this.setAttribute('aria-expanded', !expanded);
            });
        }
    });
    </script>