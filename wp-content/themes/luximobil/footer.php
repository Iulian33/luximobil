<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Site Theme
 */
?>
<?php $footer_bg_img = get_field('footer_background_image','option'); ?>

<footer class="mainFooter" style="background-image: url(<?php echo $footer_bg_img['url'];?>);">
    <div class="footer-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-sm-3 col-widget">
                <div class="bg-contacts"></div>
                <div class="contacts-contaner">
                    <?php dynamic_sidebar( 'footer-contacts' ); ?>
                </div>
            </div>
            <div class="col-sm-3 col-widget">
                <?php dynamic_sidebar( 'footer-menu-1' ); ?>
            </div>
            <div class="col-sm-3 col-widget">
                <?php dynamic_sidebar( 'footer-menu-2' ); ?>
            </div>
            <div class="col-sm-3 col-widget">
                <?php dynamic_sidebar('footer-about'); ?>
            </div>
        </div>
    </div>



<!--    <div class="lowerFooter">-->
<!--        <div class="container">-->
<!--            <div class="row">-->
<!--                <div class="col-sm-6 copyright">-->
<!--                    --><?php //the_field('copyright', 'option'); ?>
<!--                    --><?php //echo date("Y"); ?>
<!--                    --><?php //wp_nav_menu(array("theme_location" => 'footer', 'menu_class' => 'footerMenu', 'container' => '')); ?>
<!--                </div>-->
<!--                <div class="col-sm-6 credits">-->
<!--                    --><?php //JHCredits(); ?>
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
</footer>
</div>





<div id="mobilemenu" class="displayNone"></div>
<?php wp_footer(); ?>

</body>
</html>
