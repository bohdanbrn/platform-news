<!-- top news block -->
<div class="row container">
    <?php
        $posts_year = $wp_query->query[year];
        $posts_month = $wp_query->query[monthnum];
        $posts_day = $wp_query->query[day];
        
        //default sql-query
        $sql = 'SELECT id, post_content, post_title FROM ua_posts WHERE post_type = "post" AND post_content LIKE "%<img %" ORDER BY post_date DESC LIMIT 8';
        
        //if date was passed
        if ( $wp_query->query ) {
            if ( $posts_year && $posts_month && $posts_day ) {
                //change default sql-request
                $sql = 'SELECT id, post_content, post_title FROM ua_posts WHERE post_type = "post" AND ( ( YEAR( ua_posts.post_date ) =' . $posts_year . ' AND MONTH( ua_posts.post_date ) =' . $posts_month . ' AND DAYOFMONTH( ua_posts.post_date ) =' . $posts_day . ' ) ) AND post_content LIKE "%<img %" ORDER BY post_date DESC LIMIT 8';
            }
        }
        global $wpdb;
        $result = $wpdb->get_results( $sql );
        global $display_posts;		//variable to prevent duplicate posts
		$display_posts = array();
        if ( empty( $result ) ) {
            echo "Нічого не знайдено!";
        }
        else {
            //show left block
            echo '
            <div class="col l7 m7 s12">';
            for ( $i = 0; $i < 3; $i++ ) {
                if ( $i == 0 ) {
                    echo '
                    <div class="main-news">
                        <a target="_blank" href="' . get_the_permalink( $result[$i]->id ) . '" class="hover-link"> 
                            <img class="img-effect" src=' . first_post_image( $result[$i]->id ) . ' alt="' . get_the_title( $result[$i]->id ) . '">
                        </a>
                        <div>';
                            $category = get_the_category( $result[$i]->id );
                            if ( !empty( $category ) ) {
                                echo '
                                <div class="news-owner">
                                    <a href="' . get_category_link( $category[0]->cat_ID ) . '" class="no-style">' . 
                                        $category[0]->cat_name . '
                                    </a>
                                </div>';
                            }
                            echo '
                            <a target="_blank" href="' . get_the_permalink( $result[$i]->id ) . '" class="hover-link"> 
                                <div class="news-content">
                                    <div class="box-title">
                                        <span class="hover-link-main">' . get_the_title( $result[$i]->id ) . '</span>
                                    </div>
                                    <div class="box-title-fot">' . get_the_time( 'j.m.Y', $result[$i]->id ) . '</div>' .
                                //<div class="box-title-fot-sec">' . get_the_author() . '</div>
                                '</div>
                            </a>
                        </div>
                    </div>';

                } //end if
                else if ( $i == 1 ) {
                    echo '
                    <div style="padding-left: 0;" class="col l6 m6 s12 no-mob-pad">';
                        show_sec_main_news( $result, $i );
                        echo '
                    </div>';
                }
                else {
                    echo '
                    <div style="padding-right: 0;" class="col l6 m6 s12 no-mob-pad">';
                        show_sec_main_news( $result, $i );
                        echo '
                    </div>';
                } //end else
                $display_posts[] = $result[$i]->id;
            } //end for
            echo '
            </div>'; 


            //show right block
            echo '
            <div  class="col l5 m5 s12">';
                for ( $i = 3; $i < count( $result ); $i++ ) {
                    show_img_post( $result[$i]->id );
                    $display_posts[] = $result[$i]->id;
                } //end for
                echo '
            </div>';         
        } //end else
    ?>

    <div style="background-image: url(https://media.giphy.com/media/112jVj3oFhHoHu/giphy.gif);" class="col l12 m12 s12 advertisment"><p>ТУТ МОЖЕ БУТИ ВАША РЕКЛАМА!</p></div>
</div>

<div class="block-line container"></div>
<!-- end top news block -->

<!-- news block -->
<?php
    $args = array(
        'post_type' => array('post'),
        'posts_per_page' => 9,
        'paged' => ( get_query_var('paged') ) ? get_query_var('paged') : 1,
        'year' => $posts_year,
        'monthnum' => $posts_month,
        'day' => $posts_day,
        'publish' => true,
        'post__not_in' => $display_posts, //displays all news, other than those
        'orderby' => 'date',
        'order' => 'DESC'
    );
    
    $query = new WP_Query( $args );
    if ( $query->have_posts() ) {
        echo '
        <div class="row container all-news">
            <div class="col l9 m9 s12">';
                $post_count = 0;
                while ( $query->have_posts() ) {
                    $query->the_post();      
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
                
                if ( $query->max_num_pages > 1 ) { ?>
                    <script>
                        var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
                        var news_posts = '<?php echo serialize( $query->query_vars ); ?>';
                        var current_page = <?php echo ( get_query_var('paged') ) ? get_query_var('paged') : 1; ?>;
                        var max_pages = '<?php echo $query->max_num_pages; ?>';
                    </script>
                    <a class="btn waves-effect waves-light" id="loadmore">Завантажити ще </a>

                <?php
                } //end if

				wp_reset_postdata();
                echo '
            </div>';
            
            //sidebar
            get_template_part('template-parts/sidebar');
            echo '
        </div>';
    } //end if
?>

<?php
    get_template_part('template-parts/content', 'footer');
?>
