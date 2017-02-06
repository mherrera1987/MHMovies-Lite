<?php get_header(); ?>
    <!-- Contenido de la película -->
    <div class="container">
		<?php if ( have_posts() ) : ?>
		<?php /* Iniciar el Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>						
        <!-- Título, datos y ad1 -->
        <div class="row">
            <div class="col-lg-12">
				<?php if ($mhmovies_lite['act-anuncio1'] == TRUE){
					echo $mhmovies_lite['anuncio1'];
				}else{
					echo "<center><img class='img-responsive portfolio-item' src='http://placehold.it/728x90'></center>";
				}?>	
                <?php the_title('<h1>', '</h1>', TRUE);?>
				<ul class="list-inline">
					<li class="list-inline-item"><i class="fa fa-filter"></i> <?php the_category(', '); ?></li>
					<li class="list-inline-item"><?php if(get_the_term_list($post->ID, 'anio', TRUE)) : ?><i class="fa fa-calendar"></i> <?php echo get_the_term_list($post->ID, 'anio', '', ', ', '', true); ?><?php endif;?></li>
					<li class="list-inline-item"><?php if(get_the_term_list($post->ID, 'pais', TRUE)) : ?><i class="fa fa-globe"></i> <?php echo get_the_term_list($post->ID, 'pais', '', ', ', '', true); ?><?php endif;?></li>
				</ul>
            </div>
        </div>
        <!-- /.row -->
        <!-- Reproductores -->
        <div class="row">
            <div class="col-lg-12">
                <?php get_template_part('reproductores');?>
            </div>
        </div>
        <div class="row">
        	<div class="col-lg-8">
        	    <h2><?php _e('Sinopsis', 'mh');?></h2>
					<?php $sinopsis = get_post_custom_values('sinopsis') ?>
					<p><?php echo $sinopsis[0];?></p>
                    <div class="info">
                        <?php
                        if(get_the_tag_list()) {
                            echo get_the_tag_list('<span class="label label-default">','</span> <span class="label label-default">','</span>');
                        }
                        ?>
                        <span class="pull-right"><?php if(function_exists('the_ratings')) { the_ratings(); } ?></span>
                    </div>
                    <?php if($mhmovies_lite['peliculas-relacionadas'] == '1') { ?>
                        <?php get_template_part('peliculas-relacionadas');?>
                    <?php }?>
                    <?php comments_template();?>
        	</div>
            <div class="col-lg-4">
            	<?php get_sidebar('peliculas'); ?>  
            </div>
        </div>
        <!-- /.row -->
		<?php endwhile; ?>			
			<div class="clearfix"></div>
		<?php endif; ?>
        <hr>
<?php get_footer(); ?>