# Guisfus Swiper Toolkit

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

1. Download or clone this repository into your WordPress plugins directory:

```bash
git clone git@github.com:guisfus/guisfus-swiper-toolkit.git wp-content/plugins/guisfus-swiper-toolkit
```

2. Activate **Guisfus Swiper Toolkit** from the WordPress admin plugins screen.

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

## Third-Party Assets

This plugin includes Swiper 12.1.4, released under the MIT License.

## License

Guisfus Swiper Toolkit is licensed under GPL-2.0-or-later.
