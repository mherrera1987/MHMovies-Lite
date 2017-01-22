<?php get_header(); ?>

    <!-- Contenido de la película -->
    <div class="container">
		<?php if ( have_posts() ) : ?>

		<?php /* Iniciar el Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>
						
        <!-- Título, datos y ad1 -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?php the_title();?></h1>
				<?php the_content();?>
            </div>
        </div>
        <!-- /.row -->
        
        <!-- Comentarios -->
        <div class="row">
            <div class="col-lg-12">
				<?php comments_template();?>
            </div>
        </div>
        <!-- /.row -->

		<?php endwhile; ?>
			
			<div class="clearfix"></div>

		<?php endif; ?>

        <hr>

<?php get_footer(); ?>
