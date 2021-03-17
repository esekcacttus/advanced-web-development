<?php

namespace App\Http\Controllers;

use App\Models\Studenti;

class StudentiController extends Controller
{
    public function studenti(){
        $studenti = new Studenti("2", "<b>Filane2 Fisteku</b>",
            "18.10.1900", "F");

        return view('studenti', [
            "studenti" => $studenti
        ]);
    }
}
