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
            background-size: 2200px 3000px;
            background-repeat: no-repeat; /* Не повторяем картинку */
            background-position: center; /* Центрируем картинку */
        }
        h1{
            text-align:center;
            color: #eeeeee;
            margin-top:20px;
            
        }
        .btn_reg{
                width: 15%;
                height: 25px;
                padding-left: 8px;
                margin-left:125px;
                margin-bottom:10px;
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
            .container{
                margin-left: 527px;
                margin-top: 35px;
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
            
            .calendar-table {
            width: 75%;
            margin-top:65px;
            margin-bottom:100px;
            margin-left: 200px;
            border-collapse: collapse;
        }
        .calendar-table th {
            border: 1px solid #ccc;
            padding: 7px;
            text-align: left;
            background-color: #f0f0f0;
        }
        .calendar-table td{
            border: 1px solid #ccc;
            text-align: left;
            padding: 15px;
            color: #F5F5F5;
        }
        li{
            list-style-type:  none;
        }

    </style>
</head>
<body scroll="no">
    <div class="img">
        <a  href="/loading/file"><img src="{{ asset('img/free-icon-back-arrow-7344411.png')}}"></a> 
    </div>
    <div>
    @if(isset($error))
    <p style="color:red;">{{ $error }}</p>
@else
    <h1>Ваш последний план тренировок:</h1>
    <table class="calendar-table">
        <thead>
            <tr>
                <th>Дата</th>
                <th>День недели</th>
                <th>Тренировка</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($calendar as $item)
                <tr>
                    <td>{{ $item['date'] }}</td>
                    <td>{{ $item['dayOfWeek'] }}</td>
                    <td>{{ $item['exercise'] }}</td>


                </tr>
            @endforeach
        </tbody>
    </table>
@endif

</div>
</body>
</html>







