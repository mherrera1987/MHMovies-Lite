	<ul class="nav nav-pills">
    <li class="active"><a data-toggle="pill" href="#home"><?php _e('Trailer', 'mh');?></a></li>
    <li class="dropdown">
    	<?php $checkvose = get_post_custom_values("player1vose"); if($checkvose[0] != NULL): ?>
        	<a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php _e('Subtitulado', 'mh');?> <span class="caret"></span></a>
        <?php else: ?>
        	<a class="dropdown-toggle" data-toggle="dropdown" href="#" style="display: none;"><?php _e('Subtitulado', 'mh');?> <span class="caret"></span></a>
        <?php endif ?>
      <ul class="dropdown-menu">
		<?php $player1vose = get_post_custom_values("player1vose"); if($player1vose[0] != NULL){ ?>
			<li><a href="#vose1" data-toggle="tab"><?php echo $player1vose[0]; ?></a></li>
		<?php } ?>
		<?php $player2vose = get_post_custom_values("player2vose"); if($player2vose[0] != NULL){ ?>
			<li><a href="#vose2" data-toggle="tab"><?php echo $player2vose[0]; ?></a></li>
		<?php } ?>
		<?php $player3vose = get_post_custom_values("player3vose"); if($player3vose[0] != NULL){ ?>
			<li><a href="#vose3" data-toggle="tab"><?php echo $player3vose[0]; ?></a></li>
		<?php } ?>
		<?php $player4vose = get_post_custom_values("player4vose"); if($player4vose[0] != NULL){ ?>
			<li><a href="#vose4" data-toggle="tab"><?php echo $player4vose[0]; ?></a></li>
		<?php } ?>
		<?php $player5vose = get_post_custom_values("player5vose"); if($player5vose[0] != NULL){ ?>
			<li><a href="#vose5" data-toggle="tab"><?php echo $player5vose[0]; ?></a></li>
		<?php } ?>                       
      </ul>
    </li>
    <li class="dropdown">
    	<?php $checkcastellano = get_post_custom_values("player1castellano"); if($checkcastellano[0] != NULL): ?>
        	<a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php _e('Castellano', 'mh');?> <span class="caret"></span></a>
        <?php else: ?>
        	<a class="dropdown-toggle" data-toggle="dropdown" href="#" style="display: none;"><?php _e('Castellano', 'mh');?> <span class="caret"></span></a>
        <?php endif ?>
        <ul class="dropdown-menu">
		<?php $player1castellano = get_post_custom_values("player1castellano"); if($player1castellano[0] != NULL){ ?>
			<li><a href="#cast1" data-toggle="tab"><?php echo $player1castellano[0]; ?></a></li>
		<?php } ?>
		<?php $player2castellano = get_post_custom_values("player2castellano"); if($player2castellano[0] != NULL){ ?>
			<li><a href="#cast2" data-toggle="tab"><?php echo $player2castellano[0]; ?></a></li>
		<?php } ?>
		<?php $player3castellano = get_post_custom_values("player3castellano"); if($player3castellano[0] != NULL){ ?>
			<li><a href="#cast3" data-toggle="tab"><?php echo $player3castellano[0]; ?></a></li>
		<?php } ?>
		<?php $player4castellano = get_post_custom_values("player4castellano"); if($player4castellano[0] != NULL){ ?>
			<li><a href="#cast4" data-toggle="tab"><?php echo $player4castellano[0]; ?></a></li>
		<?php } ?>
		<?php $player5castellano = get_post_custom_values("player5castellano"); if($player5castellano[0] != NULL){ ?>
			<li><a href="#cast5" data-toggle="tab"><?php echo $player5castellano[0]; ?></a></li>
		<?php } ?>                          
      </ul>
    </li>
    <li class="dropdown">
    	<?php $checklatino = get_post_custom_values("player1latino"); if($checklatino[0] != NULL): ?>
        	<a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php _e('Latino', 'mh');?> <span class="caret"></span></a>
        <?php else: ?>
        	<a class="dropdown-toggle" data-toggle="dropdown" href="#" style="display: none;"><?php _e('Latino', 'mh');?> <span class="caret"></span></a>
        <?php endif ?>
      <ul class="dropdown-menu">
		<?php $player1latino = get_post_custom_values("player1latino"); if($player1latino[0] != NULL){ ?>
			<li><a href="#lat1" data-toggle="tab"><?php echo $player1latino[0]; ?></a></li>
		<?php } ?>
		<?php $player2latino = get_post_custom_values("player2latino"); if($player2latino[0] != NULL){ ?>
			<li><a href="#lat2" data-toggle="tab"><?php echo $player2latino[0]; ?></a></li>
		<?php } ?>
		<?php $player3latino = get_post_custom_values("player3latino"); if($player3latino[0] != NULL){ ?>
			<li><a href="#lat3" data-toggle="tab"><?php echo $player3latino[0]; ?></a></li>
		<?php } ?>
		<?php $player4latino = get_post_custom_values("player4latino"); if($player4latino[0] != NULL){ ?>
			<li><a href="#lat4" data-toggle="tab"><?php echo $player4latino[0]; ?></a></li>
		<?php } ?>  
		<?php $player5latino = get_post_custom_values("player5latino"); if($player5latino[0] != NULL){ ?>
			<li><a href="#lat5" data-toggle="tab"><?php echo $player5latino[0]; ?></a></li>
		<?php } ?>                        
      </ul>
    </li>
  </ul>
  
  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
		<div class="pelicula" align="center">
			<?php if(get_post_meta($post->ID, 'trailer', true)) : ?>
				<?php echo get_post_meta($post->ID, 'trailer', true); ?>
			<?php endif; ?>
		</div>
    </div>
    <div id="vose1" class="tab-pane fade">
		<div class="pelicula" align="center">
			<?php if(get_post_meta($post->ID, 'reproductor1vose', true)) : ?>
				<?php echo get_post_meta($post->ID, 'reproductor1vose', true); ?>
			<?php endif; ?>
		</div>
    </div>
	<div id="vose2" class="tab-pane fade">
		<div class="pelicula" align="center">
			<?php if(get_post_meta($post->ID, 'reproductor2vose', true)) : ?>
				<?php echo get_post_meta($post->ID, 'reproductor2vose', true); ?>
			<?php endif; ?>
		</div>
    </div>
    <div id="vose3" class="tab-pane fade">
		<div class="pelicula" align="center">
			<?php if(get_post_meta($post->ID, 'reproductor3vose', true)) : ?>
				<?php echo get_post_meta($post->ID, 'reproductor3vose', true); ?>
			<?php endif; ?>
		</div>
    </div>
    <div id="vose4" class="tab-pane fade">
		<div class="pelicula" align="center">
			<?php if(get_post_meta($post->ID, 'reproductor4vose', true)) : ?>
				<?php echo get_post_meta($post->ID, 'reproductor4vose', true); ?>
			<?php endif; ?>
		</div>
    </div>
    <div id="vose5" class="tab-pane fade">
		<div class="pelicula" align="center">
			<?php if(get_post_meta($post->ID, 'reproductor5vose', true)) : ?>
				<?php echo get_post_meta($post->ID, 'reproductor5vose', true); ?>
			<?php endif; ?>
		</div>
    </div>
    <div id="cast1" class="tab-pane fade">
		<div class="pelicula" align="center">
			<?php if(get_post_meta($post->ID, 'reproductor1castellano', true)) : ?>
				<?php echo get_post_meta($post->ID, 'reproductor1castellano', true); ?>
			<?php endif; ?>
		</div>
    </div>
	<div id="cast2" class="tab-pane fade">
		<div class="pelicula" align="center">
			<?php if(get_post_meta($post->ID, 'reproductor2castellano', true)) : ?>
				<?php echo get_post_meta($post->ID, 'reproductor2castellano', true); ?>
			<?php endif; ?>
		</div>
    </div>
    <div id="cast3" class="tab-pane fade">
		<div class="pelicula" align="center">
			<?php if(get_post_meta($post->ID, 'reproductor3castellano', true)) : ?>
				<?php echo get_post_meta($post->ID, 'reproductor3castellano', true); ?>
			<?php endif; ?>
		</div>
    </div>
    <div id="cast4" class="tab-pane fade">
		<?php if(get_post_meta($post->ID, 'reproductor4castellano', true)) : ?>
			<?php echo get_post_meta($post->ID, 'reproductor4castellano', true); ?>
		<?php endif; ?>
    </div>
    <div id="cast5" class="tab-pane fade">
		<div class="pelicula" align="center">
			<?php if(get_post_meta($post->ID, 'reproductor5castellano', true)) : ?>
				<?php echo get_post_meta($post->ID, 'reproductor5castellano', true); ?>
			<?php endif; ?>
		</div>
    </div>
    <div id="lat1" class="tab-pane fade">
		<div class="pelicula" align="center">
			<?php if(get_post_meta($post->ID, 'reproductor1latino', true)) : ?>
				<?php echo get_post_meta($post->ID, 'reproductor1latino', true); ?>
			<?php endif; ?>
		</div>
    </div>
	<div id="lat2" class="tab-pane fade">
		<div class="pelicula" align="center">
			<?php if(get_post_meta($post->ID, 'reproductor2latino', true)) : ?>
				<?php echo get_post_meta($post->ID, 'reproductor2latino', true); ?>
			<?php endif; ?>
		</div>
    </div>
    <div id="lat3" class="tab-pane fade">
		<div class="pelicula" align="center">
			<?php if(get_post_meta($post->ID, 'reproductor3latino', true)) : ?>
				<?php echo get_post_meta($post->ID, 'reproductor3latino', true); ?>
			<?php endif; ?>
		</div>
    </div>
    <div id="lat4" class="tab-pane fade">
		<?php if(get_post_meta($post->ID, 'reproductor4latino', true)) : ?>
			<?php echo get_post_meta($post->ID, 'reproductor4latino', true); ?>
		<?php endif; ?>
    </div>
    <div id="lat5" class="tab-pane fade">
		<div class="pelicula" align="center">
			<?php if(get_post_meta($post->ID, 'reproductor5latino', true)) : ?>
				<?php echo get_post_meta($post->ID, 'reproductor5latino', true); ?>
			<?php endif; ?>
		</div>
    </div>
  </div>
