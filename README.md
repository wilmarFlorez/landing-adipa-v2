# ADIPA — Catálogo de Cursos

> Landing page de catálogo de formación continua en psicología y salud mental.

![PHP](https://img.shields.io/badge/PHP-8.3.6-777BB4?logo=php&logoColor=white)
![Laravel](https://img.shields.io/badge/Laravel-10.50.2-FF2D20?logo=laravel&logoColor=white)
![Node](https://img.shields.io/badge/Node.js-24.13.1-339933?logo=node.js&logoColor=white)
![License](https://img.shields.io/badge/license-MIT-blue)

---

## Requisitos Previos

Versiones exactas utilizadas durante el desarrollo:

| Herramienta | Versión | Enlace |
|---|---|---|
| PHP | 8.3.6 | [php.net](https://www.php.net/downloads) |
| Composer | 2.9.5 | [getcomposer.org](https://getcomposer.org) |
| Node.js | 24.13.1 | [nodejs.org](https://nodejs.org) |
| pnpm | 10.30.3 | [pnpm.io](https://pnpm.io/installation) |

---

## Instalación

1. Clonar el repositorio:

```bash
git clone git@github.com:wilmarFlorez/landing-adipa-v2.git
```

2. Ingresar al directorio:

```bash
cd landing-adipa-v2
```

3. Instalar dependencias PHP:

```bash
composer install
```

4. Instalar dependencias Node:

```bash
pnpm install
```

5. Copiar las variables de entorno:

```bash
cp .env.example .env
```

6. Generar la clave de la aplicación:

```bash
php artisan key:generate
```

Una vez completados estos pasos, abrir dos terminales:

- Terminal 1 — servidor PHP: `php artisan serve`
- Terminal 2 — compilación con watcher: `pnpm dev`

La aplicación estará disponible en `http://localhost:3000` (browser-sync con recarga automática) o directamente en `http://localhost:8000`.

---

## Comandos

| Comando | Descripción | Cuándo usarlo |
|---|---|---|
| `php artisan serve` | Inicia el servidor de desarrollo en `localhost:8000` | Siempre, antes de `pnpm dev` |
| `pnpm dev` | Compila Stylus + JS con watcher y lanza browser-sync | Desarrollo diario |
| `pnpm build` | Compila y minifica CSS + JS para producción | Antes de hacer deploy |
| `pnpm format` | Formatea JS, Stylus y Blade con Prettier | Antes de commitear |
| `vendor/bin/php-cs-fixer fix` | Formatea archivos PHP con PSR-12 | Antes de commitear PHP |
| `php artisan test` | Ejecuta la suite de tests | Verificación antes de commit |

---

## Estructura del Proyecto

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

## Decisiones Técnicas

**Data estática en lugar de Eloquent.** La landing es contenido de marketing con actualizaciones infrecuentes. Usar `CoursesData` — una clase PHP con arrays estáticos — elimina la dependencia de base de datos, simplifica el entorno de desarrollo y hace que el deploy sea trivial. Cuando el catálogo crezca hasta requerir un CMS o CRUD, basta con reemplazar las llamadas estáticas por un repositorio Eloquent sin tocar las vistas ni el controlador.

**Convención de prefijos BEM.** Todo selector tiene un prefijo que indica su rol: `l-` para bloques de layout (header, footer), `s-` para secciones de página (hero, courses, contact), `c-` para componentes reutilizables (button, card, form, filter pills) y `u-` para utilidades de propósito general (skip link, sr-only, alineación). Esto elimina colisiones de nombres y hace que el origen de cualquier regla sea inmediatamente identificable en DevTools sin buscar en el código fuente.

**Módulos jQuery separados por responsabilidad.** Cada módulo (`header.js`, `course-filter.js`, `contact-form.js`) encapsula exactamente una funcionalidad usando el patrón IIFE `(function($){...})(jQuery)`. Esto previene la contaminación del scope global y permite razonar sobre cada comportamiento de forma aislada. Gulp concatena los módulos en orden fijo — vendor → modules → app.js — generando un único request HTTP en producción.

**Pipeline Gulp: Stylus → CSS.** El punto de entrada `app.styl` define el orden de `@require` explícitamente: variables y mixins primero (para que estén disponibles en todos los demás archivos), seguidos de utilities, base, components y sections. En desarrollo, `gulp-sourcemaps` genera mapas que permiten depurar directamente los archivos `.styl` en DevTools. En producción, la salida se comprime y los mapas se omiten. El mismo patrón aplica para JS con `gulp-uglify`.

---

## Screenshots

> Añadir capturas antes de la entrega final.

| Desktop (1280px+) | Tablet (768px) | Mobile (375px) |
|---|---|---|
| _pendiente_ | _pendiente_ | _pendiente_ |

---

## Deploy

**URL de producción:** `https://adipa-cursos.tu-hosting.com` _(actualizar antes de entregar)_

### Pasos para deploy en servidor propio

1. Compilar assets para producción:

```bash
pnpm build
```

2. Instalar dependencias PHP sin paquetes de desarrollo:

```bash
composer install --no-dev --optimize-autoloader
```

3. Configurar variables de entorno en el servidor (copiar `.env.example`, completar `APP_KEY`, `APP_ENV=production`, `APP_DEBUG=false`).

4. Cachear configuración y rutas:

```bash
php artisan config:cache && php artisan route:cache
```

5. Apuntar el document root del servidor web (Apache/Nginx) a la carpeta `public/`.

> **OG image:** `public/images/og-adipa.svg` es la plantilla de diseño. Antes del deploy, exportarla como PNG de 1200×630 y guardarlo en `public/images/og-adipa.png` para máxima compatibilidad con redes sociales.

---

## Autor

**Wilmar Flórez**

- GitHub: [github.com/wilmarFlorez](https://github.com/wilmarFlorez)
- LinkedIn: _[añadir enlace antes de entregar]_
