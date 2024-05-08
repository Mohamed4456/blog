<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
   public function __construct()
   {
    $this->middleware('auth');
   }




    public function index()
    {
        $user=User::latest()->get();
        return view('users.index')->with('user', $user);
    }

 
    public function create()
    {
        return view('users.create');
        
    }

   
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user= User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('user.index')
        ->with('success', ' User created Success');
    }


    public function hdelete($id)
    {
        $user=User::find($id);
        $user->profile()->delete();
        $user->delete();

        return redirect()->route('user.index')
        ->with('success', ' User deleted Success');
    }
}
