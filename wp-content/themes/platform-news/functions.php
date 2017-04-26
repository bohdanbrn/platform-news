<?php
add_theme_support( 'post-thumbnails' );    // adds capabilities to create thumbnails for posts

function short_post_desc( $charlength, $post_id = null ) {  //function for display short content for posts
    //$excerpt = get_the_excerpt();
    $excerpt = '';
    if ( $post_id == null ) {
        $excerpt = get_the_content( $post_id );
    }
    else {
        $excerpt = get_post( $post_id )->post_content;;
    }
    $excerpt = strip_tags( $excerpt );     //removes HTML and PHP tags from a string
    if ( mb_strlen( $excerpt ) > $charlength ) {
        $subex = mb_substr( $excerpt, 0, $charlength );
        return $subex . '...';
    }
    else {
        return $excerpt;
    }
}

function short_post_title( $charlength, $post_id = null ) {    //function for display short title for posts
    $excerpt = get_the_title( $post_id );
    $excerpt = trim( $excerpt );
    if ( mb_strlen( $excerpt ) > $charlength ) {
        $subex = mb_substr( $excerpt, 0, $charlength, 'UTF-8' );
        return $subex . '...';
    }
    else {
        return $excerpt;
    }
}


function show_sec_main_news( $result, $i ) {
    echo '
    
        <div class="main-news-sec">
            <a target="_blank" href="' . get_the_permalink( $result[$i]->id ) . '" class="hover-link-main"> 
                <img class="img-effect" src=' . first_post_image( $result[$i]->id ) . ' alt="' . get_the_title( $result[$i]->id ) . '">
            </a>
            <div>';
                $category = get_the_category( $result[$i]->id );
                if ( !empty( $category ) ) {
                    echo '
                    <div class="news-owner">
                        <a href="#" class="no-style">' . $category[0]->cat_name . '</a>
                    </div>';
                }
                echo '
                <div class="news-content">
                    <a target="_blank" href="' . get_the_permalink( $result[$i]->id ) . '" class="hover-link-main no-style"> 
                        <div class="box-title-small">
                            <span class="hover-link-main">' . get_the_title( $result[$i]->id ) . '</span>
                        </div>
                    </a>
                    <div class="box-title-fot-small">' . get_the_time( 'j.m.Y', $result[$i]->id ) . '</div>' .
                    //<div class="box-title-fot-sec-small">' . get_the_author() . '</div>
                '</div>
            </div>
        </div>';
}

function show_img_post( $post_id = null ) {
    echo '
    <div class="row small-news">
        <div  class="col l6 m6 s6">
            <div class="main-news-small" >
                <a target="_blank" href="' . get_the_permalink( $post_id ) . '" class="hover-link"> 
                    <img class="img-effect" src=' . first_post_image( $post_id ) . ' alt="' . get_the_title( $post_id ) . '">
                </a>
                <div class="">';
                    $category = get_the_category( $post_id );
                    if ( !empty( $category ) ) {
                        echo '
                        <div class="news-owner news-owner-small-block">
                            <a href="' . get_category_link( $category[0]->cat_ID ) . '" class="no-style">' . 
                                $category[0]->cat_name . '
                            </a>
                        </div>';
                    }
                    echo ' 
                    <div class="news-content">
                        <div class="box-title-fot fix-desc-text">' . get_the_time( 'j.m.Y' ) . '</div>' .
                        //<div class="box-title-fot-sec">' . get_the_author() . '</div>
                    '</div>
                </div>
            </div>
        </div>
        <div style="padding-right: 0;" class="col l6 m6 s6">
            <a target="_blank" href="' . get_the_permalink( $post_id ) . '" class="hover-link">
                <div  class="news-owner-small">' . get_the_title( $post_id ) . '</div>
                <div class="news-small-text">' . short_post_desc( 90, $post_id ) . '</div>
            </a>
        </div>
    </div>';
}


function show_default_post( $display_img = null ) {
    echo '
    <div class="news-block">
        <div class="news-title">
            <a target="_blank" href="' . get_the_permalink() . '" class="hover-link"> ' .
                get_the_title() . '
            </a>
        </div>
        <div class="news-time">' . get_the_time('j.m.Y') . '</div>';
        $category = get_the_category();
        if ( !empty( $category ) ) {
            echo '
            <span class="post-category">
                <a href="' . get_category_link( $category[0]->cat_ID ) . '" class="no-style">' .
                    $category[0]->cat_name . '
                </a>
            </span>';
        }

        if ( $display_img == true ) {
            echo '
            <br>
            <a target="_blank" href="' . get_the_permalink() . '" class="hover-link"> 
                <div class="effect-container">
                <img class=" img-effect-small" src="' . first_post_image() . '" alt="' . get_the_title() . '">
                </div>
            </a>';
        }

        echo '
        <div class="news-desc">
            <a target="_blank" href="' . get_the_permalink() . '" class="hover-link">' .
                short_post_desc(450) . '
            </a>
        </div>
        <div class="news-block-line"></div>
    </div>';
}


