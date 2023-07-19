<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Yoeunes\Toastr\Facades;
use Yoeunes\Toastr\Facades\Toastr;

class FormController extends Controller
{
    public function index()
    {
        return view('form');
    }

    public function data()
    {
        $data = DB::table('Form')->get();
        //return view('view_record.viewrecord', compact('data'));
    }

    public function view($id)
    {
        $data = DB::table('Form')->where('id', $id)->get();
        // return view('view_record.viewdetail',compact('data'));
    }

    public function update(Request $request)
    {
        try {
            $full_name = $request->full_name;
            $email_address = $request->email_address;
            $contact_number = $request->contact_number;
            $address = $request->address;

            $update = [
                'full_name' => $full_name,
                'email_address' => $email_address,
                'contact_number' => $contact_number,
                'address' => $address,
            ];
            Form::where('id', $request->id)->update($update);
            toastr()->success('Data updated successfully :)', 'Success');
            //return redirect()->route('form/view/detail');
        } catch (\Exception $e) {

            toastr()->error('Data updated fail :)', 'Error');
            //return redirect()->route('form/view/detail');
        }
    }

    public function save(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email_address' => 'required|string|email|max:255',
            'contact_number' => 'required|numeric|min:10',
            'address' => 'required|string|max:255',
        ]);
        try {
            $full_name = $request->full_name;
            $email_address = $request->email_address;
            $contact_number = $request->contact_number;
            $address = $request->address;

            $password = Str::random(10);
            $user = User::create([
                'name'          => $full_name,
                'email'         => $email_address,
                'phone_number'  => $contact_number,
                'role_name'     => "Driver",
                'password'      => Hash::make($password),
                'status'        => "Active",
            ]);

            $form = new Form();
            $form->id = $user->id;
            $form->full_name = $full_name;
            $form->email_address = $email_address;
            $form->contact_number = $contact_number;
            $form->address = $address;
            $form->save();

            Toastr::success('Data added successfully :)', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            Toastr::error('Data added fail :)', 'Error');
             return redirect()->back();
        }
    }

    public function delete($id)
    {
        $delete = Form::find($id);
        $delete->delete();
        Toastr::success('Data deleted successfully :)', 'Success');
        //return redirect()->route('form/view/detail');
    }
}
