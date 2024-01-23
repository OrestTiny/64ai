<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Upqode
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#ffffff">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <?php wp_body_open();

    $alarm = '<h4>' . esc_html__('Please register Top Navigation from', 'upqode') . ' <a href="' . esc_url(admin_url('nav-menus.php')) . '" target="_blank">' . esc_html__('Appearance &gt; Menus', 'upqode') . '</a></h4>';
    ?>

    <div class="upqode-main">
        <header class="upqode-header">
            <div class="container">
                <div class="upqode-header__wrapper">
                    <a class="upqode-header__logo" href="<?php echo esc_url(home_url('/')); ?>">
                        <span><?php echo get_option('blogname'); ?></span>
                    </a>

                    <?php if (has_nav_menu('primary-menu')) {
                        $args = array(
                            'container_class' => 'upqode-header__menu',
                            'container' => 'nav',
                            'menu_class' => 'header-menu',
                            'theme_location' => 'primary-menu'
                        );
                        wp_nav_menu($args);
                    } else {
                        echo wp_kses_post($alarm);
                    } ?>

                    <button class="upqode-header__burger">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
            </div>
        </header>
        <main>