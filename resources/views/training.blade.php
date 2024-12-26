<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Comida</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
            background-size: 2000px 7000px;
            background-repeat: no-repeat; /* Не повторяем картинку */
            background-position: center; /* Центрируем картинку */

        }
        .icon-bar {
            width: 80px;
            height: 297px;
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
            border-radius: 0px 0 10px 0; /* Верхние углы 10px, нижние 0 */
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
        table {
            border-collapse: collapse;
            border-spacing: 0;
            width: 80%;
            border: 1px solid #eeeeee;
            margin: 0 auto;
        }
        
        th, td {
            padding: 16px;
        }
        .tdbtn{
            text-align: right;
            padding-right: 30px;
        }
        .dropbtn{
                width: 30px;
                height: 30px;
        }
        .tablecont{
            text-align: left;
            background-color: #eeeeee
        }
        tr{
            background-color: #335eb5d8
        }
        tr:nth-child(even) {
            background-color: #eeeeee
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
                background-color: #eeeeee;
                width: 23%;
                min-height: 50px;
                overflow: auto;
                box-shadow: 0px 6px 18px 0px rgba(255, 255, 255, 0.8);
                z-index: 1;
                border-radius: 10px;
                right:30px;
            }
            .dropdown-content a {
                color: black;
                padding: 12px 16px;
                text-decoration: none;
                display: block;
            }
            .dropdown a:hover {background-color: #ddd;}
            .show {display: block;} 
            .myChart {
                width: 500px;
                height: 400px; 
                margin: 0 auto;
                margin-bottom: 80px;
                padding-left:55px ;
                margin-bottom:130px;
            }
            h2{
              color: #eeeeee;
              margin-bottom: 30px;
            }
            canvas{
                margin-top:50px;
            }
    </style>
</head>
<body>  
<div class="container">    
    <div class="icon-bar" class="item">
        <a href="/"><img class="img" src="{{ asset('img/home.jpg')}}"></a> 
        <a  href="/show/profile"><img class="img" src="{{ asset('img/profile.png')}}"></a> 
        <a href="/loading/file"><img class="img" src="{{ asset('img/trainings.png')}}" ></a> 
        <a class="active" href="/my/training"><img class="img" src="{{ asset('img/statistic.png')}}"></a>
    </div>
    <div class="item">
        <div class="myChart">
            <h2>Cтатистика по всем тренировкам:</h2>
            <canvas id="myChart"></canvas>
        </div>
        
        <table>
        <tr>
            <th>    </th>
            <th>Дата</th>
            <th>Длительность</th>
            <th>Дистанция</th>
            <th>     </th>
        </tr>
        @php
            $i = 1;
            $sum_dur = 0;
            $bas_sum = 0;
            $int_sum = 0;
        @endphp
        @foreach($trainings as $training)
        @php
            $sum_dur = $sum_dur + $training->duration;
        @endphp
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $training->date }}</td>
            <td>{{round($training->duration / 60, 1)}} мин</td>
            <td>{{round($training->distance/1000,1)}} км</td>
            <th class="tdbtn"><img onclick="myFunction({{ $loop->iteration }})" class="dropbtn imgbtn" src="{{ asset('img/icons8-вниз-96.png')}}">
                <div id="myDropdown{{ $loop->iteration }}" class="dropdown-content">   
                    <table class="tablecont">
                            <tr class="tablecont">
                                <th>Длительность тренировки:</br>
                                {{round($training->duration / 60, 1)}} мин
                                </th>
                            </tr>
                            <tr>
                                <th>Дистанция:</br>
                                {{round($training->distance/1000,1)}} км
                                </th>
                            </tr>
                            <tr class="tablecont">
                                <th>Средний пульс:</br>
                                {{ $training->average_pules }}
                                </th>
                            </tr>
                            <tr>
                                <th>Средний темп:</br>
                                {{round($training->average_temp,1) }}
                                </th>
                            </tr>
                            <tr class="tablecont">
                                <th>
                                    Длительность тренировки базовой нагрузки: 
                                    @foreach($bases as $base)
                                        @if($base->trainings_id==$training->id)
                                        @php
                                            $bas_sum = $bas_sum + $base->duration;
                                        @endphp
                                            {{$base->duration}} сек</br> ({{round($base->duration / $training->duration * 100, 1) }}%)
                                        @endif
                                    @endforeach
                                </th>
                            </tr> 
                            <tr>
                                <th>
                                    Длительность тренировки интенсивной нагрузки: 
                                    @foreach($intensives as $intenseve)
                                        @if($intenseve->trainings_id==$training->id)
                                            @php
                                                $int_sum = $int_sum + $intenseve->duration;
                                            @endphp
                                            {{$intenseve->duration}} сек</br>({{round($intenseve->duration / $training->duration * 100,1)}}%)
                                        @endif
                                    @endforeach
                                </th>
                            </tr>       
                    </table>
            </th>
        </tr>
        @endforeach
        </table>
    </div>    
</div> 
<script>
       function myFunction(index) {
           document.getElementById("myDropdown" + index).classList.toggle("show");
       }
       window.onclick = function(event) {
           if (!event.target.matches('.dropbtn')) {
               var dropdowns = document.getElementsByClassName("dropdown-content");
               for (var i = 0; i < dropdowns.length; i++) {
                   var openDropdown = dropdowns[i];
                   if (openDropdown.classList.contains('show')) {
                       openDropdown.classList.remove('show');
                   }
               }
           }
       }
       var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Базовые', 'Интенсивные'],
                datasets: [{
                    data: [
                        {{ round($bas_sum / $sum_dur * 100, 1) }},
                        {{ round($int_sum / $sum_dur * 100, 1) }}
                    ],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 99, 132, 0.2)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: true,
                        position: 'bottom'
                    }
                }
            }
        });
   </script>

</body>
</html>

