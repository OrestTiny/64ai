<?php

/**
 * 404 Page
 */

get_header(); ?>

<div class="upqode-error">
    <div class="container">
        <div class="upqode-error__wrap">
            <div class="upqode-error__title"><?php esc_html_e('OOPS!', 'upqode'); ?></div>
            <div class="upqode-error__subtitle"><?php esc_html_e('404', 'upqode'); ?></div>
            <h1 class="upqode-error__text"><?php esc_html_e('Page not found', 'upqode'); ?></h1>
            <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Go home', 'upqode'); ?></a>
        </div>
    </div>
</div>

<?php get_footer();
