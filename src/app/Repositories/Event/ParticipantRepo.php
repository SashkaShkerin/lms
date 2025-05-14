<?php

namespace App\Repositories\Event;

use App\Models\Event\Participant;


class ParticipantRepo
{
    public static function statusLabel($status = null) {
        $states =  [
            Participant::STATUS_INVITE => 'Приглашен',
            Participant::STATUS_PRESENT => 'Присутствовал',
            Participant::STATUS_ABSENT => 'Отсутствовал',
        ];

        return $status ? $states[$status] : $states;
    }

    public function find($id)
    {
        return Participant::find($id);
    }
}