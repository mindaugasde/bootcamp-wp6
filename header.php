<!DOCTYPE html>
<html class="no-js" lang="<?php bloginfo('language'); ?>">

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php wp_title(); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="shortcut icon" href="<?php echo ASSETS_URL . '/assets/images/favicon.ico'; ?>">
	
	<?php wp_head(); ?>
	
	<!-- Modernizr JS -->
	<script src="<?php echo ASSETS_URL . '/assets/js/modernizr-2.6.2.min.js' ?>"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="<?php echo ASSETS_URL . '/assets/js/respond.min.js'; ?>"></script>
	<![endif]-->

</head>
<body>
	<div id="fh5co-wrapper">
	<div id="fh5co-page">
	
	<?php get_template_part('elements/site-header'); ?>