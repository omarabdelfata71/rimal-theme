<?php
/**
 * Template part for displaying single map content
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

$preview_image = get_field('preview_image');
$difficulty = get_field('difficulty_level');
$region = get_field('region');
$map_type = get_field('map_type');
$players = get_field('recommended_players');
$video = get_field('gameplay_video');

$difficulty_colors = array(
    'Easy' => '#4CAF50',
    'Medium' => '#FFC107',
    'Hard' => '#FF5722',
    'Extreme' => '#F44336'
);

$difficulty_color = isset($difficulty_colors[$difficulty]) ? $difficulty_colors[$difficulty] : '#757575';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('map-single'); ?>>
    <div class="map-header">
        <?php if ($preview_image) : ?>
        <div class="map-preview">
            <?php echo wp_get_attachment_image($preview_image['ID'], 'full', false, array('class' => 'preview-image')); ?>
        </div>
        <?php endif; ?>

        <div class="map-info">
            <h1 class="map-title"><?php the_title(); ?></h1>

            <div class="map-meta">
                <?php if ($difficulty) : ?>
                <div class="meta-item difficulty" style="--difficulty-color: <?php echo esc_attr($difficulty_color); ?>">
                    <span class="meta-label"><?php esc_html_e('Difficulty:', 'rimal-game'); ?></span>
                    <span class="meta-value"><?php echo esc_html($difficulty); ?></span>
                </div>
                <?php endif; ?>

                <?php if ($region) : ?>
                <div class="meta-item">
                    <span class="meta-label"><?php esc_html_e('Region:', 'rimal-game'); ?></span>
                    <span class="meta-value"><?php echo esc_html($region); ?></span>
                </div>
                <?php endif; ?>

                <?php if ($map_type) : ?>
                <div class="meta-item">
                    <span class="meta-label"><?php esc_html_e('Type:', 'rimal-game'); ?></span>
                    <span class="meta-value"><?php echo esc_html($map_type); ?></span>
                </div>
                <?php endif; ?>

                <?php if ($players) : ?>
                <div class="meta-item">
                    <span class="meta-label"><?php esc_html_e('Players:', 'rimal-game'); ?></span>
                    <span class="meta-value"><?php echo esc_html($players); ?></span>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="map-content">
        <div class="map-description">
            <h2 class="section-title"><?php esc_html_e('Map Description', 'rimal-game'); ?></h2>
            <?php echo wp_kses_post(get_field('map_description')); ?>
        </div>

        <?php if ($video) : ?>
        <div class="map-gameplay">
            <h2 class="section-title"><?php esc_html_e('Gameplay Preview', 'rimal-game'); ?></h2>
            <div class="video-container">
                <?php echo wp_oembed_get($video); ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</article>

<style>
    .map-single {
        max-width: 1200px;
        margin: 0 auto;
        padding: 2rem;
    }

    .map-header {
        background-color: var(--rimal-surface);
        border-radius: 12px;
        overflow: hidden;
        margin-bottom: 3rem;
    }

    .map-preview {
        position: relative;
        padding-top: 56.25%;
        overflow: hidden;
    }

    .preview-image {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .map-info {
        padding: 2rem;
    }

    .map-title {
        font-size: 2.5rem;
        color: var(--rimal-light);
        margin: 0 0 1.5rem;
    }

    .map-meta {
        display: flex;
        flex-wrap: wrap;
        gap: 1.5rem;
    }

    .meta-item {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 1rem;
        background-color: rgba(255, 255, 255, 0.05);
        border-radius: 4px;
    }

    .meta-item.difficulty {
        background-color: rgba(var(--difficulty-color), 0.1);
    }

    .meta-label {
        color: var(--rimal-light);
        opacity: 0.8;
        font-size: 0.9rem;
    }

    .difficulty .meta-value {
        color: var(--difficulty-color);
        font-weight: 500;
    }

    .meta-value {
        color: var(--rimal-light);
        font-weight: 500;
    }

    .map-content {
        display: grid;
        gap: 3rem;
    }

    .section-title {
        color: var(--rimal-light);
        font-size: 2rem;
        margin: 0 0 1.5rem;
    }

    .map-description {
        color: var(--rimal-light);
        line-height: 1.8;
        font-size: 1.1rem;
    }

    .video-container {
        position: relative;
        padding-top: 56.25%;
        background-color: var(--rimal-surface);
        border-radius: 8px;
        overflow: hidden;
    }

    .video-container iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }

    @media (max-width: 992px) {
        .map-title {
            font-size: 2rem;
        }

        .section-title {
            font-size: 1.5rem;
        }
    }

    @media (max-width: 768px) {
        .map-single {
            padding: 1rem;
        }

        .map-info {
            padding: 1.5rem;
        }

        .map-title {
            font-size: 1.75rem;
            margin-bottom: 1rem;
        }

        .map-meta {
            gap: 1rem;
        }

        .meta-item {
            padding: 0.4rem 0.8rem;
            font-size: 0.9rem;
        }

        .map-content {
            gap: 2rem;
        }

        .map-description {
            font-size: 1rem;
        }
    }
</style>