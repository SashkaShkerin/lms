<?php

namespace App\Http\Controllers;

use App\Helpers\Qs;

use App\Models\StudentRecord;
use App\Models\Subject;
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


class EventsController extends Controller
{
    protected $event, $class, $user, $subject, $student;

    public function __construct(EventRepo $event, MyClassRepo $class, SubjectRepo $subject, UserRepo $user, StudentRepo $student)
    {
        $this->event = $event;
        $this->class = $class;
        $this->user = $user;
        $this->subject = $subject;
        $this->student = $student;
    }


    public function index()
    {

        $events = [];

        if (Qs::userIsTeamSA()) {
            $events = Event::all();
        } else if (Auth::user()->user_type == 'teacher') {
            $subjects_id = Subject::where('teacher_id', '=', Auth::user()->id)->get()->pluck('id')->toArray();
            $events = Event::whereIn('subject_id', $subjects_id)->get();
        } else if (in_array(Auth::user()->user_type, ['student', 'parent'])) {
            $students_id = null;

            if (Auth::user()->user_type == 'parent') {
                $students_id = StudentRecord::where('my_parent_id', '=', Auth::user()->id)->pluck('id')->toArray();
            } else {
                $students_id = StudentRecord::where('user_id', '=', Auth::user()->id)->pluck('id')->toArray();
            }

            $events = Event::whereIn('id',
                Event\Participant::whereIn('fileable_id', $students_id)->groupBy('event_id')->pluck('event_id')->toArray()
            )->get();
        }

        $_events = [];
        foreach ($events as $event) {
            $_events[] = [
                'id' => $event->id,
                'title' => $event->subject->name,

                'start' => $event->start_time,
                'end' => $event->end_time,

                'url' => route('events.show', $event->id)
            ];
        }  

        return view('pages.events.index')
            ->with('events', $_events);
    }

    public function create()
    {
        $event = new Event();
        $event->start_time = (new \DateTime('now'))->format('Y-m-d\TH:i:s');
        $event->end_time = (new \DateTime('now'))->modify('+1 hour')->format('Y-m-d\TH:i:s');

        return view('pages.events.edit')
            ->with('event', $event)
            ->with('subjects', $this->subject->all())
            ->with('students', $this->student->getAll()->get())
            ->with('classes', $this->class->all());
    }

    public function edit($id)
    {
        $event = Event::find($id);

        return view('pages.events.edit')
            ->with('event', $event)
            ->with('subjects', $this->subject->all())
            ->with('students', $this->student->getAll()->get())
            ->with('classes', $this->class->all());
    }

    public function show($id)
    {
        $event = Event::find($id);

        return view('pages.events.show')
            ->with('event', $event);
    }

    public function store(EventCreate $req)
    {
        $data = $req->all();
        $data['class_id'] = $class_id = (int)$data['participant_class'];


        $data['start_time'] = \Carbon\Carbon::createFromFormat('Y-m-d H:i', $data['start_date'] .' ' . $data['start_time']);
        $data['end_time'] = \Carbon\Carbon::createFromFormat('Y-m-d H:i', $data['end_date'] .' ' . $data['end_time']);

        $event = $this->event->create($data);

        foreach ($this->student->findStudentsByClass($class_id) as $class_student) {
            Event\Participant::create([
                'event_id' => $event->id,
                'fileable_id' => $class_student->id,
                'fileable_type' => StudentRecord::class,
                'type' => Event\Participant::TYPE_CLASS,
                'status' => Event\Participant::STATUS_INVITE,
            ]);
        }

        if ($students = (array)$data['participant_students']) {
            foreach ($students as $student) {
                Event\Participant::create([
                    'event_id' => $event->id,
                    'fileable_id' => (int)$student,
                    'fileable_type' => StudentRecord::class,
                    'type' => Event\Participant::TYPE_STUDENT,
                    'status' => Event\Participant::STATUS_INVITE,
                ]);
            }
        }

        foreach ((array)$req->file('files') as $uploadedFile) {
            $path = $uploadedFile->store('uploads/events', 'public');
            $event->files()->create([
                'file_path' => $path,
                'original_name' => $uploadedFile->getClientOriginalName(),
            ]);
        }

        return Qs::jsonStoreOk();
    }

    public function update(EventUpdate $req, $id)
    {
        $data = $req->all();
        $data['class_id'] = $class_id = (int)$data['participant_class'];

        $data['start_time'] = \Carbon\Carbon::createFromFormat('Y-m-d H:i', $data['start_date'] .' ' . $data['start_time']);
        $data['end_time'] = \Carbon\Carbon::createFromFormat('Y-m-d H:i', $data['end_date'] .' ' . $data['end_time']);
        $this->event->update($id, $data);
        $event =$this->event->find($id);

        foreach ($event->participants()->get() as $participant) {
            $participant->delete();
        }


        foreach ($this->student->findStudentsByClass($class_id) as $class_student) {
            Event\Participant::create([
                'event_id' => $event->id,
                'fileable_id' => $class_student->id,
                'fileable_type' => StudentRecord::class,
                'type' => Event\Participant::TYPE_CLASS,
                'status' => Event\Participant::STATUS_INVITE,
            ]);
        }

        if ($students = (array)$data['participant_students']) {
            foreach ($students as $student) {
                Event\Participant::create([
                    'event_id' => $event->id,
                    'fileable_id' => (int)$student,
                    'fileable_type' => StudentRecord::class,
                    'type' => Event\Participant::TYPE_STUDENT,
                    'status' => Event\Participant::STATUS_INVITE,
                ]);
            }
        }

        foreach ((array)$event->files as $file) {
            if (!$file) continue;
            Storage::delete('public/events' . $file->file_path);
            $file->delete();
        }

        foreach ((array)$req->file('files') as $uploadedFile) {
            $path = $uploadedFile->store('uploads/events', 'public');

            $event->files()->create([
                'file_path' => $path,
                'original_name' => $uploadedFile->getClientOriginalName(),
            ]);
        }

        return Qs::jsonUpdateOk();
    }
}
