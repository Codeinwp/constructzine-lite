<?php
/*
*   Pagination
*/
function constructzine_lite_pagination( $pages = '', $range = 4 ) {
	$showitems = ( $range * 2 ) + 1;
	global $paged;
	if ( empty( $paged ) ) {
		$paged = 1;
	}
	if ( $pages == '' ) {
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		if ( ! $pages ) {
			$pages = 1;
		}
	}
	if ( 1 != $pages ) {
		echo '<div class="post-navigation">';
		if ( $paged > 1 ) {
			echo previous_posts_link();
		}
		echo '<span>Showing ' . $paged . ' of ' . $pages . ' (' . $pages . ' Pages)</span>';
		echo next_posts_link();
		echo "</div>\n";
	}
}

/*
*   Excerpt Limit Length
*/
function constructzine_lite_excerpt_limit_length( $string, $limit ) {
	$words = explode( ' ', $string );

	return implode( ' ', array_slice( $words, 0, $limit ) );
}

/*
*   Comments List
*/
function constructzine_lite_comments_list( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback':
		case 'trackback':
		?>
		<li class="post pingback">
		<p><?php _e( 'Pingback:', 'constructzine-lite' ); ?><?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'constructzine-lite' ), ' ' ); ?></p>
	<?php
			break;
		default:
		?>
		<article id="comment-<?php comment_ID(); ?>">
	<li id="comment-<?php comment_ID(); ?>" <?php comment_class( 'comment cf' ); ?>>
	<div class="comment-avatar">
		<?php echo get_avatar( $comment, 60 ); ?>
	</div>
	<!--/.comment-avatar-->
	<div class="comment-entry">
				<span>
					<?php printf( __( 'by %s', 'constructzine-lite' ), sprintf( '%s', get_comment_author_link() ) ); ?>
					<?php _e( 'on', 'constructzine-lite' ); ?>
					<time pubdate datetime="<?php comment_time( 'c' ); ?>">
						<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>" title="">
							<?php printf( __( '%1$s at %2$s', 'constructzine-lite' ), get_comment_date(), get_comment_time() ); ?>
						</a><!--/a-->
						<?php edit_comment_link( __( '(Edit)', 'constructzine-lite' ), ' ' ); ?>
					</time><!--/time-->
				</span><!--/span-->
		<?php comment_text(); ?>
		<?php comment_reply_link(
			array_merge(
				$args, array(
					'depth'     => $depth,
					'max_depth' => $args['max_depth'],
				)
			)
		); ?>
		</div>
		<!--/.comment-entry-->
		</article>
		<?php
			break;
	endswitch;
}
	?>
