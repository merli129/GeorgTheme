<?php 

  // Load the TGM init if it exists
  if ( file_exists( dirname( __FILE__ ) . '/tgm/tgm-init.php' ) ) {
    require_once dirname( __FILE__ ) . '/tgm/tgm-init.php';
  }

  // Load the Redux init if it exists
  if ( file_exists( dirname( __FILE__ ) . '/redux/admin-init.php' ) ) {
    require_once dirname( __FILE__ ) . '/redux/admin-init.php';
  }
