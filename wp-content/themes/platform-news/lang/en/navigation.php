<body>
  <!-- header -->
  <div style="margin-bottom: 0;" class="row header-bg">
    <div class="col l4 m6 s12 header-logo center">
    </div>
    <div class="col l4 m6 s12 left float-for-mob">
      <div class="header-sign-size">PLATFORM
        <div class="header-sign-size header-sign-sec">NEWS</div>
      </div>
      <div class="header-sign-thrd">WORLD AND UKRAINIAN NEWS</div>
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
      <form method="post" action="">
        <input type="hidden" name="ua" value="true">
        <input type="submit" value="УКР">
      </form>
      <form method="post" action="">
        <input type="hidden" name="ru" value="true">
        <input type="submit" value="РУС">
      </form>
      <form method="post" action="">
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
