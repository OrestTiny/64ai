<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Upqode
 */


$footer_text = esc_html__('&copy;', 'upqode') . date('Y') . ' ' . get_bloginfo('name') . esc_html__('All Rights Reserved.', 'upqode');
?>

</main>

<footer class="upqode-footer">
  <div class="container">
    <div class="upqode-footer__wrap">
      <div class="upqode-footer__development">
        <a href="https://upqode.com/web-design/" rel="noopener" target="_blank">Web Design</a> and
        <a href="https://upqode.com/wordpress-development/" rel="noopener" target="_blank">Development</a> by
        <a href="https://upqode.com/" rel="noopener" target="_blank">UPQODE</a>
      </div>
      <div class="upqode-footer__copyright"><?php echo wp_kses($footer_text, 'upqode'); ?></div>
    </div>
  </div>
</footer>

</div>

<?php wp_footer(); ?>

</body>

</html>