<?php

/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Sixtyia
 */
add_action('widgets_init', 'upqode_widgets_init');
add_action('wp_enqueue_scripts', 'upqode_enqueue_scripts', 999);
add_action('after_setup_theme', 'upqode_register_nav_menu', 0);
add_action('enqueue_block_editor_assets', 'upqode_add_gutenberg_assets');

/**
 * Register nav menu.
 */
if (!function_exists('upqode_register_nav_menu')) {
  function upqode_register_nav_menu()
  {
    register_nav_menus(array(
      'primary-menu' => esc_html__('Header Menu', 'sixtyia'),
      'footer-menu' => esc_html__('Footer Menu', 'sixtyia'),
      'footer-menu-sec' => esc_html__('Footer Secondary Menu', 'sixtyia')
    ));
  }
}

/**
 * Register widget area.
 */
if (!function_exists('upqode_widgets_init')) {
  function upqode_widgets_init()
  {
    register_sidebar(array(
      'name'          => esc_html__('Sidebar', 'sixtyia'),
      'id'            => 'sixtyia-sidebar',
      'description'   => esc_html__('Add widgets here.', 'sixtyia'),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h4 class="widget-title">',
      'after_title'   => '</h4>',
    ));
  }
}


/**
 * Enqueue scripts and styles.
 */
if (!function_exists('upqode_enqueue_scripts')) {
  function upqode_enqueue_scripts()
  {
    $blog_page = is_archive() || is_author() || is_category() || is_home() || is_tag() || is_search();

    if ((is_admin())) {
      return;
    }

    if (is_404()) {
      wp_enqueue_style('sixtyia-error-page', SIXTYAI_T_URI . '/assets/css/error-page.min.css');
    }

    if ($blog_page) {
      wp_enqueue_style('sixtyia-blog-list', SIXTYAI_T_URI . '/assets/css/blog.min.css');
    }

    if (is_active_sidebar('sixtyia-sidebar') && $blog_page) {
      wp_enqueue_style('sixtyia-sidebar', SIXTYAI_T_URI . '/assets/css/sidebar.min.css');
    }

    if (is_single()) {
      wp_enqueue_style('sixtyia-blog-single', SIXTYAI_T_URI . '/assets/css/single.min.css');
    }

    wp_enqueue_style('nesst-iconmoon', SIXTYAI_T_URI . '/assets/fonts/iconmoon/style.css');
    wp_enqueue_style('sixtyia-main-style', SIXTYAI_T_URI . '/assets/css/style.min.css');
    wp_enqueue_style('sixtyia-style', SIXTYAI_T_URI . '/style.css');

    wp_localize_script(
      'sixtyia-script',
      'get',
      array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'siteurl' => get_template_directory_uri(),
      )
    );

    if ((!is_admin()) && is_singular() && comments_open() && get_option('thread_comments')) {
      wp_enqueue_script('comment-reply');
    }

    wp_enqueue_script('sixtyia-script', SIXTYAI_T_URI . '/assets/js/script.min.js', array('jquery'), '', true);
  }
}

/**
 * Add backend styles for Gutenberg.
 */
if (!function_exists('upqode_add_gutenberg_assets')) {
  function upqode_add_gutenberg_assets()
  {
    wp_enqueue_style('sixtyia-gutenberg', SIXTYAI_T_URI . '/assets/css/gutenberg.min.css');
  }
}
