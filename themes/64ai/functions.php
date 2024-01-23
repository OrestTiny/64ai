<?php

/**
 * Upqode functions and definitions
 *
 * @package WordPress*
 * @package Upqode
 * @since Upqode 1.0
 */

// Do not allow directly accessing this file.
if (!defined('ABSPATH')) {
	exit('Direct script access denied.');
}

defined('UPQODE_T_URI') or define('UPQODE_T_URI', get_template_directory_uri());
defined('UPQODE_T_PATH') or define('UPQODE_T_PATH', get_template_directory());

require_once ABSPATH . 'wp-admin/includes/plugin.php';

require_once UPQODE_T_PATH . '/include/config-actions.php';
require_once UPQODE_T_PATH . '/include/customizer.php';
require_once UPQODE_T_PATH . '/include/function-helper.php';
require_once UPQODE_T_PATH . '/include/function-global.php';
require_once UPQODE_T_PATH . '/include/optimization.php';
