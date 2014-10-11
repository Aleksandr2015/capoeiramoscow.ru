<?php/*
Template Name: Галерея
*/?>
<!DOCTYPE html>
<?php get_header(); ?>
	<body <?php body_class('');?>>
        <?php include(TEMPLATEPATH . '/nav.php'); ?>
		
        <?php include(TEMPLATEPATH . '/logo-and-flag-block.php'); ?>		
		
		<!-- Gallerys Both / Start -->
		<div class="container" style="padding:0;">		
			<div class="row" style="padding-top:20px;">
					<div class="col-xs-12">
						<div class="btn-group btn-breadcrumb">
							<a href="<?php bloginfo('url'); ?>" class="btn btn-default"><i class="glyphicon glyphicon-home"></i></a>
							<a href="#" class="btn btn-danger"><?php the_title(); ?></a>
						</div>
						<hr>
					</div>
			</div><!-- .row -->

			<div class="row">				
				<div class="col-xs-6">
					<div class="row">
						<div class="col-xs-12">
							<h2 class="text-center">Видео</h2>
						</div>
					</div>
					<div class="row">
						<?php
							global $post; 
							$args = array('category' => 16, 'showposts' => 8);
							$custom_posts = get_posts($args);
							foreach($custom_posts as $post) : setup_postdata($post); 
						?>
						<div class="col-xs-3" style="margin-bottom:5%;">
							<!-- <a href="<?php the_permalink(); ?>"><h3 class="news-header"><?php the_title(); ?></h3></a> -->
							<a href="<?php the_permalink(); ?>" class="thumbnail cust-thumb-video">
								<?php 
									if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
										the_post_thumbnail('thumbnail', array('class' => 'img-responsive'),'full');
									} 
									else {
										echo '<img class="img-responsive" src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/capoeira_logo.jpg" />';										
									}
								?>
								<img class="cust-gal-cov-video" src="<?php echo get_template_directory_uri();?>/images/fig-2.png" alt="">
							</a>
						</div>
						<?php endforeach; wp_reset_postdata(); ?>
					</div>
					<div class="row">				
						<div class="col-xs-12 text-center">
							<hr>
							<a class="btn btn-danger" href="/video">Смотреть все видео >></a>
						</div>
					</div>
				</div>
				<div class="col-xs-6">
					<div class="row">
						<div class="col-xs-12">
							<h2 class="text-center">Фото</h2>
						</div>
					</div>
					<div class="row">
						<?php
							global $post; 
							$args = array('category' => 17, 'showposts' => 8);
							$custom_posts = get_posts($args);
							foreach($custom_posts as $post) : setup_postdata($post); 
						?>
						<div class="col-xs-3" style="margin-bottom:5%;">
							<!-- <a href="<?php the_permalink(); ?>"><h3 class="news-header"><?php the_title(); ?></h3></a> -->
							<a href="<?php the_permalink(); ?>" class="thumbnail cust-thumb-photo">
								<?php 
									if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
										the_post_thumbnail('thumbnail', array('class' => 'img-responsive'),'full');
									} 
									else {
										echo '<img class="img-responsive" src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/capoeira_logo.jpg" />';										
									}
								?>
								<img class="cust-gal-cov-photo" src="<?php echo get_template_directory_uri();?>/images/fig-1.png" alt="">
							</a>
						</div>
						<?php endforeach; wp_reset_postdata(); ?>
					</div>
					<div class="row">				
						<div class="col-xs-12 text-center">
							<hr>
							<a class="btn btn-danger" href="/photo">Смотреть все фото >></a>
						</div>
					</div>					
				</div>
			</div><!-- .row -->			
		</div>
		<!-- Gallerys Both / End -->
		
		<?php get_footer(); ?>

