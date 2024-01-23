<?php

/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Sixtyia
 */

if (!is_active_sidebar('sixtyia-sidebar')) {
  return;
}
?>

<aside class="sixtyia-sidebar">
  <?php dynamic_sidebar('sixtyia-sidebar'); ?>
</aside>