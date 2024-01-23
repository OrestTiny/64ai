<?php

if (!function_exists('upqode_post_card')) {
  function upqode_post_card()
  {
    $author_id = get_the_author_meta('ID');
?>
    <div class="sixtyia-post-card">
      <?php if (!empty(get_the_title())) { ?>
        <div class="sixtyia-post-card__title">
          <h3>
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
          </h3>
        </div>
      <?php } ?>

      <div class="sixtyia-post-card__text"><?php the_excerpt(); ?></div>

      <?php if (has_post_thumbnail()) { ?>
        <div class="sixtyia-post-card__media">
          <?php the_post_thumbnail(); ?>
        </div>
      <?php } ?>

      <div class="sixtyia-post-card__categories">
        <?php the_category(' '); ?>
      </div>

      <div class="sixtyia-post-card__author">
        <?php echo get_avatar($author_id, 30); ?>
        <div class="sixtyia-post-card__author-name">
          <b><?php echo esc_html(get_the_author()); ?></b>
        </div>
      </div>

      <a href="<?php the_permalink(); ?>">
        <?php echo get_the_date(); ?>
      </a>
    </div>

    <?php
  }
}

/**
 * Blog Pagination 
 */
if (!function_exists('upqode_custom_pagination')) {
  function upqode_custom_pagination($query = null)
  {
    global $wp_query;
    $query = $query ? $query : $wp_query;
    $total_pages = $query->max_num_pages;

    if ($total_pages > 1) {
      $current_page = max(1, get_query_var('paged'));
      $paginate_links = paginate_links(array(
        'base' => add_query_arg('paged', '%#%'),
        'format' => 'page/%#%',
        'current' => $current_page,
        'total' => $total_pages,
        'prev_text' => esc_html__('« Prev', 'sixtyia'),
        'next_text' => esc_html__('Next »', 'sixtyia'),
      ));

      if ($paginate_links) {
        echo '<div class="sixtyia-pagination">' . $paginate_links . '</div>';
      }
    }
  }
}

/**
 * Prints HTML with meta information about theme author.
 */
if (!function_exists('upqode_posted_by_author')) {
  function upqode_posted_by_author()
  {
    if (!get_the_author_meta('description') && post_type_supports(get_post_type(), 'author')) {
      printf(
        esc_html__('By %s', 'sixtyia'),
        '<a href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '" rel="author">' . esc_html(get_the_author()) . '</a>'
      );
    }
  }
}

// Сomment
if (!function_exists('upqode_comments')) {
  function upqode_comments()
  {
    if (comments_open() || '0' != get_comments_number() && wp_count_comments(get_the_ID())) { ?>
      <div class="sixtyia-single__comments">
        <?php comments_template('', true); ?>
      </div>
<?php }
  }
}



class Custom_Walker_Nav_Menu extends Walker_Nav_Menu
{

  function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
  {
    parent::start_el($output, $item, $depth, $args, $id);

    if ($args->walker->has_children) {
      $output .= '<i class="icon-angle-down"></i>';
    }
  }

  function end_el(&$output, $item, $depth = 0, $args = array())
  {
    parent::end_el($output, $item, $depth, $args);
    if ($args->walker->has_children) {
      $output .= '';
    }
  }
}
