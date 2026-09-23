# WP Vibecoder Agent Instructions

This repository is a WordPress theme project synchronized by WP Vibecoder.

## Working rules

- Work mainly inside `/theme`. It is the production source.
- Use `/preview` for quick static prototypes and screenshot generation. It is never the production source.
- During experimentation, `/preview` may temporarily differ from `/theme`.
- Before completing a visual homepage change, update `/preview` so it represents the delivered design closely enough for review and screenshot generation.
- Keep visible homepage/header copy in `/theme` and `/preview` textually aligned. Do not use `get_bloginfo()` for visible brand, hero, or navigation text unless `/preview` is updated to the same expected values.
- If a task does not affect the homepage visually, `/preview` does not need to change.
- In restricted cloud environments, run all available validations and report skipped checks as warnings.
- If Chrome or Chromium cannot generate a screenshot, keep or restore the bundled default WP Vibecoder screenshot and report the exact reason screenshot generation was skipped.
- Never modify WordPress core files.
- Use WordPress APIs, template hierarchy, escaping functions, and enqueue APIs.
- Do not add Advanced Custom Fields. ACF support is reserved for a future WP Vibecoder Pro workflow.
- Do not invent or reference helper functions that do not exist.
- Verify every referenced function and asset exists.
- Escape output and sanitize input according to WordPress coding practices.
- Validate PHP syntax before completing work.
- When a local WordPress installation is available, perform final visual validation there.
- LocalWP is recommended but is not a dependency.
- After any visual change that affects the homepage, preview, theme branding, layout, or first-screen appearance, run `./scripts/generate-theme-screenshot.sh` before completion so `theme/screenshot.png` reflects the delivered design.
- The WordPress theme screenshot must be a 1200×900 PNG.

## Missing Brand Content

- When brand content is missing, create one coherent visual and copy direction so work can continue.
- Do not present invented contact details, claims, addresses, certifications, prices, testimonials, or legal statements as verified facts.
- Clearly list every invented or provisional value in the completion report.
- Before production delivery, replace or obtain explicit approval for all provisional phone numbers, email addresses, domains, author names, social links, business addresses, legal URLs, and external URLs.
- Never leave `example.com`, `Your Name`, lorem ipsum, placeholder phone numbers, empty links, or `#` links in a production-ready result.

## Assets

- Store project images in `theme/assets/images/` when assets are needed.
- Store additional CSS in `theme/assets/css/` and JavaScript in `theme/assets/js/`.
- Prefer SVG for simple logos and icons, WebP or AVIF for photographs, and PNG only when transparency or compatibility requires it.
- Keep ordinary raster images below 500 KB when practical. Optimize larger hero images and document any justified exception.
- Use descriptive lowercase kebab-case filenames.
- Do not hotlink production assets from temporary or third-party URLs.
- Verify every referenced asset exists before completion.

## JavaScript

- Add JavaScript only when the interaction cannot be implemented reliably with HTML and CSS.
- Prefer small dependency-free scripts.
- Enqueue scripts from `functions.php` with `wp_enqueue_script`; do not hardcode script tags in templates.
- Load frontend scripts in the footer unless there is a documented reason not to.
- Escape server data and pass dynamic values with WordPress APIs such as `wp_localize_script` or `wp_add_inline_script`.

## Technical Identity

- Preserve the PHP function prefix, package namespace, script/style handles, and text domain for compatibility by default.
- The commercial site name and visible brand may change without renaming technical identifiers.
- Rename technical identifiers only when explicitly requested and update every reference consistently.
- Do not perform a technical-identifier rename on an already deployed site without documenting migration and compatibility impact.

## Versioning

- Keep the starter version at `1.0` during private development and testing.
- Do not increment versions for content, style, layout, internal releases, or distributable test ZIPs.
- Versioning begins only when WP Vibecoder is prepared for its official WordPress.org release.
- At that point, increment `Version` in `theme/style.css`, `WP_VIBECODER_STARTER_VERSION` in `theme/functions.php`, and `version` in `wp-vibecoder.json` together.
- Keep all three values identical.
- Use semantic versioning: patch for fixes, minor for backward-compatible features, and major for breaking changes.

