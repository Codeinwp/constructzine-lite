<?php
/*
* 	The template for displaying Index.
*
* 	@package ThemeIsle
*/
get_header();
?>
	<div id="main-content">
		<div class="inner cf">
			<div class="blog-left">
				<div class="blog-left-title">
					<?php _e( 'Our Blog', 'constructzine-lite' ); ?>
				</div>
				<!--/.blog-left-title-->
				<?php
				if ( have_posts() ) {
					while ( have_posts() ) {
						the_post();
						$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="post-title">
								<?php the_title(); ?>
							</a><!--/.post-title-->
							<div class="post-meta">
								<?php _e( 'Posted by', 'constructzine-lite' ); ?> <?php the_author_posts_link(); ?> <?php _e( 'in', 'constructzine-lite' ); ?> <?php the_category( ', ' ); ?>
								, <?php _e( 'on', 'constructzine-lite' ); ?> <?php echo the_time( get_option( 'date_format' ) ); ?>
							</div>
							<!--/.post-meta-->
							<div class="post-image">
								<?php
								if ( $featured_image != null ) {
									?>
									<img src="<?php echo $featured_image[0]; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>"/>
									<?php
								}
								?>
							</div>
							<!--/.post-image-->
							<div class="post-entry">
								<?php the_excerpt(); ?>
							</div>
							<!--/.post-entry-->
							<div class="post-footer">
								<ul>
									<li class="comments-icon"><a href="<?php the_permalink(); ?>#comments"
																 title="<?php printf( _n( 'One Comment', '%1$s Comments', get_comments_number(), 'constructzine-lite' ), number_format_i18n( get_comments_number() ), '' . get_the_title() . '' ); ?>"><?php printf( _n( 'One Comment', '%1$s Comments', get_comments_number(), 'constructzine-lite' ), number_format_i18n( get_comments_number() ), '' . get_the_title() . '' ); ?></a>
									</li>
									<li><a href="<?php the_permalink(); ?>"
										   title="<?php _e( 'Read more...', 'constructzine-lite' ); ?>"><?php _e( 'Read more...', 'constructzine-lite' ); ?></a>
									</li>
								</ul>
							</div>
							<!--/.post-footer-->
						</article><!--/article-->
					<?php
					}
				} else {
					echo __( 'No posts found', 'constructzine-lite' );
				}
					constructzine_lite_pagination();
				?>
			</div>
			<!--/.blog-left-->
			<?php get_sidebar(); ?>
		</div>
	</div>
<?php get_footer(); ?>
