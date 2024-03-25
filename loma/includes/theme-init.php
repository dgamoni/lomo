<?php
if (!defined('ABSPATH')) {
 exit;
}

// Theme Define Constants 
$dir_path = dirname(__FILE__);
// Tier 0
if ( !defined('INC_DIR') ) {
define('INC_DIR', trailingslashit(trailingslashit(THEME_DIR) . basename( $dir_path )));
}
if ( !defined('INC_URI') ) {
define('INC_URI', trailingslashit(trailingslashit(THEME_URI) . basename( $dir_path )));
}
// Tier 1
if ( !defined('ADMIN_DIR') ) {
define('ADMIN_DIR', trailingslashit(trailingslashit(INC_DIR) . 'admin'));
}
if ( !defined('ADMIN_URI') ) {
define('ADMIN_URI', trailingslashit(trailingslashit(INC_URI) . 'admin'));
}
// Tier 2
if ( !defined('CUSTOMIZER_DIR') ) {
define('CUSTOMIZER_DIR', trailingslashit(trailingslashit(ADMIN_DIR) . 'customizer'));
}
if ( !defined('CUSTOMIZER_OPTION_SETT_DIR') ) {
define('CUSTOMIZER_OPTION_SETT_DIR', trailingslashit(trailingslashit(CUSTOMIZER_DIR) . 'option-settings'));
}
if ( !defined('CUSTOMIZER_OUTPUT_SETT_DIR') ) {
define('CUSTOMIZER_OUTPUT_SETT_DIR', trailingslashit(trailingslashit(CUSTOMIZER_DIR) . 'output-settings'));
}
if ( !defined('CLASSES_DIR') ) {
define('CLASSES_DIR', trailingslashit(trailingslashit(ADMIN_DIR) . 'classes'));
}
if ( !defined('FUNCTIONS_DIR') ) {
define('FUNCTIONS_DIR', trailingslashit(trailingslashit(ADMIN_DIR) . 'functions'));
}
if ( !defined('EXTENSIONS_DIR') ) {
define('EXTENSIONS_DIR', trailingslashit(trailingslashit(ADMIN_DIR) . 'extensions'));
}
if ( !defined('EXTENSIONS_URI') ) {
define('EXTENSIONS_URI', trailingslashit(trailingslashit(ADMIN_URI) . 'extensions'));
}

/* ----------------------------------------------------------------------------------- */
/* Load the theme-specific files.													   */
/* ----------------------------------------------------------------------------------- */
require_once ADMIN_DIR . 'theme-setup.php'; // General Setup
require_once ADMIN_DIR . 'theme-customizer.php'; // Custom panel settings and custom settings theme customizer
require_once ADMIN_DIR . 'theme-actions.php'; // Theme actions & user defined hooks
require_once ADMIN_DIR . 'theme-comments.php'; // Custom comments/pingback loop
require_once ADMIN_DIR . 'theme-styles.php'; // Load Stylesheet via wp_enqueue_script
require_once ADMIN_DIR . 'theme-js.php'; // Load JavaScript via wp_enqueue_script
require_once ADMIN_DIR . 'theme-sidebar.php'; // Initialize widgetized areas
require_once ADMIN_DIR . 'theme-widgets.php'; // Theme widgets