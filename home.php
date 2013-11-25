<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Blog Template
 *
 * @file           home.php
 * @package        Responsive 
 * @author         Emil Uzelac 
 * @copyright      2003 - 2013 ThemeID
 * @license        license.txt
 * @version        Release: 1.1.0
 * @filesource     wp-content/themes/responsive/home.php
 * @link           http://codex.wordpress.org/Templates
 * @since          available since Release 1.0
 */

get_header(); 

global $more; $more = 0; 

?>

<div id="content-blog" class="grid col-940">

	<img class="top-hanger" src="<?php echo get_stylesheet_directory_uri(); ?>/images/container-top.png" width="815" height="136" />

	<?php $query = new WP_Query( 'category_name=home slideshow' ); ?>
        
	<?php if ($query->have_posts()) : ?>
		
		<div id="homepage-slideshow">
		
			<div id="slideshow-container" class="liquid-slider">
	
			<?php while ($query->have_posts()) : $query->the_post(); ?>
	        
				<?php responsive_entry_before(); ?>
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>       
					<?php responsive_entry_top(); ?>
					
					<div class="post-entry">
						<div class="thumbnail grid">
							<?php if ( has_post_thumbnail()) : ?>
								<?php the_post_thumbnail('homepage-thumb'); ?>
							<?php endif; ?>
						</div>
						<div class="text grid-right">
							<h1><?php the_title(); ?></h1>
							<?php the_content(); ?>
						</div>
					</div><!-- end of .post-entry -->
					               
					<?php responsive_entry_bottom(); ?>      
				</div><!-- end of #post-<?php the_ID(); ?> -->       
				<?php responsive_entry_after(); ?>
				
			<?php endwhile; ?>
			
			</div>
		
		</div>

		<?php
		get_template_part( 'loop-nav' ); 

	else : 

		get_template_part( 'loop-no-posts' ); 

	endif; 
	?>  
	
	<?php wp_reset_postdata(); ?>


	<?php $query = new WP_Query( 'category_name=home' ); ?>
        
	<?php if ($query->have_posts()) : ?>

		<?php while ($query->have_posts()) : $query->the_post(); ?>
        
			<?php responsive_entry_before(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class('final-post'); ?>>       
				<?php responsive_entry_top(); ?>
				
				<h3><?php the_title(); ?></h3>
				
				<div class="post-entry">
					<?php if ( has_post_thumbnail()) : ?>
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
							<?php the_post_thumbnail(); ?>
						</a>
					<?php endif; ?>
					<?php the_content(); ?>
				</div><!-- end of .post-entry -->
				               
				<?php responsive_entry_bottom(); ?>      
			</div><!-- end of #post-<?php the_ID(); ?> -->       
			<?php responsive_entry_after(); ?>
			
		<?php 
		endwhile;

		get_template_part( 'loop-nav' ); 

	else : 

		get_template_part( 'loop-no-posts' ); 

	endif; 
	?>  
	
	<?php wp_reset_postdata(); ?>
      
</div><!-- end of #content-blog -->

<?php get_footer(); ?>