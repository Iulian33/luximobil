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
                            <?php the_content(); ?>
                        </div>
                    </div>
                <?php endwhile; // end of the loop. ?>
                <?php JH_check_sidebar("end"); ?>
            </div>
        </div>
        <div class="row related-products-container">

            <?php $default_post_thumbnail = get_template_directory_uri() . '/images/default-img-post.jpg';

            $related_posts = related_products('imobil', 'sectors_imobil', '4'); ?>

            <?php foreach ($related_posts as $product) { ?>
                <div class="post-item-container col-sm-3">
                    <a class="post-item-imobil" href="<?php the_permalink(); ?>">
                        <?php
                        $product_id = $product->ID;
                        $sectorsTerms = wp_get_post_terms($product_id, 'sectors_imobil');
                        $regionTerms = wp_get_post_terms($product_id, 'regions_imobil');
                        $region = @$regionTerms[0]->name;
                        $sector = @$sectorsTerms[0]->name;


                        if (get_the_post_thumbnail($product_id)) { ?>
                            <img src="<?php echo get_the_post_thumbnail_url($product_id, 'post-size'); ?>"
                                 alt="default-post image">
                        <?php } else { ?>
                            <img class="default-post-img" src="<?php echo $default_post_thumbnail; ?>"
                                 alt="default-post image">
                        <?php } ?>
                        <div class="price-product">
                            <?php
                            $regular_price = get_field('regular_price', $product_id);
                            $sale_check = get_field('enable_sale_price', $product_id);
                            $sale_price = get_field('sale_price', $product_id);
                            if ($sale_price) {
                                $sale_price = number_format($sale_price, 0, '.', ' ');
                            } else {
                                $regular_price = number_format($regular_price, 0, '.', ' ');
                            }
                            ?>

                            <?php if ($sale_price && $sale_check) { ?>
                                <?php echo $sale_price . ' €'; ?>
                            <?php } else { ?>
                                <?php echo $regular_price . ' €'; ?>
                            <?php } ?>
                        </div>
                        <div class="info-container">
                                    <span class="title-post">
                                        <?php if ($region && $sector) {
                                            echo $region . ' , ';
                                        } elseif ($region) {
                                            echo $region;
                                        }
                                        if ($sector) {
                                            echo $sector;
                                        } ?>
                                    </span>
                            <?php if (have_rows('imobil_specifications', $product_id)):
                                while (have_rows('imobil_specifications', $product_id)): the_row(); ?>
                                    <div class="adresss-product">
                                        <?php the_sub_field('adresa_imobil'); ?>
                                    </div>
                                    <div class="row specs-product">
                                        <div class="col-xs-4">
                                            <i class="fa fa-th-large" aria-hidden="true"></i>
                                            <?php the_sub_field('numar_camere'); ?>
                                        </div>
                                        <div class="col-xs-4">
                                            <i class="fa fa-square-o" aria-hidden="true"></i>
                                            <?php the_sub_field('suprafata_totala'); ?>
                                            <span>m<sup>2</sup> </span>
                                        </div>
                                        <div class="col-xs-4">
                                            <i class="fa fa-bath" aria-hidden="true"></i>
                                            <?php
                                            $grup_snitar = get_sub_field('grup_sanitar');
                                            $grup_snitar = preg_replace('/[^0-9.]+/', '', $grup_snitar);
                                            echo $grup_snitar;
                                            ?>
                                        </div>
                                        <div class="col-xs-12">
                                            <a href="<?php the_permalink($product_id); ?>"
                                               class="button go-to-product">
                                                <?php _e('Vezi', 'jhfw'); ?>
                                            </a>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                    </a>
                </div>

            <?php } ?>

        </div>

    </div>

</div><!-- #primary -->


<?php get_footer(); ?>
