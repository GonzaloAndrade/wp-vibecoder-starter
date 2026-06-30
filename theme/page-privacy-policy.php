<?php
/**
 * Privacy Policy page.
 *
 * @package WP_Vibecoder_Starter
 */

get_header();
?>

<main id="primary" class="site-main legal-page">
	<section class="site-container legal-page__inner">
		<p class="eyebrow"><?php esc_html_e( 'Privacy', 'wp-vibecoder-starter' ); ?></p>
		<h1><?php esc_html_e( 'Privacy Policy', 'wp-vibecoder-starter' ); ?></h1>
		<p class="legal-page__lead"><?php esc_html_e( 'This Privacy Policy explains how WP Vibecoder handles information across this website and the plugin workflow that connects WordPress, GitHub, and AI-assisted theme development.', 'wp-vibecoder-starter' ); ?></p>

		<div class="legal-page__content">
			<section>
				<h2><?php esc_html_e( 'Who we are', 'wp-vibecoder-starter' ); ?></h2>
				<p><?php esc_html_e( 'WP Vibecoder is created by Doxi Tech Agency, a technology agency that builds WordPress and AI-assisted development tools.', 'wp-vibecoder-starter' ); ?></p>
				<p><a href="<?php echo esc_url( 'https://www.doxi.la/en' ); ?>" rel="noopener"><?php esc_html_e( 'www.doxi.la/en', 'wp-vibecoder-starter' ); ?></a></p>
			</section>

			<section>
				<h2><?php esc_html_e( 'Information collected on this website', 'wp-vibecoder-starter' ); ?></h2>
				<p><?php esc_html_e( 'This website may collect basic technical information such as browser type, device information, pages visited, referral source, and approximate usage patterns through analytics tools.', 'wp-vibecoder-starter' ); ?></p>
				<p><?php esc_html_e( 'If you contact Doxi Tech Agency or request support, we may receive the information you choose to provide, such as your name, company, email address, message, and product context.', 'wp-vibecoder-starter' ); ?></p>
			</section>

			<section>
				<h2><?php esc_html_e( 'Analytics and cookies', 'wp-vibecoder-starter' ); ?></h2>
				<p><?php esc_html_e( 'This site uses Google Analytics through the Google tag to understand aggregate product-site usage, such as page views, traffic sources, and general interaction patterns.', 'wp-vibecoder-starter' ); ?></p>
				<p><?php esc_html_e( 'Analytics data is used to improve the documentation, onboarding flow, product messaging, and overall site experience for WP Vibecoder.', 'wp-vibecoder-starter' ); ?></p>
			</section>

			<section>
				<h2><?php esc_html_e( 'Plugin and GitHub workflow data', 'wp-vibecoder-starter' ); ?></h2>
				<p><?php esc_html_e( 'WP Vibecoder connects a WordPress installation with GitHub repositories so site owners can create, connect, validate, and sync WordPress themes. When you authorize GitHub, GitHub may share account and repository information required for the actions you approve.', 'wp-vibecoder-starter' ); ?></p>
				<p><?php esc_html_e( 'The plugin uses repository access to perform requested workflow actions such as creating a starter repository, detecting commits, downloading theme files, validating the project contract, creating backups, and installing or updating managed theme files.', 'wp-vibecoder-starter' ); ?></p>
			</section>

			<section>
				<h2><?php esc_html_e( 'WordPress site data', 'wp-vibecoder-starter' ); ?></h2>
				<p><?php esc_html_e( 'Inside WordPress, WP Vibecoder may store configuration needed to operate the workflow, including connected repository details, selected theme information, sync state, backup references, logs, and page declarations managed by the project.', 'wp-vibecoder-starter' ); ?></p>
				<p><?php esc_html_e( 'The plugin is intended to be controlled by authorized WordPress administrators. Site owners are responsible for reviewing repository permissions, connected accounts, synced files, and any content generated with AI agents before publishing.', 'wp-vibecoder-starter' ); ?></p>
			</section>

			<section>
				<h2><?php esc_html_e( 'Third-party services', 'wp-vibecoder-starter' ); ?></h2>
				<p><?php esc_html_e( 'WP Vibecoder workflows may involve third-party services including GitHub for repository hosting, Google Analytics for website analytics, WordPress and the site hosting provider for runtime storage, and optional AI coding agents chosen by the user.', 'wp-vibecoder-starter' ); ?></p>
				<p><?php esc_html_e( 'Each third-party service handles information according to its own privacy policy, account settings, and authorization model.', 'wp-vibecoder-starter' ); ?></p>
			</section>

			<section>
				<h2><?php esc_html_e( 'How information is used', 'wp-vibecoder-starter' ); ?></h2>
				<p><?php esc_html_e( 'Information is used to provide the website, operate the plugin workflow, improve onboarding and support, diagnose sync or validation issues, protect against misuse, and maintain product reliability.', 'wp-vibecoder-starter' ); ?></p>
			</section>

			<section>
				<h2><?php esc_html_e( 'Your choices', 'wp-vibecoder-starter' ); ?></h2>
				<p><?php esc_html_e( 'You can disconnect GitHub access from the plugin, revoke GitHub authorization from your GitHub account settings, disable or remove the plugin from WordPress, and use browser or consent controls to limit analytics where available.', 'wp-vibecoder-starter' ); ?></p>
			</section>

			<section>
				<h2><?php esc_html_e( 'Contact', 'wp-vibecoder-starter' ); ?></h2>
				<p><?php esc_html_e( 'For privacy questions about WP Vibecoder, contact Doxi Tech Agency through its website.', 'wp-vibecoder-starter' ); ?></p>
				<p><a href="<?php echo esc_url( 'https://www.doxi.la/en' ); ?>" rel="noopener"><?php esc_html_e( 'www.doxi.la/en', 'wp-vibecoder-starter' ); ?></a></p>
			</section>

			<section>
				<h2><?php esc_html_e( 'Updates to this policy', 'wp-vibecoder-starter' ); ?></h2>
				<p><?php esc_html_e( 'This policy may be updated as WP Vibecoder adds new integrations, WordPress compatibility features, or data-handling options.', 'wp-vibecoder-starter' ); ?></p>
			</section>
		</div>
	</section>
</main>

<?php
get_footer();
