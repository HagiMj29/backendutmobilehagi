<?php

namespace App\Http\Controllers\API;

use App\Models\ListBudaya;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListBudayaController extends Controller
{
    public function index(){

        $listbudaya = ListBudaya::latest()->get();

        $result = $listbudaya->map(function($data){
            return[
                'title'=>$data->title,
                'content'=>$data->content,
                'image'=>$data->image,
            ];
        });

        return response()->json(['message' => 'Data Berhasil di Akses', 'result'=>$result], 200);
    }

    public function galeri()
    {
        $listbudaya = ListBudaya::latest()->get();

        $result = $listbudaya->map(function ($data){
            
            return [
                'title'=>$data->title,
                'image'=>$data->image,
            ];

        });

        return response()->json(['message' => 'Data Berhasil di Akses', 'result'=>$result], 200);
    }
}
