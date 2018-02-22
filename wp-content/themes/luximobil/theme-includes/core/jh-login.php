<?php
/**
 * Admin Login Page
 */

function JH_login_screen_style() {
    wp_enqueue_style('JH_development', get_template_directory_uri() . '/css/JHfw_login_style.css', false);
    wp_enqueue_script('jquery');
    wp_enqueue_script('owl-carousel', get_template_directory_uri() . 'vendor/core-deps/functions.js', array('jquery'), '', true);
}

function header_form_messge() {
    echo '<h1 class="logo_insign"> <img src="' . get_template_directory_uri() . '/images/Jh-insign.png" alt="Julian Hook Framework"> </h1>';
}

add_action('login_enqueue_scripts', 'JH_login_screen_style', 10);
add_action('login_message', 'header_form_messge');
