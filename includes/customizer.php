<?php

function constructzine_lite_customizer( $wp_customize ) {

	class constructzine_lite_Theme_Support extends WP_Customize_Control {

		public function render_content() {
		}
	}

	class constructzine_lite_Theme_Support_Subheader extends WP_Customize_Control {

		public function render_content() {
			echo __( 'Check out the','constructzine-lite' ) . ' <a href="https://themeisle.com/themes/constructzine-construction-wordpress-theme/">' . __( 'PRO version','constructzine-lite' ) . '</a>' . __( ' for full control over the header form!','constructzine-lite' );

		}
	}

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';

	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$wp_customize->get_setting( 'background_color' )->transport = 'postMessage';

	require_once( 'class/constructzine-lite-info.php' );

	$wp_customize->add_section(
		'constructzine_theme_info', array(
		'title' => __( 'View theme info', 'constructzine-lite' ),
		'priority' => 0,
		)
	);

	$wp_customize->add_setting(
		'constructzine_theme_info', array(
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'ti_constructzine_sanitize_text',
		)
	);

	$wp_customize->add_control(
		new Constructzine_Info(
			$wp_customize, 'constructzine_theme_info', array(
					'section' => 'constructzine_theme_info',
					'priority' => 10,
					)
		)
	);

	/* services */

	$wp_customize->add_section(
		'constructzine_services', array(

		'title'      => __( 'Services','constructzine-lite' ),
		'description' => __( "This feature is available in the pro version. <a href='https://themeisle.com/themes/constructzine-construction-wordpress-theme/' target='_blank'>Get it now!</a>",'constructzine-lite' ),
		'priority'   => 500,
		)
	);
	$wp_customize->add_setting(
		'constructzine_services',array( 'sanitize_callback' => 'constructzine_lite_sanitize_notes' )
	);

	$wp_customize->add_control(
		new constructzine_lite_Theme_Support(
			$wp_customize, 'constructzine_services',
			array(
					'section' => 'constructzine_services',
					)
		)
	);

	/**************************************/
	/******* custom colors - upsell ******/
	/*************************************/

	$wp_customize->add_section(
		'constructzine_custom_colors', array(

		'title'      => __( 'Custom colors','constructzine-lite' ),
		'description' => __( "Change colors for the entire theme. This feature is available in the pro version. <a href='https://themeisle.com/themes/constructzine-construction-wordpress-theme/' target='_blank'>Get it now!</a>",'constructzine-lite' ),
		'priority'   => 501,
		)
	);
	$wp_customize->add_setting(
		'constructzine_custom_colors',array( 'sanitize_callback' => 'constructzine_lite_sanitize_notes' )
	);

	$wp_customize->add_control(
		new constructzine_lite_Theme_Support(
			$wp_customize, 'constructzine_custom_colors',
			array(
					'section' => 'constructzine_custom_colors',
					)
		)
	);

	/********************************************************/
	/*******	Right side image in header - upsell *********/
	/********************************************************/

	$wp_customize->add_section(
		'constructzine_headerimage_custom', array(

		'title'      => __( 'Right side image in header','constructzine-lite' ),
		'description' => __( "This feature is available in the pro version. <a href='https://themeisle.com/themes/constructzine-construction-wordpress-theme/' target='_blank'>Get it now!</a>",'constructzine-lite' ),
		'priority'   => 502,
		)
	);
	$wp_customize->add_setting(
		'constructzine_headerimage_custom',array( 'sanitize_callback' => 'constructzine_lite_sanitize_notes' )
	);

	$wp_customize->add_control(
		new constructzine_lite_Theme_Support(
			$wp_customize, 'constructzine_headerimage_custom',
			array(
					'section' => 'constructzine_headerimage_custom',
					)
		)
	);

	/*

	** Header Customizer

	*/

	$wp_customize->add_section(
		'constructzine_header', array(

		'title'    => __( 'Header', 'constructzine-lite' ),
		'priority' => 200,

		)
	);

	/* Header - Logo */

	$wp_customize->add_setting(
		'ti_header_logo', array(
		'default' => get_stylesheet_directory_uri() . '/images/logo.png',
		'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize, 'ti_header_logo', array(

					'label'    => __( 'Logo:', 'constructzine-lite' ),
					'section'  => 'constructzine_header',
					'settings' => 'ti_header_logo',
					'priority' => '1',

					)
		)
	);

	/* Header - Contact Title */

	$wp_customize->add_setting(
		'ti_header_contact_title', array(
		'default' => __( 'Contact us now: ', 'constructzine-lite' ),
		'sanitize_callback' => 'constructzine_lite_sanitize_text',
		)
	);

	$wp_customize->add_control(
		'ti_header_contact_title', array(

		'label'    => __( 'Contact Title:', 'constructzine-lite' ),
		'section'  => 'constructzine_header',
		'settings' => 'ti_header_contact_title',
		'priority' => '2',

		)
	);

	/* Header - Contact Telephone */

	$wp_customize->add_setting(
		'ti_header_contact_telephone',array(
		'default' => '(+4) 0746.000.111',
		'sanitize_callback' => 'constructzine_lite_sanitize_text',
		)
	);

	$wp_customize->add_control(
		'ti_header_contact_telephone', array(

		'label'    => __( 'Contact Telephone:', 'constructzine-lite' ),
		'section'  => 'constructzine_header',
		'settings' => 'ti_header_contact_telephone',
		'priority' => '2',

		)
	);

	/* Header - Facebook - Link */

	$wp_customize->add_setting(
		'ti_header_facebook_link1', array(
		'sanitize_callback' => 'esc_url_raw',
		'default' => 'http://www.facebook.com',
		)
	);

	$wp_customize->add_control(
		'ti_header_facebook_link1', array(

		'label'    => __( 'Facebook - Link:', 'constructzine-lite' ),
		'section'  => 'constructzine_header',
		'settings' => 'ti_header_facebook_link1',
		'priority' => '3',

		)
	);

	/* Header - Twitter - Link */

	$wp_customize->add_setting(
		'ti_header_twitter_link1', array(
		'sanitize_callback' => 'esc_url_raw',
		'default' => 'http://www.twitter.com',
		)
	);

	$wp_customize->add_control(
		'ti_header_twitter_link1', array(

		'label'    => __( 'Twitter - Link:', 'constructzine-lite' ),
		'section'  => 'constructzine_header',
		'settings' => 'ti_header_twitter_link1',
		'priority' => '4',

		)
	);

	/* Header - YouTube - Link */

	$wp_customize->add_setting(
		'ti_header_youtube_link1', array(
		'sanitize_callback' => 'esc_url_raw',
		'default' => 'http://www.youtube.com',
		)
	);

	$wp_customize->add_control(
		'ti_header_youtube_link1', array(

		'label'    => __( 'YouTube - Link:', 'constructzine-lite' ),
		'section'  => 'constructzine_header',
		'settings' => 'ti_header_youtube_link1',
		'priority' => '5',

		)
	);

	/*

	** Subheader Customizer
	*/

	$wp_customize->add_section(
		'constructzine_subheader', array(

		'title'    => __( 'Subheader', 'constructzine-lite' ),
		'priority' => 250,

		)
	);

	/* Subheader - Contact Form - Title */

	$wp_customize->add_setting( 'ti_subheader_contact_form_title', array( 'sanitize_callback' => 'constructzine_lite_sanitize_text' ) );

	$wp_customize->add_control(
		new constructzine_lite_Theme_Support_Subheader(
			$wp_customize,'ti_subheader_contact_form_title', array(
					'section'  => 'constructzine_subheader',
					)
		)
	);

	/*

	** Front Page Customizer
	*/

	if ( class_exists( 'WP_Customize_Panel' ) ) :

		$wp_customize->add_panel(
			'panel_frontpage', array(
			'priority' => 300,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => __( 'Front page', 'constructzine-lite' ),
			)
		);

		$wp_customize->add_section(
			'constructzine_firstbox_section', array(

			'title'    => __( 'First box', 'constructzine-lite' ),
			'priority' => 1,
			'panel'    => 'panel_frontpage',

			)
		);

		/* Front Page - Box One - Title */

		$wp_customize->add_setting(
			'ti_frontpage_boxone_title',array(
			'default' => 'Phasellus tempus',
			'sanitize_callback' => 'constructzine_lite_sanitize_text',
			)
		);

		$wp_customize->add_control(
			'ti_frontpage_boxone_title', array(

			'label'    => __( 'Box 1 - Title:', 'constructzine-lite' ),
			'section'  => 'constructzine_firstbox_section',
			'settings' => 'ti_frontpage_boxone_title',
			'priority' => '1',

			)
		);

		/* Front Page - Box One - Content */

		$wp_customize->add_setting(
			'ti_frontpage_boxone_content',array(
			'default' => 'Vestibulum vel dapibus lectus, eu vulputate risus. Sed egestas varius tellus, eget auctor lacus semper nec. Nam mi felis, pellentesque eget tincidunt accumsan.',
			'sanitize_callback' => 'constructzine_lite_sanitize_text',
			)
		);

		$wp_customize->add_control(
			new constructzine_lite_Customize_Textarea_Control(
				$wp_customize, 'ti_frontpage_boxone_content', array(

							'label'    => __( 'Box 1 - Content:', 'constructzine-lite' ),
							'section'  => 'constructzine_firstbox_section',
							'settings' => 'ti_frontpage_boxone_content',
							'priority' => '2',

							)
			)
		);

		$wp_customize->add_section(
			'constructzine_secondbox_section', array(

			'title'    => __( 'Second box', 'constructzine-lite' ),
			'priority' => 2,
			'panel'    => 'panel_frontpage',

			)
		);

		/* Front Page - Box Two - Title */

		$wp_customize->add_setting(
			'ti_frontpage_boxtwo_title',array(
			'default' => 'Phasellus tempus',
			'sanitize_callback' => 'constructzine_lite_sanitize_text',
			)
		);

		$wp_customize->add_control(
			'ti_frontpage_boxtwo_title', array(

			'label'    => __( 'Box 2 - Title:', 'constructzine-lite' ),
			'section'  => 'constructzine_secondbox_section',
			'settings' => 'ti_frontpage_boxtwo_title',
			'priority' => '1',

			)
		);

		/* Front Page - Box Two - Content */

		$wp_customize->add_setting(
			'ti_frontpage_boxtwo_content',array(
			'default' => 'Vestibulum vel dapibus lectus, eu vulputate risus. Sed egestas varius tellus, eget auctor lacus semper nec. Nam mi felis, pellentesque eget tincidunt accumsan.',
			'sanitize_callback' => 'constructzine_lite_sanitize_text',
			)
		);

		$wp_customize->add_control(
			new constructzine_lite_Customize_Textarea_Control(
				$wp_customize, 'ti_frontpage_boxtwo_content', array(

							'label'    => __( 'Box 2 - Content:', 'constructzine-lite' ),
							'section'  => 'constructzine_secondbox_section',
							'settings' => 'ti_frontpage_boxtwo_content',
							'priority' => '2',

							)
			)
		);

		$wp_customize->add_section(
			'constructzine_thirdbox_section', array(

			'title'    => __( 'Third box', 'constructzine-lite' ),
			'priority' => 3,
			'panel'    => 'panel_frontpage',

			)
		);

		/* Front Page - Box Three - Title */

		$wp_customize->add_setting(
			'ti_frontpage_boxthree_title',array(
			'default' => 'Phasellus tempus',
			'sanitize_callback' => 'constructzine_lite_sanitize_text',
			)
		);

		$wp_customize->add_control(
			'ti_frontpage_boxthree_title', array(

			'label'    => __( 'Box 3 - Title:', 'constructzine-lite' ),
			'section'  => 'constructzine_thirdbox_section',
			'settings' => 'ti_frontpage_boxthree_title',
			'priority' => '1',

			)
		);

		/* Front Page - Box Three - Content */

		$wp_customize->add_setting(
			'ti_frontpage_boxthree_content',array(
			'default' => 'Vestibulum vel dapibus lectus, eu vulputate risus. Sed egestas varius tellus, eget auctor lacus semper nec. Nam mi felis, pellentesque eget tincidunt accumsan.',
			'sanitize_callback' => 'constructzine_lite_sanitize_text',
			)
		);

		$wp_customize->add_control(
			new constructzine_lite_Customize_Textarea_Control(
				$wp_customize, 'ti_frontpage_boxthree_content', array(

							'label'    => __( 'Box 3 - Content:', 'constructzine-lite' ),
							'section'  => 'constructzine_thirdbox_section',
							'settings' => 'ti_frontpage_boxthree_content',
							'priority' => '2',

							)
			)
		);

		$wp_customize->add_section(
			'constructzine_aboutus_section', array(

			'title'    => __( 'About us section', 'constructzine-lite' ),
			'priority' => 4,
			'panel'    => 'panel_frontpage',

			)
		);

		/* Front Page - Article - Title */

		$wp_customize->add_setting(
			'ti_frontpage_article_title',array(
			'default' => __( 'About us', 'constructzine-lite' ),
			'sanitize_callback' => 'constructzine_lite_sanitize_text',
			)
		);

		$wp_customize->add_control(
			'ti_frontpage_article_title', array(

			'label'    => __( 'About Us - Title:', 'constructzine-lite' ),
			'section'  => 'constructzine_aboutus_section',
			'settings' => 'ti_frontpage_article_title',
			'priority' => '1',

			)
		);

		/* Front Page - Article - Image */

		$wp_customize->add_setting(
			'ti_frontpage_article_image',array(
			'default' => get_template_directory_uri() . '/images/about_us.jpg',
			'sanitize_callback' => 'esc_url_raw',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize, 'ti_frontpage_article_image', array(

							'label'    => __( 'About Us - Image:', 'constructzine-lite' ),
							'section'  => 'constructzine_aboutus_section',
							'settings' => 'ti_frontpage_article_image',
							'priority' => '2',

							)
			)
		);

		/* Front Page - Article - content */

		$wp_customize->add_setting(
			'ti_frontpage_article_content', array(
			'default' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est.',
			'sanitize_callback' => 'constructzine_lite_sanitize_text',
			)
		);

		$wp_customize->add_control(
			new constructzine_lite_Customize_Textarea_Control(
				$wp_customize, 'ti_frontpage_article_content', array(

							'label'    => __( 'About Us - Content', 'constructzine-lite' ),
							'section'  => 'constructzine_aboutus_section',
							'settings' => 'ti_frontpage_article_content',
							'priority' => '3',

							)
			)
		);

		/* Front Page - Article - Testimonials */

		$wp_customize->add_setting(
			'ti_frontpage_article_testimonials',
			array(
				'sanitize_callback' => 'constructzine_lite_sanitize_text',
				)
		);
		$wp_customize->add_control(
			'ti_frontpage_article_testimonials',
			array(
				'type' 		=> 'checkbox',
				'label' 	=> __( 'Disable testimonials on homepage?', 'constructzine-lite' ),
				'section' 	=> 'constructzine_aboutus_section',
				'priority'	=> 4,
				)
		);

	else :

		$wp_customize->add_section(
			'constructzine_frontpage', array(

			'title'    => __( 'Front Page', 'constructzine-lite' ),
			'priority' => 300,

			)
		);

		/* Front Page - Box One - Title */

		$wp_customize->add_setting(
			'ti_frontpage_boxone_title',array(
			'default' => 'Phasellus tempus',
			'sanitize_callback' => 'constructzine_lite_sanitize_text',
			)
		);

		$wp_customize->add_control(
			'ti_frontpage_boxone_title', array(

			'label'    => __( 'Box 1 - Title:', 'constructzine-lite' ),
			'section'  => 'constructzine_frontpage',
			'settings' => 'ti_frontpage_boxone_title',
			'priority' => '1',

			)
		);

		/* Front Page - Box One - Content */

		$wp_customize->add_setting(
			'ti_frontpage_boxone_content',array(
			'default' => 'Vestibulum vel dapibus lectus, eu vulputate risus. Sed egestas varius tellus, eget auctor lacus semper nec. Nam mi felis, pellentesque eget tincidunt accumsan.',
			'sanitize_callback' => 'constructzine_lite_sanitize_text',
			)
		);

		$wp_customize->add_control(
			new constructzine_lite_Customize_Textarea_Control(
				$wp_customize, 'ti_frontpage_boxone_content', array(

							'label'    => __( 'Box 1 - Content:', 'constructzine-lite' ),
							'section'  => 'constructzine_frontpage',
							'settings' => 'ti_frontpage_boxone_content',
							'priority' => '2',

							)
			)
		);

		/* Front Page - Box Two - Title */

		$wp_customize->add_setting(
			'ti_frontpage_boxtwo_title',array(
			'default' => 'Phasellus tempus',
			'sanitize_callback' => 'constructzine_lite_sanitize_text',
			)
		);

		$wp_customize->add_control(
			'ti_frontpage_boxtwo_title', array(

			'label'    => __( 'Box 2 - Title:', 'constructzine-lite' ),
			'section'  => 'constructzine_frontpage',
			'settings' => 'ti_frontpage_boxtwo_title',
			'priority' => '3',

			)
		);

		/* Front Page - Box Two - Content */

		$wp_customize->add_setting(
			'ti_frontpage_boxtwo_content',array(
			'default' => 'Vestibulum vel dapibus lectus, eu vulputate risus. Sed egestas varius tellus, eget auctor lacus semper nec. Nam mi felis, pellentesque eget tincidunt accumsan.',
			'sanitize_callback' => 'constructzine_lite_sanitize_text',
			)
		);

		$wp_customize->add_control(
			new constructzine_lite_Customize_Textarea_Control(
				$wp_customize, 'ti_frontpage_boxtwo_content', array(

							'label'    => __( 'Box 2 - Content:', 'constructzine-lite' ),
							'section'  => 'constructzine_frontpage',
							'settings' => 'ti_frontpage_boxtwo_content',
							'priority' => '4',

							)
			)
		);

		/* Front Page - Box Three - Title */

		$wp_customize->add_setting(
			'ti_frontpage_boxthree_title',array(
			'default' => 'Phasellus tempus',
			'sanitize_callback' => 'constructzine_lite_sanitize_text',
			)
		);

		$wp_customize->add_control(
			'ti_frontpage_boxthree_title', array(

			'label'    => __( 'Box 3 - Title:', 'constructzine-lite' ),
			'section'  => 'constructzine_frontpage',
			'settings' => 'ti_frontpage_boxthree_title',
			'priority' => '5',

			)
		);

		/* Front Page - Box Three - Content */

		$wp_customize->add_setting(
			'ti_frontpage_boxthree_content',array(
			'default' => 'Vestibulum vel dapibus lectus, eu vulputate risus. Sed egestas varius tellus, eget auctor lacus semper nec. Nam mi felis, pellentesque eget tincidunt accumsan.',
			'sanitize_callback' => 'constructzine_lite_sanitize_text',
			)
		);

		$wp_customize->add_control(
			new constructzine_lite_Customize_Textarea_Control(
				$wp_customize, 'ti_frontpage_boxthree_content', array(

							'label'    => __( 'Box 3 - Content:', 'constructzine-lite' ),
							'section'  => 'constructzine_frontpage',
							'settings' => 'ti_frontpage_boxthree_content',
							'priority' => '6',

							)
			)
		);

		/* Front Page - Article - Title */

		$wp_customize->add_setting(
			'ti_frontpage_article_title',array(
			'default' => __( 'About us', 'constructzine-lite' ),
			'sanitize_callback' => 'constructzine_lite_sanitize_text',
			)
		);

		$wp_customize->add_control(
			'ti_frontpage_article_title', array(

			'label'    => __( 'About Us - Title:', 'constructzine-lite' ),
			'section'  => 'constructzine_frontpage',
			'settings' => 'ti_frontpage_article_title',
			'priority' => '7',

			)
		);

		/* Front Page - Article - Image */

		$wp_customize->add_setting(
			'ti_frontpage_article_image',array(
			'default' => get_template_directory_uri() . '/images/about_us.jpg',
			'sanitize_callback' => 'esc_url_raw',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize, 'ti_frontpage_article_image', array(

							'label'    => __( 'About Us - Image:', 'constructzine-lite' ),
							'section'  => 'constructzine_frontpage',
							'settings' => 'ti_frontpage_article_image',
							'priority' => '8',

							)
			)
		);

		/* Front Page - Box Three - Content */

		$wp_customize->add_setting(
			'ti_frontpage_article_content', array(
			'default' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est.',
			'sanitize_callback' => 'constructzine_lite_sanitize_text',
			)
		);

		$wp_customize->add_control(
			new constructzine_lite_Customize_Textarea_Control(
				$wp_customize, 'ti_frontpage_article_content', array(

							'label'    => __( 'About Us - Content', 'constructzine-lite' ),
							'section'  => 'constructzine_frontpage',
							'settings' => 'ti_frontpage_article_content',
							'priority' => '9',

							)
			)
		);

		/* Front Page - Article - Testimonials */

		$wp_customize->add_setting(
			'ti_frontpage_article_testimonials',
			array(
				'sanitize_callback' => 'constructzine_lite_sanitize_text',
				)
		);
		$wp_customize->add_control(
			'ti_frontpage_article_testimonials',
			array(
				'type' 		=> 'checkbox',
				'label' 	=> __( 'Disable testimonials on homepage?', 'constructzine-lite' ),
				'section' 	=> 'constructzine_frontpage',
				'priority'	=> 10,
				)
		);

	endif;

	/*

	** Footer Customizer
	*/

	$wp_customize->add_section(
		'constructzine_footer', array(

		'title'    => __( 'Footer', 'constructzine-lite' ),
		'priority' => 400,

		)
	);

	/* Footer - About us - Title */

	$wp_customize->add_setting(
		'ti_footer_aboutus_title', array(
		'default' => __( 'About us','constructzine-lite' ),
		'sanitize_callback' => 'constructzine_lite_sanitize_text',
		)
	);

	$wp_customize->add_control(
		'ti_footer_aboutus_title', array(

		'label'    => __( 'About us - Title:', 'constructzine-lite' ),
		'section'  => 'constructzine_footer',
		'settings' => 'ti_footer_aboutus_title',
		'priority' => '1',

		)
	);

	/* Footer - About us - Content */

	$wp_customize->add_setting(
		'ti_footer_aboutus_content', array(
		'default' => 'Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non.',
		'sanitize_callback' => 'constructzine_lite_sanitize_text',
		)
	);

	$wp_customize->add_control(
		new constructzine_lite_Customize_Textarea_Control(
			$wp_customize, 'ti_footer_aboutus_content', array(

					'label'    => __( 'About us - Content', 'constructzine-lite' ),
					'section'  => 'constructzine_footer',
					'settings' => 'ti_footer_aboutus_content',
					'priority' => '2',

					)
		)
	);

	/* Footer - Contact us - Title */

	$wp_customize->add_setting(
		'ti_footer_contactus_title',array(
		'default' => __( 'Contact us', 'constructzine-lite' ),
		'sanitize_callback' => 'constructzine_lite_sanitize_text',
		)
	);

	$wp_customize->add_control(
		'ti_footer_contactus_title', array(

		'label'    => __( 'Contact us - Title:', 'constructzine-lite' ),
		'section'  => 'constructzine_footer',
		'settings' => 'ti_footer_contactus_title',
		'priority' => '3',

		)
	);

	/* Footer - Contact us - Content */

	$wp_customize->add_setting(
		'ti_footer_contactus_content',array(
		'default' => '<p>Romania, Bucuresti<br>Str. Fainari, Nr. 24B</p><p>Tel: (+4) 0726755577<br>E-mail: contact@themeisle.com</p>',
		'sanitize_callback' => 'constructzine_lite_sanitize_text',
		)
	);

	$wp_customize->add_control(
		new constructzine_lite_Customize_Textarea_Control(
			$wp_customize, 'ti_footer_contactus_content', array(

					'label'    => __( 'Contact us - Content', 'constructzine-lite' ),
					'section'  => 'constructzine_footer',
					'settings' => 'ti_footer_contactus_content',
					'priority' => '4',

					)
		)
	);

	/* Footer - Map - Title */

	$wp_customize->add_setting(
		'ti_footer_map_title',array(
		'default' => __( 'Map', 'constructzine-lite' ),
		'sanitize_callback' => 'constructzine_lite_sanitize_text',
		)
	);

	$wp_customize->add_control(
		'ti_footer_map_title', array(

		'label'    => __( 'Map - Title:', 'constructzine-lite' ),
		'section'  => 'constructzine_footer',
		'settings' => 'ti_footer_map_title',
		'priority' => '5',

		)
	);

	/* Footer - Contact us - Iframe */

	$wp_customize->add_setting(
		'ti_footer_map_iframe',array(
		'default' => '<iframe src="https://www.google.com/maps/embed?q=Bucharest" width="600" height="450" frameborder="0" style="border:0"></iframe>',
		'sanitize_callback' => 'constructzine_lite_sanitize_html',
		)
	);

	$wp_customize->add_control(
		new constructzine_lite_Customize_Textarea_Control(
			$wp_customize, 'ti_footer_map_iframe', array(

					'label'    => __( 'Map - Iframe', 'constructzine-lite' ),
					'section'  => 'constructzine_footer',
					'settings' => 'ti_footer_map_iframe',
					'priority' => '6',

					)
		)
	);

	/*

	** Contact Customizer
	*/

	$wp_customize->add_section(
		'constructzine_contact', array(

		'title'    => __( 'Contact', 'constructzine-lite' ),
		'priority' => 450,

		)
	);

	/* Contact - Contact us - Title */

	$wp_customize->add_setting( 'ti_contact_contactus_title', array( 'sanitize_callback' => 'constructzine_lite_sanitize_text' ) );

	$wp_customize->add_control(
		'ti_contact_contactus_title', array(

		'label'    => __( 'Contact - Title:', 'constructzine-lite' ),
		'section'  => 'constructzine_contact',
		'settings' => 'ti_contact_contactus_title',
		'priority' => '1',

		)
	);

	/* Contact - Contact us - Content */

	$wp_customize->add_setting( 'ti_contact_contactus_content', array( 'sanitize_callback' => 'constructzine_lite_sanitize_text' ) );

	$wp_customize->add_control(
		new constructzine_lite_Customize_Textarea_Control(
			$wp_customize, 'ti_contact_contactus_content', array(

					'label'    => __( 'Contact us - Content', 'constructzine-lite' ),
					'section'  => 'constructzine_contact',
					'settings' => 'ti_contact_contactus_content',
					'priority' => '2',

					)
		)
	);

	/* Contact - Contact us - Phone */

	$wp_customize->add_setting( 'ti_contact_phone', array( 'sanitize_callback' => 'constructzine_lite_sanitize_text' ) );

	$wp_customize->add_control(
		'ti_contact_phone', array(

		'label'    => __( 'Contact - Phone:', 'constructzine-lite' ),
		'section'  => 'constructzine_contact',
		'settings' => 'ti_contact_phone',
		'priority' => '3',

		)
	);

	/* Contact - Contact us - Website */

	$wp_customize->add_setting( 'ti_contact_website', array( 'sanitize_callback' => 'constructzine_lite_sanitize_text' ) );

	$wp_customize->add_control(
		'ti_contact_website', array(

		'label'    => __( 'Contact - Website:', 'constructzine-lite' ),
		'section'  => 'constructzine_contact',
		'settings' => 'ti_contact_website',
		'priority' => '4',

		)
	);

	/* Contact - Contact us - E-mail */

	$wp_customize->add_setting( 'ti_contact_email', array( 'sanitize_callback' => 'constructzine_lite_sanitize_text' ) );

	$wp_customize->add_control(
		'ti_contact_email', array(

		'label'    => __( 'Contact - E-mail:', 'constructzine-lite' ),
		'section'  => 'constructzine_contact',
		'settings' => 'ti_contact_email',
		'priority' => '5',

		)
	);

}

add_action( 'customize_register', 'constructzine_lite_customizer' );

function constructzine_lite_sanitize_notes( $input ) {

	return $input;

}

function constructzine_lite_sanitize_text( $input ) {

	return wp_kses_post( force_balance_tags( $input ) );

}

function constructzine_lite_sanitize_html( $input ) {

	return force_balance_tags( $input );

}

if ( class_exists( 'WP_Customize_Control' ) ) :

	class constructzine_lite_Customize_Textarea_Control extends WP_Customize_Control {

		public $type = 'textarea';


		public function render_content() {
			?>



			<label>

				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>

				<textarea rows="5"
						  style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>

			</label>



		<?php

		}

	}

endif;

function constructzine_lite_registers() {

	wp_register_script( 'constructzine_lite_customizer_script', get_template_directory_uri() . '/js/constructzine-lite_customizer.js', array( 'jquery' ), '20120206', true );

	wp_enqueue_script( 'constructzine_jquery_ui' );

}

add_action( 'customize_controls_enqueue_scripts', 'constructzine_lite_registers' );

?>
