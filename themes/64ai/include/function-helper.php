<?php

add_action('after_setup_theme', 'upqode_setup');

if (!function_exists('upqode_setup')) {
	function upqode_setup()
	{
		add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));

		add_theme_support('post-formats', array(
			'aside',
			'gallery',
			'link',
			'image',
			'quote',
			'status',
			'video',
			'audio',
			'chat'
		));

		load_theme_textdomain('upqode', get_template_directory() . '/languages');

		add_theme_support('automatic-feed-links');

		add_theme_support('title-tag');

		add_theme_support('customize-selective-refresh-widgets');

		add_theme_support('post-thumbnails');

		add_theme_support('custom-logo', array(
			'height' => 250,
			'width' => 250,
			'flex-width' => true,
			'flex-height' => true,
		));
	}
};


if (!function_exists('upqode_content_width')) {
	function upqode_content_width()
	{
		$GLOBALS['content_width'] = apply_filters('upqode_content_width', 1200);
	}
}
add_action('after_setup_theme', 'upqode_content_width', 0);

/**
 * Filter for excerpt more string
 */

if (!function_exists('upqode_excerpt_more')) {
	function upqode_excerpt_more()
	{
		return '...';
	}

	add_filter('excerpt_more', 'upqode_excerpt_more');
}


if (!function_exists('upqode_mime_types')) {
	function upqode_mime_types($mimes)
	{
		$mimes['svg'] = 'image/svg+xml';
		return $mimes;
	}

	add_filter('upload_mimes', 'upqode_mime_types');
}
