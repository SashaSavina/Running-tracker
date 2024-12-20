<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <style>

        html {
            overflow: scroll;
        }
        * {
            box-sizing: border-box;
             -webkit-box-sizing: border-box;
        }
        body {
            font-family:  sans-serif;
            font-size: 16px;
            background-image: url('{{ asset('img/Gradient.jpg') }}');
            background-size: 1500px 5000px;
            background-repeat: no-repeat; /* Не повторяем картинку */
            background-position: center; /* Центрируем картинку */

        }
        .icon-bar {
            width: 80px;
            height: 300px;
            background-color: #335eb5d8;
            box-shadow: inset 0 5px 10px rgba(0, 0, 0, 0.2), /* Верхняя тень */
                        inset 5px 0 10px rgba(0, 0, 0, 0.2); /* Левая тень */
            border-radius: 0px 0 10px 0; /* Верхние углы 10px, нижние 0 */
          
        }
        .icon-bar a {
            display: block;
            text-align: center;
            padding-top:16px;
            padding-bottom: 10px;
            transition: all 0.3s ease;
            color: white;
            font-size: 36px;
        }
        .icon-bar a:hover {
            background-color: #000;
        }
        .active {
            background-color: #eeeeee !important;
        }
        .img{
                width: 40px; 
                height: 40px;
            }
        
        .container {
            display: flex;
        }
        .item {
        flex: 1;
        margin: 0px;
        text-align: center;
        padding: 20px;
        }
        .conten{
            display: flex;
            margin-bottom:150px;
        }
        .it{
            flex: 1;
            margin-top: -150px;
            text-align: center;
            font-size: 20px;
        }
        h1{
            margin: 290px 0 0 70px;
            text-align: left;
            color:  #eeeeee;
            font-size: 40px;
            z-index: 1;
        }
        h2{
            margin-top: 15px;
            margin-bottom: 10px;
        }
        .p1{
            text-align: center;
            color:  #eeeeee;
            font-size: 20px;
            margin: -200px 0 0 700px;
        }
        .p2{
            text-align: center;
            color:  #eeeeee;
            font-size: 18px;
            margin: 50px 0 0 100px;
            background-color:#1c325c;
            width: 420px;
            padding:20px; 
            height: 205px;
            border-radius: 35px;
        }
        .p3{
            text-align: center;
            background-color:#eeeeee;
            color:   #000;
            font-size: 18px;
            margin: 0 0 0 750px;
            width: 400px;
            padding:16px; 
            height: 155px;
            border-radius: 35px;
        }
        .p4{
            text-align: center;
            color:  #eeeeee;
            font-size: 14px;
            margin: 20px 0 100px 200px;
            background-color:#1c325c;
            width: 250px;
            padding:10px; 
            height: 110px;
            border-radius: 35px;
        }
        .p5{
            text-align: left;
            color:  #eeeeee;
            font-size: 19px;
            margin: 50px 0 100px 130px;
        }
        .p6{
            text-align: center;
            background-color:#eeeeee;
            color:  #000;
            font-size: 15px;
            margin: 0 0 0 450px;
            width: 450px;
            padding:13px; 
            height: 170px;
            border-radius: 35px;
        }
        .p7{
            text-align: center;
            color:  #eeeeee;
            font-size: 20px;
            margin: 100px 0 100px 25px;
        }
        .mySlides {display: none}
        .slideshow-container {
            max-width: 1000px;
            position: relative;
            background-color:#eeeeee;
            top: 300px;
            left:75px;
        }

        /* Next & previous buttons */
        .prev, .next {
        cursor: pointer;
        position: absolute;
        width: auto;
        padding: 16px;
        margin-top: -190px;
        margin-left: -300px;
        color: white;
        font-weight: bold;
        font-size: 18px;
        transition: 0.6s ease;
        border-radius: 0 3px 3px 0;
        }

        /* Position the "next button" to the right */
        .next {
        right: 0;
        border-radius: 3px 0 0 3px;
        }

        /* On hover, add a black background color with a little bit see-through */
        .prev:hover, .next:hover {
        background-color: rgba(0,0,0,0.8);
        }

        /* Caption text */
        .text {
        color: #1c325c;
        font-size: 15px;
        padding: 3px 8px;
        position: absolute;
        left: 450px;
        bottom: 8px;
        width: 300px;
        height: 260px;
        border-radius: 35px;
        text-align: center;
        background-color:#eeeeee;
        }

        .active, .dot:hover {
        background-color: #717171;
        }

        /* Fading animation */
        .fade {
        -webkit-animation-name: fade;
        -webkit-animation-duration: 1.5s;
        animation-name: fade;
        animation-duration: 1.5s;
        }

        @-webkit-keyframes fade {
        from {opacity: .4} 
        to {opacity: 1}
        }

        @keyframes fade {
        from {opacity: .4} 
        to {opacity: 1}
        }

        /* On smaller screens, decrease text size */
        @media only screen and (max-width: 300px) {
        .prev, .next,.text {font-size: 11px}
        }
        .img1{
            width: 450px;
            height: 300px;
            position: absolute;
            top: -90px;
            left: 430px;
        }
        .img2{
            width: 550px;
            height: 400px;
            position: absolute;
            top: 300px;
            left: -170px;
            z-index: 0;
        }
        .img3{
            width: 550px;
            height: 400px;
            position: absolute;
            top: 360px;
            left: 50px;
            z-index: 0;
        }
        .img4{
            width: 450px;
            height: 300px;
            position: absolute;
            top: 0px;
            left: 100px;
        }
        .img5{
            width: 450px;
            height: 300px;
            position: absolute;
            top: 950px;
            left: 1050px;
        }
        .img6{
            width: 450px;
            height: 300px;
            position: absolute;
            top: 1100px;
            left: 1000px;
        }
        .img7{
            width: 450px;
            height: 300px;
            position: absolute;
            top: 1330px;
            left: 430px;
        }
        .img8{
            width: 450px;
            height: 300px;
            position: absolute;
            top: 1500px;
            left: 570px;
        }
        .img9{
            width: 600px;
            height: 350px;
            position: absolute;
            top: 1430px;
            left: -170px;
        }
        .img10{
            width: 700px;
            height: 450px;
            position: absolute;
            top: 1850px;
            left: 850px;
        }
        .img11{
            width: 500px;
            height: 300px;
            position: absolute;
            top: 2100px;
            left: 1100px;
        }
        .img12{
            width: 500px;
            height: 300px;
            position: absolute;
            top: 2250px;
            left: -40px;
        }
        .img13{
            width: 700px;
            height: 400px;
            position: absolute;
            top: 2900px;
            left: -150px;
        }
        .img14{
            width: 700px;
            height: 400px;
            position: absolute;
            top: 3150px;
            left: 0px;
        }  
        .img15{
            width: 700px;
            height: 400px;
            position: absolute;
            top: 3050px;
            left: 900px;
        } 
        .img16{
            width: 700px;
            height: 400px;
            position: absolute;
            top: 3750px;
            left: 950px;
        } 
        .img17{
            width: 700px;
            height: 400px;
            position: absolute;
            top: 3520px;
            left: 1020px;
        }  
        .img18{
            width: 700px;
            height: 400px;
            position: absolute;
            top: 3800px;
            left: -100px;
        }
        .img19{
            width: 500px;
            height: 280px;
            position: absolute;
            top: 3900px;
            left: 850px;
        }  
        .img20{
            width: 700px;
            height: 400px;
            position: absolute;
            top: 3450px;
            left: -130px;
        }  
    </style>
