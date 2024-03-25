<?php

$df_footer_textbox_left_setting 	= df_options('footer_textbox_left_setting');
$df_footer_textbox_right_setting 	= df_options('footer_textbox_right_setting');

$allowed_html = array(
    'a' => array(
            'href' => array(),
            'class' => array()
        ),
    'p' => array()
);

$$df_footer_textbox_left_setting = wp_kses( $df_footer_textbox_left_setting, $allowed_html, "http, https, ftp, mailto");
$df_footer_textbox_right_setting = wp_kses( $df_footer_textbox_right_setting, $allowed_html, "http, https, ftp, mailto");


if (function_exists('icl_register_string')) {
	icl_register_string('Loma Footer Content', 'footer text left – ' . $df_footer_textbox_left_setting, $df_footer_textbox_left_setting ); 
}

if (function_exists('icl_register_string')) {
	icl_register_string('Loma Footer Content', 'footer text right – ' . $df_footer_textbox_right_setting, $df_footer_textbox_right_setting ); 
}

$icl_t 	= function_exists('icl_t');

$footer_text_left = $icl_t ? icl_t('Loma Footer Content', 'footer text left – ' . $df_footer_textbox_left_setting, $df_footer_textbox_left_setting) : $df_footer_textbox_left_setting;
$footer_text_right = $icl_t ? icl_t('Loma Footer Content', 'footer text right – ' . $df_footer_textbox_right_setting, $df_footer_textbox_right_setting) : $df_footer_textbox_right_setting; 

?>

			<footer <?php dahz_attr('footer'); ?>>

				<div class="df_container-fluid">

					<div class="site-info col-full">

						<div id="copyright" class="col-left">

							<?php if( $df_footer_textbox_left_setting  == '' ) : ?>

								<?php dahz_get_menu('footer'); ?>

					        <?php else: ?>

								<p><?php echo stripslashes($footer_text_left); ?></p>

				            <?php endif; ?>

						</div>

						<div id="credit" class="col-right">

							<?php if( $df_footer_textbox_right_setting  == '' ) : ?> 

							    <p><?php echo sprintf( '%1$s %4$s %3$s %2$s', __("Copyright &copy; ", 'dahztheme') . date( 'Y' ), get_bloginfo( 'name' ) . '.', __( 'All Rights Reserved.', 'dahztheme' ), 'DAHZ' ); ?></p>

							<?php else: ?>

								<p><?php echo stripslashes($footer_text_right); ?></p>

							<?php endif; ?>

						</div>

					</div><!-- .site-info -->

				</div>

			</footer>