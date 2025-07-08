<?php
/**
 * Template part for displaying tribe archive
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
?>

<div class="tribe-grid">
    <?php while (have_posts()) : the_post(); ?>
        <article class="tribe-card">
            <?php if (has_post_thumbnail()) : ?>
                <div class="tribe-card-thumbnail">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('large', array('class' => 'tribe-card-image')); ?>
                    </a>
                </div>
            <?php endif; ?>
            
            <div class="tribe-card-content">
                <h2 class="tribe-card-title">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h2>
                
                <?php
                $tribe_location = get_field('tribe_location');
                $tribe_strength = get_field('tribe_strength');
                if ($tribe_location || $tribe_strength) : ?>
                    <div class="tribe-card-meta">
                        <?php if ($tribe_location) : ?>
                            <span class="tribe-location">
                                <i class="fas fa-map-marker-alt"></i>
                                <?php echo esc_html($tribe_location); ?>
                            </span>
                        <?php endif; ?>
                        <?php if ($tribe_strength) : ?>
                            <span class="tribe-strength">
                                <i class="fas fa-fist-raised"></i>
                                <?php echo esc_html($tribe_strength); ?>
                            </span>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                
                <div class="tribe-card-excerpt">
                    <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                </div>
                
                <a href="<?php the_permalink(); ?>" class="tribe-card-link">
                    <?php esc_html_e('Explore Tribe', 'rimal-game'); ?>
                </a>
            </div>
        </article>
    <?php endwhile; ?>
</div>

<style>
    .tribe-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: var(--rimal-spacing-lg);
        padding: var(--rimal-spacing-lg);
    }

    .tribe-card {
        background-color: var(--rimal-surface);
        border-radius: var(--rimal-border-radius);
        overflow: hidden;
        box-shadow: var(--rimal-shadow);
        transition: transform var(--rimal-transition);
    }

    .tribe-card:hover {
        transform: translateY(-4px);
        box-shadow: var(--rimal-shadow-lg);
    }

    .tribe-card-thumbnail {
        position: relative;
        padding-top: 56.25%;
        background-color: var(--rimal-primary-dark);
    }

    .tribe-card-image {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform var(--rimal-transition);
    }

    .tribe-card:hover .tribe-card-image {
        transform: scale(1.05);
    }

    .tribe-card-content {
        padding: var(--rimal-spacing-lg);
    }

    .tribe-card-title {
        margin: 0 0 var(--rimal-spacing-sm);
        font-size: 1.5rem;
        line-height: 1.4;
    }

    .tribe-card-title a {
        color: var(--rimal-text);
        text-decoration: none;
        transition: color var(--rimal-transition);
    }

    .tribe-card-title a:hover {
        color: var(--rimal-accent);
    }

    .tribe-card-meta {
        display: flex;
        gap: var(--rimal-spacing-md);
        margin-bottom: var(--rimal-spacing-md);
        color: var(--rimal-text-muted);
        font-size: 0.875rem;
    }

    .tribe-location,
    .tribe-strength {
        display: inline-flex;
        align-items: center;
        gap: var(--rimal-spacing-xs);
    }

    .tribe-location i,
    .tribe-strength i {
        color: var(--rimal-accent);
    }

    .tribe-card-excerpt {
        margin-bottom: var(--rimal-spacing-md);
        color: var(--rimal-text-muted);
        line-height: 1.6;
    }

    .tribe-card-link {
        display: inline-flex;
        align-items: center;
        color: var(--rimal-accent);
        text-decoration: none;
        font-weight: 500;
        transition: color var(--rimal-transition);
    }

    .tribe-card-link:hover {
        color: var(--rimal-primary);
    }

    .tribe-card-link::after {
        content: '→';
        margin-left: var(--rimal-spacing-xs);
        transition: transform var(--rimal-transition);
    }

    .tribe-card-link:hover::after {
        transform: translateX(4px);
    }

    @media (max-width: 768px) {
        .tribe-grid {
            grid-template-columns: 1fr;
        }

        .tribe-card-meta {
            flex-direction: column;
            gap: var(--rimal-spacing-sm);
        }
    }
</style>