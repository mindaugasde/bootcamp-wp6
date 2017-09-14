<?php get_header(); ?>
<?php get_template_part('elements/page-banner'); ?>

<?php 

// The number of all posts for a given query
$posts_found = $GLOBALS['wp_query']->found_posts;
// The number of posts for just the page
$posts_count = $GLOBALS['wp_query']->post_count;

if(have_posts()): ?>
	
	<div id="fh5co-blog-section" class="fh5co-section-gray">
		<div class="container">
			<div class="row row-bottom-padded-md">

			<?php while (have_posts()) : the_post(); ?>
			
			
			
			<div class="col-lg-4 col-md-4 col-sm-6">
				<div class="fh5co-blog animate-box">
					<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium-2', array('class' => 'img-responsive')); ?></a>
					
					<div class="blog-text">
						<div class="prod-title">
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							
							<span class="posted_by"><?php echo get_the_date('M. jS'); ?></span>
							<span class="comment"><a href=""><?php echo $post->comment_count; ?><i class="icon-bubble2"></i></a></span>
							<?php the_excerpt(); ?>
							<p><a href="<?php the_permalink(); ?>"><?php _e('Learn More','vcs-starter'); ?>...</a></p>
						</div>
					</div> 
				</div>
			</div>

			<?php endwhile; ?>
	
			</div>
		</div>
	</div>

<?php endif; ?>

<?php get_footer(); ?>