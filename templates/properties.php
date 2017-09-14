<?php

/* Template Name: Properties Page */

get_header();

// The number of all posts for a given query
$posts_found = $GLOBALS['wp_query']->found_posts;
// The number of posts for just the page
$posts_count = $GLOBALS['wp_query']->post_count;

if(have_posts()): ?>

	<?php while (have_posts()) : the_post(); ?>
		
		<?php
		get_template_part('elements/page-banner');

		$page = (get_query_var('paged')) ? get_query_var('paged') : 1;

		$my_query = new WP_Query(array(
			'post_type' => 'Properties',
			'posts_per_page' => -1,
			'orderby' => 'menu_order',
			'order' => 'DESC',
			'paged' => $page
		));

		if ( $my_query->have_posts() ) :

		?>
		
		<div id="fh5co-properties" class="fh5co-section-gray">
			<div class="container">
				<div class="row">

				<?php $i = 1; while ($my_query->have_posts()) : $my_query->the_post(); ?>
				
				<?php $cat = get_the_category(); ?>

				<div class="col-md-4 animate-box">
					<div class="property">
						<a href="<?php the_permalink(); ?>" class="fh5co-property"<?php if( has_post_thumbnail() ): ?> style="background-image: url(<?php the_post_thumbnail_url(); ?>);"<?php endif; ?>>
							<span class="status"><?php echo $cat[0]->name; ?></span>
							<?php if( have_rows('h_pp_property_details') ): ?>
							<ul class="list-details">
								<?php while ( have_rows('h_pp_property_details') ) : the_row(); ?>
								<li><?php the_sub_field('h_pp_pd_detail'); ?><li>
								<?php endwhile; ?>
							</ul>
							<?php endif; ?>
						</a>
						<div class="property-details">
							<h3><?php the_title(); ?></h3>
							<span class="price"><?php the_field('h_pp_price'); ?>&euro;</span>
							<?php the_content(); ?>
							<span class="address"><i class="icon-map"></i><?php the_field('h_pp_address'); ?></span>
						</div>
					</div>
				</div>

				<?php $i++; endwhile; ?>
		
				</div>
			</div>
		</div>

		<?php wp_reset_postdata(); unset($my_query); ?>

		<?php endif; ?>

	<?php endwhile; ?>

<?php endif; ?>

<?php get_footer(); ?>