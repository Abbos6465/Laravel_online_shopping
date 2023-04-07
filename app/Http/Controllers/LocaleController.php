<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LocaleController extends Controller
{
    public function change_locale(Request $request){
        App::setLocale($request->locale);
        session(['locale'=>$request->locale]);

        return redirect()->back();
    }
}
