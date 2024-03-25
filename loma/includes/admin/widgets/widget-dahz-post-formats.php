<?php
if (!defined('ABSPATH'))
    exit;

class Dahz_Widget_Post_Formats extends WP_Widget {

    /**
     * The supported post formats.
     *
     * @access private
     * @since Twenty Fourteen 1.0
     *
     * @var array
     */
    private $formats = array('audio', 'gallery', 'image', 'video', 'quote', 'link', 'aside', 'chat', 'status');

    /**
     * Constructor.
     *
     * @since Twenty Fourteen 1.0
     *
     * @return Dahz_Widget_Post_Formats
     */
    public function Dahz_Widget_Post_Formats() {
        $this->WP_Widget('widget_dahz_post_formats', __('DF Widget - Post Formats', 'dahztheme'), array(
            'classname' => 'widget_dahz_post_formats',
            'description' => __('This is a DahzFramework standardized Use this widget to list your recent Quote, Video, Audio, Image, Gallery, and Link posts.', 'dahztheme'),
        ));
    }

    /**
     * Output the HTML for this widget.
     *
     * @access public
     * @since Twenty Fourteen 1.0
     *
     * @param array $args     An array of standard parameters for widgets in this theme.
     * @param array $instance An array of settings for this widget instance.
     */
    public function widget($args, $instance) {
        $format = $instance['format'];

        switch ($format) {
            case 'video':
                $format_string = __('Videos', 'dahztheme');
                $format_string_more = __('More videos', 'dahztheme');
                break;
            case 'audio':
                $format_string = __('Audio', 'dahztheme');
                $format_string_more = __('More audio', 'dahztheme');
                break;
            case 'quote':
                $format_string = __('Quotes', 'dahztheme');
                $format_string_more = __('More quotes', 'dahztheme');
                break;
            case 'link':
                $format_string = __('Links', 'dahztheme');
                $format_string_more = __('More links', 'dahztheme');
                break;
            case 'gallery':
                $format_string = __('Galleries', 'dahztheme');
                $format_string_more = __('More galleries', 'dahztheme');
                break;
            case 'aside':
                $format_string = __('Asides', 'dahztheme');
                $format_string_more = __('More asides', 'dahztheme');
                break;
            case 'chat':
                $format_string = __('Chats', 'dahztheme');
                $format_string_more = __('More chats', 'dahztheme');
                break;
            case 'status':
                $format_string = __('Statuses', 'dahztheme');
                $format_string_more = __('More statuses', 'dahztheme');
                break;                
            case 'image':
            default:
                $format_string = __('Images', 'dahztheme');
                $format_string_more = __('More images', 'dahztheme');
                break;
        }

        $number = empty($instance['number']) ? 2 : absint($instance['number']);
        $title = apply_filters('widget_title', empty($instance['title']) ? $format_string : $instance['title'], $instance, $this->id_base);

        $ephemera = new WP_Query(array(
            'order' => 'DESC',
            'posts_per_page' => $number,
            'no_found_rows' => true,
            'post_status' => 'publish',
            'post__not_in' => get_option('sticky_posts'),
            'tax_query' => array(
                array(
                    'taxonomy' => 'post_format',
                    'terms' => array("post-format-$format"),
                    'field' => 'slug',
                    'operator' => 'IN',
                ),
            ),
        ));

        if ($ephemera->have_posts()) :
            $tmp_content_width = $GLOBALS['content_width'];
            $GLOBALS['content_width'] = 306;

            echo $args['before_widget'];
            ?>
            <h3 class="widget-title <?php echo esc_attr($format); ?>">
                <a class="entry-format" href="<?php echo esc_url(get_post_format_link($format)); ?>"><?php echo esc_attr( $title ); ?></a>
            </h3>
            <ul>

                <?php
                while ($ephemera->have_posts()) :
                    $ephemera->the_post();
                    $tmp_more = $GLOBALS['more'];
                    $GLOBALS['more'] = 0;
                    ?>
                    <li>
                        <article <?php post_class(); ?>>
                            <div class="entry-content">
                                <?php
                                if (has_post_format('gallery')) :

                                    if (post_password_required()) :
                                        the_content(__('Continue reading', 'dahztheme'));
                                    else :
                                        df_gallery_post_format();

                                        // if (has_post_thumbnail()) :
                                            ?>
                                            <!-- <a href="<?php echo esc_url( get_permalink() ); ?>"><?php //echo the_post_thumbnail('full'); ?></a> -->
                                        <?php 
                                        // endif; 
                                        ?>
<!--                                         <p class="wp-caption-text"><em>

                                            </em></p> -->


                                    <?php
                                    endif;

                                elseif (has_post_format('image')) :

                                    df_image_post_format();

                                elseif (has_post_format('quote')) :

                                    df_quote_post_format();

                                elseif (has_post_format('video')) :

                                    df_video_post_format();

                                elseif (has_post_format('audio')) :

                                    df_audio_post_format();

                                elseif (has_post_format('link')) :

                                    df_link_post_format();

                                elseif (has_post_format('chat')) :

                                    the_excerpt();

                                elseif (has_post_format('status')) :

                                    df_status_post_format();

                                elseif (has_post_format('aside')) :

                                    df_aside_post_format();
                                else :
                                    the_content(__('Continue reading', 'dahztheme'));
                                endif;
                                ?>
                            </div><!-- .entry-content -->

                        <?php if (!has_post_format('aside')): ?>
                                
                            <header class="entry-header">
                                <div class="entry-meta">
                                    <?php
                                    if (!has_post_format('link')) :
                                        the_title('<span class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></span>');
                                        echo '<br />';
                                    endif;                                   
  
                                    printf('<span class="entry-date"><a href="%1$s" rel="bookmark"><time class="entry-date" datetime="%2$s">%3$s</time></a></span><span class="byline"><span class="author vcard">by <a class="url fn n" href="%4$s" rel="author">%5$s</a></span></span>', esc_url(get_permalink()), esc_attr(get_the_date('c')), esc_html(get_the_date()), esc_url(get_author_posts_url(get_the_author_meta('ID'))), get_the_author(), '&#124;'
                                    );

                                    if (!post_password_required() && ( comments_open() || get_comments_number() )) :
                                        ?>
                                        <span class="comments-link"><?php comments_popup_link(__('Leave a comment', 'dahztheme'), __('1 Comment', 'dahztheme'), __('% Comments', 'dahztheme')); ?></span>
                                    <?php endif; ?>
                                </div><!-- .entry-meta -->
                            </header><!-- .entry-header -->
                            
                        <?php endif ?>
                        </article><!-- #post-## -->
                    </li>
                <?php endwhile; ?>

            </ul>
            <a class="post-format-archive-link" href="<?php echo esc_url(get_post_format_link($format)); ?>">
                <?php
                if (is_rtl()) {
                    /* translators: used with More archives link */
                    printf(__('%s <span class="meta-nav">&larr;</span>', 'dahztheme'), $format_string_more);
                } else {
                    /* translators: used with More archives link */
                    printf(__('%s <span class="meta-nav">&rarr;</span>', 'dahztheme'), $format_string_more);
                }
                ?>
            </a>
            <?php
            echo $args['after_widget'];

            // Reset the post globals as this query will have stomped on it.
            wp_reset_postdata();

            $GLOBALS['more'] = $tmp_more;
            $GLOBALS['content_width'] = $tmp_content_width;

        endif; // End check for ephemeral posts.
    }

