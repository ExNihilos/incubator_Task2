<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paste;
use Carbon\Carbon;

class loadController extends Controller
{
  public function submit(Request $request)
  {
    /*$validation = $request->validate([
      'text' => 'required'
    ]);*/

   $hash=$this->genHash();

   if ($request->input('expTime') != null)
   {
     $date = Carbon::now();
     $time=$request->input('expTime');
     $date->add(new \DateInterval($time));

     //config(['app.default' => Carbon::now()]);
     //echo config(['app.default']);
     //$newdate = Carbon::create(1,1,1,0,0,0);
   }

   else
   {
     echo "= null";
     $date = null;
   }

  //  config(['app.default' -> $date]);
    $paste = new Paste();
    $paste ->pasteName = $request->input('pasteName');
    $paste ->text = $request->input('text');
    $paste ->expTime = $date;  //$request->input('expTime');
    $paste ->type = $request->input('type');
    $paste ->ref = $hash;
    $paste->save();

    return redirect()
    ->route('main')
    ->with('success',  "Запись успешно сохранена!  Cсылка на пасту: /$hash");
  }

  public function getPublicPastes()
  {
    $curDate = Carbon::now();
    $paste = new Paste;
    return view(
      'main',
      ['pastes'=>$paste
      ->where([['type','=','public'], ['expTime', '>', $curDate]])
      ->orWhere([['type','=','public'], ['expTime', '=', null]])
      ->orderBy('created_at','desc')
      ->take(10)
      ->get()]);

    /*$paste = new Paste();
    dd($paste->all());*/
  }

  public function genHash($length=8)
  {
     return substr(md5(openssl_random_pseudo_bytes(20)), -$length);
  }

  public function showPaste($ref)
  {
    $paste= new Paste;
    $curDate = Carbon::now();
    $curPaste = $paste->where('ref','=',$ref)->take(1)->get();

    foreach ($curPaste as $paste)
    {
      if ($paste->expTime!=null)
      {
        if($curDate<$paste->expTime)
        {
          return view ('onepaste', ['data' => $paste]);
        }

        else
        {
          echo  $paste->expTime, " - Срок хранения пасты истек!";
        }
      }

      else
      {
        if ($paste->expTime == null)
        {
          $paste->expTime = "без ограничения";
        }

        return view ('onepaste', ['data' => $paste]);
      }

    }
  }
}
