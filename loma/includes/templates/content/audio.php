<?php // File Security Check
if (!empty($_SERVER['SCRIPT_FILENAME']) && basename(__FILE__) == basename($_SERVER['SCRIPT_FILENAME'])) {
    die('You do not have sufficient permissions to access this page!');
} ?>

<article <?php dahz_attr( 'post' ); ?>>
<?php df_audio_post_format(); ?>
	<div class="df-post-content">
		<?php if ( is_single( get_the_ID() ) ) : // If viewing a single post. ?>
			<header class="entry-header">
				<?php df_category_blog(); ?>
				<h2 <?php dahz_attr( 'entry-title' ); ?>><?php single_post_title(); ?></h2>
				<?php df_post_meta(); ?>
			</header><!-- .entry-header -->


			<div <?php dahz_attr( 'entry-content' ); ?>>
				<?php the_content(); ?>
	
				<?php wp_link_pages(); ?>
				
				<?php df_global_rating(); ?>
			</div><!-- .entry-content -->


			<?php
			    df_blog_tags();
                df_single_blog_share();
                df_single_blog_author();
                df_single_blog_postnav();
                df_single_blog_related_post();
            ?>

		<?php else : // If not viewing a single post. ?>
		
		        <header class="entry-header">
					<?php df_category_blog(); ?>
					<?php the_title( '<h2 ' . dahz_get_attr( 'entry-title' ) . '><a href="' . get_permalink() . '" rel="bookmark" itemprop="url">', '</a></h2>' ); ?>
					<?php df_post_meta(); ?>
				</header><!-- .entry-header -->

				<div <?php dahz_attr( 'entry-summary' ); ?>>
					<?php df_blog_content(); // function in includes/admin/functions/template-tags.php ?>
					<?php df_extra_button_post();?>
				</div><!-- .entry-summary -->

		<?php endif; // End single post check. ?>

	<div class="clear"></div>
	</div><!-- df-post-content -->
	
</article>