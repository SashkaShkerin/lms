<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'teacher_id',
        'class_id',
        'subject_id',
        'start_time',
        'end_time',
    ];

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function class()
    {
        return $this->belongsTo(MyClass::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

}
