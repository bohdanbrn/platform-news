<?php
	get_header();
	
	$search_query = get_search_query();
	echo '	
	<div class="row container cat-block">
		<div class="block-with-line">
			<div class="big-sign-line cat-name">';
                	$search_ending = array('запись', 'записи', 'записей');
            echo '
            	<span>Вы искали: </span>"' . $search_query . '"
			</div>';
			$results_number = $wp_query->found_posts;
			$slovo = getNumEnding( $wp_query->found_posts, $search_ending );
			if ( $results_number != 0 ) {
				echo '<div class="search-num">По Вашему запросу найдено ' . $results_number . ' ' . $slovo . '. </div>';
			}
			else {
				echo '<div class="search-num">По Вашему запросу ничего не найдено</div>';
			}
			echo '
			<div class="block-line"></div>
		</div>
	</div>';

	if ( have_posts() ) {
		echo '
		<div class="row container all-news">
    		<div class="col l9 m9 s12">';
				$post_count = 0;
				while ( have_posts() ) {
					the_post();
					$post_img = first_post_image( $post->ID ); //повертає false якщо дний пост не містить зображення
                    //якщо даний пост виводиться третім або більше по порядку та містить зобрадення
                    if ( $post_count >= 2 && $post_img ) {
                        show_default_post( true );
                        $post_count = 0;
                    }
                    else {
                        show_default_post();
                        $post_count++;
                    }
				} //end while
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
	} //end if

	get_template_part('template-parts/content', 'footer');

	get_footer();
?>
