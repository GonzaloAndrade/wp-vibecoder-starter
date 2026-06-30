<?php
/**
 * Home page template.
 *
 * @package WP_Vibecoder_Starter
 */

get_header();
?>

<main id="primary" class="site-main">
	<section class="hero" id="top">
		<div class="site-container hero__grid">
			<div class="hero__copy">
				<h1><?php esc_html_e( 'Create WordPress themes', 'wp-vibecoder-starter' ); ?> <span><?php esc_html_e( 'with AI', 'wp-vibecoder-starter' ); ?></span></h1>
				<p class="hero__lead"><?php esc_html_e( 'Connect your repo, work with AI agents like Codex or Claude, and sync validated changes to WordPress with backups, preview, and one-click updates.', 'wp-vibecoder-starter' ); ?></p>
				<div class="hero__actions" aria-label="<?php esc_attr_e( 'Primary actions', 'wp-vibecoder-starter' ); ?>">
					<div class="download-cta">
						<a class="button-link button-link--primary" href="<?php echo esc_url( home_url( '/vibecoder-theme-sync-v1.0.zip' ) ); ?>" download><span aria-hidden="true">↓</span><?php esc_html_e( 'Download', 'wp-vibecoder-starter' ); ?></a>
						<em><?php esc_html_e( 'v1.0.0', 'wp-vibecoder-starter' ); ?></em>
					</div>
				</div>
				<ul class="hero__proof" aria-label="<?php esc_attr_e( 'Product highlights', 'wp-vibecoder-starter' ); ?>">
					<li><strong><?php esc_html_e( 'No FTP required', 'wp-vibecoder-starter' ); ?></strong><span><?php esc_html_e( '100% Git-based', 'wp-vibecoder-starter' ); ?></span></li>
					<li><strong><?php esc_html_e( 'Auto backup', 'wp-vibecoder-starter' ); ?></strong><span><?php esc_html_e( 'Before every sync', 'wp-vibecoder-starter' ); ?></span></li>
					<li><strong><?php esc_html_e( 'Theme validation', 'wp-vibecoder-starter' ); ?></strong><span><?php esc_html_e( 'Safer updates', 'wp-vibecoder-starter' ); ?></span></li>
					<li><strong><?php esc_html_e( 'Works with AI', 'wp-vibecoder-starter' ); ?></strong><span><?php esc_html_e( 'Codex, Claude & more', 'wp-vibecoder-starter' ); ?></span></li>
				</ul>
				<div class="hero__social-proof" aria-label="<?php esc_attr_e( 'Early access note', 'wp-vibecoder-starter' ); ?>">
					<div class="avatar-stack">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/developer-1.png' ); ?>" alt="<?php esc_attr_e( 'Developer using WP Vibecoder', 'wp-vibecoder-starter' ); ?>">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/developer-2.png' ); ?>" alt="<?php esc_attr_e( 'Developer using WP Vibecoder', 'wp-vibecoder-starter' ); ?>">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/developer-3.png' ); ?>" alt="<?php esc_attr_e( 'Developer using WP Vibecoder', 'wp-vibecoder-starter' ); ?>">
					</div>
					<p><em aria-hidden="true">★★★★★</em><strong><?php esc_html_e( 'Loved by Developers and Agencies', 'wp-vibecoder-starter' ); ?></strong><span><?php esc_html_e( 'Building faster with WP Vibecoder', 'wp-vibecoder-starter' ); ?></span></p>
				</div>
			</div>
			<div class="product-visual" aria-label="<?php esc_attr_e( 'WP Vibecoder workflow preview', 'wp-vibecoder-starter' ); ?>">
				<div class="product-visual__bar">
					<span></span>
					<span></span>
					<span></span>
					<strong><?php esc_html_e( 'WP Vibecoder', 'wp-vibecoder-starter' ); ?></strong>
				</div>
				<div class="product-visual__body">
					<div class="visual-pipeline" aria-hidden="true">
						<div class="pipeline-step is-connected">
							<span><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/agents/github.svg' ); ?>" alt=""></span>
							<strong><?php esc_html_e( 'Connect GitHub', 'wp-vibecoder-starter' ); ?></strong>
							<small><?php esc_html_e( 'Connected', 'wp-vibecoder-starter' ); ?></small>
						</div>
						<div class="pipeline-arrow"></div>
						<div class="pipeline-step is-agent">
							<span class="codex-logo" aria-hidden="true"></span>
							<strong><?php esc_html_e( 'AI Agent', 'wp-vibecoder-starter' ); ?></strong>
							<small><?php esc_html_e( 'Codex', 'wp-vibecoder-starter' ); ?></small>
						</div>
						<div class="pipeline-arrow"></div>
						<div class="pipeline-step is-wp">
							<span><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/agents/wordpress.svg' ); ?>" alt=""></span>
							<strong><?php esc_html_e( 'Sync to WordPress', 'wp-vibecoder-starter' ); ?></strong>
							<small><?php esc_html_e( 'Synced', 'wp-vibecoder-starter' ); ?></small>
						</div>
					</div>
					<div class="visual-dashboard">
						<div class="visual-code-card">
							<div class="visual-card-tabs">
								<span class="visual-vscode-badge"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/agents/vscode.svg' ); ?>" alt=""></span>
								<span><?php esc_html_e( 'Changes', 'wp-vibecoder-starter' ); ?></span>
								<span><?php esc_html_e( 'Commits', 'wp-vibecoder-starter' ); ?></span>
							</div>
							<div class="visual-file-tabs">
								<span><?php esc_html_e( 'header.php', 'wp-vibecoder-starter' ); ?></span>
								<span><?php esc_html_e( 'style.css', 'wp-vibecoder-starter' ); ?></span>
								<span><?php esc_html_e( 'functions.php', 'wp-vibecoder-starter' ); ?></span>
							</div>
							<pre><code><span><em>1</em>  &lt;<b>header</b> <i>class</i>=<mark>"site-header"</mark>&gt;</span>
