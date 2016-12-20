<?php
/**
 * Customizer info singleton class file.
 *
 * @package Constructzine Lite
 */

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Customizer_Info_Singleton {

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
		add_action( 'customize_register', array( $this, 'sections' ), 1);

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object $manager WordPress customizer object.
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		require_once( trailingslashit( get_template_directory() ) . 'includes/customizer-info/class/class-customizer-info-section.php' );

		// Register custom section types.
		$manager->register_section_type( 'Customizer_Info' );

		// Register sections.
		$manager->add_section( new Customizer_Info( $manager, 'constructzine_lite_view_pro', array(
			'section_title' => __('View PRO version', 'constructzine-lite'),
			'section_url' => 'https://themeisle.com/themes/constructzine-construction-wordpress-theme/',
			'section_text' => __('Get it', 'constructzine-lite'),
			'priority' => 900,
		) ) );
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'customizer-info-js', trailingslashit( get_template_directory_uri() ) . 'includes/customizer-info/js/customizer-info-controls.js', array( 'customize-controls' ) );
		wp_enqueue_style( 'customizer-info-style', trailingslashit( get_template_directory_uri() ) . 'includes/customizer-info/css/style.css');

	}
}

Customizer_Info_Singleton::get_instance();
