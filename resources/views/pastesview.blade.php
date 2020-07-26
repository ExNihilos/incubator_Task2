<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    @foreach ($pastes as $paste)
    <div class="publicPastes">
    <h3>{{$paste->type}}</h3>
    </div>
    @endforeach
  </body>
</html>
