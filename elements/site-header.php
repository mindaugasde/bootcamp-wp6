<?php
$title = get_field('h_gs_header_title','option');
$titleArray = explode(' ', $title);
?>

<header id="fh5co-header-section" class="sticky-banner">
	<div class="container">
		<div class="nav-header">
			<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle dark"><i></i></a>
			<h1 id="fh5co-logo"><a href="<?php echo home_url(); ?>"><i class="icon-home"></i><?php
			if( sizeof($titleArray) <= 1 ):
				echo $title;
			else:
				// Generating title output
				$output = '';
				for($i=0;$i<sizeof($titleArray);$i++):
					
					if($i == 0):
						$output .= $titleArray[$i];
					else:
						$output .= '<span>' . $titleArray[$i] . '</span>';
					endif;
				
				endfor;
				echo $output;
			endif; ?></a></h1>
			<!-- START #fh5co-menu-wrap -->
			<nav id="fh5co-menu-wrap" role="navigation">
				<?php our_awesome_menu('fh5co-primary-menu', 'sf-menu', 'primary-navigation'); ?>
			</nav>
		</div>
	</div>
</header>