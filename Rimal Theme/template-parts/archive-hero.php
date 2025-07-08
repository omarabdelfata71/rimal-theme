<?php
/**
 * Template part for displaying hero archive
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
?>

<div class="hero-grid">
    <?php while (have_posts()) : the_post(); ?>
        <article class="hero-card">
            <?php if (has_post_thumbnail()) : ?>
                <div class="hero-card-thumbnail">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('large', array('class' => 'hero-card-image')); ?>
                    </a>
                </div>
            <?php endif; ?>
            
            <div class="hero-card-content">
                <h2 class="hero-card-title">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h2>
                
                <?php
                $hero_class = get_field('hero_class');
                $hero_power = get_field('hero_power');
                if ($hero_class || $hero_power) : ?>
                    <div class="hero-card-meta">
                        <?php if ($hero_class) : ?>
                            <span class="hero-class"><?php echo esc_html($hero_class); ?></span>
                        <?php endif; ?>
                        <?php if ($hero_power) : ?>
                            <span class="hero-power"><?php echo esc_html($hero_power); ?></span>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                
                <div class="hero-card-excerpt">
                    <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                </div>
                
                <a href="<?php the_permalink(); ?>" class="hero-card-link">
                    <?php esc_html_e('View Hero', 'rimal-game'); ?>
                </a>
            </div>
        </article>
    <?php endwhile; ?>
</div>

<style>
    .hero-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: var(--rimal-spacing-lg);
        padding: var(--rimal-spacing-lg);
    }

    .hero-card {
        background-color: var(--rimal-surface);
        border-radius: var(--rimal-border-radius);
        overflow: hidden;
        box-shadow: var(--rimal-shadow);
        transition: transform var(--rimal-transition);
    }

    .hero-card:hover {
        transform: translateY(-4px);
        box-shadow: var(--rimal-shadow-lg);
    }

    .hero-card-thumbnail {
        position: relative;
        padding-top: 100%;
        background-color: var(--rimal-primary-dark);
    }

    .hero-card-image {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform var(--rimal-transition);
    }

    .hero-card:hover .hero-card-image {
        transform: scale(1.05);
    }

    .hero-card-content {
        padding: var(--rimal-spacing-lg);
    }

    .hero-card-title {
        margin: 0 0 var(--rimal-spacing-sm);
        font-size: 1.5rem;
        line-height: 1.4;
    }

    .hero-card-title a {
        color: var(--rimal-text);
        text-decoration: none;
        transition: color var(--rimal-transition);
    }

    .hero-card-title a:hover {
        color: var(--rimal-accent);
    }

    .hero-card-meta {
        display: flex;
        gap: var(--rimal-spacing-sm);
        margin-bottom: var(--rimal-spacing-md);
    }

    .hero-class,
    .hero-power {
        display: inline-flex;
        align-items: center;
        padding: var(--rimal-spacing-xs) var(--rimal-spacing-sm);
        border-radius: var(--rimal-border-radius-sm);
        font-size: 0.875rem;
        font-weight: 500;
    }

    .hero-class {
        background-color: var(--rimal-primary);
        color: var(--rimal-text-light);
    }

    .hero-power {
        background-color: var(--rimal-accent);
        color: var(--rimal-text-light);
    }

    .hero-card-excerpt {
        margin-bottom: var(--rimal-spacing-md);
        color: var(--rimal-text-muted);
        line-height: 1.6;
    }

    .hero-card-link {
        display: inline-flex;
        align-items: center;
        color: var(--rimal-accent);
        text-decoration: none;
        font-weight: 500;
        transition: color var(--rimal-transition);
    }

    .hero-card-link:hover {
        color: var(--rimal-primary);
    }

    .hero-card-link::after {
        content: '→';
        margin-left: var(--rimal-spacing-xs);
        transition: transform var(--rimal-transition);
    }

    .hero-card-link:hover::after {
        transform: translateX(4px);
    }

    @media (max-width: 768px) {
        .hero-grid {
            grid-template-columns: 1fr;
        }
    }
</style>