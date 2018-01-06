<?php
// Register Sectors Taxonomy
function sectors_taxonomy() {

    $labels = array(
        'name'                       => _x( 'Sectors', 'Taxonomy General Name', 'jhfw' ),
        'singular_name'              => _x( 'Sector', 'Taxonomy Singular Name', 'jhfw' ),
        'menu_name'                  => __( 'Sectors', 'jhfw' ),
        'all_items'                  => __( 'All Sectors', 'jhfw' ),
        'parent_item'                => __( 'Parent Sector', 'jhfw' ),
        'parent_item_colon'          => __( 'Parent Sector:', 'jhfw' ),
        'new_item_name'              => __( 'New Sector Name', 'jhfw' ),
        'add_new_item'               => __( 'Add New Sector', 'jhfw' ),
        'edit_item'                  => __( 'Edit Sector', 'jhfw' ),
        'update_item'                => __( 'Update Sector', 'jhfw' ),
        'view_item'                  => __( 'View Sector', 'jhfw' ),
        'separate_items_with_commas' => __( 'Separate Sectors with commas', 'jhfw' ),
        'add_or_remove_items'        => __( 'Add or remove Sector', 'jhfw' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'jhfw' ),
        'popular_items'              => __( 'Popular Sectors', 'jhfw' ),
        'search_items'               => __( 'Search Sectors', 'jhfw' ),
        'not_found'                  => __( 'Not Found any Sectors', 'jhfw' ),
        'no_terms'                   => __( 'No Sectors', 'jhfw' ),
        'items_list'                 => __( 'Sectors list', 'jhfw' ),
        'items_list_navigation'      => __( 'Sectors list navigation', 'jhfw' ),
    );
    $rewrite = array(
        'slug'                       => 'sectors',
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
    register_taxonomy( 'sectors_imobil', array( 'imobil' ), $args );

}
add_action( 'init', 'sectors_taxonomy', 0 );