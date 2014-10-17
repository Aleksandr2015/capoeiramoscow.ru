		<!-- Logo and banner / Start -->
		<div class="container-fluid">
			<div class="container capoeira-banner-section">
				<div class="row capoeira-logo-descr-flags">
					<div class="col-xs-3" style="padding-left:0px;margin-left:-15px;">
					<a href="<?php bloginfo('url'); ?>">
                        <?php
                            if (is_page('trainings')) {
                                echo '<img class="img-responsive" src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/capoeira_logo_green.jpg" alt="Abada Capoeira Moscow" />';
                            } elseif (is_page('gallery')) {
                                echo '<img class="img-responsive" src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/capoeira_logo_green.jpg" alt="Abada Capoeira Moscow" />';
                            } elseif (is_category('news')) {
                                echo '<img class="img-responsive" src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/capoeira_logo_blue.jpg" alt="Abada Capoeira Moscow" />';
                            } elseif (is_page('group_show')) {
                                echo '<img class="img-responsive" src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/capoeira_logo_blue.jpg" alt="Abada Capoeira Moscow" />';
                            } elseif (is_page('childrens')) {
                                echo '<img class="img-responsive" src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/capoeira_logo_yellow.jpg" alt="Abada Capoeira Moscow" />';
                            } elseif (is_page('o-shkole')) {
                                echo '<img class="img-responsive" src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/capoeira_logo_yellow.jpg" alt="Abada Capoeira Moscow" />';
                            } elseif (is_page('classes')) {
                                echo '<img class="img-responsive" src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/capoeira_logo_yellow.jpg" alt="Abada Capoeira Moscow" />';
                            } elseif (is_page('coach')) {
                                echo '<img class="img-responsive" src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/capoeira_logo_yellow.jpg" alt="Abada Capoeira Moscow" />';
                            } else {
                                echo '<img class="img-responsive" src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/capoeira_logo.jpg" alt="Abada Capoeira Moscow" />';
                            }
                        ?>
                    </a>    
				    </div>
					<div class="col-xs-6"><h2 class="capoeira-descr" style="margin-top:15px;">Официальное представительство школы Abada Capoeira в г. Москва.<br> Президент и создатель местре Камиза</h2></div>
					<div class="col-xs-3"><img class="text-right" src="<?php echo get_template_directory_uri();?>/images/capoeira_flags_russia_brazilia.png" alt="Флаги Россия-Бразилия" /></div>
				</div><!-- .row .capoeira-logo-descr-flags-->
			</div><!-- .container -->
		</div><!-- .container-fluid .capoeira-banner-section -->
		<!-- Logo and banner / End -->	