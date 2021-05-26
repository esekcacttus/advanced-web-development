<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $hidden = ['profile_picture'];

    public function getId(){
        return $this->id;
    }

    public function getFullName(){
        return $this->first_name." ".$this->last_name;
    }

    public function getBirthdate(){
        return $this->birthdate;
    }

    public function getGender(){
        return $this->gender;
    }

    public function getProfilePicture(){
        return $this->profile_picture;
    }
}
