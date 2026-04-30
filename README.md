# Swiper Toolkit

A lightweight developer-focused WordPress plugin for loading [Swiper](https://swiperjs.com/) and managing custom slider initializations from a single JavaScript file.

This plugin is intentionally simple. It does not add admin screens, Gutenberg block controls, settings pages, or generated markup. It is designed for developers who prefer to create their slider HTML manually in WordPress and keep all Swiper initialization logic centralized.

## Features

- Loads Swiper locally on the WordPress frontend.
- Provides a dedicated `assets/js/swiper-init.js` file for custom slider setups.
- Keeps visual slider styling outside the plugin, so it can live in the active theme.
- Uses WordPress asset versioning based on file modification time.
- Uses unique WordPress handles and function prefixes.
- No database tables, options, REST endpoints, admin pages, or user input handling.

## Requirements

- WordPress 6.0 or newer.
- PHP 7.4 or newer.

## Installation

The GitHub repository uses the `wp-` prefix only to identify it as a WordPress plugin repository. When installing the plugin in WordPress, use the plugin folder name without the `wp-` prefix.

Correct plugin folder:

```txt
wp-content/plugins/swiper-toolkit/
```

Correct ZIP structure:

```txt
swiper-toolkit.zip
`-- swiper-toolkit/
    |-- swiper-toolkit.php
    |-- assets/
    |-- README.md
    `-- LICENSE
```

Do not install it as:

```txt
wp-content/plugins/wp-swiper-toolkit/
```

Backend installation:

1. Create a ZIP with `swiper-toolkit/` as the root folder.
2. In WordPress, go to **Plugins > Add New > Upload Plugin**.
3. Upload `swiper-toolkit.zip`.
4. Activate **Swiper Toolkit**.

Manual installation:

1. Upload the `swiper-toolkit` folder to `wp-content/plugins/`.
2. Activate **Swiper Toolkit** from the WordPress plugins screen.

Git installation:

```bash
git clone git@github.com:guisfus/wp-swiper-toolkit.git wp-content/plugins/swiper-toolkit
```

## Usage

Create your slider markup manually in Gutenberg, a template, a pattern, or any other WordPress-rendered content.

Example markup:

```html
<div class="swiper swiper-underbanner">
  <div class="swiper-wrapper">
    <div class="swiper-slide">Slide 1</div>
    <div class="swiper-slide">Slide 2</div>
    <div class="swiper-slide">Slide 3</div>
  </div>
</div>
```

Then customize the slider behavior in:

```text
assets/js/swiper-init.js
```

The plugin currently includes an example initializer for `.swiper-underbanner`.

If markup is injected after page load by AJAX, a popup, or a page builder, call:

```js
window.SwiperToolkitInit();
```

You can also pass a specific container element:

```js
window.SwiperToolkitInit(document.querySelector('.dynamic-section'));
```

## Styling

The plugin loads Swiper's base CSS. Project-specific styles should usually live in your active theme or child theme.

For example:

```css
.swiper-underbanner .swiper-slide {
  height: auto;
}
```

## Development Notes

- Keep new slider initializations in `assets/js/swiper-init.js`.
- Use unique CSS classes for each slider type.
- Avoid adding plugin settings unless there is a real need.
- Keep theme-specific layout and design CSS in the theme.

## Security

This plugin does not process user input, create admin forms, expose AJAX actions, register REST routes, or store data. The PHP entry point prevents direct access and only enqueues local frontend assets.

## Frontend Footprint

- Loads Swiper's local CSS and JS bundle.
- Loads `assets/js/swiper-init.js` for project-specific initializers.
- Exposes `window.SwiperToolkitInit` so dynamic content can be initialized manually.
- Marks initialized sliders with `data-swiper-toolkit-initialized="true"` to avoid duplicate Swiper instances.

## Third-Party Assets

This plugin includes Swiper 12.1.4, released under the MIT License.

## License

Swiper Toolkit is licensed under GPL-2.0-or-later.
