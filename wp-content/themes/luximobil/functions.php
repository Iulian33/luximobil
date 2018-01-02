<?php
/**
 * Site Theme functions and definitions
 *
 * @package Site Theme
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'JH_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function JH_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Site Theme, use a find and replace
	 * to change 'JH Framework' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'jhfw', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'jhfw' ),
		'footer' => __( 'Footer Menu', 'jhfw' ),
		'category' => __( 'Category Menu', 'jhfw' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

//	/*
//	 * Enable support for Post Formats.
//	 * See http://codex.wordpress.org/Post_Formats
//	 */
//	add_theme_support( 'post-formats', array(
//		'aside', 'image', 'video', 'quote', 'link',
//	) );

}
endif; // JH_setup
add_action( 'after_setup_theme', 'JH_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function JH_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'jhfw' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="widget-title">',
		'after_title'   => '</div>',
	) );
    register_sidebar( array(
        'name'          => __( 'Language Sidebar', 'jhfw' ),
        'id'            => 'language-area',
        'description'   => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<div class="widget-title">',
        'after_title'   => '</div>',
    ) );

}
add_action( 'widgets_init', 'JH_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function JH_scripts() {

	// Imports of styles
	wp_enqueue_style( 'fonts-awesome', get_template_directory_uri().'/css/font-awesome/4.7.0/css/font-awesome.min.css' );
	wp_enqueue_style( 'animate-css', get_template_directory_uri().'/js/js_libraries/owl.carousel/animate.css' );
	wp_enqueue_style( 'owl-carousel', get_template_directory_uri().'/js/js_libraries/owl.carousel/owl.carousel.css' );
	wp_enqueue_style( 'mmenu', get_template_directory_uri().'/js/js_libraries/mmenu/jquery.mmenu.all.css' );
	wp_enqueue_style( 'main-style', get_template_directory_uri().'/style.css' );
	wp_enqueue_style( 'icomoon', get_template_directory_uri().'/fonts/icomoon/style.css' );

    // Import Of Scripts
	wp_enqueue_script( 'JH-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'JH-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	wp_enqueue_script( 'owl-carousel', get_template_directory_uri().'/js/js_libraries/owl.carousel/owl.carousel.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'mmenu', get_template_directory_uri().'/js/js_libraries/mmenu/jquery.mmenu.min.all.js', array('jquery'), '', true );
	wp_enqueue_script( 'dropkick', get_template_directory_uri().'/js/js_libraries/dropkick.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'mainjs', get_template_directory_uri().'/js/main.js', array('jquery'), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'JH_scripts' );
add_filter( 'gform_init_scripts_footer', '__return_true' );


//load JH login styles
function JH_login_screen_style() {
  	wp_enqueue_style( 'JH_development', get_template_directory_uri().'/css/JHfw_login_style.css', false );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'owl-carousel', get_template_directory_uri().'/css/functions.js', array('jquery'), '', true );
}
add_action( 'login_enqueue_scripts', 'JH_login_screen_style', 10 );



add_action('login_message', 'header_form_messge');
function header_form_messge(){
	echo '<h1 class="logo_insign"> <img src="'. get_template_directory_uri() . '/images/Jh-insign.png" alt="Julian Hook Framework"> </h1>';
}


function admin_color_schemes() {
    //Get the theme directory
    $theme_dir = get_template_directory_uri();
 
    //Jh Framework
    wp_admin_css_color( 'green', __( 'JH Colors' ),
        get_template_directory_uri().'/css/admin-colors.css',
        array( '#1DE9B6', '#000', '#004D40', '#f2fcff' )
    );
}
add_action('admin_init', 'admin_color_schemes');

function set_default_admin_color($user_id) {
    $args = array(
        'ID' => $user_id,
        'admin_color' => 'orange'
    );
    wp_update_user( $args );
}
add_action('user_register', 'set_default_admin_color');

function adminbar_styles() {
	if ( is_admin_bar_showing() ) {

		// Admin-bar Style 
		$theme_dir = get_template_directory_uri();
		wp_enqueue_style( 'admin-bar-overrides', get_template_directory_uri().'/css/admin-colors.css', array( 'admin-bar' ), null, 'all' );
	}
}
add_action( 'wp_head', 'adminbar_styles' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

//Add Theme Settings
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> '',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Standaard Settings',
		'menu_title'	=> 'Standard Settings',
		'parent_slug'	=> 'theme-general-settings',
	));
    acf_add_options_sub_page(array(
        'page_title' 	=> 'Footer Settings',
        'menu_title'	=> 'Footer',
        'parent_slug'	=> 'theme-general-settings',
    ));
}

//get custom numbers of words from content
function my_content( $limit, $text = false, $word = false) {
	if(!$word){
		$word = __('Read more', 'jhfw');
	}
	if( $text ) {
		$content = $text;
	} else {
		$content = get_the_content();
	}
	$content = strip_tags($content);
	$content = explode( " ", $content );
	if ( count( $content ) > $limit ) {
		$trim = true;
	}
	$content = array_slice( $content, 0, $limit, true );
	if ( $trim ) {
		$index = count( $content ) - 1;
		$last = $content[$index];
		if($word){
			$last = $last.'<a href="'.get_permalink().'"> '.$word.'</a>';
		}
		$content[$index] = $last;
	}
	$content = implode( " ", $content );

	return $content;
}


// remove wp version param from any enqueued scripts
function vc_remove_wp_ver_css_js( $src ) {
    if ( strpos( $src, 'ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}
add_filter( 'style_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
add_filter( 'script_loader_src', 'vc_remove_wp_ver_css_js', 9999 );


//custom query pagination
if ( ! function_exists( 'custom_paging_nav' ) ) :
/**
* Display navigation to next/previous set of posts when applicable.
*
* @since Twenty Fourteen 1.0
*
* @global WP_Query   $wp_query/$custom_query  WordPress Query object.
* @global WP_Rewrite $wp_rewrite WordPress Rewrite object.
*/
function custom_paging_nav( $custom_query ) {
	global $wp_rewrite;

	// Don't print empty markup if there's only one page.
	if ( $custom_query->max_num_pages < 2 ) {
		return;
	}

	$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
	$pagenum_link = html_entity_decode( get_pagenum_link() );
	$query_args   = array();
	$url_parts    = explode( '?', $pagenum_link );

	if ( isset( $url_parts[1] ) ) {
		wp_parse_str( $url_parts[1], $query_args );
	}

	$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
	$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

	$format  = $wp_rewrite->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
	$format .= $wp_rewrite->using_permalinks() ? user_trailingslashit( $wp_rewrite->pagination_base . '/%#%', 'paged' ) : '?paged=%#%';

	// Set up paginated links.
	$links = paginate_links( array(
		'base'     => $pagenum_link,
		'format'   => $format,
		'total'    => $custom_query->max_num_pages,
		'current'  => $paged,
		'mid_size' => 1,
		'add_args' => array_map( 'urlencode', $query_args ),
		'prev_text' => __( '&larr; Previous', 'twentyfourteen' ),
		'next_text' => __( 'Next &rarr;', 'twentyfourteen' ),
	) );

	if ( $links ) :

?>
<nav class="navigation paging-navigation" role="navigation">
	<div class="screen-reader-text"><?php _e( 'Posts navigation', 'twentyfourteen' ); ?></div>
	<div class="pagination loop-pagination">
		<?php echo $links; ?>
	</div><!-- .pagination -->
</nav><!-- .navigation -->
<?php
	endif;
}
endif;


//default pagination
if ( ! function_exists( 'default_paging_nav' ) ) :
/**
* Display navigation to next/previous set of posts when applicable.
*
* @since Twenty Fourteen 1.0
*
* @global WP_Query   $wp_query/$custom_query  WordPress Query object.
* @global WP_Rewrite $wp_rewrite WordPress Rewrite object.
*/
function default_paging_nav() {
	global $wp_query, $wp_rewrite;

	// Don't print empty markup if there's only one page.
	if ( $wp_query->max_num_pages < 2 ) {
		return;
	}

	$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
	$pagenum_link = html_entity_decode( get_pagenum_link() );
	$query_args   = array();
	$url_parts    = explode( '?', $pagenum_link );

	if ( isset( $url_parts[1] ) ) {
		wp_parse_str( $url_parts[1], $query_args );
	}

	$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
	$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

	$format  = $wp_rewrite->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
	$format .= $wp_rewrite->using_permalinks() ? user_trailingslashit( $wp_rewrite->pagination_base . '/%#%', 'paged' ) : '?paged=%#%';

	// Set up paginated links.
	$links = paginate_links( array(
		'base'     => $pagenum_link,
		'format'   => $format,
		'total'    => $wp_query->max_num_pages,
		'current'  => $paged,
		'mid_size' => 1,
		'add_args' => array_map( 'urlencode', $query_args ),
		'prev_text' => __( '&larr; Previous', 'twentyfourteen' ),
		'next_text' => __( 'Next &rarr;', 'twentyfourteen' ),
	) );

	if ( $links ) :

?>
<nav class="navigation paging-navigation" role="navigation">
	<div class="screen-reader-text"><?php _e( 'Posts navigation', 'twentyfourteen' ); ?></div>
	<div class="pagination loop-pagination">
		<?php echo $links; ?>
	</div><!-- .pagination -->
</nav><!-- .navigation -->
<?php
	endif;
}
endif;

//custom sidebar check function
function JH_check_sidebar( $point = "start" ) {
	if( is_active_sidebar('sidebar-1') ) {
		if( $point == "start" ) {
			echo "<div class='col-sm-8'>";
		} elseif ( $point == "end" ) {
			echo "</div><!--leftContent-->";
			get_sidebar();
		} else {
			echo "please write the right code !!!!!!";
		}
	}
}

add_action('admin_head', 'admin_styles');
function admin_styles() {	?>
	<style>
		.acf-editor-wrap iframe {
			height: 100px !important;
			max-height: 200px;
		}
	</style>
	<?php
}


get_template_part('inc/shortcodes/JH-shortcodes');


/// Add Quicktags
function JHQuickTags() {

	if ( wp_script_is( 'quicktags' ) ) {
	?>
	<script type="text/javascript">
	QTags.addButton( 'JHh1', 'H1', '<div class="h1">', '</div>', '', 'H1 Custom', 21 );
	QTags.addButton( 'JHh2', 'H2', '<div class="h2">', '</div>', '', 'H2 Custom', 21 );
	QTags.addButton( 'JHh3', 'H3', '<div class="h3">', '</div>', '', 'H3 Custom', 21 );
	QTags.addButton( 'JHh4', 'H4', '<div class="h4">', '</div>', '', 'H4 Custom', 21 );
	QTags.addButton( 'JHh5', 'H5', '<div class="h5">', '</div>', '', 'H5 Custom', 21 );
	</script>
	<?php
	}

}
add_action( 'admin_print_footer_scripts', 'JHQuickTags' );

function JH_add_editor_styles() {
    add_editor_style( 'css/jhfw-editor-style.css' );
}
add_action( 'admin_init', 'JH_add_editor_styles' );


function JHUseSidebar() {
	//the_field('use_sidebar_select');
	global $wp_query;
    $post_id = $wp_query->get_queried_object_id();
    $sidebarCheck = get_field('activation_sidebar', $post_id);

    //echo $sidebarCheck;


if($sidebarCheck) {
		if($sidebarCheck == 'option2') {
			$use_sidebar =  "sidebarNo";
		} else if($sidebarCheck == 'option1') {
			$use_sidebar = 'sidebarYes';
		}
		return $use_sidebar;
	}
}


add_filter( 'style_loader_tag', 'add_property_attribute', 10, 2 );
function add_property_attribute($link, $handle) {
     $link = str_replace( '/>', 'property />', $link );
   return $link;
}

function JHCredits() {
    $creditsText = '<a href="#JHSite" target="_blank">'.__('Development by Julian Hook', 'jhfw').'</a>';
    echo $creditsText;
}

get_template_part('inc/templates/widgets/acf-repeater-widget');

function google_fonts() {
	$query_args = array(
		//'family' => 'Open+Sans:400,700|Oswald:700'
		//'subset' => 'latin',
	);
	wp_register_style( 'google_fonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null );
            }
            
add_action('wp_enqueue_scripts', 'google_fonts');

function JH_jquery_to_footer() {
	if( is_admin())
		return;

	wp_script_add_data('jquery', 'group', 1);
	wp_script_add_data('jquery-core', 'group', 1);
	wp_script_add_data('jquery-migrate', 'group', 1);
}
add_action('wp','JH_jquery_to_footer');



function my_acf_google_map_api( $api ){
	$api['key'] = 'AIzaSyDPEng8fkd9N8nWbWDZBjoyKT0Q_ZM1r2Q';

	return $api;

}

add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');


add_filter( 'gform_init_scripts_footer', '__return_true' );
add_filter( 'gform_cdata_open', 'wrap_gform_cdata_open', 1 );
function wrap_gform_cdata_open( $content = '' ) {
	if ( ( defined('DOING_AJAX') && DOING_AJAX ) || isset( $_POST['gform_ajax'] ) ) {
		return $content;
	}
	$content = 'document.addEventListener( "DOMContentLoaded", function() { ';
	return $content;
}
add_filter( 'gform_cdata_close', 'wrap_gform_cdata_close', 99 );
function wrap_gform_cdata_close( $content = '' ) {
	if ( ( defined('DOING_AJAX') && DOING_AJAX ) || isset( $_POST['gform_ajax'] ) ) {
		return $content;
	}
	$content = ' }, false );';
	return $content;
}

add_image_size('hd', 1920, 0, true);


/**
 * Adds JH_map Google widget.
 */
class JH_map extends WP_Widget {

	function __construct() {
		parent::__construct(
			'jh_map', // Base ID
			__( 'Google map', 'jhfw' ), // Name
			array( 'description' => __( 'Google map widget by Julian Hook', 'jhfw' )) // Args
		);
	}

	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
		}
		ob_start();
		$adres = get_field('address', 'widget_'.$this->id);

		echo do_shortcode('[flexiblemap address="'.$adres.'" draggable="false"]');

		$output = ob_get_contents();
		ob_end_clean();
		echo $output;
		echo $args['after_widget'];
	}

	public function form( $instance ) {	}
	public function update( $new_instance, $old_instance ) {}

} // class JH_map

// register JH_map widget
function register_JH_map() {
	register_widget( 'JH_map' );
}
add_action( 'widgets_init', 'register_JH_map' );

function change_post_type_link( $link, $post = 0 ){
    if ( $post->post_type == 'product' ){
        return home_url( 'product/'. $post->post_name .'/'. $post->ID );
    } else {
        return $link;
    }
}
add_filter('post_type_link', 'change_post_type_link', 10, 2);

add_action('admin_menu','remove_default_post_type');

function remove_default_post_type() {
    remove_menu_page('edit.php');
}

// Include eCommerce Module hand writen
include('eCommerce/general-post-type.php');
include('Blog/blog-post-type.php');


add_image_size('post-size',280,380,true);


// removes Home default editor in admin
function remove_pages_editor(){
    if(get_the_ID() === 16) {
        remove_post_type_support( 'page', 'editor' );
    }
    if(get_the_ID() === 436) {
        remove_post_type_support( 'page', 'editor' );
    }
}
add_action( 'add_meta_boxes', 'remove_pages_editor' );