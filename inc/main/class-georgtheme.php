<?php
  /**
   * The main theme class.
   * We're using this one to instantiate other classes
   * and access the main theme objects.
   */

  if ( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
  }

  class Georgtheme {

    /**
     * Current theme object
     */
    public static $theme_object = null;

    /**
     * The template directory path.
     */
    public static $template_dir_path = GEORGTHEME_PATH;

    /**
     * The template directory URL.
     */
    public static $template_dir_url = GEORGTHEME_URL;

    /**
     * The stylesheet directory path.
     */
    public static $stylesheet_dir_path = '';

    /**
     * The stylesheet directory URL.
     */
    public static $stylesheet_dir_url = '';

    /**
     * The theme version.
     */
    public static $version = '';

    /**
     * The one, true instance of the Georgtheme object.
     */
    public static $instance = null;

    /**
     * The class constructor
     */
    public function __construct() {

      // Set static vars.
      if ( null === self::$theme_object ) {
        self::$theme_object = wp_get_theme();
      }
      if ( '' === self::$stylesheet_dir_path ) {
        self::$stylesheet_dir_path = wp_normalize_path( get_stylesheet_directory() );
      }
      if ( '' === self::$stylesheet_dir_url ) {
        self::$stylesheet_dir_url = get_stylesheet_directory_uri();
      }
      if ( '' === self::$version ) {
        self::$version = self::$theme_object->get( 'Version' );
      }
    }

    /**
     * Access the single instance of this class.
     */
    public static function get_instance() {
      if ( null === self::$instance ) {
        self::$instance = new Georgtheme();
      }
      return self::$instance;
    }

    /**
     * Gets the theme version.
     */
    public function get_theme_version() {
      return self::$version;
    }
  }
