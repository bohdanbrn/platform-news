<!DOCTYPE html>
<html lang="zxx">
<head>
  <title>Platform-News</title>
  <meta charset="utf-8">
  <!--Import Google Icon Font-->
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.1/css/materialize.min.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/media.css">

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    /*mobile*/
    @media screen and (max-width: 767px) {
      .header-bg{
        height: 100%;
      }
      .container{
        width: 100%;
      }
      .advertisment{
        max-height: 300px;
      }
      .lang {
        top: auto;
        margin-top: -50px;
      }
      .menu-item{
        font-size: 17px;
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
</head>

<body>
  <!-- header -->
  <div style="margin-bottom: 0;" class="row header-bg">
    <div class="col l4 m6 s12 header-logo center">
    </div>
    <div class="col l4 m6 s12 left float-for-mob">
      <div class="header-sign-size">PLATFORM
        <div class="header-sign-size header-sign-sec">NEWS</div>
      </div>
      <div class="header-sign-thrd">НОВИНИ В УКРАЇНІ ТА СВІТІ</div>
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
    <ul id="tabs-swipe-demo" class="tabs">
      <li class="tab col s3"><a href="#test-swipe-1" class="active">УКР</a></li>
      <li class="tab col s3"><a href="#test-swipe-2">РУС</a></li>
      <li class="tab col s3"><a href="#test-swipe-3">ENG</a></li>
    </ul>
  </div>
  <div id="test-swipe-1" class="col s12 menu-list center">
    <span class="menu-item"><a href="<?php echo get_category_link(1); ?>" class="hover-link">Політика</a></span>
    <span class="menu-item"><a href="<?php echo get_category_link(3); ?>" class="hover-link">Економіка</a></span>
    <span class="menu-item"><a href="<?php echo get_category_link(4); ?>" class="hover-link">Спорт</a></span>
    <span class="menu-item"><a href="<?php echo get_category_link(1); ?>" class="hover-link">Бізнес</a></span>
    <span class="menu-item"><a href="<?php echo get_category_link(3); ?>" class="hover-link">Війна</a></span>
    <span class="menu-item"><a href="<?php echo get_category_link(4); ?>" class="hover-link">Культура</a></span>
    <span class="menu-item"><a href="<?php echo get_category_link(1); ?>" class="hover-link">Бізнес</a></span>
    <span class="menu-item"><a href="<?php echo get_category_link(3); ?>" class="hover-link">Війна</a></span>
  </div>
  <div id="test-swipe-2" class="col s12 menu-list center">
    <span class="menu-item"><a href="<?php echo get_category_link(1); ?>" class="hover-link">Политика</a></span>
    <span class="menu-item"><a href="<?php echo get_category_link(3); ?>" class="hover-link">Економика</a></span>
    <span class="menu-item"><a href="<?php echo get_category_link(4); ?>" class="hover-link">Спорт</a></span>
    <span class="menu-item"><a href="<?php echo get_category_link(1); ?>" class="hover-link">Бизнес</a></span>
    <span class="menu-item"><a href="<?php echo get_category_link(3); ?>" class="hover-link">Война</a></span>
    <span class="menu-item"><a href="<?php echo get_category_link(4); ?>" class="hover-link">Культура</a></span>
    <span class="menu-item"><a href="<?php echo get_category_link(1); ?>" class="hover-link">Бизнес</a></span>
    <span class="menu-item"><a href="<?php echo get_category_link(3); ?>" class="hover-link">Война</a></span>
  </div>
  <div id="test-swipe-3" class="col s12 menu-list center">
    <span class="menu-item"><a href="<?php echo get_category_link(1); ?>" class="hover-link">Politics</a></span>
    <span class="menu-item"><a href="<?php echo get_category_link(3); ?>" class="hover-link">Ecomomic</a></span>
    <span class="menu-item"><a href="<?php echo get_category_link(4); ?>" class="hover-link">Sport</a></span>
    <span class="menu-item"><a href="<?php echo get_category_link(1); ?>" class="hover-link">Bysiness</a></span>
    <span class="menu-item"><a href="<?php echo get_category_link(3); ?>" class="hover-link">War</a></span>
    <span class="menu-item"><a href="<?php echo get_category_link(4); ?>" class="hover-link">Culture</a></span>
    <span class="menu-item"><a href="<?php echo get_category_link(1); ?>" class="hover-link">Bysiness</a></span>
    <span class="menu-item"><a href="<?php echo get_category_link(3); ?>" class="hover-link">War</a></span>
  </div>
