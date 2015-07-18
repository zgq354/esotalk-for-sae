<?php
if (! defined ( "IN_ESOTALK" ))
	exit ();

ET::$pluginInfo ["ConfigEditor"] = array (
		"name" => "ConfigEditor",
		"description" => "Edit the config.php file in the admin panel.",
		"version" => ESOTALK_VERSION,
		"author" => "zgq354",
		"authorEmail" => "i@izgq.net",
		"authorURL" => "http://izgq.net",
		"license" => "GPLv2",
		"dependencies" => array (
				"esoTalk" => "1.0.0g4" 
		) 
);
class ETPlugin_ConfigEditor extends ETPlugin {
	public function __construct($rootDirectory) {
		parent::__construct ( $rootDirectory );
		// Register the profiles admin controller which provides an interface for
		// administrators to edit the config.php.
		ETFactory::registerAdminController ( "config_editor", "ConfigAdminController", dirname ( __FILE__ ) . "/ConfigAdminController.class.php" );
	}
	
	/*
	 * |--------------------------------------------------------------------------
	 * | Admin Page
	 * |--------------------------------------------------------------------------
	 */
	
	// When initializing any admin controller, add a link to the Profiles admin page
	// in the admin menu.
	public function handler_initAdmin($sender, $menu) {
		$menu->add ( "config_editor", "<a href='" . URL ( "admin/config_editor" ) . "'><i class='icon-gear'></i> " . T ( "Config Editor" ) . "</a>" );
	}
}
