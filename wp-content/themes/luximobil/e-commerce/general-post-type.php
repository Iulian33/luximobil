<?php

include ('taxonomy-category.php');
include ('taxonomy-sectors.php');
include ('taxonomy-regions.php');
include('taxonomy-type-imobil.php');

// Register Custom Post Type
function imobil_post_type() {

    $labels = array(
        'name'                  => _x( 'Imobils', 'Post Type General Name', 'jhfw' ),
        'singular_name'         => _x( 'Imobil', 'Post Type Singular Name', 'jhfw' ),
        'menu_name'             => __( 'Imobil', 'jhfw' ),
        'name_admin_bar'        => __( 'Imobil', 'jhfw' ),
        'archives'              => __( 'Imobil Archives', 'jhfw' ),
        'attributes'            => __( 'Imobil Templates', 'jhfw' ),
        'parent_item_colon'     => __( 'Parent Item:', 'jhfw' ),
        'all_items'             => __( 'All Imobils', 'jhfw' ),
        'add_new_item'          => __( 'Add New Imobil', 'jhfw' ),
        'add_new'               => __( 'Add Imobil', 'jhfw' ),
        'new_item'              => __( 'New Imobil', 'jhfw' ),
        'edit_item'             => __( 'Edit Imobil', 'jhfw' ),
        'update_item'           => __( 'Update Imobil', 'jhfw' ),
        'view_item'             => __( 'View Imobil', 'jhfw' ),
        'view_items'            => __( 'View Imobils', 'jhfw' ),
        'search_items'          => __( 'Search Imobil', 'jhfw' ),
        'not_found'             => __( 'Not found any imobil\'s', 'jhfw' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'jhfw' ),
        'featured_image'        => __( 'Imobil Image', 'jhfw' ),
        'set_featured_image'    => __( 'Set featured Imobil image', 'jhfw' ),
        'remove_featured_image' => __( 'Remove featured Imobil image', 'jhfw' ),
        'use_featured_image'    => __( 'Use as featured image', 'jhfw' ),
        'insert_into_item'      => __( 'Insert into Imobil', 'jhfw' ),
        'uploaded_to_this_item' => __( 'Uploaded to this Imobil', 'jhfw' ),
        'items_list'            => __( 'Imobils list', 'jhfw' ),
        'items_list_navigation' => __( 'Imobils list navigation', 'jhfw' ),
        'filter_items_list'     => __( 'Filter Imobils list', 'jhfw' ),
    );
    $rewrite = array(
        'slug'                  => 'imobil',
        'with_front'            => true,
        'pages'                 => true,
        'feeds'                 => true,
        "cptp_permalink_structure" => "%post_id%",
    );
    $args = array(
        'label'                 => __( 'Imobil', 'jhfw' ),
        'description'           => __( 'List of Imobil\'s', 'jhfw' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes' ),
        'taxonomies'            => array( 'categorie_imobil','im_atributes' ),
        'hierarchical'          => true,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'rewrite'               => $rewrite,
        'capability_type'       => 'page',
        'menu_icon'             => 'dashicons-admin-home'
    );
    register_post_type( 'imobil', $args );

}
add_action( 'init', 'imobil_post_type', 0 );

