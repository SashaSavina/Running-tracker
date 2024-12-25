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
            background-size: 1700px 1150px;
            background-repeat: no-repeat; /* Не повторяем картинку */
            background-position: center; /* Центрируем картинку */
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
                font-size: 16px;
                text-align:left;
                padding-left: 10px;
                padding-top: 2px;
            }
        .steps{
            width: 95.5%;
            height:200px;
        }
        li {
            list-style-type: none;
        }
        li:before {
            content: "! ";
            color:red;
        }
        .form {
            background: #ffffff;
            margin-top: 30px;
            position: fixed; top: 50%; left: 50%;
            transform: translate(-50%, -50%);
        }
        .reg{
            left:210px;
            top:60px;
            font-size: 20px;
            position: relative;
            color: #eeeeee;
        }
        .btn {
                background-color: black;
                color: #eeeeee;
                width: 200px;
                height: 25px;
                margin-top: 100px;
                margin-left: 250px;
                margin-bottom: 50px;
                border-radius: 15px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
                border: 1px solid #eeeeee;
                font-size: 15px;
                text-align:center;
                padding-top: 2px;
            }  
        img{
            height: 180px;
            width: 180px;
            border-radius: 15px;
            position: relative;
            top:40px;
            left:210px;
            object-fit: cover;
        }
        .input-file span {
            position: relative;
            top: 50px;
            left: 270px;
            border: 1px solid #eeeeee;
            font-size: 14px;
            vertical-align: middle;
            text-align: center;
            border-radius: 15px;
            background-color: black;
            color: #eeeeee;
            height: 25px;
            padding: 10px 20px;
            box-sizing: border-box;
            margin: 0;
            transition: background-color 0.2s;
        }
        .input-file input[type=file] {
            position: absolute;
            z-index: -1;
            opacity: 0;
            display: block;
            width: 0;
            height: 0;
        }
        .input-file:hover span {
            background-color: #A6CAF0;
        }
        .container{
            border-radius: 15px;
            display: flex;
            flex-wrap: wrap;
            margin: 70px 350px;
            padding-bottom: 30px;
            
            height: 620px;
        }
        .text{
            position: relative;
            top: 85px;
            left: 150px;
        }
        .password{
            text-decoration-color:white;
        }
         .img_header{
            width: 30px;
            height: 30px;
            border: none;
            background-color: transparent;
            cursor: pointer;
            border-radius: 0px;
        }
        .img_header:hover {
            background-color: #BDCDDD;
            border-radius: 15px;
        }
    </style>
</head>
<body scroll="no">
<div class="container">
    @foreach($users as $user)
        <form enctype="multipart/form-data" action="/edit/profile{{$user->id}}" method="POST">
            @csrf
            @method('PUT')
            <div class="reg">Отредактируйте ваш профиль:</div>
            <ul>
                @foreach($errors->all() as $message)
                    <li>{{$message}}</li>
                @endforeach
            </ul>

            <div class="text">
                <textarea name="name" class="input" placeholder="Редактировать название">{{$user->name}}</textarea>
                <input type="date" name="date_of_birth" class="input" placeholder="{{ empty($user->date_of_birth) ? 'Укажите дату рождения' : null }}" value="{{ $user->date_of_birth ?? null }}">
                <textarea name='email' class="input" >{{$user->email}}</textarea>
                <textarea name='phone_number' class="input phone_mask" placeholder="Добавьте телефон">{{$user->phone_number}}</textarea>
                <select name="gender" class="input">
                    @if(empty($user->gender))
                        <option disabled selected>Добавьте ваш пол</option>
                    @else
                        <option value="{{ $user->gender }}" selected>{{ $user->gender === 'M' ? 'Мужской' : ($user->gender === 'F' ? 'Женский' : $user->gender) }}</option>
                    @endif
                    <option value="M">Мужской</option>
                    <option value="F">Женский</option>
                </select>
                <textarea name='height' class="input" placeholder="Добавьте ваш рост">{{$user->height}}</textarea>
                <textarea name='weight' class="input" placeholder="Добавьте ваш вес">{{$user->weight}}</textarea>
                <input name="password" class="input" type="password" placeholder="Пароль">
            </div>
            <button class="btn" type="submit">Сохранить</button>
            @endforeach
        </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery.maskedinput@1.4.1/src/jquery.maskedinput.js" type="text/javascript"></script>
<script>$(".phone_mask").mask("+7(999)999-99-99");</script>    
</body>
</html>







