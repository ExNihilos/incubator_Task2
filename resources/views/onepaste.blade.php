<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/app.css">
    <title>Просмотр пасты</title>
  </head>
  <body>

    <div class="onePaste">
        <h3>Название пасты: {{$data->pasteName}}</h3>
        <h3>Дата создания: {{$data->created_at}} <br> </h3>
        <h3>Дата окончания срока доступности: {{$data->expTime}} <br> </h3>
        <p id = p1> <h3>Текст: </h3>{{$data->text}} </p>
    </div>
  </body>
</html>
