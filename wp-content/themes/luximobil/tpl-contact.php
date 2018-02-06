<?php
/**
 * Template Name: Contact Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Site Theme
 */

get_header(); ?>

<div class="mainContent">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 contact-inner">
                <?php dynamic_sidebar('sidebar-1');
                if (have_posts()) :
                    while (have_posts()) : the_post();
                        the_content();
                    endwhile;
                endif; ?>
            </div>
        </div>
    </div>
</div><!--mainContent-->

<?php get_footer(); ?>