## Homepage Convention

- The homepage is a real WordPress page with slug `wp-vibecoder-home`.
- WP Vibecoder creates and assigns the `WP Vibecoder Home` page as the static homepage.
- The homepage layout must be implemented in `theme/page-home.php`.
- WP Vibecoder routes the managed front page to `page-home.php`; do not rely on the page slug for template loading.
- When modifying the homepage, edit `page-home.php`.
- Keep the WP Vibecoder Home page content editor empty.
- The WP Vibecoder Home page exists for SEO, metadata, OpenGraph, Gutenberg compatibility, previews, revisions, and future CMS features.
- Do not use the WP Vibecoder Home page content editor for homepage layout.
- Do not use `front-page.php`.
- Do not place homepage layout in `index.php`.
- Do not implement blog functionality unless explicitly requested.

## Routing Convention

- `page-home.php` = homepage.
- `page.php` = standard pages.
- `page-{slug}.php` = custom page layouts only when required.
- `single.php` = individual posts.
- `index.php` = fallback.

## Page Creation Convention

WP Vibecoder follows a page-first architecture. Homepage sections such as
Services, FAQ, and Contact belong in `theme/page-home.php` unless the user asks
for a dedicated URL. For a dedicated URL, follow the Native Pages and Subpages
skill below. For a translated URL, also follow Multilingual Pages.

<!-- WPVIBECODER:MANAGED-FORMS START v1 -->
## Managed Forms

When the user asks for a contact form, newsletter signup, lead capture form, or
similar submission workflow, do not build theme-side `POST` handlers and do not
hardcode third-party form IDs in templates. Declare the form in
`wp-vibecoder.json` and render it through WP Vibecoder.

V1 managed forms use Fluent Forms. The target WordPress site must have the
`fluentform` plugin installed and active before sync. WP Vibecoder creates or
updates declared Fluent Forms forms and stores the provider form id internally.

Example `wp-vibecoder.json` form declaration:

```json
{
  "requires": {
    "plugins": [
      {
        "slug": "fluentform",
        "required": true,
        "minVersion": "6.1",
        "maxTestedVersion": "6.x"
      }
    ]
  },
  "forms": [
    {
      "id": "contact",
      "provider": "fluent-forms",
      "title": "Contact",
      "type": "contact",
      "fields": [
        { "name": "name", "type": "text", "label": "Name", "required": true },
        { "name": "email", "type": "email", "label": "Email", "required": true },
        { "name": "message", "type": "textarea", "label": "Message", "required": true }
      ],
      "submitLabel": "Send"
    }
  ]
}
```

Render a declared form from a theme template with:

```php
<?php echo function_exists( 'wpv_render_form' ) ? wpv_render_form( 'contact' ) : ''; ?>
```

Supported V1 field types are `text`, `email`, `textarea`, and `tel`. Use
`type: "newsletter"` for a simple email capture form. Submissions are managed
by Fluent Forms entries; external email marketing integrations are not declared
unless WP Vibecoder explicitly supports that provider.
<!-- WPVIBECODER:MANAGED-FORMS END -->

<!-- WPVIBECODER:NATIVE-PAGES START v2 -->
## Native Pages and Subpages

Create a native WordPress page only when the user needs a dedicated URL; a
section of the homepage belongs in `theme/page-home.php`. Declare each dedicated
page in `wp-vibecoder.json` under `pages`. Do not declare the managed homepage
there. Standard pages use `page.php`; use a custom template for a distinct layout.

For a subpage, set `parent` to the full path of another declared page, without
leading or trailing slashes. Declare every ancestor; JSON order does not matter.
Each parent and child has its own title, content, status, and permalink.

```json
{
  "pages": [
    { "title": "Treatments", "slug": "treatments", "template": "page-treatments.php" },
    { "title": "Dermatitis", "slug": "dermatitis", "parent": "treatments", "template": "page-dermatitis.php" }
  ]
}
```

