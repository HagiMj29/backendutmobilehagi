<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();

        $result = $users->map(function ($data){
            
            return [
                'id'=>$data->id,
                'name'=>$data->name,
                'email'=>$data->email,
                'password'=>$data->password,
            ];

        });

        return response()->json(['message' => 'Data Berhasil di Akses', 'result'=>$result], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->input('password')),
        ]);

        return response()->json(['message' => 'Data Berhasil di Tambahkan', 'user' => $user], 201);
    }

    public function show(User $user)
    {
        return response()->json(['user' => $user], 200);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required',
            'password' => 'nullable',
        ]);
    
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->has('password') ? Hash::make($request->input('password')) : $user->password,
        ]);
    
        // Menghasilkan array yang berisi pesan dan objek pengguna
        $result = [
            'message' => 'Data Berhasil di Ubah',
            'user' => $user
        ];
    
        return response()->json($result, 200);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return response()->json(['message' => 'Data Berhasil di Hapus'], 200);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            $user = Auth::user();
    
            return response()->json(['user' => $user], 200);
        }
    
        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return response()->json(200);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required',
            'password' => 'required|string|min:8',
        ]);
    
        // Create a new user
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);  
        
        $result = $user;
        
        return response()->json(['message' => 'Data Berhasil di Regist', 'result'=>$result], 201);
    }
    

}