    /**
     * Deal with the settings when they are saved by the admin.
     *
     * Here is where any validation should happen.
     *
     * @since Twenty Fourteen 1.0
     *
     * @param array $new_instance New widget instance.
     * @param array $instance     Original widget instance.
     * @return array Updated widget instance.
     */
    function update($new_instance, $instance) {
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['number'] = empty($new_instance['number']) ? 2 : absint($new_instance['number']);
        if (in_array($new_instance['format'], $this->formats)) {
            $instance['format'] = $new_instance['format'];
        }

        return $instance;
    }

    /**
     * Display the form for this widget on the Widgets page of the Admin area.
     *
     * @since Twenty Fourteen 1.0
     *
     * @param array $instance
     */
    function form($instance) {
        $title = empty($instance['title']) ? '' : esc_attr($instance['title']);
        $number = empty($instance['number']) ? 2 : absint($instance['number']);
        $format = isset($instance['format']) && in_array($instance['format'], $this->formats) ? $instance['format'] : 'image';
        ?>
        <p><label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php _e('Title:', 'dahztheme'); ?></label>
            <input id="<?php echo esc_attr($this->get_field_id('title')); ?>" class="widefat" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>"></p>

        <p><label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php _e('Number of posts to show:', 'dahztheme'); ?></label>
            <input id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr($number); ?>" size="3"></p>

        <p><label for="<?php echo esc_attr($this->get_field_id('format')); ?>"><?php _e('Post format to show:', 'dahztheme'); ?></label>
            <select id="<?php echo esc_attr($this->get_field_id('format')); ?>" class="widefat" name="<?php echo esc_attr($this->get_field_name('format')); ?>">
                <?php foreach ($this->formats as $slug) : ?>
                    <option value="<?php echo esc_attr($slug); ?>"<?php selected($format, $slug); ?>><?php echo get_post_format_string($slug); ?></option>
                <?php endforeach; ?>
            </select>
            <?php
        }

    }
    
    add_action('widgets_init', create_function('', 'return register_widget("Dahz_Widget_Post_Formats");'), 1);

    