<?php
/**
 * Theme Setup
 */

if (!function_exists('JH_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * As indicating support for post thumbnails.
     */

    function JH_setup() {

        load_theme_textdomain('jhfw', get_template_directory() . '/languages');
        add_theme_support('automatic-feed-links');
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption',));
        include('jh-navmenu.php');

    }
endif;

add_action('after_setup_theme', 'JH_setup');
