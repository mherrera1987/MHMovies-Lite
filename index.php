<?php get_header(); ?>
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?php _e('Últimas Películas', 'mh');?></h1>
            </div>
        </div>
        <!-- /.row -->
	<div id="primary" class="content-area ">
		<main id="main" class="site-main" role="main">
			<?php if ( have_posts() ) : ?>
				<?php /* Iniciar el Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class('col-md-3 col-sm-3 pbox'); ?>>
							<?php
								$thumb = get_post_thumbnail_id();
								$img_url = wp_get_attachment_url( $thumb,'full' );
								$image = aq_resize( $img_url, 240, 360, true ); //Modificar tamaño y recortar imagen
							?>									
							<?php if($image) : ?>
							<a href="<?php the_permalink(); ?>"><img class="img-responsive" src="<?php echo $image ?>" alt="Póster de <?php echo get_the_title(); ?>" title="Ver <?php echo get_the_title(); ?> Gratis" /></a>
							<?php endif; ?>		
					</article><!-- #post-## -->
				<?php endwhile; ?>
			<div class="clearfix"></div>
			<div class="col-md-12">
				<?php bootstrap_pagination();?>
			</div>
		<?php else : ?>
			<?php get_template_part( 'no-results', 'index' ); ?>
		<?php endif; ?>
		</main><!-- #main -->
	</div><!-- #primary -->
<hr>
<?php get_footer(); ?>
