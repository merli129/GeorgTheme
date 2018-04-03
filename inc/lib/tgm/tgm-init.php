<?php

/**
 * TGM Init Class
 */
include_once ('class-tgm-plugin-activation.php');

function redux_builder_manu_89_register_required_plugins() {

	$plugins = array(
		array(),
	);

	$config = array();

	tgmpa( $plugins, $config );

}
add_action( 'tgmpa_register', 'redux_builder_manu_89_register_required_plugins' );