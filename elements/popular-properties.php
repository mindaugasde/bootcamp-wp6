<?php $nr = get_field('h_pp_number_of_posts'); ?>
<div id="fh5co-popular-properties" class="fh5co-section-gray">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
				<h3><?php the_field('h_pp_title'); ?></h3>
				<?php the_field('h_pp_description'); ?>
			</div>
		</div>
		<?php

		$page = (get_query_var('paged')) ? get_query_var('paged') : 1;

		$my_query = new WP_Query(array(
			'post_type' => 'Properties',
			'posts_per_page' => $nr,
			'orderby' => 'meta_value',
			'order' => 'DESC',
			'paged' => $page,
			'meta_key' => 'views'
		));

		if ( $my_query->have_posts() ) :

		?>
		<div class="row">
			<?php $i = 1; while ($my_query->have_posts()) : $my_query->the_post(); ?>
			
			<?php $cat = get_the_category(); ?>
			<div class="col-md-4 animate-box">
				<a href="<?php the_permalink(); ?>" class="fh5co-property"<?php if( has_post_thumbnail() ): ?> style="background-image: url(<?php the_post_thumbnail_url(); ?>);"<?php endif; ?>>
					<span class="status"><?php echo $cat[0]->name; ?></span>
					<div class="prop-details">
						<span class="price"><?php the_field('h_pp_price'); ?>&euro;</span>
						<h3><?php the_title(); ?></h3>
					</div>
				</a>
			</div>
			<?php $i++; endwhile; ?>
		</div>
		<?php wp_reset_postdata(); unset($my_query); endif; ?>
	</div>
</div>