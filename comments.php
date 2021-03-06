<?php
/*
*   The template for displaying Comments.
*
*   @package ThemeIsle
*/
if ( post_password_required() ) {
	return;
}
?>
<div id="comments">
	<?php if ( have_comments() ) : ?>
		<div class="title-border">
			<h3>
				<?php
				printf(
					_n( 'One comment on', '%1$s comments on &ldquo;%2$s&rdquo;', get_comments_number(), 'constructzine-lite' ),
					number_format_i18n( get_comments_number() ), '' . get_the_title() . ''
				);
				?>
			</h3>
		</div><!--/.title-border-->
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<nav role="navigation" id="comment-nav-above" class="site-navigation comment-navigation">
				<h1 class="assistive-text"><?php _e( 'Comment navigation', 'constructzine-lite' ); ?></h1>
				<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'constructzine-lite' ) ); ?>
				</div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'constructzine-lite' ) ); ?>
				</div>
			</nav>
		<?php endif; ?>
		<ol class="comments-list cf">
			<?php
			wp_list_comments(
				array(
					'callback'  => 'constructzine_lite_comments_list',
					'max_depth' => '3',
				)
			);
			?>
		</ol><!--/.comments-list .cf-->
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<nav role="navigation" id="comment-nav-below" class="site-navigation comment-navigation">
				<h1 class="assistive-text"><?php _e( 'Comment navigation', 'constructzine-lite' ); ?></h1>
				<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'constructzine-lite' ) ); ?>
				</div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'constructzine-lite' ) ); ?>
				</div>
			</nav>
		<?php endif; ?>
	<?php endif; ?>
	<?php
	if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
		?>
		<p class="nocomments"><?php _e( 'Comments are closed.', 'constructzine-lite' ); ?></p>
	<?php endif; ?>
	<?php
	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );
	if ( $commenter['comment_author'] != '' ) {
		$name = esc_attr( $commenter['comment_author'] );
	} else {
		$name = '';
	}
	if ( $commenter['comment_author_email'] != '' ) {
		$email = esc_attr( $commenter['comment_author_email'] );
	} else {
		$email = '';
	}
	if ( $commenter['comment_author_url'] != '' ) {
		$url = esc_attr( $commenter['comment_author_url'] );
	} else {
		$url = '';
	}
	$fields = array(
		'author' => '<div class="respond"><input class="input-text" placeholder="Full Name (*)" name="author" type="text" value="' . $name . '" ' . $aria_req . ' />',
		'email'  => '<input class="input-text" placeholder="E-mail (*)" name="email" type="email" value="' . $email . '" ' . $aria_req . ' />',
		'url'    => '<input class="input-text" placeholder="Website" name="url" type="url" value="' . $url . '" />',
	);
	$comment_textarea = '<textarea placeholder="Your Message (*)" name="comment" aria-required="true"></textarea>';
	comment_form(
		array(
			'fields'         => $fields,
			'comment_field'  => $comment_textarea,
			'id_submit'      => 'input-submit',
			'label_submit'   => esc_attr__( 'Submit', 'constructzine-lite' ),
			'title_reply'    => '<div class="title-border"><h3>' . esc_attr__( 'Leave a Reply', 'constructzine-lite' ) . '</h3></div>',
			'title_reply_to' => esc_attr__( 'Leave a comment to %s', 'constructzine-lite' ),
		)
	);
	?>
</div><!--/#comments-->
