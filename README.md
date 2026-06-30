# WP Vibecoder Website

Product website for `wpvibecoder.com`, built from the WP Vibecoder starter.

## Structure

- `theme/`: production WordPress theme.
- `theme/page-home.php`: homepage implementation.
- `preview/`: static preview used for fast visual review and screenshot generation.
- `wp-vibecoder.json`: WP Vibecoder project metadata.

## Workflow

1. Make production changes in `theme/`.
2. Keep `preview/` visually aligned after homepage changes.
3. Run `bash scripts/validate.sh`.
4. Run `bash scripts/generate-theme-screenshot.sh` after visual changes.
5. Commit and sync through Vibecoder Theme Sync.

The homepage should remain implemented in `theme/page-home.php`. Do not build the homepage layout in the WordPress page editor.
