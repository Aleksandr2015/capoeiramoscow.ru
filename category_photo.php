<?php get_header(); ?>
	<body <?php body_class('');?>>
        <?php include(TEMPLATEPATH . '/nav.php'); ?>
		
        <?php include(TEMPLATEPATH . '/logo-and-flag-block.php'); ?>		
		
		<!-- Photo / Start -->
		<div class="container" style="padding:0;">
			<div class="row" style="padding-top:20px;">
					<div class="col-xs-12">
						<div class="btn-group btn-breadcrumb">
							<a href="<?php bloginfo('url'); ?>" class="btn btn-default"><i class="glyphicon glyphicon-home"></i></a>
							<?php
								// Get the ID of a given category
								$category_id = get_cat_ID( 'Фото' );
								// Get the URL of this category
								$category_link = get_category_link( $category_id );
							?>							
							<a href="<?php echo esc_url( $category_link ); ?>" title="<?php echo get_cat_name(17);?>" class="btn btn-danger"><?php echo get_cat_name(17);?></a>														
						</div>
						<hr>
					</div>
			</div><!-- .row -->

			<div class="row">
				<div class="col-xs-12">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<div class="col-xs-4 col-md-4 col-sm-4 col-xs-4">						
						<!--<p class="news-date"><small><?php# echo get_the_date('d.m.Y'); ?></small></p>-->
						<a class="thumbnail" href="<?php the_permalink(); ?>">
							<?php 
								if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
									the_post_thumbnail('thumbnail', array('class' => 'img-responsive cust-cap-full'),'full');
								} 
								else {
									echo '<img class="img-responsive cust-cap-full" src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/capoeira_logo.jpg" />';										
								}
							?>
						</a>
						<a href="<?php the_permalink(); ?>"><h3 style="margin-top:0;font-size:130%;min-height:75px;"><small><?php the_title(); ?></small></h3></a>
						<!--<p class="news-cat"><span class="cat-bold">Рубрика:&nbsp;</span><?php# $category = get_the_category(); echo $category[0]->cat_name; ?></p>-->
						<!--<p class="news-tags"><span class="tag-bold"><?php# the_tags('Тэги: ', ', ', '<br />'); ?></span></p>-->
						<hr>
					</div>					
					<?php endwhile; ?>					
					<div class="row text-center">	
						<div class="col-xs-12">
							<?php wp_pagenavi(); ?>
						</div>
					</div>
					<?php endif; ?>
					<!-- Script Replace Current class to active for Bootstrap 3 / Start -->
					<script>
						jQuery(document).ready(function() {
						  $wp_pn = jQuery('.pagination');
						  $wp_pn.find('span.current').parents('li').addClass('active');
						});
					</script>
					<!-- Script Replace Current class to active for Bootstrap 3 / End -->
					<!-- Bootstrap 3 pagination
					<div class="row text-center">					
						<div class="col-xs-12">							
							<ul class="pagination">
								<li><a href="#">&laquo;</a>
								</li>
								<li class="active"><a href="#">1</a>
								</li>
								<li><a href="#">2</a>
								</li>
								<li><a href="#">3</a>
								</li>
								<li><a href="#">4</a>
								</li>
								<li><a href="#">5</a>
								</li>
								<li><a href="#">&raquo;</a>
								</li>
							</ul>
						</div>
					</div>-->
				</div>
				<!--<div class="col-xs-4 col-md-4 col-sm-4 col-xs-4">					
					<script type="text/javascript" src="//vk.com/js/api/openapi.js?113"></script>					
					<div id="vk_groups"></div>
					<script type="text/javascript">
					VK.Widgets.Group("vk_groups", {mode: 0, width: "360", height: "360", color1: 'ffffff', color2: '2B587A', color3: 'F07762'}, 13967237);
					</script>
				</div>-->	
			</div><!-- .row -->			
		</div>
		<!-- Photo / End -->
		
		<?php get_footer(); ?>
