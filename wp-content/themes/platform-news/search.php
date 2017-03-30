<?php
	get_header();
	
	$search_query = get_search_query();
	echo '	
	<div class="row container cat-block">
		<div class="block-with-line">
			<div class="big-sign-line cat-name"><span>Ви шукали: </span>' . $search_query . '</div>';
			$slovo = getNumEnding( $wp_query->found_posts, array('запис', 'записи', 'записів') );
			$results_number = $wp_query->found_posts;
			if ( $results_number != 0 ) {
				echo '<div class="search-num">По Вашому запиту знайдено ' . $results_number . ' ' . $slovo . '. </div>';
			}
			else {
				echo '<div class="search-num">За Вашим запитом нічого не знайдено</div>';
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
		the_posts_pagination( $pagination_args );
		wp_reset_postdata();
		echo '
			</div>
			<div class="col l3 m3 s12 center">
				<div class="right-block-ad">
					<img src="https://www.promo-webcom.by/files/img/img_for_site/z6.png" alt="ad">
					<img src="http://hyperseo.ru/wp-content/uploads/2013/10/bannernaya-reklama.jpg" alt="ad">
					<img class="hide-on-small-only" src="https://i1.wp.com/www.vibethemes.com/img/canlender.png?resize=400%2C300" alt="ad">
					<img class="hide-on-small-only" src="http://fairheart.ru/wp-content/uploads/2012/05/plagin-kursa-valyut-wordpress.png" alt="ad">
					<img class="hide-on-small-only" src="https://s2.gismeteo.ua/static/images/informer2/samples/ua/inf12.png" alt="ad">
					<img class="hide-on-small-only" src="http://www.createbrand.ru/images/upload/img98.gif" alt="ad">
					<img class="hide-on-small-only" src="https://www.promo-webcom.by/files/img/img_for_site/z6.png" alt="ad">
					<img class="hide-on-small-only" src="http://hyperseo.ru/wp-content/uploads/2013/10/bannernaya-reklama.jpg" alt="ad">
					<img class="hide-on-small-only" src="https://i1.wp.com/www.vibethemes.com/img/canlender.png?resize=400%2C300" alt="ad">
					<img  class="hide-on-small-only" src="http://fairheart.ru/wp-content/uploads/2012/05/plagin-kursa-valyut-wordpress.png" alt="ad">
				</div>
			</div>
		</div>';
	endif; //end if

	get_template_part('template-parts/content', 'footer');

	get_footer();
?>
