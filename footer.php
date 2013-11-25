<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Footer Template
 *
 *
 * @file           footer.php
 * @package        Responsive 
 * @author         Emil Uzelac 
 * @copyright      2003 - 2013 ThemeID
 * @license        license.txt
 * @version        Release: 1.2
 * @filesource     wp-content/themes/responsive/footer.php
 * @link           http://codex.wordpress.org/Theme_Development#Footer_.28footer.php.29
 * @since          available since Release 1.0
 */

/* 
 * Globalize Theme options
 */
global $responsive_options;
$responsive_options = responsive_get_options();
?>
		<?php responsive_wrapper_bottom(); // after wrapper content hook ?>
    </div><!-- end of #wrapper -->
    <?php responsive_wrapper_end(); // after wrapper hook ?>
</div><!-- end of #container -->
<?php responsive_container_end(); // after container hook ?>

<div id="footer" class="clearfix">
	<?php responsive_footer_top(); ?>
	
	<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/footer-top.png" width="815" height="25" />

    <div id="footer-wrapper">
    
        <div class="grid col-940">
        
        <div class="grid col-620">
		<?php if (has_nav_menu('footer-menu', 'responsive')) { ?>
	        <?php wp_nav_menu(array(
				    'container'       => '',
					'fallback_cb'	  =>  false,
					'link_after'      => '<span>/</span>',
					'menu_class'      => 'footer-menu',
					'theme_location'  => 'footer-menu')
					); 
				?>
         <?php } ?>
         </div><!-- end of col-620 -->
         
         <div class="networks grid-right col-220 fit">
         	<ul class="social-icons">
         		<li class="facebook-icon"><a href="https://www.facebook.com/MyLittleSweetpea" target="_blank"><img src="<?php echo get_stylesheet_directory_uri() ?>/images/facebook.png" alt="facebook" width="34" height="30" /></a></li>
         		<li class="pinterest-icon"><a href="http://www.pinterest.com/info0245/boards/" target="_blank"><img src="<?php echo get_stylesheet_directory_uri() ?>/images/pinterest.png" alt="pinterest" width="34" height="30" /></a></li>
         		<li class="twitter-icon"><a href="https://twitter.com/MLSweetpea" target="_blank"><img src="<?php echo get_stylesheet_directory_uri() ?>/images/twitter.png" width="30" height="34" alt="Twitter"></a></li>
         		<li class="email-icon"><a href="mailto:info@mylittlesweetpea.com.au"><img src="<?php echo get_stylesheet_directory_uri() ?>/images/email.png" width="30" height="34" alt="Twitter"></a></li>
         	</ul><!-- end of .social-icons -->
         </div><!-- end of col-140 fit -->
         
         </div><!-- end of col-940 -->
         <?php get_sidebar('colophon'); ?>
                
        <div class="grid col-940 copyright">
            <a href="mailto:info@mylittlesweetpea.com.au" target="_top">info@mylittlesweetpea.com.au</a>&nbsp;&nbsp;phone:0420-239905&nbsp;&nbsp;copyright 2013 my little sweetpea&nbsp;&nbsp;&nbsp;design by <a href="http://hottadesigns.com" target="_blank">hottadesigns.com</a>
        
    </div><!-- end #footer-wrapper -->
    
	<?php responsive_footer_bottom(); ?>
</div><!-- end #footer -->
<?php responsive_footer_after(); ?>

<?php wp_footer(); ?>
</body>
</html>