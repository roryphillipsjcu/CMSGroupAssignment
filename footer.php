<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BarrierReefOrchestra
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://google.com/', 'bro' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'bro' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php  printf( esc_html__( 'Theme: %1$s by %2$s.', 'bro' ), 'bro', '<a href="http://underscores.me/" rel="designer">FlyingMongoose</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
