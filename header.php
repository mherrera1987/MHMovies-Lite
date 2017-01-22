<?php global $mhmovies_lite; ?>
<!DOCTYPE html>
<html <?php language_attributes();?>>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link rel="shortcut icon" href="<?php bloginfo('template_directory');?>/favicon.png" type="image/x-icon" />
    <title><?php wp_title(' | ', true, 'right');?> <?php bloginfo('name');?></title>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<?php wp_head(); ?>
	<?php include("estilos.php"); ?>
	<?php echo $mhmovies_lite['header-code'];?>
</head>

<body>
    <!-- Navigation -->
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<!-- Nombre del sitio y menu para móviles -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?php bloginfo('url')?>">
				<?php if ($mhmovies_lite['logo']['url'] == null){
					echo "<span class='glyphicon glyphicon-triangle-right' aria-hidden='true'></span>";?><?php bloginfo('name')?><?php
				}else{
					$img_url = $mhmovies_lite['logo']['url'];
					$image = aq_resize( $img_url, 150, 50, true );
					echo "<img src='{$image}' alt='Logo'>";
				}?>
			</a>
		</div>

		<!-- Obtener el menu -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'top_menu',
				'depth' => 2,
				'container' => false,
				'menu_class' => 'nav navbar-nav',
				'fallback_cb' => 'wp_page_menu',
				//Process nav menu using our custom nav walker
				'walker' => new wp_bootstrap_navwalker())
			);
			?>
			<!-- Perfiles Sociales -->
            <ul class="nav navbar-nav navbar-right social">
                <li><a href="<?php echo $mhmovies_lite['facebook-url'];?>" target="_blank"><i class="fa fa-lg fa-facebook"></i></a></li>
                <li><a href="http://twitter.com/<?php echo $mhmovies_lite['twitter-username'];?>" target="_blank"><i class="fa fa-lg fa-twitter"></i></a></li>
                <li><a href="<?php echo $mhmovies_lite['google-plus-url']; ?>" target="_blank"><i class="fa fa-lg fa-google-plus"></i></a></li>
            </ul>
		</div><!-- /.navbar-collapse --> 
	</nav>