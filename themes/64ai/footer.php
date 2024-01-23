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



$social = cmb2_get_option('64ai_main_options', '64ai_social_group');
$copy = cmb2_get_option('64ai_main_options', '64ai_footer_copyright');
$custom_logo_id = get_theme_mod('custom_logo');
$logo = wp_get_attachment_image_src($custom_logo_id, 'full');


?>

</main>

<footer class="sixtyia-footer">
  <div class="container">
    <div class="sixtyia-footer__wrap">
      <div class="sixtyia-footer__wrap-left">
        <a class="sixtyia-footer__logo" href="<?php echo esc_url(home_url('/')); ?>">
          <?php
          if (has_custom_logo()) {
            echo '<img src="' . esc_url($logo[0]) . '" alt="' . get_bloginfo('name') . '">';
          }
          ?>
        </a>

        <ul class="sixtyia-footer__social">
          <?php if (!empty($social)) { ?>
            <?php foreach ($social as $item) { ?>
              <li>
                <a href="<?php echo esc_url($item['64ai_social_group_link']); ?>" title="<?php echo esc_html($item['64ai_social_group_name']); ?>" aria-label="<?php echo esc_html($item['64ai_social_group_name']); ?>" target="_blank" rel="noopener">
                  <?php echo file_get_contents(get_template_directory() . '/assets/images/icons/' . $item['64ai_social_group_icon'] . '.svg'); ?>
                </a>
              </li>
            <?php } ?>
          <?php } ?>
        </ul>
      </div>

      <?php if (has_nav_menu('footer-menu')) {
        $args = array(
          'container_class' => 'sixtyia-footer__menu',
          'container' => 'nav',
          'menu_class' => 'footer-menu',
          'theme_location' => 'footer-menu'
        );
        wp_nav_menu($args);
      }  ?>

    </div>


    <div class="sixtyia-footer__wrap-bottom">
      <div class="sixtyia-footer__copyright"><?= $copy ?></div>

      <?php if (has_nav_menu('footer-menu-sec')) {
        $args = array(
          'container_class' => 'sixtyia-footer__menu-sec',
          'container' => 'nav',
          'menu_class' => 'footer-menu-sec',
          'theme_location' => 'footer-menu-sec'
        );
        wp_nav_menu($args);
      }  ?>
    </div>
  </div>
</footer>

</div>

<?php wp_footer(); ?>

</body>

</html>