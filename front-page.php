<?php get_header(); ?>

<?php
get_template_part('elements/site-banner');
get_template_part('elements/services');
get_template_part('elements/popular-properties');
?>

<?php

$page = (get_query_var('paged')) ? get_query_var('paged') : 1;

$my_query = new WP_Query(array(
	'post_type' => 'post',
	'posts_per_page' => -1,
	'orderby' => 'menu_order',
	'order' => 'DESC',
	'paged' => $page,
	'category_name' => 'featured'
));

if ( $my_query->have_posts() ) :

?>

<?php $i = 1; while ($my_query->have_posts()) : $my_query->the_post(); ?>

<?php echo $post->ID; ?>
<?php the_title(); ?>

<?php $i++; endwhile; ?>

<?php wp_reset_postdata(); unset($my_query); ?>

<?php endif; ?>

<?php get_footer(); ?>