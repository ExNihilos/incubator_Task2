<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/app.css">
    <title>Публичные пасты</title>
  </head>
  <body>
    @foreach ($pastes as $paste)
    <div style="border-bottom:5px solid black; padding-bottom:10px;" class="publicPastes">
      <h3>{{$paste->pasteName}}</h3>
      {{$paste->text}}
      <a href="{{route('onepaste', $paste->ref)}}"><input type="button" name="btn1" value="Открыть"></a>
    </div>
    @endforeach
  </body>
  </html>
