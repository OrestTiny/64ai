<?php

/**
 * Sixtyia functions and definitions
 *
 * @package WordPress*
 * @package Sixtyia
 * @since Sixtyia 1.0
 */

// Do not allow directly accessing this file.
if (!defined('ABSPATH')) {
  exit('Direct script access denied.');
}

defined('SIXTYAI_T_URI') or define('SIXTYAI_T_URI', get_template_directory_uri());
defined('SIXTYAI_T_PATH') or define('SIXTYAI_T_PATH', get_template_directory());

require_once ABSPATH . 'wp-admin/includes/plugin.php';

require_once SIXTYAI_T_PATH . '/include/config-actions.php';
require_once SIXTYAI_T_PATH . '/include/customizer.php';
require_once SIXTYAI_T_PATH . '/include/function-helper.php';
require_once SIXTYAI_T_PATH . '/include/function-global.php';
require_once SIXTYAI_T_PATH . '/include/optimization.php';


if (file_exists(SIXTYAI_T_PATH . '/lib/cmb2/init.php')) {
  require_once SIXTYAI_T_PATH . '/lib/cmb2/init.php';
  require_once SIXTYAI_T_PATH . '/lib/cmb-field-select2/cmb-field-select2.php';
}


function pw_cmb2_field_select2_asset_path()
{
  return get_stylesheet_directory_uri() . '/lib/cmb-field-select2';
}
add_filter('pw_cmb2_field_select2_asset_path', 'pw_cmb2_field_select2_asset_path');
