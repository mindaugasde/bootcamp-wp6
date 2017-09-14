<?php

// Įjungiame post thumbnail

add_theme_support( 'post-thumbnails' );

// Apsibrėžiame stiliaus failus ir skriptus

if( !defined('ASSETS_URL') ) {
	define('ASSETS_URL', get_bloginfo('template_url'));
}

function theme_scripts(){

    if ( !is_admin() ) {
		
        wp_deregister_script('jquery');
		wp_register_script('jquery', ASSETS_URL . '/assets/js/jquery.min.js', false, false, true);
		wp_register_script('jquery-easing', ASSETS_URL . '/assets/js/jquery.easing.1.3.js', false, false, true);
		wp_register_script('bootstrap', ASSETS_URL . '/assets/js/bootstrap.min.js', false, false, true);
		wp_register_script('waypoints', ASSETS_URL . '/assets/js/jquery.waypoints.min.js', false, false, true);
		wp_register_script('sticky', ASSETS_URL . '/assets/js/sticky.js', false, false, true);
		wp_register_script('hover-intent', ASSETS_URL . '/assets/js/hoverIntent.js', false, '7.0', true);
		wp_register_script('superfish', ASSETS_URL . '/assets/js/superfish.js', false, false, true);
		wp_register_script('flexslider', ASSETS_URL . '/assets/js/jquery.flexslider-min.js', false, false, true);
		wp_register_script('bs-date', ASSETS_URL . '/assets/js/bootstrap-datepicker.min.js', false, false, true);
		wp_register_script('classie', ASSETS_URL . '/assets/js/classie.js', false, false, true);
		wp_register_script('selectFx', ASSETS_URL . '/assets/js/selectFx.js', false, false, true);
        wp_register_script('js_main', ASSETS_URL . '/assets/js/main.js', array('jquery','jquery-easing','bootstrap','waypoints','sticky','hover-intent','superfish','flexslider','bs-date','classie','selectFx'), '1.0', true);
        wp_enqueue_script('js_main');
    }
}
add_action('wp_enqueue_scripts', 'theme_scripts');


function theme_stylesheets(){

	$styles_path = ASSETS_URL . '/assets/css/style.css';

	if( $styles_path ) {
	
		wp_register_style('open-sans', 'https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,300', false, false, false);
		wp_register_style('animate', ASSETS_URL . '/assets/css/animate.css', false, false, false);
		wp_register_style('icomoon', ASSETS_URL . '/assets/css/icomoon.css', false, false, false);
		wp_register_style('bootstrap', ASSETS_URL . '/assets/css/bootstrap.css', false, false, false);
		wp_register_style('superfish', ASSETS_URL . '/assets/css/superfish.css', false, false, false);
		wp_register_style('flexslider', ASSETS_URL . '/assets/css/flexslider.css', false, false, false);
		wp_register_style('magnific-popup', ASSETS_URL . '/assets/css/magnific-popup.css', false, false, false);
		wp_register_style('bootstrap-datepicker', ASSETS_URL . '/assets/css/bootstrap-datepicker.min.css', false, false, false);
		wp_register_style('cs-select', ASSETS_URL . '/assets/css/cs-select.css', false, false, false);
		wp_register_style('cs-skin-border', ASSETS_URL . '/assets/css/cs-skin-border.css', false, false, false);
		wp_register_style('main', ASSETS_URL . '/assets/css/style.css', array('open-sans','animate','icomoon','bootstrap','superfish','flexslider','magnific-popup','bootstrap-datepicker','cs-select','cs-skin-border'), false, false);
		
		wp_enqueue_style('main');
	}
}
add_action('wp_enqueue_scripts', 'theme_stylesheets');

// Apibrėžiame navigacijas

function register_theme_menus() {
   
	register_nav_menus(array( 
        'primary-navigation' => __('Primary Navigation'),
		'footer-links' => __('Footer Links'),
		'footer-info' => __('Footer Information')
    ));
}

add_action( 'init', 'register_theme_menus' );

// Apibrėžiame widgets juostas

$sidebars = array( 'Footer Widgets' );

if( isset($sidebars) && !empty($sidebars) ) {

	foreach( $sidebars as $sidebar ) {

		if( empty($sidebar) ) continue;

		$id = sanitize_title($sidebar);

		register_sidebar(array(
			'name' => $sidebar,
			'id' => $id,
			'description' => $sidebar,
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		));
	}
}

// Custom posts

$themePostTypes = array(
	'Properties' => 'Property',
	'Agents' => 'Agent'
);

function createPostTypes() {

	global $themePostTypes;
 
	$defaultArgs = array(
		'taxonomies' => array('category'), // uncomment this line to enable custom post type categories
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		#'menu_icon' => '',
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => true,
		'has_archive' => true, // to enable archive page, disabled to avoid conflicts with page permalinks
		'menu_position' => null,
		'can_export' => true,
		'supports' => array( 'title', 'editor', 'thumbnail', /*'custom-fields', 'author', 'excerpt', 'comments'*/ ),
	);

	foreach( $themePostTypes as $postType => $postTypeSingular ) {

		$myArgs = $defaultArgs;
		$slug = 'our' . '-' . sanitize_title( $postType );
		$labels = makePostTypeLabels( $postType, $postTypeSingular );
		$myArgs['labels'] = $labels;
		$myArgs['rewrite'] = array( 'slug' => $slug, 'with_front' => true );
		$functionName = 'postType' . $postType . 'Vars';

		if( function_exists($functionName) ) {
			
			$customVars = call_user_func($functionName);

			if( is_array($customVars) && !empty($customVars) ) {
				$myArgs = array_merge($myArgs, $customVars);
			}
		}

		register_post_type( $postType, $myArgs );

	}
}

if( isset( $themePostTypes ) && !empty( $themePostTypes ) && is_array( $themePostTypes ) ) {
	add_action('init', 'createPostTypes', 0 );
}


function makePostTypeLabels( $name, $nameSingular ) {

	return array(
		'name' => _x($name, 'post type general name'),
		'singular_name' => _x($nameSingular, 'post type singular name'),
		'add_new' => _x('Add New', 'Example item'),
		'add_new_item' => __('Add New '.$nameSingular),
		'edit_item' => __('Edit '.$nameSingular),
		'new_item' => __('New '.$nameSingular),
		'view_item' => __('View '.$nameSingular),
		'search_items' => __('Search '.$name),
		'not_found' => __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Bin'),
		'parent_item_colon' => ''
	);
}

// ACF options pages
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page("Global");
	
}

// Custom menu function
function our_awesome_menu($menu_id, $menu_class, $location){
	wp_nav_menu(array(
		'container' => 'ul',
		'menu_id' => $menu_id,
		'menu_class' => $menu_class,
		'theme_location' => $location,
		'menu' => $location
	));
}

// Custom image sizes
add_image_size('medium-2', 800, 1600, false);

// Excerpt length
function wpdocs_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );
