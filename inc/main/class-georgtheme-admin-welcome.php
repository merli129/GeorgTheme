<?php
  /**
   * Class to manage Admin welcome menu page.
   */

  if ( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
  }

  class Georgtheme_Admin_Welcome {

    /**
     * The class constructor
     */
    public function __construct() {
      add_action( 'admin_menu', array( $this, 'admin_menu' ) );
    }

    /**
     * Adds the admin menu.
     */
    public function admin_menu() {
      
      if ( current_user_can( 'edit_theme_options' ) ) {

        // Work around for theme check.
        $georg_menu_page_creation_method    = 'add_menu_page';
        $georg_submenu_page_creation_method = 'add_submenu_page';

        $current_theme = Georgtheme::$theme_object;

        $welcome_screen = $georg_menu_page_creation_method( $current_theme->get( 'Name' ), $current_theme->get( 'Name' ), 'edit_theme_options', 'georgtheme', array( $this, 'welcome_screen' ), 'dashicons-store', '2.111111' );

        $status = $georg_submenu_page_creation_method( 'georgtheme', esc_attr__( 'System Status', 'Georgtheme' ), esc_attr__( 'System Status', 'Georgtheme' ), 'edit_theme_options', 'georgtheme-system-status', array( $this, 'system_status_tab' ) );

        add_action( 'admin_print_scripts-' . $welcome_screen, array( $this, 'admin_scripts' ) );
        add_action( 'admin_print_scripts-' . $status, array( $this, 'admin_scripts' ) );
      } // End if.
    }

    /**
     * Enqueues scripts.
     */
    public function admin_scripts() {
      if ( current_user_can( 'edit_theme_options' ) ) {
        
        $version = Georgtheme::get_theme_version();

        wp_enqueue_style( 'georg_tiptip_css', Georgtheme::$template_dir_url . '/inc/assets/css/vendor/tipTip/tipTip.css', array(), $version );
        wp_enqueue_style( 'georg_admin_welcome_css', Georgtheme::$template_dir_url . '/inc/assets/css/admin-welcome.css', array(), $version );

        wp_enqueue_script( 'georg_jquery_tiptip', Georgtheme::$template_dir_url . '/inc/assets/js/vendor/tipTip/jquery.tipTip.min.js', array( 'jquery' ), $version, true );
        wp_enqueue_script( 'georg_admin_welcome_js', Georgtheme::$template_dir_url . '/inc/assets/js/admin-welcome.js', array( 'jquery', 'georg_jquery_tiptip' ), $version, true );
      }
    }

    /**
     * Navigation tabs
     */
    public function tabs() {
        $selected = isset ( $_GET['page'] ) ? esc_attr( $_GET['page'] ) : 'welcome_screen';
      ?>

      <h1><?php esc_attr_e( 'Welcome to ' . Georgtheme::$theme_object->get( 'Name' ) . '!', 'Georgtheme' ); ?></h1>

      <div class="about-text">
        Avada is now installed and ready to use! Get ready to build something beautiful. Please register your purchase to get automatic theme updates, import Avada demos and install premium plugins. Check out the Support tab to learn how to receive product support. We hope you enjoy it!
      </div>

      <div class="georg-logo">
        <span class="georg-version">Version <?php echo Georgtheme::$theme_object->get( 'Version' ); ?></span>
      </div>

      <h2 class="nav-tab-wrapper">
        <a class="nav-tab <?php echo $selected == 'georgtheme' ? 'nav-tab-active' : ''; ?>"
            href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'georgtheme' ), 'admin.php' ) ) ); ?>">
          <?php esc_attr_e( "Welcome", 'Georgtheme' ); ?>
        </a>

        <a class="nav-tab <?php echo $selected == 'georgtheme_options' ? 'nav-tab-active' : ''; ?>"
            href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'georgtheme_options' ), 'admin.php' ) ) ); ?>">
          <?php esc_attr_e( 'Theme options', 'Georgtheme' ); ?>
        </a>

        <a class="nav-tab <?php echo $selected == 'georgtheme-system-status' ? 'nav-tab-active' : ''; ?>"
            href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'georgtheme-system-status' ), 'admin.php' ) ) ); ?>">
          <?php esc_attr_e( 'System Status', 'Georgtheme' ); ?>
        </a>
      </h2>

      <?php
    }

    /**
     * Include file.
     */
    public function welcome_screen() {

      // Stupid hack for Wordpress alerts and warnings
      echo '<div class="wrap"><h2 style="padding: 0;"></h2></div>';

      require_once 'admin-views/welcome.php';
    }

    /**
     * Include file.
     */
    public function system_status_tab() {

      // Stupid hack for Wordpress alerts and warnings
      echo '<div class="wrap"><h2 style="padding: 0;"></h2></div>';

      require_once 'admin-views/system-status.php';
    }
  }
