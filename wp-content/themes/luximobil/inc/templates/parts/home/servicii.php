<section class="section servicii-section">
    <div class="section-title">
        <h1><?php _e('Servicii', 'jhfw'); ?></h1>
    </div>
    <div class="servicii-content">
        <div class="container">

            <?php if (have_rows('servicii_home-s')):
                while (have_rows('servicii_home-s')) : the_row(); ?>
                    <a href="<?php the_sub_field('link_service'); ?>">
                        <div class="service-container">
                            <div class="container-icon">
                                <i class="<?php the_sub_field('icon_class'); ?>"></i>
                            </div>
                            <h3 class="title-service"><?php the_sub_field('title_service'); ?></h3>
                        </div>
                    </a>
                <?php endwhile;
                else: _e('Nu sunt servicii disponibile la moment','jhfw');
            endif; ?>
        </div>
    </div>
</section>