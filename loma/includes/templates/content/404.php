<?php
$df_header_type         = df_options('404_header_type');
$df_header_image        = esc_url(df_options('404_header_logo'));
$df_header_text         = df_options('404_header_text');
$df_enable_content_text = df_options('enable_content_text');
$df_404_text            = df_options('404_page_text');
$enable_search_form     = df_options('enable_search_form');
?>

<section class="error-404 not-found">
    <div class="df_row-fluid">
        <div class="page-content df_span-sm-6">
            <div class="warpper-404">
                <div class="content-404">
                    <div class="header-404">
                        <?php if ($df_header_type == 'text') : ?>
                            <?php if ($df_header_text != '') : ?>
                                <h1 class="header-404-title"><?php echo esc_attr($df_header_text); ?></h1>
                            <?php else : ?>
                                <h1 class="header-404-title"><?php _e('Page Not Found', 'dahztheme'); ?></h1>
                            <?php endif; ?>
                        <?php elseif ($df_header_type == 'logo') : ?>
                            <img src="<?php echo $df_header_image; ?>" alt="header_404_logo"/>
                        <?php endif; ?>
                    </div>
                    <div class="text-404">
                        <?php if($df_enable_content_text != '0'): ?>
                            <?php if($df_404_text == ''): ?>
                                <p><?php _e('We`re sorry!', 'dahztheme'); ?><br /><?php _e('We can`t seem to find the page you`re looking for.', 'dahztheme'); ?><br /><?php _e('Please try your search again or go to ', 'dahztheme'); ?><a class="df-link" href="<?php echo esc_url(get_home_url()); ?>"><?php _e('Homepage', 'dahztheme'); ?></a></p>
                            <?php else: ?>
                                <p><?php echo esc_textarea($df_404_text); ?></p>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                    <?php if ($enable_search_form != '0') { get_search_form(); } ?>
                </div>
            </div>
        </div><!-- .page-content -->
    </div>
</section><!-- .error-404 -->
