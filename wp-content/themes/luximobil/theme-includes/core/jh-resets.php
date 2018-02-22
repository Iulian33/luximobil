<?php
/**
 * Theme Resets
 */

// remove wp version param from any enqueued scripts
function vc_remove_wp_ver_css_js($src) {
    if (strpos($src, 'ver='))
        $src = remove_query_arg('ver', $src);
    return $src;
}


function add_property_attribute($link, $handle) {
    $link = str_replace('/>', 'property />', $link);
    return $link;
}


function wrap_gform_cdata_open($content = '') {
    if ((defined('DOING_AJAX') && DOING_AJAX) || isset($_POST['gform_ajax'])) {
        return $content;
    }
    $content = 'document.addEventListener( "DOMContentLoaded", function() { ';
    return $content;
}


function wrap_gform_cdata_close($content = '') {
    if ((defined('DOING_AJAX') && DOING_AJAX) || isset($_POST['gform_ajax'])) {
        return $content;
    }
    $content = ' }, false );';
    return $content;
}


function remove_default_post_type() {
    remove_menu_page('edit.php');
}


function change_post_type_link($link, $post = 0) {
    if ($post->post_type == 'product') {
        return home_url('product/' . $post->post_name . '/' . $post->ID);
    } else {
        return $link;
    }
}


function remove_pages_editor() {
    if (get_the_ID() === 16) {
        remove_post_type_support('page', 'editor');
    }
    if (get_the_ID() === 436) {
        remove_post_type_support('page', 'editor');
    }
}


function change_footer_version($html) {
    $html .= ' | JH Theme 1.0';
    return $html;
}


function remove_type_atribute($tag) {
    return preg_replace("/type=['\"]text\/(javascript|css)['\"]/", '', $tag);
}

if (is_singular('imobil')) {
    remove_action('wp_head', '_wp_render_title_tag', 1);
}




add_filter('style_loader_tag', 'remove_type_atribute', 10, 2);
add_filter('script_loader_tag', 'remove_type_atribute', 10, 2);
add_filter( 'update_footer', 'change_footer_version', 15);
add_action('add_meta_boxes', 'remove_pages_editor');
add_filter('post_type_link', 'change_post_type_link', 10, 2);
add_action('admin_menu', 'remove_default_post_type');
add_filter('gform_init_scripts_footer', '__return_true');
add_filter('gform_cdata_open', 'wrap_gform_cdata_open', 1);
add_filter('style_loader_src', 'vc_remove_wp_ver_css_js', 9999);
add_filter('script_loader_src', 'vc_remove_wp_ver_css_js', 9999);
add_filter('style_loader_tag', 'add_property_attribute', 10, 2);
add_filter('gform_cdata_close', 'wrap_gform_cdata_close', 99);

