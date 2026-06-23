<?php
/**
 * Home page template.
 *
 * @package WP_Vibecoder_Starter
 */

get_header();
?>

<main id="primary" class="site-main">
	<section class="hero">
		<div class="site-container hero__inner">
			<p class="eyebrow"><?php esc_html_e( 'WP Vibecoder Starter', 'wp-vibecoder-starter' ); ?></p>
			<h1><?php esc_html_e( 'WP Vibecoder Starter', 'wp-vibecoder-starter' ); ?></h1>
			<p><?php esc_html_e( 'A minimal starter theme for projects synchronized with WP Vibecoder.', 'wp-vibecoder-starter' ); ?></p>
			<a class="button-link" href="#landing-content"><?php esc_html_e( 'Explore the site', 'wp-vibecoder-starter' ); ?></a>
		</div>
	</section>

	<section id="landing-content" class="site-container content-section">
		<h2><?php esc_html_e( 'Build the corporate homepage here.', 'wp-vibecoder-starter' ); ?></h2>
		<p><?php esc_html_e( 'Codex should edit page-home.php whenever the homepage changes. Keep the WP Vibecoder Home page content empty.', 'wp-vibecoder-starter' ); ?></p>
	</section>
</main>

<?php
get_footer();
