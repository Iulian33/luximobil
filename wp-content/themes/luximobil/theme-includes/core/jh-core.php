<?php
/**
 * Theme core require
 */

require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/extras.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/jetpack.php';

/// Add Quicktags
function JHQuickTags() {
    if (wp_script_is('quicktags')) {
        ?>
        <script type="text/javascript">
            QTags.addButton('JHh1', 'H1', '<div class="h1">', '</div>', '', 'H1 Custom', 21);
            QTags.addButton('JHh2', 'H2', '<div class="h2">', '</div>', '', 'H2 Custom', 21);
            QTags.addButton('JHh3', 'H3', '<div class="h3">', '</div>', '', 'H3 Custom', 21);
            QTags.addButton('JHh4', 'H4', '<div class="h4">', '</div>', '', 'H4 Custom', 21);
            QTags.addButton('JHh5', 'H5', '<div class="h5">', '</div>', '', 'H5 Custom', 21);
        </script>
        <?php
    }
}

add_action('admin_print_footer_scripts', 'JHQuickTags');