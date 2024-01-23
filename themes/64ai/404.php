<?php

/**
 * 404 Page
 */

get_header(); ?>

<div class="sixtyia-error">
  <div class="container">
    <div class="sixtyia-error__wrap">
      <div class="sixtyia-error__title"><?php esc_html_e('OOPS!', 'sixtyia'); ?></div>
      <div class="sixtyia-error__subtitle"><?php esc_html_e('404', 'sixtyia'); ?></div>
      <h1 class="sixtyia-error__text"><?php esc_html_e('Page not found', 'sixtyia'); ?></h1>
      <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Go home', 'sixtyia'); ?></a>
    </div>
  </div>
</div>

<?php get_footer();
