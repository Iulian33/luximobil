<?php
/**
 * The template for displaying all single posts.
 *
 * @package Site Theme
 */

get_header(); ?>

<div id="primary" class="mainContent">
    <div class="container">
        <div class="carousel-container col-sm-7 col-lg-7">
            <div class="swiper-container gallery-top">
                <div class="swiper-wrapper">
                    <?php if (have_rows('imobil_carousel')):

                        while (have_rows('imobil_carousel')) : the_row(); ?>

                            <?php $imobil_image = get_sub_field('imobil_image'); ?>
                            <div class="swiper-slide"
                                 style="background-image: url(<?php echo $imobil_image['url']; ?>);"></div>
                        <?php endwhile; ?>
                    <?php else : ?>
                        // no rows found
                    <?php endif; ?>
                </div>
                <!-- Add Arrows -->
                <div class="swiper-button-next swiper-button-white"></div>
                <div class="swiper-button-prev swiper-button-white"></div>
            </div>


            <div class="swiper-container gallery-thumbs">
                <div class="swiper-wrapper">
                    <?php if (have_rows('imobil_carousel')): ?>

                        <?php while (have_rows('imobil_carousel')) : the_row(); ?>
                            <?php $imobil_image = get_sub_field('imobil_image'); ?>
                            <div class="swiper-slide swiper-slide-bottom"
                                 style="background-image: url(<?php echo $imobil_image['url']; ?>);"></div>

                            <?php the_sub_field('sub_field_name'); ?>

                        <?php endwhile; ?>

                    <?php else : ?>

                        // no rows found

                    <?php endif; ?>

                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-7 col-lg-5">
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
