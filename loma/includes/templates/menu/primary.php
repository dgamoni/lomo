<?php
$site_title = get_bloginfo('name');
$site_description = get_bloginfo( 'description' );
$df_logo = df_options('logo');
?>
 <div class="<?php df_navibar_class(); ?>">
 	<div class="df-navibar-inner df_container-fluid">
		<div class="site-branding">
			<h1 class="site-title hide">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="<?php df_sitename_class(); ?>" rel="home"><?php $site_title ; ?></a>
			</h1>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="<?php df_sitename_class(); ?>" rel="home"> <?php echo ( $df_logo == '' ) ? $site_title : '<img src="' . esc_url($df_logo) . '" alt="' . $site_description . '">'; ?></a>
		</div> 
		
        <div class="mobile-menu-container">
            <a class="top-search mobile-top-search" href="#"><i class="df-magnifying"></i></a>
            
            <div class="df-mobile-menu-wrapper">
	            <div class="df-mobile-menu-button-container">
	                <span class="mobile-menu-button"></span>
	            </div>
            </div>

       		<div class="df-mobile-menu-button-close"></div>
        </div><!-- mobile menu container -->

		<?php if ( has_nav_menu( 'primary-menu' ) ) : // Check if there's a menu assigned to the 'primary-menu' location. ?>
			<nav <?php dahz_attr('menu', 'primary-menu');  ?>>
				<?php 
                df_navbar_menu( array(
                    'menu_wraper'       => '<ul id="main-nav" class="df-navi">%MENU_ITEMS%' . "\n" . '</ul>',
                    'menu_items'        =>  "\n" . '<li class="%ITEM_CLASS%"><a href="%ITEM_HREF%"%ESC_ITEM_TITLE%>%ICON%<span>%ITEM_TITLE%%SPAN_DESCRIPTION%</span></a>%SUBMENU%</li> ',
                    'submenu'           => '<ul class="sub-nav df_row-fluid">%ITEM%</ul>',
                    'params'            => array( 'act_class' => 'act', 'please_be_mega_menu' => true ),
                ) ); 
                ?>
			</nav><!-- #site-navigation -->
		<?php else: ?>
			<?php echo sprintf('<ul class="df-navi df-assign-menu"><li><a href="%swp-admin/nav-menus.php">Assign a Menu</a></li></ul>', esc_url( home_url( '/' ) )); ?>
		<?php endif; ?>
	</div>
</div><!-- .df-navibar -->