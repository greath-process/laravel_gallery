<?php

namespace App\Http\Controllers;

use App\Models\Main;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected $forbidden_keys = ['_token'];

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $icons = DB::table('icons')->get();
        $main = new Main;
        $main = $main->first();
        return view('admin.index', ['main' => $main, 'icons' => $icons]);
    }

    public function index_update(Request $request)
    {
        $main = Main::first();

        if($request->hasFile('image')){
            $image = $request->file('image');
            $path = Storage::url($image->storeAs('pictures', Str::random(20).'.'.$image->getClientOriginalExtension(), 'public'));
            $main->image = $path;
        }

        $request = $request->all();
        foreach($request as $key => $value){
            if(in_array($key, $this->forbidden_keys) || $key == 'image') continue;
            $main->$key = $value;
        }

        $main->save();

        return redirect()->route('admin');
    }

    public function home()
    {
        if(Auth::user()->is_admin)
            return redirect()->route('admin');
        else
            return view('home');
    }

    public function iconsUpdate(Request $request)
    {
        $action = $request->action;
        $id = $request->id;

        if($action == 'destroy'){
            DB::table('icons')->where('id', $id)->delete();
        } elseif ($action == 'update'){
            $name = $request->name;
            $value = $request->value;
            DB::table('icons')->where('id', $id)->update([
                $name => $value
            ]);
        } else {
            $update = [];
            $request = $request->all();
            foreach($request as $key => $value){
                if(in_array($key, $this->forbidden_keys)) continue;
                $update[$key] = $value;
            }
            DB::table('icons')->insert($update);
        }
        return redirect()->route('admin');
    }

}
