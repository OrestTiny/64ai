<?php

/**
 * Template used for pages.
 *
 * @package Sixtyia
 * @subpackage Templates
 */

// Do not allow directly accessing this file.
if (!defined('ABSPATH')) {
  exit('Direct script access denied.');
}


get_header();

while (have_posts()) : the_post();

  the_content();

endwhile;

get_footer();
