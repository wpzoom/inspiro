<?php
/**
 * Helper class for load google fonts to front-end
 *
 * @package Inspiro
 * @since Inspiro 1.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

if ( ! class_exists( 'Inspiro_Fonts_Manager' ) ) {

    /**
     * Fonts class manager
     */
    class Inspiro_Fonts_Manager {

        /**
         * Fonts to load
         *
         * @var array
         */
        public static $fonts = array();

        /**
         * Google Font URL
         *
         * @var string
         */
        public static $google_font_url = '';

        /**
         * Instance
         *
         * @access private
         * @var object
         */
        private static $instance;

        /**
         * Initiator
         */
        public static function get_instance() {
            if ( ! isset( self::$instance ) ) {
                self::$instance = new self();
            }
            return self::$instance;
        }

        /**
         * Constructor
         */
        public function __construct() {
            add_action( 'init', array( $this, 'add_theme_fonts' ) );
        }

        /**
         * Localize Fonts
         */
        public static function js() {
            $system = wp_json_encode( Inspiro_Font_Family_Manager::get_system_fonts() );
            $google = wp_json_encode( Inspiro_Font_Family_Manager::get_google_fonts() );

            return 'var InspiroFontFamilies = { system: ' . $system . ', google: ' . $google . ' };';
        }

        /**
         * Register all Fonts
         *
         * @return void
         */
        public function add_theme_fonts() {
            // Get all typography settings that use fonts
            $typography_settings = array(
                'body-font-family' => inspiro_get_theme_mod('body-font-family'),
                'logo-font-family' => inspiro_get_theme_mod('logo-font-family'),
                'headings-font-family' => inspiro_get_theme_mod('headings-font-family'),
                'slider-title-font-family' => inspiro_get_theme_mod('slider-title-font-family'),
                'slider-text-font-family' => inspiro_get_theme_mod('slider-text-font-family'),
                'slider-button-font-family' => inspiro_get_theme_mod('slider-button-font-family'),
                'mainmenu-font-family' => inspiro_get_theme_mod('mainmenu-font-family'),
                'mobilemenu-font-family' => inspiro_get_theme_mod('mobilemenu-font-family')
            );

            // Add fonts from typography settings
            foreach ($typography_settings as $setting => $font_family) {
                $font_variants = inspiro_get_theme_mod(str_replace('family', 'variant', $setting));
                self::add_font($font_family, $font_variants);
            }

            // Default fonts to check
            $default_fonts = array(
                "'Inter', sans-serif" => '200,300,500,600',
                "'Onest', sans-serif" => '600'
            );

            // Only load default fonts if they're still being used
            foreach ($default_fonts as $font => $variants) {
                $is_font_used = false;
                foreach ($typography_settings as $font_family) {
                    if ($font_family === $font) {
                        $is_font_used = true;
                        break;
                    }
                }
                if ($is_font_used) {
                    self::add_font($font, $variants);
                }
            }
        }

        /**
         * Adds data to the $fonts array for a font to be rendered.
         *
         * @since 1.3.0
         * @param string $name The name key of the font to add.
         * @param array  $variants An array of weight variants.
         * @return void
         */
        public static function add_font( $name, $variants = array() ) {
            if ( 'inherit' == $name ) {
                return;
            }
            if ( ! is_array( $variants ) ) {
                // For multiple variant selectons for fonts.
                $variants = explode( ',', str_replace( 'italic', 'i', $variants ) );
            }

            if ( is_array( $variants ) ) {
                $key = array_search( 'inherit', $variants );
                if ( false !== $key ) {
                    unset( $variants[ $key ] );

                    if ( ! in_array( 400, $variants ) ) {
                        $variants[] = 400;
                    }
                }
            } elseif ( 'inherit' == $variants ) {
                $variants = 400;
            }

            if ( isset( self::$fonts[ $name ] ) ) {
                foreach ( (array) $variants as $variant ) {
                    if ( ! in_array( $variant, self::$fonts[ $name ]['variants'] ) ) {
                        self::$fonts[ $name ]['variants'][] = $variant;
                    }
                }
            } else {
                self::$fonts[ $name ] = array(
                    'variants' => (array) $variants,
                );
            }
        }

        /**
         * Get fonts
         *
         * @return array
         */
        public static function get_fonts() {
            do_action( 'inspiro/get_fonts' );
            return apply_filters( 'inspiro/add_fonts', self::$fonts );
        }

        /**
         * Get google font url
         *
         * @return string
         */
        public static function get_google_font_url() {
            return self::$google_font_url;
        }

        /**
         * Renders the <link> tag for all fonts in the $fonts array.
         *
         * @since 1.3.0
         * @return void
         */
        public static function render_fonts() {

            global $wp_customizer;

            $enable_local_google_fonts = apply_filters( 'inspiro/local_google_fonts', true );

            $font_list = apply_filters( 'inspiro/render_fonts', self::get_fonts() );

            $google_fonts = array();
            $font_subset  = array();

            $system_fonts = Inspiro_Font_Family_Manager::get_system_fonts();

            foreach ( $font_list as $name => $font ) {
                if ( ! empty( $name ) && ! isset( $system_fonts[ $name ] ) ) {

                    // Add font variants.
                    $google_fonts[ $name ] = $font['variants'];

                    // Add Subset.
                    $subset = apply_filters( 'inspiro/font_subset', '', $name );
                    if ( ! empty( $subset ) ) {
                        $font_subset[] = $subset;
                    }
                }
            }

            require_once get_theme_file_path( 'inc/classes/class-inspiro-wptt-webfont-loader.php' );

            self::$google_font_url = self::google_fonts_url( $google_fonts, $font_subset );

            $local_google_fonts_url = wptt_get_webfont_url( self::$google_font_url );

            if( $enable_local_google_fonts && ! $wp_customizer ) {
                wp_enqueue_style( 'inspiro-google-fonts', $local_google_fonts_url, array(), INSPIRO_THEME_VERSION, 'all' );
            }
            else {
                wp_enqueue_style( 'inspiro-google-fonts', self::$google_font_url, array(), INSPIRO_THEME_VERSION, 'all' );
            }


        }

        /**
         * Google Font URL
         * Combine multiple google font in one URL
         *
         * @link https://shellcreeper.com/?p=1476
         * @param array $fonts      Google Fonts array.
         * @param array $subsets    Font's Subsets array.
         *
         * @return string
         */
        public static function google_fonts_url( $fonts, $subsets = array() ) {

            /* URL */
            $base_url  = 'https://fonts.googleapis.com/css';
            $font_args = array();
            $family    = array();

            $fonts = apply_filters( 'inspiro/google_fonts_selected', $fonts );

            /* Format Each Font Family in Array */
            foreach ( $fonts as $font_name => $font_weight ) {
                $font_name = str_replace( ' ', '+', $font_name );
                if ( ! empty( $font_weight ) ) {
                    if ( is_array( $font_weight ) ) {
                        $font_weight = implode( ',', $font_weight );
                    }
                    $font_family = explode( ',', $font_name );
                    $font_family = str_replace( "'", '', inspiro_get_prop( $font_family, 0 ) );
                    $family[]    = trim( $font_family . ':' . rawurlencode( trim( $font_weight ) ) );
                } else {
                    $family[] = trim( $font_name );
                }
            }

            /* Only return URL if font family defined. */
            if ( ! empty( $family ) ) {

                /* Make Font Family a String */
                $family = implode( '|', $family );

                /* Add font family in args */
                $font_args['family'] = $family;

                /* Add font subsets in args */
                if ( ! empty( $subsets ) ) {

                    /* format subsets to string */
                    if ( is_array( $subsets ) ) {
                        $subsets = implode( ',', $subsets );
                    }

                    $font_args['subset'] = rawurlencode( trim( $subsets ) );
                }

                $font_args['display'] = 'swap';

                $args = add_query_arg( $font_args, $base_url );

                return $args;
            }

            return '';
        }

    }

}

/**
 *  Kicking this off by calling 'get_instance()' method
 */
Inspiro_Fonts_Manager::get_instance();
