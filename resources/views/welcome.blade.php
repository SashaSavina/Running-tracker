<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Comida</title>
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
        .icon-bar {
            width: 90px;
            background-color: #555;
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
            background-color: #4CAF50 !important;
        }
    </style>
</head>
<body>
<header>

</header>
<div class="icon-bar">
  <a class="active" href="#"><img class="fa fa-search" src="{{ asset('storage/uploads/home.jpg')}}"></a> 
  <a href="#"><img class="img_like" src="{{ asset('storage/uploads/profile.png')}}"></a> 
  <a href="#"><img class="img_like" src="{{ asset('storage/uploads/14815.png')}}"></a> 
  <a href="#"><img class="fa fa-search" src="{{ asset('storage/uploads/trainings.png')}}"></a>
</div>
</body>
</html>

