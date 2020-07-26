<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paste;
//use App\Models\Contact;

class loadController extends Controller
{
  public function submit(Request $request)
  {
    //$validation = $request->validate([
    //  'text' => 'required'
  //  ]);

/* $contact = new Contact();
  $contact->text = $request->input('text');
  $contact->new = $request->input('new');
  $contact->save();*/

    $paste = new Paste();
    $paste ->text = $request->input('pasteName');
    $paste ->text = $request->input('text');
    $paste ->expTime = $request->input('expTime');
    $paste ->type = $request->input('type');
    //$paste ->ref = $request->input('ref');
    $paste->save();

    return redirect()->route('main')->with('success', 'Запись успешно сохранена'); //!важно
  }

  public function getPublicPastes()
  {
    $paste = new Paste;
    return view(
      'pastesview',
      ['pastes'=>$paste
      ->where('type','=','public')
      ->orderBy('created_at','desc')
      ->take(2)
      ->get()]); //Paste::all()
    /*$paste = new Paste();
    dd($paste->all());*/
  }
}
