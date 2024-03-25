<?php get_header(); ?>

	<div <?php dahz_attr('content'); ?>>

		<div id="main-sidebar-container">

			<div class="df-main col-full">

			<?php if (have_posts()) {

					  df_get_template('content', 'search');

					  df_pagenav();

				  } else {

				  	  df_get_template('content', 'none');

				  } ?>

			</div>

			<?php get_sidebar(); ?>

		</div>

	</div>
	
<?php get_footer();?>