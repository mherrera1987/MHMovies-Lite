<?php get_header(); ?>
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
            	<?php if (is_category()) { ?>
					<h1 class="page-header">
						<span><?php _e("Películas de", "mh"); ?></span> <?php single_cat_title(); ?>
					</h1>
					<?php } elseif (is_tag()) { ?> 
					<h1 class="page-header">
						<span><?php _e("Películas de", "mh"); ?></span> <?php single_tag_title(); ?>
					</h1>
				<?php } ?>
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
							<a href="<?php the_permalink(); ?>"> <img class="img-responsive" src="<?php echo $image ?>"/></a>
							<?php endif; ?>	
                            <div class="caption">
                                <h4 class="pull-right"><?php echo get_the_term_list($post->ID, 'anio', '', ', ', '', true); ?></h4>
                                <h4><a href="<?php the_permalink(); ?>" title="<?php echo get_the_title(); ?>"><?php titulo_corto($post->post_title, 27); ?></a></h4>
                            </div>
                            <div class="ratings">
                                <p class="pull-right"><?php comentarios(); ?></p>
                                <p><?php if(function_exists('the_ratings')) { the_ratings(); } ?></p>
                            </div>		
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
