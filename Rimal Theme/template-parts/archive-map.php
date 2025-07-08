<?php
/**
 * Template part for displaying map archive
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
?>

<div class="map-grid">
    <?php while (have_posts()) : the_post(); ?>
        <article class="map-card">
            <?php if (has_post_thumbnail()) : ?>
                <div class="map-card-thumbnail">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('large', array('class' => 'map-card-image')); ?>
                    </a>
                    <?php
                    $map_difficulty = get_field('map_difficulty');
                    if ($map_difficulty) : ?>
                        <span class="map-difficulty <?php echo esc_attr(strtolower($map_difficulty)); ?>">
                            <?php echo esc_html($map_difficulty); ?>
                        </span>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            
            <div class="map-card-content">
                <h2 class="map-card-title">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h2>
                
                <?php
                $map_type = get_field('map_type');
                $map_size = get_field('map_size');
                if ($map_type || $map_size) : ?>
                    <div class="map-card-meta">
                        <?php if ($map_type) : ?>
                            <span class="map-type">
                                <i class="fas fa-map"></i>
                                <?php echo esc_html($map_type); ?>
                            </span>
                        <?php endif; ?>
                        <?php if ($map_size) : ?>
                            <span class="map-size">
                                <i class="fas fa-expand-arrows-alt"></i>
                                <?php echo esc_html($map_size); ?>
                            </span>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                
                <div class="map-card-excerpt">
                    <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                </div>
                
                <div class="map-card-features">
                    <?php
                    $features = get_field('map_features');
                    if ($features) :
                        foreach ($features as $feature) : ?>
                            <span class="map-feature"><?php echo esc_html($feature); ?></span>
                        <?php endforeach;
                    endif; ?>
                </div>
                
                <a href="<?php the_permalink(); ?>" class="map-card-link">
                    <?php esc_html_e('Explore Map', 'rimal-game'); ?>
                </a>
            </div>
        </article>
    <?php endwhile; ?>
</div>

<style>
    .map-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: var(--rimal-spacing-lg);
        padding: var(--rimal-spacing-lg);
    }

    .map-card {
        background-color: var(--rimal-surface);
        border-radius: var(--rimal-border-radius);
        overflow: hidden;
        box-shadow: var(--rimal-shadow);
        transition: transform var(--rimal-transition);
    }

    .map-card:hover {
        transform: translateY(-4px);
        box-shadow: var(--rimal-shadow-lg);
    }

    .map-card-thumbnail {
        position: relative;
        padding-top: 56.25%;
        background-color: var(--rimal-primary-dark);
    }

    .map-card-image {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform var(--rimal-transition);
    }

    .map-card:hover .map-card-image {
        transform: scale(1.05);
    }

    .map-difficulty {
        position: absolute;
        top: var(--rimal-spacing-sm);
        right: var(--rimal-spacing-sm);
        padding: var(--rimal-spacing-xs) var(--rimal-spacing-sm);
        border-radius: var(--rimal-border-radius-sm);
        font-size: 0.875rem;
        font-weight: 600;
        color: var(--rimal-text-light);
        text-transform: uppercase;
    }

    .map-difficulty.easy {
        background-color: var(--rimal-success);
    }

    .map-difficulty.medium {
        background-color: var(--rimal-warning);
    }

    .map-difficulty.hard {
        background-color: var(--rimal-danger);
    }

    .map-card-content {
        padding: var(--rimal-spacing-lg);
    }

    .map-card-title {
        margin: 0 0 var(--rimal-spacing-sm);
        font-size: 1.5rem;
        line-height: 1.4;
    }

    .map-card-title a {
        color: var(--rimal-text);
        text-decoration: none;
        transition: color var(--rimal-transition);
    }

    .map-card-title a:hover {
        color: var(--rimal-accent);
    }

    .map-card-meta {
        display: flex;
        gap: var(--rimal-spacing-md);
        margin-bottom: var(--rimal-spacing-md);
        color: var(--rimal-text-muted);
        font-size: 0.875rem;
    }

    .map-type,
    .map-size {
        display: inline-flex;
        align-items: center;
        gap: var(--rimal-spacing-xs);
    }

    .map-type i,
    .map-size i {
        color: var(--rimal-accent);
    }

    .map-card-excerpt {
        margin-bottom: var(--rimal-spacing-md);
        color: var(--rimal-text-muted);
        line-height: 1.6;
    }

    .map-card-features {
        display: flex;
        flex-wrap: wrap;
        gap: var(--rimal-spacing-xs);
        margin-bottom: var(--rimal-spacing-md);
    }

    .map-feature {
        padding: var(--rimal-spacing-xs) var(--rimal-spacing-sm);
        background-color: var(--rimal-primary-light);
        color: var(--rimal-primary);
        border-radius: var(--rimal-border-radius-sm);
        font-size: 0.875rem;
        font-weight: 500;
    }

    .map-card-link {
        display: inline-flex;
        align-items: center;
        color: var(--rimal-accent);
        text-decoration: none;
        font-weight: 500;
        transition: color var(--rimal-transition);
    }

    .map-card-link:hover {
        color: var(--rimal-primary);
    }

    .map-card-link::after {
        content: '→';
        margin-left: var(--rimal-spacing-xs);
        transition: transform var(--rimal-transition);
    }

    .map-card-link:hover::after {
        transform: translateX(4px);
    }

    @media (max-width: 768px) {
        .map-grid {
            grid-template-columns: 1fr;
        }

        .map-card-meta {
            flex-direction: column;
            gap: var(--rimal-spacing-sm);
        }
    }
</style>