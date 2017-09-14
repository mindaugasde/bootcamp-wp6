<?php get_header(); ?>

<?php 

// The number of all posts for a given query
$posts_found = $GLOBALS['wp_query']->found_posts;
// The number of posts for just the page
$posts_count = $GLOBALS['wp_query']->post_count;

if(have_posts()): ?>

	<?php while (have_posts()) : the_post(); ?>

	<div id="fh5co-blog-section" class="fh5co-section-gray" style="padding: 0;">
		<div class="fh5co-blog">
			<?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?>
			<div class="blog-text">
				<div class="prod-title">
					<h3><?php the_title(); ?></h3>
					<span class="posted_by"><?php echo get_the_date('M. jS'); ?></span>
					<span class="comment"><a href=""><?php echo $post->comment_count; ?><i class="icon-bubble2"></i></a></span>
					<?php the_content(); ?>
				</div>
			</div>
			
			<?php comments_template(); ?>
			
		</div>
	</div>

	<?php endwhile; ?>
	
<?php endif; ?>

<?php get_footer(); ?>