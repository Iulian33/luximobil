<?php
/**
 * The template for displaying all single posts.
 *
 * @package Site Theme
 */

get_header(); ?>
<div id="primary" class="mainContent">
    <div class="container">
        <?php get_template_part('content', 'single-imobil'); ?>
        <div class="row">
            <div class="col-xs-12 col-sm-7 col-lg-7">
                <?php while (have_posts()) : the_post(); ?>
                    <div class="imobil-description">
                        <div class="description">
                            <?php the_content(); ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-7">
                <?php include "inc/templates/parts/imobil-calculator.php"; ?>
            </div>
        </div>
        <?php include "inc/templates/parts/similar-products.php"; ?>
    </div>
</div>
<?php get_footer(); ?>
