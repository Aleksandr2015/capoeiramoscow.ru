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
					<div class="breadcrumb">
					    <div class="bread-titles-wrap">
                            <a href="<?php bloginfo('url'); ?>" class="bread-home-page">Главная</a>												
                            <span class="bread-divider">/</span>
                            <span class="bread-current-page"><?php the_title(); ?></span>
						</div>
						<div class="cos-share pull-right">
						   <script type="text/javascript" src="//yastatic.net/share/share.js" charset="utf-8"></script>
                            <div class="yashare-auto-init" data-yashareL10n="ru" data-yashareQuickServices="vkontakte,facebook,twitter,odnoklassniki,moimir,gplus" data-yashareTheme="counter"></div>
						</div>
				    </div>						
				</div>
			</div><!-- .row -->

			<div class="row">
				<div class="col-xs-8">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<!--						<h3 style="margin-top:0;font-size:130%;"><?php the_title(); ?></h3>-->
						<hr style="margin-bottom:5px;">
						<p class="text-left" style="color:#777;"><small>Дата публикации: <?php echo get_the_date('d.m.Y'); ?></small></p>
						<a class="thumbnail" href="<?php the_permalink(); ?>">
							<?php 
								if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
									the_post_thumbnail('thumbnail', array('class' => 'img-responsive'),'full');
								} 
								else {
									echo '<img style="width:100%;" class="img-responsive" src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/capoeira_logo_ifnothumb.jpg" />';										
								}
							?>
						</a>
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
				<div class="col-xs-4 col-md-4 col-sm-4 col-xs-4">
					<!--<a href="#search">Search</a>
					<div id="search">
						<button type="button" class="close">×</button>
						<form>
							<input type="search" value="" placeholder="type keyword(s) here" />
							<button type="submit" class="btn btn-primary">Search</button>
						</form>
					</div>-->
					<script type="text/javascript" src="//vk.com/js/api/openapi.js?113"></script>
					<!-- VK Widget -->
					<div id="vk_groups"></div>
					<script type="text/javascript">
					VK.Widgets.Group("vk_groups", {mode: 0, width: "360", height: "360", color1: 'ffffff', color2: '2B587A', color3: 'F07762'}, 13967237);
					</script>
				</div>
			</div><!-- .row .homepage_wish_thumbs -->			
		</div>
		<!-- News / End -->
		
		<?php get_footer(); ?>
