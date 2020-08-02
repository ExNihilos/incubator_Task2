@section('publicPastes')
<div id="publicPastes">
  <div style="border-bottom:3px solid">  <label for="publicPastes" id="lab"> <h2>Публичные пасты:</h2></label> </div>
    @foreach ($pastes as $paste)
      <div class="paste" id="paste" style="border-bottom:3px solid; padding-bottom:10px;">
        <h3>{{$paste->pasteName}}</h3>
        <div class="pasteText"> {{$paste->text}} </div>
        <a href="{{route('onepaste', $paste->ref)}}">
        <input type="button" name="btn1" value="Открыть" style="margin-top:10px; margin-left:85%">
        </a>
    </div>
    @endforeach
  </div>

  <script type="text/javascript">
  var size = 250;
  var pasteText;
  let paste = document.getElementsByClassName("pasteText");
  for(var i = 0; i<10; i++){
  pasteText = paste[i].textContent;
  if (paste[i].textContent.length > size){
  paste[i].textContent = pasteText.slice(0, size) + ' ...';
     }
   }
  </script>
