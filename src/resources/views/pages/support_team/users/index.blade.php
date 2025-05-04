@extends('layouts.master')
@section('page_title', 'Пользователи')

@section('header_right')
        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                Добавить
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('users.create')  }}?type=student">Ученика</a></li>
                <li><a class="dropdown-item" href="{{ route('users.create') }}?type=parent">Родителя</a></li>
                <li><a class="dropdown-item" href="{{ route('users.create') }}?type=teacher">Учителя</a></li>
                @if(Qs::userIsSuperAdmin())
                    <li><a class="dropdown-item" href="{{ route('users.create') }}?type=admin">Администратора</a></li>
                @endif
            </ul>
        </div>
@endsection

@include('components.tabs', ['tabs' => [
        [
            'id' => 'students',
            'title' => 'Ученики',
            'content' => view('pages.support_team.users.index.tabs.list', ['list' => [
                'columns' => $list['columns'],
                'items' => $list['items']['student']
            ]])->render(),
        ],
        [
            'id' => 'parents',
            'title' => 'Родители',
            'content' => view('pages.support_team.users.index.tabs.list', ['list' => [
                'columns' => $list['columns'],
                'items' => $list['items']['parent']
            ]])->render(),
        ],
        [
            'id' => 'teachers',
            'title' => 'Учителя',
            'content' => view('pages.support_team.users.index.tabs.list', ['list' => [
                'columns' => $list['columns'],
                'items' => $list['items']['teacher']
            ]])->render(),
        ],
        [
            'id' => 'admins',
            'title' => 'Администраторы',
            'content' => view('pages.support_team.users.index.tabs.list', ['list' => [
                'columns' => $list['columns'],
                'items' => $list['items']['admin']
            ]])->render(),
        ]
]])
