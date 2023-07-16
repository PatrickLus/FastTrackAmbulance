<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yoeunes\Toastr\Facades\Toastr;
use App\Models\Patient;

class PatientController extends Controller
{
    public function index()
    {
        return "from patient controller";
    }

    public function login()
    {
        return view('patient.login');
    }

    public function register()
    {
        return view('patient.register');
    }
    /*public function viewDetail($id)
    {
        if (Auth::user()->role_name=='Admin')
        {
            $id = DB::table('users')->where('id',$id)->get();
            //   $roleName = DB::table('role_type_users')->get();
            // $userStatus = DB::table('user_types')->get();
            return view('Admin.viewPatient',compact('id'));
        }
        else
        {
            return redirect()->route('home');
        }
    }*/

    public function authRegister(Request $request)
    {
        $request->validate([
            'fName' => 'required|alpha',
            'lName' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'password' => 'required',
            'cpassword' => 'required',
        ]);

        //getting the values
        $fName = $request->get('fName');
        $lName = $request->get('lName');
        $phone = $request->get('phone');
        $email = $request->get('email');
        $password = $request->get('password');

        //new object of Patient class
        $Patient = new Patient;
        $Patient->fName = $fName;
        $Patient->lName = $lName;
        $Patient->phone = $phone;
        $Patient->email = $email;
        $Patient->password = $password;

        $Patient->save();

        return redirect('login')->with('status', "Patient saved.");
    }

    public function addPatient()
    {
        return "patient added";
    }

    public function update($id)
    {
        return $id;
    }
}
