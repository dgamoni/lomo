<?php
/**
 * Build Settings Customizer
 * @param mixed $wp_manager 
 * @return mixed            
 * @since 1.2.1
 */

class DahzFramework_Customizer_Settings extends DahzFramework_Customizer {

	function add_setting( $wp_manager, $control ) {

		// setting
		$wp_manager->add_setting( 'df_options[' .$control['setting']. ']', array(
				'default'    => isset( $control['default'] ) ? $control['default'] : '',
				'type'       => 'option',
				'capability' => 'edit_theme_options',
				'transport'  => isset( $control['transport'] ) ? $control['transport'] : 'refresh',
			) );

	}
	
}