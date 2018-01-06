<?php
// Register Region Taxonomy
function region_taxonomy() {

    $labels = array(
        'name'                       => _x( 'Regions', 'Taxonomy General Name', 'jhfw' ),
        'singular_name'              => _x( 'Region', 'Taxonomy Singular Name', 'jhfw' ),
        'menu_name'                  => __( 'Regions', 'jhfw' ),
        'all_items'                  => __( 'All Regions', 'jhfw' ),
        'parent_item'                => __( 'Parent Region', 'jhfw' ),
        'parent_item_colon'          => __( 'Parent Region:', 'jhfw' ),
        'new_item_name'              => __( 'New Region Name', 'jhfw' ),
        'add_new_item'               => __( 'Add New Region', 'jhfw' ),
        'edit_item'                  => __( 'Edit Region', 'jhfw' ),
        'update_item'                => __( 'Update Region', 'jhfw' ),
        'view_item'                  => __( 'View Region', 'jhfw' ),
        'separate_items_with_commas' => __( 'Separate Regions with commas', 'jhfw' ),
        'add_or_remove_items'        => __( 'Add or remove Region', 'jhfw' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'jhfw' ),
        'popular_items'              => __( 'Popular Regions', 'jhfw' ),
        'search_items'               => __( 'Search Regions', 'jhfw' ),
        'not_found'                  => __( 'Not Found any Regions', 'jhfw' ),
        'no_terms'                   => __( 'No Regions', 'jhfw' ),
        'items_list'                 => __( 'Regions list', 'jhfw' ),
        'items_list_navigation'      => __( 'Regions list navigation', 'jhfw' ),
    );
    $rewrite = array(
        'slug'                       => 'regions',
        'with_front'                 => true,
        'hierarchical'               => false,
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'rewrite'                    => $rewrite,
    );
    register_taxonomy( 'regions_imobil', array( 'imobil' ), $args );

}
add_action( 'init', 'region_taxonomy', 0 );