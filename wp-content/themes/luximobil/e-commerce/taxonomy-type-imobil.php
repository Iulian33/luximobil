<?php
// Register Tip Imobil Taxonomy
function type_taxonomy() {

    $labels = array(
        'name'                       => _x( 'Type Order', 'Taxonomy General Name', 'jhfw' ),
        'singular_name'              => _x( 'Type Order', 'Taxonomy Singular Name', 'jhfw' ),
        'menu_name'                  => __( 'Type Orders', 'jhfw' ),
        'all_items'                  => __( 'All Types Order', 'jhfw' ),
        'parent_item'                => __( 'Parent Type Order', 'jhfw' ),
        'parent_item_colon'          => __( 'Parent Type Order:', 'jhfw' ),
        'new_item_name'              => __( 'New Type Order Name', 'jhfw' ),
        'add_new_item'               => __( 'Add New Type Order', 'jhfw' ),
        'edit_item'                  => __( 'Edit Type Order', 'jhfw' ),
        'update_item'                => __( 'Update Type Order', 'jhfw' ),
        'view_item'                  => __( 'View Type Order', 'jhfw' ),
        'separate_items_with_commas' => __( 'Separate Type Orderswith commas', 'jhfw' ),
        'add_or_remove_items'        => __( 'Add or remove Type Imobil', 'jhfw' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'jhfw' ),
        'popular_items'              => __( 'Popular Type Orders', 'jhfw' ),
        'search_items'               => __( 'Search Type Orders', 'jhfw' ),
        'not_found'                  => __( 'Not Found any Type Orders', 'jhfw' ),
        'no_terms'                   => __( 'No Type Orders', 'jhfw' ),
        'items_list'                 => __( 'Type Orders list', 'jhfw' ),
        'items_list_navigation'      => __( 'Type Orders list navigation', 'jhfw' ),
    );
    $rewrite = array(
        'slug'                       => 'type-imobil',
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
    register_taxonomy( 'type_imobil', array( 'imobil' ), $args );

}
add_action( 'init', 'type_taxonomy', 0 );