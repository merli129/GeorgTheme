<?php

  if ( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
  }

  /****************************************************************
   * DO NOT DELETE
   ****************************************************************/
  if ( get_stylesheet_directory() == get_template_directory() ) {
    define( 'GEORGTHEME_PATH', get_template_directory() );
    define( 'GEORGTHEME_URL', get_template_directory_uri() );
  }  else {
    define( 'GEORGTHEME_PATH', get_theme_root() . '/georgtheme' );
    define( 'GEORGTHEME_URL', get_theme_root_uri() . '/georgtheme' );
  }

  require_once GEORGTHEME_PATH . '/inc/init.php';


  /****************************************************************
   * You can add your functions here.
   * 
   * BE CAREFULL! Functions will dissapear after update.
   * If you want to add custom functions you should do manual
   * updates only.
   ****************************************************************/
