<?php if (have_rows('imobil_specifications', $productId)):
    while (have_rows('imobil_specifications', $productId)): the_row(); ?>
        <li>
            <i class="icon-camere"></i>
            <p><?php the_sub_field('numar_camere'); ?></p>
        </li>
        <li>
            <i class="icon-tip-constructie"></i>
            <p><?php the_sub_field('tip_constructie'); ?></p>
        </li>
        <li>
            <i class="icon-etaj-apartament"></i>
            <p><?php the_sub_field('etaj'); ?></p>
        </li>
        <li>
            <i class="icon-grup-sanitar"></i>
            <p><?php the_sub_field('grup_sanitar'); ?></p>
        </li>
        <li>
            <i class="icon-parcare"></i>
            <p><?php the_sub_field('loc_parcare'); ?></p>
        </li>
        <li>
            <i class="icon-regiune"></i>
            <p><?php echo $region; ?></p>
        </li>
        <li>
            <i class="icon-sector"></i>
            <p><?php echo $sector; ?></p>
        </li>
        <li>
            <i class="icon-suprafata"></i>
            <p><?php the_sub_field('suprafata_totala'); ?> m<sup>2</sup></p>
        </li>
        <li>
            <i class="icon-tip-oferta"></i>
            <p><?php echo $typeOrder; ?></p>
        </li>

    <?php endwhile;
endif;
?>