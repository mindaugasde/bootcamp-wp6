<?php if( have_rows('h_hps_services') ): ?>

<div id="fh5co-features">
	<div class="container">
		<div class="row">
			<?php $i=0; while ( have_rows('h_hps_services') ) : the_row(); $i++; ?>
			<div class="col-md-4 animate-box">

				<div class="feature-left">
					<span class="icon">
						<i class="icon-<?php the_sub_field('h_hps_s_service_type'); ?>"></i>
					</span>
					<div class="feature-copy">
						<h3><?php the_sub_field('h_hps_s_title'); ?></h3>
						<?php the_sub_field('h_hps_s_description'); ?>
						<p><a href="<?php the_sub_field('h_hps_s_url'); ?>"><?php _e('Learn More','vcs-starter'); ?></a></p>
					</div>
				</div>

			</div>
			
			<?php if( ($i % 3) == 0 ): ?>
			</div>
			<div class="row">
			<?php endif; ?>
			
			<?php endwhile; ?>
		</div>
	</div>
</div>
<?php endif; ?>