# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project overview

Laravel 10 landing page project using a **dual build pipeline**:
- **Gulp** for CSS (Stylus) and JS (concatenation + minification) — the primary frontend pipeline
- **Vite** present in dependencies but not actively used; Gulp replaces it

The backend is a minimal Laravel 10 application with no database requirement for the landing page.

## Commands

### PHP server
```bash
php artisan serve          # Start dev server on http://localhost:8000
```

### Frontend build (Gulp)
```bash
pnpm dev                   # Compile + browser-sync (requires php artisan serve running first)
pnpm build                 # Production build: minified CSS + JS, no sourcemaps
pnpm watch                 # Watch only, no browser-sync
```

`pnpm dev` proxies `http://localhost:8000` via browser-sync. Always start `php artisan serve` in a separate terminal before running `pnpm dev`.

### Code formatting
```bash
pnpm format                # Auto-fix JS, Stylus, Blade files
pnpm format:check          # Check without writing (used in CI)
vendor/bin/php-cs-fixer fix # Fix PHP files (PSR-12)
vendor/bin/php-cs-fixer fix --dry-run  # Check PHP without writing
```

### Tests
```bash
php artisan test                          # Run all tests
php artisan test tests/Unit/ExampleTest   # Run a single test file
php artisan test --filter MethodName      # Run a single test method
vendor/bin/phpunit                        # Run via PHPUnit directly
```

## Architecture

### Frontend pipeline (Gulp)

The JS bundle is built by **concatenating files in a fixed order** — this is not an ES module system:

```
resources/js/vendor/jquery.min.js   ← must be first (global jQuery)
resources/js/modules/*.js           ← feature modules (jQuery available as global)
resources/js/app.js                 ← initialization entry point
       ↓
public/js/app.js                    ← output (dev: with sourcemaps, prod: uglified)
```

The CSS pipeline:

```
resources/stylus/app.styl           ← entry point (@require other partials)
  ├── base/
  ├── components/
  ├── sections/
  └── utils/
       ↓
public/css/app.css                  ← output (dev: with sourcemaps, prod: compressed)
```

New JS modules go in `resources/js/modules/` and are automatically included. New Stylus partials must be explicitly `@require`d in `app.styl`.

`gulpfile.cjs` uses the `.cjs` extension because `package.json` sets `"type": "module"`, which would treat a `.js` gulpfile as ESM.

### Laravel backend

Standard Laravel 10 MVC. Routes are in `routes/web.php`. Views are Blade templates in `resources/views/`. No database migrations exist yet — this is a static landing page.

### Code style rules

| Language | Tool | Key rules |
|---|---|---|
| PHP | php-cs-fixer | PSR-12, short array syntax `[]`, trailing commas in multiline |
| JS / Stylus / Blade | Prettier + prettier-plugin-blade | single quotes, 2-space indent, trailing comma ES5, print width 100 |
| PHP files | EditorConfig | 4-space indent |
| All other files | EditorConfig | 2-space indent, LF, UTF-8 |

Blade files are formatted by Prettier (via `prettier-plugin-blade`), **not** by php-cs-fixer (excluded with `notName('*.blade.php')`).

## Code conventions

- **All comments in code must be written in English.**
- JS modules in `resources/js/modules/` must use IIFE pattern with `$` parameter to avoid polluting the global scope: `(function($) { ... })(jQuery)`.
- Stylus partials use `@require` (not `@import`) from `app.styl`.
- Public compiled assets (`public/css/app.css`, `public/js/app.js`, `*.map`) are git-ignored — never commit them.
- jQuery is available as a global `$` / `jQuery` in all modules because it is concatenated first.
