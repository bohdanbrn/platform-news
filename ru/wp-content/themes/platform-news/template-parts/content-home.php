 <!-- top news block -->
<div class="row container">
    <?php
        $args = array(
            'post_type' => array('post'),
            'posts_per_page' => 3,
            'publish' => true,
            'orderby' => 'date',
            'order' => 'DESC'
        );
        global $display_posts;		//variable to prevent duplicate posts
		$display_posts = array();
        $post_count = 0;
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) {
            echo '
            <div class="col l7 m7 s12">';
            while ( $query->have_posts() ) {
                $query->the_post();
                if ( $post_count == 0 ) {
                    echo '
                    <a href="' . get_the_permalink() . '" class="hover-link"> 
                        <div class="main-news" style="background-image: url(' . first_post_image() . ');">
                            <div class="mask">';
                                $category = get_the_category();
                                if ( !empty( $category ) ) {
                                    echo '<div class="news-owner">' . $category[0]->cat_name . '</div>';
                                }
                                echo '
                                <div class="news-content">
                                    <div class="box-title">
                                        <span class="hover-link">' . short_post_title(65) . '</span>
                                    </div>
                                    <div class="box-title-fot">' . get_the_time('j.m.Y') . '</div>' .
                                    //<div class="box-title-fot-sec">' . get_the_author() . '</div>
                                '</div>
                            </div>
                        </div>
                    </a>';
                } //end if
                else if ( $post_count == 1 ) {
                    echo '
                    <div style="padding-left: 0;" class="col l6 m6 s12 no-mob-pad">
                        <a href="' . get_the_permalink() . '" class="hover-link"> 
                            <div class="main-news-sec" style="background-image: url(' . first_post_image() . ');">
                                <div class="mask">';
                                    $category = get_the_category();
                                    if ( !empty( $category ) ) {
                                        echo '<div class="news-owner">' . $category[0]->cat_name . '</div>';
                                    }
                                    echo '
                                    <div class="news-content">
                                        <div class="box-title-small">
                                            <span class="hover-link">' . short_post_title(65) . '</span>
                                        </div>
                                        <div class="box-title-fot-small">' . get_the_time('j.m.Y') . '</div>' .
                                        //<div class="box-title-fot-sec-small">' . get_the_author() . '</div>
                                    '</div>
                                </div>
                            </div>
                        </a>
                    </div>';
                } //end else if
                else {
                    echo '
                    <div style="padding-right: 0;" class="col l6 m6 s12 no-mob-pad">
                        <a href="' . get_the_permalink() . '" class="hover-link"> 
                            <div class="main-news-sec" style="background-image: url(' . first_post_image() . ');">
                                <div class="mask">';
                                    $category = get_the_category();
                                    if ( !empty( $category ) ) {
                                        echo '<div class="news-owner">' . $category[0]->cat_name . '</div>';
                                    }
                                    echo '
                                    <div class="news-content">
                                        <div class="box-title-small">
                                            <span class="hover-link">' . short_post_title(65) . '</span>
                                        </div>
                                        <div class="box-title-fot-small">' . get_the_time('j.m.Y') . '</div>' .
                                        //<div class="box-title-fot-sec-small">' . get_the_author() . '</div>
                                    '</div>
                                </div>
                            </div>
                        </a>
                    </div>'; 
                } //end else
                $display_posts[] = get_the_ID();
                $post_count++;
            } //end while
            echo '
            </div>';
        } //end if

        global $display_posts;		//variable to prevent duplicate posts
        $args = array(
            'post_type' => array('post'),
            'posts_per_page' => 5,
            'publish' => true,
            'post__not_in' => $display_posts, //displays all articles, other than those
            'orderby' => 'date',
            'order' => 'DESC'
        );
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) {
            echo '
            <div class="col l5 m5 s12">
                <div class="block-with-line">
                    <div class="big-sign-line">Популярное</div>
                    <div class="block-line"></div>
                </div>';
                while ( $query->have_posts() ) {
                    $query->the_post();
                    echo '
                    <div class="row small-news">
                        <a href="' . get_the_permalink() . '" class="hover-link"> 
                            <div class="col l6 m6 s6">
                                <div class="main-news-small" style="background-image: url(' . first_post_image() . ');">
                                    <div class="mask">';
                                        $category = get_the_category();
                                        if ( !empty( $category ) ) {
                                            echo '
                                            <div class="news-owner news-owner-small-block">' . 
                                                $category[0]->cat_name . '
                                            </div>';
                                        }
                                        //<div class="news-content">' . get_the_author() . '</div>
                                        echo '
                                    </div>
                                </div>
                            </div>
                            <div class="col l6 m6 s6">
                                <div class="news-owner-small">' . short_post_title(40) . '</div>
                                <div class="news-small-text">' . short_post_desc(90) . '</div>
                            </div>
                        </a>
                    </div>';
                    $display_posts[] = get_the_ID();
                } //end while
                echo '
            </div>';
        } //end if
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
                    $post_count++;
                    if ( $post_count == 3 ) {
                        show_default_post( $display_img = true );
                        $post_count = 0;
                    }
                    else{
                        show_default_post();
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