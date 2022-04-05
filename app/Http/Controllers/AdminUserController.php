<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function post(Request $request){
        if($id = $request->id){
            User::where('id', $id)->update(['is_admin' => ($request->is_admin ?? 0)]);
        }
        return redirect()->route('users')->with('status','Обновлено');
    }

    public function delete(Request $request){
        if($id = $request->id){
            User::destroy($id);
        }
        return redirect()->route('users')->with('status','Удалено');
    }
}
