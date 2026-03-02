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
│
├── app/
│   ├── Data/
│   │   └── CoursesData.php          # Data estática: cursos, categorías y colores de modalidad
│   ├── Helpers/
│   │   └── FormatHelper.php         # formatPrice() y formatDate() — helpers puros sin estado
│   └── Http/Controllers/
│       └── HomeController.php       # Único controlador; orquesta Data y retorna la vista
│
├── resources/
│   ├── views/
│   │   ├── layouts/
│   │   │   └── app.blade.php        # Shell HTML: meta SEO, Open Graph, skip link, assets
│   │   ├── partials/
│   │   │   ├── header.blade.php     # Sticky header con nav responsive y burger menu
│   │   │   └── footer.blade.php     # Footer 4 columnas: brand, nav, social, contacto
│   │   ├── sections/
│   │   │   ├── hero.blade.php       # Hero con gradiente y CTAs
│   │   │   ├── courses.blade.php    # Grid de cursos con filtrado client-side
│   │   │   ├── category-filter.blade.php  # Pills de filtro con aria-pressed
│   │   │   └── contact.blade.php    # Formulario de contacto con validación jQuery
│   │   ├── components/
│   │   │   ├── button.blade.php     # <x-button> con variantes (primary/secondary/outline)
│   │   │   └── course-card.blade.php      # <article> con imagen, badge de modalidad y precio
│   │   └── home.blade.php           # Vista principal: extiende layout, incluye secciones
│   │
│   ├── stylus/
│   │   ├── app.styl                 # Entry point: define el orden de @require
│   │   ├── utils/
│   │   │   ├── variables.styl       # Design tokens: colores, tipografía, radii, sombras
│   │   │   ├── mixins.styl          # respond-to(), respond-below(), dark-bg-link(), flex-center()
│   │   │   └── utilities.styl       # .u-skip-link, .u-sr-only, .u-text-*
│   │   ├── base/
│   │   │   ├── reset.styl           # Box-sizing, reset de márgenes, overflow-x hidden
│   │   │   ├── typography.styl      # Escala tipográfica h1–h4 y párrafos
│   │   │   ├── base.styl            # Estilos globales de body
│   │   │   └── accessibility.styl   # :focus-visible, prefers-reduced-motion
│   │   ├── components/
│   │   │   ├── container.styl       # .container con padding responsive
│   │   │   ├── button.styl          # .c-btn con variantes y microinteracción :active
│   │   │   ├── course-card.styl     # .c-card con hover translateY y animación fadeInUp
│   │   │   └── form.styl            # .c-form con estados error/valid/success
│   │   └── sections/
│   │       ├── header.styl          # .l-header sticky con burger animation
│   │       ├── hero.styl            # .s-hero con gradiente y escala tipográfica responsive
│   │       ├── courses.styl         # .s-courses grid 1→2→3 cols + @keyframes fadeInUp
│   │       ├── contact.styl         # .s-contact layout de dos columnas
│   │       └── footer.styl          # .l-footer grid 1→2→4 cols
│   │
│   └── js/
│       ├── vendor/
│       │   └── jquery.min.js        # jQuery 4 — va primero en el bundle
│       ├── modules/
│       │   ├── header.js            # Scroll shadow, burger toggle, outside-click close
│       │   ├── course-filter.js     # Filtrado client-side por categoría con aria-pressed
│       │   └── contact-form.js      # Validación lazy (blur + input), submit simulado
│       └── app.js                   # Entry point de inicialización
│
├── public/
│   ├── css/app.css                  # CSS compilado — no editar directamente
│   ├── js/app.js                    # JS concatenado y minificado — no editar directamente
│   ├── images/
│   │   └── og-adipa.svg             # Plantilla OG 1200×630 (exportar a .png para prod)
│   └── robots.txt
│
├── gulpfile.cjs                     # Pipeline: stylesProd/Dev, scriptsProd/Dev, serve, watch
├── .prettierrc                      # Prettier: single quotes, 2 espacios, blade plugin
└── .php-cs-fixer.php                # php-cs-fixer: PSR-12, short arrays, trailing commas
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
