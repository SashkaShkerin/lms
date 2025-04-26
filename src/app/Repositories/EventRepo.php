<?php

namespace App\Repositories;

use App\Models\Event;


class EventRepo
{

    public function all()
    {
        return Event::orderBy('name', 'asc')->get();
    }

    public function find($id)
    {
        return Event::find($id);
    }

    public function create($data)
    {
        return Event::create($data);
    }

    public function update($id, $data)
    {
        return Event::find($id)->update($data);
    }

    public function delete($id)
    {
        return Event::destroy($id);
    }

}