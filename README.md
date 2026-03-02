# ADIPA — Course Catalog

> Continuing education landing page for psychology and mental health courses.

![PHP](https://img.shields.io/badge/PHP-8.3.6-777BB4?logo=php&logoColor=white)
![Laravel](https://img.shields.io/badge/Laravel-10.50.2-FF2D20?logo=laravel&logoColor=white)
![Node](https://img.shields.io/badge/Node.js-24.13.1-339933?logo=node.js&logoColor=white)
![License](https://img.shields.io/badge/license-MIT-blue)

---

## Prerequisites

Exact versions used during development:

| Tool | Version | Link |
|---|---|---|
| PHP | 8.3.6 | [php.net](https://www.php.net/downloads) |
| Composer | 2.9.5 | [getcomposer.org](https://getcomposer.org) |
| Node.js | 24.13.1 | [nodejs.org](https://nodejs.org) |
| pnpm | 10.30.3 | [pnpm.io](https://pnpm.io/installation) |

---

## Screenshots

| Desktop (1280px+) | Tablet (768px) | Mobile (375px) |
|---|---|---|
| _pending_ | _pending_ | _pending_ |

## Installation

1. Clone the repository:

```bash
git clone git@github.com:wilmarFlorez/landing-adipa-v2.git
```

2. Enter the directory:

```bash
cd landing-adipa-v2
```

3. Install PHP dependencies:

```bash
composer install
```

4. Install Node dependencies:

```bash
pnpm install
```

5. Copy the environment variables:

```bash
cp .env.example .env
```

6. Generate the application key:

```bash
php artisan key:generate
```

Once all steps are complete, open two terminals:

- Terminal 1 — PHP server: `php artisan serve`
- Terminal 2 — watcher build: `pnpm dev`

The app will be available at `http://localhost:3000` (browser-sync with live reload) or directly at `http://localhost:8000`.

---

## Commands

| Command | Description | When to use |
|---|---|---|
| `php artisan serve` | Starts the dev server at `localhost:8000` | Always, before `pnpm dev` |
| `pnpm dev` | Compiles Stylus + JS with watcher and launches browser-sync | Daily development |
| `pnpm build` | Compiles and minifies CSS + JS for production | Before deploying |
| `pnpm format` | Formats JS, Stylus and Blade files with Prettier | Before committing |
| `vendor/bin/php-cs-fixer fix` | Formats PHP files with PSR-12 | Before committing PHP |
| `php artisan test` | Runs the test suite | Verification before commit |

---

## Project Structure

```
landing-adipa-v2/
├── app/
│   ├── Data/CoursesData.php         # Static data: courses, categories, modality colors
│   ├── Helpers/FormatHelper.php     # formatPrice() and formatDate() — pure helpers
│   └── Http/Controllers/
│       └── HomeController.php       # Single controller: assembles data and returns view
├── resources/
│   ├── views/
│   │   ├── layouts/app.blade.php    # HTML shell: SEO meta, Open Graph, skip link, assets
│   │   ├── partials/                # Header (sticky, burger menu) and Footer
│   │   ├── sections/                # Hero, Courses grid, CategoryFilter pills, Contact form
│   │   └── components/              # Blade components: <x-button>, <x-course-card>
│   ├── stylus/
│   │   ├── app.styl                 # Entry point: explicit @require order
│   │   ├── utils/                   # Design tokens, mixins, utility classes
│   │   ├── base/                    # Reset, typography, body, accessibility
│   │   ├── components/              # .c-btn, .c-card, .c-form, .container
│   │   └── sections/                # .l-header, .s-hero, .s-courses, .s-contact, .l-footer
│   └── js/
│       ├── vendor/jquery.min.js     # jQuery 4 — concatenated first
│       ├── modules/                 # header.js, course-filter.js, contact-form.js, scroll-animations.js
│       └── app.js                   # Initialization entry point
├── public/                          # Compiled CSS and JS (do not edit directly)
├── gulpfile.cjs                     # Build pipeline: Stylus → CSS, JS concat/uglify, browser-sync
├── .prettierrc                      # Prettier config: JS, Stylus and Blade
└── .php-cs-fixer.php                # PSR-12 config for PHP files
```

---

## Technical Decisions

**BEM prefix convention.** Every selector carries a prefix that signals its role: `l-` for layout blocks (header, footer), `s-` for page sections (hero, courses, contact), `c-` for reusable components (button, card, form, filter pills) and `u-` for general-purpose utilities (skip link, sr-only, alignment). This eliminates naming collisions and makes the origin of any rule immediately identifiable in DevTools without searching the source.

**jQuery modules separated by responsibility.** Each module (`header.js`, `course-filter.js`, `contact-form.js`, `scroll-animations.js`) encapsulates exactly one feature using the IIFE pattern `(function($){...})(jQuery)`. This prevents global scope pollution and allows reasoning about each behaviour in isolation. Gulp concatenates the modules in a fixed order — vendor → modules → app.js — producing a single HTTP request in production.

**Gulp pipeline: Stylus → CSS.** The entry point `app.styl` defines the `@require` order explicitly: variables and mixins first (so they are available to all other files), followed by utilities, base, components and sections. In development, `gulp-sourcemaps` generates maps that allow debugging directly in the `.styl` files inside DevTools. In production the output is compressed and maps are omitted. The same pattern applies to JS with `gulp-uglify`.

---

## Deploy

**Production URL:** `https://landing-adipa-v2.onrender.com`

---

## Author

**Wilmar Florez Samudio**

- LinkedIn: [linkedin.com/in/wilmar-florez](https://linkedin.com/in/wilmar-florez)
- GitHub: [github.com/wilmarFlorez](https://github.com/wilmarFlorez)

Frontend technical assessment for ADIPA — 2026.
