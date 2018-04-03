<?php
  /**
   * Admin View: Status Report Page
   */

  if ( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
  }

  function georg_clean( $var ) {
    return sanitize_text_field( $var );
  }

  $sysinfo = Redux_Helpers::compileSystemStatus( false, true );
?>

<div class="wrap about-wrap georgtheme-status">

  <?php $this->tabs(); ?>

  <br>

  <table class="georgtheme_status_table widefat" cellspacing="0" id="status">
    <thead>
      <tr>
        <th colspan="3" data-export-label="Theme"><?php esc_html_e( 'Theme', 'Georgtheme' ); ?></th>
      </tr>
    </thead>

    <tbody>
      <tr>
        <td data-export-label="Name"><?php esc_html_e( 'Name', 'Georgtheme' ); ?>:</td>
        <td class="help"><?php echo '<a href="#" class="help-tip" data-tip="' . esc_attr__( 'The name of the current active theme.', 'Georgtheme' ) . '">[?]</a>'; ?></td>
        <td><?php echo esc_html($sysinfo['theme']['name']); ?></td>
      </tr>

      <tr>
        <td data-export-label="Version"><?php esc_html_e( 'Version', 'Georgtheme' ); ?>:</td>
        <td class="help"><?php echo '<a href="#" class="help-tip" data-tip="' . esc_attr__( 'The installed version of the current active theme.', 'Georgtheme' ) . '">[?]</a>'; ?></td>
        <td>
          <?php
            echo esc_html($sysinfo['theme']['version']);

            if ( ! empty( $theme_version_data['version'] ) && version_compare( $theme_version_data['version'], $active_theme->Version, '!=' ) ) {
              echo ' &ndash; <strong style="color:red;">' . esc_html($theme_version_data['version']) . ' ' . esc_html__( 'is available', 'Georgtheme' ) . '</strong>';
            }
          ?>
        </td>
      </tr>

      <tr>
        <td data-export-label="Author URL"><?php esc_html_e( 'Author URL', 'Georgtheme' ); ?>:</td>
        <td class="help"><?php echo '<a href="#" class="help-tip" data-tip="' . esc_attr__( 'The theme developers URL.', 'Georgtheme' ) . '">[?]</a>'; ?></td>
        <td><?php echo esc_url($sysinfo['theme']['author_uri']); ?></td>
      </tr>

      <tr>
        <td data-export-label="Child Theme"><?php esc_html_e( 'Child Theme', 'Georgtheme' ); ?>:</td>
        <td class="help"><?php echo '<a href="#" class="help-tip" data-tip="' . esc_attr__( 'Displays whether or not the current theme is a child theme.', 'Georgtheme' ) . '">[?]</a>'; ?></td>
        <td>
          <?php
            echo is_child_theme() ? '<mark class="yes">' . '&#10004;' . '</mark>' : '&#10005;';
          ?>
        </td>
      </tr>

      <?php if ( is_child_theme() ) { ?>
        <tr>
          <td data-export-label="Parent Theme Name"><?php esc_html_e( 'Parent Theme Name', 'Georgtheme' ); ?>:
          </td>
          <td class="help"><?php echo '<a href="#" class="help-tip" data-tip="' . esc_attr__( 'The name of the parent theme.', 'Georgtheme' ) . '">[?]</a>'; ?></td>
          <td><?php echo esc_html($sysinfo['theme']['parent_name']); ?></td>
        </tr>

        <tr>
          <td data-export-label="Parent Theme Version">
            <?php esc_html_e( 'Parent Theme Version', 'Georgtheme' ); ?>:
          </td>
          <td class="help"><?php echo '<a href="#" class="help-tip" data-tip="' . esc_attr__( 'The installed version of the parent theme.', 'Georgtheme' ) . '">[?]</a>'; ?></td>
          <td><?php echo esc_html($sysinfo['theme']['parent_version']); ?></td>
        </tr>

        <tr>
          <td data-export-label="Parent Theme Author URL">
            <?php esc_html_e( 'Parent Theme Author URL', 'Georgtheme' ); ?>:
          </td>
          <td class="help"><?php echo '<a href="#" class="help-tip" data-tip="' . esc_attr__( 'The parent theme developers URL.', 'Georgtheme' ) . '">[?]</a>'; ?></td>
          <td><?php echo esc_url($sysinfo['theme']['parent_author_uri']); ?></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>

  <table class="georgtheme_status_table widefat" cellspacing="0" id="status">
    <thead>
    <tr>
      <th colspan="3" data-export-label="WordPress Environment">
        <?php esc_html_e( 'WordPress Environment', 'Georgtheme' ); ?>
      </th>
    </tr>
    </thead>

    <tbody>
      <tr>
        <td data-export-label="Home URL">
          <?php esc_html_e( 'Home URL', 'Georgtheme' ); ?>:
        </td>
        <td class="help">
          <?php echo '<a href="#" class="help-tip" data-tip="' . esc_attr__( 'The URL of your site\'s homepage.', 'Georgtheme' ) . '">[?]</a>'; ?>
        </td>
        <td><?php echo esc_url($sysinfo['home_url']); ?></td>
      </tr>

      <tr>
        <td data-export-label="Site URL">
          <?php esc_html_e( 'Site URL', 'Georgtheme' ); ?>:
        </td>
        <td class="help">
          <?php echo '<a href="#" class="help-tip" data-tip="' . esc_attr__( 'The root URL of your site.', 'Georgtheme' ) . '">[?]</a>'; ?>
        </td>
        <td>
          <?php echo esc_url($sysinfo['site_url']); ?>
        </td>
      </tr>

      <tr>
        <td data-export-label="WP Version">
          <?php esc_html_e( 'WP Version', 'Georgtheme' ); ?>:
        </td>

        <td class="help">
          <?php echo '<a href="#" class="help-tip" data-tip="' . esc_attr__( 'The version of WordPress installed on your site.', 'Georgtheme' ) . '">[?]</a>'; ?>
        </td>

        <td>
          <?php bloginfo( 'version' ); ?>
        </td>
      </tr>

      <tr>
        <td data-export-label="WP Multisite">
          <?php esc_html_e( 'WP Multisite', 'Georgtheme' ); ?>:
        </td>

        <td class="help">
          <?php echo '<a href="#" class="help-tip" data-tip="' . esc_attr__( 'Whether or not you have WordPress Multisite enabled.', 'Georgtheme' ) . '">[?]</a>'; ?>
        </td>

        <td>
          <?php if ( $sysinfo['wp_multisite'] == true ) {
            echo '&#10004;';
          } else {
            echo '&ndash;';
          } ?>
        </td>
      </tr>

      <tr>
        <td data-export-label="Permalink Structure">
          <?php esc_html_e( 'Permalink Structure', 'Georgtheme' ); ?>:
        </td>

        <td class="help">
          <?php echo '<a href="#" class="help-tip" data-tip="' . esc_attr__( 'The current permalink structure as defined in Wordpress Settings->Permalinks.', 'Georgtheme' ) . '">[?]</a>'; ?>
        </td>

        <td>
          <?php echo esc_html($sysinfo['permalink_structure']); ?>
        </td>
      </tr>

      <?php $sof = $sysinfo['front_page_display']; ?>

      <tr>
        <td data-export-label="Front Page Display">
          <?php esc_html_e( 'Front Page Display', 'Georgtheme' ); ?>:
        </td>
        <td class="help"><?php echo '<a href="#" class="help-tip" data-tip="' . esc_attr__( 'The current Reading mode of Wordpress.', 'Georgtheme' ) . '">[?]</a>'; ?></td>
        <td><?php echo esc_html($sof); ?></td>
      </tr>

      <?php if ( $sof == 'page' ) { ?>
        <tr>
          <td data-export-label="Front Page">
            <?php esc_html_e( 'Front Page', 'Georgtheme' ); ?>:
          </td>

          <td class="help">
            <?php echo '<a href="#" class="help-tip" data-tip="' . esc_attr__( 'The currently selected page which acts as the site\'s Front Page.', 'Georgtheme' ) . '">[?]</a>'; ?>
          </td>

          <td>
            <?php echo esc_html($sysinfo['front_page']); ?>
          </td>
        </tr>

        <tr>
          <td data-export-label="Posts Page">
            <?php esc_html_e( 'Posts Page', 'Georgtheme' ); ?>:
          </td>

          <td class="help">
            <?php echo '<a href="#" class="help-tip" data-tip="' . esc_attr__( 'The currently selected page in where blog posts are displayed.', 'Georgtheme' ) . '">[?]</a>'; ?>
          </td>

          <td>
            <?php echo esc_html($sysinfo['posts_page']); ?>
          </td>
        </tr>
      <?php } ?>

      <tr>
        <td data-export-label="WP Memory Limit">
          <?php esc_html_e( 'WP Memory Limit', 'Georgtheme' ); ?>:
        </td>

        <td class="help">
          <?php echo '<a href="#" class="help-tip" data-tip="' . esc_attr__( 'The maximum amount of memory (RAM) that your site can use at one time.', 'Georgtheme' ) . '">[?]</a>'; ?>
        </td>

        <td>
          <?php
            $memory = $sysinfo['wp_mem_limit']['raw'];

            if ( $memory < 40000000 ) {
              echo '<mark class="error">' . sprintf( __( '%s - We recommend setting memory to at least 40MB. See: <a href="%s" target="_blank">Increasing memory allocated to PHP</a>', 'Georgtheme' ), esc_html($sysinfo['wp_mem_limit']['size']), 'http://codex.wordpress.org/Editing_wp-config.php#Increasing_memory_allocated_to_PHP' ) . '</mark>';
            } else {
              echo '<mark class="yes">' . esc_html($sysinfo['wp_mem_limit']['size']) . '</mark>';
            }
          ?>
        </td>
      </tr>

      <tr>
        <td data-export-label="Language">
          <?php esc_html_e( 'Language', 'Georgtheme' ); ?>:
        </td>

        <td class="help">
          <?php echo '<a href="#" class="help-tip" data-tip="' . esc_attr__( 'The current language used by WordPress. Default = English', 'Georgtheme' ) . '">[?]</a>'; ?>
        </td>

        <td>
          <?php echo esc_html($sysinfo['wp_lang']); ?>
        </td>
      </tr>
    </tbody>
  </table>

  <table class="georgtheme_status_table widefat" cellspacing="0" id="status">
    <thead>
      <tr>
        <th colspan="3" data-export-label="Server Environment">
          <?php esc_html_e( 'Server Environment', 'Georgtheme' ); ?>
        </th>
      </tr>
    </thead>

    <tbody>
      <tr>
        <td data-export-label="Server Info">
          <?php esc_html_e( 'Server Info', 'Georgtheme' ); ?>:
        </td>

        <td class="help">
          <?php echo '<a href="#" class="help-tip" data-tip="' . esc_attr__( 'Information about the web server that is currently hosting your site.', 'Georgtheme' ) . '">[?]</a>'; ?>
        </td>

        <td>
          <?php echo esc_html($sysinfo['server_info']); ?>
        </td>
      </tr>

      <tr>
        <td data-export-label="Localhost Environment">
          <?php esc_html_e( 'Localhost Environment', 'Georgtheme' ); ?>:
        </td>

        <td class="help">
          <?php echo '<a href="#" class="help-tip" data-tip="' . esc_attr__( 'Is the server running in a localhost environment.', 'Georgtheme' ) . '">[?]</a>'; ?>
        </td>

        <td>
          <?php
            if ( $sysinfo['localhost'] === 'true' ) {
              echo '<mark class="yes">' . '&#10004;' . '</mark>';
            } else {
              echo '<mark class="no">' . '&ndash;' . '</mark>';
            }
          ?>            
        </td>
      </tr>

      <tr>
        <td data-export-label="PHP Version">
          <?php esc_html_e( 'PHP Version', 'Georgtheme' ); ?>:
        </td>

        <td class="help">
          <?php echo '<a href="#" class="help-tip" data-tip="' . esc_attr__( 'The version of PHP installed on your hosting server.', 'Georgtheme' ) . '">[?]</a>'; ?>
        </td>

        <td>
          <?php echo esc_html($sysinfo['php_ver']); ?>
        </td>
      </tr>

      <tr>
        <td data-export-label="ABSPATH">
          <?php esc_html_e( 'ABSPATH', 'Georgtheme' ); ?>:
        </td>

        <td class="help">
          <?php echo '<a href="#" class="help-tip" data-tip="' . esc_attr__( 'The ABSPATH variable on the server.', 'Georgtheme' ) . '">[?]</a>'; ?>
        </td>

        <td>
          <?php echo '<code>' . esc_html($sysinfo['abspath']) . '</code>'; ?>
        </td>
      </tr>
      
      <?php if ( function_exists( 'ini_get' ) ) { ?>
        <tr>
          <td data-export-label="PHP Memory Limit"><?php esc_html_e( 'PHP Memory Limit', 'Georgtheme' ); ?>:</td>
          <td class="help"><?php echo '<a href="#" class="help-tip" data-tip="' . esc_attr__( 'The largest filesize that can be contained in one post.', 'Georgtheme' ) . '">[?]</a>'; ?></td>
          <td><?php echo esc_html($sysinfo['php_mem_limit']); ?></td>
        </tr>

        <tr>
          <td data-export-label="PHP Post Max Size"><?php esc_html_e( 'PHP Post Max Size', 'Georgtheme' ); ?>:</td>
          <td class="help"><?php echo '<a href="#" class="help-tip" data-tip="' . esc_attr__( 'The largest filesize that can be contained in one post.', 'Georgtheme' ) . '">[?]</a>'; ?></td>
          <td><?php echo esc_html($sysinfo['php_post_max_size']); ?></td>
        </tr>

        <tr>
          <td data-export-label="PHP Time Limit"><?php esc_html_e( 'PHP Time Limit', 'Georgtheme' ); ?>:</td>
          <td class="help"><?php echo '<a href="#" class="help-tip" data-tip="' . esc_attr__( 'The amount of time (in seconds) that your site will spend on a single operation before timing out (to avoid server lockups)', 'Georgtheme' ) . '">[?]</a>'; ?></td>
          <td><?php echo esc_html($sysinfo['php_time_limit']); ?></td>
        </tr>

        <tr>
          <td data-export-label="PHP Max Input Vars"><?php esc_html_e( 'PHP Max Input Vars', 'Georgtheme' ); ?>:</td>
          <td class="help"><?php echo '<a href="#" class="help-tip" data-tip="' . esc_attr__( 'The maximum number of variables your server can use for a single function to avoid overloads.', 'Georgtheme' ) . '">[?]</a>'; ?></td>
          <td><?php echo esc_html($sysinfo['php_max_input_var']); ?></td>
        </tr>

        <tr>
          <td data-export-label="PHP Display Errors"><?php esc_html_e( 'PHP Display Errors', 'Georgtheme' ); ?>:</td>
          <td class="help"><?php echo '<a href="#" class="help-tip" data-tip="' . esc_attr__( 'Determines if PHP will display errors within the browser.', 'Georgtheme' ) . '">[?]</a>'; ?></td>
          <td>
            <?php
              if ( 'true' === $sysinfo['php_display_errors'] ) {
                echo '<mark class="yes">' . '&#10004;' . '</mark>';
              } else {
                echo '<mark class="no">' . '&ndash;' . '</mark>';
              }
            ?>
          </td>
        </tr>
      <?php } ?>

      <tr>
        <td data-export-label="SUHOSIN Installed"><?php esc_html_e( 'SUHOSIN Installed', 'Georgtheme' ); ?>:</td>
        <td class="help"><?php echo '<a href="#" class="help-tip" data-tip="' . esc_attr__( 'Suhosin is an advanced protection system for PHP installations. It was designed to protect your servers on the one hand against a number of well known problems in PHP applications and on the other hand against potential unknown vulnerabilities within these applications or the PHP core itself.  If enabled on your server, Suhosin may need to be configured to increase its data submission limits.', 'Georgtheme' ) . '">[?]</a>'; ?></td>
        <td>
          <?php if ( $sysinfo['suhosin_installed'] == true ) {
            echo '<mark class="yes">' . '&#10004;' . '</mark>';
          } else {
            echo '<mark class="no">' . '&ndash;' . '</mark>';
          } ?>
        </td>
      </tr>

      <tr>
        <td data-export-label="MySQL Version"><?php esc_html_e( 'MySQL Version', 'Georgtheme' ); ?>:</td>
        <td class="help"><?php echo '<a href="#" class="help-tip" data-tip="' . esc_attr__( 'The version of MySQL installed on your hosting server.', 'Georgtheme' ) . '">[?]</a>'; ?></td>
        <td><?php echo esc_html($sysinfo['mysql_ver']); ?></td>
      </tr>

      <tr>
        <td data-export-label="Max Upload Size"><?php esc_html_e( 'Max Upload Size', 'Georgtheme' ); ?>:</td>
        <td class="help"><?php echo '<a href="#" class="help-tip" data-tip="' . esc_attr__( 'The largest filesize that can be uploaded to your WordPress installation.', 'Georgtheme' ) . '">[?]</a>'; ?></td>
        <td><?php echo esc_html($sysinfo['max_upload_size']); ?></td>
      </tr>

      <tr>
        <td data-export-label="Default Timezone is UTC">
          <?php esc_html_e( 'Default Timezone is UTC', 'Georgtheme' ); ?>:
        </td>

        <td class="help">
          <?php
            echo '<a help="#" class="help-tip" data-tip="' . esc_attr__( 'The default timezone for your server.', 'Georgtheme' ) . '">[?]</a>'; 
          ?>
        </td>

        <td>
          <?php
            if ( $sysinfo['def_tz_is_utc'] === 'false' ) {
              echo '<mark class="error">' . '&#10005; ' . sprintf( __( 'Default timezone is %s - it should be UTC', 'Georgtheme' ), esc_html(date_default_timezone_get()) ) . '</mark>';
            } else {
              echo '<mark class="yes">' . '&#10004;' . '</mark>';
            }
          ?>
        </td>
      </tr>

      <?php
        $posting = array();

        // fsockopen/cURL
        $posting['fsockopen_curl']['name'] = 'fsockopen/cURL';
        $posting['fsockopen_curl']['help'] = '<a href="#" class="help-tip" data-tip="' . esc_attr__( 'Used when communicating with remote services with PHP.', 'Georgtheme' ) . '">[?]</a>';

        if ( $sysinfo['fsockopen_curl'] === 'true' ) {
          $posting['fsockopen_curl']['success'] = true;
        } else {
          $posting['fsockopen_curl']['success'] = false;
          $posting['fsockopen_curl']['note']    = esc_html__( 'Your server does not have fsockopen or cURL enabled - cURL is used to communicate with other servers. Please contact your hosting provider.', 'Georgtheme' ) . '</mark>';
        }

        /*
        // SOAP
        $posting['soap_client']['name'] = 'SoapClient';
        $posting['soap_client']['help'] = '<a href="#" class="help-tip" data-tip="' . esc_attr__( 'Some webservices like shipping use SOAP to get information from remote servers, for example, live shipping quotes from FedEx require SOAP to be installed.', 'Georgtheme' ) . '">[?]</a>';

        if ( $sysinfo['soap_client'] == true ) {
          $posting['soap_client']['success'] = true;
        } else {
          $posting['soap_client']['success'] = false;
          $posting['soap_client']['note']    = sprintf( __( 'Your server does not have the <a href="%s">SOAP Client</a> class enabled - some gateway plugins which use SOAP may not work as expected.', 'Georgtheme' ), 'http://php.net/manual/en/class.soapclient.php' ) . '</mark>';
        }

        // DOMDocument
        $posting['dom_document']['name'] = 'DOMDocument';
        $posting['dom_document']['help'] = '<a href="#" class="help-tip" data-tip="' . esc_attr__( 'HTML/Multipart emails use DOMDocument to generate inline CSS in templates.', 'Georgtheme' ) . '">[?]</a>';

        if ( $sysinfo['dom_document'] == true ) {
          $posting['dom_document']['success'] = true;
        } else {
          $posting['dom_document']['success'] = false;
          $posting['dom_document']['note']    = sprintf( __( 'Your server does not have the <a href="%s">DOMDocument</a> class enabled - HTML/Multipart emails, and also some extensions, will not work without DOMDocument.', 'Georgtheme' ), 'http://php.net/manual/en/class.domdocument.php' ) . '</mark>';
        }
        */

        //// GZIP
        //$posting['gzip']['name'] = 'GZip';
        //$posting['gzip']['help'] = '<a href="#" class="help-tip" data-tip="' . esc_attr__( 'GZip (gzopen) is used to open the GEOIP database from MaxMind.', 'Georgtheme' ) . '">[?]</a>';
        //
        //if ( $sysinfo['gzip'] == true ) {
        //    $posting['gzip']['success'] = true;
        //} else {
        //    $posting['gzip']['success'] = false;
        //    $posting['gzip']['note']    = sprintf( __( 'Your server does not support the <a href="%s">gzopen</a> function - this is required to use the GeoIP database from MaxMind. The API fallback will be used instead for geolocation.', 'Georgtheme' ), 'http://php.net/manual/en/zlib.installation.php' ) . '</mark>';
        //}

        // WP Remote Post Check
        $posting['wp_remote_post']['name'] = esc_html__( 'Remote Post', 'Georgtheme' );
        $posting['wp_remote_post']['help'] = '<a href="#" class="help-tip" data-tip="' . esc_attr__( 'Used to send data to remote servers.', 'Georgtheme' ) . '">[?]</a>';

        if ( $sysinfo['wp_remote_post'] === 'true' ) {
          $posting['wp_remote_post']['success'] = true;
        } else {
          $posting['wp_remote_post']['note'] = esc_html__( 'wp_remote_post() failed. Many advanced features may not function. Contact your hosting provider.', 'Georgtheme' );

          if ( $sysinfo['wp_remote_post_error'] ) {
            $posting['wp_remote_post']['note'] .= ' ' . sprintf( __( 'Error: %s', 'Georgtheme' ), georg_clean( $sysinfo['wp_remote_post_error'] ) );
          }

          $posting['wp_remote_post']['success'] = false;
        }

        // WP Remote Get Check
        $posting['wp_remote_get']['name'] = esc_html__( 'Remote Get', 'Georgtheme' );
        $posting['wp_remote_get']['help'] = '<a href="#" class="help-tip" data-tip="' . esc_attr__( 'Used to grab information from remote servers for updates updates.', 'Georgtheme' ) . '">[?]</a>';

        if ( $sysinfo['wp_remote_get'] === 'true' ) {
          $posting['wp_remote_get']['success'] = true;
        } else {
          $posting['wp_remote_get']['note'] = esc_html__( 'wp_remote_get() failed. This is needed to get information from remote servers. Contact your hosting provider.', 'Georgtheme' );
          if ( $sysinfo['wp_remote_get_error'] ) {
            $posting['wp_remote_get']['note'] .= ' ' . sprintf( __( 'Error: %s', 'Georgtheme' ), georg_clean( $sysinfo['wp_remote_get_error'] ) );
          }

          $posting['wp_remote_get']['success'] = false;
        }

        $posting = apply_filters( 'redux_debug_posting', $posting );

        foreach ( $posting as $post ) {
          $mark = ! empty( $post['success'] ) ? 'yes' : 'error';
      ?>
          <tr>
            <td data-export-label="<?php echo esc_html( $post['name'] ); ?>">
              <?php echo esc_html( $post['name'] ); ?>:
            </td>
            <td>
              <?php echo isset( $post['help'] ) ? $post['help'] : ''; ?>
            </td>
            <td class="help">
              <mark class="<?php echo esc_attr($mark); ?>">
                  <?php echo ! empty( $post['success'] ) ? '&#10004' : '&#10005'; ?>
                  <?php echo ! empty( $post['note'] ) ? wp_kses_data( $post['note'] ) : ''; ?>
              </mark>
            </td>
          </tr>
      <?php
        } 
      ?>
    </tbody>
  </table>

  <table class="georgtheme_status_table widefat" cellspacing="0" id="status">
    <thead>
      <tr>
        <th colspan="3" data-export-label="Active Plugins (<?php echo esc_html(count( (array) get_option( 'active_plugins' ) ) ); ?>)">
          <?php esc_html_e( 'Active Plugins', 'Georgtheme' ); ?> (<?php echo esc_html(count( (array) get_option( 'active_plugins' ) ) ); ?>)
        </th>
      </tr>
    </thead>

    <tbody>
      <?php
        foreach ( $sysinfo['plugins'] as $name => $plugin_data ) {
            $version_string = '';
            $network_string = '';

            if ( ! empty( $plugin_data['Name'] ) ) {
                // link the plugin name to the plugin url if available
                $plugin_name = esc_html( $plugin_data['Name'] );

                if ( ! empty( $plugin_data['PluginURI'] ) ) {
                    $plugin_name = '<a href="' . esc_url( $plugin_data['PluginURI'] ) . '" title="' . esc_attr__( 'Visit plugin homepage', 'Georgtheme' ) . '">' . esc_html($plugin_name) . '</a>';
                }
      ?>
                <tr>
                    <td><?php echo $plugin_name; ?></td>
                    <td class="help">&nbsp;</td>
                    <td>
                        <?php echo sprintf( _x( 'by %s', 'by author', 'Georgtheme' ), $plugin_data['Author'] ) . ' &ndash; ' . esc_html( $plugin_data['Version'] ) . $version_string . $network_string; ?>
                    </td>
                </tr>
      <?php
            }
        }
      ?>
    </tbody>
  </table>
</div>
