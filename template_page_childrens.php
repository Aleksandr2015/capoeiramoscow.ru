<?php/*
Template Name: Дети
*/?>
<?php get_header(); ?>
	<body <?php body_class('');?>>
       
       <!-- Social Buttons Fixed Left / Start -->
		<?php include (TEMPLATEPATH . '/social_buttons.php'); ?>
		<!-- Social Buttons Fixed Left / End -->
       
        <?php include(TEMPLATEPATH . '/nav.php'); ?>
		
        <?php include(TEMPLATEPATH . '/logo-and-flag-block.php'); ?>		
		
		<!-- Default Page  / Start -->
		<div class="container" style="padding:0;">
			<div class="row" style="padding-top:20px;">
					<div class="col-xs-12">
						<div class="btn-group btn-breadcrumb">
							<a href="<?php bloginfo('url'); ?>" class="btn btn-default"><i class="glyphicon glyphicon-home"></i></a>
							<a href="#" class="btn btn-danger">Дети</a>
						</div>
						<hr>
					</div>
			</div><!-- .row -->

			<div class="row">
				<div class="col-xs-12">
				    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); the_content(); endwhile; endif ?>
				</div>
				<div class="col-xs-6">
				    <a class="thumbnail" href="/childrens/child_trainings.html">
						<img alt="Детские тренировки" src="<?php echo get_template_directory_uri();?>/images/child_trainings.png">
						<p class="text-center">Тренировки</p>
					</a>
				</div>
				<div class="col-xs-6">
					<a class="thumbnail" href="/childrens/child_camps_summer_winter.html">
						<img alt="Детские лагеря" src="<?php echo get_template_directory_uri();?>/images/child_lagers.png">
						<p class="text-center">Лагеря(лето/зима)</p>
					</a>
				</div>				
			</div><!-- .row -->			
		</div>
		<!-- Default Page / End -->
		
		<?php get_footer(); ?>

