<?php
/**
 * The template for displaying all pages.
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
 			<?php JH_check_sidebar(); ?>

 			<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
 				<?php the_content(); ?>
 			<?php endwhile; endif; ?>

 			<?php JH_check_sidebar("end"); ?>
 		</div>
 	</div><!--mainContent-->

 <?php get_footer(); ?>
