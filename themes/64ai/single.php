<?php

/**
 * Single post
 */

get_header();

while (have_posts()) : the_post();


?>
	<section class="upqode-single" <?php post_class(); ?>>
		<div class="container">
			<div class="upqode-single__wrap">

				<?php the_title('<h1 class="upqode-single__title">', '</h1>'); ?>

				<?php if (has_post_thumbnail()) { ?>
					<div class="upqode-single__banner">
						<?php the_post_thumbnail(); ?>
					</div>
				<?php } ?>

				<div class="upqode-single__categories">
					<?php the_category(' '); ?>
				</div>

				<div class="upqode-single__author">
					<?php upqode_posted_by_author() ?>
				</div>

				<div class="upqode-single__date">
					<?php echo get_the_date(); ?>
				</div>

				<div class="upqode-single__content">
					<?php the_content(); ?>
				</div>

				<?php
				the_tags(
					'<div class="upqode-single__tags">',
					' ',
					'</div>'
				); ?>


			</div>
		</div>
	</section>


<?php endwhile;

wp_reset_postdata();

get_footer();
