@extends('layouts.master')
@section('page_title',$sr->user->name)

@if(Qs::userIsTeamSA())
    @section('header_right')
    <a href="{{ route('students.edit',  Qs::hash($sr->id)) }}" type="submit" class="btn btn-primary">Редактировать</a>
    @endsection
@endif

@section('content')
<div class="row">
    <div class="col-md-3 text-center">
        <div class="card">
            <div class="card-body">
                <img style="width: 90%; height:90%" src="{{ $sr->user->photo }}" alt="photo" class="rounded-circle">
                <h3 class="mt-3">{{ $sr->user->name }}</h3>
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
                                <td class="font-weight-bold">Имя</td>
                                <td>{{ $sr->user->name }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Email</td>
                                <td>{{$sr->user->email }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Телефон</td>
                                <td>{{$sr->user->phone.' '.$sr->user->phone2 }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">День рожденья</td>
                                <td>{{$sr->user->dob }}</td>
                            </tr>
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

{{--                            @if($sr->user->bg_id)--}}
{{--                            <tr>--}}
{{--                                <td class="font-weight-bold">Blood Group</td>--}}
{{--                                <td>{{$sr->user->blood_group->name }}</td>--}}
{{--                            </tr>--}}
{{--                            @endif--}}
{{--                            @if($sr->user->nal_id)--}}
{{--                            <tr>--}}
{{--                                <td class="font-weight-bold">Nationality</td>--}}
{{--                                <td>{{$sr->user->nationality->name }}</td>--}}
{{--                            </tr>--}}
{{--                            @endif--}}
{{--                            @if($sr->user->state_id)--}}
{{--                            <tr>--}}
{{--                                <td class="font-weight-bold">State</td>--}}
{{--                                <td>{{$sr->user->state->name }}</td>--}}
{{--                            </tr>--}}
{{--                            @endif--}}
{{--                            @if($sr->user->lga_id)--}}
{{--                            <tr>--}}
{{--                                <td class="font-weight-bold">LGA</td>--}}
{{--                                <td>{{$sr->user->lga->name }}</td>--}}
{{--                            </tr>--}}
{{--                            @endif--}}
{{--                            @if($sr->dorm_id)--}}
{{--                                <tr>--}}
{{--                                    <td class="font-weight-bold">Dormitory</td>--}}
{{--                                    <td>{{$sr->dorm->name.' '.$sr->dorm_room_no }}</td>--}}
{{--                                </tr>--}}
{{--                            @endif--}}

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


    {{--Student Profile Ends--}}

@endsection
