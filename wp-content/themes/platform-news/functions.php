<?php
add_theme_support( 'post-thumbnails' ); // adds capabilities to create thumbnails for posts

function short_post_desc( $charlength ) {        //function for display short content for posts
    //$excerpt = get_the_content();
    $excerpt = get_the_excerpt();
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
            <a href="#" class="hover-link">' .
                short_post_title(100) . '
            </a>
        </div>
        <div class="news-time">
            <a href="#" class="hover-link">
                <i class="material-icons"> access_time</i>' .
                get_the_time('j.m.Y') . '
            </a>
        </div>
        <div class="one-news-owner">
            <a href="#" class="hover-link">
                <i class="material-icons">account_circle</i>Телеканал новин
            </a>
        </div>
        <div class="news-desc">
            <a href="#" class="hover-link">' .
                short_post_desc( 350 ) . '
            </a>
        </div>
        <div class="news-block-line"></div>
    </div>';
}


function show_default_post() {
    echo '
    <div class="news-block">
        <div class="news-title">
            <a href="#" class="hover-link"> ' .
                short_post_title(100) . '
            </a>
        </div>
        <div class="news-time">
            <a href="#" class="hover-link">
                <i class="material-icons"> access_time</i>' .
                get_the_time('j.m.Y') . '
            </a>
        </div>
        <div class="one-news-owner">
            <a href="#" class="hover-link">
                <i class="material-icons">account_circle</i>Телеканал новин
            </a>
        </div>
        <a href="#" class="hover-link"> 
            <img class="news-img" src="' . get_the_post_thumbnail_url( '', 'large' ) . '" alt="news image">
        </a>
        <div class="news-desc">
            <a href="#" class="hover-link">' .
                short_post_desc( 350 ) . '
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
	    </nav>    
	    ';
    }
    $pagination_args = array(
        'prev_text' => __( '&#8249;' ),
        'next_text' => __( '&#8250;' ),
    );

	/*
    Вид базового шаблону:
    <nav class="navigation %1$s" role="navigation">
    <h2 class="screen-reader-text">%2$s</h2>
    <div class="nav-links">%3$s</div>
    </nav>
    */
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

?>