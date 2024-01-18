<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;
    protected $fillable = ['teacher_id','grade_id','subject','assignment_name','assignment_text','assignment_file','due_date'];
}
