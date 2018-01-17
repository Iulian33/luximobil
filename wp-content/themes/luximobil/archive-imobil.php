<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Site Theme
 */

get_header(); ?>
<div class="mainContent">
    <div class="container archive-imobil">
        <div class="col-sm-3">
            <?php echo do_shortcode('[searchandfilter id="418"]'); ?>
            <?php $default_post_thumbnail = get_template_directory_uri() . '/images/default-img-post.jpg'; ?>
        </div>
        <div class="col-sm-9 products-results">
            <?php if (have_posts()) :
                $i = 0;
                while (have_posts()) : the_post(); ?>
                    <div class="post-item-container col-sm-4">
                        <a class="post-item-imobil" href="<?php the_permalink(); ?>">
                            <?php
                            $sectorsTerms = wp_get_post_terms(get_the_ID(), 'sectors_imobil');
                            $regionTerms = wp_get_post_terms(get_the_ID(), 'regions_imobil');
                            $region = @$regionTerms[0]->name;
                            $sector = @$sectorsTerms[0]->name;
                            $product_id = get_the_ID();
                            $i++;
                            if (get_the_post_thumbnail($product_id)) {
                                the_post_thumbnail('post-size');
                            } else { ?>
                                <img class="default-post-img" src="<?php echo $default_post_thumbnail; ?>"
                                     alt="default-post image">
                            <?php }
                            $regular_price = get_field('regular_price', $product_id);
                            $sale_check = get_field('enable_sale_price', $product_id);
                            $sale_price = get_field('sale_price', $product_id);
                            if ($regular_price) { ?>
                            <div class="price-product">
                                <?php if ($sale_price || $sale_price) {
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
                            <?php } ?>
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

                <?php endwhile; ?>
                <div class="pagination-container">
                    <?php custom_paging_nav($wp_query); ?>
                </div>

            <?php else : ?>
                <?php get_template_part('content', 'none'); ?>
            <?php endif; ?>
        </div>
    </div>
</div><!--mainContent-->
<?php get_footer(); ?>
