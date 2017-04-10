<?php
	get_header();
	
	$search_query = get_search_query();
	echo '	
	<div class="row container cat-block">
		<div class="block-with-line">
			<div class="big-sign-line cat-name">';
				global $lang;
				$sentences1 = '';
				$search_ending = array();
				$sentences2 = '';
				$no_found_text = '';
                if ( $lang == 212 ) {
                    $sentences1 = 'Вы искали: ';
                    $search_ending = array('запись', 'записи', 'записи');
                    $sentences2 = 'По Вашему запросу найдено ';
                    $no_found_text = 'По Вашему запросу ничего не найдено';
                }
                else if ( $lang == 213 ) {
                    $sentences1 = 'You searched for: ';
                    $search_ending = array('record', 'records', 'records');
                    $sentences2 = 'Search results ';
                    $no_found_text = 'Nothing found on your request';
                }
                else {
                	$sentences1 = 'Ви шукали: ';
                	$search_ending = array('запис', 'записи', 'записів');
                	$sentences2 = 'По Вашому запиту знайдено ';
                	$no_found_text = 'За Вашим запитом нічого не знайдено';
                }
            echo '
            <span>' . $sentences1 . '</span>' . $search_query . '</div>';
			$results_number = $wp_query->found_posts;
			$slovo = getNumEnding( $wp_query->found_posts, $search_ending );
			if ( $results_number != 0 ) {
				echo '<div class="search-num">' . $sentences2 . $results_number . ' ' . $slovo . '. </div>';
			}
			else {
				echo '<div class="search-num">' . $no_found_text . '</div>';
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
