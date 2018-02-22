<?php
/**
 * The template for displaying 404 pages.
 *
 * @package Site Theme
 */

get_header(); ?>
<div class="mainContent">
    <div class="container">
        <section class="error-404 not-found">
            <header class="page-header">
                <h1 class="page-title"><?php _e('Oops! That page can&rsquo;t be found.', 'jhfw'); ?></h1>
            </header>
            <div class="page-content">
                <p><?php _e('It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'jhfw'); ?></p>
            </div>
        </section>
    </div>
</div>
<?php get_footer(); ?>
