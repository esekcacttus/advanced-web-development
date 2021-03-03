<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentiController extends Controller
{
    public function studenti(){
        $studenti = new \App\Models\Studenti("2", "Filane2 Fisteku",
            "18.10.1900", "F");

        return view('studenti', [
            "studenti" => $studenti
        ]);
    }
}
