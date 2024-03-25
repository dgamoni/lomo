<?php while (have_posts()) : the_post(); // Loads the post data. ?>

	<?php dahz_get_content_template(); // Loads the includes/templates/content/*.php template. ?>

	<?php if ( is_singular() ) : // If viewing a single post/page/CPT. ?>

		<?php if ( comments_open() || '0' != get_comments_number() ) : ?>

 			<?php comments_template( '', true ); // Loads the comments.php template. ?>

		<?php endif; ?>

	<?php endif; // End check for single post. ?>

<?php endwhile; // End of loads the post data. ?>