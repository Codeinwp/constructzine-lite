<?php
/*
* 	The template for displaying Page Contact.
*
* 	@package ThemeIsle
*/
get_header();
?>
	<div id="main-content">
		<div class="inner cf">
			<?php
			if ( have_posts() ) {
				while ( have_posts() ) {
					the_post(); ?>
					<div class="blog-left">
						<div class="blog-left-title">
							<?php the_title(); ?>
						</div>
						<!--/.blog-left-title-->
						<article>
							<div class="post-entry">
								<?php the_content(); ?>
							</div>
							<!--/.post-entry-->
						</article>
					</div><!--/.blog-left-->
				<?php
				}
			} else {
				echo __( 'No posts found', 'constructzine-lite' );
			}
			?>
			<div class="sidebar">
				<div class="widget">
					<div class="widget-title">
						<?php
						if ( get_theme_mod( 'ti_contact_contactus_title' ) != null ) {
							echo esc_attr( get_theme_mod( 'ti_contact_contactus_title' ) );
						} else {
							echo __( 'Contact us', 'constructzine-lite' );
						}
						?>
					</div>
					<!--/.widget-title-->
					<?php
					if ( get_theme_mod( 'ti_contact_contactus_content' ) != null ) {
						echo esc_attr( get_theme_mod( 'ti_contact_contactus_content' ) );
					} else {
						echo __( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco labo ris nisi ut aliquip ex ea commodo consequat.', 'constructzine-lite' );
					}
					?>
				</div>
				<!--/.widget-->
				<div class="widget">
					<?php
					if ( get_theme_mod( 'ti_footer_map_iframe' ) != null ) {
						echo get_theme_mod( 'ti_footer_map_iframe' );
					} else {
						?>
						<iframe
							src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d48393.71012617254!2d-74.0047826738297!3d40.704654807499544!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York!5e0!3m2!1sro!2sro!4v1403183009785"
							width="600" height="450" frameborder="0" style="border:0"></iframe>
					<?php
					}
					?>
					<div class="iframe-mask">
					</div>
					<!--/.iframe-mask-->
				</div>
				<!--/.widget-->
				<div class="widget">
					<?php
					if ( get_theme_mod( 'ti_contact_phone' ) ) {
						echo __( 'Phone: ', 'constructzine-lite' );
						echo '<a href="tel:' . esc_attr( get_theme_mod( 'ti_contact_phone' ) ) . '" title="' . esc_attr( get_theme_mod( 'ti_contact_phone' ) ) . '">' . esc_attr( get_theme_mod( 'ti_contact_phone' ) ) . '</a>';
					}
					?>
					<br/>
					<?php
					if ( get_theme_mod( 'ti_contact_website' ) != null ) {
						echo __( 'Website: ', 'constructzine-lite' );
						echo '<a href="' . esc_attr( get_theme_mod( 'ti_contact_website' ) ) . '" title="' . esc_attr( get_theme_mod( 'ti_contact_website' ) ) . '">' . get_theme_mod( 'ti_contact_website' ) . '</a>';
					}
					?>
					<br/>
					<?php
					if ( get_theme_mod( 'ti_contact_email' ) != null ) {
						echo __( 'E-mail: ', 'constructzine-lite' );
						echo '<a href="mailto:' . get_theme_mod( 'ti_contact_email' ) . '" title="' . get_theme_mod( 'ti_contact_email' ) . '">' . get_theme_mod( 'ti_contact_email' ) . '</a>';
					}
					?>
				</div>
				<!--/.widget-->
			</div>
			<!--/.sidebar-->
		</div>
	</div>
<?php get_footer(); ?>
