<?php
/* Campos Personalizados*/
    $sp_boxes = array (

		'INFORMACION DE LA PELICULA' => array (
			array( 'sinopsis', 'Sinopsis:', 'textarea'),
			array( 'trailer', 'Trailer:', 'textarea' ),
		),
		'REPRODUCTORES VOSE' => array (
			array( 'player1vose', 'Título del Reproductor 1'),
			array( 'reproductor1vose', 'codigo html o iframe del video 1', 'textarea'),
			array( 'player2vose', 'Título del Reproductor 2'),
			array( 'reproductor2vose', 'codigo html o iframe del video 2', 'textarea'),
			array( 'player3vose', 'Título del Reproductor 3'),
			array( 'reproductor3vose', 'codigo html o iframe del video 3', 'textarea'),
			array( 'player4vose', 'Título del Reproductor 4'),
			array( 'reproductor4vose', 'codigo html o iframe del video 4', 'textarea'),
			array( 'player5vose', 'Título del Reproductor 5'),
			array( 'reproductor5vose', 'codigo html o iframe del video 5', 'textarea'),
		),
		'REPRODUCTORES CASTELLANO' => array (
			array( 'player1castellano', 'Título del Reproductor 1'),
			array( 'reproductor1castellano', 'codigo html o iframe del video 1', 'textarea'),
			array( 'player2castellano', 'Título del Reproductor 2'),
			array( 'reproductor2castellano', 'codigo html o iframe del video 2', 'textarea'),
			array( 'player3castellano', 'Título del Reproductor 3'),
			array( 'reproductor3castellano', 'codigo html o iframe del video 3', 'textarea'),
			array( 'player4castellano', 'Título del Reproductor 4'),
			array( 'reproductor4castellano', 'codigo html o iframe del video 4', 'textarea'),
			array( 'player5castellano', 'Título del Reproductor 5'),
			array( 'reproductor5castellano', 'codigo html o iframe del video 5', 'textarea'),
		),
		'REPRODUCTORES LATINO' => array (
			array( 'player1latino', 'Título del Reproductor 1'),
			array( 'reproductor1latino', 'codigo html o iframe del video 1', 'textarea'),
			array( 'player2latino', 'Título del Reproductor 2'),
			array( 'reproductor2latino', 'codigo html o iframe del video 2', 'textarea'),
			array( 'player3latino', 'Título del Reproductor 3'),
			array( 'reproductor3latino', 'codigo html o iframe del video 3', 'textarea'),
			array( 'player4latino', 'Título del Reproductor 4'),
			array( 'reproductor4latino', 'codigo html o iframe del video 4', 'textarea'),
			array( 'player5latino', 'Título del Reproductor 5'),
			array( 'reproductor5latino', 'codigo html o iframe del video 5', 'textarea'),
		),
);

// Utilice la acciÃ³n admin_menu para definir los cuadros personalizados
add_action( 'admin_menu', 'sp_add_custom_box' );

// Utilice la acciÃ³n save_post que hacer algo con los datos introducidos
// guarda campos perzonalizados
add_action( 'save_post', 'sp_save_postdata', 1, 2 );

// AÃ±ade una secciÃ³n personalizada de la "avanzada" de Correos y PÃ¡gina pantallas de ediciÃ³n
function sp_add_custom_box() {
    global $sp_boxes;

    if ( function_exists( 'add_meta_box' ) ) {

        foreach ( array_keys( $sp_boxes ) as $box_name ) {
            add_meta_box( $box_name, __( $box_name, 'sp' ), 'sp_post_custom_box', 'post', 'normal', 'high' );
        }
    }
}

function sp_post_custom_box ( $obj, $box ) {
    global $sp_boxes;
    static $sp_nonce_flag = false;

    // Ejecutar una vez
    if ( ! $sp_nonce_flag ) {
        echo_sp_nonce();
        $sp_nonce_flag = true;
    }

    // Genrate box contents
    foreach ( $sp_boxes[$box['id']] as $sp_box ) {
        echo field_html( $sp_box );
    }
}

function field_html ( $args ) {

    switch ( $args[2] ) {

        case 'textarea':
            return text_area( $args );

        case 'checkbox':
            // To Do

        case 'radio':
            // To Do

        case 'text':
        default:
            return text_field( $args );
    }
}

function text_field ( $args ) {
    global $post;

    // adjust data
    $args[2] = get_post_meta($post->ID, $args[0], true);
    $args[1] = __($args[1], 'sp' );

    $label_format =
          '<label for="%1$s">%2$s</label><br />'
        . '<input style="width: 50%%;" type="text" name="%1$s" value="%3$s" /><br /><br />';

    return vsprintf( $label_format, $args );
}

function text_area ( $args ) {
    global $post;

    // adjust data
    $args[2] = get_post_meta($post->ID, $args[0], true);
    $args[1] = __($args[1], 'sp' );

    $label_format =
          '<label for="%1$s">%2$s</label><br />'
        . '<textarea style="width: 100%%;" name="%1$s">%3$s</textarea><br /><br />';

    return vsprintf( $label_format, $args );
}

/* When the post is saved, saves our custom data */
function sp_save_postdata($post_id, $post) {
    global $sp_boxes;

    // verify this came from the our screen and with proper authorization,
    // because save_post can be triggered at other times
    if ( ! wp_verify_nonce( $_POST['sp_nonce_name'], plugin_basename(__FILE__) ) ) {
        return $post->ID;
    }

    // Is the user allowed to edit the post or page?
    if ( 'page' == $_POST['post_type'] ) {
        if ( ! current_user_can( 'edit_page', $post->ID ))
            return $post->ID;

    } else {
        if ( ! current_user_can( 'edit_post', $post->ID ))
            return $post->ID;
    }

    // OK, we're authenticated: we need to find and save the data
    // We'll put it into an array to make it easier to loop though.

    // The data is already in $sp_boxes, but we need to flatten it out.
    foreach ( $sp_boxes as $sp_box ) {
        foreach ( $sp_box as $sp_fields ) {
            $my_data[$sp_fields[0]] =  $_POST[$sp_fields[0]];
        }
    }

    // Add values of $my_data as custom fields
    // Let's cycle through the $my_data array!
    foreach ($my_data as $key => $value) {
        if ( 'revision' == $post->post_type  ) {
            // don't store custom data twice
            return;
        }

        // if $value is an array, make it a CSV (unlikely)
        $value = implode(',', (array)$value);

        if ( get_post_meta($post->ID, $key, FALSE) ) {

            // Custom field has a value.
            update_post_meta($post->ID, $key, $value);


        } else {

            // Custom field does not have a value.
            add_post_meta($post->ID, $key, $value);
        }

        if (!$value) {

            // delete blanks
            delete_post_meta($post->ID, $key);
        }
    }
}

function echo_sp_nonce () {

    // Use nonce for verification ... ONLY USE ONCE!
    echo sprintf(
        '<input type="hidden" name="%1$s" id="%1$s" value="%2$s" />',
        'sp_nonce_name',
        wp_create_nonce( plugin_basename(__FILE__) )
    );
}

// A simple function to get data stored in a custom field
if ( !function_exists('get_custom_field') ) {
    function get_custom_field($field) {
       global $post;
       $custom_field = get_post_meta($post->ID, $field, true);
       echo $custom_field;
    }
}
?>
