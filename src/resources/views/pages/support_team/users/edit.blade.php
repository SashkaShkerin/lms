@extends('layouts.master')
@section('page_title', 'Добавить пользователя')

@section('header_right')
    <button type="submit" form="form" class="btn btn-primary">Сохранить</button>
@endsection

@section('content.card')

    @if($user->id)
        <form id="form" class="ajax-update" enctype="multipart/form-data" method="post" action="{{ route('users.update', Qs::hash($user->id)) }}">
            @method('PUT')

            @else
                <form id="form" class="ajax-update" enctype="multipart/form-data" method="post" action="{{ route('users.store') }}">
                    @endif

                    @csrf
                    <div class="form-group row mb-3">
                        <label class="col-lg-3 col-form-label font-weight-semibold">Тип</label>
                        <div class="col-lg-9">
                            <select class="form-control select" id="user_type">
                                @foreach($user_types as $ut)
                                    <option value="{{ Qs::hash($ut->id) }}">{{ $ut->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label class="col-lg-3 col-form-label font-weight-semibold">ФИО</label>
                        <div class="col-lg-9">
                            <input value="{{ $user->name }}" required type="text" name="name" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label class="col-lg-3 col-form-label font-weight-semibold">Email</label>
                        <div class="col-lg-9">
                            <input value="{{ $user->email }}" required type="text" name="email" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label class="col-lg-3 col-form-label font-weight-semibold">Телефон</label>
                        <div class="col-lg-9">
                            <input value="{{ $user->email }}" required type="text" name="phone" class="form-control">
                        </div>
                    </div>

                        @if(in_array($user->user_type, Qs::getStaff()))
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Date of Employment:</label>
                                    <input autocomplete="off" name="emp_date" value="{{ $user?->staff->first()->emp_date ?? '' }}" type="text" class="form-control date-pick" placeholder="Select Date...">

                                </div>
                            </div>
                        @endif


                    <div class="form-group row mb-3">
                        <label class="col-lg-3 col-form-label font-weight-semibold">Фото</label>
                        <div class="col-lg-9">
                            <input value="{{ old('photo') }}" accept="image/*" type="file" name="photo" class="form-input-styled" data-fouc>
                        </div>
                    </div>
            </form>
@endsection
