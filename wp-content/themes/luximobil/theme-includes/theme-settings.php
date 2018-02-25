<?php
/**
 * Site Theme Settings
 */

if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title' => '',
        'menu_title' => 'Theme Settings',
        'menu_slug' => 'theme-general-settings',
        'capability' => 'edit_posts',
        'redirect' => false
    ));
    acf_add_options_sub_page(array(
        'page_title' => 'Theme Header Settings',
        'menu_title' => 'Header',
        'parent_slug' => 'theme-general-settings',
    ));
    acf_add_options_sub_page(array(
        'page_title' => 'Theme Standaard Settings',
        'menu_title' => 'Standard Settings',
        'parent_slug' => 'theme-general-settings',
    ));
    acf_add_options_sub_page(array(
        'page_title' => 'Footer Settings',
        'menu_title' => 'Footer',
        'parent_slug' => 'theme-general-settings',
    ));

}

function my_acf_google_map_api($api) {

    $api['key'] = 'AIzaSyDPEng8fkd9N8nWbWDZBjoyKT0Q_ZM1r2Q';
    return $api;

}


function update_sf_fields($post_id) {
    if(get_post_type($post_id) === 'imobil') {

        $etaj_imobil = get_post_meta($post_id,'imobil_specifications_etaj', true);
        $camere_imobil = get_post_meta($post_id,'imobil_specifications_numar_camere', true);
        $meta_value_etaj = $etaj_imobil >= 5 ? '5+': $etaj_imobil;
        $meta_value_camere = $camere_imobil >= 5 ? '5+': $camere_imobil;
        update_post_meta( $post_id, 'search_filter_etaj', $meta_value_etaj );
        update_post_meta( $post_id, 'search_filter_camere', $meta_value_camere );

    }
}

// Images Sizes
add_action('save_post','update_sf_fields',90);
add_image_size('post-size', 280, 380, true);
add_image_size('blog-thumbnail', 350, 240, true);
add_image_size('wide-thumbnail', 500, 250, true);
add_image_size('team-photo',300,350, true);

add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');
