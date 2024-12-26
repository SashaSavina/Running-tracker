<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <style>
        html {
            overflow: scroll;
        }
        * {box-sizing: border-box;}
        body {
            font-family:  sans-serif;
            font-size: 16px;
            background-image: url('{{ asset('img/Gradient1.jpeg') }}');
            background-size: 2200px 2200px;
            background-repeat: no-repeat; /* Не повторяем картинку */
            background-position: center; /* Центрируем картинку */
        }
        h1{
            text-align:center;
            color: #eeeeee;
            margin-top:5px;
            margin-left:20px;
        }
        h3{
            text-align:center;
            margin-top:-5px;
            margin-left:-28px;
        }
        .btn {
                width: 20%;
                height: 25px;
                margin-left:155px;
                margin-bottom:10px;
                border-radius: 15px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
                border: 0;
                font-family: algerian, serif;
                display: block;
                padding: 1px;
                font-size: 16px;
                background-color: black;
                color: #eeeeee;
            }
        .btn_reg{
                width: 40%;
                height: 25px;
                padding-left: 8px;
                margin-left:110px;
                margin-bottom:15px;
                border-radius: 15px;
                background-color: black;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
                border: 0;
                color: #eeeeee;
                font-family: algerian, serif;
                font-size: 18px;
            }
            .input {
                display: block;
                text-align:center;
                font-size: 25px;
                width: 400px;
                height: 20px;
                margin-bottom: 30px;
                border-radius: 15px;
                background-color: #BDCDDD;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
                border: 1px solid #ccc;
                font-family: inherit;
                font-size: 16px;
            }
            img{
                width: 40px; 
                height: 40px;
            }
            .img{
                box-shadow: 3px 3px 7px 7px rgba(0, 0, 0, 0.2);
                margin: 15px 0 0 15px;
                width: 65px;
                height: 65px;
                padding:12px;
                background-color: #eeeeee;
                border-radius: 0px 0 10px 0; /* Верхние углы 10px, нижние 0 */
            }
            .form-slider {
                position: relative;
                width: 100%;
                height: auto;
            }
            .form {
                margin: 0 auto;
                width: 500px;
                margin-top: 150px;
            }

            .form-slide {
                display: none;
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                transition: opacity 0.5s;
            }
            .form-slide.active {
                display: block;
                opacity: 1;
            }
            .container{
                margin-left: 60px;
                margin-top: 5px;
            }
            
    </style>
</head>
<body scroll="no">
    <div class="img">
        <a  href="/loading/file"><img src="{{ asset('img/free-icon-back-arrow-7344411.png')}}"></a> 
    </div>
    <div>
        <form class="form" method="POST" action="{{ route('training.store') }}">
            @csrf
            <h1>Добавьте тренировку</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="container"> 
                    <div class="form-slider">  
                        <div class="form-slide active">     
                            <input name="date" class="input" type="date" placeholder="День тренировки">
                            <input name="distance" class="input" type="number" placeholder="Дистанция(м)">
                            <input name="duration" class="input" type="number" step="0.01" placeholder="Длительность(мин)">
                            <input name="average_pules" class="input" type="number" placeholder="Cредний пульс">
                            <input name="average_temp" class="input" type="number" step="0.01" placeholder="Средний темп">
                            <input name="comment" class="input" type="text" placeholder="Комментарий(при необходимости)">
                            <button type="button" class="btn btn-primary next-slide">Далее</button>
                        </div>
                        <div class="form-slide">
                            <h3>Базовая часть</h3>
                            <input name="baseduration" class="input" type="number" step="0.01" placeholder="Длительность(мин)">
                            <h3>Интенсивная часть</h3>
                            <input name="intduration" class="input" type="number" step="0.01" placeholder="Длительность(мин)">
                            <button type="submit" class="btn_reg btn-primary">Сохранить</button>
                            <button type="button" class="btn btn-secondary prev-slide">Назад</button>
                        </div>
                    </div>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
    $(document).ready(function() {
        var currentSlide = 1;
        var totalSlides = $(".form-slide").length;
    
        $(".next-slide").click(function() {
            currentSlide++;
            showSlide(currentSlide);
        });
    
        $(".prev-slide").click(function() {
            currentSlide--;
            showSlide(currentSlide);
        });
    
        function showSlide(n) {
            $(".form-slide").removeClass("active");
            $(".form-slide:nth-child(" + n + ")").addClass("active");
    
            if (n == 1) {
                $(".prev-slide").prop("disabled", true);
            } else {
                $(".prev-slide").prop("disabled", false);
            }
    
            if (n == totalSlides) {
                $(".next-slide").hide();
            } else {
                $(".next-slide").show();
            }
    
            if (n > totalSlides) {
                currentSlide = totalSlides;
                showSlide(currentSlide);
            }
        }
        showSlide(currentSlide);
    });
    </script>
</body>
</html>







