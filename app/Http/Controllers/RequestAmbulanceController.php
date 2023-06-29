<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;

// https://laravelcode.com/post/laravel-8-how-to-get-ip-address
// https://www.itsolutionstuff.com/post/how-to-get-current-user-location-in-laravelexample.html

class RequestAmbulanceController extends Controller
{
    public function newRequest(Request $request) {
      $userIP = $request->ip();
      $currentUserInfo = Location::get($userIP);
          
      return view('user', compact('currentUserInfo'));
    }
}
