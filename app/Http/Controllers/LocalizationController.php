<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LocalizationController extends Controller
{
    //

    public function setlocale($lang){
        if(in_array($lang,['en', 'hr'])){
            App::setLocale($lang);
            Session::put('locale', $lang);
        }
        
        return back();
    }
}
