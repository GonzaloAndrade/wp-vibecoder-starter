<p align="center">
  <img src="assets/wp-vibecoder-mark.svg" alt="WP Vibecoder" width="88" height="88">
</p>

<h1 align="center">WP Vibecoder Starter</h1>

<p align="center">
  A clean WordPress theme starter built for AI-assisted development and safe syncs with WP Vibecoder.
</p>

<p align="center">
  <a href="https://wpvibecoder.com">Download WP Vibecoder</a>
  ·
  <a href="#quick-start">Quick start</a>
  ·
  <a href="#structure">Structure</a>
  ·
  <a href="#validation">Validation</a>
</p>

<p align="center">
  <img alt="WordPress" src="https://img.shields.io/badge/WordPress-%3E%3D%206.0-3858e9">
  <img alt="Version" src="https://img.shields.io/badge/version-1.0-111827">
  <img alt="AI agent ready" src="https://img.shields.io/badge/AI%20agent-ready-6d5dfc">
  <img alt="GitHub workflow" src="https://img.shields.io/badge/GitHub-workflow-16a34a">
</p>

## What is this?

This is the base starter template for projects managed by the **WP Vibecoder**
plugin. The plugin can be downloaded from [wpvibecoder.com](https://wpvibecoder.com).

The starter gives Codex, Claude Code, Cursor, and other AI coding agents a
predictable WordPress theme structure. You clone this template, push your work
to a GitHub branch, connect the repository in WP Vibecoder, validate it, and
sync the finished theme into WordPress.

If this starter helps your workflow, consider giving the repository a star on
GitHub. It helps other WordPress builders discover the project.

## Why use it?

- **Agent-ready instructions:** `agent.md`, `AGENTS.md`, and `CLAUDE.md` explain the expected project structure.
- **WordPress-native theme files:** production code lives in `theme/`.
- **Fast static preview:** `preview/` gives AI agents a quick place to mirror visual changes.
- **Managed homepage convention:** `theme/page-home.php` powers the front page while preserving WordPress page compatibility.
- **Sync validation:** `scripts/validate.sh` checks the project before it is synced by WP Vibecoder.
- **Theme screenshot workflow:** `scripts/generate-theme-screenshot.sh` keeps `theme/screenshot.png` ready for WordPress.

## Quick start

1. Use this repository as a GitHub template or clone it into a new repository.
2. Create a working branch for your site or theme changes.
3. Open the repository with Codex, Claude Code, Cursor, or your preferred AI coding agent.
4. Ask the agent to follow `agent.md`.
5. Run `./scripts/validate.sh`.
6. Push the branch to GitHub.
7. Install WP Vibecoder from [wpvibecoder.com](https://wpvibecoder.com).
8. Connect this repository and branch in WP Vibecoder.
9. Validate and sync the theme from WordPress.

## Before uploading

Customize these values:

1. Change `name` in `wp-vibecoder.json`.
2. Change the visible `Theme Name`, `Description`, and `Author` values in `theme/style.css`.
3. Preserve the existing text domain and PHP function prefix unless a technical rename is explicitly required.
4. Replace the placeholder content and styles.
5. Upload the contents of this folder to the root of a GitHub repository.

Do not upload the containing `wp-vibecoder-starter` folder as an extra nested directory. GitHub’s repository root should contain `agent.md`, `wp-vibecoder.json`, `theme/`, and `preview/`.

## Structure

```text
.
├── agent.md
├── AGENTS.md
├── CLAUDE.md
├── wp-vibecoder.json
├── assets/
│   ├── wp-vibecoder-mark.svg
│   └── wp-vibecoder-default-screenshot.png
├── theme/
│   ├── style.css
│   ├── functions.php
│   ├── page-home.php
│   ├── page.php
│   ├── single.php
│   ├── header.php
│   ├── footer.php
│   ├── index.php
│   └── screenshot.png
├── preview/
└── scripts/
    ├── generate-theme-screenshot.sh
    └── validate.sh
```

## Homepage convention

WP Vibecoder creates or reuses a WordPress page named `WP Vibecoder Home` with
the slug `wp-vibecoder-home`, keeps its content empty, and assigns it as the
static front page under **Settings > Reading**. The site root `/` is rendered
through `theme/page-home.php`; WP Vibecoder routes the managed front page to
that template independently of the page slug.

Codex must edit `page-home.php` for every landing-page or homepage
change. Never build the homepage layout in the WP Vibecoder Home page content
editor. Do not use `front-page.php`, do not put the homepage layout in
`index.php`, and do not add `home.php` in V1.

The WP Vibecoder Home page supports SEO plugins, metadata, OpenGraph, Gutenberg,
previews, revisions, future CMS features, and WordPress `page_on_front`
compatibility.

- `page-home.php`: homepage.
- `page.php`: standard WordPress pages.
- `page-{slug}.php`: custom page layouts when required.
- `single.php`: individual posts, only if the project uses posts.
- `index.php`: fallback template only.

Blog functionality is not part of V1. Add it only when explicitly requested.

## Page-first architecture

Sections belonging to the landing page stay inside `page-home.php`. Hero,
About, Services, Testimonials, FAQ, Contact, Pricing, and CTA sections do not
become separate WordPress pages unless a dedicated URL is explicitly requested.

For example:

- “Add a Services section” modifies `page-home.php`.
- “Add a FAQ section” modifies `page-home.php`.
- “Create a Contact page” creates `/contact` and uses `page.php` or
  `page-contact.php` when a custom layout is necessary.
- “Create a Services page” creates `/services` and uses `page.php` or
  `page-services.php` when necessary.

Dedicated pages must also be declared in `wp-vibecoder.json` so WP Vibecoder
creates or updates the corresponding WordPress page during sync. Do not declare
`Home`; it is managed separately.

Page declarations are only for page metadata: `title`, `slug`, optional
`status`, and optional `template`. Do not include `content` or `excerpt`.
WP Vibecoder creates pages with an empty editor and preserves manually edited
content. Repository-managed page copy and layout belong in `page.php` or
`page-{slug}.php`.

When the template follows WordPress hierarchy naming such as `page-contact.php`
for slug `contact`, it does not need a `Template Name` header. Any other
template file declared here must include a `Template Name` header so WordPress
can assign it as a valid page template.

Example:

```json
{
  "pages": [
    {
      "title": "Contact",
      "slug": "contact",
      "template": "page-contact.php",
      "status": "publish"
    }
  ]
}
```

Do not place layouts for dedicated internal pages inside `page-home.php`.

## WordPress theme screenshot

WordPress displays `theme/screenshot.png` in **Appearance > Themes**. The
starter includes a professional branded WP Vibecoder screenshot at 1200×900.

After any visual change that affects the homepage, preview, theme branding,
layout, or first-screen appearance, update the static preview and regenerate
the screenshot from the repository root:

```bash
./scripts/generate-theme-screenshot.sh
```

The script uses headless Google Chrome or Chromium and overwrites the branded
image with a capture of `preview/index.html`. If Chrome or Chromium is
unavailable, keep or restore the bundled default screenshot and report the
exact reason screenshot generation was skipped. The screenshot is theme
metadata only; the production homepage remains `theme/page-home.php`.

## Development workflow

1. Open the repository with Codex or Claude and follow `agent.md`.
2. Make production changes in `theme/`.
3. Use `preview/` for fast HTML/CSS experiments.
4. If the homepage changed visually, align `preview/` with the delivered theme before completion.
5. Run `./scripts/validate.sh`.
6. Run the theme in a local WordPress installation such as LocalWP.
7. Regenerate `theme/screenshot.png` after visual changes, or report why screenshot generation was unavailable.
8. Commit and push to GitHub.
9. Configure the repository URL and branch in WP Vibecoder.
10. Use **Validate Repo**, then **Sync Theme**.

`theme/` is always authoritative. The preview is a static visual reference and
does not replace validation in WordPress.
Visible brand, hero, and navigation copy should be explicit in the theme files
and mirrored in `preview/`. Avoid relying on the target WordPress site's
`get_bloginfo()` values for first-screen copy because the static preview cannot
know those settings.

## Validation

Run from the repository root:

```bash
./scripts/validate.sh
```

The script checks required and forbidden templates, JSON syntax, matching
release versions, PHP syntax, referenced local theme assets, and the
1200×900 PNG screenshot.

Individual commands:

```bash
find theme -name '*.php' -print0 | xargs -0 -n1 php -l
./scripts/generate-theme-screenshot.sh
```

If no local WordPress environment is available, still run the validation
script, inspect `preview/index.html`, and clearly report that real WordPress
runtime and visual validation remain pending.

In restricted environments such as cloud coding agents:

- `validate.sh` runs every check supported by the available tools and emits
  warnings for checks it must skip.
- `generate-theme-screenshot.sh` uses the bundled branded WP Vibecoder image
  when Chrome/Chromium cannot run.
- Set `WP_VIBECODER_USE_DEFAULT_SCREENSHOT=1` to force the fallback explicitly.
- A missing `theme/screenshot.png` is restored from
  `assets/wp-vibecoder-default-screenshot.png`.
- Warnings must be included in the final handoff instead of being reported as
  successful runtime validation.

## AI agent compatibility

- `agent.md` is the canonical tool-neutral specification.
- `CLAUDE.md` tells Claude Code to load and follow `agent.md`.
- `AGENTS.md` provides the same entrypoint for Codex and other compatible
  coding agents.
- Keep the three files aligned; detailed policies belong in `agent.md` to
  avoid duplicated instructions.

## Versioning

The starter remains at version `1.0` during private development and testing.
Do not bump it for design changes, content edits, internal releases, or
distributable test ZIPs. Version progression begins when WP Vibecoder is
prepared for its official WordPress.org release.

At that point, update these three values together:

- `Version` in `theme/style.css`
- `WP_VIBECODER_STARTER_VERSION` in `theme/functions.php`
- `version` in `wp-vibecoder.json`

Use semantic versioning and keep all three values identical.

## Assets and JavaScript

- Place images in `theme/assets/images/`, extra styles in
  `theme/assets/css/`, and scripts in `theme/assets/js/`.
- Prefer SVG for simple logos/icons and WebP or AVIF for photographs.
- Keep raster images below 500 KB when practical.
- Use lowercase kebab-case filenames and local production assets.
- Add JavaScript only when needed and enqueue it from `functions.php`.
- Prefer dependency-free scripts and footer loading.

## Brand data and production readiness

When the user does not provide brand content, Codex may create a coherent
proposal, but must disclose every invented value at handoff. Invented contact
details and business claims must never be presented as verified.

Before production, confirm and replace all provisional:

- Phone numbers and email addresses
- Domains, external URLs, and social links
- Author or agency names
- Business addresses
- Privacy, terms, and other legal URLs
- Prices, testimonials, certifications, and factual business claims

Do not ship `example.com`, `Your Name`, lorem ipsum, empty links, or `#` links
as production content.

## Technical identity

Visible branding may change while the existing text domain, PHP function
prefix, package namespace, and asset handles remain stable. This avoids
unnecessary compatibility problems. Rename technical identifiers only when
explicitly requested and update every reference consistently.

## V1 exclusions

ACF integration is reserved for a future WP Vibecoder Pro workflow. Do not add
ACF fields, `acf-json`, or ACF plugin requirements to V1 starter projects.
