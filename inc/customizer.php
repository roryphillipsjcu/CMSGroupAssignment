<?php
/**
 * BarrierReefOrchestra Theme Customizer.
 *
 * @package BarrierReefOrchestra
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function bro_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';


//  CUSTOM SECTIONS


    $wp_customize->add_section('footer', array(
       'title' => 'Footer',
        'priority' => 10000,
        'description' => 'Customize footer stuff in here'
    ));

//    CUSTOM SETTINGS
    
    $wp_customize->add_setting('header_color', array(
        'default' => '#000000',
        'type' => 'theme_mod',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
        
    ));
    
//add controlls (in customiser)
    
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'header_color', array(
                'label' => __('Header Background Color', 'BRO'),
                'section' => 'footer',
            )
        )   
        
    );
}
add_action( 'customize_register', 'bro_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function bro_customize_preview_js() {
	wp_enqueue_script( 'bro_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'bro_customize_preview_js' );

//Add controls

function bro_customizer_css(){
    $header_color = get_theme_mod('header_color');
    
    ?>
<style type= "text/css">
    .site-header{
        background-color: <?php echo $header_color; ?>   
    }

</style>

    <?php
    
}

add_action('wp_head', 'bro_customizer_css');