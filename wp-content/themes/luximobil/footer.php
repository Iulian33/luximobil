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
    <div class="container">
        <div class="row">
            <div class="col-sm-3 col-widget">
                <div class="bg-contacts"></div>
                <div class="contacts-contaner">
                    <?php dynamic_sidebar( 'footer-contacts' ); ?>
                </div>
            </div>
            <div class="col-sm-9">
                <div class="row">
                    <div class="col-sm-3 col-widget menu-1">
                        <?php dynamic_sidebar( 'footer-menu-1' ); ?>
                    </div>
                    <div class="col-sm-3 col-widget menu-2">
                        <?php dynamic_sidebar( 'footer-menu-2' ); ?>
                    </div>
                    <div class="col-sm-8 col-widget footer-about">
                        <?php dynamic_sidebar('footer-about'); ?>
                    </div>
                    <div class="col-sm-12 credits-bttom-footer">
                        <span class="copy-right-text">
                            <?php _e('© Copyright')?>
                            <?php echo date("Y"); ?>
                        </span>
                        <span class="credits-link">
                            <?php JHCredits(); ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>





<div id="mobilemenu" class="displayNone"></div>
<?php wp_footer(); ?>

</body>
</html>
