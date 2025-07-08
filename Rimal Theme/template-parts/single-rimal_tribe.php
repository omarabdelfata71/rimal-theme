<?php
/**
 * Template part for displaying single tribe content
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

$tribe_color = get_field('main_color');
$background_image = get_field('background_image');
$symbol = get_field('symbol_icon');
$associated_heroes = get_field('associated_heroes');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('tribe-single'); ?>>
    <div class="tribe-header" style="--tribe-color: <?php echo esc_attr($tribe_color); ?>">
        <?php if ($background_image) : ?>
        <div class="tribe-background">
            <?php echo wp_get_attachment_image($background_image['ID'], 'full', false, array('class' => 'background-image')); ?>
        </div>
        <?php endif; ?>

        <div class="tribe-header-content">
            <?php if ($symbol) : ?>
            <div class="tribe-symbol">
                <?php echo wp_get_attachment_image($symbol['ID'], 'full', false, array('class' => 'symbol-image')); ?>
            </div>
            <?php endif; ?>

            <h1 class="tribe-title"><?php the_title(); ?></h1>
        </div>
    </div>

    <div class="tribe-content">
        <div class="tribe-lore">
            <h2 class="section-title"><?php esc_html_e('Tribe Lore', 'rimal-game'); ?></h2>
            <?php echo wp_kses_post(get_field('lore')); ?>
        </div>

        <?php if ($associated_heroes) : ?>
        <div class="tribe-heroes">
            <h2 class="section-title"><?php esc_html_e('Heroes', 'rimal-game'); ?></h2>

            <div class="heroes-grid">
                <?php foreach ($associated_heroes as $hero) : 
                    $hero_image = get_field('main_image', $hero->ID);
                    $hero_description = get_field('short_description', $hero->ID);
                    ?>
                    <div class="hero-card">
                        <?php if ($hero_image) : ?>
                        <div class="hero-image">
                            <a href="<?php echo esc_url(get_permalink($hero->ID)); ?>">
                                <?php echo wp_get_attachment_image($hero_image['ID'], 'large', false, array('class' => 'card-image')); ?>
                            </a>
                        </div>
                        <?php endif; ?>

                        <div class="hero-info">
                            <h3 class="hero-name">
                                <a href="<?php echo esc_url(get_permalink($hero->ID)); ?>">
                                    <?php echo esc_html($hero->post_title); ?>
                                </a>
                            </h3>

                            <?php if ($hero_description) : ?>
                            <div class="hero-description">
                                <?php echo wp_kses_post($hero_description); ?>
                            </div>
                            <?php endif; ?>

                            <div class="hero-stats">
                                <?php
                                $stats = array(
                                    'power' => esc_html__('Power', 'rimal-game'),
                                    'speed' => esc_html__('Speed', 'rimal-game'),
                                    'range' => esc_html__('Range', 'rimal-game')
                                );

                                foreach ($stats as $key => $label) :
                                    $value = get_field($key, $hero->ID);
                                    if ($value) :
                                        ?>
                                        <div class="stat-item">
                                            <span class="stat-label"><?php echo $label; ?></span>
                                            <div class="stat-bar" style="--stat-value: <?php echo esc_attr($value); ?>%">
                                                <div class="stat-fill"></div>
                                            </div>
                                        </div>
                                        <?php
                                    endif;
                                endforeach;
                                ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</article>

<style>
    .tribe-single {
        max-width: 1200px;
        margin: 0 auto;
    }

    .tribe-header {
        position: relative;
        height: 400px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 3rem;
        border-radius: 12px;
        overflow: hidden;
    }

    .tribe-background {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 1;
    }

    .background-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .tribe-header::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(to bottom, transparent, var(--rimal-dark));
        z-index: 2;
    }

    .tribe-header-content {
        position: relative;
        z-index: 3;
        text-align: center;
    }

    .tribe-symbol {
        width: 120px;
        height: 120px;
        margin: 0 auto 1.5rem;
    }

    .symbol-image {
        width: 100%;
        height: 100%;
        object-fit: contain;
        filter: drop-shadow(0 0 10px rgba(var(--tribe-color), 0.5));
    }

    .tribe-title {
        font-size: 3rem;
        color: var(--rimal-light);
        margin: 0;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
    }

    .tribe-content {
        padding: 0 2rem;
    }

    .section-title {
        color: var(--rimal-light);
        font-size: 2rem;
        margin: 0 0 1.5rem;
    }

    .tribe-lore {
        color: var(--rimal-light);
        line-height: 1.8;
        font-size: 1.1rem;
        margin-bottom: 4rem;
    }

    .heroes-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
    }

    .hero-card {
        background-color: var(--rimal-surface);
        border-radius: 8px;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .hero-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
    }

    .hero-image {
        position: relative;
        padding-top: 75%;
    }

    .card-image {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .hero-card:hover .card-image {
        transform: scale(1.05);
    }

    .hero-info {
        padding: 1.5rem;
    }

    .hero-name {
        font-size: 1.5rem;
        margin: 0 0 1rem;
    }

    .hero-name a {
        color: var(--rimal-light);
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .hero-name a:hover {
        color: var(--tribe-color);
    }

    .hero-description {
        color: var(--rimal-light);
        opacity: 0.8;
        margin-bottom: 1.5rem;
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
        font-size: 0.9rem;
        opacity: 0.8;
    }

    .stat-bar {
        height: 4px;
        background-color: rgba(255, 255, 255, 0.1);
        border-radius: 2px;
        overflow: hidden;
    }

    .stat-fill {
        height: 100%;
        width: var(--stat-value);
        background-color: var(--tribe-color);
        border-radius: 2px;
        transition: width 0.3s ease;
    }

    @media (max-width: 992px) {
        .tribe-header {
            height: 300px;
        }

        .tribe-symbol {
            width: 100px;
            height: 100px;
        }

        .tribe-title {
            font-size: 2.5rem;
        }
    }

    @media (max-width: 768px) {
        .tribe-content {
            padding: 0 1rem;
        }

        .tribe-header {
            height: 250px;
            margin-bottom: 2rem;
        }

        .tribe-symbol {
            width: 80px;
            height: 80px;
            margin-bottom: 1rem;
        }

        .tribe-title {
            font-size: 2rem;
        }

        .section-title {
            font-size: 1.5rem;
        }

        .tribe-lore {
            font-size: 1rem;
            margin-bottom: 3rem;
        }

        .heroes-grid {
            grid-template-columns: 1fr;
        }
    }
</style>