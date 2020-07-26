<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/app.css">
  </head>


  <body>
    @if(session('success'))
    <div class="alert alert-success">

    {{session('success')}}
    </div>
    @endif

    @if(@errors)
      <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
      </ul>
      </div>
      @endif



      <a href="{{route('allpublicpaste')}}">Пасты</a>

    <form action="{{route('submit')}}" method="post">
      @csrf
      <input type="text" name="pasteName">
      <textarea name="text" rows="10" cols="70"></textarea>
      <input type="text" name="expTime">
      <div id="radiobuttons">
        <p><input type="radio" name="type" value="unlisted"> Доступ по ссылке</p>
        <p><input type="radio" name="type" value="public"> Публичная</p>
      </div>
      <input id="loadbutton" type="submit" value="Загрузить">
      <input id="clearbutton" type="button"  value="Очистить">
    </form>



  </body>

<html/>
