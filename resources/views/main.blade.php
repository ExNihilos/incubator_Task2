<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/app.css">
    <title>Задание 2</title>
  </head>

  <body>
    @if(session('success'))
    <div id="modal">
      <div id="success">
        {{session('success')}}
        <a href="" class="close">Закрыть окно</a>
      </div>
    </div>
    @endif

    @if(@errors)
      <div class="errors">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
    @endif


<div class= "menu">
    <form action="{{route('submit')}}" method="post">
      @csrf
        <label for="pasteName" id="labPasteName">Название пасты:</label>
        <input type="text" name="pasteName" id=pasteName>
        <textarea id="text" name="text" rows="15" cols="70"></textarea>
        <div class="params">
          <p>
            <label for="expTime">Срок хранения:</label>
            <select name="expTime">
              <option value="PT0H10M0S">10 минут</option>
              <option value="PT1H0M0S">1 час</option>
              <option value="PT3H0M0S">3 часа</option>
              <option value="PT24H0M0S">1 день</option>
              <option value="PT168H0M0S">1 неделя</option>
              <option value="PT720H0M0S">1 месяц</option>
              <option value=>без ограничения</option>
            </select>
          </p>
          <div class="radiobuttons">
            <p><input type="radio" name="type" value="unlisted"> Доступ по ссылке</p>
            <p><input type="radio" name="type" value="public" checked> Публичная</p>
          </div>
        </div>
        <div class="buttonsDiv" >
          <input id="loadbutton" type="submit" value="Загрузить" class="buttons">
          <input id="clearbutton" type="reset"  value="Очистить" class="buttons">
        </div>
     </form>
  </div>
    <div id="publicPastes">
      <div style="border-bottom:3px solid">  <label for="publicPastes" id="lab"><h2>Публичные пасты:</h2></label>  </div>
        @foreach ($pastes as $paste)
          <div style="border-bottom:3px solid; padding-bottom:10px;" class="paste">
              <h3>{{$paste->pasteName}}</h3>
              {{$paste->text}}
              <a href="{{route('onepaste', $paste->ref)}}"><input type="button" name="btn1" value="Открыть"></a>
          </div>
        @endforeach
    </div>

  </body>
<html/>
