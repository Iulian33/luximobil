<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Site Theme
 */
?>


<footer class="mainFooter">
    <div class="upperFooter">
        <div class="container">
            Upper Footer
        </div>
    </div>
    <div class="lowerFooter">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 copyright">
                    <?php the_field('copyright', 'option'); ?>
                    <?php echo date("Y"); ?>
                    <?php wp_nav_menu(array("theme_location" => 'footer', 'menu_class' => 'footerMenu', 'container' => '')); ?>
                </div>
                <div class="col-sm-6 credits">
                    <?php JHCredits(); ?>
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
