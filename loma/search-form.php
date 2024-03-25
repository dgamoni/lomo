<div class="df-search_main">

    <form method="get" class="searchform" action="<?php echo esc_url(home_url( '/' )); ?>">

        <button type="submit" class="fa fa-search submit" name="submit" value="Search"></button>

        <input type="text" class="field s" name="s" value="<?php esc_attr_e( 'Search...', 'dahztheme' ); ?>" onfocus="if (this.value == '<?php _e( 'Search...', 'dahztheme' ); ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e( 'Search...', 'dahztheme' ); ?>';}" />

        <?php //if ( isset( $woo_options['woo_header_search_scope'] ) && $woo_options['woo_header_search_scope'] == 'products' && is_woocommerce_activated() ) { echo '<input type="hidden" name="post_type" value="product" />'; } ?>

    </form>
    
</div>