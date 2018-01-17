<?php
/**
 * The template for displaying all single posts.
 *
 * @package Site Theme
 */

get_header(); ?>

<div id="primary" class="mainContent">
    <div class="container">
        <?php get_template_part('content', 'single'); ?>


        <div class="row">
            <div class="col-xs-12 col-sm-7 col-lg-7">
                    <?php JH_check_sidebar(); ?>
                    <?php while (have_posts()) : the_post(); ?>
                    <div class="imobil-description">
                        <h3 class="description-heading">
                            <?php _e('Descriere', 'jhfw'); ?>
                        </h3>
                        <div class="description">
                            <?php the_content();?>
                        </div>
                    </div>

                    <?php endwhile; // end of the loop. ?>
                    <?php JH_check_sidebar("end"); ?>
            </div>
        </div>
    </div>

</div><!-- #primary -->


<?php get_footer(); ?>
