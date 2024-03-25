<div id="main-sidebar-container">
	<div class="df-main col-full">
		<?php if (have_posts()) : ?>
				<div class="<?php df_blog_grid_layout_class(); ?>">
			  <?php while (have_posts()) : the_post();
                        dahz_get_content_template();
                    endwhile;
				 

                    wp_reset_postdata(); ?>
				</div>
		 	<?php df_get_pagination(); ?>
			<?php endif; ?>
	</div>
	<?php get_sidebar(); ?>
</div>