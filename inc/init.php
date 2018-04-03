<?php

  if ( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
  }

  /****************************************************************
   * Include libs
   ****************************************************************/
  require_once GEORGTHEME_PATH . '/inc/lib/lib-init.php';


  /**
   * Include the main theme Georgtheme class.
   */
  require_once GEORGTHEME_PATH . '/inc/main/class-georgtheme.php';

  /**
   * Initiate the Georgtheme class.
   */
  new Georgtheme();

  /**
   * Include the Georg_Admin_Welcome class.
   */
  require_once Georgtheme::$template_dir_path . '/inc/main/class-georgtheme-admin-welcome.php';

  /**
   * Initiate the Georg_Admin_Welcome class.
   */
  new Georgtheme_Admin_Welcome();

  require_once Georgtheme::$template_dir_path . '/inc/metaboxes/metaboxes.php';  
