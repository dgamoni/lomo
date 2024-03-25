<?php

if ( ! class_exists( 'WP_Customize_Control' ) )
    return NULL;

/**
 * Class to create a custom text description control
 */
  class Select_Dropdown_Custom_Control extends WP_Customize_Control {

    public $type = 'select';
    public $mode = 'select';

    public function enqueue() {
     wp_enqueue_style( 'customize-selectric-dropdown', DF_CORE_CSS_DIR . 'selectric.css', null, null);
     wp_enqueue_script( 'customize-selectric-dropdown', DF_CORE_JS_DIR . 'jquery.selectric.min.js', array('jquery'), null, true);
    
    }
      /**
       * Render the content on the theme customizer page
       */
    public function render_content() {
      
          if ( empty( $this->choices ) )
          return;

        
        $ids = preg_replace('/[^a-zA-Z0-9\']/', '_', $this->id);
        $name = '_customize-select-' . $ids;

        ?>
        
        <label>
        <?php if ( ! empty( $this->label ) ) : ?>
            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
          <?php endif;
          if ( ! empty( $this->description ) ) : ?>
            <span class="description customize-control-description"><?php echo $this->description; ?></span>
        <?php endif; ?>
        </label>
         
        
        <?php if( 'search' == $this->mode ): ?>

        <select <?php $this->link(); ?> name="<?php echo esc_attr( $name ); ?>" class="ui search selection dropdown" id="search-select_<?php echo $ids; ?>">
         <?php foreach ( $this->choices as $value => $label ): ?>
            <option value="<?php echo esc_attr( $value ) ?>" <?php selected( $this->value(), $value, false ); ?>><?php echo $label; ?></option>
        <?php endforeach; ?>
        </select>

        <?php else: ?>

        <select <?php $this->link(); ?> name="<?php echo esc_attr( $name ); ?>" class="selectric" id="select_<?php echo $ids; ?>">
        <?php foreach ( $this->choices as $value => $label ): ?>
            <option value="<?php echo esc_attr( $value ) ?>" <?php selected( $this->value(), $value, false ); ?>><?php echo $label; ?></option>
        <?php endforeach; ?>
        </select>

        <?php endif; ?>
       

        <?php if('search' == $this->mode): ?>
          <script>
         (function($) {
          $('#search-select_<?php echo $ids; ?>').dropdown();
          })(jQuery);
          </script>
        <?php else: ?>
          <script>
          (function($) {
          $('#select_<?php echo $ids; ?>').selectric({
            arrowButtonMarkup: '<i class="dropdown icon"></i>'
          });
          })(jQuery);
          </script>
        <?php endif; ?>

      <?php
    }
  }