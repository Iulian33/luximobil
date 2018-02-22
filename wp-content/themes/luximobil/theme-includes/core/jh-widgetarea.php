<?php
/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */

function JH_widgets_init() {

    register_sidebar(array(
        'name' => __('Contact Map Area', 'jhfw'),
        'id' => 'sidebar-1',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<div class="widget-title">',
        'after_title' => '</div>',
    ));
    register_sidebar(array(
        'name' => __('Language Sidebar', 'jhfw'),
        'id' => 'language-area',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<div class="widget-title">',
        'after_title' => '</div>',
    ));

    register_sidebar(array(
        'name' => __('Footer Contacts', 'jhfw'),
        'id' => 'footer-contacts',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<div class="widget-title">',
        'after_title' => '</div>',
    ));
    register_sidebar(array(
        'name' => __('Footer Menu 1', 'jhfw'),
        'id' => 'footer-menu-1',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<div class="widget-title">',
        'after_title' => '</div>',
    ));
    register_sidebar(array(
        'name' => __('Footer Menu 2', 'jhfw'),
        'id' => 'footer-menu-2',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<div class="widget-title">',
        'after_title' => '</div>',
    ));
    register_sidebar(array(
        'name' => __('Footer About', 'jhfw'),
        'id' => 'footer-about',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<div class="widget-title">',
        'after_title' => '</div>',
    ));

}

add_action('widgets_init', 'JH_widgets_init');