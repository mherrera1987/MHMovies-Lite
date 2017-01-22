<?php
include_once 'admin/admin-init.php';
include ('aq_resizer.php');

/* Ocultar barra wp */
add_filter( 'show_admin_bar', '__return_false' );

/* Integrar imagenes destacadas */
add_theme_support( 'post-thumbnails' );

/* Cargar estilos bootstrap y javascript */
function mh_load_styles(){
	wp_register_style( 'bootstrap.min', get_template_directory_uri() . '/css/bootstrap.min.css' );
	wp_register_style( 'font-awesome.min', get_template_directory_uri() . '/css/font-awesome.min.css' );
	wp_register_style('theme_style', get_stylesheet_uri(), '', '1.0', 'all');
	wp_enqueue_style( 'bootstrap.min' );
	wp_enqueue_style( 'font-awesome.min' );
	wp_enqueue_style('theme_style');
}
add_action('wp_enqueue_scripts', 'mh_load_styles');

function mh_load_js() {
	wp_enqueue_script('jquery');
    wp_register_script('jquery.bootstrap.min', get_template_directory_uri() . '/js/bootstrap.min.js', 'jquery');
    wp_enqueue_script('jquery.bootstrap.min');

	wp_register_script( 'ie_html5shiv', get_bloginfo('stylesheet_url'). '/js/html5shiv.min.js', __FILE__, false, '3.7.2' );
	wp_enqueue_script( 'ie_html5shiv');
	wp_script_add_data( 'ie_html5shiv', 'conditional', 'lt IE 9' );

	wp_register_script( 'ie_respond', get_bloginfo('stylesheet_url'). '/js/respond.min.js', __FILE__, false, '1.4.2' );
	wp_enqueue_script( 'ie_respond');
	wp_script_add_data( 'ie_respond', 'conditional', 'lt IE 9' );
}
add_action( 'init', 'mh_load_js' );


/* Paginación */
require get_template_directory() . '/inc/paginate.php';

/* Agregados del theme */
function mhmovies_setup() {
	register_nav_menus(
		array(
		'top_menu' => __( 'Menú Principal', 'mhmovies' )
		)
	);
	add_theme_support( 'html5', array( 'comment-list' ) );
}
add_action( 'after_setup_theme', 'mhmovies_setup' );

// Register Custom Navigation Walker
require_once('inc/wp_bootstrap_navwalker.php');

/* Taxonomías */
    register_taxonomy('calidad', 'post', 
		array(
		'hierarchical' => false,  
		'label' => 'Calidad ',
		'query_var' => true, 
		'rewrite' => true
		)
	);
	register_taxonomy('anio', 'post', 
		array(
		'hierarchical' => false,  
		'label' => 'A&ntilde;o',
		'query_var' => true, 
		'rewrite' => true
		)
	);

	register_taxonomy('pais', 'post', 
		array(
		'hierarchical' => false,  
		'label' => 'País',
		'query_var' => true, 
		'rewrite' => true
		)
	);
//Ocultar Editor de WP
add_action('init', 'remove_editor_init');
function remove_editor_init() {
    remove_post_type_support('post', 'editor');
}

//Copyright
add_action('wp_footer', 'copyright');
function copyright() {

$copyright_notice = "Desarrollado por <a href='http://marceloherrera.com.ar'>Marcelo Herrera</a>";

echo $copyright_notice;

}

//Comentarios con bootstrap
add_filter( 'comment_form_default_fields', 'bootstrap3_comment_form_fields' );
function bootstrap3_comment_form_fields( $fields ) {
	$commenter = wp_get_current_commenter();
	
	$req      = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );
	$html5    = current_theme_supports( 'html5', 'comment-form' ) ? 1 : 0;
	
	$fields   =  array(
		'author' => '<div class="form-group comment-form-author">' . '<label for="author">' . __( 'Nombre' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
					'<input class="form-control" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></div>',
		'email'  => '<div class="form-group comment-form-email"><label for="email">' . __( 'Email' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
					'<input class="form-control" id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></div>',
		'url'    => '<div class="form-group comment-form-url"><label for="url">' . __( 'Sitio Web' ) . '</label> ' .
					'<input class="form-control" id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></div>'        
	);
	
	return $fields;
}

add_filter( 'comment_form_defaults', 'bootstrap3_comment_form' );
function bootstrap3_comment_form( $args ) {
	$args['comment_field'] = '<div class="form-group comment-form-comment">
			<label for="comment">' . _x( 'Comment', 'noun' ) . '</label> 
			<textarea class="form-control" id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>
		</div>';
	$args['class_submit'] = 'btn btn-default'; // since WP 4.1
	
	return $args;
}

add_action('comment_form', 'bootstrap3_comment_button' );
function bootstrap3_comment_button() {
	echo '<button class="btn btn-default" type="submit">' . __( 'Enviar' ) . '</button>';
}

include_once("inc/meta-boxes.php");

//Registrando la Sidebar
function registrar_sidebar(){  
  register_sidebar(array(  
   'name' => 'Sidebar Películas',  
   'id' => 'sidebar-peliculas',  
   'description' => 'Sidebar de películas (single.php)',  
   'class' => 'sidebar',  
   'before_widget' => '<aside id="%1$s" class="widget %2$s">',  
   'after_widget' => '</aside>',  
   'before_title' => '<h2 class="widget-title">',  
   'after_title' => '</h2>',  
  ));  
}  
add_action( 'widgets_init', 'registrar_sidebar');  
?>