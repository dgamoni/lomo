<?php 
/**
 * Build Controls Customizer
 * @param mixed $wp_manager 
 * @return mixed            
 * @since 1.2.1
 */
class DahzFramework_Customizer_Controls extends DahzFramework_Customizer {

	function add_control( $wp_manager, $control ) {

		// control
			if ( isset( $control['type'] ) && 'description' == $control['type'] ) {
				
				$wp_manager->add_control( new Text_Description_Custom_Control( $wp_manager, 'df_options[' .$control['setting']. ']', array(
				      'label'    => isset( $control['label'] ) ? $control['label'] : '',
				      'section'  => $control['section'],
				      'priority' => $control['priority'],
				      'settings' => 'df_options[' .$control['setting']. ']',
				      'transport'   => isset( $control['transport'] ) ? $control['transport'] : 'refresh',
				)));

			} elseif ( isset( $control['type'] ) && 'sub-title' == $control['type'] ) {

				$wp_manager->add_control( new Sub_Title_Custom_Control( $wp_manager, 'df_options[' .$control['setting']. ']', array(
				      'label'    => isset( $control['label'] ) ? $control['label'] : '',
				      'section'  => $control['section'],
				      'priority' => $control['priority'],
				      'settings' => 'df_options[' .$control['setting']. ']',
				      'transport'   => isset( $control['transport'] ) ? $control['transport'] : 'refresh',
				)));

			} elseif ( isset( $control['type'] ) && 'textarea' == $control['type'] ) {

				$wp_manager->add_control(new Textarea_Custom_Control( $wp_manager, 'df_options[' .$control['setting']. ']', array(
				    'label' => isset( $control['label'] ) ? $control['label'] : '',
				    'section' => $control['section'],
				    'priority' => $control['priority'],
				    'description' => isset( $control['description'] ) ? $control['description'] : null,
				    'settings' => 'df_options[' .$control['setting']. ']',
				    'transport'   => isset( $control['transport'] ) ? $control['transport'] : 'refresh',
				)));

			} elseif ( isset( $control['type'] ) && 'images_radio' == $control['type'] ) {

				$wp_manager->add_control(new Layout_Picker_Custom_Control( $wp_manager, 'df_options[' .$control['setting']. ']', array(
				    'label' => isset( $control['label'] ) ? $control['label'] : '',
				    'section' => $control['section'],
				    'priority'    => $control['priority'],
				    'settings' => 'df_options[' .$control['setting']. ']',
				    'choices' => $control['choices'],
				    'transport'   => isset( $control['transport'] ) ? $control['transport'] : 'refresh',
				)));

			} elseif ( isset( $control['type'] ) && 'slider' == $control['type'] ) {
				
				$wp_manager->add_control(new Text_Slider_Custom_Control( $wp_manager, 'df_options[' .$control['setting']. ']', array(
				    'label' => isset( $control['label'] ) ? $control['label'] : '',
				    'section' => $control['section'],
				    'priority' => $control['priority'],
				    'settings' => 'df_options[' .$control['setting']. ']',
				    'choices' => $control['choices'],
				    'transport'   => isset( $control['transport'] ) ? $control['transport'] : 'refresh',
				)));

			} elseif ( isset( $control['type'] ) && 'uploader' == $control['type'] ) {

				$wp_manager->add_control(new Media_Uploader_Custom_Control( $wp_manager, 'df_options[' .$control['setting']. ']', array(
				    'label' => isset( $control['label'] ) ? $control['label'] : '',
				    'section' => $control['section'],
				    'priority' => $control['priority'],
				    'settings' => 'df_options[' .$control['setting']. ']',
				    'transport'   => isset( $control['transport'] ) ? $control['transport'] : 'refresh',
				)));

			} elseif ( isset( $control['type'] ) && 'image' == $control['type'] ) {

				$wp_manager->add_control( new WP_Customize_Image_Control( $wp_manager, 'df_options[' .$control['setting']. ']', array(
				    'label' => isset( $control['label'] ) ? $control['label'] : '',
				    'section' => $control['section'],
				    'priority' => $control['priority'],
				    'settings' => 'df_options[' .$control['setting']. ']',
				    'transport'   => isset( $control['transport'] ) ? $control['transport'] : 'refresh',
				)));

			} elseif ( isset( $control['type'] ) && 'color' == $control['type'] ) {

				$wp_manager->add_control(new WP_Customize_Color_Control($wp_manager, 'df_options[' .$control['setting']. ']', array(
				    'label' => isset( $control['label'] ) ? $control['label'] : '',
				    'section' => $control['section'],
				    'priority' => $control['priority'],
				    'settings' => 'df_options[' .$control['setting']. ']',
				    'transport'   => isset( $control['transport'] ) ? $control['transport'] : 'refresh',
				)));

			} elseif ( isset( $control['type'] ) && 'select' == $control['type'] ) {

				$wp_manager->add_control(new Select_Dropdown_Custom_Control($wp_manager, 'df_options[' .$control['setting']. ']', array(
				    'label'       => isset( $control['label'] ) ? $control['label'] : '',
				    'section'     => $control['section'],
				    'priority'    => $control['priority'],
				    'choices'     => $control['choices'],
				    'settings' 	  => 'df_options[' .$control['setting']. ']',
				    'mode'        => isset( $control['mode'] ) ? $control['mode'] : 'select', // Can be 'select', 'search' 
				    'transport'   => isset( $control['transport'] ) ? $control['transport'] : 'refresh',
				))); 

			} elseif ( isset( $control['type'] ) && 'checkbox' == $control['type'] ) {

				$wp_manager->add_control(new Checkbox_Custom_Control($wp_manager, 'df_options[' .$control['setting']. ']', array(
				    'label'       => isset( $control['label'] ) ? $control['label'] : '',
				    'section'     => $control['section'],
				    'priority'    => $control['priority'],
				    'settings' 	  => 'df_options[' .$control['setting']. ']',
				    'mode'        => isset( $control['mode'] ) ? $control['mode'] : 'checkbox', // Can be 'checkbox', 'toggle' 
				    'transport'   => isset( $control['transport'] ) ? $control['transport'] : 'refresh',
				)));

			} elseif ( isset( $control['type'] ) && 'radio' == $control['type'] ) {

				$wp_manager->add_control(new Radiobox_Custom_Control($wp_manager, 'df_options[' .$control['setting']. ']', array(
				    'label'       => isset( $control['label'] ) ? $control['label'] : '',
				    'section'     => $control['section'],
				    'priority'    => $control['priority'],
				    'choices'     => $control['choices'],
				    'settings' 	  => 'df_options[' .$control['setting']. ']',
				    'mode'        => isset( $control['mode'] ) ? $control['mode'] : 'radio', // Can be 'radio', 'image' and 'buttonset' 
				    'transport'   => isset( $control['transport'] ) ? $control['transport'] : 'refresh',
				)));

			} else {

				$wp_manager->add_control('df_options[' .$control['setting']. ']', array(
					'type' => isset( $control['type'] ) ? $control['type'] : '',
					'label' => isset( $control['label'] ) ? $control['label'] : '',
					'section' => $control['section'],
					'priority' => $control['priority'],
					'settings' => 'df_options[' .$control['setting']. ']',
					'choices' => isset( $control['choices'] ) ? $control['choices'] : '',
					'transport'   => isset( $control['transport'] ) ? $control['transport'] : 'refresh',
				));

			}

	}
	
}