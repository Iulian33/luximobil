<!-- Loturi de Teren Products -->
<?php $args = array(
    'post_type' => 'imobil',
    'posts_per_page' => 2,
    'tax_query' => array(
        array(
            'taxonomy' => 'categorie_imobil',
            'field' => 'slug',
            'terms' => 'spatii-comerciale',
        ),
    ),
);
$products = new WP_Query($args);
if ($products->have_posts()) {
    $i = 0;
    while ($products->have_posts()) : $products->the_post(); ?>
        <div class="post-item-container">
            <a class="post-item-imobil" href="<?php the_permalink(); ?>">
                <?php
                $sectorsTerms = wp_get_post_terms(get_the_ID(), 'sectors_imobil');
                $regionTerms = wp_get_post_terms(get_the_ID(), 'regions_imobil');
                $region = @$regionTerms[0]->name;
                $sector = @$sectorsTerms[0]->name;
                $product_id = $products->posts[$i]->ID;
                $i++;
                ?>
                <img class="post-thumbnail" src="<?php echo get_the_post_thumbnail_url(null, 'wide-thumbnail'); ?>"
                     alt="pos-thumbnail">
                <div class="price-product">
                    <?php
                    $regular_price = get_field('regular_price');
                    $sale_check = get_field('enable_sale_price');
                    $sale_price = get_field('sale_price');
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
                            <div class="col-xs-12">
                                <a href="<?php the_permalink($product_id); ?>"
                                   class="button go-to-product">
                                    <?php _e('Vezi Detalii', 'jhfw'); ?>
                                </a>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </a>
        </div>
    <?php endwhile;
    wp_reset_postdata();
} ?>