</head>
<body>
<div class="container">    
    <div class="icon-bar" class="item">
        <a class="active" href="/"><img class="img" src="{{ asset('img/home.jpg')}}"></a> 
        <a  href="/show/profile"><img class="img" src="{{ asset('img/profile.png')}}"></a> 
        <a href="/loading/file"><img class="img" src="{{ asset('img/trainings.png')}}" ></a> 
        <a href="/my/training"><img class="img" src="{{ asset('img/statistic.png')}}"></a>
    </div>
    <div class="item">
        <img class="img1" src="{{ asset('img/1728984736210.png')}}">
        <img class="img2" src="{{ asset('img/1728983854990.png')}}">
        <img class="img3" src="{{ asset('img/1728986142285.png')}}">
        <img class="img4" src="{{ asset('img/1728984102268.png')}}">
        <img class="img5" src="{{ asset('img/1728986228922.png')}}">
        <img class="img6" src="{{ asset('img/1728984736210.png')}}">
        <img class="img7" src="{{ asset('img/1728984193612.png')}}">
        <img class="img8" src="{{ asset('img/1728986228922.png')}}">
        <img class="img9" src="{{ asset('img/1728983854990.png')}}">
        <img class="img10" src="{{ asset('img/1728984102268.png')}}">
        <img class="img11" src="{{ asset('img/1728984736210.png')}}">
        <img class="img12" src="{{ asset('img/1728986142285.png')}}">
        <img class="img13" src="{{ asset('img/1728986228922.png')}}">
        <img class="img14" src="{{ asset('img/1728986142285.png')}}">
        <img class="img15" src="{{ asset('img/1728984102268.png')}}">
        <img class="img16" src="{{ asset('img/1728984257644.png')}}">
        <img class="img17" src="{{ asset('img/1728983854990.png')}}">
        <img class="img18" src="{{ asset('img/1728984736210.png')}}">
        <img class="img19" src="{{ asset('img/1728984193612.png')}}">
        <img class="img20" src="{{ asset('img/1728986228922.png')}}">
        <div>
            <h1>Сделайте бег еще приятнее и эффективнее</br> с помощью нашей платформы<h1>
        </div>
        <div class="p1">
            <p>
                Наша платформа поможет новичкам начать</br>
                бегать правильно, а профессионалам оставаться</br>
                в форме без травм и переутомлений. Рассчитывайте</br>
                пульсовые зоны, чтобы оптимизировать</br>
                тренировки и добиться максимальной</br>
                эффективности. Следите за статистикой своих</br>
                тренировок: пройденное расстояние, потраченные</br>
                калории, динамика пульса...
            </p>
        </div>
        <div>
            <h1 style="color:  #000000;">"Бег - это величайшая метафора для жизни, потому</br>
            что ты получаешь от него столько же, сколько в него</br>
            вкладываешь".</br><h1>
            <h1 style="text-align: right; margin: -270px 300px 100px 0; color:  #000000;" >- Опра Уинфри</h1>
        </div>
        <div class="p2">
            Лучшие бегуны планеты проводят</br>
            тренировки так: 80% времени делают</br>
            легкие упражнения и бегают в низком</br>
            теме и только 20% уходит на тяжелые</br>
            упражнения и бег в среднем и быстром</br>
            темпе. Таким образом тренировочный</br>
            процесс утомляет меньше и приносит</br>
            позитивные эмоции.
        </div>
        <div class="p3">
            Медленный бег делает организм</br>
            более выносливым, а чрезмерное</br>
            количество высокоинтенсивных</br>
            упражнений приводит к</br>
            перетренированности мышц и приносит</br>
            cтресс
        </div>
        <div class="p4">
            Выведено и описано Мэтом</br>
            Фижеральсом в книге «Бeг пo</br>
            правилу 80/20: Тренируйтесь</br>
            медленнее, чтобы соревноваться</br> быстрее».
        </div>
        <div>
            <h1 style="margin: 200px 0 0 0; text-align: center;">Пульсовые зоны</h1>
        </div>
        <div class="p5">
            <p>
                Пульсовая зона (зона ЧСС) — это диапазон</br>
                частоты сердечных сокращений, который</br>
                соответствует определённой интенсивности</br>
                нагрузки. Как правило, в спортивных гаджетах и</br>
                программах они обозначаются еще и разными</br>
                цветами. Иногда можно услышать «сегодня я</br>
                бегал в зелёной зоне». Это значит, что человек</br>
                бегал с такой интенсивностью, которая</br>
                вписывается в его индивидуальные значения</br>
                в данной пульсовой зоне.
            </p>
        </div>  
        <div class="slideshow-container">
            <div class="mySlides fade">
                <div class="text" >
                    <h2>Правило 80/20</h2>
                    Ученые пришли к выводу, что элитные</br>
                    атлеты во всех видах</br>
                    спорта на выносливость</br>
                    примерно 80% времени</br>
                    отводят на легкие тренировки.</br>
                    В некоторых видах спорта</br>
                    базисом для реализации</br>
                    правила 80/20 выступают</br>
                    тренировочные сессии.</div>
                </div>

                <div class="mySlides fade">
                <div class="text">
                    <h2>Замедляйтесь</h2>
                    Вы хотите бегать быстрее?</br>
                    Тогда вам нужно замедлиться.</br>
                    Хотя это может казаться</br>
                    противоречивым, но, чтобы стать</br>
                    более быстрым бегуном, нужно</br>
                    бегать медленно большую часть времени.</br>
                    Ключевое различие между бегунами,</br>
                    которые реализовали потенциал,</br>
                    и теми, кто не сделал этого,</br>
                    - объемы медленного бега.
                </div>
            </div>

            <div class="mySlides fade">
            <div class="text"><h2>Выносливость - это ключ</h2>
                Лидьярд объяснял: «В теории</br>
                я пытаюсь развивать своих</br>
                бегунов до состояния, когда им</br>
                неведома усталость. На практике</br>
                это означает, что я стараюс</br>
                развить их выносливость, чтобы</br>
                они могли выдерживать свою</br>
                естественную скорость на протяжении</br>
                любой дистанции».</div>
            </div>

            <div class="mySlides fade">
            <div class="text"><h2>Ваше решение</h2>
                Как тренер я хочу, чтобы вы</br>
                были лучшим бегуном, каким</br>
                только можете стать, поэтому</br>
                я хочу, чтобы вы тренировались</br>
                не меньше, чем столько, сколько</br>
                хотите. Другими словами, я не хочу,</br>
                чтобы вас ограничивал какой бы то ни</br>
                было фактор, кроме ваших</br>
                личных приоритетов.</div>
            </div>

            <div class="mySlides fade">
            <div class="text"><h2>Главный секрет</h2>
                Бег не всегда должен быть</br>
                тяжелым. По факту большую часть</br>
                времени он должен быть легким</br>
                и доставлять удовольствие.</div>
            </div>

            <div class="mySlides fade">
            <div class="text"><h2>Неделя медленного бега</h2>
                Детокс соками - «перезагрузка»</br>
                диеты, его задача - подготовить</br>
                перманентные изменения, заменить</br>
                плохие привычки хорошими. Но вместо</br>
                постепенного внедрения изменений люди</br>
                на пару дней отказываются от старого.</br>
                После их не тянет на вредное.</br>
                Неделя медленного бега</br>
                преследует те же цели.</div>
            </div>

            <a class="prev" onclick="plusSlides(-1)">❮</a>
            <a class="next" onclick="plusSlides(1)">❯</a>
        </div>
        <div>
            <h1 style="text-align: center; margin-top:600px; margin-bottom:100px ">Чем полезен бег на низком пульсе и тренировки с</br> низкой интенсивностью</h1>
        </div>
        <div class="p6">
            Когда мы тренируемся в аэробной зоне, прежде всего</br>
            развивается сердечно-сосудистая система,</br>
            увеличивается капиллярная сеть и прорабатываются</br>
            длинные мышечные волокна, которые как раз и</br>
            отвечают за выносливость. При этом значительно</br>
            снижается риск перетренированности и связанных с</br>
            ней травм и снижения иммунитета. Кроме того,</br>
            используются жиры, что способствует похудению.
        </div>
        <div class="p7">
            Таким образом, медленный бег наиболее безопасен и</br>
            полезен. А ещё после низкоинтенсивных тренировок</br>
            меньше времени требуется на восстановление, и</br>
            появление боли в мышцах менее вероятно.
        </div>
        <div>
            <h1 style="text-align: center; margin-top:150px; margin-bottom:200px; color:  #000000;">Виды беговых тренировок</h1>
        </div>
        <div class="conten">
            <div class="it" style="margin-left:230px">
                <h2>Базовые(80%)</h2>
                <p>
                    1)Разминка</br>
                    2)Заминка</br>
                    3)Восстановительные пробежки</br>
                    4)Интервалы отдыха</br>
                    5)Длительные пробежки</br>
                </p>
            </div>
            <div class="it" style="margin-right:200px">
                <h2>Интенсивные(20%)</h2>
                <p>
                    1)Темповый бег</br>
                    2)Отрезки(интервальный бег)</br>
                    3)Спринт(быстрый бег)</br>
                    4)Прогрессивный бег</br>
                    5)Фартлек
                </p>
            </div>
        </div>
    </div>
</div>
<script>
    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
    showSlides(slideIndex += n);
    }

    function currentSlide(n) {
    showSlides(slideIndex = n);
    }

    function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    if (n > slides.length) {slideIndex = 1}    
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    }
</script>
</body>
</html>

