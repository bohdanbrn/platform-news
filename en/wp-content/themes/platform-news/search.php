<?php
	get_header();
	
	$search_query = get_search_query();
	echo '	
	<div class="row container cat-block">
		<div class="block-with-line">
			<div class="big-sign-line cat-name">';
            $search_ending = array('post', 'posts', 'posts');
            echo '
            <span>You searched: </span>' . $search_query . '</div>';
			$results_number = $wp_query->found_posts;
			$slovo = getNumEnding( $wp_query->found_posts, $search_ending );
			if ( $results_number != 0 ) {
				echo '<div class="search-num">Search results ' . $results_number . ' ' . $slovo . '. </div>';
			}
			else {
				echo '<div class="search-num">Nothing found on your request</div>';
			}
			echo '
			<div class="block-line"></div>
		</div>
	</div>';

	if ( have_posts() ) :
		echo '
		<div class="row container all-news">
    		<div class="col l9 m9 s12">';
				while ( have_posts() ) : the_post(); // Start the Loop
					show_no_img_post();
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
