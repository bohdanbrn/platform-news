<!-- top news block -->
<div class="row container">
    <?php
        $result = $wpdb->get_results( 'SELECT id, post_content, post_title FROM ua_posts WHERE post_type = "post" AND post_content LIKE "%<img %" ORDER BY post_date DESC LIMIT 8' );
        global $display_posts;		//variable to prevent duplicate posts
		$display_posts = array();
        if ( empty( $result ) ) {
            echo "Нічого не знайдено!";
        }
        else {
            //show left block
            $post_count = 0;
            echo '
            <div class="col l7 m7 s12">';
            for ( $i = 0; $i < 3; $i++ ) {
                if ( $post_count == 0 ) {
                    echo '
                    <a href="' . get_the_permalink( $result[$i]->id ) . '" class="hover-link"> 
                        <div class="main-news" style="background-image: url(' . first_post_image( $result[$i]->id ) . ');">
                            <div class="mask">';
                                $category = get_the_category( $result[$i]->id );
                                if ( !empty( $category ) ) {
                                    echo '<div class="news-owner">' . $category[0]->cat_name . '</div>';
                                }
                                echo '
                                <div class="news-content">
                                    <div class="box-title">
                                        <span class="hover-link">' . get_the_title( $result[$i]->id ) . '</span>
                                    </div>
                                    <div class="box-title-fot">' . get_the_time( 'j.m.Y', $result[$i]->id ) . '</div>' .
                                    //<div class="box-title-fot-sec">' . get_the_author() . '</div>
                                '</div>
                            </div>
                        </div>
                    </a>';
                } //end if
                else if ( $post_count == 1 ) {
                    echo '
                    <div style="padding-left: 0;" class="col l6 m6 s12 no-mob-pad">
                        <a href="' . get_the_permalink( $result[$i]->id ) . '" class="hover-link"> 
                            <div class="main-news-sec" style="background-image: url(' . first_post_image( $result[$i]->id ) . ');">
                                <div class="mask">';
                                    $category = get_the_category( $result[$i]->id );
                                    if ( !empty( $category ) ) {
                                        echo '<div class="news-owner">' . $category[0]->cat_name . '</div>';
                                    }
                                    echo '
                                    <div class="news-content">
                                        <div class="box-title-small">
                                            <span class="hover-link">' . get_the_title( $result[$i]->id ) . '</span>
                                        </div>
                                        <div class="box-title-fot-small">' . get_the_time( 'j.m.Y', $result[$i]->id ) . '</div>' .
                                        //<div class="box-title-fot-sec-small">' . get_the_author() . '</div>
                                    '</div>
                                </div>
                            </div>
                        </a>
                    </div>';
                }
                else {
                    echo '
                    <div style="padding-right: 0;" class="col l6 m6 s12 no-mob-pad">
                        <a href="' . get_the_permalink( $result[$i]->id ) . '" class="hover-link"> 
                            <div class="main-news-sec" style="background-image: url(' . first_post_image( $result[$i]->id ) . ');">
                                <div class="mask">';
                                    $category = get_the_category( $result[$i]->id );
                                    if ( !empty( $category ) ) {
                                        echo '<div class="news-owner">' . $category[0]->cat_name . '</div>';
                                    }
                                    echo '
                                    <div class="news-content">
                                        <div class="box-title-small">
                                            <span class="hover-link">' . get_the_title( $result[$i]->id ) . '</span>
                                        </div>
                                        <div class="box-title-fot-small">' . get_the_time( 'j.m.Y', $result[$i]->id ) . '</div>' .
                                        //<div class="box-title-fot-sec-small">' . get_the_author() . '</div>
                                    '</div>
                                </div>
                            </div>
                        </a>
                    </div>';
                } //end else
                $display_posts[] = $result[$i]->id;
                $post_count++;
            } //end for
            echo '
            </div>'; 


            //show right block
            $post_count = 0;
            echo '
            <div class="col l5 m5 s12">
                <div class="block-with-line">
                    <div class="big-sign-line">Популярне</div>
                    <div class="block-line"></div>
                </div>';
                for ( $i = 3; $i < count( $result ); $i++ ) {
                    show_img_post( $result[$i]->id );
                }
                echo '
            </div>';
            $display_posts[] = $result[$i]->id;
            $post_count++;
        } //end else
    ?>

    <div style="background-image: url(https://platform-news.com/wp-content/themes/platform-news/img/ad/reklama1.jpg);" class="col l12 m12 s12 hide advertisment"></div>
</div>

<div class="block-line container"></div>
<!-- end top news block -->

<!-- news block -->
<?php
    $args = array(
        'post_type' => array('post'),
        'posts_per_page' => 9,
        'paged' => ( get_query_var('paged') ) ? get_query_var('paged') : 1,
        'publish' => true,
        'post__not_in' => $display_posts, //displays all news, other than those
        'orderby' => 'date',
        'order' => 'DESC'
    );
    $post_count = 0;
    
    $query = new WP_Query( $args );
    if ( $query->have_posts() ) {
        echo '
        <div class="row container all-news">
            <div class="col l9 m9 s12">';
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

<?php
    get_template_part('template-parts/content', 'footer');
?>
