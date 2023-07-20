<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HospitalController extends Controller
{
    public function index(): Renderable {
        $userID = Auth::id();
        $requests = DB::table('requests')
            ->join('users', 'requests.patient_id', '=', 'users.id')
            ->select('requests.*', 'users.name', 'users.phone_number')
            ->where('requests.hospital_id', '=', $userID)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('hospitals.home', compact('requests'));
    }

    public function detail($id): Renderable {
        $request = DB::table('requests')
            ->join('users', 'requests.patient_id', '=', 'users.id')
            ->select('requests.*', 'users.name', 'users.phone_number')
            ->where('requests.id', '=', $id)
            ->first();

        return view('hospitals.detail', compact('request'));
    }
}
