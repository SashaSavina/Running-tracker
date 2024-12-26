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
            background-image: url('{{ asset('img/Gradient.jpg') }}');
            background-size: 2000px 1500px;
            background-repeat: no-repeat; /* Не повторяем картинку */
            background-position: center; /* Центрируем картинку */
        }
        h1{
            text-align:center;
            color: #eeeeee;
            margin-top:185px;
            
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
                margin-left: 39%;
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
    </style>
</head>
<body scroll="no">
    <div class="img">
        <a  href="/loading/file"><img src="{{ asset('img/free-icon-back-arrow-7344411.png')}}"></a> 
    </div>
    <div>
        <h1>Создание плана тренировок</h1>
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
            <form method="POST" action="{{ route('training_plans.store') }}">
                @csrf
                <div>
                    <input name="name" class="input" type="text" placeholder="Название плана(необязательно)">
                </div>
                <div>
                    <select name="duration" id="duration" class="input" required>
                        <option value="">Выберите продолжительность</option>
                        <option value="week">Неделя</option>
                        <option value="two_weeks">2 недели</option>
                        <option value="month">Месяц</option>
                    </select>
                </div>
                <div>
                    <select name="intensity" id="intensity" class="input" required>
                        <option value="">Выберите интенсивность</option>
                        <option value="low">Низкая</option>
                        <option value="medium">Средняя</option>
                        <option value="high">Высокая</option>
                    </select>
                </div>
                <button type="submit" class="btn_reg">Создать</button>
            </form>
        </div>
    </div>
</body>
</html>







