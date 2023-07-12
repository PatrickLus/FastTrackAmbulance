<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }
    public function storeUser(Request $request)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|string|email|max:255|unique:users',
            /* 'phone_number' => 'required|string|max:255', */
            'password'  => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);
        
        User::create([
            'name'          => $request->name,
            'email'         => $request->email,
            'phone_number'  => $request->phone_number,
            'role_name'     => "Patient",
            'password'      => Hash::make($request->password),
            'status'        => "Active",
        ]);

        Toastr::success('Create new account successfully :)','Success');
        return redirect('login');
    }
}
