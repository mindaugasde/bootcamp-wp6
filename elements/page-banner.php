<?php if( is_home() ): 

$post_data = get_post(22);
global $post;
$post = $post_data;
setup_postdata($post);

endif; ?>
<!-- Page banner -->
<?php $title = get_field('h_pp_subtitle'); ?>
<aside id="fh5co-hero" class="js-fullheight">
	<div class="flexslider js-fullheight">
		<ul class="slides">
		<li<?php if( has_post_thumbnail() ): ?> style="background-image: url(<?php the_post_thumbnail_url(); ?>);"<?php endif; ?>>
			<div class="overlay"></div>
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center js-fullheight slider-text">
					<div class="slider-text-inner">
						<h2 class="heading-title"><?php echo ($title) ? $title : get_the_title(); ?></h2>
						<?php (is_home()) ? the_field('h_bpp_content') : the_content(); ?>
					</div>
				</div>
				</div>
			</div>
		</li>
		</ul>
	</div>
</aside>
<?php if(is_home()) { wp_reset_postdata(); } ?>