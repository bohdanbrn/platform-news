<?php get_header(); ?>

<div class="row container cat-block">
	<div class="block-with-line ">
    	<div class="big-sign-line cat-name">
			<?php 
				$author_id = get_the_author_meta('ID');
				$posts_count = author_posts_count( $author_id );
				$slovo = getNumEnding( $posts_count, array('post', 'posts', 'posts') );
			?>
			<div class="row">
				<div class="col l10 s12 m12"> 
					<div class="blogger-name">
						<?php
							echo get_the_author_meta('first_name') . ' ' . 
							get_the_author_meta('last_name') . ' (' . $posts_count . ' ' . $slovo . ')';
						?>
					</div>
					<div class="blogger-description">
						<?php echo get_the_author_meta('description'); ?>
					</div>
				</div>
			</div>
			<div class="block-with-line hide-on-small-only">
				<div class="block-line"></div>
				<div class="big-sign-line">
					All author <span>posts</span>
				</div>
				<div class="block-line"></div>
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
							wp_reset_postdata();
							echo '
						</div>';

						//sidebar
						get_template_part('template-parts/sidebar');
						echo '
					</div>';
				} //end if
			?>
		</div>
		<div class="col l4 s12 m6">
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