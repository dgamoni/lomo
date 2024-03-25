<?php
if ( ! class_exists( 'WP_Customize_Control' ) )
    return NULL;

/**
 * Class to create a custom Subtitle control
 */

 class Sub_Title_Custom_Control extends WP_Customize_Control {
  
    public $type = 'sub-title';
   /**
       * Render the content on the theme customizer page
       */
    public function render_content() {
    ?>
      <h4 class="customize-subtitle"><?php echo esc_html( $this->label ); ?></h4>
    <?php
    }
  }
