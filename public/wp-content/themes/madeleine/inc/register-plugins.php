<?php
/**
 * Register required plugins for TGM Plugin Activator
 *
 * @package __Tm
 */
add_action( 'tgmpa_register', 'madeleine_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function madeleine_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
		array(
			'name'     => esc_html__( 'Contact Form 7', 'madeleine' ),
			'slug'     => 'contact-form-7',
			'required' => false,
		),
		array(
			'name'         => esc_html__( 'Cherry Sidebar Manager', 'madeleine' ),
			'slug'         => 'cherry-sidebar-manager',
			'source'       => 'https://github.com/CherryFramework/cherry-sidebar-manager/archive/master.zip',
			'external_url' => 'https://github.com/CherryFramework/cherry-sidebar-manager',
		),
		array(
			'name'      => 'Easy Twitter Feed Widget',
			'slug'      => 'easy-twitter-feed-widget',
			'required'  => false,
		),
		array(
			'name'      => 'power-builder',
			'slug'      => 'power-builder',
			'required'  => false,
			'source' => MADELEINE_THEME_DIR . '/assets/plugins/power-builder.zip',
		),
		array(
			'name'      => 'tm-builder-integrator',
			'slug'      => 'tm-builder-integrator',
			'required'  => false,
			'source' => MADELEINE_THEME_DIR . '/assets/plugins/tm-builder-integrator.zip',
		),
		array(
			'name'      => 'booked',
			'slug'      => 'booked',
			'required'  => false,
			'source' => MADELEINE_THEME_DIR . '/assets/plugins/booked.zip',
		)
	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'madeleine',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

		/*
		'strings'      => array(
			'page_title'                      => __( 'Install Required Plugins', 'madeleine' ),
			'menu_title'                      => __( 'Install Plugins', 'madeleine' ),
			'installing'                      => __( 'Installing Plugin: %s', 'madeleine' ), // %s = plugin name.
			'oops'                            => __( 'Something went wrong with the plugin API.', 'madeleine' ),
			'notice_can_install_required'     => _n_noop(
				'This theme requires the following plugin: %1$s.',
				'This theme requires the following plugins: %1$s.',
				'madeleine'
			), // %1$s = plugin name(s).
			'notice_can_install_recommended'  => _n_noop(
				'This theme recommends the following plugin: %1$s.',
				'This theme recommends the following plugins: %1$s.',
				'madeleine'
			), // %1$s = plugin name(s).
			'notice_cannot_install'           => _n_noop(
				'Sorry, but you do not have the correct permissions to install the %1$s plugin.',
				'Sorry, but you do not have the correct permissions to install the %1$s plugins.',
				'madeleine'
			), // %1$s = plugin name(s).
			'notice_ask_to_update'            => _n_noop(
				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
				'madeleine'
			), // %1$s = plugin name(s).
			'notice_ask_to_update_maybe'      => _n_noop(
				'There is an update available for: %1$s.',
				'There are updates available for the following plugins: %1$s.',
				'madeleine'
			), // %1$s = plugin name(s).
			'notice_cannot_update'            => _n_noop(
				'Sorry, but you do not have the correct permissions to update the %1$s plugin.',
				'Sorry, but you do not have the correct permissions to update the %1$s plugins.',
				'madeleine'
			), // %1$s = plugin name(s).
			'notice_can_activate_required'    => _n_noop(
				'The following required plugin is currently inactive: %1$s.',
				'The following required plugins are currently inactive: %1$s.',
				'madeleine'
			), // %1$s = plugin name(s).
			'notice_can_activate_recommended' => _n_noop(
				'The following recommended plugin is currently inactive: %1$s.',
				'The following recommended plugins are currently inactive: %1$s.',
				'madeleine'
			), // %1$s = plugin name(s).
			'notice_cannot_activate'          => _n_noop(
				'Sorry, but you do not have the correct permissions to activate the %1$s plugin.',
				'Sorry, but you do not have the correct permissions to activate the %1$s plugins.',
				'madeleine'
			), // %1$s = plugin name(s).
			'install_link'                    => _n_noop(
				'Begin installing plugin',
				'Begin installing plugins',
				'madeleine'
			),
			'update_link' 					  => _n_noop(
				'Begin updating plugin',
				'Begin updating plugins',
				'madeleine'
			),
			'activate_link'                   => _n_noop(
				'Begin activating plugin',
				'Begin activating plugins',
				'madeleine'
			),
			'return'                          => __( 'Return to Required Plugins Installer', 'madeleine' ),
			'plugin_activated'                => __( 'Plugin activated successfully.', 'madeleine' ),
			'activated_successfully'          => __( 'The following plugin was activated successfully:', 'madeleine' ),
			'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'madeleine' ),  // %1$s = plugin name(s).
			'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'madeleine' ),  // %1$s = plugin name(s).
			'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'madeleine' ), // %s = dashboard link.
			'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'madeleine' ),

			'nag_type'                        => 'updated', // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
		),
		*/
	);

	tgmpa( $plugins, $config );
}
