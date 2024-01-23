<form role="search" method="get" id="searchform" action="<?php echo esc_url(home_url('/')); ?>">
    <label class="screen-reader-text" for="s"><?php esc_html_e('Search for:', 'upqode'); ?> </label>
    <input type="text" value="<?php echo get_search_query() ?>" name="s" id="s" placeholder="<?php esc_attr_e('Keyword search...', 'upqode'); ?>" />
    <input type="submit" id="searchsubmit" value="<?php esc_attr_e('Search', 'upqode'); ?>" />
</form>