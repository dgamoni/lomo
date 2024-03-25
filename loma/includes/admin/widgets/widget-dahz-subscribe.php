<?php
// File Security Check
if (!defined('ABSPATH'))
    exit;
/* -----------------------------------------------------------------------------------

  TABLE OF CONTENTS

  - function (constructor)
  - function widget ()
  - function update ()
  - function form ()

  - Register the widget on `widgets_init`.

  ----------------------------------------------------------------------------------- */

class Dahz_Widget_Subscribe extends WP_Widget {
    /* ----------------------------------------
      Constructor.
      ----------------------------------------

     * The constructor. Sets up the widget.
      ---------------------------------------- */

    function Dahz_Widget_Subscribe() {

        /* Widget settings. */
        $widget_ops = array('classname' => 'widget_dahz_subscribe', 'description' => __('This is a DahzFramework standardized Add a subscribe/connect widget.', 'dahztheme'));

        /* Widget control settings. */
        $control_ops = array('width' => 250, 'height' => 350, 'id_base' => 'dahz_subscribe');

        /* Create the widget. */
        $this->WP_Widget('dahz_subscribe', __('DF Widget - Subscribe / Connect', 'dahztheme'), $widget_ops, $control_ops);
    }

// End Constructor

    /* ----------------------------------------
      widget()
      ----------------------------------------

     * Displays the widget on the frontend.
      ---------------------------------------- */

    function widget($args, $instance) {

        $html = '';

        extract($args, EXTR_SKIP);

        /* Our variables from the widget settings. */
        $title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);


        $form = $instance['form'];
        $social = $instance['social'];
        //$single = $instance['single'];
        //$page = $instance['page'];


        /* Before widget (defined by themes). */
        echo $before_widget;

        /* Widget content. */

        if ($title) {

            echo $before_title . esc_attr( $title ) . $after_title;
        }
        ?>

        <p><?php
            if (df_options('connect_content') != '')
                echo stripslashes(df_options('connect_content'));
            ?></p>


        <?php if ($form != 'on') { ?>
            <p> <?php  echo esc_attr( __('Subscribe to our e-mail newsletter to receive updates.', 'dahztheme') ); ?> </p>
            <form class="newsletter-form" action="<?php echo esc_url( 'http://feedburner.google.com/fb/a/mailverify' ) ?>" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=<?php echo esc_js( df_options('connect_newsletter_id') ); ?>', 'popupwindow', 'scrollbars=yes,width=550,height=520');
                                return true">
                <input class="email" type="text" name="email" value="<?php echo esc_js( __('E-mail', 'dahztheme') ); ?>" onfocus="if (this.value == '<?php echo esc_js( __('E-mail', 'dahztheme') ); ?>') {
                                        this.value = '';
                                    }" onblur="if (this.value == '') {
                                                this.value = '<?php echo esc_js( __('E-mail', 'dahztheme') ); ?>';
                                            }" />
                <input type="hidden" value="<?php echo esc_attr( df_options('connect_newsletter_id') ); ?>" name="uri"/>
                <input type="hidden" value="<?php echo esc_attr(get_bloginfo('name')); ?>" name="title"/>
                <input type="hidden" name="loc" value="en_US"/>
                <input class="submit button" type="submit" name="submit" value="<?php echo esc_attr( __('Subscribe', 'dahztheme') ); ?>" />
            </form>

            <?php 
        }

        if ($social != 'on') {

            df_social_connect();
        }

        /* After widget (defined by themes). */
        echo $after_widget;
    }

// End widget()

    /* ----------------------------------------
      update()
      ----------------------------------------

     * Function to update the settings from
     * the form() function.

     * Params:
     * - Array $new_instance
     * - Array $old_instance
      ---------------------------------------- */

    function update($new_instance, $old_instance) {

        $instance = $old_instance;

        /* Strip tags for title and name to remove HTML (important for text inputs). */
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['form'] = esc_attr($new_instance['form']);
        $instance['social'] = esc_attr($new_instance['social']);

        return $instance;
    }

// End update()

    /* ----------------------------------------
      form()
      ----------------------------------------

     * The form on the widget control in the
     * widget administration area.

     * Make use of the get_field_id() and 
     * get_field_name() function when creating
     * your form elements. This handles the confusing stuff.

     * Params:
     * - Array $instance
      ---------------------------------------- */

    function form($instance) {

        /* Set up some default widget settings. */
        $defaults = array('title' => __('Subscribe / Connect', 'dahztheme'), 'form' => '', 'social' => '', 'single' => '', 'page' => '');
        $instance = wp_parse_args((array) $instance, $defaults);
        ?>
        <!-- No options -->
        <p><em><?php printf(__('Setup this widget in your <a href="%s">customizer</a> under <strong>Connect</strong>', 'dahztheme'), esc_url( admin_url('customize.php') ) ); ?></em>.</p>
        <!-- Widget Title: Text Input -->
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title (optional):', 'dahztheme'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr($instance['title']); ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />
        </p>
        <!-- Widget Subscribe Form: Checkbox Input -->
        <p>
            <input id="<?php echo $this->get_field_id('form'); ?>" name="<?php echo $this->get_field_name('form'); ?>" type="checkbox"<?php checked($instance['form'], 'on'); ?> />
            <label for="<?php echo $this->get_field_id('form'); ?>"><?php _e('Disable Subscription Form', 'dahztheme'); ?></label>
        </p>
        <!-- Widget Social Icons: Checkbox Input -->
        <p>
            <input id="<?php echo $this->get_field_id('social'); ?>" name="<?php echo $this->get_field_name('social'); ?>" type="checkbox"<?php checked($instance['social'], 'on'); ?> />
            <label for="<?php echo $this->get_field_id('social'); ?>"><?php _e('Disable Social Icons', 'dahztheme'); ?></label>
        </p>

        <?php
    }

// End form()
}

// End Class

/* ----------------------------------------
  Register the widget on `widgets_init`.
  ----------------------------------------

 * Registers this widget.
  ---------------------------------------- */

add_action('widgets_init', create_function('', 'return register_widget("Dahz_Widget_Subscribe");'), 1);
?>