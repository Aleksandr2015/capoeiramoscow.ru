<?php/*
Template Name: develop
*/?>
<?php get_header(); ?>
	<body <?php body_class('');?>>
		<!-- Social Buttons Fixed Left / Start -->
		<?php include (TEMPLATEPATH . '/social_buttons.php'); ?>
		<!-- Social Buttons Fixed Left / End -->
		
        <?php include(TEMPLATEPATH . '/nav.php'); ?>
		
        <?php include(TEMPLATEPATH . '/logo-and-flag-block.php'); ?>	
		
		<div class="container">
			<div class="row">
				<div class="col-xs-6">
					<h2 class="text-center">Что нужно сделать</h2>
					<?php the_field('todo'); ?>
				</div>
				
				<div class="col-xs-6">
					<h2 class="text-center">Что сделано</h2>
					<?php the_field('done'); ?>
				</div>
			</div>
		</div>
		
		<?php get_footer(); ?>
