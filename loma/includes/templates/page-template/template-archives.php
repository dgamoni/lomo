<div id="content-wrap" class="df_container-fluid col-full">
	<div id="main-sidebar-container">

		<div <?php dahz_attr('content') ?>>

			<article class="df-template-archive">

	        <?php
	        	// start blog loop
		        $blog_args_arc = array(
		            'post_type' 		=> 'post',
		            'post_status' 		=> 'publish',
		            'posts_per_page' 	=> '10'
		        );

		        query_posts($blog_args_arc);

		        if (have_posts()) : 

			        echo "<header class='entry-header'><h2 class='df-archive-title'>".__('The Last 10 Posts', 'dahztheme')."</h2></header>";
			        echo "<ul class='template-archive-list'>";

			            while (have_posts()) : the_post();   // main loop  
			        		echo "<li>";

					            $title_before 	= '<a href="' . esc_url(get_permalink(get_the_ID())) . '" rel="bookmark" title="' . the_title_attribute(array('echo' => 0)) . '">';
				        		$title_after 	= '</a>';

		       					the_title($title_before, $title_after);
		       					df_post_meta();

			        		echo "</li>";
			            endwhile;

			        echo "</ul>";
		            wp_reset_postdata();

		        endif; // end blog loop

	        	// start month loop
	        	$args_month_arc = array(
					'type'            => 'yearly',
					'format'          => 'html', 
				);

		        echo "<header class='entry-header'><h2 class='df-archive-title'>" . __('Archives by Month', 'dahztheme') . "</h2></header>";
		        echo "<ul class='template-archive-list template-archive-year'>";

				$years = $wpdb->get_col("SELECT DISTINCT YEAR(post_date) FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'post' ORDER BY post_date DESC");

				foreach($years as $year) :	
				
				?>
						<li class="template-archive-month">

							<strong> <?php echo $year; ?></strong> 
						    
						    <ul>
								<?php   
								$months = $wpdb->get_col("SELECT DISTINCT MONTH(post_date) FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'post' AND YEAR(post_date) = '".$year."' ORDER BY post_date DESC");

								foreach($months as $month) : ?>

									<li><a href="<?php echo get_month_link($year, $month); ?>">
						            	<?php echo date( 'F', mktime(0, 0, 0, $month) );?></a>
						            </li>

								<?php endforeach;?>
						    </ul>

						</li>
				<?php 

				endforeach;

		        echo "</ul>";

	        	// end month loop

	        	// start category loop

				$args_category_arc = array(
						'orderby'            => 'name',
						'order'              => 'ASC',
						'style'              => 'list',
						'hide_empty'         => 1,
						'child_of'           => 0,
						'depth'              => 1,
						'title_li'           => "<header class='entry-header'><h2 class='df-archive-title'>".__( 'Archives by Category', 'dahztheme' )."</h2></header>",
						'show_option_none'   => "<h2 class='df-archive-title'>".__( 'No categories', 'dahztheme' )."</h2></header>",
						'taxonomy'           => 'category',
			    );

		        echo "<ul class='template-archive-list'>";
			        wp_list_categories( $args_category_arc );
		        echo "</ul>";
	        	// end category loop

	        	// start post format loop
		      	echo "<header class='entry-header'><h2 class='df-archive-title'>".__('Archives by Format', 'dahztheme')."</h2></header>";

		        echo "<ul class='template-archive-list template-archive-pf'>";
			        echo "<li><a href=".get_post_format_link('aside').">".__('Aside', 'dahztheme')."</a></li>";
			        echo "<li><a href=".get_post_format_link('audio').">".__('Audio', 'dahztheme')."</a></li>";
			        echo "<li><a href=".get_post_format_link('gallery').">".__('Gallery', 'dahztheme')."</a></li>";
			        echo "<li><a href=".get_post_format_link('image').">".__('Image', 'dahztheme')."</a></li>";
			        echo "<li><a href=".get_post_format_link('video').">".__('Video', 'dahztheme')."</a></li>";
			        echo "<li><a href=".get_post_format_link('quote').">".__('Quote', 'dahztheme')."</a></li>";
			        echo "<li><a href=".get_post_format_link('link').">".__('Link', 'dahztheme')."</a></li>";
			        echo "<li><a href=".get_post_format_link('chat').">".__('Chat', 'dahztheme')."</a></li>";
			        echo "<li><a href=".get_post_format_link('standard').">".__('Standard', 'dahztheme')."</a></li>";
			        echo "<li><a href=".get_post_format_link('status').">".__('Status', 'dahztheme')."</a></li>";
		        echo "</ul>";
	        	// end post format loop

	        	// start tags loop
	        	echo "<header class='entry-header'><h2 class='df-archive-title'>" . __('Archives by Tags', 'dahztheme') . "</h2></header>";
		        $tags = get_tags();
				$html = '<div class="tagcloud archive-post-tags">';

				foreach ( $tags as $tag ) {
					$tag_link = get_tag_link( $tag->term_id );
							
					$html .= "<a href='{$tag_link}' title='{$tag->name} Tag' class='{$tag->slug}'>";
					$html .= "{$tag->name}</a>";
				}

				$html .= '</div>';
				echo $html;
	        	// end tags loop
	        ?>

			</article>
   		</div>

		<?php get_sidebar(); ?>

	</div>
	
</div>
