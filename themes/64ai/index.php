<?php

/**
 * Index Page
 *
 * @package sixtyia
 * @since 1.0
 *
 */

$paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;

$args = array(
  'post_type' => 'post',
  'paged'     => $paged,
);

if (is_search()) {
  $term = get_query_var('s');
  $args['s'] = $term;
}

$posts = new WP_Query($args);

if (is_search()) {
  $count = isset($posts->found_posts) && !empty($posts->found_posts) ? $posts->found_posts : '0';
  $count_text = $count == '1' ? esc_html__('result found', 'sixtyia') : esc_html__('results found', 'sixtyia');

  $upqode_blog_title_text = esc_html__('Showing results for ', 'sixtyia') . '"' . esc_html__($term, 'sixtyia') . '"';
}

get_header();

if (have_posts()) : ?>

  <section class="sixtyia-blog">

    <?php if (is_search()) { ?>
      <div class="sixtyia-blog__search-count">
        <div class="container">
          <h1><?php echo $upqode_blog_title_text; ?></h1>
          <p><?php echo $count_text . ' ' . esc_html__($count, 'sixtyia') ?></p>
        </div>
      </div>
    <?php } ?>


    <?php if (!is_search()) { ?>
      <div class="sixtyia-blog__heading">
        <div class="container">
          <h1><?php esc_html__('Blog', 'sixtyia'); ?></h1>
        </div>
      </div>
    <?php } ?>

    <div class="sixtyia-blog__main">
      <div class="container">
        <div class="sixtyia-blog__main-wrap">
          <?php while ($posts->have_posts()) : $posts->the_post();

            upqode_post_card();

          endwhile;
          wp_reset_postdata(); ?>
        </div>
        <?php if (function_exists('upqode_custom_pagination')) {
          upqode_custom_pagination($posts);
        }
        ?>

      </div>
    </div>

  </section>

<?php else :
  get_template_part('template-parts/theme', 'none');
endif;

get_footer();
