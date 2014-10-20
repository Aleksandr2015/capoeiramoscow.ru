<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<title><?php the_title();?> | ABADA Capoeira Москва</title>
		<meta charset="<?php bloginfo('charset');?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!--		<meta name="viewport" content="width=device-width, initial-scale=1">-->
		<meta name="description" content ="Школа капоэйры ABADA Capoeira. Расписание занятий, новости, проекты"/>
		<meta name="keywords" content="капоэйра, капуэйра, капуэро, capoeira, kapoeira, капоэйра в москве, капоэйра москва, capoeira moscow, capoeiramoscow, алексей найденов, alexey naydenov, найденов алексей, алексей найденов капоэйра, градуадо фалкао, фалькао, graduado falcao, абада капоэйра, abada capoeira, капоэйра занятия, капоэйра тренер, jogos brasileiros, jogos mundiais, jogos europeos, местре камиза, зелёный пояс, капоэйра шоу группа, выступление на корпоративах, бразильские барабаны, бразильская перкуссия, шоу бразильских барабанов, шоу бразильской прекуссии, batucada batykada batukada batycada, батукада, бразильская батукада"/>
	<!-- Styles Bootstrap -->
		<link href="<?php echo get_template_directory_uri();?>/css/bootstrap.css" rel="stylesheet" media="screen">
	<!-- Styles Personalize -->
		<link href="<?php echo get_template_directory_uri();?>/style.css" rel="stylesheet" media="screen"  type="text/css" />	
	<!-- Gallery modal styles (scripts in footer) -->
		<link href="<?php echo get_template_directory_uri();?>/gallery_modal/gallery_modal.css" rel="stylesheet" media="screen" />		
	<!-- Favicon and touch icons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo get_template_directory_uri();?>/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_template_directory_uri();?>/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_template_directory_uri();?>/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri();?>/ico/apple-touch-icon-57-precomposed.png">
        <link rel="shortcut icon" href="<?php echo get_template_directory_uri();?>/ico/favicon.png">
        <link rel="shortcut icon" href="<?php echo get_template_directory_uri();?>/ico/favicon.ico">
        <link rel="icon" href="<?php echo get_template_directory_uri();?>/ico/favicon.ico" type="image/x-icon">
    <!-- yandex verification code -->
        <meta name='yandex-verification' content='55fce8015d237c7a' />
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<?php if ( is_user_logged_in() ) {echo '<style>.navbar.navbar-inverse.navbar-fixed-top {margin-top:32px;}</style>';} ?>
	<?php wp_head(); ?>
	</head>
	
