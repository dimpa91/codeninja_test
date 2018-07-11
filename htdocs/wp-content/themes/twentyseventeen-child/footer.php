<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>

		</div><!-- #content -->

		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="wrap">
				<?php
				get_template_part( 'template-parts/footer/footer', 'widgets' );

				if ( has_nav_menu( 'social' ) ) :
				?>
					<nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Social Links Menu', 'twentyseventeen' ); ?>">
						<?php
							wp_nav_menu(
								array(
									'theme_location' => 'social',
									'menu_class'     => 'social-links-menu',
									'depth'          => 1,
									'link_before'    => '<span class="screen-reader-text">',
									'link_after'     => '</span>' . twentyseventeen_get_svg( array( 'icon' => 'chain' ) ),
								)
							);
						?>
					</nav><!-- .social-navigation -->
				<?php
				endif;
				?>
				<div class="footer-contacts">
					<a href="tel:<?php echo get_theme_mod('footer_phone'); ?>" class="footer-button mobile-visible">Call Us</a>
					<a href="mailto:<?php echo get_theme_mod('footer_email'); ?>" class="footer-button mobile-visible">Email Us</a>
					<div class="mobile-hidden">Call Us: <a href="<?php echo get_theme_mod('footer_phone'); ?>"><?php echo get_theme_mod('footer_phone'); ?></a></div>
					<div class="mobile-hidden">Email: <a href="<?php echo get_theme_mod('footer_email'); ?>"><?php echo get_theme_mod('footer_email'); ?></a></div>
					<a href="javascript:;" data-src="#contact_us_content" data-fancybox class="footer-button fancybox">Contact Us</a>
				</div>
				<?php
				get_template_part( 'template-parts/footer/site', 'info' );
				?>
			</div><!-- .wrap -->
		</footer><!-- #colophon -->
	</div><!-- .site-content-contain -->
</div><!-- #page -->

<div id="contact_us_content" style="display:none">Contuct us content</div>
<?php wp_footer(); ?>

</body>
</html>
