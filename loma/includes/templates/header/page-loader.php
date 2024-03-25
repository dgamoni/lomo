<?php 
$page_transition = df_options('df_page_loader');
$loading_animation_image = esc_url(df_options('loading_animation_image'));

if($page_transition) : ?>
    <div class="ajax_loader">
        <div class="ajax_loader_1">
            <?php if($loading_animation_image != "") : ?>
            <div class="ajax_loader_2">
                <img src="<?php echo $loading_animation_image; ?>" alt="" />
            </div>
            <?php else: df_loading_spinners(); endif; ?>
        </div>
    </div>
<?php endif ?>