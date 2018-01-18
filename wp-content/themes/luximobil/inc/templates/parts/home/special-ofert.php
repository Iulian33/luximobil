<?php
$backgroundSPOImg = get_field('background_section_SPO');
$overlayColor = get_field('overlay_color_SP');

$args = array(
    'post_type' => 'imobil',
    'post_status' => 'publish'
);

$WPproducts = new WP_Query($args);
$products = $WPproducts->posts;
?>
<section class="section section-special-ofert"
         style="background-image: url(<?php echo $backgroundSPOImg['url']; ?>);">
    <div class="overlay-section" style="background-color: <?php echo $overlayColor; ?>"></div>
    <div class="container">
        <div class="content-inner">
            <div class="row">
                <div class="col-md-5 col-sm-12">
                    <ul class="list-specs">
                        <?php
                        foreach ($products as $product) {
                            $productId = $product->ID;
                            @$special_ofert_ckecbox = get_field('special_ofert', $productId);
                            $sectorsTerms = wp_get_post_terms($productId, 'sectors_imobil');
                            $regionTerms = wp_get_post_terms($productId, 'regions_imobil');
                            $typeOrdersTerms = wp_get_post_terms($productId, 'type_imobil');
                            $region = @$regionTerms[0]->name;
                            $sector = @$sectorsTerms[0]->name;
                            $typeOrder = @$typeOrdersTerms[0]->name;
                            if (@$special_ofert_ckecbox[0] == 'enable_special_ofert') {
                                // List with all Specs
                                include('addons/specs-list.php');
                                break;
                            }
                        }
                        ?>
                    </ul>
                </div>
                <div class="col-md-7 col-sm-12">
                    <div class="product-container">
                        <div class="row content-prod">
                            <?php
                            foreach ($products as $product) {
                                $productId = $product->ID;
                                $special_ofert_ckecbox = get_field('special_ofert', $productId);
                                if (@$special_ofert_ckecbox[0] == 'enable_special_ofert') {
                                    $productThumbnail = get_the_post_thumbnail_url($productId);
                                    $productContent = $product->post_content;
                                    $sectorsTerms = wp_get_post_terms($productId, 'sectors_imobil');
                                    $regionTerms = wp_get_post_terms($productId, 'regions_imobil');
                                    $region = @$regionTerms[0]->name;
                                    $sector = @$sectorsTerms[0]->name;
                                    ?>
                                    <div class="col-sm-5">
                                        <div class="image-container"
                                             style="background-image: url(<?php echo $productThumbnail; ?>);">
                                        </div>
                                    </div>
                                    <div class="col-sm-7 info-product-side">

                                        <h1 class="title-product-ofert">
                                            <?php if ($region && $sector) {
                                                echo $region . ' , ';
                                            } elseif ($region) {
                                                echo $region;
                                            }
                                            if ($sector) {
                                                echo $sector;
                                            } ?>
                                        </h1>
                                        <?php if (have_rows('imobil_specifications', $productId)):
                                            while (have_rows('imobil_specifications', $productId)): the_row(); ?>
                                                <span class="adresss-product-ofert">
                                                        <?php the_sub_field('adresa_imobil'); ?>
                                                    </span>
                                            <?php endwhile; ?>
                                        <?php endif; ?>
                                        <div class="price-ofert">
                                            <?php
                                            $regular_price = get_field('regular_price', $productId);
                                            $sale_check = get_field('enable_sale_price', $productId);
                                            $sale_price = get_field('sale_price', $productId);
                                            if ($sale_price) {
                                                $sale_price = number_format($sale_price, 0, '.', ' ');
                                            } else {
                                                $regular_price = number_format($regular_price, 0, '.', ' ');
                                            }

                                            if ($sale_price && $sale_check) {
                                                echo $sale_price . ' €';
                                            } else {
                                                echo $regular_price . ' €';
                                            }
                                            ?>
                                        </div>
                                        <div class="description-product-ofert">
                                            <?php echo my_content(40, $productContent, '...'); ?>
                                        </div>
                                        <a href="<?php the_permalink($productId); ?>" class="button">
                                            <?php _e('Vezi Detalii'); ?>
                                        </a>
                                    </div>
                                    <?php break;
                                }
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>