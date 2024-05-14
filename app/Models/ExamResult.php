<?php

namespace App\Models;
use App\Models\User_data;
use App\Models\Subject;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject_id',
        'student_id',
        'marks_obtained',
    ];
    public function studentData()
    {
        return $this->belongsTo(User_data::class, 'student_id', 'student_id');
    }
    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id', 'id');
    }
    
}
