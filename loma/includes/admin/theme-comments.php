<?php
/* ----------------------------------------------------------------------------------- */
/* Fist full of comments                                                               */
/* ----------------------------------------------------------------------------------- */
if (!function_exists("dahz_comment")) {

    function dahz_comment($comment, $args, $depth) {
        $GLOBALS['comment'] = $comment;
        ?>

        <li <?php dahz_attr('comment'); ?>>

            <a name="comment-<?php comment_ID() ?>"></a>

            <div id="li-comment-<?php comment_ID() ?>" class="comment-container">

                <?php if (get_comment_type() == 'comment') { ?>
                    <div class="avatar-picture"><?php the_commenter_avatar($args); ?></div>
                <?php } ?>            
                <div class="comment-content">
                    <div class="comment-head">

                        <span <?php dahz_attr( 'comment-author' ); ?>><?php comment_author_link(); ?></span>    
                        <div class="alignright">       
                            <span <?php dahz_attr( 'comment-published' ); ?>><?php echo get_comment_date(get_option('date_format')) ?> <?php _e('at', 'dahztheme'); ?> <?php echo get_comment_time(get_option('time_format')); ?></span>
                            <span <?php dahz_attr( 'comment-permalink' ); ?>><a href="<?php echo esc_url(get_comment_link()); ?>" title="<?php _e('Direct link to this comment', 'dahztheme'); ?>">#</a></span>
                            <span class="edit"><?php edit_comment_link(__('Edit', 'dahztheme'), '', ''); ?></span>
                            <div class="reply">
                                <?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
                            </div><!-- /.reply -->     
                        </div>

                    </div><!-- /.comment-head -->

                    <div <?php dahz_attr( 'comment-content' ); ?> id="comment-<?php comment_ID(); ?>">

                        <?php comment_text() ?>

                        <?php if ($comment->comment_approved == '0') { ?>
                            <p class='unapproved'><?php _e('Your comment is awaiting moderation.', 'dahztheme'); ?></p>
                        <?php } ?>

                    </div><!-- /comment-entry -->
                </div><!-- /.comment-container -->
            </div><!-- /.comment-container -->
            <div class="clear"></div>
            <?php
        }

    }

    /* ----------------------------------------------------------------------------------- */
    /* PINGBACK / TRACKBACK OUTPUT                                                         */
    /* ----------------------------------------------------------------------------------- */
    if (!function_exists('list_pings')) {

        function list_pings($comment, $args, $depth) {

            $GLOBALS['comment'] = $comment;
            ?>	
        <li id="comment-<?php comment_ID(); ?>">
            <span class="author"><?php comment_author_link(); ?></span> - 
            <span class="date"><?php echo get_comment_date(get_option('date_format')); ?></span>
            <span class="pingcontent"><?php comment_text(); ?></span>
            <?php
        }

    }

    /* ----------------------------------------------------------------------------------- */
    /* Commenter Avatar                                                                    */
    /* ----------------------------------------------------------------------------------- */
    if (!function_exists('the_commenter_avatar')) {

        function the_commenter_avatar() {
            global $comment;
            $avatar = get_avatar($comment, 60);
            echo $avatar;
        }

    }
    ?>