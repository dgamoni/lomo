<article <?php dahz_attr( 'post' ); ?>>

		<?php if ( is_page( get_the_ID() ) ) : // If viewing a single post. ?>

			<div <?php dahz_attr( 'entry-content' ); ?>>
				<?php the_content(); ?>
				<?php       
				  wp_link_pages(array(
		            'before' => '<div class="page-links">' . __('Pages:', 'dahztheme'),
		            'after' => '</div>',
		        )); ?>
			 <div class="clear"></div>
			</div><!-- .entry-content -->
			 <div class="clear"></div>
             <?php edit_post_link(__('Edit', 'dahztheme'), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>'); ?>

		<?php else : // If not viewing a single post. ?>

			<header class="entry-header">
				<?php the_title( '<h2 ' . dahz_get_attr( 'entry-title' ) . '><a href="' . get_permalink() . '" rel="bookmark" itemprop="url">', '</a></h2>' ); ?>
			</header><!-- .entry-header -->

			<div <?php dahz_attr( 'entry-summary' ); ?>>

				<?php df_blog_content(); // function in includes/admin/functions/template-tags.php ?>

			</div><!-- .entry-summary -->

		<?php endif; // End single post check. ?>

	<div class="clear"></div>
</article><!-- .hentry -->