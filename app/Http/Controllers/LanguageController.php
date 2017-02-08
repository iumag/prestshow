<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;


class LanguageController extends Controller
{
    public function index()
    {
        if (!\Session::has('locale')){
            \Session::put('locale', Input::get('locale'));
        }else{
            Session::set('locale', Input::get('locale'));
        }
        App::setLocale(Session::has('locale') ? Session::get('locale') : Config::get('app.locale'));
        return Redirect::back();
    }
}