<span><em>2</em>    &lt;<b>div</b> <i>class</i>=<mark>"container"</mark>&gt;</span>
<span><em>3</em>      &lt;<b>a</b> <i>href</i>=<mark>"/"</mark> <i>class</i>=<mark>"logo"</mark>&gt;</span>
<span><em>4</em>        &lt;<b>img</b> <i>src</i>=<mark>"logo.svg"</mark> /&gt;</span>
<span><em>5</em>      &lt;/<b>a</b>&gt;</span>
<span><em>6</em>    &lt;/<b>div</b>&gt;</span>
<span><em>7</em>  &lt;/<b>header</b>&gt;</span></code></pre>
							<div class="visual-commit-row">
								<img class="visual-avatar" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/developer-1.png' ); ?>" alt="">
								<div>
									<strong><?php esc_html_e( 'Update header layout', 'wp-vibecoder-starter' ); ?></strong>
									<small><?php esc_html_e( 'by codex-agent', 'wp-vibecoder-starter' ); ?></small>
								</div>
								<em><?php esc_html_e( '2m ago', 'wp-vibecoder-starter' ); ?></em>
							</div>
						</div>
						<div class="visual-preview-card">
							<strong><?php esc_html_e( 'Preview', 'wp-vibecoder-starter' ); ?></strong>
							<div class="mini-browser">
								<div class="mini-browser__nav">
									<span><?php esc_html_e( 'Your logo', 'wp-vibecoder-starter' ); ?></span>
									<em><?php esc_html_e( 'Home About Services', 'wp-vibecoder-starter' ); ?></em>
								</div>
								<div class="mini-browser__hero">
									<h3><?php esc_html_e( 'Build anything with WordPress', 'wp-vibecoder-starter' ); ?></h3>
									<p><?php esc_html_e( 'Fast. Safe. Powered by AI.', 'wp-vibecoder-starter' ); ?></p>
									<span><?php esc_html_e( 'Learn more', 'wp-vibecoder-starter' ); ?></span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="product-visual__footer">
					<span class="branch-pill"><?php esc_html_e( 'main', 'wp-vibecoder-starter' ); ?></span>
					<span class="sync-pill"><?php esc_html_e( 'Sync to WordPress', 'wp-vibecoder-starter' ); ?></span>
				</div>
			</div>
		</div>
	</section>

	<section id="workflow" class="site-container section-block">
		<div class="section-heading">
			<p class="eyebrow"><?php esc_html_e( 'Plugin walkthrough', 'wp-vibecoder-starter' ); ?></p>
			<h2><?php esc_html_e( 'From setup to live theme', 'wp-vibecoder-starter' ); ?></h2>
		</div>
		<div class="workflow-tour">
			<article class="workflow-step workflow-step--wide">
				<div class="workflow-step__copy">
					<span>01</span>
					<h3><?php esc_html_e( 'Setup', 'wp-vibecoder-starter' ); ?></h3>
					<p><?php esc_html_e( 'Install the plugin, authorize GitHub permissions, and optionally download the starter theme ZIP to review or customize locally.', 'wp-vibecoder-starter' ); ?></p>
				</div>
				<div class="workflow-shot workflow-shot--setup">
					<a class="workflow-lightbox" href="<?php echo esc_url( get_template_directory_uri() . '/assets/images/workflow/01-setup.jpg' ); ?>" data-gallery="wpv-workflow">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/workflow/01-setup.jpg' ); ?>" alt="<?php esc_attr_e( 'WP Vibecoder setup screen with GitHub and starter template options.', 'wp-vibecoder-starter' ); ?>" loading="lazy" decoding="async">
					</a>
				</div>
			</article>
			<article class="workflow-step">
				<div class="workflow-step__copy">
					<span>02</span>
					<h3><?php esc_html_e( 'Create the repo', 'wp-vibecoder-starter' ); ?></h3>
					<p><?php esc_html_e( 'Name the project and let the plugin create a starter repository, or connect an existing GitHub repo by pasting its link.', 'wp-vibecoder-starter' ); ?></p>
				</div>
				<div class="workflow-shot workflow-shot--repo workflow-shot--pair">
					<a class="workflow-lightbox" href="<?php echo esc_url( get_template_directory_uri() . '/assets/images/workflow/02-create-repo.jpg' ); ?>" data-gallery="wpv-workflow">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/workflow/02-create-repo.jpg' ); ?>" alt="<?php esc_attr_e( 'Repository creation form with GitHub connected.', 'wp-vibecoder-starter' ); ?>" loading="lazy" decoding="async">
					</a>
					<a class="workflow-lightbox" href="<?php echo esc_url( get_template_directory_uri() . '/assets/images/workflow/02-repo-progress.jpg' ); ?>" data-gallery="wpv-workflow">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/workflow/02-repo-progress.jpg' ); ?>" alt="<?php esc_attr_e( 'Repository creation progress dialog.', 'wp-vibecoder-starter' ); ?>" loading="lazy" decoding="async">
					</a>
				</div>
			</article>
			<article class="workflow-step">
				<div class="workflow-step__copy">
					<span>03</span>
					<h3><?php esc_html_e( 'Open the branch', 'wp-vibecoder-starter' ); ?></h3>
					<p><?php esc_html_e( 'Open the repository branch in Visual Studio Code, Codex, Claude, Cursor, or the AI workspace you prefer.', 'wp-vibecoder-starter' ); ?></p>
				</div>
				<div class="workflow-shot workflow-shot--agent">
					<a class="workflow-lightbox" href="<?php echo esc_url( get_template_directory_uri() . '/assets/images/workflow/03-open-agent.jpg' ); ?>" data-gallery="wpv-workflow">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/workflow/03-open-agent.jpg' ); ?>" alt="<?php esc_attr_e( 'AI agent selection and launch options inside WP Vibecoder.', 'wp-vibecoder-starter' ); ?>" loading="lazy" decoding="async">
					</a>
				</div>
			</article>
			<article class="workflow-step workflow-step--wide">
				<div class="workflow-step__copy">
					<span>04</span>
					<h3><?php esc_html_e( 'Vibecode in your editor', 'wp-vibecoder-starter' ); ?></h3>
					<p><?php esc_html_e( 'The agent reads the project structure, edits the theme and preview, and can run the bundled scripts to generate the final screenshot.', 'wp-vibecoder-starter' ); ?></p>
				</div>
				<div class="workflow-shot workflow-shot--editor">
					<a class="workflow-lightbox" href="<?php echo esc_url( get_template_directory_uri() . '/assets/images/workflow/04-vibecode-editor.jpg' ); ?>" data-gallery="wpv-workflow">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/workflow/04-vibecode-editor.jpg' ); ?>" alt="<?php esc_attr_e( 'Visual Studio Code workspace with Codex editing a WP Vibecoder project.', 'wp-vibecoder-starter' ); ?>" loading="lazy" decoding="async">
					</a>
				</div>
			</article>
			<article class="workflow-step">
				<div class="workflow-step__copy">
					<span>05</span>
					<h3><?php esc_html_e( 'Sync the commit', 'wp-vibecoder-starter' ); ?></h3>
					<p><?php esc_html_e( 'After the commit is pushed, WP Vibecoder detects the update automatically. Press Sync to import the latest theme.', 'wp-vibecoder-starter' ); ?></p>
				</div>
				<div class="workflow-shot workflow-shot--sync">
					<a class="workflow-lightbox" href="<?php echo esc_url( get_template_directory_uri() . '/assets/images/workflow/05-sync-main.jpg' ); ?>" data-gallery="wpv-workflow">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/workflow/05-sync-main.jpg' ); ?>" alt="<?php esc_attr_e( 'WP Vibecoder sync panel showing a new commit detected.', 'wp-vibecoder-starter' ); ?>" loading="lazy" decoding="async">
					</a>
				</div>
			</article>
			<article class="workflow-step">
				<div class="workflow-step__copy">
					<span>06</span>
					<h3><?php esc_html_e( 'Activate the theme', 'wp-vibecoder-starter' ); ?></h3>
					<p><?php esc_html_e( 'Activate the imported WordPress theme once validation, backup, and installation have completed.', 'wp-vibecoder-starter' ); ?></p>
				</div>
				<div class="workflow-shot workflow-shot--activate">
					<a class="workflow-lightbox" href="<?php echo esc_url( get_template_directory_uri() . '/assets/images/workflow/06-setup-complete.jpg' ); ?>" data-gallery="wpv-workflow">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/workflow/06-setup-complete.jpg' ); ?>" alt="<?php esc_attr_e( 'WP Vibecoder setup complete screen with the imported theme applied.', 'wp-vibecoder-starter' ); ?>" loading="lazy" decoding="async">
					</a>
				</div>
			</article>
			<article class="workflow-step workflow-step--wide workflow-step--live">
				<div class="workflow-step__copy">
					<span>07</span>
					<h3><?php esc_html_e( 'Live theme', 'wp-vibecoder-starter' ); ?></h3>
					<p><?php esc_html_e( 'The synced theme is live in WordPress, with the new homepage and managed pages.', 'wp-vibecoder-starter' ); ?></p>
				</div>
				<div class="workflow-shot workflow-shot--live">
					<a class="workflow-lightbox" href="<?php echo esc_url( get_template_directory_uri() . '/assets/images/workflow/07-live-theme.jpg' ); ?>" data-gallery="wpv-workflow">
						<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/workflow/07-live-theme.jpg' ); ?>" alt="<?php esc_attr_e( 'Live WordPress theme after WP Vibecoder sync.', 'wp-vibecoder-starter' ); ?>" loading="lazy" decoding="async">
					</a>
				</div>
			</article>
		</div>
	</section>

	<section id="agents" class="agent-band">
		<div class="site-container agent-band__inner">
			<div class="section-heading section-heading--compact">
				<p class="eyebrow"><?php esc_html_e( 'Your agent, your workflow', 'wp-vibecoder-starter' ); ?></p>
				<h2><?php esc_html_e( 'Built for the tools developers already use to vibecode.', 'wp-vibecoder-starter' ); ?></h2>
			</div>
			<div class="agent-grid" aria-label="<?php esc_attr_e( 'Compatible coding agents', 'wp-vibecoder-starter' ); ?>">
				<span class="agent-card">
					<span class="agent-card__mark"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/agents/openai.svg' ); ?>" alt="" loading="lazy" decoding="async"></span>
					<strong><?php esc_html_e( 'Codex', 'wp-vibecoder-starter' ); ?></strong>
				</span>
				<span class="agent-card">
					<span class="agent-card__mark"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/agents/anthropic.svg' ); ?>" alt="" loading="lazy" decoding="async"></span>
					<strong><?php esc_html_e( 'Claude Code', 'wp-vibecoder-starter' ); ?></strong>
				</span>
				<span class="agent-card">
					<span class="agent-card__mark"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/agents/cursor.svg' ); ?>" alt="" loading="lazy" decoding="async"></span>
					<strong><?php esc_html_e( 'Cursor', 'wp-vibecoder-starter' ); ?></strong>
				</span>
				<span class="agent-card">
					<span class="agent-card__mark"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/agents/gemini.svg' ); ?>" alt="" loading="lazy" decoding="async"></span>
					<strong><?php esc_html_e( 'Gemini', 'wp-vibecoder-starter' ); ?></strong>
				</span>
			</div>
		</div>
	</section>

	<section id="safety" class="site-container section-block section-block--split">
		<div class="section-heading">
			<p class="eyebrow"><?php esc_html_e( 'Controlled sync', 'wp-vibecoder-starter' ); ?></p>
			<h2><?php esc_html_e( 'Build faster with AI. Ship safely to WordPress.', 'wp-vibecoder-starter' ); ?></h2>
		</div>
		<div class="feature-list">
			<div class="feature-card">
				<div class="feature-card__visual">
					<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/features/agentic.png' ); ?>" alt="<?php esc_attr_e( 'AI agent reading AGENTS.md and the expected project structure.', 'wp-vibecoder-starter' ); ?>" loading="lazy" decoding="async">
				</div>
				<div class="feature-card__copy">
					<strong><?php esc_html_e( 'Agentic compatibility', 'wp-vibecoder-starter' ); ?></strong>
					<p><?php esc_html_e( 'Each repo includes AGENTS.md so your AI agent understands the expected WordPress theme structure before editing.', 'wp-vibecoder-starter' ); ?></p>
				</div>
			</div>
			<div class="feature-card">
				<div class="feature-card__visual">
					<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/features/backups.png' ); ?>" alt="<?php esc_attr_e( 'ZIP backup archive created before syncing files.', 'wp-vibecoder-starter' ); ?>" loading="lazy" decoding="async">
				</div>
				<div class="feature-card__copy">
					<strong><?php esc_html_e( 'Theme-file backups', 'wp-vibecoder-starter' ); ?></strong>
					<p><?php esc_html_e( 'A ZIP backup is created before replacing managed theme files during sync.', 'wp-vibecoder-starter' ); ?></p>
				</div>
			</div>
			<div class="feature-card">
				<div class="feature-card__visual">
					<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/features/pages.png' ); ?>" alt="<?php esc_attr_e( 'WordPress Pages admin list with native pages created by the agent.', 'wp-vibecoder-starter' ); ?>" loading="lazy" decoding="async">
				</div>
				<div class="feature-card__copy">
					<strong><?php esc_html_e( 'Managed pages', 'wp-vibecoder-starter' ); ?></strong>
					<p><?php esc_html_e( 'Ask the agent to create native WordPress pages, then use them with SEO plugins and the rest of your WordPress stack.', 'wp-vibecoder-starter' ); ?></p>
				</div>
			</div>
			<p class="feature-list__note"><?php esc_html_e( 'More native WordPress compatibility is coming in future versions.', 'wp-vibecoder-starter' ); ?></p>
		</div>
	</section>

	<section class="cta-band">
		<div class="site-container cta-band__inner">
			<p class="eyebrow"><?php esc_html_e( 'First release', 'wp-vibecoder-starter' ); ?></p>
			<h2><?php esc_html_e( 'Connect GitHub, build with your AI agent, then sync the finished theme to WordPress.', 'wp-vibecoder-starter' ); ?></h2>
			<a class="button-link button-link--primary" href="#top"><?php esc_html_e( 'Back to top', 'wp-vibecoder-starter' ); ?></a>
		</div>
	</section>
</main>

<?php
get_footer();
