<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    @foreach ($pastes as $paste)
    <div class="publicPastes">
          <h3>{{$paste->pasteName}}</h3>
          <h5>{{$paste->text}}</h5>
    </div>
    @endforeach
  </body>
</html>
