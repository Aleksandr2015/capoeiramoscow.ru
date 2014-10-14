<?php get_header(); ?>
	<body <?php body_class('');?>>
       
        <!-- Social Buttons Fixed Left / Start -->
		<?php include (TEMPLATEPATH . '/social_buttons.php'); ?>
		<!-- Social Buttons Fixed Left / End -->
       
        <?php include(TEMPLATEPATH . '/nav.php'); ?>
		
        <?php include(TEMPLATEPATH . '/logo-and-flag-block.php'); ?>		
		
		<!-- News / Start -->
		<div class="container" style="padding:0;">
			<div class="row" style="padding-top:20px;">
					<div class="col-xs-12">
						<div class="btn-group btn-breadcrumb">
							<a href="<?php bloginfo('url'); ?>" class="btn btn-default"><i class="glyphicon glyphicon-home"></i></a>
							<?php
								// Get the ID of a given category
								$category_id = get_cat_ID( 'Новости' );
								// Get the URL of this category
								$category_link = get_category_link( $category_id );
							?>							
							<a href="<?php echo esc_url( $category_link ); ?>" title="<?php echo get_cat_name(1);?>" class="btn btn-default">Новости</a>
							<a href="<?php the_permalink();?>" class="btn btn-danger"><?php the_title();?></a>							
						</div>
						<hr>
					</div>
			</div><!-- .row -->

			<div class="row">
				<div class="col-xs-12">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<h3 style="margin-top:0;font-size:130%;"><?php the_title(); ?></h3>
						<hr style="margin-bottom:5px;">
						<p class="text-left" style="color:#777;"><small>Дата публикации: <?php echo get_the_date('d.m.Y'); ?></small></p>
						
						<?php the_content();?>
						
						<!-- Next post links / Start -->
						
						<ul class="pagination" style="position:fixed;left:-3px;top:50%;z-index:999;">
							<li><?php previous_post_link('%link', '<', true); ?></li>						
						</ul>
						
						<ul class="pagination" style="position:fixed;right:-3px;top:50%;z-index:999;">
							<li><?php next_post_link('%link', '>', true); ?></li>
						</ul>
						
						<!-- Next post links / End -->
						
						
												
					<?php endwhile; endif; ?>																				
				</div>
			</div><!-- .row .homepage_wish_thumbs -->			
		</div>
		<!-- News / End -->
		
		<?php get_footer(); ?>
