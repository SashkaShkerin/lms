@extends('layouts.master')
@section('page_title', 'Событие')

@section('header_right')
    <a href="{{ route('events.edit', $event->id) }}" type="submit" class="btn btn-primary">Редактировать</a>
@endsection

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
