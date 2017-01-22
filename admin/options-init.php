<?php

    /**
     * For full documentation, please visit: http://docs.reduxframework.com/
     * For a more extensive sample-config file, you may look at:
     * https://github.com/reduxframework/redux-framework/blob/master/sample/sample-config.php
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "mhmovies_lite";

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        'opt_name' => 'mhmovies_lite',
        'display_name' => 'MHMovies Lite',
        'display_version' => '2.0',
        'page_slug' => 'mhmovieslite',
        'page_title' => 'MHMovies Lite',
        'update_notice' => TRUE,
        'intro_text' => 'Bienvenido a MHMovies Lite, plantilla gratuita para sitios de películas online desarrollados en Wordpress.',
        'footer_text' => 'Gracias por utilizar MHMovies Lite. Desarrollado por <a href="http://www.marceloherrera.com.ar">Marcelo Herrera</a>',
        'menu_type' => 'menu',
        'menu_title' => 'MHMovies Lite',
        'allow_sub_menu' => TRUE,
        'page_parent_post_type' => 'your_post_type',
        'customizer' => TRUE,
        'default_mark' => '*',
        'hints' => array(
            'icon' => 'el el-adjust-alt',
            'icon_position' => 'right',
            'icon_color' => '#81d742',
            'icon_size' => 'large',
            'tip_style' => array(
                'color' => 'light',
                'style' => 'bootstrap',
            ),
            'tip_position' => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect' => array(
                'show' => array(
                    'duration' => '500',
                    'event' => 'mouseover',
                ),
                'hide' => array(
                    'duration' => '500',
                    'event' => 'mouseleave unfocus',
                ),
            ),
        ),
        'output' => TRUE,
        'output_tag' => TRUE,
        'settings_api' => TRUE,
        'cdn_check_time' => '1440',
        'compiler' => TRUE,
        'page_permissions' => 'manage_options',
        'save_defaults' => TRUE,
        'show_import_export' => TRUE,
        'database' => 'options',
        'transient_time' => '3600',
        'network_sites' => TRUE,
        'dev_mode' => FALSE,
    );

    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
    $args['share_icons'][] = array(
        'url'   => 'https://github.com/mherrera1987/MHMovies-Lite',
        'title' => 'Proyecto en GitHub',
        'icon'  => 'el el-github'
        //'img'   => '', // You can use icon OR img. IMG needs to be a full URL.
    );
    $args['share_icons'][] = array(
        'url'   => 'https://www.facebook.com/marcelofherrera87',
        'title' => 'Sígueme en Facebook',
        'icon'  => 'el el-facebook'
    );
    $args['share_icons'][] = array(
        'url'   => 'https://twitter.com/mherrera1987',
        'title' => 'Sígueme en Twitter',
        'icon'  => 'el el-twitter'
    );
    $args['share_icons'][] = array(
        'url'   => 'https://www.linkedin.com/in/marceloherrera87',
        'title' => 'Contáctame en LinkedIn',
        'icon'  => 'el el-linkedin'
    );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */

    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'mhmovieslite-help-tab-1',
            'title'   => __( 'Recomendaciones', 'admin_folder' ),
            'content' => __('<ul>
                                <li>Lee la descripción adjunta a cada campo para entender de que se trata.</li>
                            </ul>', 'admin_folder' )
        ),
        array(
            'id'      => 'mhmovieslite-help-tab-2',
            'title'   => __( 'Contacto', 'admin_folder' ),
            'content' => __( '<h3>Utiliza los siguientes medios de contacto</h3>', 'admin_folder' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = __( '<h3>Valora este trabajo</h3>
        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
            <input type="hidden" name="cmd" value="_s-xclick">
            <input type="hidden" name="hosted_button_id" value="AWYLHGBE9TE78">
            <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
            <img alt="" border="0" src="https://www.paypalobjects.com/es_XC/i/scr/pixel.gif" width="1" height="1">
        </form>', 'admin_folder' );
    Redux::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */
    Redux::setSection( $opt_name, array(
        'title' => __( 'MHMovies Lite', 'mhmovieslite-opciones' ),
        'id'    => 'basic',
        'desc'  => __( 'Configuración del theme.', 'mhmovieslite-opciones' ),
        'icon'  => 'el el-dashboard'
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'General', 'mhmovieslite-opciones' ),
        'desc'       => __( 'Configuración general del tema. ', 'mhmovieslite-opciones' ),
        'id'         => 'opt-general-subsection',
        'icon'  => 'el el-home',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'logo',
                'type'     => 'media', 
                'url'      => true,
                'width'    => '300',
                'height'   => '80',
                'title'    => __('Logo', 'mhmovieslite-opciones'),
                'desc'     => __('Busca el logo de tu sitio..', 'mhmovieslite-opciones'),
                'subtitle' => __('Sube el logo del sitio web', 'mhmovieslite-opciones'),
            ),
            array(
                'id'       => 'header-code',
                'type'     => 'textarea',
                'title'    => __( 'Header code', 'mhmovieslite-opciones' ),
                'subtitle' => __( 'Pega código que quieres utilizar en el head.', 'mhmovieslite-opciones' ),
                'desc'     => __( 'Utilizalo para verificar Google Search Console, Bing Webmaster, Alexa, etc.', 'mhmovieslite-opciones' ),
                'default'  => '',
            ),
            array(
                'id'       => 'footer-code',
                'type'     => 'textarea',
                'title'    => __( 'Footer code', 'mhmovieslite-opciones' ),
                'subtitle' => __( 'Pega código que quieras utilizar en el footer.', 'mhmovieslite-opciones' ),
                'desc'     => __( 'Utilizalo para Google Analitycs, Histats, STATCOUNTER, etc.', 'mhmovieslite-opciones' ),
                'default'  => '',
            ),
            array(
                'id'       => 'copy-text',
                'type'     => 'textarea',
                'title'    => __( 'Texto Copyright', 'mhmovieslite-opciones' ),
                'subtitle' => __( 'Introduce el texto deseado para el copyright.', 'mhmovieslite-opciones' ),
                'desc'     => __( 'El texto aparecerá en el footer del sitio web.', 'mhmovieslite-opciones' ),
                'default'  => '',
            ),
        ),
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Social', 'mhmovieslite-opciones' ),
        'desc'       => __( 'Configura las redes sociales de tu sitio web.', 'mhmovieslite-opciones' ),
        'id'         => 'opt-social-subsection',
        'icon'       => 'el el-group',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'facebook-url',
                'type'     => 'text',
                'title'    => __( 'Facebook', 'mhmovieslite-opciones' ),
                'subtitle' => __( 'URL Página de Facebook', 'mhmovieslite-opciones' ),
                'desc'     => __( 'Introduce la URL de la página de Facebook', 'mhmovieslite-opciones' ),
                'default'  => 'Ej: https://www.facebook.com/WordPress/',
            ),
            array(
                'id'       => 'twitter-username',
                'type'     => 'text',
                'title'    => __( 'Twitter', 'mhmovieslite-opciones' ),
                'subtitle' => __( 'Usuario de Twitter', 'mhmovieslite-opciones' ),
                'desc'     => __( 'Introduce el nombre de usuario en Twitter (no utilizar @)', 'mhmovieslite-opciones' ),
                'default'  => 'Ej: mherrera1987',
            ),
            array(
                'id'       => 'google-plus-url',
                'type'     => 'text',
                'title'    => __( 'Google+', 'mhmovieslite-opciones' ),
                'subtitle' => __( 'URL Página de Google+', 'mhmovieslite-opciones' ),
                'desc'     => __( 'Introduce la URL de la página de Google+', 'mhmovieslite-opciones' ),
                'default'  => 'Ej: https://plus.google.com/u/0/+WordPress/',
            ),
        ),
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => __( 'Estilo', 'mhmovieslite-opciones' ),
        'desc'       => __( 'Configura el aspecto visual de tu sitio web.', 'mhmovieslite-opciones' ),
        'id'         => 'opt-estilo-subsection',
        'icon'       => 'el el-pencil',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'color-fondo',
                'type'     => 'color',
                'title'    => __('Color de fondo', 'mhmovieslite-opciones'), 
                'subtitle' => __('Elige el color de fondo de tu sitio web (default: #222222).', 'mhmovieslite-opciones'),
                'default'  => '#222222',
                'transparent'  => false,
                'validate' => 'color',
            ),
            array(
                'id'       => 'color-principal',
                'type'     => 'color',
                'title'    => __('Color principal', 'mhmovieslite-opciones'), 
                'subtitle' => __('Elige el color principal tu sitio web (default: #00bc8c).', 'mhmovieslite-opciones'),
                'default'  => '#00bc8c',
                'transparent'  => false,
                'validate' => 'color',
            ),
            array(
                'id'       => 'color-secundario',
                'type'     => 'color',
                'title'    => __('Color secundario', 'mhmovieslite-opciones'), 
                'subtitle' => __('Elige el color secundario tu sitio web (default: #375a7f).', 'mhmovieslite-opciones'),
                'default'  => '#375a7f',
                'transparent'  => false,
                'validate' => 'color',
            ),
            array(
                'id'       => 'custom-css',
                'type'     => 'textarea',
                'title'    => __( 'Custom CSS', 'mhmovieslite-opciones' ),
                'subtitle' => __( 'Código CSS personalizado', 'mhmovieslite-opciones' ),
                'desc'     => __( 'Coloca aquí el código css personalizado.', 'mhmovieslite-opciones' ),
                'default'  => '',
            ),
        ),
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => __( 'Películas', 'mhmovieslite-opciones' ),
        'desc'       => __( 'Elije que elementos se mostrarán en la pantalla películas.', 'mhmovieslite-opciones' ),
        'id'         => 'opt-peliculas-subsection',
        'icon'       => 'el el-video',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'peliculas-relacionadas',
                'type'     => 'switch', 
                'title'    => __('Películas Relacionadas', 'mhmovieslite-opciones'),
                'subtitle' => __('Activa esta opción si quieres que se muestre un widget de películas relacionadas.', 'mhmovieslite-opciones'),
                'default'  => true,
            ),
        ),
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => __( 'Publicidad', 'mhmovieslite-opciones' ),
        'desc'       => __( 'Inserta el código de los anuncios publicitarios.', 'mhmovieslite-opciones' ),
        'id'         => 'opt-publicidad-subsection',
        'icon'       => 'el el-graph',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'act-anuncio1',
                'type'     => 'checkbox',
                'title'    => __('Activar anuncio #1', 'mhmovieslite-opciones'), 
                'subtitle' => __('¿Desea activar el anuncio #1?', 'mhmovieslite-opciones'),
                'desc'     => __('', 'mhmovieslite-opciones'),
                'default'  => '0'// 1 = on | 0 = off
            ),
            array(
                'id'       => 'anuncio1',
                'type'     => 'textarea',
                'title'    => __( 'Anuncio #1', 'mhmovieslite-opciones' ),
                'subtitle' => __( 'Código de anuncio #1', 'mhmovieslite-opciones' ),
                'desc'     => __( 'Coloca aquí el código del anuncio #1', 'mhmovieslite-opciones' ),
                'default'  => '',
            ),
            array(
                'id'       => 'act-anuncio2',
                'type'     => 'checkbox',
                'title'    => __('Activar anuncio #2', 'mhmovieslite-opciones' ), 
                'subtitle' => __('¿Desea activar el anuncio #2?', 'mhmovieslite-opciones' ),
                'desc'     => __('', 'mhmovieslite-opciones' ),
                'default'  => '0'// 1 = on | 0 = off
            ),
            array(
                'id'       => 'anuncio2',
                'type'     => 'textarea',
                'title'    => __( 'Anuncio #2', 'mhmovieslite-opciones' ),
                'subtitle' => __( 'Código de anuncio #2', 'mhmovieslite-opciones' ),
                'desc'     => __( 'Coloca aquí el código del anuncio #2', 'mhmovieslite-opciones' ),
                'default'  => '',
            ),
        ),
    ) );
    /*
     * <--- END SECTIONS
     */
