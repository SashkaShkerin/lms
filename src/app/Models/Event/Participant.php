<?php

namespace App\Models\Event;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    const TYPE_CLASS = 10;
    const TYPE_STUDENT = 20;

    protected $fillable = [
        'event_id',
        'type',
        'type_id',
        'status',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

}
