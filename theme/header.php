<?php
/**
 * Site header.
 *
 * @package WP_Vibecoder_Starter
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-K1JDZ8TXS1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'G-K1JDZ8TXS1');
	</script>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'wp-vibecoder-starter' ); ?></a>

<header class="site-header">
	<div class="site-container site-header__inner">
		<a class="site-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php esc_attr_e( 'WP Vibecoder home', 'wp-vibecoder-starter' ); ?>">
			<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/vibecoder-mark.svg' ); ?>" alt="" width="34" height="34">
			<span><?php esc_html_e( 'WP Vibecoder', 'wp-vibecoder-starter' ); ?></span>
		</a>
		<button class="menu-toggle" type="button" aria-controls="primary-menu" aria-expanded="false" aria-label="<?php esc_attr_e( 'Open menu', 'wp-vibecoder-starter' ); ?>">
			<span></span>
			<span></span>
			<span></span>
		</button>
		<nav id="primary-menu" class="site-nav" aria-label="<?php esc_attr_e( 'Primary navigation', 'wp-vibecoder-starter' ); ?>">
			<a href="<?php echo esc_url( home_url( '/#workflow' ) ); ?>"><?php esc_html_e( 'How it works', 'wp-vibecoder-starter' ); ?></a>
			<a href="<?php echo esc_url( home_url( '/#agents' ) ); ?>"><?php esc_html_e( 'Agents', 'wp-vibecoder-starter' ); ?></a>
			<a href="<?php echo esc_url( home_url( '/#safety' ) ); ?>"><?php esc_html_e( 'Features', 'wp-vibecoder-starter' ); ?></a>
			<a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>"><?php esc_html_e( 'Privacy Policy', 'wp-vibecoder-starter' ); ?></a>
		</nav>
		<a class="site-github-link" href="https://github.com/GonzaloAndrade/wp-vibecoder-starter" target="_blank" rel="noopener noreferrer">
			<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/agents/github.svg' ); ?>" alt="" width="20" height="20">
			<span><?php esc_html_e( 'Star on GitHub', 'wp-vibecoder-starter' ); ?></span>
		</a>
	</div>
</header>
