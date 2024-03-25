<article <?php dahz_attr( 'post' ); ?>>

	<div class="df-post-content">
    
	<?php df_category_blog(); ?>

		<?php if ( is_single( get_the_ID() ) ) : // If viewing a single post. ?>
			 
			<header class="entry-header">
				<h2 <?php dahz_attr( 'entry-title' ); ?>><?php single_post_title(); ?></h2>
			</header><!-- .entry-header -->

			<div <?php dahz_attr( 'entry-content' ); ?>>
				<?php the_content(); ?>
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
				<?php the_title( '<h2 ' . dahz_get_attr( 'entry-title' ) . '><a href="' . get_permalink() . '" rel="bookmark" itemprop="url">', '</a></h2>' ); ?>
			</header><!-- .entry-header -->

				<div <?php dahz_attr( 'entry-summary' ); ?>>

					<?php df_blog_content(); // function in includes/admin/functions/template-tags.php ?>
					
				</div><!-- .entry-summary -->

		<?php endif; // End single post check. ?>

	<div class="clear"></div>
	</div><!-- .df-post-content -->

</article><!-- .entry -->