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
        * {
            box-sizing: border-box;
        }
        body {
            font-family: algerian, serif;
            font-size: 16px;
            background: #326fc9;
        }
        .icon-bar {
            width: 90px;
            height: 295px;
            background-color: #2661b8;
            box-shadow: inset 0 5px 10px rgba(0, 0, 0, 0.2), /* Верхняя тень */
                       inset 5px 0 10px rgba(0, 0, 0, 0.2); /* Левая тень */

        }

        .icon-bar a {
            display: block;
            text-align: center;
            padding: 16px;
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
            width: 150px; 
            height: 150px; 
            background-color: #eeeeee; 
            border-radius: 50%; 
            margin-left: 44%;
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
                padding-top: 2px;
            }
            .dropbtn {
                background-color: black;
                color: #eeeeee;
                width: 400px;
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
                width: 400px;
                min-height: 50px;
                overflow: auto;
                box-shadow: 0px 6px 18px 0px rgba(255, 255, 255, 0.8);
                z-index: 1;
                border-radius: 10px;
                margin-left:8px;
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
        <a class="active" href="#"><img class="fa fa-search" src="{{ asset('storage/uploads/home.jpg')}}"></a> 
        <a href="#"><img class="img_like" src="{{ asset('storage/uploads/profile.png')}}"></a> 
        <a href="#"><img class="img_like" src="{{ asset('storage/uploads/14815.png')}}"></a> 
        <a href="#"><img class="fa fa-search" src="{{ asset('storage/uploads/trainings.png')}}"></a>
    </div>
    <div class="item">    
        <div class="photo">
        </div>
        <div class="name"><p>{{$user->name}}</p></div>
        <div class="input">Дата рождения: {{$user->date_of_birth}}</div>
        <div class="input">@if ($user->gender == 'F')
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
            <div>   
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
                            @else
                                <form action="{{ route('pulse') }}" method="POST">
                                    @csrf
                                    <button class="pulse" type="submit">Рассчитать пульсовые зоны</button>
                                </form>
            @endif
            </div>
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
             <button type="submit"><img src="{{ asset('storage/uploads/yfcnhjqrb.png')}}"></button>
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

