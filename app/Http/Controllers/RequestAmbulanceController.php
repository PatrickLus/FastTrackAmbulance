<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;
use Stevebauman\Location\Facades\Location;

// https://laravelcode.com/post/laravel-8-how-to-get-ip-address
// https://www.itsolutionstuff.com/post/how-to-get-current-user-location-in-laravelexample.html

class RequestAmbulanceController extends Controller
{
    public function newRequest(Request $request) {
      /*
      on the server

      $userIP = $request->ip();
      $currentUserInfo = Location::get($userIP);
      */

      $currentUserInfo = Location::get("92.119.177.20");
      print_r($currentUserInfo->latitude);
      print_r($currentUserInfo->longitude);

      return view('user_location', compact('currentUserInfo'));
    }
}
