<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Run</title>
        <style>
            li {
                list-style-type: none;
            }
            li:before {
                content: "! ";
                color:red;
            }
            body {
                font-family:  sans-serif;
                font-size: 16px;
                background-image: url('{{ asset('img/Gradient.jpg') }}');
                background-size: 1500px 5000px;
                background-repeat: no-repeat; /* Не повторяем картинку */
                background-position: center; /* Центрируем картинку */
            }
            a:visited {
                color: inherit; /* Наследует цвет от родительского элемента */
            }

            * {
                box-sizing: border-box;
            }
            .input {
                display: block;
                width: 100%;
                padding: 7px 10px;
                margin-bottom: 15px;
                border-radius: 15px;
                background-color: #BDCDDD;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
                border: 1px solid #ccc;
                font-family: inherit;
                font-size: 16px;
            }
            .reg{
                margin: 10px 87px 20px;
                font-size: 30px;
                position: relative;
                color: #eeeeee;
            }
            .btn {
                display: block;
                width: 67%;
                padding: 8px;
                margin: 30px 35px 10px;
                border-radius: 15px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
                border: 0;
                font-family: algerian, serif;
                font-size: 16px;
                background-color: black;
                color: #eeeeee;
                text-align:center;
            }  
            .container {
                border-radius: 15px;
                position: relative;
                left:610px;
                top:320px;
                margin: 70px 100px;
                padding-bottom: 30px;
                height: 450px;
                width:330px ;
                padding: 50px;
                transform: translate(-50%, -50%);
                }
            .regestr{
             color: #eeeeee;
             position: relative;
             left: 35px;
             top:10px;
            }    
        </style>
    </head>
    <body>
        <div class="container">
            <form action="/authenticate" method="POST">
                @csrf
                <div class="reg">Вход</div>
                <ul>
                    @foreach($errors->all() as $message)
                        <li>{{$message}}</li>
                    @endforeach
                </ul>
                <input name="name" class="input" type="text" placeholder="Ваше имя">
                <input name="email" class="input" type="email" placeholder="Ваш e-mail">
                <input name="password" class="input" type="password" placeholder="Пароль">
                <button class="btn" type="submit">Войти</button>
                <div class="regestr"><a href="/registration">Зарегистрироваться</a></div>
            </form>
        </div>
    </body>
</html>
