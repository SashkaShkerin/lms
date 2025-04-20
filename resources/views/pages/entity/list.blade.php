@extends('layouts.master')


@if($title)
    @section('page_title', $title)
@endif

@if($actions)
    @section('header_right')
        @foreach($actions as $action)
            <a href="{{ route($action['route_name']) }}" class="btn btn-primary">{{ $action['text'] }}</a>
        @endforeach
    @endsection
@endif



@section('content')

    <div class="card">
        @include('components.list', ['list' => $list])
    </div>

@endsection
