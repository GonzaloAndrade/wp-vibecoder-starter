<?php
/**
 * Theme setup and assets.
 *
 * @package WP_Vibecoder_Starter
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'WP_VIBECODER_STARTER_VERSION', '1.0' );

/**
 * Configure supported WordPress features.
 */
function wp_vibecoder_starter_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 80,
			'width'       => 240,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);
}
add_action( 'after_setup_theme', 'wp_vibecoder_starter_setup' );

/**
 * Print SEO, social sharing, and structured-data metadata.
 */
function wp_vibecoder_starter_seo_meta() {
	$site_name = 'WP Vibecoder';
	$keywords  = 'create wordpress websites with AI, create wordpress themes with AI, create wordpress templates with AI, AI WordPress builder, WordPress AI theme generator, AI website builder for WordPress, vibecode WordPress, GitHub WordPress deployment, WordPress theme sync, WordPress templates with GitHub';
	$image     = get_template_directory_uri() . '/screenshot.png';

	if ( is_page( 'privacy-policy' ) ) {
		$title       = 'Privacy Policy | WP Vibecoder';
		$description = 'Read how WP Vibecoder handles website analytics, GitHub workflow data, WordPress plugin configuration, and privacy choices.';
		$canonical   = get_permalink();
	} else {
		$title       = 'WP Vibecoder | Create WordPress Themes with AI';
		$description = 'Create WordPress websites, themes, and templates with AI agents like Codex and Claude, then sync validated GitHub changes to WordPress.';
		$canonical   = home_url( '/' );
	}

	$canonical = $canonical ? $canonical : home_url( '/' );
	$json_ld   = array(
		'@context'        => 'https://schema.org',
		'@type'           => 'SoftwareApplication',
		'name'            => $site_name,
		'applicationCategory' => 'DeveloperApplication',
		'operatingSystem' => 'WordPress',
		'description'     => $description,
		'url'             => home_url( '/' ),
		'image'           => $image,
		'creator'         => array(
			'@type' => 'Organization',
			'name'  => 'Doxi Tech Agency',
			'url'   => 'https://www.doxi.la/en',
		),
		'offers'          => array(
			'@type' => 'Offer',
			'price' => '0',
			'priceCurrency' => 'USD',
		),
		'keywords'        => $keywords,
	);
	?>
	<meta name="description" content="<?php echo esc_attr( $description ); ?>">
	<meta name="keywords" content="<?php echo esc_attr( $keywords ); ?>">
	<meta name="robots" content="index, follow, max-image-preview:large">
	<meta name="application-name" content="<?php echo esc_attr( $site_name ); ?>">
	<meta name="apple-mobile-web-app-title" content="<?php echo esc_attr( $site_name ); ?>">
	<meta name="theme-color" content="#3157ff">
	<link rel="icon" href="<?php echo esc_url( get_template_directory_uri() . '/assets/images/favicon.svg' ); ?>" type="image/svg+xml">
	<link rel="icon" href="<?php echo esc_url( get_template_directory_uri() . '/assets/images/favicon-32x32.png' ); ?>" sizes="32x32" type="image/png">
	<link rel="apple-touch-icon" href="<?php echo esc_url( get_template_directory_uri() . '/assets/images/apple-touch-icon.png' ); ?>" sizes="180x180">
	<link rel="canonical" href="<?php echo esc_url( $canonical ); ?>">
	<meta property="og:locale" content="en_US">
	<meta property="og:type" content="website">
	<meta property="og:site_name" content="<?php echo esc_attr( $site_name ); ?>">
	<meta property="og:title" content="<?php echo esc_attr( $title ); ?>">
	<meta property="og:description" content="<?php echo esc_attr( $description ); ?>">
	<meta property="og:url" content="<?php echo esc_url( $canonical ); ?>">
	<meta property="og:image" content="<?php echo esc_url( $image ); ?>">
	<meta property="og:image:width" content="1200">
	<meta property="og:image:height" content="900">
	<meta property="og:image:alt" content="<?php esc_attr_e( 'WP Vibecoder product website preview.', 'wp-vibecoder-starter' ); ?>">
	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:title" content="<?php echo esc_attr( $title ); ?>">
	<meta name="twitter:description" content="<?php echo esc_attr( $description ); ?>">
	<meta name="twitter:image" content="<?php echo esc_url( $image ); ?>">
	<meta name="twitter:image:alt" content="<?php esc_attr_e( 'WP Vibecoder product website preview.', 'wp-vibecoder-starter' ); ?>">
	<script type="application/ld+json"><?php echo wp_json_encode( $json_ld, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ); ?></script>
	<?php
}
add_action( 'wp_head', 'wp_vibecoder_starter_seo_meta', 1 );

/**
 * Enqueue production assets.
 */
function wp_vibecoder_starter_assets() {
	wp_enqueue_style(
		'wp-vibecoder-glightbox',
		get_template_directory_uri() . '/assets/vendor/glightbox/glightbox.min.css',
		array(),
		'3.3.1'
	);

	wp_enqueue_style(
		'wp-vibecoder-starter-style',
		get_stylesheet_uri(),
		array( 'wp-vibecoder-glightbox' ),
		WP_VIBECODER_STARTER_VERSION
	);

	wp_enqueue_script(
		'wp-vibecoder-glightbox',
		get_template_directory_uri() . '/assets/vendor/glightbox/glightbox.min.js',
		array(),
		'3.3.1',
		true
	);

	wp_enqueue_script(
		'wp-vibecoder-workflow-lightbox',
		get_template_directory_uri() . '/assets/js/workflow-lightbox.js',
		array( 'wp-vibecoder-glightbox' ),
		WP_VIBECODER_STARTER_VERSION,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'wp_vibecoder_starter_assets' );
