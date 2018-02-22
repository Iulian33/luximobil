<?php
/**
 * Jolian Hook Theme Functions
 *
 */

function siteFavicon() {
    $favicon = get_field('site_favicon', 'option');

    if ($favicon) {
        $fav_url = $favicon['url'];
    } else {
        $fav_url = get_template_directory_uri() . "/images/Jh-insign.png";
    }

    return '<link rel="shortcut icon" href="' . $fav_url . '">';
}

function imobilOnlyTitle() {
    if (is_singular('imobil')) {
        return '<title> Lux Imobil &#8211; Imobil</title> ';
    }
}


function siteLogo() {
    $site_logo = get_field('site_logo', 'option');
    if (!$site_logo) {
        $img_src = get_template_directory_uri() . "/images/default-logo.png";
    } else {
        $img_src = $site_logo['url'];
    }
    return '<img src = "' . $img_src . '" alt="site-logo" />';
}