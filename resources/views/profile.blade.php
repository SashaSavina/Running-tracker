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
            font-family:  sans-serif;
            font-size: 16px;
            background-image: url('{{ asset('img/Gradient.jpg') }}');
            background-size: 2000px 1500px;
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
        .name{
            font-size: 36px;
            color: #eeeeee;
        }
        .photo{
            width: 200px; 
            height: 200px; 
            border-radius: 50%; 
            margin-left: 0%;
            margin-top:30px;
        }
        .input {
                font-size: 25px;
                width: 400px;
                height: 25px;
                margin-bottom: 20px;
                border-radius: 15px;
                background-color: #eeeeee;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
                border: 1px solid #ccc;
                margin-left: 34.5%;
                font-size: 16px;
                text-align:left;
                padding-left: 10px;
                padding-top: 3px;
            }
            .dropbtn {
                background-color: black;
                color: #eeeeee;
                width: 415px;
                height: 25px;
                margin-bottom: 20px;
                border-radius: 15px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
                border: 0;
                font-size: 15px;
                text-align:left;
                padding-left: 10px;
                padding-top: 2px;
                cursor: pointer;
                margin-left: 10px;
            
            }
            .dropbtn:hover, .dropbtn:focus {
                background-color: #eeeeee;
                color:black;
            }
            .dropdown {
                position: relative;
                display: inline-block;
            }
            .dropdown-content {
                display: none;
                position: absolute;
                background-color: #2661b8;
                width: 425px;
                min-height: 50px;
                overflow: auto;
                box-shadow: 0px 6px 18px 0px rgba(255, 255, 255, 0.8);
                z-index: 1;
                border-radius: 10px;
                margin-left:5px;
            }
            .dropdown-content a {
                color: black;
                padding: 12px 16px;
                text-decoration: none;
                display: block;
            }
            .dropdown a:hover {background-color: #ddd;}
            .show {display: block;}
            .text{
                font-size: 20px;
                margin-bottom:20px;
                color: #eeeeee;
            }
            .btn {
                background-color: black;
                color: #eeeeee;
                width: 100px;
                height: 25px;
                margin-top: 15px;
                margin-bottom: 100px;
                border-radius: 15px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
                border: 0;
                font-size: 15px;
                text-align:center;
                padding-top: 2px;
            }  
            table{
                text-align:left;
                width: 400px;
                color:  #eeeeee;
                margin-left:15px;
            }
            .pulse{
                background-color:  #eeeeee;
                color: black;
                width: 250px;
                height: 25px;
                margin-top: 13px;
                border-radius: 15px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
                border: 0;
                font-size: 15px;
                text-align:center;
                padding-top: 2px;
            }
            .puls1{
                background-color:  #eeeeee;
                color: black;
                width: 250px;
                height: 40px;
                margin-top: 4px;
                border-radius: 15px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
                border: 0;
                font-size: 15px;
                text-align:center;
                padding-top: 2px;
            }
            .img{
                width: 40px; 
                height: 40px;
            }
            .img_edit{
                width: 25px;
                margin-top:3px;
                height: 25px;
            }
            .edit{
                width: 40px;
                height: 40px;
                background-color: #335eb5d8;
                box-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.2), /* Верхняя тень */
                          inset 3px 0 5px rgba(0, 0, 0, 0.2); /* Левая тень */
                border-radius: 5px;
            }
            .inf{
                margin-top:80px;
            }
    </style>
</head>
<body>
<div class="container">
@foreach($users as $user)
@php
    $userFound = false; 
@endphp
@foreach($pulse_zones as $pulse_zone)
    @if ($pulse_zone->users_id === Auth::id())
        @php
            $userFound = true;
        @endphp
        @break
    @endif
@endforeach
    <div class="icon-bar" class="item">
        <a href="/"><img class="img" src="{{ asset('img/home.jpg')}}"></a> 
        <a class="active" href="/show/profile"><img class="img" src="{{ asset('img/profile.png')}}"></a> 
        <a href="/loading/file"><img class="img" src="{{ asset('img/trainings.png')}}" ></a> 
        <a href="/my/training"><img class="img" src="{{ asset('img/statistic.png')}}"></a>
    </div>
    <div class="item inf" >    
        <div class="name"><p>{{$user->name}}</p></div>
        <div class="input">Дата рождения: {{$user->date_of_birth}}</div>
        <div class="input">@if ($user->gender == NULL)
                              Пол:
                            @elseif($user->gender == 'F')    
                              Пол: Женский
                            @else
                               Пол: Мужской
                            @endif
        </div>
        <div class="input">Рост: {{$user->height}}</div>
        <div class="input">Вес: {{$user->weight}}</div>
        <div class="dropdown">
            <button onclick="myFunction()" class="dropbtn">Пульсовые зоны</button>
            <div id="myDropdown" class="dropdown-content">  
                @if ($userFound)
                              <table>
                                <thead>
                                    <tr>
                                    <th>Зона</th>
                                    <th>Пульс (уд/мин)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Зона 1: Очень медленный бег</td>
                                        <td>{{$pulse_zone->Z1}} - {{$pulse_zone->Z2}}</td>
                                    </tr>
                                    <tr>
                                        <td>Зона 2: Легкий темп</td>
                                        <td>{{$pulse_zone->Z2}} - {{$pulse_zone->Z3}}</td>
                                    </tr>
                                    <tr>
                                        <td>Зона 3: Темповый бег</td>
                                        <td>{{$pulse_zone->Z3}} - {{$pulse_zone->Z4}}</td>
                                    </tr>
                                    <tr>
                                        <td>Зона 4: Бег на уровне ПАНО</td>
                                        <td>{{$pulse_zone->Z4}} - {{$pulse_zone->Z5}}</td>
                                    </tr>
                                    <tr>
                                        <td>Зона 5: Бег в зоне МПК</td>
                                        <td>{{$pulse_zone->Z5}} +</td>
                                    </tr>
                                </tbody>
                                </table>
                @elseif($user->date_of_birth == null)
                    <form action="{{ route('profile.update', Auth::id()) }}">
                    @csrf
                        <button class="puls1">Для расчета пульсовых зон</br> введите возраст, рост, вес</button>    
                    </form>      
                @else
                    <form action="{{ route('pulse') }}" method="POST">
                        @csrf
                        <button class="pulse" type="submit">Рассчитать пульсовые зоны</button>
                    </form>
                @endif
            </div>
        </div>
        <div class="text">Данные учетной записи</div>
        <div class="input">Телефон: {{$user->phone_number}}</div>
        <div class="input">E-mail: {{$user->email}}</div>
        <form action="/logout" method="POST">
            @csrf
            <button class="btn" type="submit">Выход</button>
        </form>
    </div>
    <div>
        <form action="{{ route('profile.update', Auth::id()) }}">
             <button class="edit" type="submit"><img class="img_edit" src="{{ asset('img/yfcnhjqrb.png')}}"></button>
        </form>
    </div>
    <script>
        function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }
        window.onclick = function(event) {
        if (!event.target.matches('.dropbtn')) {

            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
            }
        }
        }
    </script>
@endforeach  
</div>    
</body>
</html>

