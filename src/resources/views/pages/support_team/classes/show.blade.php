@extends('layouts.master')
@section('page_title', $class->name)

@section('header_right')
    <a href="{{ route('classes.edit', $class->id) }}" type="submit" class="btn btn-primary">Редактировать класс</a>
@endsection

@include('components.tabs', ['tabs' => [
        [
            'id' => 'main',
            'title' => 'Общее',
            'content' => view('pages.support_team.classes.show.tabs.main', ['class' => $class])->render(),
        ],
        [
            'id' => 'students',
            'title' => 'Ученики',
            'content' => view('pages.support_team.classes.show.tabs.students', ['class' => $class])->render(),
        ]
]])
