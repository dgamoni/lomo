<?php
if ( has_nav_menu( 'footer-menu' ) ) :
     wp_nav_menu( array(
        'theme_location' => 'footer-menu',
        'container'      => false,
        'menu_class'     => 'footer-navigation df-navi',
        'depth'          => -1 ));
endif;