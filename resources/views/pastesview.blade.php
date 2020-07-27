<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/app.css">
    <title></title>
  </head>
  <body>
    @foreach ($pastes as $paste)
    <div style="border-bottom:5px solid black" class="publicPastes">
        <h3>{{$paste->pasteName}}</h3>
        {{$paste->text}}
    </div>
    @endforeach
  </body>
</html>
