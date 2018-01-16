<section class="section categories-section">
    <?php
    $terms = get_terms('categorie_imobil', array(
        'hide_empty' => false,
    ));
    foreach ($terms as $key => $term) :
        if ($key < 4) {
            $term_id = $term->term_id;
            $term_name = $term->name;
            $term_slug = $term->slug;
            $term_image = get_field('image_category', 'categorie_imobil_' . $term_id);
            $term_link_chirie = '/imobil?&_sft_type_imobil=chirie&_sft_categorie_imobil=' . $term_slug;
            $term_link_vinzare = '/imobil?&_sft_type_imobil=vinzare&_sft_categorie_imobil=' . $term_slug;
            ?>
            <div class="category-box" style="background-image: url(<?php echo $term_image['url']; ?>);">
                <div class="mask-block">
                    <h2 class="category-name"><?php echo $term_name; ?></h2>
                    <ul class="buttons-options">
                        <li>
                            <a href="<?php echo $term_link_chirie; ?>" class="button">
                                <?php _e('Chirie', 'jhfw'); ?>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo $term_link_vinzare; ?>" class="button">
                                <?php _e('Vinzare', 'jhfw'); ?>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        <?php } ?>
    <?php endforeach; ?>
</section>
