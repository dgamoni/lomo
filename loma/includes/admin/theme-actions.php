<?php

if (!defined('ABSPATH'))
    exit;
/*
 * ===============================================================================
 * TABLE OF CONTENTS - INCLUDES/ADMIN/THEME-ACTIONS.PHP
 *
 * - Functionality
 * - Extensions ( Partial Code )
 * - Classes
 * ================================================================================= 
 */


/* ----------------------------------------------------------------------------------- */
/* Functionality                                                                       */
/* ----------------------------------------------------------------------------------- */
$functions_file = array(
    'extras.php',
    'content-classes.php',
    'content-formats.php',
    'page-loader.php',
    'template-tags.php',
    'title-controller.php',
    'df-like.class.php',
    'navbar-menu.php'
    
);

foreach ($functions_file as $function) {
    require_once FUNCTIONS_DIR . $function;
}

/* ----------------------------------------------------------------------------------- */
/* Classes                                                                             */
/* ----------------------------------------------------------------------------------- */
// include only for nav menu page
require_once( CLASSES_DIR . 'custom-menu-admin.class.php' );
$mega_menu = new Df_Mega_Menu();

if (is_admin()) {
    require_once EXTENSIONS_DIR . 'meta-box/config-meta-boxes.php';
}