<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 03-Jan-18
 * Time: 9:38 PM
 */

get_header(); ?>

<div id="primary" class="mainContent">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <main id="main" class="site-main" role="main">
                    <?php JH_check_sidebar(); ?>
                    <?php while (have_posts()) : the_post(); ?>

                        <?php get_template_part('content', 'single'); ?>

                        <?php the_post_navigation(); ?>

                        <?php
                        // If comments are open or we have at least one comment, load up the comment template
                        if (comments_open() || get_comments_number()) :
                            comments_template();
                        endif;
                        ?>

                    <?php endwhile; // end of the loop. ?>
                    <?php JH_check_sidebar("end"); ?>
                </main><!-- #main -->
            </div>
        </div>
    </div>
</div><!-- #primary -->


<?php get_footer(); ?>
