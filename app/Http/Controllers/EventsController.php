<?php

namespace App\Http\Controllers;

use App\Helpers\Qs;
use App\Repositories\UserRepo;
use App\Repositories\MyClassRepo;
use App\Repositories\SubjectRepo;
use App\Models\Event;


class EventsController extends Controller
{
    protected $class, $user, $subject;

    public function __construct(MyClassRepo $class, SubjectRepo $subject, UserRepo $user)
    {
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
                'title' => 'my event',
                'start' => (new \DateTime($event->start_time))->format('Y-m-d\TH:i:s'),
                'end' => (new \DateTime($event->end_time))->format('Y-m-d\TH:i:s'),

                'start' => $event->start_time,
                'end' => $event->end_time,

                'extendedProps' => [
                    'department' => 'BioChemistry'
                ],
                  'description' => 'Lecture'
            ];
        }

        $_events = array_merge($_events, $_events);
        


        return view('pages.events.index')
            ->with('events', $_events);
    }


    public function event($eventId = null)
    {
        $event = Event::find($eventId);

        if (!$event) {
            $event = new Event;
            $event->start_time = (new \DateTime('now'))->format('Y-m-d\TH:i:s');
            $event->end_time = (new \DateTime('now'))->modify('+1 hour')->format('Y-m-d\TH:i:s');
        }

        return view('pages.events.event')
            ->with('event', $event)
            ->with('subjects', $this->subject->all());
    }
}
