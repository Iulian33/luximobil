<?php
// Register Category Taxonomy
function category_taxonomy() {

    $labels = array(
        'name'                       => _x( 'Categories', 'Taxonomy General Name', 'jhfw' ),
        'singular_name'              => _x( 'Category', 'Taxonomy Singular Name', 'jhfw' ),
        'menu_name'                  => __( 'Catogories', 'jhfw' ),
        'all_items'                  => __( 'All Catogories', 'jhfw' ),
        'parent_item'                => __( 'Parent Catogory', 'jhfw' ),
        'parent_item_colon'          => __( 'Parent Item:', 'jhfw' ),
        'new_item_name'              => __( 'New Catogory Name', 'jhfw' ),
        'add_new_item'               => __( 'Add New Catogory', 'jhfw' ),
        'edit_item'                  => __( 'Edit Catogory', 'jhfw' ),
        'update_item'                => __( 'Update Catogory', 'jhfw' ),
        'view_item'                  => __( 'View Catogory', 'jhfw' ),
        'separate_items_with_commas' => __( 'Separate Catogories with commas', 'jhfw' ),
        'add_or_remove_items'        => __( 'Add or remove Catogory', 'jhfw' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'jhfw' ),
        'popular_items'              => __( 'Popular Catogories', 'jhfw' ),
        'search_items'               => __( 'Search Catogories', 'jhfw' ),
        'not_found'                  => __( 'Not Found any catogories', 'jhfw' ),
        'no_terms'                   => __( 'No Catogories', 'jhfw' ),
        'items_list'                 => __( 'Catogories list', 'jhfw' ),
        'items_list_navigation'      => __( 'Catogories list navigation', 'jhfw' ),
    );
    $rewrite = array(
        'slug'                       => 'category',
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
    register_taxonomy( 'categorie_imobil', array( 'imobil' ), $args );

}
add_action( 'init', 'category_taxonomy', 0 );