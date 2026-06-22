# WP Vibecoder Starter

Minimal starter for corporate websites and landing pages synchronized with WP Vibecoder.

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

WP Vibecoder creates or reuses a WordPress page named `Home`, keeps its content
empty, and assigns it as the static front page under **Settings > Reading**.
The site root `/` is rendered through `theme/page-home.php`.

Codex must edit `page-home.php` for every landing-page or corporate-homepage
change. Never build the homepage layout in the Home page content editor. Do not
use `front-page.php`, do not put the homepage layout in `index.php`, and do not
add `home.php` in V1.

The Home page supports SEO plugins, metadata, OpenGraph, ACF, Gutenberg,
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

Do not place layouts for dedicated internal pages inside `page-home.php`.

## WordPress theme screenshot

WordPress displays `theme/screenshot.png` in **Appearance > Themes**. The
starter includes a professional branded WP Vibecoder screenshot at 1200×900.

If a project-specific screenshot is preferred, update the static preview and
regenerate the image from the repository root:

```bash
./scripts/generate-theme-screenshot.sh
```

The script uses headless Google Chrome or Chromium and overwrites the branded
image with a capture of `preview/index.html`. This is optional. The screenshot
is theme metadata only; the production homepage remains `theme/page-home.php`.

## Development workflow

1. Open the repository with Codex or Claude and follow `agent.md`.
2. Make production changes in `theme/`.
3. Use `preview/` for fast HTML/CSS experiments.
4. If the homepage changed visually, align `preview/` with the delivered theme before completion.
5. Run `./scripts/validate.sh`.
6. Run the theme in a local WordPress installation such as LocalWP.
7. Regenerate `theme/screenshot.png` when a project-specific preview is desired.
8. Commit and push to GitHub.
9. Configure the repository URL and branch in WP Vibecoder.
10. Use **Validate Repo**, then **Sync Theme**.

`theme/` is always authoritative. The preview is a static visual reference and
does not replace validation in WordPress.

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

## ACF

This starter does not require ACF. If the project begins using ACF:

- Add the dependency to `wp-vibecoder.json`.
- Set `"required": true` only if the theme cannot operate without ACF.
- Add any required implementation explicitly; ACF structure is not scaffolded in V1.

Example:

```json
{
  "name": "Advanced Custom Fields",
  "slug": "advanced-custom-fields",
  "required": false
}
```
