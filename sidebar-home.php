<?php

if ( is_active_sidebar( 'home_sidebar' ) ) {

	 dynamic_sidebar( 'home_sidebar' );

} else {
	?>
		<div class="feedback block">
			<h2 class="block-title"><?php _e( 'What customers says','constructzine-lite' ); ?></h2>

			<div class="feedback">
				<p class="feedback-meta">
					<strong><?php _e( 'Ionut Neagu','constructzine-lite' ); ?></strong>
				</p><!--/.feedback-meta-->
				<blockquote>
					<p><?php _e( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce dapibus justo at justo facilisis, et gravida lacus ornare. Proin nisl mauris, pretium et euismod a, congue quis odio.','constructzine-lite' ); ?></p>
				</blockquote><!--/.feedback-entry-->
			</div>


			<div class="feedback">
				<p class="feedback-meta">
					<strong><?php _e( 'Marius Cristea','constructzine-lite' ); ?></strong>
				</p><!--/.feedback-meta-->
				<blockquote>
					<p><?php _e( 'Interdum et malesuada fames ac ante ipsum primis in faucibus. Phasellus sed magna ante. Duis sodales, dui vitae tincidunt aliquet, augue magna pharetra libero, nec congue nibh felis congue purus.','constructzine-lite' ); ?></p>
				</blockquote>
			</div>


		</div>
		<?php

}
?>
