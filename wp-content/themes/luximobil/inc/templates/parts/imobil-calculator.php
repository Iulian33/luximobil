<?php
$sale_price = get_field('sale_price');
$regular_price = get_field('regular_price');
$sale_check = get_field('enable_sale_price');
?>

<div class="calculator">
    <p>
        <?php _e('Calculează ratele de finanțare', 'jhfw'); ?>
    </p>
    <div class="divider"></div>
    <div class="row">
        <div class="first-column col-sm-6">
            <p>
                <?php _e('Prima rată : %', 'jhfw'); ?>
            </p>
            <input id="rata-procent" type="number" value="30" max="100">
            <p>
                <?php _e("Prima rată €", 'jhfw'); ?>
            </p>
            <input id="rata-numericValue" type="number" value="0">
        </div>
        <div class="second-column col-sm-6">
            <p>
                <?php _e('Rambursare', 'jhfw'); ?>
            </p>
            <input id="rambursare" type="number" value="5">
            <p>
                <?php _e("Pret imobil €", 'jhfw'); ?>
            </p>
            <input id="calc-pret-imobil" type="number" value="<?php if ($sale_price && $sale_check) {
                echo $sale_price;
            } elseif($regular_price) {
                echo $regular_price;
            } ?>">
        </div>
    </div>
    <div class="final-results">
        <p>
            <?php _e('Plata lunară : - ', 'jhfw'); ?>
            <span><span id="plata-lunara">1300 </span><?php echo ' €'?></span>
        </p>
        <p>
            <?php _e('Suma finanțată : - ', 'jhfw'); ?>
           <span><span id="suma-finantata">1400 </span><?php echo ' €'?></span>
        </p>
    </div>
    <input id="procent-anual" type="hidden" value="13.5">
</div>