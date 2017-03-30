<?php get_header(); ?>

<div class="header-margin-tag">
	<div class="row">
		<div class="col l8 m7 s12"> 
			<div class="tag-name-description-archive">УСІ НОВИНИ</div>
			<?php
				$args = array(
                    'post_type' => 'news',
                    'posts_per_page' => 12,
                    'publish' => true,
                    'orderby' => 'date'
                    //'order' => 'DESC'
                );
                $query = new WP_Query( $args );
                if( $query->have_posts() ) {
                    while ( $query->have_posts() ) {
                        $query->the_post();
                        show_latest_news();
                    }
                }
				else {
					echo '<div>НОВИН НЕ ЗНАЙДЕНО</div>';
				}

				if ( $query->max_num_pages > 1 ) { ?>
                    <script>
			            var news_ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
			            var news_true_posts = '<?php echo serialize( $query->query_vars ); ?>';
			            var news_current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
			            var news_max_pages = '<?php echo $query->max_num_pages; ?>';
			        </script>
			        <div id="news_loadmore" class="button_loadmore">Більше новин</div>
	        <?php 
	            } //end if
	            wp_reset_postdata();
			?>
		</div>

		<div class="col l4 m5 s12">
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
<div class="advertisment-all-blogs">
    <?php
        //show advertising block
        get_template_part('template-parts/advertising', 'block-1');
    ?>
</div>

<div class="five-block-with-line hide-on-med-and-down">
    <div class="big-sign-line">НОВИНИ <span>ПАРТНЕРІВ</span></div>
    <div class="block-line"></div>
    <div class="small-sign-line">ОПИТУВАННЯ<img class="line-img-five" alt="line" src="<?php bloginfo('template_url') ?>/img/medical-result.svg"></div>
</div>

<div class="five-block-with-line hide-on-large-only">
    <div class="big-sign-line">НОВИНИ <span>ПАРТНЕРІВ</span></div>
    <div class="block-line"></div>

</div>
<div class="row">

    <div class="col l6 s12 m6 devider">
        <?php
            //show partners news
            get_template_part('template-parts/partners', 'news');
        ?>
    </div>

    <div class="five-block-with-line hide-on-large-only">
        <div class="small-sign-line">ОПИТУВАННЯ<img class="line-img-five" alt="line" src="<?php bloginfo('template_url') ?>/img/medical-result.svg"></div>
        <div class="block-line"></div>
    </div>
    <div class="col l6 s12 m6 ">
        <?php
            //show polls
            get_template_part('template-parts/polls');
        ?>
    </div>
</div>
	<?php
		get_footer();
	?>