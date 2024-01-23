<?php

// Blog post Sharing
if (!function_exists('upqode_sharing_icon_links')) {

  function upqode_sharing_icon_links()
  {

    global $post;

    $html = '<ul>';

    // facebook
    $facebook_url = 'https://www.facebook.com/sharer/sharer.php?u=' . get_the_permalink();
    $html .= '<li><a href="' . esc_url($facebook_url) . '" target="_blank">facebook</a></li>';

    // twitter
    $twitter_url = 'https://twitter.com/share?' . esc_url(get_permalink()) . '&amp;text=' . get_the_title();
    $html .= '<li><a href="' . esc_url($twitter_url) . '" target="_blank">twitter</a></li>';

    // linkedin
    $linkedin_url = 'http://www.linkedin.com/shareArticle?url=' . esc_url(get_permalink()) . '&amp;title=' . get_the_title();
    $html .= '<li><a href="' . esc_url($linkedin_url) . '" target="_blank">linkedin</a></li>';

    // pinterest
    $pinterest_url = 'https://pinterest.com/pin/create/bookmarklet/?url=' . esc_url(get_permalink()) . '&amp;description=' . get_the_title() . '&amp;media=' . esc_url(wp_get_attachment_url(get_post_thumbnail_id($post->ID)));
    $html .= '<li><a href="' . esc_url($pinterest_url) . '" target="_blank">pinterest</a></li>';

    // tumblr
    $tumblr_url = 'http://www.tumblr.com/share/link?url=' . urlencode(esc_url(get_permalink())) . '&amp;name=' . urlencode(get_the_title()) . '&amp;description=' . urlencode(get_the_excerpt());
    $html .= '<li><a href="' . esc_url($tumblr_url) . '" target="_blank">tumblr</a></li>';

    // reddit
    $reddit_url = 'http://reddit.com/submit?url=' . esc_url(get_permalink()) . '&amp;title=' . get_the_title();
    $html .= '<li><a href="' . esc_url($reddit_url) . '" target="_blank">reddit</a></li>';

    $html .= '</ul>';

    echo wp_kses_post($html);
  }
}


/**
 * Print the next and previous posts navigation.
 */
if (!function_exists('upqode_the_posts_navigation')) {
  function upqode_the_posts_navigation()
  {
    $prev_post = get_previous_post();
    $next_post = get_next_post();

    if (!empty($prev_post)) {
      $prev_thumbnail_id = get_post_thumbnail_id($prev_post->ID);
      $prev_post_title         = !empty(get_the_title($prev_post)) ? get_the_title($prev_post) : esc_html__('No title', 'upqode');
      $prev_link               = get_permalink($prev_post);
    }

    if (!empty($next_post)) {
      $next_thumbnail_id       = get_post_thumbnail_id($next_post->ID);
      $next_post_title         = !empty(get_the_title($next_post)) ? get_the_title($next_post) : esc_html__('No title', 'upqode');
      $next_link               = get_permalink($next_post);
    }

    echo '<div>';
    if (!empty($prev_post)) : ?>
      <div class="upqode-single__pagination-prev">
        <a href="<?php echo esc_url($prev_link); ?>">
          <?php echo wp_kses($prev_post_title, 'post'); ?>
        </a>

        <a href="<?php echo esc_url($prev_link); ?>">
          <span><?php esc_html_e('Prev', 'upqode'); ?></span>
        </a>

        <?php if (!empty($prev_thumbnail_id)) { ?>
          <a href="<?php echo esc_url($prev_link); ?>">
            <?php echo wp_get_attachment_image($prev_thumbnail_id, 'medium'); ?>
          </a>
        <?php } ?>
      </div>
    <?php endif;


    if (!empty($next_post)) : ?>
      <div class="upqode-single__pagination-next">
        <a href="<?php echo esc_url($next_link); ?>">
          <?php echo wp_kses($next_post_title, 'post'); ?>
        </a>

        <a href="<?php echo esc_url($next_link); ?>">
          <span><?php esc_html_e('Next', 'upqode'); ?></span>
        </a>

        <?php if (!empty($next_thumbnail_id)) { ?>
          <a href="<?php echo esc_url($next_link); ?>">
            <?php echo wp_get_attachment_image($next_thumbnail_id, 'medium'); ?>
          </a>
        <?php } ?>
      </div>
      <?php endif;

    echo '</div>';
  }
}








/**
 * Create custom html structure for comments
 */
if (!function_exists('upqode_comment')) {
  function upqode_comment($comment, $args, $depth)
  {

    $GLOBALS['comment'] = $comment;

    switch ($comment->comment_type):
      case 'pingback':
      case 'trackback': ?>
        <div class="pinback">
          <span class="pin-title"><?php esc_html_e('Pingback: ', 'upqode'); ?></span><?php comment_author_link(); ?>
          <?php edit_comment_link(esc_html__('(Edit)', 'upqode'), '<span class="edit-link">', '</span>'); ?>

        <?php
        break;
      default:
        // generate comments
        ?>
          <div <?php comment_class('upqode-single__comments-item'); ?> id="li-comment-<?php comment_ID(); ?>">
            <div id="comment-<?php comment_ID(); ?>" class="upqode-single__comments-item-wrap">
              <div class="upqode-single__comments-content">
                <span class="person-img">
                  <?php echo get_avatar($comment, '80', '', '', array('class' => 'img-person')); ?>
                </span>
                <div class="comment-content">
                  <div class="author-wrap">
                    <div class="author">
                      <?php comment_author(); ?>
                    </div>
                    <?php comment_reply_link(
                      array_merge(
                        $args,
                        array(
                          'reply_text' => esc_html__('Reply', 'upqode'),
                          'after'      => '',
                          'depth'      => $depth,
                          'max_depth'  => $args['max_depth']
                        )
                      )
                    ); ?>
                  </div>
                  <div class="comment-date">
                    <?php comment_date(get_option('date_format')); ?>
                  </div>

                  <div class="comment-text">
                    <?php comment_text(); ?>
                  </div>

                </div>
              </div>
            </div>
    <?php
        break;
    endswitch;
  }
}




/**
 * Search page content
 */
function upqode_search_filter($query)
{
  if ($query->is_search && !is_admin()) {
    $query->set('post_type', array('post', 'page'));
  }
  return $query;
}
add_filter('pre_get_posts', 'upqode_search_filter');


// Reading Time Post
if (!function_exists('upqode_reading_time')) {
  function upqode_reading_time()
  {
    $post_id   = get_the_ID();
    $content = get_post_field('post_content', $post_id);

    $word_count       = str_word_count(strip_tags($content));
    $readingtime      = ceil($word_count / 200);
    $totalreadingtime = $readingtime . ' min';

    $countKey = 'post_reading_count';
    $count    = get_post_meta($post_id, $countKey, true);
    if ($count == '') {
      delete_post_meta($post_id, $countKey);
      add_post_meta($post_id, $countKey, $totalreadingtime);
    } else {
      update_post_meta($post_id, $countKey, $totalreadingtime);
    }

    return $totalreadingtime;
  }
}




// ! optimization

//Remove JQuery migrate
if (!function_exists('theme_remove_jquery_migrate')) {
  function theme_remove_jquery_migrate($scripts)
  {
    if (!is_admin() && isset($scripts->registered['jquery'])) {
      $script = $scripts->registered['jquery'];
      if ($script->deps) {
        // Check whether the script has any dependencies

        $script->deps = array_diff($script->deps, array('jquery-migrate'));
      }
    }
  }

  add_action('wp_default_scripts', 'theme_remove_jquery_migrate');
}