For deeper nesting, use a parent path such as `treatments/skin`. The same leaf
slug may appear under different parents, but full paths must be unique.
WordPress pretty permalinks must be enabled for nested URLs.

Do not put `content` or `excerpt` in page declarations. WP Vibecoder creates
pages with an empty editor and preserves later editor changes. Put layout and
copy maintained in the repository in the theme template. For content maintained
in WordPress, use the page editor and make sure its template renders
`the_content()`. Keep a page as a draft until it has real content in either place.
The managed homepage is the exception: its editor stays empty.

`page-{slug}.php` follows the WordPress template hierarchy and needs no
`Template Name` header. Because that name also matches other pages with the
same leaf slug, use a distinct template with a `Template Name` header for a
child-specific layout. Any other template named in `wp-vibecoder.json` also
requires that header.
<!-- WPVIBECODER:NATIVE-PAGES END -->

<!-- WPVIBECODER:MULTILINGUAL-PAGES START v2 -->
## Multilingual Pages

Use native WordPress pages for each translated URL. The default language stays
at `/`; another language uses its code as a parent page, such as `/es/` and
`/es/contacto/`. Declare default-language dedicated pages under `pages`, then
translations under `multilingual` in `wp-vibecoder.json`.

Before editing, inspect the current homepage and page templates to identify the
actual language at `/`; use it for `defaultLanguage`. Do not infer it from the
requested translation language or from this example. If the primary language
remains unclear, ask the user.

```json
{
  "pages": [{ "title": "Contact", "slug": "contact", "template": "page-contact.php" }],
  "multilingual": {
    "defaultLanguage": "en",
    "languages": [{
      "code": "es",
      "home": { "title": "Inicio", "template": "page-home-es.php" },
      "pages": [{ "source": "contact", "title": "Contacto", "slug": "contacto", "template": "page-contact-es.php" }]
    }]
  }
}
```

For translated subpages, set `source` to the full default-language path
(for example `treatments/dermatitis`) and `parent` to the translated parent
path relative to the language prefix (for example `tratamientos`). Declare the
translated parent and every ancestor too.

Translate each page's title, visible content, navigation, theme-provided SEO
metadata, and internal links. Use only documented `wp-vibecoder.json` fields;
write translated copy in a theme template or the WordPress editor as described
in Native Pages and Subpages. Translated templates need a `Template Name`
header. A translation without a template starts as a draft until its editor
content is ready. Never publish an empty translation or automatically redirect
by browser language. WordPress pretty permalinks must be enabled.

WP Vibecoder adds reciprocal `hreflang` links and HTML `lang` for published
translation pairs. WordPress provides native page permalinks, canonical URLs,
and sitemap entries. Use `wpv_language_urls()` for a language switcher and
`wpv_current_language()` for language-aware theme links or labels. Only link
to published translations returned by the helper.
<!-- WPVIBECODER:MULTILINGUAL-PAGES END -->

## Completion checklist

1. Production changes are in `/theme`; a visual homepage change is also reflected in `/preview`.
2. The managed homepage uses `theme/page-home.php`, has an empty editor, and no `front-page.php` or `home.php` was introduced.
3. `style.css` has valid `Theme Name` and `Version` headers; release versions match `functions.php` and `wp-vibecoder.json`.
4. Every referenced function, template, script, stylesheet, and image exists; PHP syntax and `./scripts/validate.sh` pass.
5. After visual changes, `theme/screenshot.png` is a regenerated 1200×900 PNG, or the unavailable check is reported.
6. WordPress visual and URL checks were performed when a local installation was available; otherwise report what was checked.
7. Provisional brand and contact details are disclosed in the completion report.
8. Each dedicated page is declared under `pages`; every subpage has a declared parent path and its own real content before publication.
9. Each requested form is declared under `forms`, with `fluentform` in `requires.plugins`.
10. For multilingual work, `defaultLanguage` matches the language at `/`; each translated `source` and `parent` resolves to the intended pages.
11. Published translations have translated content, navigation and links; language switcher URLs, `hreflang`, and `lang` match the published language pages.
