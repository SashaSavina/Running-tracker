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
            background: #E8EFF8;
        }
        header {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            flex-wrap: wrap;
            background-color: #ffffff;
            padding: 20px 10px;
        }
        header a {
            color: #212121;
            padding: 12px;
            text-decoration: none;
            font-size: 18px;
            border-radius: 4px;
        }
        nav, .wrap-logo {
            display: flex;
            align-items: center;
        }
        .form_search {
            position: relative;
            width: 500px;
            margin: 0 auto;
        }
        input, button, select {
            border: 1px solid #BDCDDD;
            background-color: #ffffff;
        }
         .search {
            border-radius: 15px;
            margin-top: 28px;
            margin-left: 45px;
            width: 100%;
            height: 30px;
            padding-left: 15px;
        }
        .but_search {
            height: 26px;
            width: 26px;
            position: absolute;
            top: 30px;
            right: -43px;
            border-radius: 15px;
            background: #BDCDDD;
            cursor: pointer;
            content: "!";
        }
        .but_search:before {
            color: #BDCDDD;
            font-size: 20px;
            font-weight: bold;
        }
        .input {
            width: 95%;
            height: 95%;
        }
        img{
            width: 265px;
            height: 265px;
            border-radius: 15px;
            position: relative;
            left:430px;
            top:30px;
            object-fit: cover;
        }
         .img_log{
            width: 250px;
            height: 80px;
            position: relative;
            top:-4px;
            left: 0px;
        }
        .btn {
            display: block;
            width: 73%;
            padding: 8px;
            margin: 30px 115px 50px;
            border-radius: 15px;
            background-color: #F7F0C6;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            border: 0;
            font-family: algerian, serif;
            font-size: 16px;
        }
        .container {
            background-color: #ffffff;
            border-radius: 15px;
            margin: 10% 10%;
            padding-bottom: 2%;
        }
        .headline{
            font-size: 22px;
        }
        .td_text{
            position: relative;
            text-align: center;
            left:73%;
            margin-bottom: 10px;
            padding-left: 30px;
        }
        .img_like,.btn_like{
            width: 24px;
            height: 24px;
            border: none;
            background-color: transparent;
            cursor: pointer;
            position: relative;
            right: -650px;
            top:-122px
        }
        .img_like, .img_header:hover {
            background-color: #BDCDDD;
        }
        a{
            padding-left: 0%;
            text-decoration: none;
            color: black;
            border-bottom: 1px solid; 
        }
        td{
            width: 150px;
        }
        .name{
            position: relative;
            text-align: center;
            left:74%;
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
        nav{
              position: relative;
            left:-430px;
            top:-30px;
        }
        .entr{
          position: relative;
            left:995px;
            top:25px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<header>
    <nav>
        <a href="{{route('show.profile')}}"><img class="img_header" src="{{ asset('storage/uploads/профиль.png')}}"></a>
        <a href="/show/subcaterories"><img class="img_header" src="{{ asset('storage/uploads/icons8-категории-50.png')}}"></a>
        <a href="/show/recipes"><img class="img_header" src="{{ asset('storage/uploads/главная.png')}}"></a>
    </nav>
    <form action="" method="" class="form_search">
        <input class="search" name="search" placeholder="Поиск..." type="search">
        <button class="but_search" type="submit"></button>
    </form>
    <div>
        <img class="img_log" src="{{ asset('storage/uploads/Desktop - 4.png')}}">
    </div>
</header>
<div class="container">
    @foreach($users as $user)
    <div class="item">
    <table>
            <tr>
                <td colspan="3">
                    @isset($user->photo)
                        <img src="{{ asset('storage/' . $user->photo) }}" alt="{{$user->name}}">
                    @endisset
                    <div>
                        <form action="{{ route('profile.update', Auth::id()) }}">
                            <button type="submit" class="btn_like">
                                <img class="img_like" src="{{ asset('storage/uploads/yfcnhjqrb.png')}}">
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <div class="name">
                        <p class="headline">{{$user->name}}</p>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <div class="entr">
                        <a href="/authenticate">Выйти из профиля</a>
                    </div>
                </td>
            </tr>
    </table>
</div>
    @endforeach
</div>
</body>
</html>

