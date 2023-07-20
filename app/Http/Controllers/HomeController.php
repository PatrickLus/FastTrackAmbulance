<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stevebauman\Location\Facades\Location;
use Yoeunes\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use \App\Models\Request as RequestModel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        $userID = Auth::id();
        $requests = DB::table('requests')
            ->join('forms', 'requests.hospital_id', '=', 'forms.id')
            ->select('requests.*', 'forms.full_name')
            ->where('requests.patient_id', '=', $userID)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('home', compact('requests'));
    }

    public function requestAmbulanceView(): Renderable {
        $hospitals = DB::table('forms')
            ->get();

        return view('patient.request', compact('hospitals'));
    }

    public function requestAmbulanceAction(Request $request): RedirectResponse
    {
        $request->validate([
            'hospital' => 'required|numeric',
            'description' => 'required|string',
        ]);

        /*
          on production

          $userIP = $request->ip();
          $currentUserInfo = Location::get($userIP);
      */

        $loc = Location::get("197.237.103.18");

        $_request = new RequestModel();
        $_request->patient_id = Auth::id();
        $_request->hospital_id = $request->hospital;
        $_request->description = $request->description;
        $_request->location = $loc->latitude . ',' . $loc->longitude;
        $_request->save();

        return redirect()->route('home');
    }
}
