<?php

// Register widgetized areas
if (!function_exists('df_widgets_init')) {

    function df_widgets_init() {
        if (!function_exists('register_sidebars'))
            return;

        // Widgetized sidebars
        register_sidebar(array('name' => __('Primary Sidebar', 'dahztheme'), 'id' => 'primary', 'description' => __('The default primary sidebar for your website, used in two or three-column layouts.', 'dahztheme'), 'before_widget' => '<div id="%1$s" class="widget %2$s">', 'after_widget' => '</div>', 'before_title' => '<h3>', 'after_title' => '</h3>'));
        //register_sidebar( array( 'name' => __( 'Secondary', 'dahztheme' ), 'id' => 'secondary', 'description' => __( 'A secondary sidebar for your website, used in three-column layouts.', 'dahztheme' ), 'before_widget' => '<div id="%1$s" class="widget %2$s">', 'after_widget' => '</div>', 'before_title' => '<h3>', 'after_title' => '</h3>' ) );

        $total = df_options('header_widget_bar');
        if ($total != 0) {
            for ($i = 1; $i <= intval($total); $i++) {
                register_sidebar(array('name' => sprintf(__('Header Widgetbar %d', 'dahztheme'), $i), 'id' => sprintf('header-widget-%d', $i), 'description' => sprintf(__('Widgetized Header Region %d.', 'dahztheme'), $i), 'before_widget' => '<div id="%1$s" class="widget %2$s">', 'after_widget' => '</div>', 'before_title' => '<h3>', 'after_title' => '</h3>'));
            }
        }
        // Footer widgetized areas
        $total1 = df_options('primary_footer_widget_columns');
        if ($total1 != 0) {
            for ($i = 1; $i <= intval($total1); $i++) {
                register_sidebar(array('name' => sprintf(__('Footer %d', 'dahztheme'), $i), 'id' => sprintf('footer-%d', $i), 'description' => sprintf(__('Widgetized Footer Region %d.', 'dahztheme'), $i), 'before_widget' => '<div id="%1$s" class="widget %2$s">', 'after_widget' => '</div>', 'before_title' => '<h3>', 'after_title' => '</h3>'));
            }
        }

        // Extra Footer widgetized areas
        $total2 = df_options('extra_footer_widget_columns');
        if ($total2 != 0) {
            for ($i = 1; $i <= intval($total2); $i++) {
                register_sidebar(array('name' => sprintf(__('Extra Footer %d', 'dahztheme'), $i), 'id' => sprintf('extra-footer-%d', $i), 'description' => sprintf(__('Widgetized Extra Footer Region %d.', 'dahztheme'), $i), 'before_widget' => '<div id="%1$s" class="widget %2$s">', 'after_widget' => '</div>', 'before_title' => '<h3>', 'after_title' => '</h3>'));
            }
        }

        //   	register_sidebar( array( 'name' => __( 'Contact', 'dahztheme' ), 'id' => 'contact', 'description' => __( 'A contact sidebar for your website, used in two or three-column layouts.', 'dahztheme' ), 'before_widget' => '<div id="%1$s" class="widget %2$s">', 'after_widget' => '</div>', 'before_title' => '<h3>', 'after_title' => '</h3>' ) );	
    }

// End the_widgets_init()
}

add_action('widgets_init', 'df_widgets_init');
?>