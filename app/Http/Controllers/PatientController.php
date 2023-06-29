<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index() {
        return "from patient controller";
    }

    public function addPatient() {
        return "patient added";
    }

    public function update($id) {
        return $id;
    }
}
