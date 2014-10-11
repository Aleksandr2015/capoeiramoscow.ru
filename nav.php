		<!-- Main navigation / Start -->
<!--
		<div class="navbar navbar-inverse navbar-static-top" role="navigation" style="margin-bottom:-20px;">
			<div class="container">		
-->
            <div class="container navbar-inverse navbar-static-top" role="navigation" style="position: relative;z-index:9999;">
			    <div class="navbar-header">
			        <button class="navbar-toggle" data-target=".navbar-collapse" data-toggle="collapse" type="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>		
				</div>
				<?php
					wp_nav_menu( array(
						'menu'              => 'primary',
						'theme_location'    => 'primary',
						'depth'             => 2,
						'container'         => 'div',
						'container_class'   => 'collapse navbar-collapse',
						'container_id'      => 'capoeira-navbar-main',
						'menu_class'        => 'nav navbar-nav cust-main-nav',
						'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
						'walker'            => new wp_bootstrap_navwalker())
					);
					?>
			</div>
		</div>
		<!-- Main navigation / End -->