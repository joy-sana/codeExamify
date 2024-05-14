<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;



    protected $table = 'subjects'; // Replace 'your_table_name' with your actual table name
    
    protected $fillable = [
        'subject_code',
        'subject_name',
        'description',
    ];
}
