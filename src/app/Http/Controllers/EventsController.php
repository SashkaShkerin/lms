<?php

namespace App\Http\Controllers;

use App\Helpers\Qs;

use App\Repositories\UserRepo;
use App\Repositories\EventRepo;
use App\Repositories\MyClassRepo;
use App\Repositories\SubjectRepo;

use App\Models\Event;

use App\Http\Requests\Events\EventCreate;
use App\Http\Requests\Events\EventUpdate;

use Illuminate\Support\Facades\Storage;


class EventsController extends Controller
{
    protected $event, $class, $user, $subject;

    public function __construct(EventRepo $event, MyClassRepo $class, SubjectRepo $subject, UserRepo $user)
    {
        $this->event = $event;
        $this->class = $class;
        $this->user = $user;
        $this->subject = $subject;
    }


    public function index()
    {
        $events = Event::all();

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
            ->with('subjects', $this->subject->all());
    }

    public function edit($id)
    {
        $event = Event::find($id);

        return view('pages.events.edit')
            ->with('event', $event)
            ->with('subjects', $this->subject->all());
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

        $data['start_time'] = \Carbon\Carbon::createFromFormat('Y-m-d H:i', $data['start_date'] .' ' . $data['start_time']);
        $data['end_time'] = \Carbon\Carbon::createFromFormat('Y-m-d H:i', $data['end_date'] .' ' . $data['end_time']);



        $event = $this->event->create($data);

        foreach ($req->file('files') as $uploadedFile) {
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

        $data['start_time'] = \Carbon\Carbon::createFromFormat('Y-m-d H:i', $data['start_date'] .' ' . $data['start_time']);
        $data['end_time'] = \Carbon\Carbon::createFromFormat('Y-m-d H:i', $data['end_date'] .' ' . $data['end_time']);
        $this->event->update($id, $data);
        $event =$this->event->find($id);

        foreach ((array)$event->files as $file) {
            if (!$file) continue;
            Storage::delete('public/events' . $file->file_path);
            $file->delete();
        }

        foreach ($req->file('files') as $uploadedFile) {
            $path = $uploadedFile->store('uploads/events', 'public');

            $event->files()->create([
                'file_path' => $path,
                'original_name' => $uploadedFile->getClientOriginalName(),
            ]);
        }

        return Qs::jsonUpdateOk();
    }
}
