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
            background-size: 3000px 2200px;
            background-repeat: no-repeat; /* Не повторяем картинку */
            background-position: center; /* Центрируем картинку */
        }
        body {
            font-family: 'MyFont';
            font-size: 16px;
            background-image: url('{{ asset('img/Gradient.jpg') }}');
            background-size: 1500px 7000px;
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
        p{
            font-size: 26px;
            color: #eeeeee;
            margin-top:-30px;
            margin-bottom:45px;
        }
        a{
            color: #eeeeee;
        }
        a:hover {
            color: #eeeeee;
        }
            
    </style>
</head>
<body scroll="no">
    <div class="container">
        <div class="icon-bar" class="item"> 
            <a href="/"><img class="img" src="{{ asset('img/home.jpg')}}"></a> 
            <a href="/show/profile"><img class="img" src="{{ asset('img/profile.png')}}"></a> 
            <a href="/loading/file"><img class="img" src="{{ asset('img/trainings.png')}}" ></a> 
            <a class="active" href="/my/training"><img class="img" src="{{ asset('img/statistic.png')}}"></a>
        </div>
    </div>
    <div class="item">
            <p>Статистика недоступна</p>
            <p> <a href="/loading/file">Перейдите по ссылки и добавьте тренировку</a></p>
    </div>    
</body>
</html>







