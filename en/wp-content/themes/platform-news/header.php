<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>
		<?php
			echo wp_get_document_title();
		?>
	</title>
	<meta charset="utf-8">
	<!--Import Google Icon Font-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!--Import materialize.css-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.1/css/materialize.min.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/media.css">

	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<style>
		/*mobile*/
		@media screen and (max-width: 767px) {
			.header-bg{
				height: 100%;
			}
			  .box-title {

    font-size: 15px;
}
			.container{
				width: 100%;
			}
			.no-mob-pad{
				padding-left: 0 !important; 
				padding-right: 0 !important;
			}
			.advertisment{
				max-height: 300px;
			}
			.news-title {
    font-size: 20px;
}
			.lang {
				top: auto;
				right: 0;
				margin-top: -50px;
			}
			.menu-item{
				font-size: 10px;
				padding-left: 15px;
			}
			.menu-list{
				height: auto;
			}
			.header-sign-size{
				font-size: 20px;
				display: inline-block;
			}
			.header-sign-sec{
				margin-top: 0;
			}
			.header-sign-thrd{
				font-size: 17px;
			}
			.float-for-mob{
				text-align: center;
			}
		}
	</style>
	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-4847471792519024",
    enable_page_level_ads: true
  });
</script>
</head>

<body>
    <!-- header -->
    <div style="margin-bottom: 0;" class="row header-bg">
    <div class="container">
        <a href="<?php echo get_home_url(); ?>">
            <div class="col l3 m6 s12 header-logo "></div>
        </a>
        <div class="col l5 m6 s12 left float-for-mob">
            <div class="header-sign-size">PLATFORM
                <div class="header-sign-size header-sign-sec">NEWS</div>
            </div>
            <div class="header-sign-thrd">UKRAINIAN AND WORLD NEWS</div>
        </div>
        <div class="col l4 m9 s7">
            <?php
                get_search_form();
            ?>
        </div>
        </div>
    </div>
    <!-- end of the header -->

    <!-- navbar -->
    <div class="lang right ">
        <div id="tabs-swipe-demo" class="tabs ">
            <li class="tab col s3"><a href="<?php echo get_home_url(); ?>/../">УКР</a></li>
            <li class="tab col s3"><a href="<?php echo get_home_url(); ?>/../ru">РУС</a></li>
            <li class="tab col s3"><a href="<?php echo get_home_url(); ?>" class="active">ENG</a></li>
        </div>
    </div>

    <div id="test-swipe-1" class="col s12 menu-list center">
        <?php
            $args = array(
                'taxonomy'      => 'category', // название таксономии с WP 4.5
                'number'        => 8,
                'orderby'       => 'count',
                'order'         => 'DESC',
                'hide_empty'    => true,
                'fields'        => 'all',
                'hierarchical'  => true,
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