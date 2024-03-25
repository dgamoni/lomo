<?php
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

class Dahz_Widget_Search extends WP_Widget {
    /* ----------------------------------------
      Constructor.
      ----------------------------------------

     * The constructor. Sets up the widget.
      ---------------------------------------- */

    function Dahz_Widget_Search() {

        /* Widget settings. */
        $widget_ops = array('classname' => 'widget_dahz_search', 'description' => __('This is a DahzFramework standardized search widget.', 'dahztheme'));

        /* Widget control settings. */
        $control_ops = array('width' => 250, 'height' => 350, 'id_base' => 'dahz_search');

        /* Create the widget. */
        $this->WP_Widget('dahz_search', __('DF Widget - Search', 'dahztheme'), $widget_ops, $control_ops);
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
        $title = apply_filters('widget_title', $instance['title'], $instance, $this->id_base);

        /* Before widget (defined by themes). */
        echo $before_widget;

        /* Display the widget title if one was input (before and after defined by themes). */
        if ($title) {

            echo $before_title . esc_attr( $title ) . $after_title;
        } // End IF Statement

        /* Widget content. */

        // Add actions for plugins/themes to hook onto.
        do_action('widget_dahz_search_top');

        // Load the search form.
        if (function_exists('get_template_part')) {
            get_template_part('search', 'form');
        } else {
            // If we're in an older version of WordPress, cater for child theme files.
            $search_file = '/search-form.php';
            $search_file_path = DF_THEME_DIR . $search_file;

            if (is_child_theme() && file_exists(DF_CHILD_THEME_DIR . $search_file)) {
                $search_file_path = DF_CHILD_THEME_DIR . $search_file;
            }

            include( $search_file_path );
        }

        // Add actions for plugins/themes to hook onto.
        do_action('widget_dahz_search_bottom');

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
        $defaults = array(
            'title' => __('Search', 'dahztheme')
        );

        $instance = wp_parse_args((array) $instance, $defaults);
        ?>
        <!-- Widget Title: Text Input -->
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title (optional):', 'dahztheme'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('title'); ?>"  value="<?php echo esc_attr($instance['title']); ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />
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

add_action('widgets_init', create_function('', 'return register_widget("Dahz_Widget_Search");'), 1);
?>