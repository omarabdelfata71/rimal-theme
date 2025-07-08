<?php
/**
 * Template part for displaying a message that posts cannot be found
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
?>

<section class="no-results not-found">
    <header class="page-header">
        <h1 class="page-title"><?php esc_html_e('Nothing Found', 'rimal-game'); ?></h1>
    </header>

    <div class="page-content">
        <?php
        if (is_search()) :
            ?>
            <p><?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'rimal-game'); ?></p>
            <?php
            get_search_form();
        else :
            ?>
            <p><?php esc_html_e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'rimal-game'); ?></p>
            <?php
            get_search_form();
        endif;
        ?>
    </div>
</section>

<style>
    .no-results {
        background-color: var(--rimal-surface);
        border-radius: 8px;
        padding: 2rem;
        text-align: center;
        max-width: 600px;
        margin: 2rem auto;
    }

    .page-header {
        margin-bottom: 1.5rem;
    }

    .page-title {
        color: var(--rimal-light);
        font-size: 1.5rem;
        margin: 0;
    }

    .page-content {
        color: var(--rimal-light);
        opacity: 0.8;
    }

    .page-content p {
        margin-bottom: 1.5rem;
    }

    .search-form {
        display: flex;
        gap: 0.5rem;
        max-width: 400px;
        margin: 0 auto;
    }

    .search-field {
        flex: 1;
        padding: 0.75rem 1rem;
        border: 2px solid rgba(255, 255, 255, 0.1);
        border-radius: 4px;
        background-color: var(--rimal-dark);
        color: var(--rimal-light);
        font-size: 1rem;
        transition: border-color 0.3s ease;
    }

    .search-field:focus {
        outline: none;
        border-color: var(--rimal-accent);
    }

    .search-submit {
        padding: 0.75rem 1.5rem;
        border: none;
        border-radius: 4px;
        background-color: var(--rimal-accent);
        color: var(--rimal-dark);
        font-weight: 500;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .search-submit:hover {
        background-color: var(--rimal-primary);
    }

    @media (max-width: 768px) {
        .no-results {
            padding: 1.5rem;
            margin: 1rem;
        }

        .page-title {
            font-size: 1.25rem;
        }

        .search-form {
            flex-direction: column;
        }

        .search-submit {
            width: 100%;
        }
    }
</style>