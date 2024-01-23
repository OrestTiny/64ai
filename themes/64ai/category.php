<?php

/**
 * Category Template
 */

get_header();


$term = get_queried_object();
$term_name = $term->taxonomy;

$title = is_category() ? esc_html__('Category: ', 'upqode') . $term->name : $title;
$title = is_tag() ? esc_html__('Tag: ', 'upqode') . $term->name : $title;


if (have_posts()) : ?>
  <section class="upqode-blog">

    <?php if (!empty($title)) { ?>
      <div class="upqode-blog__heading">
        <div class="container">
          <h1><?php echo esc_html__($title, 'upqode'); ?></h1>
        </div>
      </div>
    <?php } ?>

    <div class="upqode-blog__main">
      <div class="container">
        <div class="upqode-blog__main-wrap">
          <?php while (have_posts()) : the_post();

            upqode_post_card();

          endwhile;
          wp_reset_postdata(); ?>
        </div>
        <?php upqode_custom_pagination(); ?>
      </div>
    </div>
  </section>

<?php else :
  get_template_part('template-parts/theme', 'none');
endif;

get_footer();
