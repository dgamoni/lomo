<!DOCTYPE html>

<!--[if IE 9]><html class="no-js ie9" <?php language_attributes(); ?>><![endif]-->

<!--[if gt IE 9]><!-->

<html <?php language_attributes(); ?>>

<!--<![endif]-->

    <head>

        <meta charset="<?php echo esc_attr(get_bloginfo('charset')); ?>">

        <?php dahz_meta(); ?>

        <link rel="pingback" href="<?php echo esc_url(get_bloginfo('pingback_url')); ?>">

        <?php wp_head(); ?>

    </head>

    <body <?php dahz_attr('body'); ?>>
    
        <?php df_float_menu(); ?>

        <?php dahz_get_header('page-loader'); // Loads the includes/templates/header/page-loader.php template. ?>
    
        <div id="wrapper" class="hfeed">

            <?php dahz_get_header('widgetbar'); // Loads the includes/templates/header/widgetbar.php template. ?>

            <?php dahz_get_header('topbar'); // Loads the includes/templates/header/topbar.php template. ?>
    
            <header <?php dahz_attr('header'); ?>>

                <?php dahz_get_menu( 'primary' ); // Loads the includes/templates/menu/primary.php template. ?>
                
            </header>

            <?php dahz_get_header('slider-header'); // Loads the includes/templates/header/slider-header.php template. ?>