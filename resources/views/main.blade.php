<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/app.css">
    <title>Задание2</title>
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

      <a id=pastesRef href="{{route('allpublicpaste')}}">Публичные пасты</a>

    <form action="{{route('submit')}}" method="post">
      @csrf
      <div class="class">
      <label for="pasteName" id="labPasteName">Название пасты:</label>
      <input type="text" name="pasteName" id=pasteName>
      <textarea name="text" rows="15" cols="70"></textarea>
      <div class="buttonsDiv" >
        <input id="loadbutton" type="submit" value="Загрузить" class="buttons">
        <input id="clearbutton" type="reset"  value="Очистить" class="buttons">
      </div>
    </div>

      <div class="params">
        <p>
          <label for="expTime">Срок хранения:</label>
          <select name="expTime">
            <option value="00:10:00">10 минут</option>
            <option value="01:00:00">1 час</option>
            <option value="3:00:00">3 часа</option>
            <option value="24:00:00">1 день</option>
            <option value="168:00:00">1 неделя</option>
            <option value="720:00:00">1 месяц</option>
            <option> без ограничения</option>
          </select>
        </p>
        <div class="radiobuttons">
          <p><input type="radio" name="type" value="unlisted"> Доступ по ссылке</p>
          <p><input type="radio" name="type" value="public" checked> Публичная</p>
        </div>
    </div>
    </form>



  </body>

<html/>
