<?php $author_ids = get_the_author_meta('ID'); ?>

<div id="main-sidebar-container">
	<div class="df-main col-full">
		<?php df_single_blog_author(); ?>
			<?php 
                if (get_query_var('paged')) : $paged = get_query_var('paged');
                elseif (get_query_var('page')) : $paged = get_query_var('page');
                else : $paged = 1; endif;

                $blog_args = array(
                    'post_type' 	=> 'post',
                    'post_status' 	=> 'publish',
                    'author' 		=> $author_ids,
                    'paged' 		=> $paged,
                );
                query_posts($blog_args); ?>
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