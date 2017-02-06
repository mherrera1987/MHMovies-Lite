<?php global $mhmovies_lite; ?>
<?php if ($mhmovies_lite['act-anuncio2'] == TRUE){
		echo $mhmovies_lite['anuncio2'];
}else{
		echo "<center><img class='img-responsive portfolio-item' src='http://placehold.it/300x250'></center>";
}?>
<?php if ( is_active_sidebar( 'sidebar-peliculas' ) ) : ?>  
         <div id="widget-area" class="widget-area">  
             <?php dynamic_sidebar( 'sidebar-peliculas' ); ?> 
         </div>  
<?php endif; ?>  