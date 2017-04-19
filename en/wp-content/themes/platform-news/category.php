<?php 
	get_header();
?>

<div class="row container cat-block">
	<div class="block-with-line ">
    	<div class="big-sign-line cat-name">
			<?php
				$search_ending = array('post', 'posts', 'posts');
				$results_number = $wp_query->found_posts;
				$slovo = getNumEnding( $query->found_posts, $search_ending );
				single_cat_title();
				echo '(' . $wp_query->found_posts . ' ' . $slovo . ')';
				if  ( $results_number == 0 ) {
					echo '<div class="tag-name-description">No publications found for this topic.</div>';
				}
			?>
		</div>
        <div class="block-line"></div>
	</div>
</div>

<?php
	if ( have_posts() ) :
		echo '
		<div class="row container all-news">
			<div class="col l9 m9 s12">';
				while ( have_posts() ) : the_post(); // Start the Loop
					show_default_post();
				endwhile; //end while
				echo '<div class="clear"></div>';
				global $pagination_args;
				the_posts_pagination( $pagination_args );
				wp_reset_postdata();
				echo '
			</div>';

			//sidebar
            get_template_part('template-parts/sidebar');
			echo '
		</div>';
	endif; //end if
	
	get_template_part('template-parts/content', 'footer');

 	get_footer();
?>