// Вивід першої картинки з поста
function first_post_image( $post_id = null ) {
    $post = get_post( $post_id );
    $first_img = '';
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    $first_img = $matches [1] [0];
    if ( empty( $first_img ) ) { 
        $first_img = false;
    }
    return $first_img;
}


//pagination settings
    //delete H2 from pagination template
    add_filter( 'navigation_markup_template', 'my_navigation_template', 10, 2 );
    function my_navigation_template( $template, $class ) {
	    return '
	    <nav class="%1$s" role="navigation">
	        <div class="nav-links">%3$s</div>
	    </nav>';
    }
    global $pagination_args;
    $pagination_args = array(
        'prev_text' => __( '&#8249;' ),
        'next_text' => __( '&#8250;' ),
    );
//end pagination settings


//custom login form
    function my_custom_login_logo(){
        echo '
        <style type="text/css">
            h1 a { background-image:url(' . get_template_directory_uri() .'/img/logo/logo.svg) !important;}
        </style>';
    }
    add_action( 'login_head', 'my_custom_login_logo' );
//end custom login form


//algorithm declension of nouns after numerals 
    function getNumEnding( $number, $endingArray ) { 
        $number = $number % 100; 
        if ( $number>=11 && $number<=19 ) { 
            $ending=$endingArray[2]; 
        } 
        else { 
            $i = $number % 10; 
            switch ( $i ) { 
                case (1): $ending = $endingArray[0]; break; 
                case (2): 
                case (3): 
                case (4): $ending = $endingArray[1]; break; 
                default: $ending=$endingArray[2]; 
            } 
        } 
        return $ending; 
    } 
//end algorithm declension of nouns after numerals


// Відключити автоматичне оновлення ядра
define( 'WP_AUTO_UPDATE_CORE', false );
add_filter( 'pre_site_transient_update_core', create_function('$a', "return null;") );
wp_clear_scheduled_hook( 'wp_version_check' );


//сортування записів по даті в адмінці
function order_posts_in_admin_by_id( $query ) {
	if ( is_admin() && $query->is_main_query() ) {
		$query->set( 'orderby', 'date' );
		$query->set( 'order', 'DESC' );
	}
}
add_action( 'pre_get_posts', 'order_posts_in_admin_by_id' );


//ajax pagination
    function true_loadmore_scripts() {
        wp_enqueue_script('jquery'); // скорее всего он уже будет подключен, это на всякий случай
        wp_enqueue_script( 'true_loadmore', get_stylesheet_directory_uri() . '/js/loadmore.js', array('jquery') );
    }
    add_action( 'wp_enqueue_scripts', 'true_loadmore_scripts' );

    function true_load_posts() {
        $args = unserialize(stripslashes($_POST['query']));
        $args['paged'] = $_POST['page'] + 1; // следующая страница
        $args['post_status'] = 'publish';
        $q = new WP_Query( $args );
        if ( $q->have_posts() ) {
            $post_count = 0;
            while ( $q->have_posts() ) {
                $q->the_post();
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
        } //end if
        wp_reset_postdata();
        die();
    }
    add_action('wp_ajax_loadmore', 'true_load_posts');
    add_action('wp_ajax_nopriv_loadmore', 'true_load_posts');
//end ajax pagination


//sidebar
    function true_register_wp_sidebars() {
        /* В боковой колонке - первый сайдбар */
        register_sidebar(
            array(
                'id' => 'true_side', // уникальный id
                'name' => 'Бічна колонка', // название сайдбара
                'description' => 'Перетягніть сюди віджети, щоб додати їх в сайдбар.', // описание
                'before_widget' => '<div id="%1$s" class="side widget %2$s">', // по умолчанию виджеты выводятся <li>-списком
                'after_widget' => '</div>',
                'before_title' => '<h3 class="widget-title">', // по умолчанию заголовки виджетов в <h2>
                'after_title' => '</h3>'
            )
        );
    }
    add_action( 'widgets_init', 'true_register_wp_sidebars' );
//end sidebar

?>