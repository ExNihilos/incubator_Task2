<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/app.css">
    <title></title>
  </head>
  <body>
    @foreach ($data as $paste)
    <div style="border-bottom:5px solid black" class="publicPastes">
        <h3>{{$paste->pasteName}}</h3>
        {{$paste->text}}
      <a href=>  <input type="button" name="btn1" value="Открыть"></a>
    </div>
  @endforeach
  </body>
</html>
