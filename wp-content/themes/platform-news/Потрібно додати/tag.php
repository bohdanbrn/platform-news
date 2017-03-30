'<?php get_header(); ?>

<div class="header-margin-tag">
	<div class="row">
		<div class="col l8 m12 s12"> 
			<div class="tag-name"><?php single_tag_title(); ?></div>
			<div class="tag-name-description">Матеріали за темою</div>
			<?php
				$tag = get_term_by( 'name', single_tag_title('', 0), 'post_tag' ); //ID required category
				$tag_id = $tag->term_id;
				$args = array(
                    'post_type' => array('news', 'articles', 'video', 'blogs', 'cultural_events', 'partner-news' , 'streams'),
                    'tag_id' => $tag_id,
                    'posts_per_page' => 10,
                    'publish' => true,
                    'orderby' => 'date'
                    //'order' => 'DESC'
                );
                $query = new WP_Query( $args );
                if( $query->have_posts() ) {
                    while ( $query->have_posts() ) {
                        $query->the_post();
                        show_no_img_post();
                    }
                }
				else {
					echo '<div> Публікацій за даною категорією не знайдено </div>';
				}
			?>
		</div>

		<div class="col l4 m12 s12">
			<div class="block-with-line hide-on-small-only">
				<div class="big-sign-line">ТОП <span>СТАТТІ</span></div>
				<div class="block-line"></div>
			</div>
				<?php 
				$args = array(
					'post_type' => 'articles',
					'posts_per_page' => 4,
					'publish' => true,
					'orderby' => 'date',
					'order' => 'DESC'
				);
				$query = new WP_Query( $args );
				if( $query->have_posts() ) {
					while ( $query->have_posts() ) {
						$query->the_post();
						echo '<div class="col l12 s12 m12">';
							show_small_post();
						echo '</div>';
					}
				}

			?>
		</div>
	</div>
</div>

<?php get_footer(); ?>