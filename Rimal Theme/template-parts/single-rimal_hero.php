<?php
/**
 * Template part for displaying single hero content
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('hero-single'); ?>>
    <div class="hero-header">
        <div class="hero-main-image">
            <?php 
            $main_image = get_field('main_image');
            if ($main_image) :
                echo wp_get_attachment_image($main_image['ID'], 'full', false, array('class' => 'hero-image'));
            endif;
            ?>
        </div>

        <div class="hero-info">
            <h1 class="hero-title"><?php the_title(); ?></h1>

            <?php
            $tribe = get_field('tribe');
            if ($tribe) :
                $tribe_color = get_field('main_color', $tribe->ID);
                ?>
                <div class="hero-tribe" style="--tribe-color: <?php echo esc_attr($tribe_color); ?>">
                    <span class="tribe-label"><?php esc_html_e('Tribe:', 'rimal-game'); ?></span>
                    <a href="<?php echo esc_url(get_permalink($tribe->ID)); ?>" class="tribe-link">
                        <?php echo esc_html($tribe->post_title); ?>
                    </a>
                </div>
                <?php
            endif;
            ?>

            <div class="hero-description">
                <?php echo wp_kses_post(get_field('short_description')); ?>
            </div>

            <div class="hero-stats">
                <div class="stat-item">
                    <span class="stat-label"><?php esc_html_e('Range', 'rimal-game'); ?></span>
                    <div class="stat-bar" style="--stat-value: <?php echo esc_attr(get_field('range')); ?>%">
                        <div class="stat-fill"></div>
                        <span class="stat-number"><?php echo esc_html(get_field('range')); ?></span>
                    </div>
                </div>

                <div class="stat-item">
                    <span class="stat-label"><?php esc_html_e('Power', 'rimal-game'); ?></span>
                    <div class="stat-bar" style="--stat-value: <?php echo esc_attr(get_field('power')); ?>%">
                        <div class="stat-fill"></div>
                        <span class="stat-number"><?php echo esc_html(get_field('power')); ?></span>
                    </div>
                </div>

                <div class="stat-item">
                    <span class="stat-label"><?php esc_html_e('Speed', 'rimal-game'); ?></span>
                    <div class="stat-bar" style="--stat-value: <?php echo esc_attr(get_field('speed')); ?>%">
                        <div class="stat-fill"></div>
                        <span class="stat-number"><?php echo esc_html(get_field('speed')); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if (have_rows('abilities')) : ?>
    <div class="hero-abilities">
        <h2 class="section-title"><?php esc_html_e('Abilities', 'rimal-game'); ?></h2>

        <div class="abilities-grid">
            <?php
            while (have_rows('abilities')) : the_row();
                $ability_icon = get_sub_field('ability_icon');
                ?>
                <div class="ability-card">
                    <div class="ability-header">
                        <?php if ($ability_icon) : ?>
                        <div class="ability-icon">
                            <?php echo wp_get_attachment_image($ability_icon['ID'], 'thumbnail'); ?>
                        </div>
                        <?php endif; ?>
                        <h3 class="ability-name"><?php echo esc_html(get_sub_field('ability_name')); ?></h3>
                    </div>

                    <div class="ability-description">
                        <?php echo wp_kses_post(get_sub_field('ability_description')); ?>
                    </div>

                    <div class="ability-stats">
                        <?php
                        $stats = array(
                            'casting_type' => esc_html__('Casting Type', 'rimal-game'),
                            'damage' => esc_html__('Damage', 'rimal-game'),
                            'ammo' => esc_html__('Ammo', 'rimal-game'),
                            'fire_rate' => esc_html__('Fire Rate', 'rimal-game'),
                            'agility' => esc_html__('Agility', 'rimal-game'),
                            'health' => esc_html__('Health', 'rimal-game'),
                            'attack' => esc_html__('Attack', 'rimal-game'),
                            'defense' => esc_html__('Defense', 'rimal-game')
                        );

                        foreach ($stats as $key => $label) :
                            $value = get_sub_field($key);
                            if ($value) :
                                ?>
                                <div class="ability-stat">
                                    <span class="stat-label"><?php echo $label; ?></span>
                                    <span class="stat-value"><?php echo esc_html($value); ?></span>
                                </div>
                                <?php
                            endif;
                        endforeach;
                        ?>
                    </div>

                    <?php
                    $video = get_sub_field('ability_video');
                    if ($video) :
                        ?>
                        <div class="ability-video">
                            <?php echo wp_oembed_get($video); ?>
                        </div>
                        <?php
                    endif;
                    ?>
                </div>
                <?php
            endwhile;
            ?>
        </div>
    </div>
    <?php endif; ?>
</article>

<style>
    .hero-single {
        max-width: 1200px;
        margin: 0 auto;
        padding: 2rem;
    }

    .hero-header {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 3rem;
        margin-bottom: 4rem;
        background-color: var(--rimal-surface);
        border-radius: 12px;
        padding: 2rem;
    }

    .hero-main-image {
        position: relative;
        border-radius: 8px;
        overflow: hidden;
    }

    .hero-image {
        width: 100%;
        height: auto;
        display: block;
    }

    .hero-info {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }

    .hero-title {
        font-size: 2.5rem;
        margin: 0;
        color: var(--rimal-light);
    }

    .hero-tribe {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background-color: rgba(var(--tribe-color), 0.1);
        padding: 0.5rem 1rem;
        border-radius: 4px;
    }

    .tribe-label {
        color: var(--rimal-light);
        opacity: 0.8;
    }

    .tribe-link {
        color: var(--tribe-color);
        text-decoration: none;
        font-weight: 500;
        transition: opacity 0.3s ease;
    }

    .tribe-link:hover {
        opacity: 0.8;
    }

    .hero-description {
        color: var(--rimal-light);
        line-height: 1.6;
    }

    .hero-stats {
        display: grid;
        gap: 1rem;
    }

    .stat-item {
        display: grid;
        gap: 0.5rem;
    }

    .stat-label {
        color: var(--rimal-light);
        font-weight: 500;
    }

    .stat-bar {
        height: 8px;
        background-color: rgba(255, 255, 255, 0.1);
        border-radius: 4px;
        position: relative;
    }

    .stat-fill {
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        width: var(--stat-value);
        background-color: var(--rimal-accent);
        border-radius: 4px;
        transition: width 0.3s ease;
    }

    .stat-number {
        position: absolute;
        right: 0;
        top: -1.5rem;
        color: var(--rimal-light);
        font-size: 0.9rem;
    }

    .section-title {
        color: var(--rimal-light);
        font-size: 2rem;
        margin: 0 0 2rem;
    }

    .abilities-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
    }

    .ability-card {
        background-color: var(--rimal-surface);
        border-radius: 8px;
        padding: 1.5rem;
        display: grid;
        gap: 1.5rem;
    }

    .ability-header {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .ability-icon {
        width: 48px;
        height: 48px;
        border-radius: 8px;
        overflow: hidden;
    }

    .ability-icon img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .ability-name {
        color: var(--rimal-light);
        font-size: 1.25rem;
        margin: 0;
    }

    .ability-description {
        color: var(--rimal-light);
        line-height: 1.6;
    }

    .ability-stats {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
        gap: 1rem;
        padding-top: 1rem;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
    }

    .ability-stat {
        display: flex;
        flex-direction: column;
        gap: 0.25rem;
    }

    .ability-stat .stat-label {
        font-size: 0.9rem;
        opacity: 0.8;
    }

    .ability-stat .stat-value {
        color: var(--rimal-accent);
        font-weight: 500;
    }

    .ability-video {
        position: relative;
        padding-top: 56.25%;
        border-radius: 4px;
        overflow: hidden;
    }

    .ability-video iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }

    @media (max-width: 992px) {
        .hero-header {
            grid-template-columns: 1fr;
            gap: 2rem;
        }

        .hero-title {
            font-size: 2rem;
        }
    }

    @media (max-width: 768px) {
        .hero-single {
            padding: 1rem;
        }

        .hero-header {
            padding: 1.5rem;
        }

        .section-title {
            font-size: 1.5rem;
        }

        .abilities-grid {
            grid-template-columns: 1fr;
        }
    }
</style>