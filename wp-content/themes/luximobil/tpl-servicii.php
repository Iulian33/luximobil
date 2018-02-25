<?php
/*
 *Template Name: Servicii
*/
get_header(); ?>
<div class="main-content">
    <div class="container content-servicii">
        <?php if (have_rows('servicii_repeater')):
            while (have_rows('servicii_repeater')) : the_row(); ?>
                <section class="service-tab-container">
                    <div class="section-indicator" id="<?php the_sub_field('service_section_id'); ?>"></div>
                    <div class="circle-container">
                        <?php if (have_rows('heading_service')):
                            while (have_rows('heading_service')): the_row(); ?>
                                <i class="<?php the_sub_field('icon_class'); ?>"></i>
                                <h3 class="service-title">
                                    <?php the_sub_field('name_service'); ?>
                                </h3>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                    <div class="content-inner">
                        <?php the_sub_field('descriere_serviciu'); ?>
                    </div>
                </section>
            <?php endwhile;
        endif; ?>
    </div>
</div>
<?php get_footer(); ?>
