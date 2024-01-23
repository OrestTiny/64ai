<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Sixtyia
 */


$footer_text = esc_html__('&copy;', 'sixtyia') . date('Y') . ' ' . get_bloginfo('name') . esc_html__('All Rights Reserved.', 'sixtyia');
?>

</main>

<footer class="sixtyia-footer">
  <div class="container">
    <div class="sixtyia-footer__wrap">
      <div class="sixtyia-footer__development">
        <a href="https://sixtyia.com/web-design/" rel="noopener" target="_blank">Web Design</a> and
        <a href="https://sixtyia.com/wordpress-development/" rel="noopener" target="_blank">Development</a> by
        <a href="https://sixtyia.com/" rel="noopener" target="_blank">SIXTYAI</a>
      </div>
      <div class="sixtyia-footer__copyright"><?php echo wp_kses($footer_text, 'sixtyia'); ?></div>
    </div>
  </div>
</footer>

</div>

<?php wp_footer(); ?>

</body>

</html>