<?php
/**
 * The Template for displaying all single projects.
 *
 * @package Orvis
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content', 'portfolio-single' ); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) {
					comments_template();
				}
			?>

			<?php
				the_post_navigation( array(
					'next_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( 'Next', 'orvis' ) . '</span> ' .
						'<span class="screen-reader-text">' . esc_html__( 'Next post:', 'orvis' ) . '</span> ' .
						'<span class="post-title">%title</span>',
					'prev_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( 'Previous', 'orvis' ) . '</span> ' .
						'<span class="screen-reader-text">' . esc_html__( 'Previous post:', 'orvis' ) . '</span> ' .
						'<span class="post-title">%title</span>',
				) );
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>