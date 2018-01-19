<?php
/**
 * @package Site Theme
 */
?>
<div class="row">

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

                <div class="swiper-slide" id="swiper-video">
                    <?php
                    $video = get_field('imobil_video');
                    echo $video;
                    ?>
                </div>
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
                <?php $imobil_video_thumbnail = get_field('imobil_video_thumbnail'); ?>
                <div class="swiper-slide swiper-slide-bottom" style="background-image: url("<?php  $imobil_video_thumbnail['url'];?>");"> </div>
            </div>
        </div>
    </div>


    <div class="col-sm-5">
        <div class="imobil-data">
            <h2 class="imobil-title">
                <?php the_title(); ?>
            </h2>
            <h3 class="imobil-price">
                <?php
                $sale_price = get_field('sale_price');
                $sale_price = number_format($sale_price, 0, '.', ' ');
                $regular_price = get_field('regular_price');
                $regular_price = number_format($regular_price, 0, '.', ' ');

                if ($sale_price) {
                    echo $sale_price . ' €';
                } else {
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
                            <tr>
                                <td class="description-label"><?php _e('Etaje Clădire', 'jhfw'); ?></td>
                                <td>
                                    <?php the_sub_field('etaj'); ?><?php _e('/'); the_sub_field('etaje_cladire'); ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="description-label"><?php _e('Stare', 'jhfw'); ?></td>
                                <td>
                                    <?php
                                    $stare = get_sub_field_object('stare');
                                    $current_value = $stare['value'];
                                    $current_choice = $stare['choices'][$current_value];
                                    echo $current_choice;
                                    ?>

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
                    endif;
                    ?>
                </table>
            </div>
        </div>
    </div>

</div>