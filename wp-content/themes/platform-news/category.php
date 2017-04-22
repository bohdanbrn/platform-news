<?php 
	get_header();
?>

<div class="row container cat-block">
	<div class="block-with-line ">
    	<div class="big-sign-line cat-name">
			<?php
				$search_ending = array('запис', 'записи', 'записів');
				$results_number = $wp_query->found_posts;
				$slovo = getNumEnding( $query->found_posts, $search_ending );
				single_cat_title();
				echo '(' . $wp_query->found_posts . ' ' . $slovo . ')';
				if  ( $results_number == 0 ) {
					echo '<div class="tag-name-description">Публікацій за даною темою не знайдено</div>';
				}
			?>
		</div>
        <div class="block-line"></div>
	</div>
</div>

<?php
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

				/*
				AJAX пагінація
				if ( $wp_query->max_num_pages > 1 ) { ?>
                    <script>
                        var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
                        var news_posts = '<?php echo serialize( $wp_query->query_vars ); ?>';
                        var current_page = <?php echo ( get_query_var('paged') ) ? get_query_var('paged') : 1; ?>;
                        var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
                    </script>
                    <div id="loadmore">Завантажити ще</div>
                <?php
                } //end if
				*/

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