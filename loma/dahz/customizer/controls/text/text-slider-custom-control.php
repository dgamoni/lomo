<?php 
if ( ! class_exists( 'WP_Customize_Control' ) )
    return NULL;

    /**
 * Class to create a custom text description control
 */
class Text_Slider_Custom_Control extends WP_Customize_Control
{

	public $type = 'slider';
	/**
    * Enqueue the styles and scripts
    */
    public function enqueue()
    {   
        wp_enqueue_script( 'jquery-ui-slider' );
    }

      /**
       * Render the content on the theme customizer page
       */
      public function render_content()
       {	                                                   
        $ids = preg_replace('/[^a-zA-Z0-9\']/', '_', $this->id);
  		?>
       
  		<label>
  			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
  			<div id="<?php echo esc_attr($ids . 'slider'); ?>" class="slider_df_slider_text"></div>
  			<input id="<?php echo esc_attr($ids . 'input'); ?>" class="input_df_slider_text" type="text" value="<?php echo $this->value(); ?>" <?php $this->link(); ?>>
  		</label>

  		<script>
  		 jQuery(document).ready(function($) {

                $( "#<?php echo esc_attr($ids . 'slider') ?>" ).slider({
                    value: <?php echo $this->value(); ?>,
                    min:   <?php echo $this->choices['min']; ?>, // 0
                    max:   <?php echo $this->choices['max']; ?>, // 100
                    step:  <?php echo $this->choices['step']; ?>, // 5
                    slide: function( event, ui ) {
                        $( "#<?php echo esc_attr($ids . 'input'); ?>" ).val(ui.value).keyup();
                    }
                });
                $( "#<?php echo esc_attr($ids . 'input'); ?>" ).val( $( "#<?php echo esc_attr($ids . 'slider') ?>" ).slider( "value" ) );
                $("#<?php echo esc_attr($ids . 'input'); ?>").on('keyup',function () {
                $("#<?php echo esc_attr($ids . 'slider') ?>").slider("value", this.value);
                });

            });
  		</script>

		<?php
		}
}
?>