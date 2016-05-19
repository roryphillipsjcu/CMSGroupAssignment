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

    $wp_customize->add_section('cta', array(
        'title' => 'Calls to Action',
        'priority' => 10,
        'description' => 'Modify the call to action information'
    ));

    $wp_customize->add_section('statichome', array(
        'title' => 'Home Page Content',
        'priority' => 1,
        'description' => 'Used for the home page'
    ));

//    CUSTOM SETTINGS

    // --- DEFAULT SETTINGS ---

    $wp_customize->add_setting('header_color', array(
        'default' => '#000000',
        'type' => 'theme_mod',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage'
        
    ));

    // --- CALL TO ACTION SETTINGS ---

    $wp_customize->add_setting('calltoaction_text', array(
        'default' => '',
        'type' => 'theme_mod',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('calltoaction_url', array(
        'default' => '',
        'type' => 'theme_mod',
        'transport' => 'postMessage'
    ));

    // --- STATIC PAGE SETTINGS ---

    $wp_customize->add_setting('homepage_masthead_image', array(
        'default' => '',
        'type' => 'theme_mod',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('homepage_calltoaction_title', array(
        'default' => 'Become a Member Now',
        'type' => 'theme_mod',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('homepage_calltoaction_url', array(
        'default' => '',
        'type' => 'theme_mod',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('homepage_aboutsection_title', array(
        'default' => '',
        'type' => 'theme_mod',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('homepage_aboutsection_description', array(
        'default' => '',
        'type' => 'theme_mod',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_setting('homepage_news_title', array(
        'default' => '',
        'type' => 'theme_mod',
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

    // --- CALL TO ACTION CONTROLS ---

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'calltoaction_text', array (
                'label' => __('Call To Action Text', 'BRO'),
                'section' => 'cta',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'calltoaction_url', array (
                'label' => __('Call To Action URL', 'BRO'),
                'section' => 'cta',
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'homepage_masthead_image', array(
                'label' => __('Masthead Background Image', 'BRO'),
                'section' => 'statichome'
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'homepage_calltoaction_title', array(
                'label' => __('Masthead Call to Action Title', 'BRO'),
                'section' => 'statichome'
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'homepage_calltoaction_url', array(
                'label' => __('Masthead Call to Action URL', 'BRO'),
                'section' => 'statichome'
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'homepage_aboutsection_title', array(
                'label' => __('About Section Title', 'BRO'),
                'section' => 'statichome'
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'homepage_aboutsection_description', array(
                'label' => __('About Section Description', 'BRO'),
                'section' => 'statichome',
                'type' => 'textarea'
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'homepage_news_title', array(
                'label' => __('News Section Title', 'BRO'),
                'section' => 'statichome'
            )
        )
    );

}
add_action( 'customize_register', 'bro_customize_register' );

/**1
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