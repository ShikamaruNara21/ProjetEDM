<?php
/**
 * VW Driving School Theme Customizer
 *
 * @package VW Driving School
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vw_driving_school_custom_controls() {

    load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'vw_driving_school_custom_controls' );

function vw_driving_school_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-picker.php' );

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage'; $wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'blogname', array( 
		'selector' => '.logo .site-title a', 
	 	'render_callback' => 'vw_driving_school_customize_partial_blogname', 
	)); 

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array( 
		'selector' => 'p.site-description', 
		'render_callback' => 'vw_driving_school_customize_partial_blogdescription', 
	));

	//add home page setting pannel
	$VWDrivingSchoolParentPanel = new VW_Driving_School_WP_Customize_Panel( $wp_customize, 'vw_driving_school_panel_id', array(
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => esc_html__( 'VW Settings', 'vw-driving-school' ),
		'priority' => 10,
	));

	$wp_customize->add_section( 'vw_driving_school_left_right', array(
    	'title'      => esc_html__( 'General Settings', 'vw-driving-school' ),
		'panel' => 'vw_driving_school_panel_id'
	) );

	$wp_customize->add_setting('vw_driving_school_width_option',array(
        'default' => 'Full Width',
        'sanitize_callback' => 'vw_driving_school_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Driving_School_Image_Radio_Control($wp_customize, 'vw_driving_school_width_option', array(
        'type' => 'select',
        'label' => __('Width Layouts','vw-driving-school'),
        'description' => __('Here you can change the width layout of Website.','vw-driving-school'),
        'section' => 'vw_driving_school_left_right',
        'choices' => array(
            'Full Width' => esc_url(get_template_directory_uri()).'/assets/images/full-width.png',
            'Wide Width' => esc_url(get_template_directory_uri()).'/assets/images/wide-width.png',
            'Boxed' => esc_url(get_template_directory_uri()).'/assets/images/boxed-width.png',
    ))));

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('vw_driving_school_theme_options',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'vw_driving_school_sanitize_choices'	        
	) );
	$wp_customize->add_control('vw_driving_school_theme_options', array(
        'type' => 'select',
        'label' => __('Post Sidebar Layout','vw-driving-school'),
        'description' => __('Here you can change the sidebar layout for posts. ','vw-driving-school'),
        'section' => 'vw_driving_school_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-driving-school'),
            'Right Sidebar' => __('Right Sidebar','vw-driving-school'),
            'One Column' => __('One Column','vw-driving-school'),
            'Three Columns' => __('Three Columns','vw-driving-school'),
            'Four Columns' => __('Four Columns','vw-driving-school'),
            'Grid Layout' => __('Grid Layout','vw-driving-school')
        ),
	));

	$wp_customize->add_setting('vw_driving_school_page_layout',array(
        'default' => 'One Column',
        'sanitize_callback' => 'vw_driving_school_sanitize_choices'
	));
	$wp_customize->add_control('vw_driving_school_page_layout',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','vw-driving-school'),
        'description' => __('Here you can change the sidebar layout for pages. ','vw-driving-school'),
        'section' => 'vw_driving_school_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-driving-school'),
            'Right Sidebar' => __('Right Sidebar','vw-driving-school'),
            'One Column' => __('One Column','vw-driving-school')
        ),
	) );

	//Pre-Loader
	$wp_customize->add_setting( 'vw_driving_school_loader_enable',array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_driving_school_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Driving_School_Toggle_Switch_Custom_Control( $wp_customize, 'vw_driving_school_loader_enable',array(
        'label' => esc_html__( 'Pre-Loader','vw-driving-school' ),
        'section' => 'vw_driving_school_left_right'
    )));

	$wp_customize->add_setting('vw_driving_school_preloader_bg_color', array(
		'default'           => '#c4b12d',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_driving_school_preloader_bg_color', array(
		'label'    => __('Pre-Loader Background Color', 'vw-driving-school'),
		'section'  => 'vw_driving_school_left_right',
	)));

	$wp_customize->add_setting('vw_driving_school_preloader_border_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_driving_school_preloader_border_color', array(
		'label'    => __('Pre-Loader Border Color', 'vw-driving-school'),
		'section'  => 'vw_driving_school_left_right',
	)));

	//Topbar
	$wp_customize->add_section( 'vw_driving_school_topbar', array(
    	'title'      => __( 'Topbar Settings', 'vw-driving-school' ),
		'priority'   => null,
		'panel' => 'vw_driving_school_panel_id'
	) );

	$wp_customize->add_setting( 'vw_driving_school_topbar_hide_show',
       array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_driving_school_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Driving_School_Toggle_Switch_Custom_Control( $wp_customize, 'vw_driving_school_topbar_hide_show', array(
      'label' => esc_html__( 'Show / Hide Topbar','vw-driving-school' ),
      'section' => 'vw_driving_school_topbar'
    )));

    $wp_customize->add_setting('vw_driving_school_topbar_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_driving_school_topbar_padding_top_bottom',array(
		'label'	=> __('Topbar Padding Top Bottom','vw-driving-school'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-driving-school'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-driving-school' ),
        ),
		'section'=> 'vw_driving_school_topbar',
		'type'=> 'text'
	));

    //Sticky Header
	$wp_customize->add_setting( 'vw_driving_school_sticky_header',array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_driving_school_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Driving_School_Toggle_Switch_Custom_Control( $wp_customize, 'vw_driving_school_sticky_header',array(
        'label' => esc_html__( 'Sticky Header','vw-driving-school' ),
        'section' => 'vw_driving_school_topbar'
    )));

    $wp_customize->add_setting('vw_driving_school_sticky_header_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_driving_school_sticky_header_padding',array(
		'label'	=> __('Sticky Header Padding','vw-driving-school'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-driving-school'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-driving-school' ),
        ),
		'section'=> 'vw_driving_school_topbar',
		'type'=> 'text'
	));

    $wp_customize->add_setting( 'vw_driving_school_search_hide_show', array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_driving_school_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Driving_School_Toggle_Switch_Custom_Control( $wp_customize, 'vw_driving_school_search_hide_show', array(
      'label' => esc_html__( 'Show / Hide Search','vw-driving-school' ),
      'section' => 'vw_driving_school_topbar'
    )));

    //Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_driving_school_discount_text', array( 
		'selector' => '#topbar span', 
		'render_callback' => 'vw_driving_school_customize_partial_vw_driving_school_discount_text', 
	));

    $wp_customize->add_setting('vw_driving_school_discount_icon',array(
		'default'	=> 'fas fa-road',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Driving_School_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_driving_school_discount_icon',array(
		'label'	=> __('Add Discount Icon','vw-driving-school'),
		'transport' => 'refresh',
		'section'	=> 'vw_driving_school_topbar',
		'setting'	=> 'vw_driving_school_discount_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_driving_school_discount_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_driving_school_discount_text',array(
		'label'	=> __('Add Discount Text','vw-driving-school'),
		'input_attrs' => array(
            'placeholder' => __( 'Lorem Ipsum is simply dummy text of the printing.', 'vw-driving-school' ),
        ),
		'section'=> 'vw_driving_school_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_driving_school_book_class_button_icon',array(
		'default'	=> 'fas fa-bookmark',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Driving_School_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_driving_school_book_class_button_icon',array(
		'label'	=> __('Add Button Icon','vw-driving-school'),
		'transport' => 'refresh',
		'section'	=> 'vw_driving_school_topbar',
		'setting'	=> 'vw_driving_school_book_class_button_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_driving_school_booking_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_driving_school_booking_text',array(
		'label'	=> __('Add Button Text','vw-driving-school'),
		'input_attrs' => array(
            'placeholder' => __( 'BOOK A CLASS', 'vw-driving-school' ),
        ),
		'section'=> 'vw_driving_school_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_driving_school_booking_link',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('vw_driving_school_booking_link',array(
		'label'	=> __('Add Button Link','vw-driving-school'),
		'input_attrs' => array(
            'placeholder' => __( 'http://www.example.com', 'vw-driving-school' ),
        ),
		'section'=> 'vw_driving_school_topbar',		
		'type'=> 'url'
	));
    
	//Slider
	$wp_customize->add_section( 'vw_driving_school_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'vw-driving-school' ),
		'priority'   => null,
		'panel' => 'vw_driving_school_panel_id'
	) );

	$wp_customize->add_setting( 'vw_driving_school_slider_hide_show',
       array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_driving_school_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Driving_School_Toggle_Switch_Custom_Control( $wp_customize, 'vw_driving_school_slider_hide_show', array(
      'label' => esc_html__( 'Show / Hide Slider','vw-driving-school' ),
      'section' => 'vw_driving_school_slidersettings'
    )));

     //Selective Refresh
    $wp_customize->selective_refresh->add_partial('vw_driving_school_slider_hide_show',array(
		'selector'        => '#slider .inner_carousel h1',
		'render_callback' => 'vw_driving_school_customize_partial_vw_driving_school_slider_hide_show',
	));

	for ( $count = 1; $count <= 4; $count++ ) {
		$wp_customize->add_setting( 'vw_driving_school_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'vw_driving_school_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'vw_driving_school_slider_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'vw-driving-school' ),
			'description' => __('Slider image size (1500 x 590)','vw-driving-school'),
			'section'  => 'vw_driving_school_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	$wp_customize->add_setting('vw_driving_school_slider_btn_icon',array(
		'default'	=> 'fas fa-bookmark',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Driving_School_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_driving_school_slider_btn_icon',array(
		'label'	=> __('Add Slider Button Icon','vw-driving-school'),
		'transport' => 'refresh',
		'section'	=> 'vw_driving_school_slidersettings',
		'setting'	=> 'vw_driving_school_slider_btn_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_driving_school_slider_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_driving_school_slider_button_text',array(
		'label'	=> __('Add Slider Button Text','vw-driving-school'),
		'input_attrs' => array(
            'placeholder' => __( 'READ MORE', 'vw-driving-school' ),
        ),
		'section'=> 'vw_driving_school_slidersettings',
		'type'=> 'text'
	));

	//content layout
	$wp_customize->add_setting('vw_driving_school_slider_content_option',array(
        'default' => 'Left',
        'sanitize_callback' => 'vw_driving_school_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Driving_School_Image_Radio_Control($wp_customize, 'vw_driving_school_slider_content_option', array(
        'type' => 'select',
        'label' => __('Slider Content Layouts','vw-driving-school'),
        'section' => 'vw_driving_school_slidersettings',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/slider-content1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/slider-content2.png',
            'Right' => esc_url(get_template_directory_uri()).'/assets/images/slider-content3.png',
    ))));

    //Slider excerpt
	$wp_customize->add_setting( 'vw_driving_school_slider_excerpt_number', array(
		'default'              => 30,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_driving_school_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_driving_school_slider_excerpt_number', array(
		'label'       => esc_html__( 'Slider Excerpt length','vw-driving-school' ),
		'section'     => 'vw_driving_school_slidersettings',
		'type'        => 'range',
		'settings'    => 'vw_driving_school_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Opacity
	$wp_customize->add_setting('vw_driving_school_slider_opacity_color',array(
      'default'              => 0.5,
      'sanitize_callback' => 'vw_driving_school_sanitize_choices'
	));

	$wp_customize->add_control( 'vw_driving_school_slider_opacity_color', array(
	'label'       => esc_html__( 'Slider Image Opacity','vw-driving-school' ),
	'section'     => 'vw_driving_school_slidersettings',
	'type'        => 'select',
	'settings'    => 'vw_driving_school_slider_opacity_color',
	'choices' => array(
      '0' =>  esc_attr('0','vw-driving-school'),
      '0.1' =>  esc_attr('0.1','vw-driving-school'),
      '0.2' =>  esc_attr('0.2','vw-driving-school'),
      '0.3' =>  esc_attr('0.3','vw-driving-school'),
      '0.4' =>  esc_attr('0.4','vw-driving-school'),
      '0.5' =>  esc_attr('0.5','vw-driving-school'),
      '0.6' =>  esc_attr('0.6','vw-driving-school'),
      '0.7' =>  esc_attr('0.7','vw-driving-school'),
      '0.8' =>  esc_attr('0.8','vw-driving-school'),
      '0.9' =>  esc_attr('0.9','vw-driving-school')
	),
	));

	//Slider height
	$wp_customize->add_setting('vw_driving_school_slider_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_driving_school_slider_height',array(
		'label'	=> __('Slider Height','vw-driving-school'),
		'description'	=> __('Specify the slider height (px).','vw-driving-school'),
		'input_attrs' => array(
            'placeholder' => __( '500px', 'vw-driving-school' ),
        ),
		'section'=> 'vw_driving_school_slidersettings',
		'type'=> 'text'
	));	

	$wp_customize->add_setting( 'vw_driving_school_slider_speed', array(
		'default'  => 4000,
		'sanitize_callback'	=> 'vw_driving_school_sanitize_float'
	) );
	$wp_customize->add_control( 'vw_driving_school_slider_speed', array(
		'label' => esc_html__('Slider Transition Speed','vw-driving-school'),
		'section' => 'vw_driving_school_slidersettings',
		'type'  => 'number',
	) );

	//Contact Section
	$wp_customize->add_section( 'vw_driving_school_contact_section' , array(
    	'title'      => __( 'Contact us', 'vw-driving-school' ),
		'priority'   => null,
		'panel' => 'vw_driving_school_panel_id'
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_driving_school_phone', array( 
		'selector' => '.conatct-info span', 
		'render_callback' => 'vw_driving_school_customize_partial_vw_driving_school_phone',
	));

	$wp_customize->add_setting('vw_driving_school_phone_icon',array(
		'default'	=> 'fas fa-phone',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Driving_School_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_driving_school_phone_icon',array(
		'label'	=> __('Add Phone Icon','vw-driving-school'),
		'transport' => 'refresh',
		'section'	=> 'vw_driving_school_contact_section',
		'setting'	=> 'vw_driving_school_phone_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_driving_school_phone',array(
		'default'=> '',
		'sanitize_callback'	=> 'vw_driving_school_sanitize_phone_number'
	));	
	$wp_customize->add_control('vw_driving_school_phone',array(
		'label'	=> __('Add Phone no.','vw-driving-school'),
		'input_attrs' => array(
            'placeholder' => __( '+00 123 456 7890', 'vw-driving-school' ),
        ),
		'section'=> 'vw_driving_school_contact_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_driving_school_email_address_icon',array(
		'default'	=> 'fas fa-envelope-open',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Driving_School_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_driving_school_email_address_icon',array(
		'label'	=> __('Add Email Icon','vw-driving-school'),
		'transport' => 'refresh',
		'section'	=> 'vw_driving_school_contact_section',
		'setting'	=> 'vw_driving_school_email_address_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_driving_school_email_address',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_email'
	));	
	$wp_customize->add_control('vw_driving_school_email_address',array(
		'label'	=> __('Add Email Address','vw-driving-school'),
		'input_attrs' => array(
            'placeholder' => __( 'support@example.com', 'vw-driving-school' ),
        ),
		'section'=> 'vw_driving_school_contact_section',
		'type'=> 'text'
	));

	//About Section
	$wp_customize->add_section( 'vw_driving_school_about_section' , array(
    	'title'      => __( 'About us', 'vw-driving-school' ),
		'priority'   => null,
		'panel' => 'vw_driving_school_panel_id'
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_driving_school_about_page', array( 
		'selector' => '#about h2', 
		'render_callback' => 'vw_driving_school_customize_partial_vw_driving_school_about_page',
	));

	$wp_customize->add_setting('vw_driving_school_about_icon',array(
		'default'	=> 'fas fa-road',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Driving_School_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_driving_school_about_icon',array(
		'label'	=> __('Add About Icon','vw-driving-school'),
		'transport' => 'refresh',
		'section'	=> 'vw_driving_school_about_section',
		'setting'	=> 'vw_driving_school_about_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'vw_driving_school_about_page', array(
		'default'           => '',
		'sanitize_callback' => 'vw_driving_school_sanitize_dropdown_pages'
	) );
	$wp_customize->add_control( 'vw_driving_school_about_page', array(
		'label'    => __( 'About Page', 'vw-driving-school' ),
		'description' => __('Image size (1500 x 590)','vw-driving-school'),
		'section'  => 'vw_driving_school_about_section',
		'type'     => 'dropdown-pages'
	) );

	//About excerpt
	$wp_customize->add_setting( 'vw_driving_school_about_excerpt_number', array(
		'default'              => 30,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_driving_school_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_driving_school_about_excerpt_number', array(
		'label'       => esc_html__( 'About Excerpt length','vw-driving-school' ),
		'section'     => 'vw_driving_school_about_section',
		'type'        => 'range',
		'settings'    => 'vw_driving_school_about_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_driving_school_about_button_icon',array(
		'default'	=> 'fas fa-bookmark',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Driving_School_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_driving_school_about_button_icon',array(
		'label'	=> __('Add About Button Icon','vw-driving-school'),
		'transport' => 'refresh',
		'section'	=> 'vw_driving_school_about_section',
		'setting'	=> 'vw_driving_school_about_button_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_driving_school_about_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_driving_school_about_button_text',array(
		'label'	=> __('Add About Button Text','vw-driving-school'),
		'input_attrs' => array(
            'placeholder' => __( 'READ MORE', 'vw-driving-school' ),
        ),
		'section'=> 'vw_driving_school_about_section',
		'type'=> 'text'
	));

	//Blog Post
	$wp_customize->add_panel( $VWDrivingSchoolParentPanel );

	$BlogPostParentPanel = new VW_Driving_School_WP_Customize_Panel( $wp_customize, 'blog_post_parent_panel', array(
		'title' => __( 'Blog Post Settings', 'vw-driving-school' ),
		'panel' => 'vw_driving_school_panel_id',
	));

	$wp_customize->add_panel( $BlogPostParentPanel );

	// Add example section and controls to the middle (second) panel
	$wp_customize->add_section( 'vw_driving_school_post_settings', array(
		'title' => __( 'Post Settings', 'vw-driving-school' ),
		'panel' => 'blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_driving_school_toggle_postdate', array( 
		'selector' => '.post-main-box h2 a', 
		'render_callback' => 'vw_driving_school_customize_partial_vw_driving_school_toggle_postdate', 
	));

	$wp_customize->add_setting( 'vw_driving_school_toggle_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_driving_school_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Driving_School_Toggle_Switch_Custom_Control( $wp_customize, 'vw_driving_school_toggle_postdate',array(
        'label' => esc_html__( 'Post Date','vw-driving-school' ),
        'section' => 'vw_driving_school_post_settings'
    )));

    $wp_customize->add_setting( 'vw_driving_school_toggle_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_driving_school_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Driving_School_Toggle_Switch_Custom_Control( $wp_customize, 'vw_driving_school_toggle_author',array(
		'label' => esc_html__( 'Author','vw-driving-school' ),
		'section' => 'vw_driving_school_post_settings'
    )));

    $wp_customize->add_setting( 'vw_driving_school_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_driving_school_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Driving_School_Toggle_Switch_Custom_Control( $wp_customize, 'vw_driving_school_toggle_comments',array(
		'label' => esc_html__( 'Comments','vw-driving-school' ),
		'section' => 'vw_driving_school_post_settings'
    )));

    $wp_customize->add_setting( 'vw_driving_school_toggle_time',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_driving_school_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Driving_School_Toggle_Switch_Custom_Control( $wp_customize, 'vw_driving_school_toggle_time',array(
		'label' => esc_html__( 'Time','vw-driving-school' ),
		'section' => 'vw_driving_school_post_settings'
    )));

    $wp_customize->add_setting( 'vw_driving_school_featured_image_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_driving_school_switch_sanitization'
	));
    $wp_customize->add_control( new VW_Driving_School_Toggle_Switch_Custom_Control( $wp_customize, 'vw_driving_school_featured_image_hide_show', array(
		'label' => esc_html__( 'Featured Image','vw-driving-school' ),
		'section' => 'vw_driving_school_post_settings'
    )));

    $wp_customize->add_setting( 'vw_driving_school_excerpt_number', array(
		'default'              => 30,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_driving_school_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_driving_school_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','vw-driving-school' ),
		'section'     => 'vw_driving_school_post_settings',
		'type'        => 'range',
		'settings'    => 'vw_driving_school_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Blog layout
    $wp_customize->add_setting('vw_driving_school_blog_layout_option',array(
        'default' => 'Default',
        'sanitize_callback' => 'vw_driving_school_sanitize_choices'
    ));
    $wp_customize->add_control(new VW_Driving_School_Image_Radio_Control($wp_customize, 'vw_driving_school_blog_layout_option', array(
        'type' => 'select',
        'label' => __('Blog Layouts','vw-driving-school'),
        'section' => 'vw_driving_school_post_settings',
        'choices' => array(
            'Default' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout2.png',
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout3.png',
    ))));

    $wp_customize->add_setting('vw_driving_school_excerpt_settings',array(
        'default' => 'Excerpt',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_driving_school_sanitize_choices'
	));
	$wp_customize->add_control('vw_driving_school_excerpt_settings',array(
        'type' => 'select',
        'label' => __('Post Content','vw-driving-school'),
        'section' => 'vw_driving_school_post_settings',
        'choices' => array(
        	'Content' => __('Content','vw-driving-school'),
            'Excerpt' => __('Excerpt','vw-driving-school'),
            'No Content' => __('No Content','vw-driving-school')
        ),
	) );

	$wp_customize->add_setting('vw_driving_school_excerpt_suffix',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_driving_school_excerpt_suffix',array(
		'label'	=> __('Add Excerpt Suffix','vw-driving-school'),
		'input_attrs' => array(
            'placeholder' => __( '[...]', 'vw-driving-school' ),
        ),
		'section'=> 'vw_driving_school_post_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_driving_school_blog_pagination_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_driving_school_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Driving_School_Toggle_Switch_Custom_Control( $wp_customize, 'vw_driving_school_blog_pagination_hide_show',array(
      'label' => esc_html__( 'Show / Hide Blog Pagination','vw-driving-school' ),
      'section' => 'vw_driving_school_post_settings'
    )));

	$wp_customize->add_setting( 'vw_driving_school_blog_pagination_type', array(
        'default'			=> 'blog-page-numbers',
        'sanitize_callback'	=> 'vw_driving_school_sanitize_choices'
    ));
    $wp_customize->add_control( 'vw_driving_school_blog_pagination_type', array(
        'section' => 'vw_driving_school_post_settings',
        'type' => 'select',
        'label' => __( 'Blog Pagination', 'vw-driving-school' ),
        'choices'		=> array(
            'blog-page-numbers'  => __( 'Numeric', 'vw-driving-school' ),
            'next-prev' => __( 'Older Posts/Newer Posts', 'vw-driving-school' ),
    )));

    // Button Settings
	$wp_customize->add_section( 'vw_driving_school_button_settings', array(
		'title' => __( 'Button Settings', 'vw-driving-school' ),
		'panel' => 'blog_post_parent_panel',
	));

    $wp_customize->add_setting('vw_driving_school_blog_buton_icon',array(
		'default'	=> 'fas fa-bookmark',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Driving_School_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_driving_school_blog_buton_icon',array(
		'label'	=> __('Add Blog Button Icon','vw-driving-school'),
		'transport' => 'refresh',
		'section'	=> 'vw_driving_school_button_settings',
		'setting'	=> 'vw_driving_school_blog_buton_icon',
		'type'		=> 'icon'
	)));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_driving_school_button_text', array( 
		'selector' => '.post-main-box .more-btn a', 
		'render_callback' => 'vw_driving_school_customize_partial_vw_driving_school_button_text', 
	));

    $wp_customize->add_setting('vw_driving_school_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_driving_school_button_text',array(
		'label'	=> __('Add Button Text','vw-driving-school'),
		'input_attrs' => array(
            'placeholder' => __( 'READ MORE', 'vw-driving-school' ),
        ),
		'section'=> 'vw_driving_school_button_settings',
		'type'=> 'text'
	));

	// Related Post Settings
	$wp_customize->add_section( 'vw_driving_school_related_posts_settings', array(
		'title' => __( 'Related Posts Settings', 'vw-driving-school' ),
		'panel' => 'blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_driving_school_related_post_title', array( 
		'selector' => '.related-post h3', 
		'render_callback' => 'vw_driving_school_customize_partial_vw_driving_school_related_post_title', 
	));

    $wp_customize->add_setting( 'vw_driving_school_related_post',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_driving_school_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Driving_School_Toggle_Switch_Custom_Control( $wp_customize, 'vw_driving_school_related_post',array(
		'label' => esc_html__( 'Related Post','vw-driving-school' ),
		'section' => 'vw_driving_school_related_posts_settings'
    )));

    $wp_customize->add_setting('vw_driving_school_related_post_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_driving_school_related_post_title',array(
		'label'	=> __('Add Related Post Title','vw-driving-school'),
		'input_attrs' => array(
            'placeholder' => __( 'Related Post', 'vw-driving-school' ),
        ),
		'section'=> 'vw_driving_school_related_posts_settings',
		'type'=> 'text'
	));

   	$wp_customize->add_setting('vw_driving_school_related_posts_count',array(
		'default'=> '3',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_driving_school_related_posts_count',array(
		'label'	=> __('Add Related Post Count','vw-driving-school'),
		'input_attrs' => array(
            'placeholder' => __( '3', 'vw-driving-school' ),
        ),
		'section'=> 'vw_driving_school_related_posts_settings',
		'type'=> 'number'
	));

	// Single Posts Settings
	$wp_customize->add_section( 'vw_driving_school_single_blog_settings', array(
		'title' => __( 'Single Post Settings', 'vw-driving-school' ),
		'panel' => 'blog_post_parent_panel',
	));

	$wp_customize->add_setting( 'vw_driving_school_toggle_tags',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_driving_school_switch_sanitization'
	));
    $wp_customize->add_control( new VW_Driving_School_Toggle_Switch_Custom_Control( $wp_customize, 'vw_driving_school_toggle_tags', array(
		'label' => esc_html__( 'Tags','vw-driving-school' ),
		'section' => 'vw_driving_school_single_blog_settings'
    )));

	$wp_customize->add_setting( 'vw_driving_school_single_blog_post_navigation_show_hide',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_driving_school_switch_sanitization'
	));
    $wp_customize->add_control( new VW_Driving_School_Toggle_Switch_Custom_Control( $wp_customize, 'vw_driving_school_single_blog_post_navigation_show_hide', array(
		'label' => esc_html__( 'Post Navigation','vw-driving-school' ),
		'section' => 'vw_driving_school_single_blog_settings'
    )));

	//navigation text
	$wp_customize->add_setting('vw_driving_school_single_blog_prev_navigation_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_driving_school_single_blog_prev_navigation_text',array(
		'label'	=> __('Post Navigation Text','vw-driving-school'),
		'input_attrs' => array(
            'placeholder' => __( 'PREVIOUS', 'vw-driving-school' ),
        ),
		'section'=> 'vw_driving_school_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_driving_school_single_blog_next_navigation_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_driving_school_single_blog_next_navigation_text',array(
		'label'	=> __('Post Navigation Text','vw-driving-school'),
		'input_attrs' => array(
            'placeholder' => __( 'NEXT', 'vw-driving-school' ),
        ),
		'section'=> 'vw_driving_school_single_blog_settings',
		'type'=> 'text'
	));

    //404 Page Setting
	$wp_customize->add_section('vw_driving_school_404_page',array(
		'title'	=> __('404 Page Settings','vw-driving-school'),
		'panel' => 'vw_driving_school_panel_id',
	));	

	$wp_customize->add_setting('vw_driving_school_404_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_driving_school_404_page_title',array(
		'label'	=> __('Add Title','vw-driving-school'),
		'input_attrs' => array(
            'placeholder' => __( '404 Not Found', 'vw-driving-school' ),
        ),
		'section'=> 'vw_driving_school_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_driving_school_404_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_driving_school_404_page_content',array(
		'label'	=> __('Add Text','vw-driving-school'),
		'input_attrs' => array(
            'placeholder' => __( 'Looks like you have taken a wrong turn, Dont worry, it happens to the best of us.', 'vw-driving-school' ),
        ),
		'section'=> 'vw_driving_school_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_driving_school_404_page_button_icon',array(
		'default'	=> 'fas fa-bookmark',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Driving_School_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_driving_school_404_page_button_icon',array(
		'label'	=> __('Add Button Icon','vw-driving-school'),
		'transport' => 'refresh',
		'section'	=> 'vw_driving_school_404_page',
		'setting'	=> 'vw_driving_school_404_page_button_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_driving_school_404_page_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_driving_school_404_page_button_text',array(
		'label'	=> __('Add Button Text','vw-driving-school'),
		'input_attrs' => array(
            'placeholder' => __( 'RETURN TO THE HOME PAGE', 'vw-driving-school' ),
        ),
		'section'=> 'vw_driving_school_404_page',
		'type'=> 'text'
	));

	//Social Icon Setting
	$wp_customize->add_section('vw_driving_school_social_icon_settings',array(
		'title'	=> __('Social Icons Settings','vw-driving-school'),
		'panel' => 'vw_driving_school_panel_id',
	));	

	$wp_customize->add_setting('vw_driving_school_social_icon_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_driving_school_social_icon_font_size',array(
		'label'	=> __('Icon Font Size','vw-driving-school'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-driving-school'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-driving-school' ),
        ),
		'section'=> 'vw_driving_school_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_driving_school_social_icon_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_driving_school_social_icon_padding',array(
		'label'	=> __('Icon Padding','vw-driving-school'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-driving-school'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-driving-school' ),
        ),
		'section'=> 'vw_driving_school_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_driving_school_social_icon_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_driving_school_social_icon_width',array(
		'label'	=> __('Icon Width','vw-driving-school'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-driving-school'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-driving-school' ),
        ),
		'section'=> 'vw_driving_school_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_driving_school_social_icon_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_driving_school_social_icon_height',array(
		'label'	=> __('Icon Height','vw-driving-school'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-driving-school'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-driving-school' ),
        ),
		'section'=> 'vw_driving_school_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_driving_school_social_icon_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_driving_school_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_driving_school_social_icon_border_radius', array(
		'label'       => esc_html__( 'Icon Border Radius','vw-driving-school' ),
		'section'     => 'vw_driving_school_social_icon_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Responsive Media Settings
	$wp_customize->add_section('vw_driving_school_responsive_media',array(
		'title'	=> __('Responsive Media','vw-driving-school'),
		'panel' => 'vw_driving_school_panel_id',
	));

	$wp_customize->add_setting( 'vw_driving_school_resp_topbar_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_driving_school_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Driving_School_Toggle_Switch_Custom_Control( $wp_customize, 'vw_driving_school_resp_topbar_hide_show',array(
      'label' => esc_html__( 'Show / Hide Topbar','vw-driving-school' ),
      'section' => 'vw_driving_school_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_driving_school_stickyheader_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_driving_school_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Driving_School_Toggle_Switch_Custom_Control( $wp_customize, 'vw_driving_school_stickyheader_hide_show',array(
      'label' => esc_html__( 'Sticky Header','vw-driving-school' ),
      'section' => 'vw_driving_school_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_driving_school_resp_slider_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_driving_school_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Driving_School_Toggle_Switch_Custom_Control( $wp_customize, 'vw_driving_school_resp_slider_hide_show',array(
      'label' => esc_html__( 'Show / Hide Slider','vw-driving-school' ),
      'section' => 'vw_driving_school_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_driving_school_sidebar_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_driving_school_switch_sanitization'
));  
    $wp_customize->add_control( new VW_Driving_School_Toggle_Switch_Custom_Control( $wp_customize, 'vw_driving_school_sidebar_hide_show',array(
      'label' => esc_html__( 'Show / Hide Sidebar','vw-driving-school' ),
      'section' => 'vw_driving_school_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_driving_school_resp_scroll_top_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_driving_school_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Driving_School_Toggle_Switch_Custom_Control( $wp_customize, 'vw_driving_school_resp_scroll_top_hide_show',array(
      'label' => esc_html__( 'Show / Hide Scroll To Top','vw-driving-school' ),
      'section' => 'vw_driving_school_responsive_media'
    )));

    $wp_customize->add_setting('vw_driving_school_res_open_menus_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Driving_School_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_driving_school_res_open_menus_icon',array(
		'label'	=> __('Add Open Menu Icon','vw-driving-school'),
		'transport' => 'refresh',
		'section'	=> 'vw_driving_school_responsive_media',
		'setting'	=> 'vw_driving_school_res_open_menus_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_driving_school_res_close_menus_icon',array(
		'default'	=> 'fas fa-times',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Driving_School_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_driving_school_res_close_menus_icon',array(
		'label'	=> __('Add Close Menu Icon','vw-driving-school'),
		'transport' => 'refresh',
		'section'	=> 'vw_driving_school_responsive_media',
		'setting'	=> 'vw_driving_school_res_close_menus_icon',
		'type'		=> 'icon'
	)));

	//Footer Text
	$wp_customize->add_section('vw_driving_school_footer',array(
		'title'	=> __('Footer','vw-driving-school'),
		'description'=> __('This section will appear in the footer','vw-driving-school'),
		'panel' => 'vw_driving_school_panel_id',
	));	

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_driving_school_footer_text', array( 
		'selector' => '.copyright p', 
		'render_callback' => 'vw_driving_school_customize_partial_vw_driving_school_footer_text', 
	));
	
	$wp_customize->add_setting('vw_driving_school_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_driving_school_footer_text',array(
		'label'	=> __('Copyright Text','vw-driving-school'),
		'input_attrs' => array(
            'placeholder' => __( 'Copyright 2018......', 'vw-driving-school' ),
        ),
		'section'=> 'vw_driving_school_footer',
		'setting'=> 'vw_driving_school_footer_text',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_driving_school_copyright_alingment',array(
        'default' => 'center',
        'sanitize_callback' => 'vw_driving_school_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Driving_School_Image_Radio_Control($wp_customize, 'vw_driving_school_copyright_alingment', array(
        'type' => 'select',
        'label' => __('Copyright Alignment','vw-driving-school'),
        'section' => 'vw_driving_school_footer',
        'settings' => 'vw_driving_school_copyright_alingment',
        'choices' => array(
            'left' => esc_url(get_template_directory_uri()).'/assets/images/copyright1.png',
            'center' => esc_url(get_template_directory_uri()).'/assets/images/copyright2.png',
            'right' => esc_url(get_template_directory_uri()).'/assets/images/copyright3.png'
    ))));

    $wp_customize->add_setting('vw_driving_school_copyright_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_driving_school_copyright_padding_top_bottom',array(
		'label'	=> __('Copyright Padding Top Bottom','vw-driving-school'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-driving-school'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-driving-school' ),
        ),
		'section'=> 'vw_driving_school_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_driving_school_hide_show_scroll',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'vw_driving_school_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Driving_School_Toggle_Switch_Custom_Control( $wp_customize, 'vw_driving_school_hide_show_scroll',array(
      	'label' => esc_html__( 'Show / Hide Scroll To Top','vw-driving-school' ),
      	'section' => 'vw_driving_school_footer'
    )));

    //Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_driving_school_scroll_to_top_icon', array( 
		'selector' => '.scrollup i', 
		'render_callback' => 'vw_driving_school_customize_partial_vw_driving_school_scroll_to_top_icon', 
	));

    $wp_customize->add_setting('vw_driving_school_scroll_to_top_icon',array(
		'default'	=> 'fas fa-long-arrow-alt-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Driving_School_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_driving_school_scroll_to_top_icon',array(
		'label'	=> __('Add Scroll to Top Icon','vw-driving-school'),
		'transport' => 'refresh',
		'section'	=> 'vw_driving_school_footer',
		'setting'	=> 'vw_driving_school_scroll_to_top_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_driving_school_scroll_to_top_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_driving_school_scroll_to_top_font_size',array(
		'label'	=> __('Icon Font Size','vw-driving-school'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-driving-school'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-driving-school' ),
        ),
		'section'=> 'vw_driving_school_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_driving_school_scroll_to_top_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_driving_school_scroll_to_top_padding',array(
		'label'	=> __('Icon Top Bottom Padding','vw-driving-school'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-driving-school'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-driving-school' ),
        ),
		'section'=> 'vw_driving_school_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_driving_school_scroll_to_top_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_driving_school_scroll_to_top_width',array(
		'label'	=> __('Icon Width','vw-driving-school'),
		'description'	=> __('Enter a value in pixels Example:20px','vw-driving-school'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-driving-school' ),
        ),
		'section'=> 'vw_driving_school_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_driving_school_scroll_to_top_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_driving_school_scroll_to_top_height',array(
		'label'	=> __('Icon Height','vw-driving-school'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-driving-school'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-driving-school' ),
        ),
		'section'=> 'vw_driving_school_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_driving_school_scroll_to_top_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_driving_school_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_driving_school_scroll_to_top_border_radius', array(
		'label'       => esc_html__( 'Icon Border Radius','vw-driving-school' ),
		'section'     => 'vw_driving_school_footer',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_driving_school_scroll_top_alignment',array(
        'default' => 'Right',
        'sanitize_callback' => 'vw_driving_school_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Driving_School_Image_Radio_Control($wp_customize, 'vw_driving_school_scroll_top_alignment', array(
        'type' => 'select',
        'label' => __('Scroll To Top','vw-driving-school'),
        'section' => 'vw_driving_school_footer',
        'settings' => 'vw_driving_school_scroll_top_alignment',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/layout2.png',
            'Right' => esc_url(get_template_directory_uri()).'/assets/images/layout3.png'
    ))));

    //Woocommerce settings
	$wp_customize->add_section('vw_driving_school_woocommerce_section', array(
		'title'    => __('WooCommerce Layout', 'vw-driving-school'),
		'priority' => null,
		'panel'    => 'woocommerce',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_driving_school_woocommerce_shop_page_sidebar', array( 'selector' => '.post-type-archive-product #sidebar', 
		'render_callback' => 'vw_driving_school_customize_partial_vw_driving_school_woocommerce_shop_page_sidebar', ) );

    //Woocommerce Shop Page Sidebar
	$wp_customize->add_setting( 'vw_driving_school_woocommerce_shop_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_driving_school_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Driving_School_Toggle_Switch_Custom_Control( $wp_customize, 'vw_driving_school_woocommerce_shop_page_sidebar',array(
		'label' => esc_html__( 'Shop Page Sidebar','vw-driving-school' ),
		'section' => 'vw_driving_school_woocommerce_section'
    )));

    //Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_driving_school_woocommerce_single_product_page_sidebar', array( 'selector' => '.single-product #sidebar', 
		'render_callback' => 'vw_driving_school_customize_partial_vw_driving_school_woocommerce_single_product_page_sidebar', ) );

    //Woocommerce Single Product page Sidebar
	$wp_customize->add_setting( 'vw_driving_school_woocommerce_single_product_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_driving_school_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Driving_School_Toggle_Switch_Custom_Control( $wp_customize, 'vw_driving_school_woocommerce_single_product_page_sidebar',array(
		'label' => esc_html__( 'Single Product Sidebar','vw-driving-school' ),
		'section' => 'vw_driving_school_woocommerce_section'
    )));	

     //Products per page
    $wp_customize->add_setting('vw_driving_school_products_per_page',array(
		'default'=> '9',
		'sanitize_callback'	=> 'vw_driving_school_sanitize_float'
	));
	$wp_customize->add_control('vw_driving_school_products_per_page',array(
		'label'	=> __('Products Per Page','vw-driving-school'),
		'description' => __('Display on shop page','vw-driving-school'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'vw_driving_school_woocommerce_section',
		'type'=> 'number',
	));

    //Products per row
    $wp_customize->add_setting('vw_driving_school_products_per_row',array(
		'default'=> '3',
		'sanitize_callback'	=> 'vw_driving_school_sanitize_choices'
	));
	$wp_customize->add_control('vw_driving_school_products_per_row',array(
		'label'	=> __('Products Per Row','vw-driving-school'),
		'description' => __('Display on shop page','vw-driving-school'),
		'choices' => array(
            '2' => '2',
			'3' => '3',
			'4' => '4',
        ),
		'section'=> 'vw_driving_school_woocommerce_section',
		'type'=> 'select',
	));

	//Products padding
	$wp_customize->add_setting('vw_driving_school_products_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_driving_school_products_padding_top_bottom',array(
		'label'	=> __('Products Padding Top Bottom','vw-driving-school'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-driving-school'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-driving-school' ),
        ),
		'section'=> 'vw_driving_school_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_driving_school_products_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_driving_school_products_padding_left_right',array(
		'label'	=> __('Products Padding Left Right','vw-driving-school'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-driving-school'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-driving-school' ),
        ),
		'section'=> 'vw_driving_school_woocommerce_section',
		'type'=> 'text'
	));

	//Products box shadow
	$wp_customize->add_setting( 'vw_driving_school_products_box_shadow', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_driving_school_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_driving_school_products_box_shadow', array(
		'label'       => esc_html__( 'Products Box Shadow','vw-driving-school' ),
		'section'     => 'vw_driving_school_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Products border radius
    $wp_customize->add_setting( 'vw_driving_school_products_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_driving_school_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_driving_school_products_border_radius', array(
		'label'       => esc_html__( 'Products Border Radius','vw-driving-school' ),
		'section'     => 'vw_driving_school_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'vw_driving_school_woocommerce_sale_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_driving_school_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_driving_school_woocommerce_sale_border_radius', array(
		'label'       => esc_html__( 'Sale Border Radius','vw-driving-school' ),
		'section'     => 'vw_driving_school_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

    // Has to be at the top
	$wp_customize->register_panel_type( 'VW_Driving_School_WP_Customize_Panel' );
	$wp_customize->register_section_type( 'VW_Driving_School_WP_Customize_Section' );
}

add_action( 'customize_register', 'vw_driving_school_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

if ( class_exists( 'WP_Customize_Panel' ) ) {
	class VW_Driving_School_WP_Customize_Panel extends WP_Customize_Panel {
	    public $panel;
	    public $type = 'vw_driving_school_panel';
	    public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'type', 'panel', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;
	      return $array;
    	}
  	}
}

if ( class_exists( 'WP_Customize_Section' ) ) {
  	class VW_Driving_School_WP_Customize_Section extends WP_Customize_Section {
	    public $section;
	    public $type = 'vw_driving_school_section';
	    public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'panel', 'type', 'description_hidden', 'section', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;

	      if ( $this->panel ) {
	        $array['customizeAction'] = sprintf( 'Customizing &#9656; %s', esc_html( $this->manager->get_panel( $this->panel )->title ) );
	      } else {
	        $array['customizeAction'] = 'Customizing';
	      }
	      return $array;
    	}
 	}
}

// Enqueue our scripts and styles
function vw_driving_school_customize_controls_scripts() {
  wp_enqueue_script( 'customizer-controls', get_theme_file_uri( '/assets/js/customizer-controls.js' ), array(), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'vw_driving_school_customize_controls_scripts' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class VW_Driving_School_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'VW_Driving_School_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(new VW_Driving_School_Customize_Section_Pro($manager,'vw_driving_school_upgrade_pro_link',array(
			'priority'   => 1,
			'title'    => esc_html__( 'DRIVING SCHOOL PRO', 'vw-driving-school' ),
			'pro_text' => esc_html__( 'GO PRO', 'vw-driving-school' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/themes/driving-school-wordpress-theme/'),
		)));

		// Register sections.
		$manager->add_section(new VW_Driving_School_Customize_Section_Pro($manager,'vw_driving_school_get_started_link',array(
			'priority'   => 1,
			'title'    => esc_html__( 'DOCUMENTATION', 'vw-driving-school' ),
			'pro_text' => esc_html__( 'DOCS', 'vw-driving-school' ),
			'pro_url'  => admin_url( 'themes.php?page=vw_driving_school_guide' )
		)));
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'vw-driving-school-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'vw-driving-school-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
VW_Driving_School_Customize::get_instance();