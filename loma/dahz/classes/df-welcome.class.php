<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

class Dahz_Welcome_Page {
    
    /**
     * __construct function
     */
	public function __construct() {
     
     add_action( 'admin_init', array( &$this, 'welcome_activation' ) );
	}
    
    /**
     * [intro description]
     * @return void 
     */
	private function intro() {

	}

    /**
     * [about_screen description]
     * @return void 
     */
	public function about_screen() {

		$this->intro();

	}

	/**
	 * [welcome_activation description]
	 * @return void 
	 */
	public function welcome_activation() {

		 global $pagenow;
		 if ( is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' )
		 	return;

		  wp_safe_redirect( admin_url( 'index.php?page=dahz-about' ) );
		  exit;

	}

}

new Dahz_Welcome_Page();
