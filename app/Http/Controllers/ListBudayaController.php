<?php

namespace App\Http\Controllers;

use App\Models\ListBudaya;
use Illuminate\Http\Request;

class ListBudayaController extends Controller
{
    public function index(){

        $listbudaya = ListBudaya::latest()->get();

        return view('budaya.index',['listbudaya'=>$listbudaya]);
    }

    public function create(){
        
        return view('budaya.create');

    }

    public function store(Request $request){
        
        $request->validate([
            'title'=>'required',
            'content'=>'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $imagePath = $request->file('image')->storeAs('uploads', $imageName, 'public');
    }

    // Simpan data ke dalam database
    ListBudaya::create([
        'title' => $request->title,
        'content' => $request->content,
        'image' => $imagePath,
    ]);

    return redirect()->route('budaya.index');


    }

    public function edit(ListBudaya $listbudaya){
        
        return view('budaya.edit', ['listbudaya'=>$listbudaya]);

    }

    public function update(Request $request, ListBudaya $listbudaya){
        
        $request->validate([
            'title'=>'required',
            'content'=>'required',
            'image'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $imagePath = $request->file('image')->storeAs('uploads', $imageName, 'public');
    }

    $listbudaya->update([
        'title' => $request->title,
        'content' => $request->content,
        'image' => $imagePath,
    ]);

    }

    public function destroy(ListBudaya $listbudaya){

        $listbudaya->delete();
        return redirect()->route('budaya.index')->with('success','Data Berhasil di Hapus');
        
    }
}
