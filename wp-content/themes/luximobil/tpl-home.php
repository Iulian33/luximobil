<?php
/*
 *Template Name: Home
*/
get_header(); ?>

<div class="mainContent">

    <?php
    // Home Sections inclode here
    include ('inc/templates/parts/home/categories-section.php');
    include ('inc/templates/parts/home/apartaments-carousel.php');
    include ('inc/templates/parts/home/special-ofert.php');
    include ('inc/templates/parts/home/servicii.php');
    ?>

</div><!--mainContent-->

<?php get_footer(); ?>
