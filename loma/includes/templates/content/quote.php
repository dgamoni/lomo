<?php // File Security Check
if (!empty($_SERVER['SCRIPT_FILENAME']) && basename(__FILE__) == basename($_SERVER['SCRIPT_FILENAME'])) {
    die('You do not have sufficient permissions to access this page!');
} 

$theme_skin = df_options('theme_skin'); ?>

<article <?php dahz_attr( 'post' ); ?>>

	<div class="df-post-content">

		<?php if ( is_single( get_the_ID() ) ) : // If viewing a single post. ?>

			<div <?php dahz_attr( 'entry-content' ); ?> <?php df_quote_post_bg_image(); ?>>
				<?php df_quote_post_format(); ?>
			</div><!-- .entry-content -->
			
			<header class="entry-header">
				<?php df_category_blog(); ?>

				<?php df_post_meta(); ?>
			</header><!-- .entry-header -->

			<?php if($theme_skin == 'skin1' || $theme_skin == 'skin2'): ?>
				<div <?php dahz_attr( 'entry-content' ); ?>>
			<?php elseif($theme_skin == 'skin3' || $theme_skin == 'skin4'): ?>
				<div <?php dahz_attr( 'entry-content' ); ?> style="padding: 22px 44px;">
			<?php endif; ?>

				<?php the_content(); ?>

				<?php wp_link_pages(); ?>

				<?php df_global_rating(); ?>
			</div>
			
			<?php	
			    df_blog_tags();
                df_single_blog_share();
                df_single_blog_author();
                df_single_blog_postnav();
                df_single_blog_related_post();
            ?>

		<?php else : // If not viewing a single post. ?>
		
	        <header class="entry-header hide">
				<?php the_title( '<h2 ' . dahz_get_attr( 'entry-title' ) . '><a href="' . get_permalink() . '" rel="bookmark" itemprop="url">', '</a></h2>' ); ?>
			</header><!-- .entry-header -->

			<?php //df_post_meta(); ?>

			<div <?php dahz_attr( 'entry-summary' ); ?> <?php df_quote_post_bg_image(); ?>>
				<?php df_quote_post_format(); ?>
			</div><!-- .entry-summary -->

			<?php df_extra_button_post(); ?>

		<?php endif; // End single post check. ?>

		<div class="clear"></div>
	</div><!-- df-post-content -->
</article>