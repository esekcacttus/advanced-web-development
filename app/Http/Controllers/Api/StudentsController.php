<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function get(){
        return response()->json(Student::all());
    }

    public function dumpRequest(Request $request){
        return $request->items;
    }
}
