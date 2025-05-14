<?php

namespace App\Http\Controllers\Event;

use App\Helpers\Qs;

use App\Http\Controllers\Controller;
use App\Models\StudentRecord;
use App\Models\Subject;
use App\Repositories\Event\ParticipantRepo;
use App\Repositories\StudentRepo;
use App\Repositories\UserRepo;
use App\Repositories\EventRepo;
use App\Repositories\MyClassRepo;
use App\Repositories\SubjectRepo;

use App\Models\Event;

use App\Http\Requests\Events\EventCreate;
use App\Http\Requests\Events\EventUpdate;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class ParticipantController extends Controller
{
    protected $event, $class, $user, $subject, $participant;

    public function __construct(EventRepo $event, MyClassRepo $class, SubjectRepo $subject, UserRepo $user, ParticipantRepo $participant)
    {
        $this->event = $event;
        $this->class = $class;
        $this->user = $user;
        $this->subject = $subject;
        $this->participant = $participant;
    }


    public function update(EventUpdate $req, $id)
    {
        $data = $req->all();

        $participant = $this->participant->find($id);
        $participant->update($data);

        return Qs::jsonUpdateOk();
    }
}
