<?php $categories = get_the_category($post->ID); if ($categories) { $category_ids = array(); foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id; $args=array( 'category__in' => $category_ids, 'post__not_in' => array($post->ID), 'showposts'=>3, 'orderby' => rand, 'caller_get_posts'=>1 );
	$my_query = new wp_query( $args );
	if( $my_query->have_posts() ) {
		echo '<div class="posts-relacionados"><h3>'.__('Películas Relacionadas','mh').'</h3>';
		while( $my_query->have_posts() ) { ++$counter; if($counter == 3) { $post_class = 'last'; $counter = 0; } else { $post_class = ''; } $my_query->the_post();?>
			<article id="post-<?php the_ID(); ?>" <?php post_class('col-md-3 col-sm-3 pbox'); ?>>
					<?php
						$thumb = get_post_thumbnail_id();
						$img_url = wp_get_attachment_url( $thumb,'full' );
						$image = aq_resize( $img_url, 240, 360, true ); //Modificar tamaño y recortar imagen
					?>						
					<?php if($image) : ?>
					<a href="<?php the_permalink(); ?>"><img class="img-responsive" src="<?php echo $image ?>" alt="Póster de <?php echo get_the_title(); ?>" title="Ver <?php echo get_the_title(); ?> Gratis" /></a>
					<?php endif; ?>		
			</article>
<?php } echo '</div>'; }} wp_reset_query(); ?>