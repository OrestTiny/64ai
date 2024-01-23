<?php

/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Upqode
 */

if (!is_active_sidebar('upqode-sidebar')) {
  return;
}
?>

<aside class="upqode-sidebar">
  <?php dynamic_sidebar('upqode-sidebar'); ?>
</aside>