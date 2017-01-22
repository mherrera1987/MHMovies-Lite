<?php global $mhmovies_lite; ?>
<?php if ($mhmovies_lite['act-anuncio2'] == TRUE){
		echo "<h3>";?><?php _e('Publicidad', 'mh');?><?php echo "</h3>";
			echo $mhmovies_lite['anuncio2'];
}else{
	echo "<h3>";?><?php _e('Publicidad', 'mh');?><?php echo "</h3>";
		echo "<center><img class='img-responsive portfolio-item' src='http://placehold.it/300x250'></center>";
}?>
<?php if ( is_active_sidebar( 'sidebar-peliculas' ) ) : ?>  
         <div id="widget-area" class="widget-area">  
            <?php dynamic_sidebar( 'sidebar-peliculas' ); ?> 
         </div>  
<?php endif; ?>  