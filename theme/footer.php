<?php
/**
 * Site footer.
 *
 * @package WP_Vibecoder_Starter
 */
?>
<footer class="site-footer">
	<div class="site-container site-footer__inner">
		<a class="site-brand site-brand--footer" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php esc_attr_e( 'WP Vibecoder home', 'wp-vibecoder-starter' ); ?>">
			<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/vibecoder-mark.svg' ); ?>" alt="" width="30" height="30">
			<span><?php esc_html_e( 'WP Vibecoder', 'wp-vibecoder-starter' ); ?></span>
		</a>
		<div class="site-footer__meta">
			<p>
				<?php
				printf(
					/* translators: %s: Current year. */
					esc_html__( '© %s Doxi. Built for GitHub-powered WordPress workflows.', 'wp-vibecoder-starter' ),
					esc_html( wp_date( 'Y' ) )
			);
			?>
		</p>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
