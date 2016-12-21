<?php
/**
 * Class to display upsells.
 *
 * @package WordPress
 * @subpackage Constructzine Lite
 */
if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return;
}

/**
 * Class Constructzine_Info
 */
class Constructzine_Info extends WP_Customize_Control {

	/**
	 * The type of customize section being rendered.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $type = 'info';

	/**
	 * Control label
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $label = '';


	/**
	 * The render function for the controler
	 */
	public function render_content() {
		$links = array(
			array(
				'name' => __( 'Leave a review ( it will help us )','constructzine-lite' ),
				'link' => esc_url( 'https://wordpress.org/support/view/theme-reviews/constructzine-lite' ),
			),
			array(
				'name' => __( 'Documentation','constructzine-lite' ),
				'link' => esc_url( 'https://themeisle.com/documentation-constructzine-lite' ),
			),
			array(
				'name' => __( 'View PRO version','constructzine-lite' ),
				'link' => esc_url( 'https://themeisle.com/themes/constructzine-construction-wordpress-theme/' ),
			),
		); ?>


		<div class="constructzine-theme-info">
			<?php
			foreach ( $links as $item ) {  ?>
				<a href="<?php echo esc_url( $item['link'] ); ?>" target="_blank"><?php echo esc_html( $item['name'] ); ?></a>
				<hr/>
				<?php
			} ?>
		</div>
		<?php
	}
}
