<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Model;

class User_data extends Authenticatable
{
    // use HasFactory;
    use HasFactory, Notifiable;
    protected $guard = "user_data";
    protected $table = "user_data";
    protected $primaryKey = "student_id";

    
    //MUTATOR FOR CAPATALIZING NAMES
    public function setNameAttribute($value){
        $this->attributes['name'] = ucwords($value);
    }


    //ACCESER FOR DOB FORMAT
        
    // public function getDobAttribute ($value){
    //     if (!empty($value)) {
    //         $timestamp = strtotime($value);
    //         if ($timestamp !== false) {
    //             return date('d/M/Y', $timestamp);
    //         }
    //     }
    //     return '';
    // }
}
