<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ListSejarawan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class ListSejarawanController extends Controller
{
 

    public function index()
    {
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

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'birthdate' => 'required|string',
            'origin' => 'required|string',
            'sex' => 'required|in:male,female',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Max size 2MB
        ]);
    
        try {
            if ($request->hasFile('image')) {
                $data['image'] = $request->file('image')->store('public/images');
            }
    
            $sejarawan = ListSejarawan::create($data);
            return response()->json($sejarawan, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to create sejarawan.'], 500);
        }
    }
    
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'birthdate' => 'required|string',
            'origin' => 'required|string',
            'sex' => 'required|in:male,female',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Max size 2MB
        ]);
    
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }
    
        $sejarawan = ListSejarawan::findOrFail($id);
    
        try {
            $data = $request->except(['image']); // Exclude image data for now
    
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('public/images');
                $data['image'] = $imagePath;
            } else {
                $data['image'] = $sejarawan->image; // Keep the existing image if not provided
            }
    
            $sejarawan->update($data);
            return response()->json($sejarawan, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to update sejarawan.'], 500);
        }
    }
    
    
     public function destroy(ListSejarawan $sejarawan){
        
        $sejarawan->delete();
        return response()->json(['message' => 'Data Berhasil di Hapus'], 200);
    }

}
