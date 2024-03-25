<?php 
    $slider     = df_options('slider_sc');
    $ep_enable  = df_options('enable_editor_pick');
?>

<?php

  if ( is_front_page() && is_home() ) {

    if (isset($slider) && $slider != '' ) { 
        echo '<div id="df-slider-header">';
        echo do_shortcode( $slider );
        echo '</div>';
    } elseif (isset($ep_enable) && $ep_enable)  {
        editor_pick_tag();
    }

  } elseif ( is_front_page() ) {

      dahztheme_title_controller(); 

  } elseif ( is_home() ) {

    if (isset($slider) && $slider != '' ) { 
        echo '<div id="df-slider-header">';
        echo do_shortcode( esc_textarea($slider) );
        echo '</div>';
    } elseif (isset($ep_enable) && $ep_enable)  {
        editor_pick_tag();
    }

  } else {
      dahztheme_title_controller(); 
  }
  
?>
<div class="clear"></div>