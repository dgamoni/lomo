<?php
/**
 * Build Customizer
 * @param mixed $wp_manager 
 * @return mixed            
 * @since 1.2.1
 */

if ( ! class_exists( 'DahzFramework_Customizer' ) ) :
class DahzFramework_Customizer {

	function __construct() {

		require_once DF_CUSTOMIZER_CONTROL_DIR . 'controls/class-DahzFramework_Controls.php';
		require_once DF_CUSTOMIZER_CONTROL_DIR . 'controls/class-DahzFramework_Settings.php';

		add_action( 'customize_register', array( $this, 'customizer_builder' ), 99 );

	}

	function customizer_builder( $wp_manager ) {

		$controls = $this->get_controls();
		$customizer_settings = new DahzFramework_Customizer_Settings();
		$customizer_controls = new DahzFramework_Customizer_Controls();

		// Early exit if controls are not set or if they're empty
		if ( ! isset( $controls ) || empty( $controls ) ) {
			return;
		}
		foreach ( $controls as $control ) {
			$customizer_settings->add_setting( $wp_manager, $control );
			$customizer_controls->add_control( $wp_manager, $control );
		}

	}

	function get_controls() {

		$controls = apply_filters( 'df_customizer_controls', array() );
		return $controls;

	}

}
$dfc = new DahzFramework_Customizer();
endif;