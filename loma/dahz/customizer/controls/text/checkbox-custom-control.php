<?php

/**
 * Customize for checkbox, extend the WP customizer
 *
 */

if ( ! class_exists( 'WP_Customize_Control' ) )
	return NULL;

class Checkbox_Custom_Control extends WP_Customize_Control
{

	public $type = 'checkbox';
	public $mode = 'checkbox';

	/**
	 * Render the control's content.
	 *
	 * Allows the content to be overriden without having to rewrite the wrapper.
	 *
	 * @since   02/18/2015
	 * @return  void
	 */
	public function render_content() {
		?>

		<?php if ( 'toggle' == $this->mode ) : ?>

		<div class="ui toggle checkbox">
   		 	<input type="checkbox" id="<?php echo esc_attr($this->id); ?>" name="public" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); checked( $this->value() );?> >
    		<label for="<?php echo esc_attr($this->id); ?>"><?php echo esc_html( $this->label ); ?></label>
  		</div>

		<?php else : ?>

		<label>
			<input type="checkbox" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); checked( $this->value() ); ?> />
			<?php echo esc_html( $this->label ); ?>
			<?php if ( ! empty( $this->description ) ) : ?>
				<span class="description customize-control-description"><?php echo $this->description; ?></span>
			<?php endif; ?>
		</label>

  	   <?php endif ?>

		<?php
	}

}