<?php if (have_rows('imobil_specifications', $productId)):
    while (have_rows('imobil_specifications', $productId)): the_row(); ?>
        <li>
            <i class="icon-camere"></i>
            <p>
                <?php if (get_sub_field('numar_camere')) {
                    the_sub_field('numar_camere');
                } else {
                    _e('N/A', 'jhfw');
                } ?>
            </p>
        </li>
        <li>
            <i class="icon-tip-constructie"></i>
            <p>
                <?php if (get_sub_field('tip_constructie')) {
                    the_sub_field('tip_constructie');
                } else {
                    _e('N/A', 'jhfw');
                } ?>
            </p>
        </li>
        <li>
            <i class="icon-etaj-apartament"></i>
            <p>
                <?php if (get_sub_field('etaj')) {
                    the_sub_field('etaj');
                } else {
                    _e('N/A', 'jhfw');
                } ?>
            </p>
        </li>
        <li>
            <i class="icon-grup-sanitar"></i>
            <p>
                <?php if (get_sub_field('grup_sanitar')) {
                    the_sub_field('grup_sanitar');
                } else {
                    _e('N/A', 'jhfw');
                } ?>
            </p>
        </li>
        <li>
            <i class="icon-parcare"></i>
            <p>
                <?php if (get_sub_field('loc_parcare')) {
                    the_sub_field('loc_parcare');
                } else {
                    _e('N/A', 'jhfw');
                } ?>
            </p>
        </li>
        <li>
            <i class="icon-regiune"></i>
            <p>
                <?php if ($region) {
                    echo $region;
                } else {
                    _e('N/A', 'jhfw');
                } ?>
            </p>
        </li>
        <li>
            <i class="icon-sector"></i>
            <p>
                <?php if ($sector) {
                    echo $sector;
                } else {
                    _e('N/A', 'jhfw');
                } ?>
            </p>
        </li>
        <li>
            <i class="icon-suprafata"></i>
            <p>
                <?php if (get_sub_field('suprafata_totala')) { ?>
                    <?php the_sub_field('suprafata_totala'); ?> m<sup>2</sup>
                <?php } else {
                    _e('N/A', 'jhfw');
                } ?>
            </p>
        </li>
        <li>
            <i class="icon-tip-oferta"></i>
            <p>
                <?php if ($typeOrder) {
                    echo $typeOrder;
                } else {
                    _e('N/A', 'jhfw');
                } ?>
            </p>
        </li>

    <?php endwhile;
endif;
?>