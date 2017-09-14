<?php

/* Template Name: Agents Page */

get_header();

// The number of all posts for a given query
$posts_found = $GLOBALS['wp_query']->found_posts;
// The number of posts for just the page
$posts_count = $GLOBALS['wp_query']->post_count;

if(have_posts()): ?>

	<?php while (have_posts()) : the_post(); ?>
		
		<?php get_template_part('elements/page-banner'); ?>

	<?php endwhile; ?>

<?php endif; ?>

<?php get_footer(); ?>