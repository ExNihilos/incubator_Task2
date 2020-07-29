<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paste;
use Carbon\Carbon;

class loadController extends Controller
{
  public function submit(Request $request)
  {
   $hash=$this->genHash();
   $date = Carbon::now();

    $time=$request->input('expTime');
    $date->add(new \DateInterval($time));
    $paste = new Paste();
    $paste ->pasteName = $request->input('pasteName');
    $paste ->text = $request->input('text');
    $paste ->expTime = $date;  //$request->input('expTime'); //=$date
    $paste ->type = $request->input('type');
    $paste ->ref = $hash;
    $paste->save();

    return redirect()
    ->route('main')
    ->with('success', "Запись успешно сохранена - ссылка на пасту: /allpaste/$hash");
  }

  public function getPublicPastes()
  {
    $paste = new Paste;
    return view(
      'pastesview',
      ['pastes'=>$paste
      ->where('type','=','public')
      ->orderBy('created_at','desc')
      ->take(10)
      ->get()]);
  }

  public function genHash($length=8)
  {
     return substr(md5(openssl_random_pseudo_bytes(20)),-$length);
  }

  public function showPaste($ref)
  {
    $paste= new Paste;
    $date = Carbon::now();
    $curPaste = $paste->where('ref','=',$ref)->take(1)->get();
    foreach ($curPaste as $paste)
    {
      if($date<$paste->expTime)
      {
        return view ('onepaste', ['data' => $paste->where('ref','=',$ref)->get()]);
      }

      else
      {
        echo  $paste->expTime, " - Срок хранения пасты истек!";
      }
    }
  }
}
