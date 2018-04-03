<?php
  /**
   * Admin View: Welcome Page
   */

  // Do not allow directly accessing this file.
  if ( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
  }

?>

<div class="wrap about-wrap avada-wrap">

  <?php $this->tabs(); ?>

  <br>

  <div class="avada-welcome-tour">
    <iframe width="1120" height="630" src="https://www.youtube.com/embed/X92mpPz1COM?rel=0" frameborder="0" allowfullscreen></iframe>

    <div class="col three-col">

      <div class="col">
        <h3><?php esc_attr_e( 'Welcome To Avada', 'Georgtheme' ); ?></h3>
        <p><?php esc_attr_e( 'In 2012 we set out to make the perfect theme and Avada was born. Since then it has been the #1 selling theme with an ever growing user base of nearly 300,000 customers. We are thrilled you chose Avada and feel it will change your outlook on what a Wordpress theme can do.', 'Georgtheme' ); ?></p>
      </div>

      <div class="col">
        <h3><?php esc_attr_e( 'Powerful Customization Tools', 'Georgtheme' ); ?></h3>
        <p><?php esc_attr_e( 'Avada includes an incredibly advanced options network. This network consists of Fusion Theme Options, Fusion Page Options and Fusion Builder. Together these tools, along with other included assets allow you to build professional websites without having to code.', 'Georgtheme' ); ?></p>
      </div>

      <div class="col last-feature last">
        <h3><?php esc_attr_e( '5 Star Customer Support', 'Georgtheme' ); ?></h3>
        <p><?php esc_attr_e( 'ThemeFusion understands that there can be no product success, without excellent customer support. We strive to always provide 5 star support and to treat you as we would want to be treated. This helps form a relationship between us that benefits all Avada customers.', 'Georgtheme' ); ?></p>
      </div>

    </div>
  </div>
  
  <div class="avada-thanks">
    <p class="description"><?php esc_attr_e( 'Thank you for choosing Avada. We are honored and are fully dedicated to making your experience perfect.', 'Georgtheme' ); ?></p>
  </div>

</div>
