<?php

namespace App\Http\Controllers;

use App\Models\OldStudenti;

class StudentiController extends Controller
{
    public function studenti(){
        $studenti = new OldStudenti("2", "<b>Filane2 Fisteku</b>",
            "18.10.1900", "F");

        return view('studenti', [
            "studenti" => $studenti
        ]);
    }
}
