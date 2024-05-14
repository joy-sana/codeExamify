<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionsTable extends Model
{
    // use HasFactory;
    protected $table = 'questionstable';
    protected $fillable = [
        'question','subject_id', 'ans1', 'ans2', 'ans3', 'ans4', 'ans'
    ];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
