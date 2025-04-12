<?php

namespace App\Http\Controllers;

use App\Helpers\Qs;
use App\Repositories\UserRepo;
use App\Models\Event;


class HomeController extends Controller
{
    protected $user;
    public function __construct(UserRepo $user)
    {
        $this->user = $user;
    }


    public function index()
    {
        return redirect()->route('dashboard');
    }

    public function privacy_policy()
    {
        $data['app_name'] = config('app.name');
        $data['app_url'] = config('app.url');
        $data['contact_phone'] = Qs::getSetting('phone');
        return view('pages.other.privacy_policy', $data);
    }

    public function terms_of_use()
    {
        $data['app_name'] = config('app.name');
        $data['app_url'] = config('app.url');
        $data['contact_phone'] = Qs::getSetting('phone');
        return view('pages.other.terms_of_use', $data);
    }

    public function dashboard()
    {

        $events = Event::all();

        $_events = [];
        foreach ($events as $event) {



            $_events[] = [
                'id' => $event->id,
                'title' => 'my event',
                'start' => (new \DateTime($event->start_time, new \DateTimeZone('UTC')))->format('Y-m-d\TH:i:s'),
                'end' => (new \DateTime($event->end_time, new \DateTimeZone('UTC')))->format('Y-m-d\TH:i:s'),

                'start' => $event->start_time,
                'end' => $event->end_time,

                'extendedProps' => [
                    'department' => 'BioChemistry'
                ],
                  'description' => 'Lecture'
            ];
        }

        $_events = array_merge($_events, $_events);
        


        return view('pages.home.dashboard')
            ->with('events', $_events);
    }
}
