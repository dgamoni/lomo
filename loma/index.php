<?php get_header(); ?>

<div id="content-wrap" class="df_container-fluid col-full">

	<div id="main-sidebar-container">

		<div <?php dahz_attr('content'); ?>>
			
			<?php df_isotope_category_blog(); ?>

			<?php if (have_posts()) : // Check if have post. ?>

				<div class="<?php df_blog_grid_layout_class(); df_blog_list_index_add_class(); ?>">
					
					<?php while (have_posts()) : the_post(); // Loads the post data. ?>
					
						<?php dahz_get_content_template(); // Loads the includes/templates/content/*.php template. ?>

						<?php if ( is_singular() ) : // If viewing a single post/page/CPT. ?>

							<?php if ( comments_open() || '0' != get_comments_number() ) : ?>

					 			<?php comments_template( '', true ); // Loads the comments.php template. ?>

							<?php endif; ?>

			 			<?php endif; // End check for single post. ?>

					<?php endwhile; // End of loads the post data. ?>
			    
			    </div>

				<?php df_get_pagination(); ?>

	  	    <?php else : ?>

			  	<?php df_get_template('content', 'none'); ?>

			<?php endif; ?>
				
   		</div>

		<?php get_sidebar(); ?>

	</div>

</div>

<?php if ( is_single() ) : ?>

	<?php df_single_blog_postnav_wr_thumb(); ?>

	<?php df_single_blog_postnav_wl_thumb(); ?>

<?php endif; ?>

<?php get_footer();	?>