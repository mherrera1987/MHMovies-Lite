<!-- [ Estilos ]-->
<style type="text/css">
<?php if($mhmovies_lite['color-fondo'] != '') { ?>
body {background-color:<?php echo $mhmovies_lite['color-fondo']; ?>;}
<?php } ?>
<?php if($mhmovies_lite['color-principal'] != '') { ?>
.navbar-inverse {background-color:<?php echo $mhmovies_lite['color-principal']; ?>;}
<?php } ?>
<?php if ($mhmovies_lite['color-principal'] != '') { ?>
.navbar-inverse .navbar-inverse .navbar-nav > .active > a, .navbar-inverse .navbar-nav > .active > a:hover, .navbar-inverse .navbar-nav > .active > a:focus {background-color: <?php echo $mhmovies_lite['color-principal']; ?>;}
a {color: <?php echo $mhmovies_lite['color-principal']; ?>;}
a:hover, a:focus {color: <?php echo $mhmovies_lite['color-principal']; ?>;}
.navbar-inverse .navbar-nav > .active > a, .navbar-inverse .navbar-nav > .active > a:hover, .navbar-inverse .navbar-nav > .active > a:focus {background-color: <?php echo $mhmovies_lite['color-principal']; ?>;}
<?php } ?>
<?php if ($mhmovies_lite['color-secundario'] != '') { ?>
.navbar-inverse .navbar-brand:hover, .navbar-inverse .navbar-brand:focus {color: <?php echo $mhmovies_lite['color-secundario']; ?>;}
.nav-pills > li.active > a, .nav-pills > li.active > a:hover, .nav-pills > li.active > a:focus {background-color: <?php echo $mhmovies_lite['color-secundario']; ?>;}
<?php } ?>
<?php echo $mhmovies_lite['custom-css']; ?>
</style>