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
        body {
            font-family: algerian, serif;
            font-size: 16px;
            background-image: url('{{ asset('img/Gradient.jpg') }}');
            background-size: 1700px 1500px;
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
        .container {
            display: flex;
        }
        .item {
        flex: 1;
        margin: 0px;
        text-align: center;
        padding: 20px;
        }
        .img{
                width: 40px; 
                height: 40px;
            }
    </style>
</head>
<body>
<div class="container">
    <div class="icon-bar" class="item"> 
        <a href="/"><img class="img" src="{{ asset('img/home.jpg')}}"></a> 
        <a href="/show/profile"><img class="img" src="{{ asset('img/profile.png')}}"></a> 
        <a class="active" href="/loading/file"><img class="img" src="{{ asset('img/trainings.png')}}" ></a> 
        <a href="/my/training"><img class="img" src="{{ asset('img/statistic.png')}}"></a>
    </div>
    <div class="item">
         <form action="{{ route('trainings.import') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="file" name="file" accept=".json">
            <button type="submit">Загрузить</button>
        </form>
    </div>
</div>    
</body>
</html>

