<?php /*topbar*/ 

  $ads_banner = df_options('ads_banner');
  if (isset($ads_banner) && $ads_banner != '' ):
     
  
?>
<div class="df-banner-ads">
<?php 
  $allowed_html = array(
    //links
    'img'     => array(
        'src' => array(),
        'alt' => array(),
        'class' => array()
    )
);
  echo wp_kses( $ads_banner, $allowed_html, "http, https, ftp, mailto"); 
?>
</div> 

<?php endif; /*end if banner*/ 

df_ajax_search_front();

 if( df_options('header_topbar') == 1): ?>


<div class="df-topbar">
	<div class="df_container-fluid">
	  <div class="col-left">
        <div class="df-topbar-left">
      	  <?php df_social_connect(); ?>
      	  <?php
           $df_topbar_content = esc_attr(df_options( 'header_topbar_content' ));
           if (function_exists('icl_register_string')) {icl_register_string('Loma Topbar Content', 'topbar text – ' . $df_topbar_content, $df_topbar_content ); } 
              $icl_t = function_exists('icl_t'); 
              $topbar_text = $icl_t ? icl_t('Loma Topbar Content', 'topbar text – ' . $df_topbar_content, $df_topbar_content) : $df_topbar_content;
            if ( $df_topbar_content != '' ) : ?>
            <p class="info-description">
            <?php
              $allowed_html = array(
                  'a' => array(
                          'href' => array(),
                          'class' => array()
                      ),
                  'p' => array()
              ); 
              echo wp_kses( $topbar_text, $allowed_html, "http, https, ftp, mailto"); 
            ?>
            </p>
            <?php endif; ?>
        </div>
      </div>

      <div class="col-right">
        <ul class="df-topbar-right">

            <?php dahz_get_menu('top'); ?>

        </ul>
      </div>	
	</div>
</div>
 
<?php endif; ?>
 
