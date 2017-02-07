<?php

// Load the system checks ( used for notifications )
require get_template_directory() . '/core/welcome-screen/notify-system-checks.php';

// Welcome screen
if ( is_admin() ) {
	global $theme_name_required_actions, $theme_name_recommended_plugins;
	$theme_name_recommended_plugins = array(
		'kiwi-social-share' => array( 'recommended' => false ),
		'cpo-widgets' => array( 'recommended' => false )
	);
	/*
	 * id - unique id; required
	 * title
	 * description
	 * check - check for plugins (if installed)
	 * plugin_slug - the plugin's slug (used for installing the plugin)
	 *
	 */


	$theme_name_required_actions = array(
		array(
			"id"          => 'theme_name-req-ac-install-cpo-content-types',
			"title"       => MT_Notify_System::create_plugin_requirement_title( __( 'Install: CPO Content Types', 'brilliance' ), __( 'Activate: CPO Content Types', 'brilliance' ), 'cpo-content-types' ),
			"description" => __( 'It is highly recommended that you install the CPO Content Types plugin. It will help you manage all the special content types that this theme supports.', 'brilliance' ),
			"check"       => MT_Notify_System::has_import_plugin( 'cpo-content-types' ),
			"plugin_slug" => 'cpo-content-types'
		),
		array(
			"id"          => 'theme_name-req-ac-install-wp-import-plugin',
			"title"       => MT_Notify_System::wordpress_importer_title(),
			"description" => MT_Notify_System::wordpress_importer_description(),
			"check"       => MT_Notify_System::has_import_plugin( 'wordpress-importer' ),
			"plugin_slug" => 'wordpress-importer'
		),
		array(
			"id"          => 'theme_name-req-ac-install-wp-import-widget-plugin',
			"title"       => MT_Notify_System::widget_importer_exporter_title(),
			'description' => MT_Notify_System::widget_importer_exporter_description(),
			"check"       => MT_Notify_System::has_import_plugin( 'widget-importer-exporter' ),
			"plugin_slug" => 'widget-importer-exporter'
		),
		array(
			"id"          => 'theme_name-req-ac-download-data',
			"title"       => esc_html__( 'Download theme sample data', 'brilliance' ),
			"description" => esc_html__( 'Head over to our website and download the sample content data.', 'brilliance' ),
			"help"        => '<a target="_blank"  href="https://www.machothemes.com/sample-data/theme_name-lite-posts.xml">' . __( 'Posts', 'brilliance' ) . '</a>, 
							   <a target="_blank"  href="https://www.machothemes.com/sample-data/theme_name-lite-widgets.wie">' . __( 'Widgets', 'brilliance' ) . '</a>',
			"check"       => MT_Notify_System::has_content(),
		),
		array(
			"id"    => 'theme_name-req-ac-install-data',
			"title" => esc_html__( 'Import Sample Data', 'brilliance' ),
			"help"  => '<a class="button button-primary" target="_blank"  href="' . self_admin_url( 'admin.php?import=wordpress' ) . '">' . __( 'Import Posts', 'brilliance' ) . '</a> 
							   <a class="button button-primary" target="_blank"  href="' . self_admin_url( 'tools.php?page=widget-importer-exporter' ) . '">' . __( 'Import Widgets', 'brilliance' ) . '</a>',
			"check" => MT_Notify_System::has_import_plugins(),
		),
	);
	require get_template_directory() . '/core/welcome-screen/welcome-screen.php';
}