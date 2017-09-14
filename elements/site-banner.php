<?php if( $slides = get_field('h_shs_slides') ): ?>
<aside id="fh5co-hero" class="js-fullheight">
	<div class="flexslider js-fullheight">
		<ul class="slides">
		<?php
		for( $i=0; $i<sizeof($slides); $i++ ):
		$post_data = get_post( $slides[$i] );
		global $post;
		$post = $post_data;
		setup_postdata($post);
			
		$cat = get_the_category();
		?>
		<li<?php if( has_post_thumbnail() ): ?> style="background-image: url(<?php the_post_thumbnail_url(); ?>);"<?php endif; ?>>
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-4 col-md-offset-4 col-md-pull-4 js-fullheight slider-text">
						<div class="slider-text-inner">
							<div class="desc">
								<span class="status"><?php echo $cat[0]->name; ?></span>
								<h1><?php the_title(); ?></h1>
									<h2 class="price"><?php the_field('h_pp_price'); ?><?php echo ($cat[0]->slug == 'rent') ? " &euro;/mos" : " &euro;"; ?></h2>
									<?php the_content(); ?>
									<?php if( have_rows('h_pp_property_details') ): ?>
									<p class="details">
										<?php while ( have_rows('h_pp_property_details') ) : the_row(); ?>
										<span><?php the_sub_field('h_pp_pd_detail'); ?></span>
										<?php endwhile; ?>
									</p>
									<?php endif; ?>
									<p><a class="btn btn-primary btn-lg" href="<?php the_permalink(); ?>"><?php _e('Learn More','vcs-starter'); ?></a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</li>	
		<?php wp_reset_postdata(); endfor; ?>   	
		</ul>
	</div>
</aside>
<?php endif; ?>