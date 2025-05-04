@extends('layouts.master')
@section('page_title', $user->name)

@if(Qs::userIsTeamSA())
    @section('header_right')
        <a href="{{ route('users.edit',  Qs::hash($user->id)) }}" type="submit" class="btn btn-primary">Редактировать</a>
    @endsection
@endif


@section('content')
    <div class="row">
        <div class="col-md-3 text-center">
            <div class="card">
                <div class="card-body">
                    <div style="padding-top: 100%; position: relative">
                        <img style="display: block; top: 0; position: absolute; width: 100%; height: 100%" src="{{ $user->photo }}" alt="photo" class="rounded-circle">
                    </div>
                    <br>
                    <h3 class="mt-3">{{ $user->name }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <div class="tab-content">
                        {{--Basic Info--}}
                        <div class="tab-pane fade show active" id="basic-info">
                            <table class="table table-bordered">
                                <tbody>
                                <tr>
                                    <td class="font-weight-bold">Тип</td>
                                    <td>{{ $user->user_type }}</td>
                                </tr>

                                <tr>
                                    <td class="font-weight-bold">Имя</td>
                                    <td>{{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Email</td>
                                    <td>{{$user->email }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Телефон</td>
                                    <td>{{$user->phone.' '.$user->phone2 }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">День рожденья</td>
                                    <td>{{$user->dob }}</td>
                                </tr>

                                @if($user->user_type == 'student')
                                    @php
                                    $sr = Qs::findStudentRecord($user->id);

                                    @endphp

                                <tr>
                                    <td class="font-weight-bold">Класс</td>
                                    <td>{{ $sr->my_class->name }}</td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Родитель</td>
                                    <td>
                                        <span><a target="_blank" href="{{ route('users.show', Qs::hash($sr->my_parent_id)) }}">{{ $sr?->my_parent?->name }}</a></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Дата зачисления</td>
                                    <td>{{ $sr->year_admitted }}</td>
                                </tr>
                                @endif

                                @if($user->user_type == 'parent')
                                    <tr>
                                        <td class="font-weight-bold">Дети</td>
                                        <td>
                                        @foreach(Qs::findMyChildren($user->id) as $sr)
                                            <span> - <a href="{{ route('users.show', Qs::hash($sr->user->id)) }}">{{ $sr->user->name }}</a></span><br>

                                            @endforeach
                                        </td>
                                    </tr>
                                @endif

                                @if($user->user_type == 'teacher')
                                    <tr>
                                        <td class="font-weight-bold">Мои занятия</td>
                                        <td>
                                            @foreach(Qs::findTeacherSubjects($user->id) as $sub)
                                                <span> - {{ $sub->name.' ('.$sub->my_class->name.')' }}</span><br>
                                            @endforeach
                                        </td>
                                    </tr>
                                @endif

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    {{--User Profile Ends--}}

@endsection
