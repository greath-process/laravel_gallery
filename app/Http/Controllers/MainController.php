<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Main;
use App\Models\Pictures;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        $pictures = Pictures::where('active', 1)->orderBy('sort', 'desc')->get();
        $icons = DB::table('icons')->where(['active' => '1'])->get();
        $main = Main::find(1);
        return view('welcome', ['pictures' => $pictures, 'main' => $main, 'icons' => $icons]);
    }
}
