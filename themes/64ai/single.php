<?php

/**
 * Single post
 */

get_header();

while (have_posts()) : the_post();


?>
  <section class="sixtyia-single" <?php post_class(); ?>>
    <div class="container">
      <div class="sixtyia-single__wrap">

        <?php the_title('<h1 class="sixtyia-single__title">', '</h1>'); ?>

        <?php if (has_post_thumbnail()) { ?>
          <div class="sixtyia-single__banner">
            <?php the_post_thumbnail(); ?>
          </div>
        <?php } ?>

        <div class="sixtyia-single__categories">
          <?php the_category(' '); ?>
        </div>

        <div class="sixtyia-single__author">
          <?php upqode_posted_by_author() ?>
        </div>

        <div class="sixtyia-single__date">
          <?php echo get_the_date(); ?>
        </div>

        <div class="sixtyia-single__content">
          <?php the_content(); ?>
        </div>

        <?php
        the_tags(
          '<div class="sixtyia-single__tags">',
          ' ',
          '</div>'
        ); ?>


      </div>
    </div>
  </section>


<?php endwhile;

wp_reset_postdata();

get_footer();
