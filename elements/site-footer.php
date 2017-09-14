<footer>
	<div id="footer">
		<div class="container">
			<div class="row row-bottom-padded-md">
			<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Widgets')); ?>
			</div>

			<div class="row">
				<div class="col-md-12">
					<?php if( have_rows('h_sl_social_link','option') ): ?>
					<p class="fh5co-social-icons">
						
						<?php while ( have_rows('h_sl_social_link','option') ) : the_row();
						
						$url = get_sub_field('h_sl_sl_url','option');
						$icon = get_sub_field('h_sl_sl_network','option'); ?>
						<a href="<?php echo $url; ?>" target="_blank"><i class="icon-<?php echo $icon; ?>"></i></a>
						<?php endwhile; ?>
						
					</p>
					<?php endif; ?>
					
					<p>Copyright <?php echo date('Y'); ?> Free Html5 <a href="#">Module</a>. <?php _e('All Rights Reserved','vcs-starter'); ?>. <br>Made with <i class="icon-heart3"></i> by <a href="http://freehtml5.co/" target="_blank">Freehtml5.co</a> / Demo Images: <a href="https://unsplash.com/" target="_blank">Unsplash</a> &amp; <a href="http://blog.gessato.com/" target="_blank">Gessato</a></p>
				</div>
			</div>
		</div>
	</div>
</footer>