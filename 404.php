<?php get_header(); ?>
	<body <?php body_class('');?>>
        <?php include(TEMPLATEPATH . '/nav.php'); ?>
		
        <?php include(TEMPLATEPATH . '/logo-and-flag-block.php'); ?>	
		
		<!-- Default Page  / Start -->
		<div class="container" style="padding:0;">
			<div class="row" style="padding-top:20px;">
				<div class="col-xs-12">
					<div class="breadcrumb">
						<a href="<?php bloginfo('url'); ?>" class="bread-home-page">Главная</a>												
						<span class="bread-divider">/</span>
						<span class="bread-current-page">Ошибка 404</span>
						<div class="cos-share pull-right">
						   <script type="text/javascript" src="//yastatic.net/share/share.js" charset="utf-8"></script>
                            <div class="yashare-auto-init" data-yashareL10n="ru" data-yashareQuickServices="vkontakte,facebook,twitter,odnoklassniki,moimir,gplus" data-yashareTheme="counter"></div>
						</div>
				    </div>						
				</div>
			</div><!-- .row -->

			<div class="row">
				<div class="col-xs-12 text-center" style="font-size:18px">
                    <p>Внимание! Ошибка 404!!!</p>
                    <p>На сайте нет такой страницы</p>
                    <p><a style="text-decoration:underline;" href="/">Перейти на главную</a></p>                    
				</div>
			</div><!-- .row -->			
		</div>
		<!-- Default Page / End -->
		
		<?php get_footer(); ?>