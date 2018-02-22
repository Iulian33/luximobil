<?php
/**
 * @package Site Theme
 */
?>
<div class="row">
    <div class="carousel-container col-sm-7 col-lg-7 col-xs-12">
        <div class="swiper-container gallery-top">
            <div class="swiper-wrapper">
                <?php if (have_rows('imobil_carousel')):
                    while (have_rows('imobil_carousel')) : the_row(); ?>
                        <?php $imobil_image = get_sub_field('imobil_image'); ?>
                        <?php if ($imobil_image) { ?>
                            <div class="swiper-slide"
                                 style="background-image: url(<?php echo $imobil_image['url']; ?>);">
                                <a href="<?php echo $imobil_image['url']; ?>" data-fancybox="imobil-carousel"></a>
                            </div>
                        <?php } ?>
                    <?php endwhile; ?>
                <?php endif; ?>
                <?php $video_url = get_field('imobil_video', false, false); ?>
                <?php if ($video_url) { ?>
                    <div class="swiper-slide" id="swiper-video">
                        <a data-fancybox="imobil-carousel" href="<?php echo $video_url; ?>">
                            <?php $imobil_video_thumbnail = get_field('imobil_video_thumbnail'); ?>
                            <div class="video-slide-image"
                                 style="background-image: url(<?php echo $imobil_video_thumbnail['url']; ?>);">
                                <i class="fa fa-play-circle"></i>
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>
            <div class="swiper-button-next swiper-button-white"></div>
            <div class="swiper-button-prev swiper-button-white"></div>
        </div>
        <div class="swiper-container gallery-thumbs">
            <div class="swiper-wrapper">
                <?php if (have_rows('imobil_carousel')):
                    while (have_rows('imobil_carousel')) : the_row();
                        $imobil_image = get_sub_field('imobil_image');
                        if ($imobil_image) { ?>
                            <div class="swiper-slide swiper-slide-bottom"
                                 style="background-image: url(<?php echo $imobil_image['url']; ?>);"></div>
                        <?php }
                        the_sub_field('sub_field_name');
                    endwhile;
                endif;
                $imobil_video_thumbnail = get_field('imobil_video_thumbnail');
                if ($imobil_video_thumbnail) { ?>
                    <div class="swiper-slide swiper-slide-bottom"
                         style="background-image: url(<?php echo $imobil_video_thumbnail['url']; ?>);">
                        <i class="fa fa-play-circle"></i>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <div class="col-sm-5 col-lg-5 col-xs-12">
        <div class="imobil-data">
            <h2 class="imobil-title">
                <?php
                $product_id = get_the_ID();
                $sectorsTerms = wp_get_post_terms($product_id, 'sectors_imobil');
                $regionTerms = wp_get_post_terms($product_id, 'regions_imobil');
                $region = @$regionTerms[0]->name;
                $sector = @$sectorsTerms[0]->name;

                if ($region && $sector) {
                    echo $region . ' , ';
                } elseif ($region) {
                    echo $region;
                }
                if ($sector) {
                    echo $sector;
                } ?>
            </h2>
            <h3 class="imobil-price">
                <?php
                $sale_price = get_field('sale_price');
                @$sale_price = number_format($sale_price, 0, '.', ' ');
                $regular_price = get_field('regular_price');
                $sale_check = get_field('enable_sale_price');
                @$regular_price = number_format($regular_price, 0, '.', ' ');

                if ($sale_price && $sale_check) {
                    echo $sale_price . ' €';
                } elseif ($regular_price) {
                    echo $regular_price . ' €';
                } ?>
            </h3>
            <div class="description-table">
                <table>
                    <?php
                    if (have_rows('imobil_specifications')):
                        while (have_rows('imobil_specifications')) :
                            the_row(); ?>
                            <tr>
                                <td class="description-label"><?php _e('Adresa', 'jhfw'); ?></td>
                                <td>
                                    <?php the_sub_field('adresa_imobil'); ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="description-label"><?php _e('Camere', 'jhfw'); ?></td>
                                <td>
                                    <?php the_sub_field('numar_camere'); ?>
                                </td>
                            </tr>
                            <?php $etaj = get_sub_field('etaj'); ?>
                            <?php if ($etaj) { ?>
                            <tr>
                                <td class="description-label"><?php _e('Etaj', 'jhfw'); ?></td>
                                <td>
                                    <?php echo $etaj; ?><?php _e(' / ');
                                    the_sub_field('etaje_cladire'); ?>
                                </td>
                            </tr>
                        <?php } ?>
                            <tr>
                                <td class="description-label"><?php _e('Stare', 'jhfw'); ?></td>
                                <td>
                                    <?php
                                    $stare = get_sub_field_object('stare');
                                    $current_value = $stare['value'];
                                    $current_choice = $stare['choices'][$current_value];
                                    echo $current_choice; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="description-label"><?php _e('Grup Sanitar', 'jhfw'); ?></td>
                                <td>
                                    <?php the_sub_field('grup_sanitar'); ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="description-label"><?php _e('Loc de Parcare', 'jhfw'); ?></td>
                                <td>
                                    <?php the_sub_field('loc_parcare'); ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="description-label"><?php _e('Plan Clădire', 'jhfw'); ?></td>
                                <td>
                                    <?php the_sub_field('plan_cladire'); ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="description-label"><?php _e('Tip Construcție', 'jhfw'); ?></td>
                                <td>
                                    <?php the_sub_field('tip_constructie'); ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="description-label"><?php _e('Suprafață Totală', 'jhfw'); ?></td>
                                <td>
                                    <?php the_sub_field('suprafata_totala'); ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="description-label"><?php _e('Balcon', 'jhfw'); ?></td>
                                <td>
                                    <?php the_sub_field('balcon'); ?>
                                </td>
                            </tr>
                        <?php endwhile;
                    endif; ?>
                </table>
            </div>
        </div>
    </div>
</div>