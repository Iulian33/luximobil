<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package Site Theme
 */

get_header(); ?>

 	<div class="mainContent">
 		<div class="container">
 			<?php JH_check_sidebar(); ?>

		   <section class="error-404 not-found">
			   <header class="page-header">
				   <h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'jhfw' ); ?></h1>
			   </header><!-- .page-header -->

			   <div class="page-content">
				   <p><?php _e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'jhfw' ); ?></p>
<!--				   --><?php //get_search_form(); ?>
			   </div><!-- .page-content -->
		   </section><!-- .error-404 -->

		  <?php JH_check_sidebar("end"); ?>
 		</div>
 	</div><!--mainContent-->

<?php get_footer(); ?>
