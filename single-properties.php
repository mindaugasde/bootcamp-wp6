<?php
the_title();

if( !get_post_meta($post->ID, 'views') ){
	add_post_meta($post->ID, 'views', 1);
} else {
	$views = get_post_meta($post->ID, 'views');
	$final = $views[0] + 1;
	update_post_meta($post->ID, 'views', $final, $views[0]);
}
?>