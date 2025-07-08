<?php
/**
 * Template part for displaying posts
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?>>
    <?php if (has_post_thumbnail()) : ?>
    <div class="entry-thumbnail">
        <a href="<?php the_permalink(); ?>" class="entry-thumbnail-link">
            <?php the_post_thumbnail('large', array('class' => 'entry-image')); ?>
        </a>
    </div>
    <?php endif; ?>

    <div class="entry-content-wrapper">
        <header class="entry-header">
            <?php if (is_singular()) : ?>
                <h1 class="entry-title"><?php the_title(); ?></h1>
            <?php else : ?>
                <h2 class="entry-title">
                    <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
                </h2>
            <?php endif; ?>

            <?php if ('post' === get_post_type()) : ?>
            <div class="entry-meta">
                <span class="posted-on">
                    <?php echo esc_html(get_the_date()); ?>
                </span>
                <?php if (get_the_category_list()) : ?>
                <span class="entry-categories">
                    <?php echo get_the_category_list(esc_html__(', ', 'rimal-game')); ?>
                </span>
                <?php endif; ?>
            </div>
            <?php endif; ?>
        </header>

        <div class="entry-content">
            <?php
            if (is_singular()) :
                the_content();
            else :
                echo wp_trim_words(get_the_content(), 30, '...');
            endif;
            ?>
        </div>

        <?php if (!is_singular()) : ?>
        <div class="entry-footer">
            <a href="<?php the_permalink(); ?>" class="read-more">
                <?php esc_html_e('Read More', 'rimal-game'); ?>
                <span class="screen-reader-text"><?php esc_html_e('about', 'rimal-game'); ?> <?php the_title(); ?></span>
            </a>
        </div>
        <?php endif; ?>
    </div>
</article>

<style>
    .entry {
        background-color: var(--rimal-surface);
        border-radius: var(--rimal-border-radius);
        overflow: hidden;
        transition: all var(--rimal-transition);
        margin-bottom: var(--rimal-spacing-lg);
        box-shadow: var(--rimal-shadow);
    }

    .entry:hover {
        transform: translateY(-4px);
        box-shadow: var(--rimal-shadow-lg);
    }

    .entry-thumbnail {
        position: relative;
        padding-top: 56.25%;
        overflow: hidden;
        background-color: var(--rimal-primary-dark);
    }

    .entry-thumbnail-link {
        display: block;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }

    .entry-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform var(--rimal-transition);
    }

    .entry-thumbnail:hover .entry-image {
        transform: scale(1.05);
    }

    .entry-content-wrapper {
        padding: var(--rimal-spacing-lg);
    }

    .entry-title {
        margin: 0 0 var(--rimal-spacing-sm);
        font-size: 1.5rem;
        line-height: 1.4;
    }

    .entry-title a {
        color: var(--rimal-text);
        text-decoration: none;
        transition: color var(--rimal-transition);
    }

    .entry-title a:hover {
        color: var(--rimal-accent);
    }

    .entry-meta {
        display: flex;
        gap: var(--rimal-spacing-sm);
        font-size: 0.875rem;
        color: var(--rimal-text-muted);
        margin-bottom: var(--rimal-spacing-md);
    }

    .entry-meta a {
        color: var(--rimal-primary);
        text-decoration: none;
        transition: color var(--rimal-transition);
    }

    .entry-meta a:hover {
        color: var(--rimal-accent);
    }

    .entry-content {
        margin-bottom: var(--rimal-spacing-md);
        line-height: 1.6;
    }

    .entry-footer {
        margin-top: var(--rimal-spacing-md);
    }

    .read-more {
        display: inline-flex;
        align-items: center;
        color: var(--rimal-accent);
        text-decoration: none;
        font-weight: 500;
        transition: color var(--rimal-transition);
    }

    .read-more:hover {
        color: var(--rimal-primary);
    }

    .read-more::after {
        content: '→';
        margin-left: var(--rimal-spacing-xs);
        transition: transform var(--rimal-transition);
    }

    .read-more:hover::after {
        transform: translateX(4px);
    }

    .entry:hover .entry-image {
        transform: scale(1.05);
    }

    .entry-content-wrapper {
        padding: 1.5rem;
    }

    .entry-title {
        margin: 0 0 1rem;
        font-size: 1.5rem;
        line-height: 1.3;
    }

    .entry-title a {
        color: var(--rimal-light);
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .entry-title a:hover {
        color: var(--rimal-accent);
    }

    .entry-meta {
        font-size: 0.9rem;
        color: var(--rimal-light);
        opacity: 0.8;
        margin-bottom: 1rem;
    }

    .entry-meta > span:not(:last-child)::after {
        content: '•';
        margin: 0 0.5rem;
    }

    .entry-categories a {
        color: var(--rimal-accent);
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .entry-categories a:hover {
        color: var(--rimal-primary);
    }

    .entry-content {
        color: var(--rimal-light);
        line-height: 1.6;
        margin-bottom: 1.5rem;
    }

    .entry-footer {
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        padding-top: 1rem;
    }

    .read-more {
        display: inline-flex;
        align-items: center;
        color: var(--rimal-accent);
        text-decoration: none;
        font-weight: 500;
        transition: color 0.3s ease;
    }

    .read-more:hover {
        color: var(--rimal-primary);
    }

    .read-more::after {
        content: '→';
        margin-left: 0.5rem;
        transition: transform 0.3s ease;
    }

    .read-more:hover::after {
        transform: translateX(4px);
    }

    .screen-reader-text {
        border: 0;
        clip: rect(1px, 1px, 1px, 1px);
        clip-path: inset(50%);
        height: 1px;
        margin: -1px;
        overflow: hidden;
        padding: 0;
        position: absolute;
        width: 1px;
        word-wrap: normal !important;
    }

    @media (max-width: 768px) {
        .entry-content-wrapper {
            padding: 1rem;
        }

        .entry-title {
            font-size: 1.25rem;
        }
    }
</style>