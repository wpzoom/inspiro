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
The theme features an extensive modular customizer system:
- Configuration files in `/inc/customizer/configs/` organized by functionality
- Custom controls in `/inc/customizer/custom-controls/` including range sliders, typography, and color pickers
- Live preview via `postMessage` transport for instant updates
- Accordion UI controls for better organization
- Selective refresh capabilities for performance

#### Container Width System
- Dynamic container width controls in Theme Layout section
- Two width settings: default (`container_width`) and narrow (`container_width_narrow`)
- Context-aware application: narrow width for blog contexts, full width for pages
- Front page display setting awareness: only applies narrow width when front page shows latest posts
- Live preview via JavaScript in `customize-preview.js` with selective refresh
- Elementor integration option available

#### Asset Management
- `class-inspiro-enqueue-scripts.php` handles all asset loading with conditional logic
- Font management through `class-inspiro-fonts-manager.php` with Google Fonts optimization
- WPTT Webfont Loader integration for GDPR-compliant local font loading
- Dynamic CSS generation system in `/inc/dynamic-css/` for customizer options

#### Typography System
- Comprehensive font family management with Google Fonts and system font stacks
- Live preview typography controls with instant updates
- Font weight, size, line height, and text transform controls
- Separate typography sections for different elements (body, headings, logo, menu, hero)

### WordPress Integration
- Hybrid theme architecture combining traditional PHP templates with modern block support
- `theme.json` configuration for WordPress 5.9+ block styling without full FSE
- WooCommerce template overrides in `/woocommerce/` directory
- WPML/Polylang multilingual support with translation-ready structure
- Block patterns for Gutenberg editor in `/patterns/`
- Extensive starter content system for new installations

### Development Patterns
- Object-oriented architecture with descriptive class names following WordPress standards
- Consistent use of WordPress hooks and filters throughout
- Modular customizer configuration system for maintainability
- SCSS organized by components with clear file structure and imports
- RTL (Right-to-Left) language support with automated RTL CSS generation
- Progressive enhancement approach for JavaScript functionality

### Customizer Architecture Details
The customizer system uses a sophisticated architecture:
- Base control class `Inspiro_Customizer_Control_Base` for consistent behavior
- Configuration classes in `/inc/customizer/configs/` that extend base functionality
- Transport methods: `refresh` for complex changes, `postMessage` for live updates
- Context-sensitive control visibility using `inspiro_is_view_with_layout_option()`
- Custom JavaScript handlers in `customize-preview.js` for real-time updates

### Dynamic CSS System
- Modular CSS generation in `/inc/dynamic-css/` organized by component
- CSS custom properties (CSS variables) for consistent theming
- Responsive breakpoints and container width calculations
- Integration with WordPress block editor content and wide size variables

## File Organization
- Main templates in root directory following WordPress template hierarchy
- Styles: SCSS source in `/scss/`, compiled CSS in `/assets/css/`
- Scripts: Source in `/assets/js/unminified/`, compiled in `/assets/js/minified/`
- Images and fonts in `/assets/images/` and `/assets/fonts/`
- PHP includes organized in `/inc/` with clear subdirectories by functionality
- Vendor dependencies managed via Composer in `/vendor/`

## Testing and Quality
- PHPStan configuration in `phpstan.neon.dist` for static analysis
- PHP CodeSniffer rules following WordPress coding standards in `.phpcs.xml.dist`
- JSHint configuration in Gruntfile.js for JavaScript linting
- WordPress compatibility: supports WordPress 6.0+ and PHP 7.4+
- Automated quality checks via GitHub Actions

## Theme Constants and Configuration
- `INSPIRO_THEME_VERSION` - Current theme version (2.0.7)
- `INSPIRO_THEME_DIR` - Absolute path to theme directory
- `INSPIRO_THEME_URI` - URI to theme directory
- `SCRIPT_DEBUG` - WordPress constant for development asset loading

## Integration Points
- Elementor page builder compatibility with container width override options
- WooCommerce integration with custom templates and styling
- Popular page builder support (Beaver Builder, Elementor)
- WPZOOM plugin ecosystem integration (Portfolio, Social Feed, etc.)