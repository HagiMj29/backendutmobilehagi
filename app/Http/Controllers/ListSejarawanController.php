<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListSejarawan;


class ListSejarawanController extends Controller
{
    public function index(){
        $sejarawan = ListSejarawan::latest() ->get();

        return view('sejarawan.index', ['sejarawan'=>$sejarawan]);

    }

    public function create(){

        return view('sejarawan.create');

    }

    public function store(Request $request){

        $request->validate([
            'name'=>'required',
            'birthdate'=>'required',
            'origin'=>'required',
            'sex'=>'required',
            'description'=>'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        

        $imagePath = null;
        if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $imagePath = $request->file('image')->storeAs('uploads', $imageName, 'public');
    }

    ListSejarawan::create([
        'name'=>$request->name,
        'birthdate'=>$request->birthdate,
        'origin'=>$request->origin,
        'sex'=>$request->sex,
        'description'=>$request->description,
        'image'=>$imagePath,
    ]);

    return redirect()->route('sejarawan.index');

    }

    public function edit(ListSejarawan $sejarawan){

        return view('sejarawan.edit',['sejarawan'=>$sejarawan]);

    }

    public function update(Request $request, ListSejarawan $sejarawan){

        $request->validate([
            'name'=>'required',
            'birthdate'=>'required',
            'origin'=>'required',
            'sex'=>'required',
            'description'=>'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        

        $imagePath = null;
        if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $imagePath = $request->file('image')->storeAs('uploads', $imageName, 'public');
    }

    $sejarawan->update([
        'name'=>$request->name,
        'birthdate'=>$request->birthdate,
        'origin'=>$request->origin,
        'sex'=>$request->sex,
        'description'=>$request->description,
        'image'=>$imagePath,
    ]);

    return redirect()->route('sejarawan.index');

    }

    public function destroy(ListSejarawan $sejarawan){
        $sejarawan->delete();
        return redirect()->route('sejarawan.index');
    }

}
