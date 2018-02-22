<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Site Theme
 */
?>

<section class="no-results not-found">
    <header class="page-header">
        <h1 class="page-title"><?php _e('Nothing Found', 'jhfw'); ?></h1>
    </header>
    <div class="page-content">
        <?php if (is_search()) : ?>
            <p><?php _e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'jhfw'); ?></p>
        <?php else : ?>
            <p><?php _e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'jhfw'); ?></p>
        <?php endif; ?>
    </div>
</section>
