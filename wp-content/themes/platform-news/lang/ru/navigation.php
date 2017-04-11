<body>
    <!-- header -->
    <div style="margin-bottom: 0;" class="row header-bg">
        <a href="<?php echo get_home_url(); ?>">
            <div class="col l4 m6 s12 header-logo center"></div>
        </a>
        <div class="col l4 m6 s12 left float-for-mob">
            <div class="header-sign-size">PLATFORM
                <div class="header-sign-size header-sign-sec">NEWS</div>
            </div>
            <div class="header-sign-thrd">НОВОСТИ В УКРАИНЕ И МИРЕ</div>
        </div>
        <div class="col l4 m9 s7">
            <?php
                get_search_form();
            ?>
        </div>
    </div>
    <!-- end of the header -->

    <!-- navbar -->
    <div class="lang right">
        <div id="tabs-swipe-demo" class="tabs">
            <form method="post" action="<?php echo get_home_url(); ?>">
                <input type="hidden" name="ua" value="true">
                <input type="submit" value="УКР">
            </form>
            <form method="post" action="<?php echo get_home_url(); ?>">
                <input type="hidden" name="ru" value="true">
                <input type="submit" value="РУС">
            </form>
            <form method="post" action="<?php echo get_home_url(); ?>">
                <input type="hidden" name="en" value="true">
                <input type="submit" value="ENG">
            </form>
            <!--
            <li class="tab col s3"><a href="#test-swipe-1" class="active">УКР</a></li>
            <li class="tab col s3"><a href="#test-swipe-2">РУС</a></li>
            <li class="tab col s3"><a href="#test-swipe-3">ENG</a></li>
            -->
        </div>
    </div>

    <div id="test-swipe-2" class="col s12 menu-list center">
        <?php
            $args = array(
                'taxonomy'      => 'category', // название таксономии с WP 4.5
                'number'        => 8,
                'orderby'       => 'count',
                'order'         => 'DESC',
                'hide_empty'    => true,
                'fields'        => 'all',
                'hierarchical'  => true,
                'child_of'      => 212,
            );
            $myterms = get_terms( $args );
            foreach( $myterms as $term ) {
                echo '
                <span class="menu-item">
                    <a href="' . get_category_link( $term->term_id ) . '" class="hover-link">' . 
                    $term->name . '
                    </a>
                </span>';
            }
        ?>
    </div>
