# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

Inspiro is a professional WordPress hybrid theme developed by WPZOOM, focused on photography and video portfolios. It's a free/lite version with a premium counterpart. The theme uses traditional PHP templates with modern block styling support via theme.json. Features include fullscreen video backgrounds (YouTube, Vimeo, self-hosted), WooCommerce integration, and support for popular page builders like Elementor and Beaver Builder.

## Development Commands

### Build and Assets
- `npm run build` or `grunt` - Compiles SCSS to CSS, minifies JS/CSS, processes RTL styles
- Individual Grunt tasks: `sass`, `cssmin`, `uglify`, `rtlcss`, `postcss`

### Code Quality
- `composer run lint` - Run PHP CodeSniffer checks
- `composer run format` - Auto-fix PHP coding standards issues
- `composer run phpstan` - Run PHPStan static analysis
- `grunt jshint` - Lint JavaScript files

### Development Workflow
- SCSS files are in `/scss/` directory
- Compiled CSS goes to `/assets/css/unminified/` then minified to `/assets/css/minified/`
- JavaScript files: unminified in `/assets/js/unminified/`, minified in `/assets/js/minified/`
- Use `SCRIPT_DEBUG` constant for development versions of assets

## Architecture

### Core Structure
- `functions.php` - Main theme initialization, loads all components
- `/inc/` - Contains all theme functionality organized in subdirectories
- `/inc/classes/` - Object-oriented components (12+ classes)
- `/inc/customizer/` - Extensive WordPress Customizer integration
- `/template-parts/` - Reusable template components
- `/page-templates/` - Custom page templates
- `/patterns/` - Block patterns for Gutenberg

### Key Components

#### Customizer System
- Modular configuration system in `/inc/customizer/configs/`
- Custom controls in `/inc/customizer/custom-controls/`
- Organized by sections: colors, typography, header, footer, blog, etc.
- Accordion UI controls for better UX

#### Asset Management
- `class-inspiro-enqueue-scripts.php` handles all asset loading
- Font management through `class-inspiro-fonts-manager.php`
- Google Fonts loaded locally via WPTT Webfont Loader (GDPR compliant)

#### Admin Interface
- Custom admin pages in `/inc/admin/`
- Plugin installer integration
- Welcome/onboarding experience
- Theme upgrade functionality

### WordPress Integration
- Hybrid theme with `theme.json` for block styling (not full FSE)
- Traditional PHP templates (no HTML block templates)
- WooCommerce templates in `/woocommerce/`
- WPML/Polylang multilingual support
- Block patterns for Gutenberg editor
- Extensive starter content

### Development Patterns
- Object-oriented architecture with descriptive class names
- Consistent use of WordPress hooks and filters
- Modular customizer configuration system
- SCSS organized by components with clear structure
- RTL (Right-to-Left) language support

## File Organization
- Main templates in root directory
- Styles: SCSS source in `/scss/`, compiled CSS in `/assets/css/`
- Scripts: Source in `/assets/js/unminified/`, compiled in `/assets/js/minified/`
- Images and fonts in `/assets/images/` and `/assets/fonts/`
- PHP includes organized in `/inc/` with clear subdirectories

## Testing and Quality
- PHPStan configuration in `phpstan.neon.dist`
- PHP CodeSniffer rules for WordPress standards
- GitHub Actions for automated checks
- Supports WordPress 6.0+ and PHP 7.4+