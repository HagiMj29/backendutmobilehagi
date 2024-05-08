<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\ListSejarawan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class ListSejarawanController extends Controller
{
    public function index(){

        $sejarawan = ListSejarawan::latest() ->get();

        $result = $sejarawan->map(function($data){
            return[
                'id'=>$data->id,
                'name'=>$data->name,
                'birthdate'=>$data->birthdate,
                'origin'=>$data->origin,
                'sex'=>$data->sex,
                'description'=>$data->description,
                'image'=>$data->image,
            ];
        });

        return response()->json(['message' => 'Data Berhasil di Akses', 'result'=>$result], 200);

    }

    // public function create(){

    //     return view('sejarawan.create');

    // }

    public function store(Request $request){

        $request->validate([
            'name'=>'required',
            'birthdate'=>'required',
            'origin'=>'required',
            'sex'=>'required',
            'description'=>'required',
        ]);
    
        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = $request->file('image')->storeAs('uploads', $imageName, 'public');
        }
    
        $sejarawan = ListSejarawan::create([
            'name'=>$request->name,
            'birthdate'=>$request->birthdate,
            'origin'=>$request->origin,
            'sex'=>$request->sex,
            'description'=>$request->description,
            'image'=>$imagePath,
        ]);
    
        return response()->json(['message' => 'Data Berhasil di Tambahkan', 'sejarawan' => $sejarawan], 201);
    }
    


   
    public function update(Request $request, ListSejarawan $sejarawan)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'birthdate' => 'required',
            'origin' => 'required',
            'sex' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }
    
        // Handle image upload
        $imagePath = $sejarawan->image;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = $request->file('image')->storeAs('uploads', $imageName, 'public');
        }
    
        // Update sejarawan data
        $sejarawan->update([
            'name' => $request->name,
            'birthdate' => $request->birthdate,
            'origin' => $request->origin,
            'sex' => $request->sex,
            'description' => $request->description,
            'image' => $imagePath,
        ]);
    
        // Return response
        return response()->json(['message' => 'Data Berhasil di Tambahkan', 'sejarawan' => $sejarawan], 200);
    }
    
    
    
    
    

    public function destroy(ListSejarawan $sejarawan){
        $sejarawan->delete();
        return response()->json(['message' => 'Data Berhasil di Hapus'], 200);
    }

}
