<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Archive Template
 *
 *
 * @file           single-faq.php
 * @package        Responsive
 * @author         Emil Uzelac
 * @copyright      2003 - 2013 ThemeID
 * @license        license.txt
 * @version        Release: 1.1
 * @filesource     wp-content/themes/responsive/single-faq.php
 * @link           http://codex.wordpress.org/Theme_Development#Archive_.28archive.php.29
 * @since          available since Release 1.0
 */

get_header(); ?>

<div id="content" class="grid col-940">

	<img class="top-hanger" src="<?php echo get_stylesheet_directory_uri(); ?>/images/container-top.png" width="815" height="136">
	
	<div class="image-container">
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/FAQ.png" width="734" height="156" />
	</div>

	<h1>FAQ</h1>

	<?php

	$args = array(
		'post_type' => 'faq',
		'category_name' => 'about-our-products',
		'posts_per_page' => -1
	);
	// the query
	$the_query = new WP_Query( $args ); ?>

	<?php if( $the_query->have_posts() ) : ?>

		<div class="post-entry">

			<h6>About Our Products</h6>

			<div id="accordion-products">

				<?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>

					<h3><?php the_title(); ?></h3>

					<div class="faq-entry">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="pagination">' . __( 'Pages:', 'responsive' ), 'after' => '</div>' ) ); ?>
					</div>
					<!-- end of .faq-entry -->

				<?php endwhile; ?>

			</div>

		</div>
	
	<?php
	else :

		get_template_part( 'loop-no-posts' );

	endif;
	?>

	<?php wp_reset_postdata(); ?>

	<?php

	$args = array(
		'post_type' => 'faq',
		'category_name' => 'about-delivery',
		'posts_per_page' => -1
	);
	// the query
	$the_query = new WP_Query( $args ); ?>

	<?php if( $the_query->have_posts() ) : ?>

		<div class="post-entry">

			<h6>About Delivery</h6>

			<div id="accordion-delivery">

				<?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>

					<h3><?php the_title(); ?></h3>

					<div class="faq-entry">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="pagination">' . __( 'Pages:', 'responsive' ), 'after' => '</div>' ) ); ?>
					</div>
					<!-- end of .faq-entry -->

				<?php endwhile; ?>

			</div>

		</div>
	
	<?php
	else :

		get_template_part( 'loop-no-posts' );

	endif;
	?>

</div><!-- end of #content-archive -->

<?php get_footer(); ?>
