@extends('layouts.master')
@section('page_title', 'Событие')

@if(Qs::userIsTeamSAT())
    @section('header_right')
        <a href="{{ route('events.edit', $event->id) }}" type="submit" class="btn btn-primary">Редактировать</a>
    @endsection
@endif

@include('components.tabs', ['tabs' => [
        [
            'id' => 'main',
            'title' => 'Общее',
            'content' => view('pages.events.show.tabs.main', ['event' => $event])->render(),
        ],
        [
            'id' => 'participant',
            'title' => 'Участники',
            'content' => view('pages.events.show.tabs.participant', ['event' => $event])->render(),
        ]
]])
