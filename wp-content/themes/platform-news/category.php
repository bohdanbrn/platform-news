<?php 
	get_header();
?>

<div class="row container cat-block">
	<div class="block-with-line ">
    	<div class="big-sign-line cat-name">
			<?php
				global $lang;
				$search_ending = array();
				$no_found_text = '';
                if ( $lang == 212 ) {
                    $search_ending = array('запись', 'записи', 'записи');
                    $no_found_text = 'Публикаций по данной темой не найдено';
                }
                else if ( $lang == 213 ) {                    
                    $search_ending = array('record', 'records', 'records');
                    $no_found_text = 'Publications on the topic dannoy not found';
                }
                else {
                	$search_ending = array('запис', 'записи', 'записів');
                	$no_found_text = 'Публікацій за даною темою не знайдено';
                }
				$results_number = $wp_query->found_posts;
				$slovo = getNumEnding( $query->found_posts, $search_ending );
				single_cat_title();
				echo '(' . $wp_query->found_posts . ' ' . $slovo . ')';
				if  ( $results_number == 0 ) {
					echo '<div class="tag-name-description">' . $no_found_text . '</div>';
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