<?php

/**
 * Customize for checkbox, extend the WP customizer
 *
 */

if ( ! class_exists( 'WP_Customize_Control' ) )
	return NULL;

class Radiobox_Custom_Control extends WP_Customize_Control
{

	public $type = 'radio';
	public $mode = 'radio';

	public function enqueue() {

		if ( 'buttonset' == $this->mode || 'image' == $this->mode ) {
			wp_enqueue_script( 'jquery-ui-button' );
		}

	}

	/**
	 * Render the control's content.
	 *
	 * Allows the content to be overriden without having to rewrite the wrapper.
	 *
	 * @since   02/18/2015
	 * @return  void
	 */
	public function render_content() {

		if ( empty( $this->choices ) ) {
			return;
		}

		$name = '_customize-radio-' . $this->id;
		$ids = preg_replace('/[^a-zA-Z0-9\']/', '_', $this->id);

		if ( ! empty( $this->label ) ) : ?>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
		<?php endif; ?>
        

		<div id="input_<?php echo $ids; ?>" class="<?php echo $this->mode; ?>">

		<?php // Radio Button
		 if ( 'buttonset' == $this->mode ) : ?>
		
		<?php foreach ( $this->choices as $value => $label ) : ?>
			<input type="radio" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" id="<?php echo $this->id . $value; ?>" <?php $this->link(); checked( $this->value(), $value ); ?>>
				<label for="<?php echo $this->id . $value; ?>">
					<?php echo esc_html( $label ); ?>
				</label>
			</input>
		<?php endforeach; ?>
		
		<?php // Radio Image
		 elseif( 'image' == $this->mode ) : ?>

		<?php foreach ( $this->choices as $value => $label ) : ?>
			<input type="radio" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" id="<?php echo $this->id . $value; ?>" <?php $this->link(); checked( $this->value(), $value ); ?>>
				<label for="<?php echo $this->id . $value; ?>">
					<img src="<?php echo esc_html( $label ); ?>">
				</label>
			</input>
		<?php endforeach; ?>

		<?php // Default Radio
		 else : ?>

			<?php foreach ( $this->choices as $value => $label ) :	?>
				<label>
					<input type="radio" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?> />
					<?php echo esc_html( $label ); ?><br/>
				</label>
			<?php endforeach; ?>

  	   <?php endif; ?>

		</div>

		<?php if ( 'buttonset' == $this->mode || 'image' == $this->mode ) : ?>
			<script>
			jQuery(document).ready(function($) {
				$( '[id="input_<?php echo $ids; ?>"]' ).buttonset();
			});
			</script>
		<?php endif; ?>

		<?php
	}

}