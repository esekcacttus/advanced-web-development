<?php

namespace App\Http\Controllers;

use App\Models\OldStudenti;
use App\Models\Student;
use Carbon\Carbon;
use GuzzleHttp\Psr7\UploadedFile;
use Symfony\Component\HttpFoundation\Request;

class StudentiController extends Controller
{
    public function studenti(){
        $studenti = new OldStudenti("2", "<b>Filane2 Fisteku</b>",
            "18.10.1900", "F");

        return view('studenti', [
            "studenti" => $studenti
        ]);
    }

    public function showStudent($id){
        $student = Student::find($id);

        return view('studenti', [
            'studenti' => $student
        ]);
    }

    public function showStudents($gender, $isActive=true){
/*        dd(
            Student::where('gender', $gender)
                ->orWhere('is_active', $isActive)
                ->orderBy('id', 'DESC')
                ->toSql()
        );*/


        $students = Student::where('gender', $gender)
            ->orWhere('is_active', $isActive)
            ->first();

        return view('studenti', [
            'studenti' => $students
        ]);
    }

    public function createNewStudent(){
        $student = new Student();
        $student->first_name = "Filan";
        $student->last_name = "Fisteku";
        $student->gender = 'M';
        $student->birthdate = Carbon::now()->toDate();
        $student->is_active = true;

        $student->save();
    }

    public function renameAllStudents($firstName){
        $students = Student::all();
        foreach ($students as $student){
            $student->first_name = $firstName;
            $student->save();
        }
    }

    public function allStudents(){

    }

    public function getEditStudent(){
        return view('studenti-edit');
    }

    public function postEditStudent(Request $request){
        $path = $request->file('profile_picture')->store('public/images');
        dd($path);
    }
}
