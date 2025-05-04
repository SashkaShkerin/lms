<?php

namespace App\Models;

use App\Models\Event\Participant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\User;


class Event extends Model
{
    use HasFactory;

    const STATUS_CONDUCTED = 10;
    const STATUS_CANCELLED = 20;

    protected $fillable = [
        'description',
        'teacher_id',
        'class_id',
        'subject_id',
        'start_time',
        'end_time',
        'status',
    ];

    public function files()
    {
        return $this->morphMany(File::class, 'fileable');
    }

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

    public function participants()
    {
        return $this->hasMany(Participant::class);
    }

}
