<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Site Theme
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php echo imobilOnlyTitle(); ?>
    <?php echo siteFavicon(); ?>
    <!--[if lt IE 9]>
    <script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
    <![endif]-->
    <!--[if IE]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php include('inc/templates/parts/loader.php'); ?>
<div class="mainContainer">
    <header class="main-header">
        <div class="container">
            <div class="innerWrapper">
                <div class="col-md-6 col-lg-3 col-xs-6 logo_col">
                    <div class="siteLogo">
                        <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo('name'); ?>">
                            <?php echo siteLogo(); ?>
                        </a>
                    </div>
                    <div class="dropdown-menu-container">
                        <div class="dropdown-menu">
                            <div class="label-dropdown">
                                <i class="fa fa-navicon"></i>
                                <?php _e('Categorii', 'jhfw'); ?>
                            </div>
                            <?php wp_nav_menu(array("theme_location" => 'category', 'menu_class' => 'category-menu', 'container' => '')); ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xs-6">
                    <div class="search-container">
                        <?php get_search_form(); ?>
                    </div>
                    <div class="menu-container">
                        <nav class="mainMenu">
                            <?php wp_nav_menu(array("theme_location" => 'primary', 'menu_class' => '', 'container' => '')); ?>
                        </nav>
                        <div class="mobileLink">
                            <a href="#mobilemenu" title="Menu">
                                <i class="fa fa-navicon"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 right-datas">
                    <div class="options-switcher-phone">
                        <ul class="upper-options-header">
                            <li>
                                <?php if (have_rows('general_info', 'option')):
                                    while (have_rows('general_info', 'option')): the_row(); ?>
                                        <i class="icon-headset"></i>
                                        <a href="tel:<?php the_sub_field('website_phone'); ?>">
                                            <?php the_sub_field('website_phone'); ?>
                                        </a>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </li>
                            <li class="header-language-switcher">
                                <?php dynamic_sidebar('language-area'); ?>
                            </li>
                        </ul>
                    </div>
                    <div class="store-shedulare">
                        <?php the_field('sheduler_info', 'option') ?>
                    </div>
                </div>
            </div>
        </div>
    </header>
<?php get_template_part('inc/templates/parts/top-slider-image'); ?>