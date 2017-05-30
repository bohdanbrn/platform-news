    <footer>
        
        <div>
            Интернет-портал Platform News самостоятельно не публикует никаких новостей или статей.
            Лента новостей, размещаемая на портале Platform News, создается автоматически и является подборкой гипертекстовых ссылок на интернет-страницы статей, опубликованных на различных интернет-сайтах Украины и мира.
            Ссылки, размещаются в Ленте новостей, не следует рассматривать как одобрение коллективом интернет-портала Platform News взглядов, высказываемых на соответствующих интернет-страницах.
        </div>
        <div>Copyright © 2017 | by <a href="https://platform-it.com/"> Platform-It Company</a></div>
    </footer>
    <!--Import jQuery before materialize.js-->
<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.1/js/materialize.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/jssor.slider-23.0.0.min.js" type="text/javascript"></script>
    <script type="text/javascript">jssor_1_slider_init();</script>
    <script type="text/javascript">jssor_html5_AdWords_slider_init();</script>
    <script>
        $(document).ready(function(){
            $('ul.tabs').tabs();
        });
    </script>
<script>
$(function shorting_news () {
    nShort = $(".news-owner-small")
    nShort.each(function (shortme) {
        $(this).replaceWith("<span id='short-id"+shortme+"' class='news-owner-small'>" + $(this).text().substr(0,50) + "&hellip;</span>");
    });
});
</script>
<script>
    // переменные
var canvas, ctx;
var clockRadius = 150;
var clockImage;
 
// функции отрисовки :
function clear() { // очистка
    ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);
}
 
function drawScene() { // основная функция drawScene
    clear(); // очистка канвы
 
    // получение текущего времени
    var date = new Date();
    var hours = date.getHours();
    var minutes = date.getMinutes();
    var seconds = date.getSeconds();
    hours = hours > 12 ? hours - 12 : hours;
    var hour = hours + minutes / 60;
    var minute = minutes + seconds / 60;
 
    // сохранение
    ctx.save();
 
   
 
    ctx.translate(canvas.width / 2, canvas.height / 2);
    ctx.beginPath();
 

 
    // часы
    ctx.save();
    var theta = (hour - 3) * 2 * Math.PI / 12;
    ctx.rotate(theta);
    ctx.beginPath();
    ctx.moveTo(-15, -5);
    ctx.lineTo(-15, 5);
    ctx.lineTo(clockRadius * 0.5, 1);
    ctx.lineTo(clockRadius * 0.5, -1);
    ctx.fill();
    ctx.restore();
 
    // минуты
    ctx.save();
    var theta = (minute - 15) * 2 * Math.PI / 60;
    ctx.rotate(theta);
    ctx.beginPath();
    ctx.moveTo(-15, -4);
    ctx.lineTo(-15, 4);
    ctx.lineTo(clockRadius * 0.8, 1);
    ctx.lineTo(clockRadius * 0.8, -1);
    ctx.fill();
    ctx.restore();
 
    // секунды
    ctx.save();
    var theta = (seconds - 15) * 2 * Math.PI / 60;
    ctx.rotate(theta);
    ctx.beginPath();
    ctx.moveTo(-15, -3);
    ctx.lineTo(-15, 3);
    ctx.lineTo(clockRadius * 0.9, 1);
    ctx.lineTo(clockRadius * 0.9, -1);
    ctx.fillStyle = 'blue';
    ctx.fill();
    ctx.restore();
 
    ctx.restore();
}
 
// инициализация
$(function(){
    canvas = document.getElementById('canvas');
    ctx = canvas.getContext('2d');
 
    // var width = canvas.width;
    // var height = canvas.height;
 
clockImage = new Image();
clockImage.src = 'images/cface.png';
 
    setInterval(drawScene, 100); // loop drawScene
});
</script>

    <?php wp_footer(); ?>
</body>
</html>