<?php

namespace App\Models\Event;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;
    protected $table = 'event_participant';


    const TYPE_CLASS = 10;
    const TYPE_STUDENT = 20;
    const STATUS_INVITE = 20;
    const STATUS_PRESENT = 20;
    const STATUS_ABSENT = 30;


    protected $fillable = [
        'event_id',
        'type',
        'status',
        'fileable_id',
        'fileable_type',
    ];

    public function fileable()
    {
        return $this->morphTo();
    }

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

}
