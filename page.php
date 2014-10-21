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
					<div class="breadcrumb">
						<a href="<?php bloginfo('url'); ?>" class="bread-home-page">Главная</a>												
						<span class="bread-divider">/</span>						
						<?php 
                            if (is_page('beginners')) {
                                echo '<a href="/trainings.html" class="bread-page color-flag-green">Тренировки</a>
                                        <span class="bread-divider">/</span>';                                
                            }  

                            elseif (is_page('advanced')) {
                                echo '<a href="/trainings.html" class="bread-page color-flag-green">Тренировки</a>
                                        <span class="bread-divider">/</span>';                                
                            }

                            elseif (is_page('seniors')) {
                                echo '<a href="/trainings.html" class="bread-page color-flag-green">Тренировки</a>
                                        <span class="bread-divider">/</span>';                                
                            }

                            elseif (is_page('children')) {
                                echo '<a href="/trainings.html" class="bread-page color-flag-green">Тренировки</a>
                                        <span class="bread-divider">/</span>';                                
                            }

                            else {
                                echo '';
                            }
                        
                        ?>
                        <span class="bread-current-page 
                            <?php
                                if (is_page('beginners')) {echo 'color-flag-green';}
                                elseif (is_page('advanced')) {echo 'color-flag-green';}
                                elseif (is_page('seniors')) {echo 'color-flag-green';}
                                elseif (is_page('children')) {echo 'color-flag-green';}
                                elseif (is_page('music')) {echo 'color-flag-blue';}
                                elseif (is_page('o-shkole')) {echo 'color-flag-blue';}
                                elseif (is_page('classes')) {echo 'color-flag-blue';}
                                elseif (is_page('coach')) {echo 'color-flag-blue';}
                                elseif (is_page('group_show')) {echo 'color-flag-green';}                                
                                else { echo '';}                                     
                            ?>                        
                        
                        "><?php the_title(); ?></span>
						
						<?php  ?>
						<div class="cos-share pull-right">
						   <script type="text/javascript" src="//yastatic.net/share/share.js" charset="utf-8"></script>
                            <div class="yashare-auto-init" data-yashareL10n="ru" data-yashareQuickServices="vkontakte,facebook,twitter,odnoklassniki,moimir,gplus" data-yashareTheme="counter"></div>
						</div>
				    </div>						
				</div>
			</div><!-- .row -->			

			<div class="row">
				<div class="col-xs-12">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); the_content(); endwhile; endif ?>
				</div>
			</div><!-- .row -->			
		</div>
		<!-- Default Page / End -->
		
		<?php get_footer(); ?>

