    <footer>
        <div>Copyright © 2017 | by <a href="https://platform-it.com/"> Platform-It Company</a></div>
        <div>
            <?php
                global $lang;
                if ( $lang == 212 ) {
                    echo '
                    Интернет-портал Platform News самостоятельно не публикует никаких новостей или статей.
                    Лента новостей, размещаемая на портале Platform News, создается автоматически и является подборкой гипертекстовых ссылок на интернет-страницы статей, опубликованных на различных интернет-сайтах Украины и мира.
                    Ссылки, размещаются в Ленте новостей, не следует рассматривать как одобрение коллективом интернет-портала Platform News взглядов, высказываемых на соответствующих интернет-страницах.';
                }
                else if ( $lang == 213 ) {
                    echo '
                    The Platform News Internet portal does not publish any news or articles on its own.
                    The news bulletin posted on the Platform News portal is created automatically and is a collection of hypertext links to Internet pages of articles published on various Internet sites in Ukraine and the world.
                    Links posted in the News Bulletin should not be considered as approval by the collective of the Internet portal Platform News views expressed on the relevant Internet pages.';
                }
                else {
                    echo '
                    Інтернет-портал Platform News самостійно не публікує жодних новин чи статей.
                    Стрічка новин, що розміщується на порталі Platform News, створюється автоматично та є підбіркою гіпертекстових посилань на інтернет-сторінки статей, опублікованих на різних інтернет-сайтах України та світу.
                    Посилання, що розміщуються у Стрічці новин, не слід розглядати як схвалення колективом інтернет-порталу Platform News поглядів, що висловлюються на відповідних інтернет-сторінках.';
                }
            ?>
            
        </div>
    </footer>
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.1/js/materialize.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/jssor.slider-23.0.0.min.js" type="text/javascript"></script>
    <script type="text/javascript">jssor_1_slider_init();</script>
    <script type="text/javascript">jssor_html5_AdWords_slider_init();</script>
    <script>
        $(document).ready(function(){
            $('ul.tabs').tabs();
        });
    </script>
</body>
</html>