<?php
/**
 * Template Name: Contact pagina
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
                <div class="col-sm-8">
                    <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
                        <h1><?php the_title(); ?></h1>
                        <?php the_content(); ?>
                    <?php endwhile; endif; ?>
                </div>

                <?php get_sidebar(); ?>
            </div>
 		</div>
 	</div><!--mainContent-->


 	

 <?php get_footer(); ?>
