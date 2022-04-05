<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pictures;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Auth;

class AdminPicturesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pictures = new Pictures;
        return view('admin.pictures', ['pictures' => $pictures->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('image')){
            $image = $request->file('image');
            $path = Storage::url($image->storeAs('pictures', Str::random(20).'.'.$image->getClientOriginalExtension(), 'public'));
        }
        $picture = new Pictures;
        $picture->active = 1;
        $picture->name = $request->name;
        $picture->anons = $request->anons;
        $picture->image = $path;
        $picture->save();

        return redirect()->route('pictures.index');//->with('status','success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // тут какое-то говно, и не работают методы DELETE и PUT для форм,
        // а значит ресурсы воспринимают запросы, как переход на детальную
        // поэтому наваорочу херни с реквестами, а после верну как должно быть
        $action = request()->action;
        if($action == 'destroy'){
            $this->destroy($id);
        } elseif ($action == 'update'){
            $this->update(request());
        }
        return redirect()->route('pictures.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dd($id);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $name = $request->name;
        $value = $request->value;
        $picture = Pictures::find($id);
        $picture->$name = $value;
        $picture->save();
        //return dd($fff);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $picture = Pictures::find($id);
        app(Filesystem::class)->delete(public_path($picture->image));
        $picture->delete();
        return redirect()->route('pictures.index');//->with('status','success');
    }
}
