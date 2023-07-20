<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        $hospitals = DB::table('forms')->get()->count();
        $logs = DB::table('forms')->get()->count();
        $patients = DB::table('users')
            ->where('role_name', '=', 'Patient')
            ->get()->count();

        return view('Admin.index', compact('hospitals', 'patients', 'logs'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function addHospital()
    {
        return view('Admin.addHospital');
    }

    public function viewHospital()
    {
        $hospitals = DB::table('forms')->get();
        return view('Admin.viewHospital', compact('hospitals'));
    }

    public function viewPatient()
    {
        return view('Admin.viewPatient');
    }

    public function viewDetail($id)
    {
        if (Auth::user()->role_name=='Admin')
        {
            $id = DB::table('users')->where('id',$id)->get();
           // $roleName = DB::table('role_type_users')->get();
           // $userStatus = DB::table('user_types')->get();
            return view('Admin.viewPatient',compact('id'));
        }
        else
        {
            return redirect()->route('home');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
