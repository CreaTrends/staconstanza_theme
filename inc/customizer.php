<?php
/**
 * santaconstanza Theme Customizer
 *
 * @package santaconstanza
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function staconstanza_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'staconstanza_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'staconstanza_customize_partial_blogdescription',
		) );
	}
	$wp_customize->add_panel( 'theme_option', array(
        'priority' => 200,
        'title' => __( 'Ultrabootstrap Options', 'ultrabootstrap' ),
        'description' => __( 'ultrabootstrap Options', 'ultrabootstrap' ),
      ));
}
add_action( 'customize_register', 'staconstanza_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function staconstanza_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function staconstanza_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function staconstanza_customize_preview_js() {
	wp_enqueue_script( 'staconstanza-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'staconstanza_customize_preview_js' );

// customizer widgets
function theme_slider_customizer($wp_customize){
/**********************************************/
      /************* MAIN SLIDER SECTION *************/
      /**********************************************/     

      $wp_customize->add_section('main_slider_category',array(
        'priority' => 50,
        'title' => __('Slider Categories','ultrabootstrap'),
        'description' => __('Select the Slide Category for Homepage.','ultrabootstrap'),
        'panel' => 'theme_option'
      ));

      $wp_customize->add_setting('slider_category_display',array(
        'sanitize_callback' => 'ultrabootstrap_sanitize_category',
        'default' => ''
      ));

      $wp_customize->add_control(new ultrabootstrap_Customize_Dropdown_Taxonomies_Control($wp_customize,'slider_category_display',array(
        'label' => __('Choose category','ultrabootstrap'),
        'section' => 'main_slider_category',
        'settings' => 'slider_category_display',
        'type'=> 'dropdown-taxonomies',
        )  
      ));

       // no of posts to show on slider
    $wp_customize->add_setting( 'slider_no_of_posts', array(
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'esc_attr',
    'default'           => '3'
    ) );

    $wp_customize->add_control( 'slider_no_of_posts', array(
    'settings' => 'slider_no_of_posts',
    'label'                 =>  __( 'No Of Posts To Show On Slider', 'ultrabootstrap' ),
    'section'               => 'main_slider_category',
      
    'type'                  => 'select',
    'choices'               => array(
         '1' => __( '1', 'ultrabootstrap' ),
         '2' => __( '2 ', 'ultrabootstrap' ),
         '3' => __( '3', 'ultrabootstrap' ),
         '4' => __( '4', 'ultrabootstrap' ),
         '5' => __( '5', 'ultrabootstrap' ),
         '6' => __( '6', 'ultrabootstrap' ),
         '7' => __( '7', 'ultrabootstrap' ),
         '8' => __( '8', 'ultrabootstrap' ),
         '9' => __( '9', 'ultrabootstrap' )
                        ),
    'priority'              => '220'
    ) );

}

add_action('customize_register', 'theme_slider_customizer');

// Welcome Section Widget 
function theme_welcome_section($wp_customize){
	/**********************************************/
      /*************** WELCOME SECTION ***************/
      /**********************************************/

      $wp_customize->add_section('welcome_text',array(
        'priority' => 60,
        'title' => __('Welcome Section','ultrabootstrap'),
        'description' => __('Write Some Words for Welcome Section in Homepage','ultrabootstrap'),
        'panel' => 'theme_option'
      ));

      $wp_customize->add_setting(
        'welcome_textbox1',
          array(
            'sanitize_callback' => 'ultrabootstrap_sanitize_text',
            'default' => 'WELCOME TO THE BOOTSTRAP THEME',
          )
      );

      $wp_customize->add_control(
        'welcome_textbox1',
          array(
          'label' => __('Welcome Heading','ultrabootstrap'),
          'section' => 'welcome_text',
          'settings' => 'welcome_textbox1',
          'type' => 'text',
         )
      );

      $wp_customize->add_setting(
        'welcome_textbox2',
          array(
            'sanitize_callback' => 'ultrabootstrap_sanitize_text',
            'default' => 'FREE RESPONSIVE, MULTIPURPOSE BUSINESS AND CORPORATE THEME PERFECT FOR ANY ONE',
          )
      );

      $wp_customize->add_control(
        'welcome_textbox2',
          array(
          'label' => __('Welcome Second Heading','ultrabootstrap'),
          'section' => 'welcome_text',
          'settings' => 'welcome_textbox2',
          'type' => 'text',
         )
      );


      $wp_customize->add_setting( 
        'textarea_setting' ,
          array(
            'sanitize_callback' => 'ultrabootstrap_sanitize_text',
            'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 
        )); 
   
      $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'textarea_setting', array( 
        'label' => __( 'Welcome Text Content', 'ultrabootstrap' ),
        'section' => 'welcome_text',
        'settings' => 'textarea_setting', 
        'type'     => 'textarea', 
        )));    


      $wp_customize->add_section('content' , array(
        'title' => __('Content','ultrabootstrap'),
      ));


      $wp_customize->add_setting(
        'welcome_button',
            array(
              'sanitize_callback' => 'esc_url_raw',
              'default' => '#',
          )
      );

      $wp_customize->add_control(
        'welcome_button',
         array(
          'label' => __('Welcome Button Link','ultrabootstrap'),
          'section' => 'welcome_text',
          'settings' => 'welcome_button',
          'type' => 'text',
         )
      );
      $wp_customize->add_section('default_thumbnail_section', array(
        'priority' => 75,
        "title" => 'Default Post Thumbnail',
        "description" => __('Set default post thumbnail', 'ultrabootstrap'),
        'panel' => 'theme_option'
    ));
    $wp_customize->add_setting('default_thumbnail', array(
        'default' => '',
        'type' => 'theme_mod',
        'sanitize_callback' => 'esc_url_raw',
        'capability' => 'edit_theme_options',
    ));
    $wp_customize->add_control(
        new WP_Customize_Image_Control($wp_customize, 'default_thumbnail', array(
    'label' => __('Default Post Thumbnail', 'ultrabootstrap'),
    'section' => 'welcome_text',
    'settings' => 'default_thumbnail',
    ))
    );   

}

add_action('customize_register', 'theme_welcome_section');


/*Customizer Code HERE*/
add_action('customize_register', 'theme_footer_customizer');
function theme_footer_customizer($wp_customize){
 //adding section in wordpress customizer   
$wp_customize->add_section('footer_settings_section',array(
        'priority' => 50,
        'title' => __('Footer Text','ultrabootstrap'),
        'description' => __('Select the Slide Category for Homepage.','ultrabootstrap'),
        'panel' => 'theme_option'
      ));

//adding setting for footer text area
$wp_customize->add_setting('text_setting', array(
 'default'        => 'Default Text For Footer Section',
 ));
$wp_customize->add_control('text_setting', array(
 'label'   => 'Footer Text Here',
  'section' => 'footer_settings_section',
 'type'    => 'textarea',
));
}



function ultrabootstrap_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

/**
 * Checkbox sanitization callback example.
 * 
 * Sanitization callback for 'checkbox' type controls. This callback sanitizes `$checked`
 * as a boolean value, either TRUE or FALSE.
 *
 * @param bool $checked Whether the checkbox is checked.
 * @return bool Whether the checkbox is checked.
 */
function ultrabootstrap_sanitize_checkbox( $checked ) {
  // Boolean check.
  return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

function ultrabootstrap_sanitize_textarea( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

function ultrabootstrap_sanitize_category($input){
  $output=intval($input);
  return $output;

}