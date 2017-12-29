<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Site Theme
 */

if ( get_field('activeer_sidebar') == 'option2' ) {
	return;
} 
?>
<div class="widget-area col-sm-4" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div><!--rightContent-->







