<?php
add_theme_support( 'post-thumbnails' ); // adds capabilities to create thumbnails for posts

function short_post_desc( $charlength ) {        //function for display short content for posts
    //$excerpt = get_the_excerpt();
    $excerpt = get_the_content();
    $excerpt = strip_tags( $excerpt );
    if ( mb_strlen( $excerpt ) > $charlength ) {
        $subex = mb_substr( $excerpt, 0, $charlength );
        return $subex . '...';
    }
    else {
        return $excerpt;
    }
}

function short_post_title( $charlength, $post_id = null ) {        //function for display short title for posts
    $excerpt = get_the_title( $post_id );
    $excerpt = trim( $excerpt );
    if ( mb_strlen( $excerpt ) > $charlength ) {
        $subex = mb_substr( $excerpt, 0, $charlength );
        return $subex . '...';
    }
    else {
        return $excerpt;
    }
}


//template for posts on tag.php, category.php, search.php, author.php
function show_no_img_post() {
    echo '
    <div class="news-block">
        <div class="news-title">
            <a href="' . get_the_permalink() . '" class="hover-link">' .
                short_post_title(100) . '
            </a>
        </div>
        <div class="news-time">
            <i class="material-icons"> access_time</i>' .
            get_the_time('j.m.Y') . '
        </div>
        <div class="one-news-owner">
            <a href="#" class="hover-link">
                <i class="material-icons">account_circle</i>' . 
                //get_the_author() . '
            '</a>
        </div>
        <div class="news-desc">
            <a href="' . get_the_permalink() . '" class="hover-link">' .
                short_post_desc( 350 ) . '
            </a>
        </div>
        <div class="news-block-line"></div>
    </div>';
}


function show_default_post( $display_img = null ) {
    echo '
    <div class="news-block">
        <div class="news-title">
            <a href="' . get_the_permalink() . '" class="hover-link"> ' .
                short_post_title(120) . '
            </a>
        </div>
        <div class="news-time">
            <i class="material-icons">access_time</i>' .
            get_the_time('j.m.Y') . '
        </div>
';

        if ( $display_img == true ) {
            echo '
            <a href="' . get_the_permalink() . '" class="hover-link"> 
                <img class="news-img" src="' . first_post_image() . '" alt="news image">
            </a>';
        }

        echo '
        <div class="news-desc">
            <a href="' . get_the_permalink() . '" class="hover-link">' .
                short_post_desc(450) . '
            </a>
        </div>
        <div class="news-block-line"></div>
    </div>';
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
    add_action('login_head', 'my_custom_login_logo');
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


// Вивід першої картинки з поста
function first_post_image() {
    global $post, $posts;
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    $first_img = $matches [1] [0];
    if( empty( $first_img ) ) {
        // укажите путь к изображению, которое будет выводится по умолчанию. 
        $first_img = "/wp-content/themes/platform-news/img/backgrounds/default.png";
    }
    return $first_img;
}


// Відключити автоматичне оновлення ядра
define( 'WP_AUTO_UPDATE_CORE', false );
add_filter( 'pre_site_transient_update_core', create_function('$a', "return null;") );
wp_clear_scheduled_hook('wp_version_check');


//сортування записів по даті в адмінці
function order_posts_in_admin_by_id( $query ) {
	if ( is_admin() && $query->is_main_query() ) {
		$query->set( 'orderby', 'date' );
		$query->set( 'order', 'DESC' );
	}
}
add_action( 'pre_get_posts', 'order_posts_in_admin_by_id' );

?>